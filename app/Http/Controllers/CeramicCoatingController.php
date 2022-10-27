<?php

namespace App\Http\Controllers;

use App\Models\CeramicCoating;
use Illuminate\Http\Request;

class CeramicCoatingController extends Controller
{
   public function indexCreamicCoating(Request $request,$vinid=null,$tab='editProfile')
   {
    $carserviceId=explode("%%%",base64_decode($_GET['servicedata'],true));

    $car_id=base64_decode($carserviceId[0]);
    $vinid=base64_encode($car_id);
    $service_id=$carserviceId[1];
    $serviceData=CeramicCoating::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->first();
    $page_title="Concierge Services";
    $shopsetting = new ShopSettingController;
    $VInGet= $shopsetting->FetchgetVinList($tab);
    return view('shop-settings.partials.shop_services.creamic-coating',compact('vinid','VInGet','serviceData','service_id','page_title'));

   }

   public function saveCreamicCoating(Request $request)
   {
    $input = $request->except(['_token']);
    $commonClass = new CommonController;
    $issue_id = base64_decode($request->issue_id);

   $mainid= base64_decode($request->carShopService);
  
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
        $imgdoc = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'ceramic_coating', $img_arr);
    }
    $ceramic_coating=new CeramicCoating();
    $ceramic_coating->user_id=auth()->user()->id;
    $ceramic_coating->car_id=$car_id;
    $ceramic_coating->service_id=$request->service_ids; 
    $ceramic_coating->parent_service_id=$serviceId; 
    $ceramic_coating->coating_manufacturer=$request->coating_manufacturer;
    $ceramic_coating->coating_type=$request->coating_type;
    $ceramic_coating->registered=$request->registered;
    $ceramic_coating->registered_company=$request->registered_company;
    $ceramic_coating->is_waranty=$request->is_waranty;
    $ceramic_coating->waranty_company=$request->waranty_company;
    $ceramic_coating->annual_required=$request->annual_required;
    $ceramic_coating->annual_completed=$request->annual_completed;
    $ceramic_coating->document=$imgdoc;
    $ceramic_coating->car_issue_id = $issue_id;
    if($ceramic_coating->save())
    {
        $commonClass = new CommonController;
        $commonClass->addServiceData($car_id,$request->service_ids);
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
