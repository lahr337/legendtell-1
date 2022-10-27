<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use DB;
use App\Models\BreakServices;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;
use App\Models\BatteryService;

class BreakServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function breakIndex(Request $request,$vinid=null,$tab='editProfile')
    {
        $breakserviceId=explode("%%%",base64_decode($_GET['servicedata'],true));
        $page_title="Break Services";
        $car_id=base64_decode($breakserviceId[0]);
        $vinid=base64_encode($car_id);
        $service_id=$breakserviceId[1];
        $serviceData=BreakServices::where('car_id',$car_id)->where('service_id',$breakserviceId[1])->where('user_id',auth()->user()->id)->first();
        
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.brake-service',compact('vinid','VInGet','serviceData','service_id','page_title'));
       
    }
    public function save_break(Request $request)
    {
       
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
    
       $mainid= base64_decode($request->carShopService);
       $issue_id = base64_decode($request->issue_id);

        $breakserviceId=explode("%%%",base64_decode($request->carShopService));
        if(empty($breakserviceId[1]))
        {
            return "no carid";
        }
         $serviceId=$breakserviceId[1];
        $car_id=base64_decode($breakserviceId[0]);
        if($commonClass->checkCar($car_id) =='fail')
        {
            return "wroungdata";
        }
        $serviceData=$commonClass->checkServiceId($breakserviceId[1]);
       
        if($commonClass->checkServiceId($breakserviceId[1]) =='fail')
        {
            return "wroungdata";
        }
        $imgdoc='';


        $img_arr = array();




        if ($request->hasfile('image_uploaded')) {
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'breakservices', $img_arr);
        }
    
       
      
        $breakServices=new BreakServices;
    
        $breakServices->user_id=auth()->user()->id;
        $breakServices->car_id=$car_id;
        $breakServices->service_id=$serviceId; 
        $breakServices->driver_front_break=$request->driver_front_break;
        $breakServices->driver_rear_break=$request->driver_rear_break;
        $breakServices->driver_front_rotors=$request->driver_front_rotors;
        $breakServices->driver_rear_rotors=$request->driver_rear_rotors;
        $breakServices->passenger_front_brakes=$request->passenger_front_brakes;
        $breakServices->passenter_rear_brakes=$request->passenter_rear_brakes;
        $breakServices->passenger_front_rotors=$request->passenger_front_rotors;
        $breakServices->passenger_rear_rotors=$request->passenger_rear_rotors;
        $breakServices->driver_front_calipers=$request->driver_front_calipers;

        $breakServices->driver_rear_calipers=$request->driver_rear_calipers;
        $breakServices->passenger_front_calipers=$request->passenger_front_calipers;
        $breakServices->passenger_rear_calipers=$request->passenger_rear_calipers;
        $breakServices->brake_hoses=$request->brake_hoses;
        $breakServices->brake_lines=$request->brake_lines;
        $breakServices->wheel_cylinder=$request->wheel_cylinder;
        $breakServices->master_cylinder=$request->master_cylinder;
        $breakServices->brake_fluid=$request->brake_fluid;
        $breakServices->car_issue_id = $issue_id;

        $breakServices->document=$imgdoc;
        if($breakServices->save())
        {
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

           
            return $redirecturl;
        }
        else{
            return "fail";
        }


    }
}
