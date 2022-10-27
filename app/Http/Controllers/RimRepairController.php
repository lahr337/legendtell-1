<?php

namespace App\Http\Controllers;

use App\Models\RimRepair;
use Illuminate\Http\Request;

class RimRepairController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexRimRepair(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Rim Repair";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = RimRepair::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();
        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.rim-repair', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function saveRimRepair(Request $request)
    {
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
        $mainid = base64_decode($request->carShopService);
        $carserviceId = explode("%%%", base64_decode($request->carShopService));
        $issue_id = base64_decode($request->issue_id);

        if (empty($carserviceId[1])) {
            return "no carid";
        }
        $serviceId = $carserviceId[1];
        $car_id = base64_decode($carserviceId[0]);
        if ($commonClass->checkCar($car_id) == 'fail') {
            return "wroungdata";
        }
        $serviceData = $commonClass->checkServiceId($carserviceId[1]);

        if ($commonClass->checkServiceId($carserviceId[1]) == 'fail') {
            return "wroungdata";
        }
        $products_uploaded = '';


        $img_arr = array();
        $img_arr_before = array();
        if ($request->hasfile('products_uploaded_before')) {
            $products_uploaded_before = $commonClass->uplodeimages($_POST['remove_products_ids_four'], $request->file('products_uploaded_before'), 'rim', $img_arr_before);
        } 
        if ($request->hasfile('products_uploaded')) {
            $products_uploaded_after = $commonClass->uplodeimages($_POST['remove_products_ids_three'], $request->file('products_uploaded'), 'rim', $img_arr);
        }
        $rim_repair = new RimRepair();
        $rim_repair->user_id = auth()->user()->id;
        $rim_repair->car_id = $car_id;
        $rim_repair->service_id = $serviceId;
        $rim_repair->before_service_image = $products_uploaded_before;
        $rim_repair->service_type = $request->service_type;
        $rim_repair->after_service_images = $products_uploaded_after;
        $rim_repair->car_issue_id = $issue_id;

        if ($rim_repair->save()) {
            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id, $serviceId);

            $checkservice = explode(',', auth()->user()->shop_services);
            if (count($checkservice) < 1) {

                return redirect()->route('shop-settings.mydashboard', ['myshopServices']);
                $redirecturl = '/shop-settings/mydashboard';
            } else {
                $carid = base64_encode($car_id);
                $redirecturl = '/shop-settings/completedshop/' . $carid;
            }
            return $redirecturl;
        } else {
            return "fail";
        }
    }
}
