<?php

namespace App\Http\Controllers;
use App\Models\User;
use DB;
use App\Models\OilServices;
use App\Models\CarIssue;
use App\Models\OilServicesCustom;
use App\Models\ShopServices;

use App\Models\AcServices;
use App\Models\BatteryService;
use App\Models\BreakServices;
use App\Models\CarWashServices;
use App\Models\CeramicCoating;
use App\Models\CollisionRepair;
use App\Models\ConciergeServices;
use App\Models\CustomBuildBody;
use App\Models\DealerShip;
use App\Models\DetailingCorrection;
use App\Models\ElectricControl;
use App\Models\EngineBlockServices;
use App\Models\ExhaustServices;
use App\Models\FabricationWelding;
use App\Models\FrameAlignment;
use App\Models\FuelSystem;
use App\Models\GlassServices;
use App\Models\Lubrication;
use App\Models\Mechanical;
use App\Models\Nitrous;

use App\Models\PaintBody;
use App\Models\PaintlessDentRepair;
use App\Models\PaintProtectionFilm;
use App\Models\Parts;
use App\Models\PerformanceDynoTuning;
use App\Models\PowderCoating;
use App\Models\RaceTrack;
use App\Models\RimRepair;
use App\Models\SpecialtyOther;
use App\Models\Suspension;
use App\Models\TintServices;
use App\Models\Tires;
use App\Models\Transmission;
use App\Models\Vinyl;

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
        $serviceDataCustom = [];
        if($serviceData){
            $serviceDataCustom=OilServicesCustom::where('oil_id',$serviceData->oil_id)->first();
        }
        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.oil-service',compact('vinid','VInGet','serviceData','service_id','page_title', 'serviceDataCustom'));
    }

    public function viewoilIndex(Request $request,$vinid=null,$tab='editProfile')
    {
        
        
        $car_service_arr = array();
        $car_service_data = array();
        $car_id = $request->servicedata;
        $vin = $request->vin;
        $serviceId = 22;
        $page_title="Oil Services";
        $serviceData=OilServices::where('car_id',$car_id)->where('service_id',$serviceId)->where('user_id',auth()->user()->id)->first();  
        $checkCarData=CarIssue::where('car_id',$car_id)->where('service_id',$serviceId)->where('user_id',auth()->user()->id)->first();
        $serviceDataCustom=$oil_id=$latest_services='';
        if($serviceData){
            $serviceDataCustom=OilServicesCustom::where('oil_id',$serviceData->oil_id)->first();
            $oil_id = $serviceData->oil_id;
        }

        // echo "<pre>";
        // print_r($serviceData);
        // // print_r($vinid);
        // return;
        // die;

        $car = Car::where('vin',$vin)->where('service_id', '!=','')->orderBy('updated_at','DESC')->first();

        $shop_service = ShopServices::with('shop_detail')->where('service_id', $serviceId)->where('status', 1)->first();

        if ($car = Car::find($car_id)) {
            $page_title = $car->title;
            $CarData = new Car;

           
            $car_by_vin = Car::where('vin', $car['vin'])->where('service_id', '!=','')->get()->pluck('id');

            $i = 0;
            foreach ($car_by_vin as $car_key => $car_value) {

                if (!empty($car_value)) {
                    if ($i == 0) {
                        $car_services = explode(',', $car_value);
                        $car_service_arr = $car_services;

                        if (count($car_by_vin) == 1) {
                            $car_service_data = $car_services;
                        }
                    } else {
                        $car_services = explode(',', $car_value);
                    }
                    if ($i != 0) {
                        $car_service_data = $car_service_arr = array_merge($car_service_arr, $car_services);
                    }
                    $i++;
                }
            }

            
            $latest_services =  $this->latest_services($shop_service, $car_by_vin, $serviceId);
            $CarData = $this->current_service($shop_service, $oil_id, $car_by_vin);


        }

        // echo "<pre>";
        // print_r($latest_services);
        // print_r($car_by_vin);
        // print_r($serviceId);
        // die;

        $shopsetting = new ShopSettingController;
        $VInGet= $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.view-oil-service',compact('vinid','car','VInGet','serviceData','latest_services','car_service_data','CarData','serviceId','page_title', 'serviceDataCustom', 'checkCarData'));
    }

    public function save_oilservices_custom(Request $request)
    {  
        // echo"<pre>";
        // print_r($request->all());
        // die('save custom data');
        
        


        $input = $request->except(['_token']);
        $commonClass = new CommonController;    
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
            return "wrongdata";
        }
        
        $oil_change_mileage = $pre_inspection = $oil_filter_and_parts_inspection = $Oil_analysis_report = $oil_in_out = $torque_specs = $post_service_inspection = $oil_collected_for_analysis = $Oil_analysis_report = '';

     
        $img_arr = array();
        $pdf_arr = array();
        $oil_service_check =  OilServices::where('car_id', $car_id)->where('user_id', auth()->user()->id)->first();


        if ($oil_service_check) {
            if (!empty($oil_service_check->document)) {

                $documents = explode(',', $oil_service_check->document);
                $remove_products_ids = explode(",", $_POST['remove_products_ids']);

                if (isset($_POST['remove_products_ids']) && $remove_products_ids[0] != "") {
                    foreach ($documents as $doc_key => $doc_value) {
                        if (!in_array($doc_key, $remove_products_ids)) {
                            $img_arr[$doc_key]['path'] = $doc_value;
                        }
                    }
                } else {
                    foreach ($documents as $doc_key => $doc_value) {
                        $img_arr[$doc_key]['path'] = $doc_value;
                    }
                }
            }
        }

        if (isset($request->oil_change_mileage) && !empty($request->oil_change_mileage)) {
            $oil_change_mileage = $commonClass->uplodeimages_custom($request->oil_change_mileage);         

        } else {
            $oil_change_mileage = implode(" , ", array_column($img_arr, 'path'));
        }

       


        if (isset($request->pre_inspection) && !empty($request->pre_inspection)) {
            $pre_inspection = $commonClass->uplodeimages_custom($request->pre_inspection);
            
        } else {
            $pre_inspection = implode(" , ", array_column($img_arr, 'path'));
        }

        
        
        
        


        if (isset($request->oil_filter_and_parts_inspection) && !empty($request->oil_filter_and_parts_inspection)) {
            $oil_filter_and_parts_inspection = $commonClass->uplodeimages_custom($request->oil_filter_and_parts_inspection);
        } else {
            $oil_filter_and_parts_inspection = implode(" , ", array_column($img_arr, 'path'));
        }



        if (isset($request->oil_in_out) && !empty($request->oil_in_out)) {
            $oil_in_out = $commonClass->uplodeimages_custom($request->oil_in_out);
        } else {
            $oil_in_out = implode(" , ", array_column($img_arr, 'path'));
        }



        if (isset($request->torque_specs) && !empty($request->torque_specs)) {
            $torque_specs = $commonClass->uplodeimages_custom($request->torque_specs);
        } else {
            $torque_specs = implode(" , ", array_column($img_arr, 'path'));
        }



        if (isset($request->post_service_inspection) && !empty($request->post_service_inspection)) {
            $post_service_inspection = $commonClass->uplodeimages_custom($request->post_service_inspection);
        } else {
            $post_service_inspection = implode(" , ", array_column($img_arr, 'path'));
        }



        if (isset($request->oil_collected_for_analysis) && !empty($request->oil_collected_for_analysis)) {
            $oil_collected_for_analysis = $commonClass->uploadimg_custom($request->oil_collected_for_analysis);
        } else {
            $oil_collected_for_analysis = implode(" , ", array_column($img_arr, 'path'));
        }

        if (isset($request->oil_analysis_report) && !empty($request->oil_analysis_report)) {
            $Oil_analysis_report = $commonClass->uploadpdf_custom($request->oil_analysis_report);
        } else {
            $Oil_analysis_report = implode(" , ", array_column($pdf_arr, 'path'));
        }   

      
        $oilServices=new OilServices;
        $oilServicesCustom=new OilServicesCustom;

        $checkAcData=OilServices::where('car_id',$car_id)->where('service_id',$serviceId)->where('user_id',auth()->user()->id)->first();
               

        if($checkAcData)
        {
            $oilServices = $oilServices->where('car_id',$car_id)->where('service_id',$serviceId)->where('user_id',auth()->user()->id)->first();  
            $oilServicesCustom = $oilServicesCustom->where('oil_id',$oilServices->oil_id)->first();   
        }

      
        
        // save data in old table........................................
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

        $oilServices->save();

       





        // save data in new table................................................

        $oilServicesCustom->oil_id=$oilServices->oil_id;
        $oilServicesCustom->date_of_service=$request->date_of_service;
        $oilServicesCustom->oil_pan_part_number=$request->oil_pan_part_number;
        $oilServicesCustom->gasket_part_number=$request->gasket_part_number;
        $oilServicesCustom->drain_plug_part_number=$request->drain_plug_part_number;
        $oilServicesCustom->crush_washer=$request->crush_washer;
        $oilServicesCustom->crush_washer_part_number=$request->crush_washer_part_number;
        $oilServicesCustom->rubber_o_rings=$request->rubber_o_rings;
        $oilServicesCustom->rubber_o_rings_part_number=$request->rubber_o_rings_part_number;


        $oilServicesCustom->oil_lines_serviced=$request->oil_lines_serviced;
        $oilServicesCustom->oil_lines_replaced=$request->oil_lines_replaced;
        $oilServicesCustom->turbo_oil_line_part_number=$request->turbo_oil_line_part_number;
        $oilServicesCustom->line_bolts_replaced=$request->line_bolts_replaced;
        $oilServicesCustom->turbo_oil_line_bolt_part_number=$request->turbo_oil_line_bolt_part_number;
        $oilServicesCustom->rings_crush_washer_replaced=$request->rings_crush_washer_replaced;
        $oilServicesCustom->rings_crush_washer_part_number=$request->rings_crush_washer_part_number;

        $oilServicesCustom->new_parts_notes=$request->new_parts_notes;
        $oilServicesCustom->pre_inspection_notes=$request->pre_inspection_notes;
        $oilServicesCustom->filter_and_parts_notes=$request->filter_and_parts_notes;
        $oilServicesCustom->oil_out_notes=$request->oil_out_notes;
        $oilServicesCustom->oil_in_notes=$request->oil_in_notes;
        $oilServicesCustom->torque_specs_notes=$request->torque_specs_notes;
        $oilServicesCustom->oil_status_level_notes=$request->oil_status_level_notes;
        $oilServicesCustom->post_service_inspection_notes=$request->post_service_inspection_notes;
        $oilServicesCustom->oil_analysis_notes=$request->oil_analysis_notes;
        $oilServicesCustom->oil_service_notes=$request->oil_service_notes;
        
        // $oilServicesCustom->document=$imgdoc;

        $oilServicesCustom->oil_change_mileage=$oil_change_mileage;
        $oilServicesCustom->pre_inspection=$pre_inspection;
        $oilServicesCustom->oil_filter_and_parts_inspection=$oil_filter_and_parts_inspection;
        $oilServicesCustom->Oil_analysis_report=$Oil_analysis_report;
        $oilServicesCustom->oil_in_out=$oil_in_out;
        $oilServicesCustom->torque_specs=$torque_specs;
        $oilServicesCustom->post_service_inspection=$post_service_inspection;
        $oilServicesCustom->oil_collected_for_analysis=$oil_collected_for_analysis;

        if($oilServicesCustom->save())
        {
            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id,$serviceId);
            $checkservice=explode(',',auth()->user()->shop_services);
       
            
            if(count($checkservice)<1)
            {
                redirect()->route('shop-settings.mydashboard',['myshopServices']);
                $redirecturl='../shop-settings/mydashboard';
            }
            else{
                $carid=base64_encode($car_id);
                //  echo"<pre>";
                // print_r($car_id);
                // die('car_id');
                $redirecturl='../shop-settings/completedshop/'.$carid;
            }

            // return response()->json(['status'=>true,'message' => $redirecturl,'type' => 'object'], 422);
            return $redirecturl;
        }
        else{
            return "fail";
        }


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

    public function latest_services($shop_service, $car_id, $serviceId)
    {
        if ($shop_service['service_name'] == "AC Service") {
            $shopAllServices = AcServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('ac_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Battery Service") {
            $shopAllServices = BatteryService::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('battery_service_id', 'DESC')->latest('created_at')->first();

            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Brake Service") {
            $shopAllServices = BreakServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('break_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Car-Wash") {
            $shopAllServices = CarWashServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('wash_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Ceramic Coating") {
            $shopAllServices = CeramicCoating::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('ceramic_coating_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }
        if ($shop_service['service_name'] == "Collision Repair") {
            $shopAllServices = CollisionRepair::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('collision_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Concierge Service") {
            $shopAllServices = ConciergeServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('conc_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Custom Build & Body") {
            $shopAllServices = CustomBuildBody::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('custom_build_body_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Dealership Service") {
            $shopAllServices = DealerShip::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('dealer_ship_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Detailing - Professional") {
            $shopAllServices = DetailingCorrection::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('detailing_correction_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Electrical|Controls /Specialty") {
            $shopAllServices = ElectricControl::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('electric_controls_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Engine Block Specialty") {
            $shopAllServices = EngineBlockServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('engine_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Exhaust") {
            $shopAllServices = ExhaustServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('exhaust_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Fabrication & Welding") {
            $shopAllServices = FabricationWelding::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('fabrication_welding', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Frame & Alignment") {
            $shopAllServices = FrameAlignment::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('frame_alignment_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Fuel System") {
            $shopAllServices = FuelSystem::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('fuel_system_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Glass Service") {
            $shopAllServices = GlassServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('glass_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Lubrication") {
            $shopAllServices = Lubrication::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('lubrication_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Mechanical") {
            $shopAllServices = Mechanical::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('mechanical_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Nitrous") {
            $shopAllServices = Nitrous::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('nitrous_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Oil Service") {
            $shopAllServices = OilServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('oil_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paint & Body") {
            $shopAllServices = PaintBody::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paint_body_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paint Protection Film (PPF)") {
            $shopAllServices = PaintProtectionFilm::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paint_protection_film_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paintless Dent Repair (PDR)") {
            $shopAllServices = PaintlessDentRepair::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paintless_dent_repair_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Parts") {
            $shopAllServices = Parts::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('part_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Performance | Dyno | Tuning") {
            $shopAllServices = PerformanceDynoTuning::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('performance_dyno_tuning_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Powder Coating") {
            $shopAllServices = PowderCoating::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('powder_coating_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Race & Track") {
            $shopAllServices = RaceTrack::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('race_track_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Rim Repair") {
            $shopAllServices = RimRepair::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('rim_repair_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Rims") {
            $shopAllServices = AcServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('battery_service_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Specialty-Other") {
            $shopAllServices = SpecialtyOther::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('specialty_other_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Suspension") {
            $shopAllServices = Suspension::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('suspension_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Tint") {
            $shopAllServices = TintServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('tint_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Tires") {
            $shopAllServices = Tires::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('tire_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Transmission") {
            $shopAllServices = Transmission::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('transmission_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Vinyl Wraps") {
            $shopAllServices = Vinyl::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('vinyl_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }
    }

    public function current_service($shop_service, $id, $car_by_vin)
    {
        if ($shop_service['service_name'] == "AC Service") {
            if ($id == 0) {
                $shopAllServices = AcServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = AcServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('ac_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Battery Service") {
            if ($id == 0) {
                $shopAllServices = BatteryService::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = BatteryService::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('battery_service_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Brake Service") {
            if ($id == 0) {
                $shopAllServices = BreakServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = BreakServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('break_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Car-Wash") {
            if ($id == 0) {
                $shopAllServices = CarWashServices::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = CarWashServices::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->where('wash_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Ceramic Coating") {
            if ($id == 0) {
                $shopAllServices = CeramicCoating::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = CeramicCoating::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->where('ceramic_coating_id', $id)->first();
            }
            return $shopAllServices;
        }
        if ($shop_service['service_name'] == "Collision Repair") {
            if ($id == 0) {
                $shopAllServices = CollisionRepair::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = CollisionRepair::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->where('collision_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Concierge Service") {
            if ($id == 0) {
                $shopAllServices = ConciergeServices::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = ConciergeServices::with(['shop_user', 'shop_service.shop_detail', 'car_user'])->where('conc_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Custom Build & Body") {
            if ($id == 0) {
                $shopAllServices = CustomBuildBody::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = CustomBuildBody::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('custom_build_body_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Dealership Service") {
            if ($id == 0) {
                $shopAllServices = DealerShip::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = DealerShip::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('dealer_ship_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Detailing - Professional") {
            if ($id == 0) {
                $shopAllServices = DetailingCorrection::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = DetailingCorrection::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('detailing_correction_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Electrical|Controls /Specialty") {
            if ($id == 0) {
                $shopAllServices = ElectricControl::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = ElectricControl::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('electric_controls_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Engine Block Specialty") {
            if ($id == 0) {
                $shopAllServices = EngineBlockServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = EngineBlockServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('engine_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Exhaust") {
            if ($id == 0) {
                $shopAllServices = ExhaustServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = ExhaustServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->where('exhaust_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Fabrication & Welding") {
            if ($id == 0) {
                $shopAllServices = FabricationWelding::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = FabricationWelding::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('fabrication_welding', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Frame & Alignment") {
            if ($id == 0) {
                $shopAllServices = FrameAlignment::with(['shop_user', 'shop_service.shop_detail', 'car_user','AfterFrameAlignment','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = FrameAlignment::with('shop_user', 'shop_service.shop_detail', 'car_user','AfterFrameAlignment','car_issue')->where('frame_alignment_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Fuel System") {
            if ($id == 0) {
                $shopAllServices = FuelSystem::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = FuelSystem::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('fuel_system_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Glass Service") {
            if ($id == 0) {
                $shopAllServices = GlassServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = GlassServices::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('glass_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Lubrication") {
            if ($id == 0) {
                $shopAllServices = Lubrication::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Lubrication::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('lubrication_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Mechanical") {
            if ($id == 0) {
                $shopAllServices = Mechanical::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Mechanical::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('mechanical_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Nitrous") {
            if ($id == 0) {
                $shopAllServices = Nitrous::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Nitrous::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('nitrous_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Oil Service") {
            if ($id == 0) {
                $shopAllServices = OilServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = OilServices::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('oil_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paint & Body") {
            if ($id == 0) {
                $shopAllServices = PaintBody::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = PaintBody::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('paint_body_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paint Protection Film (PPF)") {
            if ($id == 0) {
                $shopAllServices = PaintProtectionFilm::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = PaintProtectionFilm::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('paint_protection_film_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paintless Dent Repair (PDR)") {
            if ($id == 0) {
                $shopAllServices = PaintlessDentRepair::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = PaintlessDentRepair::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('paintless_dent_repair_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Parts") {
            if ($id == 0) {
                $shopAllServices = Parts::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Parts::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('part_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Performance | Dyno | Tuning") {
            if ($id == 0) {
                $shopAllServices = PerformanceDynoTuning::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = PerformanceDynoTuning::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('performance_dyno_tuning_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Powder Coating") {
            if ($id == 0) {
                $shopAllServices = PowderCoating::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = PowderCoating::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('powder_coating_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Race & Track") {
            if ($id == 0) {
                $shopAllServices = RaceTrack::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = RaceTrack::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('race_track_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Rim Repair") {
            if ($id == 0) {
                $shopAllServices = RimRepair::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = RimRepair::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('rim_repair_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Rims") {
            $shopAllServices = "";
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Specialty-Other") {
            if ($id == 0) {
                $shopAllServices = SpecialtyOther::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = SpecialtyOther::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('specialty_other_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Suspension") {
            if ($id == 0) {
                $shopAllServices = Suspension::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Suspension::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('suspension_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Tint") {
            if ($id == 0) {
                $shopAllServices = TintServices::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = TintServices::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('tint_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Tires") {
            if ($id == 0) {
                $shopAllServices = Tires::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Tires::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('tire_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Transmission") {
            if ($id == 0) {
                $shopAllServices = Transmission::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Transmission::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('transmission_id', $id)->first();
            }
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Vinyl Wraps") {
            if ($id == 0) {
                $shopAllServices = Vinyl::with(['shop_user', 'shop_service.shop_detail', 'car_user','car_issue'])->whereIn('car_id', $car_by_vin)->orderBy('created_at', 'DESC')->first();
            } else {
                $shopAllServices = Vinyl::with('shop_user', 'shop_service.shop_detail', 'car_user','car_issue')->where('vinyl_id', $id)->first();
            }
            return $shopAllServices;
        }
    }
}
