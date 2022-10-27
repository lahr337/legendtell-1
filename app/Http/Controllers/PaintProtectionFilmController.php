<?php

namespace App\Http\Controllers;

use App\Models\PaintProtectionFilm;
use App\Models\PPFInstallDetail;
use Illuminate\Http\Request;

class PaintProtectionFilmController extends Controller
{
    public function indexPaintProtectionFilm(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Rim Repair";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = PaintProtectionFilm::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();
        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.paint-protection-film-ppf', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function installDetails(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $id = $request->id;
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Rim Repair";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = PPFInstallDetail::where('paint_protection_films_id', $request->id)->where('user_id', auth()->user()->id)->first();
        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.install-details', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title','id'));
    }

    public function savePaintProtectionFilm(Request $request)
    {
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
        $mainid = base64_decode($request->carShopService);
        $carserviceId = explode("%%%", base64_decode($request->carShopService));
        $issue_id = base64_decode($request->issue_id);

        if (empty($carserviceId[1])) {
            return "no carid";
        }
        $serviceId = $carserviceId[1];
        $car_id = base64_decode($carserviceId[0]);
        if ($commonClass->checkCar($car_id) == 'fail') {
            return "wroungdata";
        }
        $serviceData = $commonClass->checkServiceId($carserviceId[1]);

        if ($commonClass->checkServiceId($carserviceId[1]) == 'fail') {
            return "wroungdata";
        }
        $products_uploaded = '';


        $img_arr = array();


        if ($request->hasfile('image_uploaded')) {
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'ppf', $img_arr);
        } 
        $paint_protection_film = new PaintProtectionFilm();
        $paint_protection_film->user_id = auth()->user()->id;
        $paint_protection_film->car_id = $car_id;
        $paint_protection_film->service_id = $serviceId;
        $paint_protection_film->document = $products_uploaded;
        $paint_protection_film->film_manufacturer = $request->film_manufacturer;
        $paint_protection_film->film_thickness = $request->film_thickness;
        $paint_protection_film->registered = $request->registered;
        $paint_protection_film->registered_company = $request->registered_company;
        $paint_protection_film->is_waranty = $request->is_waranty;
        $paint_protection_film->waranty_company = $request->waranty_company;
        $paint_protection_film->annual_required = $request->annual_required;
        $paint_protection_film->annual_completed = $request->annual_completed;
        $paint_protection_film->description = $request->description;
        $paint_protection_film->car_issue_id = $issue_id;

        if ($paint_protection_film->save()) {
            $commonClass = new CommonController; 
            $commonClass->addServiceData($car_id, $serviceId);

            $checkservice = explode(',', auth()->user()->shop_services);
            if (count($checkservice) < 1) {

                return redirect()->route('shop-settings.mydashboard', ['myshopServices']);
                $redirecturl = '/shop-settings/mydashboard';
            } else {
                $carid = base64_encode($car_id);
                $redirecturl = "/shop-settings/install-details?id=$paint_protection_film->paint_protection_film_id&servicedata=$request->carShopService";
            }
            return $redirecturl;
        } else {
            return "fail";
        }
    }

    public function savePPFDetails(Request $request)
    {
        // echo "<pre>"; print_r($request->all()); die;
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
        $mainid = base64_decode($request->carShopService);
        $carserviceId = explode("%%%", base64_decode($request->carShopService));

        if (empty($carserviceId[1])) {
            return "no carid";
        }
        $serviceId = $carserviceId[1];
        $car_id = base64_decode($carserviceId[0]);
        if ($commonClass->checkCar($car_id) == 'fail') {
            return "wroungdata";
        }
        $serviceData = $commonClass->checkServiceId($carserviceId[1]);

        if ($commonClass->checkServiceId($carserviceId[1]) == 'fail') {
            return "wroungdata";
        }
        $products_uploaded = '';


        $img_arr = array();


        // $paint_protection_film_check =  PPFInstallDetail::where('car_id', $car_id)->where('service_id', $serviceId)->where('user_id', auth()->user()->id)->first();


        // if ($paint_protection_film_check) {
        //     if (!empty($paint_protection_film_check->document)) {

        //         $documents = explode(',', $paint_protection_film_check->document);
        //         $remove_products_ids = explode(",", $_POST['remove_products_ids']);

        //         if (isset($_POST['remove_products_ids']) && $remove_products_ids[0] != "") {
        //             foreach ($documents as $doc_key => $doc_value) {
        //                 if (!in_array($doc_key, $remove_products_ids)) {
        //                     $img_arr[$doc_key]['path'] = $doc_value;
        //                 }
        //             }
        //         } else {
        //             foreach ($documents as $doc_key => $doc_value) {
        //                 $img_arr[$doc_key]['path'] = $doc_value;
        //             }
        //         }
        //     }
        // }

        if ($request->hasfile('image_uploaded')) {
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'ppf-detail', $img_arr);
        }
        //  else {
        //     $products_uploaded = implode(" , ", array_column($img_arr, 'path'));
        // }

        $ppf_install_detail = new PPFInstallDetail();
        // $serviceData = PPFInstallDetail::where('car_id', $car_id)->where('service_id', $serviceId)->where('user_id', auth()->user()->id)->first();
        // if ($serviceData) {
        //     $ppf_install_detail = $ppf_install_detail->where('car_id', $car_id)->where('service_id', $serviceId)->where('user_id', auth()->user()->id)->first();
        // }

        $ppf_install_detail->user_id=auth()->user()->id;
        $ppf_install_detail->car_id = $car_id;
        $ppf_install_detail->service_id = $serviceId;
        $ppf_install_detail->paint_protection_films_id=$request->paint_protection_films_id;
        $ppf_install_detail->type=$request->type;
        if($request->type=='Car')
        {
            $ppf_install_detail->hood=$request->hood_car;
            $ppf_install_detail->roof=$request->roof_car;
            $ppf_install_detail->trunk=$request->trunk_car;
            $ppf_install_detail->hatch=$request->hatch_car;
            $ppf_install_detail->front_bumper=$request->front_bumper_car;
            $ppf_install_detail->rear_bumper=$request->rear_bumper_car;
            $ppf_install_detail->wrap_brand=$request->wrap_brand_car;
            $ppf_install_detail->wrap_color=$request->wrap_color_car;
            $ppf_install_detail->is_waranty=$request->is_waranty_car;
            $ppf_install_detail->waranty_company=$request->waranty_company_car;
            $ppf_install_detail->driver_front_quarter_panel=$request->driver_front_quarter_panel_car;
            $ppf_install_detail->driver_rear_quarter_panel=$request->driver_rear_quarter_panel_car;
            $ppf_install_detail->driver_front_door=$request->driver_front_door_car;
            $ppf_install_detail->driver_rear_door=$request->driver_rear_door_car;
            $ppf_install_detail->driver_a_piller=$request->driver_a_piller_car;
            $ppf_install_detail->driver_b_piller=$request->driver_b_piller_car;
            $ppf_install_detail->driver_c_piller=$request->driver_c_piller_car;
            $ppf_install_detail->driver_rocker_panel=$request->driver_rocker_panel_car;
            $ppf_install_detail->driver_mirror=$request->driver_mirror_car;
            $ppf_install_detail->pref_driver_window=$request->pref_driver_window_car;
            $ppf_install_detail->pass_front_quarter_panel=$request->pass_front_quarter_panel_car;
            $ppf_install_detail->pass_rear_quarter_panel=$request->pass_rear_quarter_panel_car;
            $ppf_install_detail->passenger_rear_door=$request->passenger_rear_door_car;
            $ppf_install_detail->passenger_front_door=$request->passenger_front_door_car;
            $ppf_install_detail->pass_a_piller=$request->pass_a_piller_car;
            $ppf_install_detail->pass_b_piller=$request->pass_b_piller_car;
            $ppf_install_detail->pass_c_piller=$request->pass_c_piller_car;
            $ppf_install_detail->passenger_rocker_panel=$request->passenger_rocker_panel_car;
            $ppf_install_detail->passenger_mirror=$request->passenger_mirror_car;
            $ppf_install_detail->pref_passenger_window=$request->pref_passenger_window_car;
            $ppf_install_detail->pref_back_windshield=$request->pref_back_windshield_car;
            $ppf_install_detail->tailgate=$request->tailgate_car;
            $ppf_install_detail->document=$products_uploaded;
            $msg = 'Car/Truck/Suv Added successfully!';
        }

        if($request->type=='Van')
        {
            $ppf_install_detail->hood=$request->hood_van;
            $ppf_install_detail->roof=$request->roof_van;
            $ppf_install_detail->back_doors=$request->back_doors;
            $ppf_install_detail->hatch=$request->hatch_van;
            $ppf_install_detail->front_bumper=$request->front_bumper_van;
            $ppf_install_detail->rear_bumper=$request->rear_bumper_van;
            $ppf_install_detail->wrap_brand=$request->wrap_brand_van;
            $ppf_install_detail->wrap_color=$request->wrap_color_van;
            $ppf_install_detail->is_waranty=$request->is_waranty_van;
            $ppf_install_detail->waranty_company=$request->waranty_company_van;
            $ppf_install_detail->driver_front_quarter_panel=$request->driver_front_quarter_panel_van;
            $ppf_install_detail->driver_rear_quarter_panel=$request->driver_rear_quarter_panel_van;
            $ppf_install_detail->driver_mirror=$request->driver_mirror_van;
            $ppf_install_detail->passenger_mirror=$request->passenger_mirror_van;
            $ppf_install_detail->driver_front_door=$request->driver_front_door_van;
            $ppf_install_detail->driver_rear_door=$request->driver_rear_door_van;
            $ppf_install_detail->passenger_front_door=$request->passenger_front_door_van;
            $ppf_install_detail->passenger_rear_door=$request->passenger_rear_door_van;
            $ppf_install_detail->pass_front_quarter_panel=$request->pass_front_quarter_panel_van;
            $ppf_install_detail->pass_rear_quarter_panel=$request->pass_rear_quarter_panel_van;
           $ppf_install_detail->pref_driver_window=$request->pref_driver_window_van;
           $ppf_install_detail->pref_passenger_window=$request->pref_passenger_window_van;
           $ppf_install_detail->pref_back_windshield=$request->pref_back_windshield_van;
           $ppf_install_detail->document=$products_uploaded;
           $msg = 'Van Added successfully!';
        }
        if($request->type=='RV')
        {
            $ppf_install_detail->hood=$request->hood_rv;
            $ppf_install_detail->front=$request->front_rv;
            $ppf_install_detail->rear=$request->rear_rv;
            $ppf_install_detail->roof=$request->roof_rv;
            $ppf_install_detail->wrap_brand=$request->wrap_brand_rv;
            $ppf_install_detail->wrap_color=$request->wrap_color_rv;
            $ppf_install_detail->is_waranty=$request->is_waranty_rv;
            $ppf_install_detail->waranty_company=$request->waranty_company_rv;
            $ppf_install_detail->driver_front_section=$request->driver_front_section_rv;
            $ppf_install_detail->driver_mid_section=$request->driver_mid_section_rv;
            $ppf_install_detail->driver_rear_section=$request->driver_rear_section_rv;
            $ppf_install_detail->passenger_front_section=$request->passenger_front_section_rv;
            $ppf_install_detail->passenger_mid_section=$request->passenger_mid_section_rv;
            $ppf_install_detail->passenger_rear_section=$request->passenger_rear_section_rv;
            $ppf_install_detail->document=$products_uploaded;
            $msg = 'RV Added successfully!';
        }
        if($request->type=='Trailer')
        {
            $ppf_install_detail->hood=$request->hood_trailer;
            $ppf_install_detail->front=$request->front_trailer;
            $ppf_install_detail->rear=$request->rear_trailer;
            $ppf_install_detail->roof=$request->roof_trailer;
            $ppf_install_detail->wrap_brand=$request->wrap_brand_trailer;
            $ppf_install_detail->wrap_color=$request->wrap_color_trailer;
            $ppf_install_detail->is_waranty=$request->is_waranty_trailer;
            $ppf_install_detail->waranty_company=$request->waranty_company_trailer;
            $ppf_install_detail->driver_front_section=$request->driver_front_section_trailer;
            $ppf_install_detail->driver_mid_section=$request->driver_mid_section_trailer;
            $ppf_install_detail->driver_rear_section=$request->driver_rear_section_trailer;
            $ppf_install_detail->passenger_front_section=$request->passenger_front_section_trailer;
            $ppf_install_detail->passenger_mid_section=$request->passenger_mid_section_trailer;
            $ppf_install_detail->passenger_rear_section=$request->passenger_rear_section_trailer;
            $ppf_install_detail->document=$products_uploaded;
            $msg = 'Trailer Added successfully!';
          
        }
        if($request->type=='Bus')
        {
            $ppf_install_detail->hood=$request->hood_bus;
            $ppf_install_detail->front=$request->front_bus;
            $ppf_install_detail->rear=$request->rear_bus;
            $ppf_install_detail->roof=$request->roof_bus;
            $ppf_install_detail->wrap_brand=$request->wrap_brand_bus;
            $ppf_install_detail->wrap_color=$request->wrap_color_bus;
            $ppf_install_detail->is_waranty=$request->is_waranty_bus;
            $ppf_install_detail->waranty_company=$request->waranty_company_bus;
            $ppf_install_detail->passenger_front_section=$request->passenger_front_section_bus;
            $ppf_install_detail->passenger_mid_section=$request->passenger_mid_section_bus;
            $ppf_install_detail->passenger_rear_section=$request->passenger_rear_section_bus;
            $ppf_install_detail->driver_front_section=$request->driver_front_section_bus;
            $ppf_install_detail->driver_mid_section=$request->driver_mid_section_bus;
            $ppf_install_detail->driver_rear_section=$request->driver_rear_section_bus;
            $ppf_install_detail->document=$products_uploaded;
            $msg = 'Bus Added successfully!';
        }
        if($request->type=='Other')
        {
            $ppf_install_detail->wrap_detail_and_notes_of_project=$request->wrap_detail_and_notes_of_project;
            $ppf_install_detail->wrap_brand=$request->wrap_brand_other;
            // $ppf_install_detail->other_wrap_color=$request->other_wrap_color;
         
            $ppf_install_detail->is_waranty=$request->is_waranty_other;
            $ppf_install_detail->waranty_company=$request->waranty_company_other;
            $msg = 'Other Added successfully!';
          
        }

        if ($ppf_install_detail->save()) {
            // $commonClass = new CommonController;
            // $commonClass->addServiceData($car_id, $serviceId);

            $checkservice = explode(',', auth()->user()->shop_services);
            if (count($checkservice) < 1) {

                return redirect()->route('shop-settings.mydashboard', ['myshopServices']);
                $redirecturl = '/shop-settings/mydashboard';
            } else {
                $carid = base64_encode($car_id);
                $redirecturl = '/shop-settings/completedshop/' . $carid;
            }
            return $redirecturl;
        } else {
            return "fail";
        }


    }
}
