<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\SaveProfileRequest;
use App\Http\Requests\User\EmailExistsRequest;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\SaveNotificationSettingRequest;
use App\Models\Car;
use App\Models\User;
use App\Models\ShopServices;
use App\Models\Country;
use App\Models\State;
use App\Models\PaymentCard;
use App\Models\NotificationSetting;
use App\Classes\StripePayment;
use App\Models\ShopApparisal;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\User\AddPaymentMethodRequest;

class ShopSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //edit profile
    public function index($tab = 'editProfile')
    {
        if(auth()->user()->role==2 || auth()->user()->role==1)
        {

       
            $page_title = 'Profile Editor';
            $reported_cars = Car::has('submittions')->get();
            $VInGet = Car::where('user_id',auth()->user()->id)->get();
            $allShopSerives=ShopServices::where('status',1)->orderBY('service_name','ASC')->get();
            $states=State::where('country_id','233')->where('status','1')->orderBy('name','ASC')->get();
            $SelectServices=ShopServices::whereIn('service_id',explode(',',auth()->user()->shop_services))->where('status',1)->orderBY('service_name','ASC')->get();
            $apprisasetting=ShopApparisal::where('user_id',auth()->user()->id)->first();
            $payment_methods = [];
            $idByCardIds = [];
            if(auth()->user()->stripe_customer_id != null){
                $idByCardIds = PaymentCard::pluck('id','card_id')->toArray();
                $payment_methods = \Stripe::paymentMethods()->all([
                    'type' => 'card',
                    'customer' => auth()->user()->stripe_customer_id,
                ]);
            }

            return view('shop-settings.index', compact('page_title','tab','reported_cars','payment_methods','idByCardIds','allShopSerives','SelectServices','VInGet','states','apprisasetting'));
        }
        else{
            return redirect('/');
        }
    }
    public function allServices(Request $request)
    {
        $page_title = 'All Services';
        $allShopSerives=ShopServices::where('status',1)->orderBY('service_name','ASC')->get();
        return view('shop-settings.partials.all-services', compact('page_title','allShopSerives'));
    }
    public function makeDefaultPaymentMethod($id){
        $payment_method = PaymentCard::find($id);
        if($payment_method){
            if($this->setDefaultPaymentMethod($payment_method)){
                return $this->sendResponse();
            }
        }
        return $this->sendError([], "Fail to make default");
    }

    public function deletePaymentMethod($id){
        $user = auth()->user();
        $payment_method = PaymentCard::find($id);
        if($payment_method){
            $payment_method->delete();
            $card = \Stripe::cards()->delete($user->stripe_customer_id, $payment_method->card_id);
            if($card && $this->setDefaultPaymentMethod()){
                return $this->sendResponse();
            }
        }
        return $this->sendError([], "Fail to delete payment method");
    }

    public function setDefaultPaymentMethod(PaymentCard $payment_method = null, User $user = null){
        $user = $user ?? auth()->user();
        if(PaymentCard::count() == 0) {
            $user->update(['stripe_default_card_id' => null]);
            return true;
        }
        $payment_method = $payment_method ?? PaymentCard::orderBy('id','desc')->first();
        if($payment_method){
            $customer = \Stripe::customers()->update($user->stripe_customer_id, [
                'default_source'    => $payment_method->card_id,
            ]);
            $user->update(['stripe_default_card_id' => $payment_method->card_id]);
            return true;
        }
        return false;
    }

    public function addPaymentMethod(AddPaymentMethodRequest $request){
        $input = $request->all();
        $user = auth()->user();
        $payment_method = [];
        if($paymentData = StripePayment::addPaymentMethod($user, $input + ['payment_source' => 'new'])){
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
       
        if($user = \Auth::user()){
            $input = $request->except(['password','current_password','_token','_method']);

            if( isset($input['avatar']) && $file = $input['avatar'] ){
                $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = Storage::disk('s3')->put('Shop', $file);
       
             $path = Storage::disk('s3')->url($path);
                $input['avatar'] = $path;
            }
            //photoshop
            if( isset($input['shop_photo']) && $file = $input['shop_photo'] ){
                $fileName = time().'.'.$file->getClientOriginalExtension();
                $path = Storage::disk('s3')->put('Shop', $file);
       
                 $path = Storage::disk('s3')->url($path);
                $input['shop_photo'] = $path;
            }

            $user->update($input+['status' => 'active']);
        }

    
        return $this->sendResponse();
    }

    public function emailExists(EmailExistsRequest $request){
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
        if($user = \Auth::user()){
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
        return $this->sendError([],"something want wrong");
    }

    public function saveNotificationSetting(SaveNotificationSettingRequest $request){
        if($user = \Auth::user()){
            if($request->notifications)
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
            NotificationSetting::updateOrCreate(['user_id' => $user->id],$input);
            return $this->sendResponse();
        }
        return $this->sendError([],"something want wrong");
    }

    public function saveShopService(Request $request)
    {
        if(!empty($request['serviceCheck']))
        {
            $servicedata= implode(',',$request['serviceCheck']);
            $updateService=User::where('id',auth()->user()->id)->update(['shop_services' => $servicedata]);
            return true;
        }
        else{
            return false;
        }
    //     return count($request['serviceCheck']);
    //    $servicedata= implode(',',$request['serviceCheck']);

    }
    public function FetchgetVinList($mytab)
    {
        $page_title = 'Shop Settings';
       return $VInGet = Car::where('user_id',auth()->user()->id)->get();
      
    }
   
}
