<?php

namespace App\Http\Controllers;

use App\Models\Mechanical;
use Illuminate\Http\Request;

class MechanicalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function indexMechanical(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Mechanic";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = Mechanical::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.mechanic', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function saveMechanical(Request $request)
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


        // $mechanical_check =  Mechanical::where('car_id', $car_id)->where('user_id', auth()->user()->id)->first();


        // if ($mechanical_check) {
        //     if (!empty($mechanical_check->document)) {

        //         $documents = explode(',', $mechanical_check->document);
        //         $remove_products_ids = explode(",", $_POST['remove_products_ids']);

        //         if (isset($_POST['remove_products_ids']) && $remove_products_ids[0] != "") {
        //             foreach ($documents as $doc_key => $doc_value) {
        //                 if (!in_array($doc_key, $remove_products_ids)) {
        //                     $img_arr[$doc_key]['path'] = $doc_value;
        //                 }
        //             }
        //         } else {
        //             foreach ($documents as $doc_key => $doc_value) {
        //                 $img_arr[$doc_key]['path'] = $doc_value;
        //             }
        //         }
        //     }
        // }

        if ($request->hasfile('products_uploaded')) {
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('products_uploaded'), 'mechanic', $img_arr);
        } 
        // else {
        //     $products_uploaded = implode(" , ", array_column($img_arr, 'path'));
        // }

        $mechanical = new Mechanical();
        // $serviceData = Mechanical::where('car_id', $car_id)->where('service_id', $serviceId)->where('user_id', auth()->user()->id)->first();
        // if ($serviceData) {
        //     $mechanical = $mechanical->where('car_id', $car_id)->where('service_id', $serviceId)->where('user_id', auth()->user()->id)->first();
        // }
        $service_type ="";
        if(count($request->service_type) > 0)
        {
            $service_type = implode(',',$request->service_type);
        }
        $mechanical->user_id = auth()->user()->id;
        $mechanical->car_id = $car_id;
        $mechanical->service_id = $serviceId;
        $mechanical->document = $products_uploaded;
        $mechanical->service_type = $service_type;

        if ($mechanical->save()) {
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
