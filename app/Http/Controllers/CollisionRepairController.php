<?php

namespace App\Http\Controllers;

use App\Models\CarOwnerHistory;
use App\Models\CollisionRepair;
use Illuminate\Http\Request;

class CollisionRepairController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function collisionIndex(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Collision Repair";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = CollisionRepair::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.collision-repair', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function collisionSave(Request $request)
    {


        $input = $request->except(['_token']);
        $commonClass = new CommonController;

        $mainid = base64_decode($request->carShopService);
        $issue_id = base64_decode($request->issue_id);

        $carserviceId = explode("%%%", base64_decode($request->carShopService));
        
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
        $before_image = '';
        $document_of_estimate = '';
        $document_of_repair = "";
        $after_image = "";

        $before_image_arr = array();
        $document_of_estimate_arr = array();
        $after_image_arr = array();
        $document_of_repair_arr = array();

 
        

        if ($request->hasfile('before_image')) {
            $before_image = $commonClass->uplodeimages($_POST['remove_products_ids_four'], $request->file('before_image'), 'collisionrepair', $before_image_arr);
        } 
        if ($request->hasfile('document_of_estimate')) {
            $document_of_estimate = $commonClass->uplodeimages($_POST['remove_products_ids_one'], $request->file('document_of_estimate'), 'collisionrepair', $document_of_estimate_arr);
        } 
        if ($request->hasfile('document_of_repair')) {
            $document_of_repair = $commonClass->uplodeimages($_POST['remove_products_ids_two'], $request->file('document_of_repair'), 'collisionrepair',$document_of_repair_arr);
        }
        if ($request->hasfile('after_image')) {
            $after_image = $commonClass->uplodeimages($_POST['remove_products_ids_three'], $request->file('after_image'), 'collisionrepair',$after_image_arr);
        }
        $collision_service = new CollisionRepair();
        $collision_service->user_id = auth()->user()->id;
        $collision_service->car_id = $car_id;
        $collision_service->service_id = $serviceId;
        $collision_service->before_image = $before_image;
        $collision_service->document_of_estimate = $document_of_estimate;
        $collision_service->document_of_repair = $document_of_repair;
        $collision_service->after_image = $after_image;
        $collision_service->collision_notes = $request->collision_notes;
        $collision_service->car_issue_id = $issue_id;

        if ($collision_service->save()) {
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
