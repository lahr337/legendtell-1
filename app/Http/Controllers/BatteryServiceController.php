<?php

namespace App\Http\Controllers;

use App\Models\BatteryService;
use Illuminate\Http\Request;

class BatteryServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexBatterService(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Battery Service";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = BatteryService::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.battery-service', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function saveBatteryService(Request $request)
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
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('products_uploaded'), 'battery_service', $img_arr);
        } 

        $battery_service = new BatteryService();
        $battery_service->user_id = auth()->user()->id;
        $battery_service->car_id = $car_id;
        $battery_service->service_id = $serviceId;
        $battery_service->document = $products_uploaded;
        $battery_service->service_type = $request->service_type;
        $battery_service->battery_type = $request->battery_type;
        $battery_service->battery_brand = $request->battery_brand;
        $battery_service->part_number = $request->part_number;
        $battery_service->manufactured_date = $request->manufactured_date;
        $battery_service->expiration_date = $request->expiration_date;
        $battery_service->car_issue_id = $issue_id;

        if ($battery_service->save()) {
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
