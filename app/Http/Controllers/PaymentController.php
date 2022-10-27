<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Plan;
use App\Models\Payment;
use App\Models\PaymentCard;
use App\Http\Requests\Payment\DoRequest;
use App\Classes\StripePayment;

class PaymentController extends Controller
{
    public function index(Car $car)
    {
        $page_title = 'Reports Payment';
        $plans = Plan::all();
        $stripe_card = StripePayment::getDefaultCard();
        return view('payment.index', compact('page_title','car', 'plans', 'stripe_card'));
    }

    public function do(DoRequest $request)
    {
        $input = $request->all();
        $user = auth()->user();

        StripePayment::addPaymentMethod($user, $input);

        $plan = Plan::find($input['plan_id']);

        StripePayment::charge($user, $input, $plan);

        return redirect()->route('dashboard');
    }


}
