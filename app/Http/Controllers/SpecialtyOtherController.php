<?php

namespace App\Http\Controllers;

use App\Models\SpecialtyOther;
use Illuminate\Http\Request;

class SpecialtyOtherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexSpecialty(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $speciality_other_serviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Specialty Other";
        $car_id = base64_decode($speciality_other_serviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $speciality_other_serviceId[1];
        $serviceData = SpecialtyOther::where('car_id', $car_id)->where('service_id', $speciality_other_serviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.specialty-other', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function saveSpeciality(Request $request)
    {
        $input = $request->except(['_token']);
        $commonClass = new CommonController;
        $issue_id = base64_decode($request->issue_id);

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

        if ($request->hasfile('products_uploaded')) {
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('products_uploaded'), 'specialty_other', $img_arr);
        } 
        $image_array = explode(',', $products_uploaded);
        $image = 0;
        $pdf = 0;
        foreach ($image_array as $img_key => $img_val) {
            $extension_array = ["jpg", "jpeg", "png"];
            $img = explode('.', $img_val);
            if (isset($img[5])) {
                if (in_array($img[5], $extension_array)) {
                    $image = 1;
                }

                if ($img[5] == 'pdf') {
                    $pdf = 1;
                }
            }
        }
        $other_speciality = new SpecialtyOther();
        $other_speciality->user_id = auth()->user()->id;
        $other_speciality->car_id = $car_id;
        $other_speciality->service_id = $serviceId;
        $other_speciality->document = $products_uploaded;
        $other_speciality->list_of_specialty = $request->list_of_specialty;
        $other_speciality->detail_of_services = $request->detail_of_services;
        $other_speciality->car_issue_id = $issue_id;

        if ($other_speciality->save()) {
            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id, $serviceId);
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
