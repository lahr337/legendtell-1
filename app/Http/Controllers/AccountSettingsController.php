<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\SaveProfileRequest;
use App\Http\Requests\User\EmailExistsRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\SaveNotificationSettingRequest;
use App\Models\Car;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\ShopServices;
use App\Models\PaymentCard;
use App\Models\NotificationSetting;
use App\Classes\StripePayment;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\AddPaymentMethodRequest;
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

// Rapid changes start....................

use App\Models\OilServicesCustom;
use App\Models\CarIssue;

// Rapid changes end....................

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

class AccountSettingsController extends Controller
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

    public function index($tab = 'editProfile', $car_id = 1)
    {



        $car = [];
        $CarData = [];
        $SelectServices = [];
        $page_title = 'Account Settings';
        $reported_cars = Car::has('submittions')->get();
        $payment_methods = [];
        $idByCardIds = [];
        $carsShop = [];
        $car_service_arr = array();
        $car_service_data = array();
        $service_data = [];
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

            $car_by_vin = Car::where('vin', $car['vin'])->orderBy('service_date', 'ASC')->where('service_id', '!=','')->get()->pluck('service_id');
            $car_by_vin_car = Car::where('vin', $car['vin'])->orderBy('service_date', 'ASC')->where('service_id', '!=','')->get()->pluck('id');



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
            $vin = $car['vin'];

            $car = Car::with(['medias_picture'])->where('vin', $vin)->where('service_id', '!=','')->orderBy('service_date', 'DESC')->first();

            $CarData = $CarData->where('vin', $vin)->with('ownerHistory')->with('acHistory')->with('breakHistory')->with('carwashHistory')->with('userData')->orderBy('service_date', 'DESC')->first();
            $carsShop = Car::where('vin', $vin)->with('ownerHistory')->with('userData')->orderBy('updated_at', 'DESC')->get();

            if (!empty($CarData->service_id)) {
                $SelectServices = ShopServices::whereIn('service_id', explode(',', $CarData->service_id))->get();
            }
            if(empty($car)){
                $car = Car::with(['medias_picture'])->where('vin', $vin)->orderBy('service_date', 'DESC')->first();
            }
        }
        return view('account-settings.index', compact('page_title', 'tab','service_data', 'car_service_data', 'reported_cars', 'payment_methods', 'idByCardIds', 'page_title', 'car', 'CarData', 'SelectServices', 'shopDetails', 'carsShop', 'states', 'shopAllServices'));
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

    public function makeDefaultPaymentMethod($id)
    {
        $payment_method = PaymentCard::find($id);
        if ($payment_method) {
            if ($this->setDefaultPaymentMethod($payment_method)) {
                return $this->sendResponse();
            }
        }
        return $this->sendError([], "Fail to make default");
    }

    public function deletePaymentMethod($id)
    {
        $user = auth()->user();
        $payment_method = PaymentCard::find($id);
        if ($payment_method) {
            $payment_method->delete();
            $card = \Stripe::cards()->delete($user->stripe_customer_id, $payment_method->card_id);
            if ($card && $this->setDefaultPaymentMethod()) {
                return $this->sendResponse();
            }
        }
        return $this->sendError([], "Fail to delete payment method");
    }

    public function setDefaultPaymentMethod(PaymentCard $payment_method = null, User $user = null)
    {
        $user = $user ?? auth()->user();
        if (PaymentCard::count() == 0) {
            $user->update(['stripe_default_card_id' => null]);
            return true;
        }
        $payment_method = $payment_method ?? PaymentCard::orderBy('id', 'desc')->first();
        if ($payment_method) {
            $customer = \Stripe::customers()->update($user->stripe_customer_id, [
                'default_source'    => $payment_method->card_id,
            ]);
            $user->update(['stripe_default_card_id' => $payment_method->card_id]);
            return true;
        }
        return false;
    }

    public function addPaymentMethod(AddPaymentMethodRequest $request)
    {
        $input = $request->all();
        $user = auth()->user();
        $payment_method = [];
        if ($paymentData = StripePayment::addPaymentMethod($user, $input + ['payment_source' => 'new'])) {
            return $paymentData['payment_card'];
            // if($paymentData['payment_card']) {
            //     $db_id = $paymentData['payment_card']->id;
            //     $payment_method['id'] = $paymentData['card']['id'];
            //     $payment_method['card'] = $paymentData['card'];
            //     return view('account-settings.partials._content._payment-method-item', compact('db_id', 'payment_method'));
            // }
        }
        // return $this->sendError([], "Fail to add payment method");
    }

    /**
     * save Profile.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function saveProfile(SaveProfileRequest $request)
    {
        if ($user = \Auth::user()) {
            $input = $request->except(['password', 'current_password', '_token', '_method']);

            // if( isset($input['avatar']) && $file = $input['avatar'] ){
            //     $fileName = time().'.'.$file->getClientOriginalExtension();
            //     $file->move(public_path().'/storage/uploads/users/', $fileName);
            //     // $file->move(storage_path('app/public/uploads/users/'), $fileName);
            //     $input['avatar'] = $fileName;
            // }
            if (isset($input['avatar']) && $file = $input['avatar']) {
                // return public_path().'/storage/uploads/shoplogo/';
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                // $file->move(public_path().'/storage/uploads/users/', $fileName);
                // $imageName = time().'.'.$request->image->extension();

                $path = Storage::disk('s3')->put('User', $file);

                $path = Storage::disk('s3')->url($path);
                $input['avatar'] = $path;
            }
            $user->update($input + ['status' => 'active']);
        }
        return $this->sendResponse();
    }

    public function emailExists(EmailExistsRequest $request)
    {
        return $this->sendResponse();
    }

    /**
     * change password.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        if ($user = \Auth::user()) {
            $input = $request->all();
            if (\Hash::check($input['current_password'], $user->password)) {
                $user->update([
                    'password'  => \Hash::make($input['password']),
                ]);
                return $this->sendResponse();
            } else {
                return $this->sendValidationError('current_password', 'password not match');
            }
        }
        return $this->sendError([], "something want wrong");
    }

    public function saveNotificationSetting(SaveNotificationSettingRequest $request)
    {
        if ($user = \Auth::user()) {
            if ($request->notifications)
                $input = $request->notifications;
            else
                $input = [
                    'open_recall' => 0,
                    'oil_change_due' => 0,
                    'tire_rotation_due' => 0,
                    'safety_inspection_due' => 0,
                    'registration_due' => 0,
                    'emissions_inspection_due' => 0,
                    'leave_service_review' => 0,
                    'monthly_vehicle_report' => 0,
                    'add_vehicle_reminder' => 0,
                    'still_own_vehicle' => 0,
                ];
            NotificationSetting::updateOrCreate(['user_id' => $user->id], $input);
            return $this->sendResponse();
        }
        return $this->sendError([], "something want wrong");
    }

    public function userservices(Request $request, $servicedata = null)
    {
        $car = [];
        $CarData = [];
        $carsShop = [];
        $SelectServices = [];
        $page_title = 'Services';
        $carserviceId = explode("%%%", base64_decode($servicedata, true));
        $tab = 'vindashboard';
        $car_id = $carserviceId[0];
        $serviceId = $carserviceId[1];
        $nextservice = $carserviceId[2];
        if (empty($nextservice)) {
            $nextservice = 0;
        }
        $id = $carserviceId[3];
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

            $shopAllServices =  $this->check_services($shop_service, $car_by_vin, $serviceId);
            $latest_services =  $this->latest_services($shop_service, $car_by_vin, $serviceId);
            $page_title = $car->title;
            $CarDatas = new Car;
            // $carsShop = Car::where('vin', $car->vin)->with('ownerHistory')->with('userData')->where('user_id', '!=', Auth::user()->id)->whereNotNull('service_date')->orderBy('id', 'DESC')->get();
            $carsShop = Car::where('vin', $car->vin)->with('ownerHistory')->with('userData')->whereNotNull('service_date')->orderBy('id', 'DESC')->get();


            // echo"<pre>";
            
            // print_r(Auth::user()->id);
            // print_r($car->vin);
            // die('car shop');


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

            // Rapid changes start....................

            $serviceDataCustom = $checkCarData = [];
            $service_id = 22;
            if($CarData){
                $serviceDataCustom=OilServicesCustom::where('oil_id',$CarData->oil_id)->first();
            }
            $checkCarData=CarIssue::where('car_id',$car_id)->where('service_id',$service_id)->where('user_id',auth()->user()->id)->first();

            // Rapid changes start....................


            // echo "<pre>";
            // print_r($serviceDataCustom);
            // die;
            $car = Car::where('vin',$car['vin'])->where('service_id', '!=','')->orderBy('updated_at','DESC')->first();
            if (!empty($CarDatas->service_id)) {
                $SelectServices = ShopServices::whereIn('service_id', explode(',', $CarDatas->service_id))->get();
            }
        }

        return view('account-settings.web._vin-dashboard-service', compact('page_title', 'tab', 'latest_services', 'car_service_data', 'car', 'CarData', 'serviceDataCustom', 'checkCarData', 'SelectServices', 'shopDetails', 'serviceId', 'mynxtservice', 'nextservice', 'carsShop', 'shopAllServices'));
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
