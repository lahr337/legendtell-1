<?php

namespace App\Http\Controllers;

use App\Models\FabricationWelding;
use Illuminate\Http\Request;

class FabricationWeldingController extends Controller
{
    public function indexFabricationWelding(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Febrication Welding";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = FabricationWelding::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.fabrication-welding', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function saveFabricationWelding(Request $request)
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


        if ($request->hasfile('products_uploaded')) {
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('products_uploaded'), 'mechanic', $img_arr);
        } 
        $fabrication_welding = new FabricationWelding();
        $fabrication_welding->user_id = auth()->user()->id;
        $fabrication_welding->car_id = $car_id;
        $fabrication_welding->service_id = $serviceId;
        $fabrication_welding->document = $products_uploaded;
        $fabrication_welding->car_issue_id = $issue_id;

        if ($fabrication_welding->save()) {
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
