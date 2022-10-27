<?php

namespace App\Http\Controllers;

use App\Models\RaceTrack;
use Illuminate\Http\Request;

class RaceTrackController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function indexRaceTrack(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Race Track";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = RaceTrack::where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();
        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);
        return view('shop-settings.partials.shop_services.race-track', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function saveRaceTrack(Request $request)
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


        if ($request->hasfile('products_uploaded')) {
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('products_uploaded'), 'race_track', $img_arr);
        }

        if($request->race_track_id != '')
        {
            $race_track = RaceTrack::where('race_track_id',$request->race_track_id)->first();
        }else{
            $race_track = new RaceTrack();
        }
        


        $lap_one = array('lap_one_min' => $request->lap_one_min, 'lap_one_sec' => $request->lap_one_sec);
        $lap_one = json_encode($lap_one);
        $lap_two = array('lap_two_min' => $request->lap_two_min, 'lap_two_sec' => $request->lap_two_sec);
        $lap_two = json_encode($lap_two);
        $lap_three = array('lap_three_min' => $request->lap_three_min, 'lap_three_sec' => $request->lap_three_sec);
        $lap_three = json_encode($lap_three);
        $lap_four = array('lap_four_min' => $request->lap_four_min, 'lap_four_sec' => $request->lap_four_sec);
        $lap_four = json_encode($lap_four);
        $tab_one = array();
        if ($request->tab == '1') {
            $tab_one = array(
                'stripe_name_run_one' => $request->stripe_name_run_one,
                'stripe_location_run_one' => $request->stripe_location_run_one,
                'stripe_opponent_run_one' => $request->stripe_opponent_run_one,
                'stripe_r_or_t_run_one' => $request->stripe_r_or_t_run_one,
                'stripe_sixty_degree_run_one' => $request->stripe_sixty_degree_run_one,
                'stripe_three_hundred_degree_run_one' => $request->stripe_three_hundred_degree_run_one,
                'zero_to_sixty_mph_run_one' => $request->zero_to_sixty_mph_run_one,
                'one_or_eight_mile_run_one' => $request->one_or_eight_mile_run_one,
                'mph_run_one' => $request->mph_run_one,
                'one_or_four_mile_run_one' => $request->one_or_four_mile_run_one,
                'status' => $request->status,
            );
        }

        if ($request->tab == '2') {
            if ($request->get('runonecheck') != "") {
                $tab_two = array(
                    'stripe_name_run_two' => $request->stripe_name_run_two,
                    'stripe_location_run_two' => $request->stripe_location_run_two,
                    'stripe_opponent_run_two' => $request->stripe_opponent_run_two,
                    'stripe_r_or_t_run_two' => $request->stripe_r_or_t_run_two,
                    'stripe_sixty_degree_run_two' => $request->stripe_sixty_degree_run_two,
                    'stripe_three_hundred_degree_run_two' => $request->stripe_three_hundred_degree_run_two,
                    'zero_to_sixty_mph_run_two' => $request->zero_to_sixty_mph_run_two,
                    'one_or_eight_mile_run_two' => $request->one_or_eight_mile_run_two,
                    'mph_run_two' => $request->mph_run_two,
                    'one_or_four_mile_run_two' => $request->one_or_four_mile_run_two,
                    'status_two' => $request->status_two,
                );
            } else {
                return 'runout1';
            }
        }

        if ($request->tab == '3') {
            if ($request->runtwocheck != "" && $request->get('runonecheck') != "") {
                $tab_three = array(
                    'stripe_name_run_three' => $request->stripe_name_run_three,
                    'stripe_location_run_three' => $request->stripe_location_run_three,
                    'stripe_opponent_run_three' => $request->stripe_opponent_run_three,
                    'stripe_r_or_t_run_three' => $request->stripe_r_or_t_run_three,
                    'stripe_sixty_degree_run_three' => $request->stripe_sixty_degree_run_three,
                    'stripe_three_hundred_degree_run_three' => $request->stripe_three_hundred_degree_run_three,
                    'zero_to_sixty_mph_run_three' => $request->zero_to_sixty_mph_run_three,
                    'one_or_eight_mile_run_three' => $request->one_or_eight_mile_run_three,
                    'mph_run_three' => $request->mph_run_three,
                    'one_or_four_mile_run_three' => $request->one_or_four_mile_run_three,
                    'status_three' => $request->status_three,
                );
            } else {
                return 'runtwocheck';
            }
        }

        $tab_one  = json_encode($tab_one);


        $race_track->user_id = auth()->user()->id;
        $race_track->car_id = $car_id;
        $race_track->service_id = $serviceId;
        $race_track->document = $products_uploaded;
        $race_track->track_name = $request->track_name;
        $race_track->location = $request->track_location;
        $race_track->track_type = $request->track_type;
        $race_track->car_issue_id = $issue_id;

        if ($request->tab == '') {


            $race_track->zero_to_sixty_mph = $request->zero_to_sixty_mph;
            $race_track->lap_one = $lap_one;
            $race_track->lap_two = $lap_two;
            $race_track->lap_three = $lap_three;
            $race_track->lap_four = $lap_four;
        }
        if ($request->tab == '1') {
            $race_track->run_one = $tab_one;
        }
        if ($request->tab == '2') {

            $race_track->run_two = $tab_two;
        }
        if ($request->tab == '3') {
            $race_track->run_three = $tab_three;
        }

        if ($race_track->save()) {


            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id, $serviceId);

            $checkservice = explode(',', auth()->user()->shop_services);
            if (count($checkservice) < 1) {


                return redirect()->route('shop-settings.mydashboard', ['myshopServices']);
                $redirecturl = '/shop-settings/mydashboard';
            } else {
                if ($request->tab == '1' || $request->tab == '2' || $request->tab == '3') {
                    $id = $race_track->race_track_id;
                    $data = array('status' => "tab",'id'=>$id);
                    return json_encode($data);
              
                } else {
                    $carid = base64_encode($car_id);
                    $redirecturl = '/shop-settings/completedshop/' . $carid;
                    return $redirecturl;
                }
            }
        } else {
            return "fail";
        }
    }

    // public function saveTrackRaceRunOne(Request $request)
    // {





    // }
}
