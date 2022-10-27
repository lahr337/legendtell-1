<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\EngineBlockServices;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;

class EngineBlockServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function engineIndex(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $carserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Engine Block Services";
        $car_id = base64_decode($carserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $carserviceId[1];
        $serviceData = EngineBlockServices::where('car_id', $car_id)->where('service_id', $carserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.engine-block-specialty', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }
    public function save_engine_block(Request $request)
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
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'engineservices', $img_arr);
        } 
        $engineservices = new EngineBlockServices;
        $engineservices->user_id = auth()->user()->id;
        $engineservices->car_id = $car_id;
        $engineservices->service_id = $serviceId;
        $engineservices->issue_diagnosis = $request->issue_diagnosis;
        $engineservices->engine_block = $request->engine_block;
        $engineservices->engine_services = $request->engineServices;
        $engineservices->engine_pistons = $request->engine_pistons;
        $engineservices->engine_rods = $request->engine_rods;
        $engineservices->engine_crankshaft = $request->engine_crankshaft;
        $engineservices->engine_main_bearings = $request->engine_main_bearings;
        $engineservices->engine_rod_bearing = $request->engine_rod_bearing;
        $engineservices->engine_cam_bearing = $request->engine_cam_bearing;
        $engineservices->engine_piston_rings = $request->engine_piston_rings;
        $engineservices->engine_lifters = $request->engine_lifters;
        $engineservices->engine_heads = $request->engine_heads;
        $engineservices->engine_timing = $request->engine_timing;
        $engineservices->engine_oil_pan = $request->engine_oil_pan;
        $engineservices->engine_valves = $request->engine_valves;
        $engineservices->engine_exhaust_manifold = $request->engine_exhaust_manifold;
        $engineservices->engine_intake_manifold = $request->engine_intake_manifold;
        $engineservices->car_issue_id = $issue_id;

        $engineservices->document = $imgdoc;
        if ($engineservices->save()) {
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
