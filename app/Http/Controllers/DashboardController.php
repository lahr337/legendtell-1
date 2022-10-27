<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Services\NhtsaApi;
use App\Services\CarsxeApi;
use App\Models\CarUser;

class DashboardController extends Controller
{


    public function index()
    {
        $page_title = 'Dashboard';
        return view('dashboard.index', compact('page_title'));
    }

    public function search(Request $request)
    {
        $search = $request->all();
        
 
        $carsNew = Car::where($search)->with('ownerHistory')->with('userData')->orderBy('service_date','DESC')->first();

        if ($carsNew) {
            $cars = Car::where($search)->with('ownerHistory')->with('userData')->orderBy('service_date','DESC')->first();
       
        } else {

            if ($search['vin']) {
                $data = NhtsaApi::getByVIN($search['vin']);

                if (isset($data['Results'])) {

                    $result = current($data['Results']);
                
                    if (isset($result['ModelYear']) && !empty($result['ModelYear'])) {
                        $car = new Car();
                       
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
                        $cars = Car::where('vin', $result['VIN'])->with('ownerHistory')->with('userData')->orderBy('service_date','DESC')->first();
                    } else {
                        echo "";
                    }
                }
            }
        }
        return $this->sendResponse(view('dashboard.partials._found', compact('cars'))->render());
    }
}
