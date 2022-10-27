<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CarQueryApi;
use App\Http\Requests\Common\GetMakesRequest;
use App\Http\Requests\Common\GetModelsRequest;
use App\Models\AcServices;
use App\Models\BatteryService;
use App\Models\BreakServices;
use App\Models\Car;
use App\Models\User;
use App\Models\CarOwnerHistory;
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
use App\Models\OilServices;
use App\Models\PaintBody;
use App\Models\PaintlessDentRepair;
use App\Models\PaintProtectionFilm;
use App\Models\Parts;
use App\Models\PerformanceDynoTuning;
use App\Models\PowderCoating;
use App\Models\RaceTrack;
use App\Models\RimRepair;
use App\Models\ShopApparisal;
use App\Models\ShopServices;
use App\Models\SpecialtyOther;
use App\Models\Suspension;
use App\Models\TintServices;
use App\Models\Tires;
use App\Models\Transmission;
use App\Models\Vinyl;
use Illuminate\Support\Facades\Storage;

class CommonController extends Controller
{
    public function getYears(Request $request)
    {
        return $this->sendResponse(CarQueryApi::getYears());
    }

    public function getMakes(GetMakesRequest $request)
    {
        return $this->sendResponse(CarQueryApi::getMakes($request->year));
    }

    public function getModels(GetModelsRequest $request)
    {
        return $this->sendResponse(CarQueryApi::getModels($request->year, $request->make));
    }

    public function createdate()
    {
        // date_default_timezone_set('America/New_York');
        date_default_timezone_set('America/New_York');

        return date("Y-m-d H:i:s");
    }
    public function base_url()
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $link = "https";
        else
            $link = "http";

        // Here append the common URL characters.
        $link .= "://";

        // Append the host(domain name, ip) to the URL.
        $link .= $_SERVER['HTTP_HOST'];

        // Print the link
        return $link;
    }
    public function google_password()
    {
        $password = "legend@123#";
        return $password;
    }
    public function checkCar($carId)
    {
        $cardara = Car::where('id', $carId)->first();
        if ($cardara) {
            return $cardara;
        }
        return 'fail';
    }
    public function checkServiceId($serviceId)
    {
        $shopdata = ShopServices::where('service_id', $serviceId)->first();
        if ($shopdata) {
            return $shopdata;
        }
        return 'fail';
    }
    function uploadimg($removeId, $imageid, $pathimport)
    {
        $ownerdoc = '';
        $insert = array();

        $remove_products_ids = array();
        if (isset($removeId) && !empty($removeId)) {
            $remove_products_ids = explode(",", $removeId);
        }
        foreach ($imageid as $key => $file) {
            if (!in_array($key, $remove_products_ids)) {
                $fileName = time() . $key . '.' . $file->getClientOriginalExtension();
                $path1 = Storage::disk('s3')->put($pathimport, $file);
                $path1 = Storage::disk('s3')->url($path1);
                $insert[$key]['path'] = $path1;
            }
        }
        return $ownerdoc = implode(" , ", array_column($insert, 'path'));
    }

    public function uplodeimages($removeId, $imageid, $pathimport, $before_image_arr)
    {
        $ownerdoc = '';
        $insert = array();

        $remove_products_ids = array();
        if (isset($removeId) && !empty($removeId)) {
            $remove_products_ids = explode(",", $removeId);
        }
        foreach ($imageid as $key => $file) {
                $fileName = time() . $key . '.' . $file->getClientOriginalExtension();
                $path1 = Storage::disk('s3')->put($pathimport, $file);
                $path1 = Storage::disk('s3')->url($path1);
                $insert[$key]['path'] = $path1;
        }
       if(count($before_image_arr) > 0)
       {
        $insert = array_merge($insert,$before_image_arr);
       }

        return $ownerdoc = implode(" , ", array_column($insert, 'path'));
    }

    

    public function getAppreiaslStatus($p)
    {


        $apprisasetting = ShopApparisal::where('user_id', auth()->user()->id)->first();
        if ($apprisasetting) {
            return $status = $apprisasetting->status;
        }
        return $status = 4;
    }

    public function imageUpload()
    {
        return view('pages.imageupload');
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time() . '.' . $request->image->extension();

        $path = Storage::disk('s3')->put('images', $request->image);

        $path = Storage::disk('s3')->url($path);
        die();
       

        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $path);
    }
    public function addServiceData($car_id, $serviceId)
    {
        date_default_timezone_set('America/New_York');

        $service_date= date("Y-m-d H:i:s");
        $service_date_new= date("Y-m-d H:i:s");
        $ownerhistory = Car::where('id', $car_id)->first();
        if ($ownerhistory) {
            // if (in_array($serviceId, explode(',', $ownerhistory->service_id))) {
            //     $ownerinsert = Car::where('id', $car_id)->update(['updated_at'=>$service_date]);
            // } else {
                if ($ownerhistory->service_id == "" || $ownerhistory->service_id == null) {
                    $ownerinsert = Car::where('id', $car_id)->update(['service_id' => $serviceId,'service_date'=>$service_date,'allservice_date'=>$service_date]);
                } else {
                    $Service_id = explode(',', $ownerhistory->service_id);
                    $Service_newdate = explode(',', $ownerhistory->allservice_date);
                    if (count($Service_id) == 0) {

                        $ownerinsert = Car::where('id', $car_id)->update(['service_id' => $serviceId,'service_date'=>$service_date,'allservice_date'=>$service_date]);
                    } else {

                        $arrchk =  array_push($Service_id, $serviceId);
                        $arrchk =  array_push($Service_newdate, $service_date_new);
                        $ownerinsert = Car::where('id', $car_id)->update(['service_id' => implode(',', $Service_id),'service_date'=>$service_date,'allservice_date'=>implode(',', $Service_newdate)]);
                    }
                }
            // }
        }
    }
    public static function getServiceName($serviceId) {
        $data=array();
        $shopdata=ShopServices::where('service_id',$serviceId)->first();
        if($shopdata)
        {
            $data['service_name']=$shopdata->service_name;
            $data['service_page']=$shopdata->service_page;
            $data['service_photo']=$shopdata->service_photo;
          
        }
        return $data;
    }


    public static function latest_services($shop_service, $car_id, $serviceId)
    {
        $car = Car::find($car_id);
        $car_id = Car::where('vin', $car['vin'])->orderBy('service_date', 'ASC')->get()->pluck('id');
        
        if ($shop_service == "AC Service") {
            $shopAllServices = AcServices::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('ac_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Battery Service") {
            $shopAllServices = BatteryService::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('battery_service_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Brake Service") {
            $shopAllServices = BreakServices::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('break_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Car-Wash") {
            $shopAllServices = CarWashServices::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('wash_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Ceramic Coating") {
            $shopAllServices = CeramicCoating::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('ceramic_coating_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }
        if ($shop_service == "Collision Repair") {
            $shopAllServices = CollisionRepair::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('collision_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Concierge Service") {
            $shopAllServices = ConciergeServices::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('conc_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Custom Build & Body") {
            $shopAllServices = CustomBuildBody::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('custom_build_body_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Dealership Service") {
            $shopAllServices = DealerShip::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('dealer_ship_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Detailing - Professional") {
            $shopAllServices = DetailingCorrection::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('detailing_correction_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Electrical|Controls /Specialty") {
            $shopAllServices = ElectricControl::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('electric_controls_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Engine Block Specialty") {
            $shopAllServices = EngineBlockServices::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('engine_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Exhaust") {
            $shopAllServices = ExhaustServices::with(['shop_user', 'shop_service.shop_detail'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('exhaust_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Fabrication & Welding") {
            $shopAllServices = FabricationWelding::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('fabrication_welding', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Frame & Alignment") {
            $shopAllServices = FrameAlignment::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('frame_alignment_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Fuel System") {
            $shopAllServices = FuelSystem::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('fuel_system_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Glass Service") {
            $shopAllServices = GlassServices::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('glass_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Lubrication") {
            $shopAllServices = Lubrication::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('lubrication_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Mechanical") {
            $shopAllServices = Mechanical::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('mechanical_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Nitrous") {
            $shopAllServices = Nitrous::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('nitrous_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Oil Service") {
            $shopAllServices = OilServices::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('oil_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Paint & Body") {
            $shopAllServices = PaintBody::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paint_body_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Paint Protection Film (PPF)") {
            $shopAllServices = PaintProtectionFilm::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paint_protection_film_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Paintless Dent Repair (PDR)") {
            $shopAllServices = PaintlessDentRepair::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paintless_dent_repair_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Parts") {
            $shopAllServices = Parts::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('part_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Performance | Dyno | Tuning") {
            $shopAllServices = PerformanceDynoTuning::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('performance_dyno_tuning_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Powder Coating") {
            $shopAllServices = PowderCoating::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('powder_coating_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Race & Track") {
            $shopAllServices = RaceTrack::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('race_track_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Rim Repair") {
            $shopAllServices = RimRepair::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('rim_repair_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        // if ($shop_service == "Rims") {
        //     $shopAllServices = AcServices::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('battery_service_id', 'DESC')->latest('created_at')->first();
        //     return $shopAllServices;
        // }

        if ($shop_service == "Specialty-Other") {
            $shopAllServices = SpecialtyOther::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('specialty_other_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Suspension") {
            $shopAllServices = Suspension::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('suspension_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Tint") {
            $shopAllServices = TintServices::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('tint_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Tires") {
            $shopAllServices = Tires::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('tire_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Transmission") {
            $shopAllServices = Transmission::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('transmission_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }

        if ($shop_service == "Vinyl Wraps") {
            $shopAllServices = Vinyl::with('shop_user', 'shop_service.shop_detail')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('vinyl_id', 'DESC')->latest('created_at')->first();
            return $shopAllServices;
        }
    }

    public static function getUserInfo($user_id)
    {
        $userdata=User::where('id',$user_id)->first();
        if($userdata)
        {
            return $userdata;
        }
        return ;
    }
}