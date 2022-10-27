<?php

namespace App\Http\Controllers;
use App\Models\User;
use DB;
use App\Models\OilServices;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;
use App\Models\Car;
use Illuminate\Http\Request;

class OilServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function oilIndex(Request $request,$vinid=null,$tab='editProfile')
    {
        $oilserviceId=explode("%%%",base64_decode($_GET['servicedata'],true));
        $page_title="Oil Services";
        $car_id=base64_decode($oilserviceId[0]);
        $vinid=base64_encode($car_id);
        $service_id=$oilserviceId[1];
        $serviceData=OilServices::where('car_id',$car_id)->where('service_id',$oilserviceId[1])->where('user_id',auth()->user()->id)->first();
        
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.oil-service',compact('vinid','VInGet','serviceData','service_id','page_title'));
       
    }
    public function save_oilservices(Request $request)
    {
       
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
    
       $mainid= base64_decode($request->carShopService);
       $issue_id = base64_decode($request->issue_id);

        $oilserviceId=explode("%%%",base64_decode($request->carShopService));
        if(empty($oilserviceId[1]))
        {
            return "no carid";
        }
         $serviceId=$oilserviceId[1];
        $car_id=base64_decode($oilserviceId[0]);
        if($commonClass->checkCar($car_id) =='fail')
        {
            return "wroungdata";
        }
        $serviceData=$commonClass->checkServiceId($oilserviceId[1]);
       
        if($commonClass->checkServiceId($oilserviceId[1]) =='fail')
        {
            return "wroungdata";
        }
        $imgdoc='';
     
        $img_arr = array();

        if ($request->hasfile('image_uploaded')) {
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'oilservices', $img_arr);
        }
     
        $oilServices=new OilServices;
        $oilServices->user_id=auth()->user()->id;
        $oilServices->car_id=$car_id;
        $oilServices->service_id=$serviceId; 
        $oilServices->oil_mileage=$request->oil_mileage;
        $oilServices->oil_type=$request->oil_type;
        $oilServices->oil_brand=$request->oil_brand;
        $oilServices->oil_amount_added=$request->oil_amount_added;
        $oilServices->oil_filter_type=$request->oil_filter_type;
        $oilServices->oil_filter_brand=$request->oil_filter_brand;
        $oilServices->oil_fluid_service=$request->fluid_chk_services;
        $oilServices->oil_pan_removed=$request->oil_pan_removed;
        $oilServices->oil_pan_gaskit=$request->oil_pan_gaskit;

        $oilServices->oil_pan_nut=$request->oil_pan_nut;
        $oilServices->car_issue_id = $issue_id;

        $oilServices->document=$imgdoc;
        if($oilServices->save())
        {

            $vin_find = Car::find($car_id);

            $cardata=Car::where('vin', $vin_find['vin'])->update(['milage' => $request->oil_mileage]);
            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id,$serviceId);
            $checkservice=explode(',',auth()->user()->shop_services);
            if(count($checkservice)<1)
            {
                 redirect()->route('shop-settings.mydashboard',['myshopServices']);
                $redirecturl='/shop-settings/mydashboard';
            }
            else{
                $carid=base64_encode($car_id);
                $redirecturl='/shop-settings/completedshop/'.$carid;
            }

            // return response()->json(['status'=>true,'message' => $redirecturl,'type' => 'object'], 422);
            return $redirecturl;
        }
        else{
            return "fail";
        }


    }
}
