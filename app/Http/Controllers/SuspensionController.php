<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use Illuminate\Http\Request;

class SuspensionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexSuspension(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Rim Repair";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = Suspension::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();
        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.suspension', compact('vinid', 'VInGet','serviceData', 'service_id', 'page_title'));
    }

    public function saveSuspension(Request $request)
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
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('products_uploaded'), 'suspension', $img_arr);
        } 
        $suspension = new Suspension();
        $suspension->user_id = auth()->user()->id;
        $suspension->car_id = $car_id;
        $suspension->service_id = $serviceId;
        $suspension->document = $products_uploaded;
        $suspension->frame_bracket_mounts = $request->frame_bracket_mounts;
        $suspension->hanger_connection = $request->hanger_connection;
        $suspension->arm_bushing = $request->arm_bushing;
        $suspension->axles = $request->axles;
        $suspension->axle_bushing_bolts = $request->axle_bushing_bolts;
        $suspension->hub_bearings = $request->hub_bearings;
        $suspension->king_pin_play = $request->king_pin_play;
        $suspension->tie_roads_and_castle_nuts = $request->tie_roads_and_castle_nuts;
        $suspension->alignment = $request->alignment;
        $suspension->shocks = $request->shocks;
        $suspension->air_bags = $request->air_bags;
        $suspension->air_compressor = $request->air_compressor;
        $suspension->air_bag = $request->air_bag;
        $suspension->air_manifold = $request->air_manifold;
        $suspension->car_issue_id = $issue_id;
        if ($suspension->save()) {
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
