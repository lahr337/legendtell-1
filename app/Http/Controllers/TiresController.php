<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\Tires;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;

class TiresController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function tireIndex(Request $request,$vinid=null,$tab='editProfile')
    {
        $carserviceId=explode("%%%",base64_decode($_GET['servicedata'],true));

        $car_id=base64_decode($carserviceId[0]);
        $vinid=base64_encode($car_id);
        $service_id=$carserviceId[1];
        $tireserviceData=Tires::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->first();
        
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.tires',compact('vinid','VInGet','tireserviceData','service_id'));
       
    }

    public function save_tires(Request $request)
    {
       
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
        $issue_id = base64_decode($request->issue_id);

       $mainid= base64_decode($request->carShopService);
      
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
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'tierservices', $img_arr);
        } 
        $tirewashServices=new Tires;
        $tirewashServices->user_id=auth()->user()->id;
        $tirewashServices->car_id=$car_id;
        $tirewashServices->service_id=$serviceId; 
        $tirewashServices->driver_front_psi=$request->driver_front_psi;
        $tirewashServices->driver_front_tread_depth=$request->driver_front_depth;
        $tirewashServices->driver_front_condition=$request->driver_front_condition;
        $tirewashServices->driver_front_brand=$request->driver_front_brand;
        $tirewashServices->driver_front_tire_size=$request->driver_front_tire_size;
        $tirewashServices->driver_rear_psi=$request->driver_rear_psi;
        $tirewashServices->driver_rear_tread_depth=$request->driver_rear_depth;
        $tirewashServices->driver_rear_condition=$request->driver_rear_condition;
        $tirewashServices->driver_rear_brand=$request->driver_rear_brand;

        $tirewashServices->driver_rear_tire_size=$request->driver_rear_size;
        $tirewashServices->passenger_front_psi=$request->passenger_front_psi;
        $tirewashServices->passenger_front_tread_depth=$request->passenger_front_depth;
        $tirewashServices->passenger_front_condition=$request->passenger_front_condition;
        $tirewashServices->passenger_front_brand=$request->passenger_front_brand;
        $tirewashServices->passenger_front_tire_size=$request->passenger_front_size;
        $tirewashServices->passenger_rear_psi=$request->passenger_rear_psi;
        $tirewashServices->passenger_rear_tread_depth=$request->passenger_rear_depth;
        $tirewashServices->passenger_rear_condition=$request->passenger_rear_condition;
        $tirewashServices->passenger_rear_brand=$request->passenger_rear_brand;
        $tirewashServices->passenger_rear_tire_size=$request->passenger_rear_size;
        $tirewashServices->document=$imgdoc;
        $tirewashServices->car_issue_id = $issue_id;

        if($tirewashServices->save())
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

            // return response()->json(['status'=>true,'message' => $redirecturl,'type' => 'object'], 422);
            return $redirecturl;
        }
        else{
            return "fail";
        }


    }
}
