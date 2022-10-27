<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarIssue;
use App\Models\User;
use DB;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\ShopSettingController;
class CarIssueController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function shopRepair(Request $request,$vinid=null,$tab='editProfile')
    {
        $page_title = 'Issue-Repair';
        $carserviceId=explode("%%%",base64_decode($request->issueServiceid,true));
        $car_id=base64_decode($carserviceId[0]);

       $vinid=base64_encode($car_id);
       $checkCarData=CarIssue::where('car_id',$car_id)->where('service_id',$carserviceId[1])->where('user_id',auth()->user()->id)->first();
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
      
        return view('shop-settings.partials.shop_services.shop_issue_repair',compact('vinid','VInGet','checkCarData','page_title'));
    }
    public function IssueStore(Request $request)
    {
        $commonClass = new CommonController;
      
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
            $carIssueData=new CarIssue;
           
            $carIssueData->car_id=$car_id;
            $carIssueData->user_id=auth()->user()->id;
            $carIssueData->service_id=$serviceId;
            $carIssueData->diagnosis=$request->diagnosis;
            $carIssueData->known_issue=$request->know_issue;
            $carIssueData->install_info=$request->install_info;
            $carIssueData->recall_issue=$request->recall_issue;
            $carIssueData->servicing_issue=$request->service_info;
            $carIssueData->repair_info=$request->repair_info;
            if($carIssueData->save())
            {
                $id = base64_encode($carIssueData->issue_id);
                return $redirecturl='/shop-settings/'.$serviceData['service_page'].'?servicedata='.$request->carShopService.'&id='.$id;
            }
            else{
                return "fail";
            }
        
    }
}
