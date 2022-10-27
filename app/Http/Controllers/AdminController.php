<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\SaveProfileRequest;
use App\Http\Requests\User\EmailExistsRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\SaveNotificationSettingRequest;
use App\Models\Car;
use App\Models\ShopServices;
use App\Models\PaymentCard;
use App\Models\NotificationSetting;
use App\Classes\StripePayment;
use App\Http\Requests\User\AddPaymentMethodRequest;
use App\Models\ShopApparisal;
use App\Http\Controllers\CommonController;
use App\Models\CarUser;
use App\Models\CarOwnerHistory;
use App\Services\NhtsaApi;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index($tab = 'editProfile')
    {
        if (auth()->user()->role == 1) {
            $page_title = 'Admin Settings';
            $reported_cars = Car::has('submittions')->get();
            $shopApperisal = ShopApparisal::where('status', 1)->with('shopapperisalRequest')->get();
            $servicesData = ShopServices::where('status', 1)->orderBy('service_id', 'DESC')->get();
            $SelectServices = ShopServices::where('status', 1)->orderBY('service_name', 'ASC')->get();

            $payment_methods = [];
            $idByCardIds = [];
            if (auth()->user()->stripe_customer_id != null) {
                $idByCardIds = PaymentCard::pluck('id', 'card_id')->toArray();
                $payment_methods = \Stripe::paymentMethods()->all([
                    'type' => 'card',
                    'customer' => auth()->user()->stripe_customer_id,
                ]);
            }
            $VInGet = Car::get();

            return view('admin-settings.index', compact('page_title', 'tab', 'reported_cars', 'VInGet', 'SelectServices', 'payment_methods', 'idByCardIds', 'servicesData', 'shopApperisal'));
        } else {
            return redirect('/');
        }
    }

    public function vinIndex(Request $request)
    {

        $carData = new Car;
        $carData = $carData->with('ownerHistory');
        if (!empty($request->car_id) || $request->car_id != "") {
            $id = base64_decode(trim($request->car_id));
            $carData = $carData->where('id',$id)->first();
        } else {
            echo "no id";
        }
        return ['status' => true, 'message' => 'data retreived successfully', 'data' => $carData, 'type' => 'string'];

        // return redirect()->with('testdata')->back();
    }
    public function saveProfile(SaveProfileRequest $request)
    {
        print_r($request->all());
        die();

        if ($user = \Auth::user()) {
            $input = $request->except(['password', 'current_password', '_token', '_method']);

            if (isset($input['avatar']) && $file = $input['avatar']) {
                // return public_path().'/storage/uploads/shoplogo/';
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/storage/uploads/users/', $fileName);
                $input['avatar'] = $fileName;
            }
            //photoshop
            if (isset($input['shop_photo']) && $file = $input['shop_photo']) {
                // return public_path().'/storage/uploads/shoplogo/';
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path() . '/storage/uploads/shopphoto/', $fileName);
                $input['shop_photo'] = $fileName;
            }

            $user->update($input + ['status' => 'active']);
        }
        return $this->sendResponse();
    }



    public function ownerData($data, $status)
    {
        DB::beginTransaction();
        try {
            $meesageback = "";
            $ownerHistory = new CarOwnerHistory;


            if ($status == 'update') {
                $meesageback = "update";
                $ownerHistory = $ownerHistory->where('car_id', $data["car_id"])->first();
                $vin_find = Car::find($data["car_id"]);
                $cardata = Car::where('vin', $vin_find["vin"])->update(['milage' => $data["owner_mileage"], 'color' => $data['color']]);
            }

            $ownerHistory->car_id = $data["car_id"];
            $ownerHistory->owner_firstname = $data["owner_firstname"];
            $ownerHistory->owner_lastname = $data["owner_lastname"];
            $ownerHistory->owner_email = $data["owner_email"];
            $ownerHistory->owner_address = $data["owner_address"];
            $ownerHistory->owner_date = $data["owner_date"];
            $ownerHistory->service_completed = $data["service_completed"];
            $ownerHistory->service_done = $data["service_done"];
            $ownerHistory->owner_document = $data["owner_document"];
            $ownerHistory->save();
            $vinid = base64_encode($data["car_id"]);
            DB::commit();
            $auth_id = Auth::id();

            $user = User::where('id', $auth_id)->first();
            $shop_services = substr_count($user['shop_services'], ',') + 1;

                return ['status' => true, 'message' => 'Insert Vin Number Successfully', 'data' => $vinid, 'type' => 'string', 'messagestatus' => $meesageback];
            
        } catch (Exception $e) {
            //rollback booking query in case of any type of error
            DB::rollback();
        }
    }

    public function vinInput(Request $request)
    {


        $ownerdoc = '';
        $insert = array();
        $img_arr = array();
        $service = auth()->user()->shop_services;


        


        $ownerHistory =  CarOwnerHistory::where('car_id', $request->car_id)->first();
        $remove_products_ids = explode(",", $_POST['remove_products_ids']);
        if ($ownerHistory && $request->vin) {
            $owner_document = explode(',', $ownerHistory->owner_document);


            if (isset($_POST['remove_products_ids']) && $remove_products_ids[0] != "") {

                $remove_products_ids = explode(",", $_POST['remove_products_ids']);

                foreach ($owner_document as $doc_key => $doc_value) {
                    if (!in_array($doc_key, $remove_products_ids)) {
                        $img_arr[$doc_key]['path'] = $doc_value;
                    }
                }
            } else {
                foreach ($owner_document as $doc_key => $doc_value) {
                    $img_arr[$doc_key]['path'] = $doc_value;
                }
            }
        }

        if ($request->hasfile('products_uploaded')) {

            if (isset($_POST['remove_products_ids']) && $remove_products_ids[0] != "") {
                $remove_products_ids = explode(",", $_POST['remove_products_ids']);
            }
            foreach ($request->file('products_uploaded') as $key => $file) {

                // if (!in_array($key, $remove_products_ids)) {
                $fileName = time() . $key . '.' . $file->getClientOriginalExtension();
                $path1 = Storage::disk('s3')->put('onwerdoc', $file);

                $path1 = Storage::disk('s3')->url($path1);
                $insert[$key]['path'] = $path1;
            }
            $insert = array_merge($insert, $img_arr);
            // }

            $ownerdoc = implode(" , ", array_column($insert, 'path'));
        } else {
            $ownerdoc = implode(" , ", array_column($img_arr, 'path'));
        }

        $input = $request->except(['_token']);

        if ($request->vin) {
           
            if (!empty($request->car_id) || $request->car_id != '') {
                $insertdata['car_id'] = $request->car_id;
                $insertdata['owner_firstname'] = $request->ownerfirstname;
                $insertdata['owner_lastname'] = $request->ownerlastname;
                $insertdata['owner_email'] = $request->owner_email;
                $insertdata['owner_address'] = $request->owner_address;
                $insertdata['owner_date'] = $request->owner_date;
                $insertdata['service_completed'] = $request->service_completed;
                $insertdata['service_done'] = $request->service_done;
                $insertdata['owner_document'] = $ownerdoc;
                $insertdata['owner_mileage'] = $request->owner_mileage;
                $insertdata['color'] = $request->color;
                $insertdata = $this->ownerData($insertdata, 'update');
                return $insertdata;
            }
            $data = NhtsaApi::getByVIN($request->vin);
            $carDatafetch = Car::where('vin', $request->vin)->where('user_id', auth()->user()->id)->first();
            if ($carDatafetch) {
                return ['status' => false, 'message' => 'Vin Number already enter', 'type' => 'already'];
            }
            if (isset($data['Results'])) {
                $result = current($data['Results']);
                if (isset($result['ModelYear']) && !empty($result['ModelYear'])) {
                    $car = new Car;

                    $car->trims = $result;
                    $car->ref_type = 'nhtsa';
                    $car->make = $result['Make'];
                    $car->model = $result['Model'];
                    $car->year = $result['ModelYear'];
                    $car->drive = $result['DriveType'];
                    $car->vin = $result['VIN'];
                    $car->milage = $request->owner_mileage;
                    $car->color = $request->color;
                    $car->user_id = auth()->user()->id;
                    $car->model_engine_cc = $result['EngineCycles'];
                    $car->model_engine_cyl = $result['EngineCylinders'];
                    $car->model_engine_type = $result['EngineConfiguration'];
                    $car->save();
                    $car_user = CarUser::create(['car_id' => $car->id, 'user_id' => auth()->user()->id]);
                    $data['car_id'] = $car->id;
                    $data['owner_firstname'] = $request->ownerfirstname;
                    $data['owner_lastname'] = $request->ownerlastname;
                    $data['owner_email'] = $request->owner_email;
                    $data['owner_address'] = $request->owner_address;
                    $data['owner_date'] = $request->owner_date;
                    $data['service_completed'] = $request->service_completed;
                    $data['service_done'] = $request->service_done;
                    $data['owner_document'] = $ownerdoc;
                    $data = $this->ownerData($data, 'insert');
                    return $data;
                } else {
                    return ['status' => false, 'message' => 'Vin Number not found', 'type' => 'string'];
                }
            }
        }
    }

    public function vinSearch(Request $request)
    {

        $searchdata =  Car::join('car_owner_histories', 'car_owner_histories.car_id', '=', 'cars.id');
        if (!empty($request->vin_no) || $request->vin_no != '') {
            $searchdata = $searchdata->where('cars.vin', $request->vin_no);
        }
        $searchdata = $searchdata->get();

        $vindata = "";
        if (count($searchdata) > 0) {
            foreach ($searchdata as $searchlist) {
                $vinNO = base64_encode($searchlist->id);
                $vindata .= '<a href="javascript:void(0)" class="getVinNumbersearch" data-tab="edit_vin_dashboard" id="' . $vinNO . '">' . $searchlist->vin . '</a>';
            }
            return ['status' => true, 'data' => $vindata, 'type' => 'string'];
        } else {
            return ['status' => false, 'data' => '', 'type' => 'string'];
        }
    }
}
