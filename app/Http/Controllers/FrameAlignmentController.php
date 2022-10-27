<?php

namespace App\Http\Controllers;

use App\Models\AfterFrameAlignment;
use App\Models\FrameAlignment;
use Illuminate\Http\Request;

class FrameAlignmentController extends Controller
{
    public function indexFrameAlignment(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Paint Body";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        $serviceData = FrameAlignment::with('AfterFrameAlignment')->where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();
        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);

        return view('shop-settings.partials.shop_services.frame-alignment', compact('vinid', 'VInGet', 'serviceData', 'service_id', 'page_title'));
    }

    public function saveFrameAlignment(Request $request)
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
        $frame_alignment = new FrameAlignment();
        $frame_alignment->user_id = auth()->user()->id;
        $frame_alignment->car_id = $car_id;
        $frame_alignment->service_id = $serviceId;

        $frame_alignment->before_left_front_camber_left_top = $request->before_left_front_camber_left_top;
        $frame_alignment->before_left_front_camber_right_top = $request->before_left_front_camber_right_top;
        $frame_alignment->before_left_front_camber_middle = $request->before_left_front_camber_middle;
        $frame_alignment->before_left_front_caster_left_top = $request->before_left_front_caster_left_top;
        $frame_alignment->before_left_front_caster_right_top = $request->before_left_front_caster_right_top;

        $frame_alignment->before_left_front_caster_middle = $request->before_left_front_caster_middle;
        $frame_alignment->before_left_front_toe_left_top = $request->before_left_front_toe_left_top;
        $frame_alignment->before_left_front_toe_right_top = $request->before_left_front_toe_right_top;
        $frame_alignment->before_left_front_toe_middle = $request->before_left_front_toe_middle;
        $frame_alignment->before_front_total_toe_left_top = $request->before_front_total_toe_left_top;

        $frame_alignment->before_front_total_toe_right_top = $request->before_front_total_toe_right_top;
        $frame_alignment->before_front_total_toe_middle = $request->before_front_total_toe_middle;
        $frame_alignment->before_front_steer_ahead_left_top = $request->before_front_steer_ahead_left_top;
        $frame_alignment->before_front_steer_ahead_right_top = $request->before_front_steer_ahead_right_top;
        $frame_alignment->before_front_steer_ahead_middle = $request->before_front_steer_ahead_middle;

        $frame_alignment->before_right_front_camber_left_top = $request->before_right_front_camber_left_top;
        $frame_alignment->before_right_front_camber_right_top = $request->before_right_front_camber_right_top;
        $frame_alignment->before_right_front_camber_middle = $request->before_right_front_camber_middle;
        $frame_alignment->before_right_front_caster_left_top = $request->before_right_front_caster_left_top;
        $frame_alignment->before_right_front_caster_right_top = $request->before_right_front_caster_right_top;

        $frame_alignment->before_right_front_caster_middle = $request->before_right_front_caster_middle;
        $frame_alignment->before_right_front_toe_left_top = $request->before_right_front_toe_left_top;
        $frame_alignment->before_right_front_toe_right_top = $request->before_right_front_toe_right_top;
        $frame_alignment->before_right_front_toe_middle = $request->before_right_front_toe_middle;
        $frame_alignment->before_left_rear_camber_left_top = $request->before_left_rear_camber_left_top;

        $frame_alignment->before_left_rear_camber_right_top = $request->before_left_rear_camber_right_top;
        $frame_alignment->before_left_rear_camber_middle = $request->before_left_rear_camber_middle;
        $frame_alignment->before_left_rear_toe_left_top = $request->before_left_rear_toe_left_top;
        $frame_alignment->before_left_rear_toe_right_top = $request->before_left_rear_toe_right_top;
        $frame_alignment->before_left_rear_toe_middle = $request->before_left_rear_toe_middle;

        $frame_alignment->before_rear_total_toe_left_top = $request->before_rear_total_toe_left_top;
        $frame_alignment->before_rear_total_toe_right_top = $request->before_rear_total_toe_right_top;
        $frame_alignment->before_rear_total_toe_middle = $request->before_rear_total_toe_middle;
        $frame_alignment->before_rear_thrust_angle_left_top = $request->before_rear_thrust_angle_left_top;
        $frame_alignment->before_rear_thrust_angle_right_top = $request->before_rear_thrust_angle_right_top;

        $frame_alignment->before_rear_thrust_angle_middle = $request->before_rear_thrust_angle_middle;
        $frame_alignment->before_right_rear_camber_left_top = $request->before_right_rear_camber_left_top;
        $frame_alignment->before_right_rear_camber_right_top = $request->before_right_rear_camber_right_top;
        $frame_alignment->before_right_rear_camber_middle = $request->before_right_rear_camber_middle;
        $frame_alignment->before_right_rear_toe_left_top = $request->before_right_rear_toe_left_top;
        $frame_alignment->before_right_rear_toe_right_top = $request->before_right_rear_toe_right_top;
        $frame_alignment->before_right_rear_toe_middle = $request->before_right_rear_toe_middle;
        $frame_alignment->car_issue_id = $issue_id;

        if ($frame_alignment->save()) {

            $id = $frame_alignment->frame_alignment_id;

          
            $after_frame_alignment = new AfterFrameAlignment();
            $after_frame_alignment->user_id = auth()->user()->id;
            $after_frame_alignment->car_id = $car_id;
            $after_frame_alignment->service_id = $serviceId;
            $after_frame_alignment->before_frame_alignment_id = $id;
            $after_frame_alignment->after_left_front_camber_left_top = $request->after_left_front_camber_left_top;
            $after_frame_alignment->after_left_front_camber_right_top = $request->after_left_front_camber_right_top;
            $after_frame_alignment->after_left_front_camber_middle = $request->after_left_front_camber_middle;
            $after_frame_alignment->after_left_front_caster_left_top = $request->after_left_front_caster_left_top;
            $after_frame_alignment->after_left_front_caster_right_top = $request->after_left_front_caster_right_top;

            $after_frame_alignment->after_left_front_caster_middle = $request->after_left_front_caster_middle;
            $after_frame_alignment->after_left_front_toe_left_top = $request->after_left_front_toe_left_top;
            $after_frame_alignment->after_left_front_toe_right_top = $request->after_left_front_toe_right_top;
            $after_frame_alignment->after_left_front_toe_middle = $request->after_left_front_toe_middle;
            $after_frame_alignment->after_front_total_toe_left_top = $request->after_front_total_toe_left_top;

            $after_frame_alignment->after_front_total_toe_right_top = $request->after_front_total_toe_right_top;
            $after_frame_alignment->after_front_total_toe_middle = $request->after_front_total_toe_middle;
            $after_frame_alignment->after_front_steer_ahead_left_top = $request->after_front_steer_ahead_left_top;
            $after_frame_alignment->after_front_steer_ahead_right_top = $request->after_front_steer_ahead_right_top;
            $after_frame_alignment->after_front_steer_ahead_middle = $request->after_front_steer_ahead_middle;

            $after_frame_alignment->after_right_front_camber_left_top = $request->after_right_front_camber_left_top;
            $after_frame_alignment->after_right_front_camber_right_top = $request->after_right_front_camber_right_top;
            $after_frame_alignment->after_right_front_camber_middle = $request->after_right_front_camber_middle;
            $after_frame_alignment->after_right_front_caster_left_top = $request->after_right_front_caster_left_top;
            $after_frame_alignment->after_right_front_caster_right_top = $request->after_right_front_caster_right_top;

            $after_frame_alignment->after_right_front_caster_middle = $request->after_right_front_caster_middle;
            $after_frame_alignment->after_right_front_toe_left_top = $request->after_right_front_toe_left_top;
            $after_frame_alignment->after_right_front_toe_right_top = $request->after_right_front_toe_right_top;
            $after_frame_alignment->after_right_front_toe_middle = $request->after_right_front_toe_middle;
            $after_frame_alignment->after_left_rear_camber_left_top = $request->after_left_rear_camber_left_top;

            $after_frame_alignment->after_left_rear_camber_right_top = $request->after_left_rear_camber_right_top;
            $after_frame_alignment->after_left_rear_camber_middle = $request->after_left_rear_camber_middle;
            $after_frame_alignment->after_left_rear_toe_left_top = $request->after_left_rear_toe_left_top;
            $after_frame_alignment->after_left_rear_toe_right_top = $request->after_left_rear_toe_right_top;
            $after_frame_alignment->after_left_rear_toe_middle = $request->after_left_rear_toe_middle;

            $after_frame_alignment->after_rear_total_toe_left_top = $request->after_rear_total_toe_left_top;
            $after_frame_alignment->after_rear_total_toe_right_top = $request->after_rear_total_toe_right_top;
            $after_frame_alignment->after_rear_total_toe_middle = $request->after_rear_total_toe_middle;
            $after_frame_alignment->after_rear_thrust_angle_left_top = $request->after_rear_thrust_angle_left_top;
            $after_frame_alignment->after_rear_thrust_angle_right_top = $request->after_rear_thrust_angle_right_top;

            $after_frame_alignment->after_rear_thrust_angle_middle = $request->after_rear_thrust_angle_middle;
            $after_frame_alignment->after_right_rear_camber_left_top = $request->after_right_rear_camber_left_top;
            $after_frame_alignment->after_right_rear_camber_right_top = $request->after_right_rear_camber_right_top;
            $after_frame_alignment->after_right_rear_camber_middle = $request->after_right_rear_camber_middle;
            $after_frame_alignment->after_right_rear_toe_left_top = $request->after_right_rear_toe_left_top;
            $after_frame_alignment->after_right_rear_toe_right_top = $request->after_right_rear_toe_right_top;
            $after_frame_alignment->after_right_rear_toe_middle = $request->after_right_rear_toe_middle;



            $after_frame_alignment->save();




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
