<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarOfferSubmition;

class SaleController extends Controller
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

    public function offerSubmit(Car $car)
    {
        CarOfferSubmition::create([
            'car_id'            =>  $car->id,
            'sender_id'         =>  auth()->user()->id,
            'offer_amount'      =>  $car->appraisal ? $car->appraisal->market_value : 0,
        ]);
        return $this->sendResponse();
    }
}
