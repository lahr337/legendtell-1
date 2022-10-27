<?php

namespace App\Http\Controllers;

use App\Models\User;
use DB;
use App\Models\GlassServices;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;
use Illuminate\Http\Request;

class GlassServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function glassIndex(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $glassserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Glass Services";
        $car_id = base64_decode($glassserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $glassserviceId[1];
        $serviceData = GlassServices::where('car_id', $car_id)->where('service_id', $glassserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.glass-service', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function save_glass(Request $request)
    {
        $input = $request->except(['_token']);
        $commonClass = new CommonController;

        $mainid = base64_decode($request->carShopService);
        $issue_id = base64_decode($request->issue_id);

        $oilserviceId = explode("%%%", base64_decode($request->carShopService));
        if (empty($oilserviceId[1])) {
            return "no carid";
        }
        $serviceId = $oilserviceId[1];
        $car_id = base64_decode($oilserviceId[0]);
        if ($commonClass->checkCar($car_id) == 'fail') {
            return "wroungdata";
        }
        $serviceData = $commonClass->checkServiceId($oilserviceId[1]);

        if ($commonClass->checkServiceId($oilserviceId[1]) == 'fail') {
            return "wroungdata";
        }
        $imgdoc = '';

        $img_arr = array();

        if ($request->hasfile('image_uploaded')) {
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'glassservices', $img_arr);
        } 
        $glassServices = new GlassServices;
        
        $windhshield = implode(',',$request->windhshield);
        $glassServices->user_id = auth()->user()->id;
        $glassServices->car_id = $car_id;
        $glassServices->service_id = $serviceId;
        $glassServices->windshield = $windhshield;
        $glassServices->brand = $request->brand;
        $glassServices->driver_front_window_motor = $request->passenger_front_window_motor;
        $glassServices->driver_back_window_motor = $request->driver_back_window_motor;
        $glassServices->passenger_rear_window_motor = $request->passenger_rear_window_motor;
        $glassServices->back_hatch_window_motor = $request->back_hatch_window_motor;
        $glassServices->windshield_replaced = $request->windshield_replaced;
        $glassServices->sensor_data = $request->serviced;
        $glassServices->warranty = $request->warranty;
        $glassServices->warranty_company = $request->warranty_company;
        $glassServices->car_issue_id = $issue_id;

        $glassServices->glass_notes = $request->glass_notes;

        $glassServices->document = $imgdoc;
        if ($glassServices->save()) {
            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id, $serviceId);
            $checkservice = explode(',', auth()->user()->shop_services);
            if (count($checkservice) < 1) {
                redirect()->route('shop-settings.mydashboard', ['myshopServices']);
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
