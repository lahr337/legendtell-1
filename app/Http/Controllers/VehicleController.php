<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class VehicleController extends Controller
{
    public function view($id)
    {
        if($car = Car::find($id)){
            $page_title = $car->title;
            return view('vehicle.view', compact('car','page_title'));
        }
        return redirect()->back();
    }

    public function appraisal($id)
    {
        if($car = Car::find($id)){
            $page_title = $car->title;
            return view('vehicle.appraisal', compact('car','page_title'));
        }
        return redirect()->back();
    }
}
