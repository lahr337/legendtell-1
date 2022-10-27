<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaseCar;
use App\Models\Car;
use App\Models\CarUser;
use App\Models\CarService;
use App\Models\CarRegistration;
use App\Models\CarCondition;
use App\Models\CarAppraisal;
use App\Services\CarQueryApi;
use App\Services\NhtsaApi;
use App\Services\CarsxeApi;
use App\Models\State;
use App\Models\ShopServices;
use App\Models\User;
use App\Models\CarOwnerHistory;
use App\Http\Requests\Car\AddRequest;
use App\Http\Requests\Car\AddRegistrationRequest;
use App\Http\Requests\Car\AddServiceRequest;
use App\Http\Requests\Car\UpdateAppraisalRequest;
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
use App\Models\OilServices;
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
use Illuminate\Support\Facades\Auth;
use Redirect;

class CarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page_title = 'My Cars';
        
        $cars = Car::where('user_id', auth()->user()->id)->get();

        return view("cars.index", compact('page_title', 'cars'));
    }

    public function add(AddRequest $request)
    {
        $input = $request->except(['_token']);
        $carDatafetch = Car::where('vin', $request->vin)->where('user_id', auth()->user()->id)->first();
        if ($carDatafetch) {
            return Redirect::back()->withErrors(['msg' => 'Vin Number already enter']);
        }
        if ($request->vin) {
            $carlastdata = Car::where('vin', $request->vin)->first();
            if ($carlastdata) {

                $car = Car::updateOrCreate($input + ['user_id' => auth()->user()->id]);
                $car_user = CarUser::create(['car_id' => $carlastdata->id, 'user_id' => auth()->user()->id]);
                $car->trims = $carlastdata->trims;
                $car->ref_type = 'nhtsa';
                $car->make = $carlastdata->make;
                $car->model = $carlastdata->model;
                $car->year = $carlastdata->year;
                $car->drive = $carlastdata->drive;
                $car->vin = $carlastdata->vin;
                $car->model_engine_cc = $carlastdata->model_engine_cc;
                $car->model_engine_cyl = $carlastdata->model_engine_cyl;
                $car->model_engine_type = $carlastdata->model_engine_type;
                $car->save();
            } else {

                $data = NhtsaApi::getByVIN($request->vin);
                // $data = CarsxeApi::getSpecsByVin($request->vin);
                if (isset($data['Results'])) {
                    $result = current($data['Results']);
                    if (isset($result['ModelYear']) && !empty($result['ModelYear'])) {
                        $car = Car::updateOrCreate($input + ['user_id' => auth()->user()->id]);
                        $car_user = CarUser::create(['car_id' => $car->id, 'user_id' => auth()->user()->id]);
                        $car->trims = $result;
                        $car->ref_type = 'nhtsa';
                        $car->make = $result['Make'];
                        $car->model = $result['Model'];
                        $car->year = $result['ModelYear'];
                        $car->drive = $result['DriveType'];
                        $car->vin = $result['VIN'];
                        $car->model_engine_cc = $result['EngineCycles'];
                        $car->model_engine_cyl = $result['EngineCylinders'];
                        $car->model_engine_type = $result['EngineConfiguration'];
                        $car->save();
                    }
                } else {
                    $data = CarQueryApi::getTrims($request->year, $request->make, $request->model);
                    if (isset($data['Trims']) && is_array($data['Trims'])) {
                        $car = Car::updateOrCreate($input + ['user_id' => auth()->user()->id]);
                        $car_user = CarUser::create(['car_id' => $car->id, 'user_id' => auth()->user()->id]);
                        $car->trims = $data['Trims'];
                        $car->ref_type = 'carquery';
                        $trim = current($data['Trims']);
                        $car->drive = $trim['model_drive'];
                        $car->model_engine_cc = $trim['model_engine_cc'];
                        $car->model_engine_cyl = $trim['model_engine_cyl'];
                        $car->model_engine_type = $trim['model_engine_type'];
                        $car->save();
                    }
                }
            }
            // } elseif($request->year && $request->make && $request->model) {
            //     $data = CarQueryApi::getTrims($request->year, $request->make, $request->model);
            //     if(isset($data['Trims']) && is_array($data['Trims'])){
            //         $car = Car::updateOrCreate($input + ['user_id' => auth()->user()->id]);
            //         $car_user = CarUser::create(['car_id' => $car->id, 'user_id' => auth()->user()->id]);
            //         $car->trims = $data['Trims'];
            //         $car->ref_type = 'carquery';
            //         $trim = current($data['Trims']);
            //         $car->drive = $trim['model_drive'];
            //         $car->model_engine_cc = $trim['model_engine_cc'];
            //         $car->model_engine_cyl = $trim['model_engine_cyl'];
            //         $car->model_engine_type = $trim['model_engine_type'];
            //         $car->save();
            //     }
        }

        return redirect()->back();
    }

    public function appraisalUpdate(UpdateAppraisalRequest $request, $car_id)
    {
        if ($car = Car::find($car_id)) {
            $input = $request->except(['_token', 'condition']);
            // $car->update($input);
            CarAppraisal::updateOrCreate([
                'user_id'   =>  auth()->user()->id,
                'car_id'    =>  $car_id,
            ], $input);
            if ($request->condition) {
                foreach ($request->condition as $text => $condition) {
                    CarCondition::updateOrCreate([
                        'user_id'   =>  auth()->user()->id,
                        'car_id'    =>  $car_id,
                        'text'      =>  $text,
                    ], [
                        'ok'        =>  isset($condition['ok']) && $condition['ok'] == 1,
                        'damaged'   =>  isset($condition['damaged']) && $condition['damaged'] == 1,
                        'other'     =>  isset($condition['other']) ? $condition['other'] : '',
                    ]);
                }
            }
        }
        return $this->sendResponse();
    }

    public function setDefaultPicture(Request $request)
    {
        if ($car_check = Car::find($request->car_id)) {
            $car = Car::where('vin',$car_check['vin'])->update(['picture' => $request->media_id]);
        }
        return $this->sendResponse();
    }

    public function addRegistration(AddRegistrationRequest $request, $car_id)
    {
        if ($car = Car::find($car_id)) {
            $input = $request->except(['_token']);
            $car_registration = CarRegistration::create($input + ['car_id' => $car_id, 'user_id' => auth()->user()->id]);
        }
        return redirect()->back();
    }

    public function addService(AddServiceRequest $request, $car_id)
    {
        if ($car = Car::find($car_id)) {
            $input = $request->except(['_token']);
            $car_service = CarService::create($input + ['car_id' => $car_id, 'user_id' => auth()->user()->id]);
        }

        return redirect()->back();
    }

    public function editService(AddServiceRequest $request, $car_id)
    {

        if ($car = Car::find($car_id) && $car_service = CarService::find($request->service_id)) {
            $input = $request->except(['_token']);
            $input['completed'] = isset($input['completed']) ? $input['completed'] : [];
            $car_service->update($input);
        }

        return redirect()->back();
    }

    public function view($car_id)
    {
        $MyCar = $car_id;

        $car = Car::find($car_id);
        $firstshop = CAR::where('vin', $car->vin)->where('service_id', '!=', '')->orderBy('created_at', 'desc')->first();


        if ($firstshop) {
            $car_id = $firstshop->id;
        }

        $car = [];
        $CarData = [];
        $SelectServices = [];
        $page_title = 'Account Settings';
        $reported_cars = Car::has('submittions')->get();
        $payment_methods = [];
        $idByCardIds = [];
        $carsShop = [];
        $car_service_data = array();
        $shopAllServices = ShopServices::where('status', 1)->get();
        if (auth()->user()->stripe_customer_id != null) {
            $idByCardIds = PaymentCard::pluck('id', 'card_id')->toArray();
            $payment_methods = \Stripe::paymentMethods()->all([
                'type' => 'card',
                'customer' => auth()->user()->stripe_customer_id,
            ]);
        }
        $states = State::where('country_id', '233')->where('status', '1')->orderBy('name', 'ASC')->get();
        $shopDetails = User::where('role', 2)->where('approve', 1)->get();
        if ($car = Car::find($car_id)) {
            $page_title = $car->title;
            $CarData = new Car;


            $vin = $car['vin'];
            
            $car = Car::with(['medias_picture'])->where('vin', $vin)->where('service_id', '!=','')->orderBy('service_date', 'DESC')->first();

            
       
            $CarData = $CarData->where('vin', $vin)->with('ownerHistory')->with('acHistory')->with('breakHistory')->with('carwashHistory')->with('userData')->orderBy('service_date', 'DESC')->first();

            $car_by_vin = Car::where('vin', $vin)->orderBy('service_date', 'ASC')->where('service_id', '!=','')->get()->pluck('service_id');
            $car_by_vin_car = Car::where('vin', $vin)->orderBy('service_date', 'ASC')->where('service_id', '!=','')->get()->pluck('id');


            $car_service_arr = array();
            
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


            $car_unique_services = array_unique($car_service_data);

            $service_data = $this->get_services($car_unique_services, $car_by_vin_car);


          
            
            $carsShop = Car::where('vin', $vin)->with('ownerHistory')->with('userData')->where('user_id', '!=', Auth::user()->id)->orderBy('service_date', 'DESC')->get();
            if (!empty($CarData->service_id)) {
                $SelectServices = ShopServices::whereIn('service_id', explode(',', $CarData->service_id))->get();
            }
            if(empty($car)){
                $car = Car::with(['medias_picture'])->where('vin', $vin)->orderBy('service_date', 'DESC')->first();
            }
        }
    

        return view('cars.view', compact('page_title', 'reported_cars', 'service_data', 'car_service_data', 'payment_methods', 'idByCardIds', 'page_title', 'car', 'CarData', 'SelectServices', 'shopDetails', 'carsShop', 'states', 'MyCar', 'shopAllServices'));
    }
    function date_compare($element1, $element2)
    {
        $datetime1 = strtotime($element1['created_at']);
        $datetime2 = strtotime($element2['created_at']);
        return $datetime2 - $datetime1;
    }

    public function get_services($car_service_data, $car_by_vin_car)
    {

        $car_service_dettail_arr = [];
        foreach ($car_service_data as $car_service => $car_service_value) {
            if ($car_service_value == '1') {
                $car_service_dettail_arr[] = AcServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '2') {
                $car_service_dettail_arr[] = BreakServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '3') {
                $car_service_dettail_arr[] = BatteryService::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '4') {
                $car_service_dettail_arr[] = CarWashServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '5') {
                $car_service_dettail_arr[] = CeramicCoating::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '6') {
                $car_service_dettail_arr[] = CollisionRepair::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '7') {
                $car_service_dettail_arr[] = ConciergeServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '8') {
                $car_service_dettail_arr[] = CustomBuildBody::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '9') {
                $car_service_dettail_arr[] = DealerShip::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '10') {
                $car_service_dettail_arr[] = DetailingCorrection::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '11') {
                $car_service_dettail_arr[] = ElectricControl::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '12') {
                $car_service_dettail_arr[] = EngineBlockServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '13') {
                $car_service_dettail_arr[] = ExhaustServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '14') {
                $car_service_dettail_arr[] = FabricationWelding::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '15') {
                $car_service_dettail_arr[] = FrameAlignment::with(['shop_user', 'shop_service'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '16') {
                $car_service_dettail_arr[] = FuelSystem::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '17') {
                $car_service_dettail_arr[] = GlassServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '18') {
                $car_service_dettail_arr[] = Lubrication::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '19') {
                $car_service_dettail_arr[] = Mechanical::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '20') {
                $car_service_dettail_arr[] = Nitrous::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '22') {
                $car_service_dettail_arr[] = OilServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '23') {
                $car_service_dettail_arr[] = PaintBody::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '24') {
                $car_service_dettail_arr[] = PaintProtectionFilm::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '25') {
                $car_service_dettail_arr[] = Parts::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '26') {
                $car_service_dettail_arr[] = PaintlessDentRepair::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '27') {
                $car_service_dettail_arr[] = PerformanceDynoTuning::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '28') {
                $car_service_dettail_arr[] = PowderCoating::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '29') {
                $car_service_dettail_arr[] = RaceTrack::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '31') {
                $car_service_dettail_arr[] = RimRepair::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '32') {
                $car_service_dettail_arr[] = Suspension::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '33') {
                $car_service_dettail_arr[] = SpecialtyOther::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '34') {
                $car_service_dettail_arr[] = Tires::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '35') {
                $car_service_dettail_arr[] = TintServices::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '36') {
                $car_service_dettail_arr[] = Transmission::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
            if ($car_service_value == '37') {
                $car_service_dettail_arr[] = Vinyl::with(['shop_user', 'shop_service','car_issue'])->whereIn('car_id', $car_by_vin_car)->get();
            }
        }
        $final_arr = [];
        foreach ($car_service_dettail_arr as $key_service => $value_service) {


            foreach ($value_service as $key_value => $service_val) {
                $final_arr[] = $service_val;
            }
        }
        usort($final_arr, array("App\Http\Controllers\CarController", "date_compare"));
        return $final_arr;
    }



    public function delete($id)
    {
        if ($car = Car::find($id)) {
            $car->delete();
            return $this->sendResponse();
        }
        return $this->sendError([], 'fail to delete car!');
    }

    public function viewservices(Request $request, $servicedata = null)
    {

        // error_reporting(0);


      


        $car = [];
        $CarData = [];
        $carsShop = [];
        $SelectServices = [];
        $page_title = 'Services';
        $carserviceId = explode("%%%", base64_decode($servicedata, true));

        // echo"<pre>";
        // print_r($carserviceId);
        // print_r(count($carserviceId));
        // die('stop');
        if(count($carserviceId)<3){
            $page_title = 'Dashboard';
            return view('dashboard.index', compact('page_title'));
            
        }
        $tab = 'vindashboard';
        $car_id = $carserviceId[0];
        $serviceId = $carserviceId[1];
        $nextservice = $carserviceId[2];
        $MyCar = $carserviceId[3];
        



        $id = $carserviceId[4];


        if (empty($nextservice)) {
            $nextservice = 0;
        }
        $shop_service = ShopServices::with('shop_detail')->where('service_id', $serviceId)->where('status', 1)->first();






        $shopDetails = User::where('role', 2)->where('approve', 1)->get();
        if ($car = Car::find($car_id)) {

            $vin = $car['vin'];
            
            $car_by_vin = Car::where('vin', $car['vin'])->where('service_id', '!=','')->get()->pluck('id');
            $car_by_vin_ser = Car::where('vin', $car['vin'])->where('service_id', '!=','')->get()->pluck('service_id');
            $car_service_arr = array();
            $car_service_data = [];
            $i = 0;

            foreach ($car_by_vin_ser as $car_key => $car_value) {

                if (!empty($car_value) && isset($car_value)) {

                    if ($i == 0) {
                        $car_services = explode(',', $car_value);
                        $car_service_arr = $car_services;
                        if(count($car_by_vin_ser) == 1)
                        {
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

            // echo "<pre>";
            // print_r($car_by_vin_ser);
            // die;

            $shopAllServices =  $this->check_services($shop_service, $car_by_vin, $serviceId);
            $latest_services =  $this->latest_services($shop_service, $car_by_vin, $serviceId);


            $page_title = $car->title;
            $CarDatas = new Car;
            $carsShop = Car::where('vin', $car->vin)->with('ownerHistory')->with('userData')->orderBy('id', 'DESC')->get();
            $mynxtservice = "";
            $newarray = explode(',', $car->service_id);
            sort($newarray, SORT_NUMERIC); //Sorts in reverse order, so high to low

            if (!empty($newarray[$nextservice + 1])) {

                $mynxtservice = $newarray[$nextservice + 1];
            }
            $nextservice = $nextservice + 1; 
            $xyz = implode(',', $newarray);
            $CarDatas = $CarDatas->where('id', $latest_services->car_id)->with(['PPF.PPFInstall_Detail'])->with('performance_dyno_tuning')->with('ownerHistory')->with('acHistory')->with('carwashHistory')->with('breakHistory')->with('userData')->with('carhandwashHistory')->with('carselfHistory')->with('cartunnelHistory')->with('concerigeHistory')->with('colisonRepair')->with('engineblockService')->with('exhaustService')->with('OilServices')->with('batteryServices')->with('powderCoatingServices')->with('tireServices')->with('partServices')->with('electricServices')->with('transmissionServices')->with('tintServices')->with('glassServices')->with('rimServices')->with('raceTrackServices')->with('spicalotherServices')->with('SuspensionServices')->with('spicalotherServices')->with('mechicalServices')->with('beforefragment')->with('afterfragment')->with('paintlessdentrepair')->with('vinlyservices')->first();


            $CarData = $this->current_service($shop_service, $id, $car_by_vin);

            // $next = BatteryService::where('battery_service_id', '<', $CarData->battery_service_id)->max('battery_service_id');
            
            // $nextservice = $next;
            // echo "<pre>"; print_r('h'); echo "<pre>"; print_r($CarData); die;
            $car = Car::where('vin',$car['vin'])->where('service_id', '!=','')->orderBy('updated_at','DESC')->first();
           
            if (!empty($CarData->service_id)) {
                $SelectServices = ShopServices::whereIn('service_id', explode(',', $CarData->service_id))->get();
            }
        }
        return view('cars.partials._tab-contents.service-view', compact('page_title', 'latest_services', 'car_service_data', 'tab', 'car', 'CarData','CarDatas', 'SelectServices', 'shopDetails', 'serviceId', 'mynxtservice', 'nextservice', 'carsShop', 'MyCar', 'shopAllServices'));
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

    public function check_services($shop_service, $car_id, $serviceId)
    {
        if ($shop_service['service_name'] == "AC Service") {
            $shopAllServices = AcServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('ac_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Battery Service") {
            $shopAllServices = BatteryService::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('battery_service_id', 'DESC')->get();

            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Brake Service") {
            $shopAllServices = BreakServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('break_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Car-Wash") {
            $shopAllServices = CarWashServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('wash_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Ceramic Coating") {
            $shopAllServices = CeramicCoating::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('ceramic_coating_id', 'DESC')->get();
            return $shopAllServices;
        }
        if ($shop_service['service_name'] == "Collision Repair") {
            $shopAllServices = CollisionRepair::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('collision_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Concierge Service") {
            $shopAllServices = ConciergeServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('conc_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Custom Build & Body") {
            $shopAllServices = CustomBuildBody::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('custom_build_body_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Dealership Service") {
            $shopAllServices = DealerShip::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('dealer_ship_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Detailing - Professional") {
            $shopAllServices = DetailingCorrection::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('detailing_correction_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Electrical|Controls /Specialty") {
            $shopAllServices = ElectricControl::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('electric_controls_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Engine Block Specialty") {
            $shopAllServices = EngineBlockServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('engine_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Exhaust") {
            $shopAllServices = ExhaustServices::with(['shop_user', 'shop_service.shop_detail','car_issue'])->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('exhaust_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Fabrication & Welding") {
            $shopAllServices = FabricationWelding::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('fabrication_welding', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Frame & Alignment") {
            $shopAllServices = FrameAlignment::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('frame_alignment_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Fuel System") {
            $shopAllServices = FuelSystem::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('fuel_system_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Glass Service") {
            $shopAllServices = GlassServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('glass_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Lubrication") {
            $shopAllServices = Lubrication::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('lubrication_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Mechanical") {
            $shopAllServices = Mechanical::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('mechanical_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Nitrous") {
            $shopAllServices = Nitrous::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('nitrous_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Oil Service") {
            $shopAllServices = OilServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('oil_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paint & Body") {
            $shopAllServices = PaintBody::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paint_body_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paint Protection Film (PPF)") {
            $shopAllServices = PaintProtectionFilm::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paint_protection_film_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Paintless Dent Repair (PDR)") {
            $shopAllServices = PaintlessDentRepair::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('paintless_dent_repair_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Parts") {
            $shopAllServices = Parts::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('part_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Performance | Dyno | Tuning") {
            $shopAllServices = PerformanceDynoTuning::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('performance_dyno_tuning_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Powder Coating") {
            $shopAllServices = PowderCoating::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('powder_coating_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Race & Track") {
            $shopAllServices = RaceTrack::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('race_track_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Rim Repair") {
            $shopAllServices = RimRepair::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('rim_repair_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Rims") {
            $shopAllServices = AcServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('battery_service_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Specialty-Other") {
            $shopAllServices = SpecialtyOther::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('specialty_other_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Suspension") {
            $shopAllServices = Suspension::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('suspension_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Tint") {
            $shopAllServices = TintServices::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('tint_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Tires") {
            $shopAllServices = Tires::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('tire_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Transmission") {
            $shopAllServices = Transmission::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('transmission_id', 'DESC')->get();
            return $shopAllServices;
        }

        if ($shop_service['service_name'] == "Vinyl Wraps") {
            $shopAllServices = Vinyl::with('shop_user', 'shop_service.shop_detail','car_issue')->whereIn('car_id', $car_id)->where('service_id', $serviceId)->orderBy('vinyl_id', 'DESC')->get();
            return $shopAllServices;
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
}
