<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\ExhaustServices;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;

class ExhaustServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function exhaustIndex(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $exhaustserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = 'Exhaust Services';
        $car_id = base64_decode($exhaustserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $exhaustserviceId[1];
        $serviceData = ExhaustServices::where('car_id', $car_id)->where('service_id', $exhaustserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.exhaust', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }
    public function save_exhaust(Request $request)
    {

        $input = $request->except(['_token']);
        $commonClass = new CommonController;
        $issue_id = base64_decode($request->issue_id);

        $mainid = base64_decode($request->carShopService);

        $breakserviceId = explode("%%%", base64_decode($request->carShopService));
        if (empty($breakserviceId[1])) {
            return "no carid";
        }
        $serviceId = $breakserviceId[1];
        $car_id = base64_decode($breakserviceId[0]);
        if ($commonClass->checkCar($car_id) == 'fail') {
            return "wroungdata";
        }
        $serviceData = $commonClass->checkServiceId($breakserviceId[1]);

        if ($commonClass->checkServiceId($breakserviceId[1]) == 'fail') {
            return "wroungdata";
        }
        $imgdoc = '';

        $img_arr = array();
        if ($request->hasfile('image_uploaded')) {
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'exhaustservices', $img_arr);
        } 
        $echaustServices = new ExhaustServices;
        $echaustServices->user_id = auth()->user()->id;
        $echaustServices->car_id = $car_id;
        $echaustServices->service_id = $serviceId;
        $echaustServices->exhaust_manifold = $request->exhaust_manifold;
        $echaustServices->exhaust_resonator = $request->exhaust_resonator;
        $echaustServices->exhaust_muffler = $request->exhaust_muffler;
        $echaustServices->exhaust_pipes = $request->exhaust_pipes;
        $echaustServices->exhaust_isolators = $request->exhaust_isolators;
        $echaustServices->exhaust_o2sensor = $request->exhaust_o2sensor;
        $echaustServices->exhasut_notes = $request->exhasut_notes;
        $echaustServices->car_issue_id = $issue_id;


        $echaustServices->document = $imgdoc;
        if ($echaustServices->save()) {
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
