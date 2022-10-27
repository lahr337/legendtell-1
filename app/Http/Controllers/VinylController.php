<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarWashServices;
use App\Models\User;
use DB;
use App\Models\Vinyl;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;
use App\Models\AcServices;
class VinylController extends Controller
{
    public function vinlyIndex(Request $request,$vinid=null,$tab='editProfile')
    {
        $carserviceId=explode("%%%",base64_decode($_GET['servicedata'],true));
        $page_title = 'VIN';
        $car_id=base64_decode($carserviceId[0]);
        $vinid=base64_encode($car_id);
       
        $checkCarData=Vinyl::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->where('type','CAR')->first();

        $checkVanData=Vinyl::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->where('type','Van')->first();

        $checkRvData=Vinyl::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->where('type','RV')->first();

        $checktrailerData=Vinyl::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->where('type','Trailer')->first();
        
        $checkbusData=Vinyl::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->where('type','Bus')->first();
        $checkotherData=Vinyl::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->where('type','Other')->first();
        $redirectUrl='/shop-settings/completedshop/'.$carserviceId[0];
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.vinyl-wraps',compact('vinid','VInGet','checkCarData','checkVanData','checkRvData','checktrailerData','checkbusData','checkotherData','redirectUrl','page_title'));
       
       
    }
    
    public function save_vinly_Car(Request $request)
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
        $acdoc='';
     
       
        
        $vinlyservice=new Vinyl;
     
        $msg="";

        $img_arr = array();

        if ($request->hasfile('image_uploaded')) {
            $acdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'vinly', $img_arr);
        }
        $vinlyservice->user_id=auth()->user()->id;
        $vinlyservice->car_id=$car_id;
        $vinlyservice->service_id=$serviceId; 
        $vinlyservice->type=$request->outType;
        $vinlyservice->car_issue_id = $issue_id;

        if($request->outType=='Car')
        {
            $vinlyservice->hood=$request->hood_radio;
            $vinlyservice->roof=$request->roof_radio;
            $vinlyservice->back_door=$request->back_door_radio;
            $vinlyservice->truck=$request->truck_radio;
            $vinlyservice->hatch=$request->hatch_radio;
            $vinlyservice->front_bumper=$request->front_bumper_radio;
            $vinlyservice->rear_bumper=$request->rear_bumper_radio;
            $vinlyservice->wrap_brand=$request->wrap_brand;
            $vinlyservice->wrap_color=$request->wrap_color;
            $vinlyservice->warranty=$request->warranty_radio;
            $vinlyservice->warranty_company=$request->warranty_company;
            $vinlyservice->driver_front_quarter=$request->driver_front_panel_radio;
            $vinlyservice->driver_rear_quarter=$request->driver_rear_panel;
            $vinlyservice->driver_front_door=$request->driver_front_door;
            $vinlyservice->driver_rear_door=$request->driver_rear_door;
            $vinlyservice->driver_a_pilar=$request->driver_a_pillar;
            $vinlyservice->driver_b_pilar=$request->driver_b_pillar;
            $vinlyservice->driver_c_pilar=$request->driver_c_pillar;
            $vinlyservice->driver_rocker_pilar=$request->driver_rocker_panel;
            $vinlyservice->driver_mirror=$request->driver_mirroe;
            $vinlyservice->pref_driver_window=$request->pref_driver_window;
            $vinlyservice->full_vechile_wrap=$request->full_vehicle_wrap;
            $vinlyservice->pass_front_quarter_panel=$request->pass_front_quarter;
            $vinlyservice->pass_rear_quarter_panel=$request->pass_rear_quarter;
            $vinlyservice->passenger_rear_door=$request->passenger_rear_door;
            $vinlyservice->pass_a_pillar=$request->pass_a_pillar;
            $vinlyservice->pass_b_pillar=$request->pass_b_pillar;
            $vinlyservice->pass_c_pillar=$request->pass_c_pillar;
            $vinlyservice->passenger_rocker_panel=$request->passenger_rocker_panel;
            $vinlyservice->passenger_mirror=$request->passenger_mirror;
            $vinlyservice->pref_pass_window=$request->pref_pass_windows;
            $vinlyservice->pref_back_windshild=$request->pref_back_windshield;
            $vinlyservice->taligate=$request->tailgate;
            $vinlyservice->vehicle_wrap=$request->full_vehicle_wrap;
            $vinlyservice->document=$acdoc;
            $msg = 'Car/Truck/Suv Added successfully!';
        }
        if($request->outType=='Van')
        {
            $vinlyservice->hood=$request->vantab1;
            $vinlyservice->roof=$request->vantab2;
            $vinlyservice->back_door=$request->vantab3;
            
            $vinlyservice->hatch=$request->vantab4;
            $vinlyservice->front_bumper=$request->vantab5;
            $vinlyservice->rear_bumper=$request->vantab6;
            $vinlyservice->wrap_brand=$request->van_wrap_brand;
            $vinlyservice->wrap_color=$request->van_wrap_color;
            $vinlyservice->warranty=$request->vantab7;
            $vinlyservice->warranty_company=$request->van_warranty_company;
            $vinlyservice->driver_front_quarter=$request->vantab12;
            $vinlyservice->driver_rear_quarter=$request->vantab13;
            $vinlyservice->driver_mirror=$request->vantab8;
            $vinlyservice->driver_front_door=$request->vantab14;
            $vinlyservice->driver_rear_door=$request->vantab15;
            $vinlyservice->pass_front_quarter_panel=$request->vantab16;
            $vinlyservice->pass_rear_quarter_panel=$request->vantab17;
           $vinlyservice->pref_driver_window=$request->vantab20;
           $vinlyservice->pref_pass_window=$request->vantab21;
           $vinlyservice->pref_back_windshild=$request->vantab22;
           $vinlyservice->vehicle_wrap=$request->vantab23;
           $vinlyservice->document=$acdoc;
           $msg = 'Van Added successfully!';
        }
        if($request->outType=='RV')
        {
            $vinlyservice->hood=$request->rvtab1;
            $vinlyservice->front=$request->rvtab2;
            $vinlyservice->rear=$request->rvtab3;
            $vinlyservice->roof=$request->rvtab12;
            $vinlyservice->wrap_brand=$request->rv_wrap_brand;
            $vinlyservice->wrap_color=$request->rv_wrap_color;
            $vinlyservice->warranty=$request->rvtab4;
            $vinlyservice->warranty_company=$request->rv_warranty_Company;
            $vinlyservice->full_driver_front_section=$request->rvtab5;
            $vinlyservice->full_driver_mid_section=$request->rvtab6;
            $vinlyservice->full_driver_rear_section=$request->rvtab7;
            $vinlyservice->roof_driver_front_section=$request->rvtab9;
            $vinlyservice->roof_driver_mid_section=$request->rvtab10;
            $vinlyservice->roof_driver_rear_section=$request->rvtab11;
            $vinlyservice->full_rv_wrap=$request->rv_full_wrap;
            $vinlyservice->document=$acdoc;
            $msg = 'RV Added successfully!';
        }
        if($request->outType=='Trailer')
        {
            $vinlyservice->hood=$request->trailertab1;
            $vinlyservice->front=$request->trailertab2;
            $vinlyservice->rear=$request->trailertab3;
            $vinlyservice->roof=$request->trailertab12;
            $vinlyservice->wrap_brand=$request->trailer_wrap_brand;
            $vinlyservice->wrap_color=$request->trailer_wrap_color;
            $vinlyservice->warranty=$request->trailertab4;
            $vinlyservice->warranty_company=$request->trailer_warranty_company;
            $vinlyservice->full_driver_front_section=$request->trailertab5;
            $vinlyservice->full_driver_mid_section=$request->trailertab6;
            $vinlyservice->full_driver_rear_section=$request->trailertab7;
            $vinlyservice->roof_driver_front_section=$request->trailertab9;
            $vinlyservice->roof_driver_mid_section=$request->trailertab10;
            $vinlyservice->roof_driver_rear_section=$request->trailertab11;
            $vinlyservice->full_rv_wrap=$request->trailertab8;
            $vinlyservice->document=$acdoc;
            $msg = 'Trailer Added successfully!';
          
        }
        if($request->outType=='Bus')
        {
            $vinlyservice->hood=$request->bustab1;
            $vinlyservice->front=$request->bustab2;
            $vinlyservice->rear=$request->bustab3;
            $vinlyservice->roof=$request->bustab12;
            $vinlyservice->wrap_brand=$request->bus_wrap_brand;
            $vinlyservice->wrap_color=$request->bus_wrap_color;
            $vinlyservice->warranty=$request->bustab4;
            $vinlyservice->warranty_company=$request->bus_warranty_company;
            $vinlyservice->full_driver_front_section=$request->bustab5;
            $vinlyservice->full_driver_mid_section=$request->bustab6;
            $vinlyservice->full_driver_rear_section=$request->bustab7;
            $vinlyservice->roof_driver_front_section=$request->bustab9;
            $vinlyservice->roof_driver_mid_section=$request->bustab10;
            $vinlyservice->roof_driver_rear_section=$request->bustab11;
            $vinlyservice->full_rv_wrap=$request->bustab8;
            $vinlyservice->document=$acdoc;
            $msg = 'Bus Added successfully!';
        }
        if($request->outType=='Other')
        {
            $vinlyservice->other_service_competed=$request->other_service_competed;
            $vinlyservice->other_brand_wrap=$request->other_brand_wrap;
            $vinlyservice->other_wrap_color=$request->other_wrap_color;
         
            $vinlyservice->warranty=$request->vinyl_other_warranty;
            $vinlyservice->warranty_company=$request->other_warranty_company;
            $msg = 'Other Added successfully!';
          
        }
        if($vinlyservice->save())
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
            return $redirecturl;;
        }
        else{
            return 'fail';
        }

    }
}
