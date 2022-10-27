<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\ConciergeServices;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;

class ConciergeServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function conciergeIndex(Request $request,$vinid=null,$tab='editProfile')
    {
        $carserviceId=explode("%%%",base64_decode($_GET['servicedata'],true));

        $car_id=base64_decode($carserviceId[0]);
        $vinid=base64_encode($car_id);
        $service_id=$carserviceId[1];
        $serviceData=ConciergeServices::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->first();
        $page_title="Concierge Services";
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.concierge-service',compact('vinid','VInGet','serviceData','service_id','page_title'));
       
    }
    public function save_concierge(Request $request)
    {
       
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
    
       $mainid= base64_decode($request->carShopService);
       $issue_id = base64_decode($request->issue_id);

        $carserviceId=explode("%%%",base64_decode($request->carShopService));
        if(empty($carserviceId[1]))
        {
            return "no carid";
        }
         $serviceId=$carserviceId[1];
        $car_id=base64_decode($carserviceId[0]);
        if($commonClass->checkCar($car_id) =='fail')
        {
            return "wroungdata";
        }
        $serviceData=$commonClass->checkServiceId($carserviceId[1]);
       
        if($commonClass->checkServiceId($carserviceId[1]) =='fail')
        {
            return "wroungdata";
        }
        $imgdoc='';
     
        $img_arr = array();


        if ($request->hasfile('image_uploaded')) {
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'conciergeservices', $img_arr);
        } 
        $conciergeServices=new ConciergeServices;
        $conciergeServices->user_id=auth()->user()->id;
        $conciergeServices->car_id=$car_id;
        $conciergeServices->service_id=$serviceId; 
        $conciergeServices->trip_begin=$request->trip_begin;
        $conciergeServices->trip_end=$request->trip_end;
        $conciergeServices->trip_details=$request->trip_details;
        $conciergeServices->client=$request->client;
        $conciergeServices->incident_condition=$request->incident_condition;
        $conciergeServices->notesdata=$request->notesdata;
        $conciergeServices->car_issue_id = $issue_id;

        $conciergeServices->document=$imgdoc;
        if($conciergeServices->save())
        {
            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id,$serviceId);
            $checkservice=explode(',',auth()->user()->shop_services);
            if(count($checkservice)<1)
            {
                return redirect()->route('shop-settings.mydashboard',['myshopServices']);
                $redirecturl='/shop-settings/mydashboard';
            }
            else{
                $carid=base64_encode($car_id);
                $redirecturl='/shop-settings/completedshop/'.$carid;
            }
            return $redirecturl;
        }
        else{
            return "fail";
        }


    }
}
