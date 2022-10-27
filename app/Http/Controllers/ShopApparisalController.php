<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShopApparisal;
use App\Models\ShopServices;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Validator;
use DB;

class ShopApparisalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function apperisal(Request $request,$tab)
    {
       
        $commonClass = new CommonController;
          
        $shopapperisal=new ShopApparisal;
        $shopapperisal->user_id=auth()->user()->id;
        $shopapperisal->apparisal_type=$tab;
        $shopapperisal->apperisal_date= $commonClass->createdate();
        if($shopapperisal->save())
        {
            $mypage='pendingapproval';
            return redirect()->route('shop-settings.index', [$mypage]);
            // return view('shop-settings.index',['pendingapproval']);
            return "Save Data";
        }
        else{
            return "no data save";
        }
        // $tab="apperisal";
        // return view('shop-settings.index,[apperisal]');
    }
    public function getShopdata(Request $request)
    {
        $shopAppData=ShopApparisal::where('id',$request->appraisalId)->with('shopapperisalRequest')->first();
        if($shopAppData)
        {
            return $shopAppData;
        }
        else{
            return 'fail';
        }
     
    }
    public function shopApproved(Request $request)
    {
        
        $apperisalid='1000'.$request->appid;
        $commonClass = new CommonController;
        $shopApperisal=ShopApparisal::where('id',$request->appid)->first();
        $shopApperisal->apparisal_id=$apperisalid;
        $shopApperisal->approved_by=auth()->user()->id; 
        $shopApperisal->approved_date=$commonClass->createdate();
        $shopApperisal->status=2;
        if($shopApperisal->save())
        {
            return 'success';
        }
        else{
            return 'fail';
        }

    }
    public function approved_specialty(Request $request)
    {
        $SelectServices=ShopServices::whereIn('service_id',explode(',',auth()->user()->shop_services))->get();
        $apprisasetting=ShopApparisal::where('user_id',auth()->user()->id)->first();
        return view('shop-settings.partials.apperisal.approved-specialty',compact('apprisasetting','SelectServices'));
    }
    public function approved_stored(Request $request)
    {
        print_r($request->all());
    }
}
