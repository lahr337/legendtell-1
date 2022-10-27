<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CarWashServices;
use App\Models\User;
use DB;
use App\Models\CarOwnerHistory;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;


class CarWashServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function carwashIndex(Request $request,$vinid=null,$tab='editProfile')
    {
        $carserviceId=explode("%%%",base64_decode($_GET['servicedata'],true));
        $page_title='Car Wash Services';
        $car_id=base64_decode($carserviceId[0]);
        $vinid=base64_encode($car_id);
        $service_id=$carserviceId[1];
        $checkwasData=CarWashServices::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('services_name',$request->service_name)->where('user_id',auth()->user()->id)->first();
        
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        $service_name = $request->service_name;
        return view('shop-settings.partials.shop_services.car_wash_handwash',compact('vinid','VInGet','checkwasData','service_id','car_id','page_title','service_name'));
       
    }
    public function tab_change_carwash(Request $request)
    {
       
        $tab='editProfile';
        $car_id=$request->car_id;
        $vinid=base64_encode($car_id);
        $service_id=$request->service_id;
        $checkwasData=CarWashServices::where('car_id',$car_id)->where('service_id',$request->service_id)->where('services_name',$request->service_name)->where('user_id',auth()->user()->id)->first();
        $service_name = $request->service_name;
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.car_wash_handwash',compact('vinid','VInGet','checkwasData','service_id','car_id','service_name'));
    }
    public function CarStore(Request $request)
    {
   
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
      
       $mainid= base64_decode($request->carShopService);
       $issue_id = base64_decode($request->issue_id);

        $carserviceId=explode("%%%",base64_decode($request->carShopService));
        if(empty($request->servicedataid))
        {
            return "no carid";
        }
         $serviceId=$request->servicedataid;
        $car_id=base64_decode($carserviceId[0]);
        if($commonClass->checkCar($car_id) =='fail')
        {
            return "wroungdata";
        }
        $serviceData=$commonClass->checkServiceId($request->servicedataid);
       
        if($commonClass->checkServiceId($request->servicedataid) =='fail')
        {
            return "wroungdata";
        }
        $imgdoc='';

        $img_arr = array();
        if ($request->hasfile('image_uploaded')) {
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'carwashservices', $img_arr);
        } 
        $carwashservices=new CarWashServices;
        $carwashservices->user_id=auth()->user()->id;
        $carwashservices->car_id=$car_id;
        $carwashservices->service_id=$request->servicedataid; 
        $carwashservices->services_name = $request->services_name;
        $carwashservices->service_name=implode(',',$request->serviceData);
        $carwashservices->notes=$request->notesdata;
        $carwashservices->documents=$imgdoc;
        $carwashservices->car_issue_id = $issue_id;

        if($carwashservices->save())
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

    //car tunnel
    public function CarTunnelStore(Request $request)
    {
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
      
       $mainid= base64_decode($request->carShopService);
       $issue_id = base64_decode($request->issue_id);

        $carserviceId=explode("%%%",base64_decode($request->carShopService));
        if(empty($request->servicedataid))
        {
            return "no carid";
        }
         $serviceId=$request->servicedataid;
        $car_id=base64_decode($carserviceId[0]);
        if($commonClass->checkCar($car_id) =='fail')
        {
            return "wroungdata";
        }
        $serviceData=$commonClass->checkServiceId($request->servicedataid);
       
        if($commonClass->checkServiceId($request->servicedataid) =='fail')
        {
            return "wroungdata";
        }
        $imgdoc='';
     
        
        $carwashservices=new CarWashServices;
     
        $img_arr = array();
        if ($request->hasfile('image_uploaded')) {
            $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'carwashservices', $img_arr);
        } 
        $carwashservices->user_id=auth()->user()->id;
        $carwashservices->car_id=$car_id;
        $carwashservices->service_id=$request->servicedataid; 
        $carwashservices->services_name = $request->services_name;
        $carwashservices->service_name=implode(',',$request->tunnelserviceData);
        $carwashservices->notes=$request->tunnelnotesdata;
        $carwashservices->documents=$imgdoc;
        $carwashservices->car_issue_id = $issue_id;

        if($carwashservices->save())
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
            return  $redirecturl;
        }
        else{
            return "fail";
        }
    }
}
