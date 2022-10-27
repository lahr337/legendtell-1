<?php

namespace App\Http\Controllers;

use App\Models\DetailingCorrection;
use Illuminate\Http\Request;

class DetailingProfessionalController extends Controller
{
    public function indexDetailingProfessional(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Detailing Professional";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        // $serviceData = FrameAlignment::with('AfterFrameAlignment')->where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);

        return view('shop-settings.partials.shop_services.detailing-correction', compact('vinid', 'VInGet', 'service_id', 'page_title'));
    }

    public function indexDetailingCorrection(Request $request, $vinid = null, $tab = 'editProfile')
    {
        $collisionserviceId = explode("%%%", base64_decode($_GET['servicedata'], true));
        $page_title = "Detailing Professional";
        $car_id = base64_decode($collisionserviceId[0]);
        $vinid = base64_encode($car_id);
        $service_id = $collisionserviceId[1];
        // $serviceData = FrameAlignment::with('AfterFrameAlignment')->where('car_id', $car_id)->where('service_id', $collisionserviceId[1])->where('user_id', auth()->user()->id)->first();

        $shopsetting = new ShopSettingController;
        $VInGet = $shopsetting->FetchgetVinList($tab);

        return view('shop-settings.partials.shop_services.detailing-professional', compact('vinid', 'VInGet', 'service_id', 'page_title'));
    }

    public function saveDetailing(Request $request)
    {
        $input = $request->except(['_token']);
        $commonClass = new CommonController;

        $mainid = base64_decode($request->carShopService);
        $issue_id = base64_decode($request->issue_id);

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




        if ($request->hasfile('image_uploaded')) {
            $products_uploaded = $commonClass->uplodeimages($_POST['remove_products_ids'], $request->file('image_uploaded'), 'detailing', $img_arr);
        }
        $correction = "";
        if (!empty($request->correction)) {
            $correction = implode(',', $request->correction);
        }
        $cleaning = "";
        if (!empty($request->cleaning)) {
            $cleaning = implode(',', $request->cleaning);
        }

        if(!empty($request->detailing_correction_id))
        {
            $detailing_correction = DetailingCorrection::where('detailing_correction_id',base64_decode(trim($request->detailing_correction_id)))->first();
        }else{
            $detailing_correction = new DetailingCorrection();
        }
        $detailing_correction->user_id = auth()->user()->id;
        $detailing_correction->car_id = $car_id;
        $detailing_correction->service_id = $serviceId;
        $detailing_correction->document = $products_uploaded;
        $detailing_correction->service_type = $request->service_type;
        $detailing_correction->correction = $correction;
        $detailing_correction->cleaning_mobile = $cleaning;
        $detailing_correction->car_issue_id = $issue_id;

        if ($detailing_correction->save()) {
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


    public function savevehicleData(Request $request)
    {
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

        $vehicle_data = [];
        if ($request->vehicle_type == "18-Wheeler Cab") {
            $vehicle_data = array(
                'wheeler_cab_front_view_1' => "$request->wheeler_cab_front_view_1", 
                'wheeler_cab_front_view_2' => "$request->wheeler_cab_front_view_2",
                'wheeler_cab_front_view_3' => "$request->wheeler_cab_front_view_3",
                'wheeler_cab_front_view_4' => "$request->wheeler_cab_front_view_4",
                'wheeler_cab_front_view_5' => "$request->wheeler_cab_front_view_5",
                'wheeler_cab_front_view_6' => "$request->wheeler_cab_front_view_6",
                'wheeler_cab_front_view_7' => "$request->wheeler_cab_front_view_7",
                'wheeler_cab_front_view_8' => "$request->wheeler_cab_front_view_8",
                'wheeler_cab_front_view_9' => "$request->wheeler_cab_front_view_9",
                'wheeler_cab_front_view_10' => "$request->wheeler_cab_front_view_10",
                'wheeler_cab_front_view_11' => "$request->wheeler_cab_front_view_11",
                'wheeler_cab_front_view_12' => "$request->wheeler_cab_front_view_12",
                'wheeler_cab_front_view_13' => "$request->wheeler_cab_front_view_13",
                'wheeler_cab_back_view_14' => "$request->wheeler_cab_back_view_14",
                'wheeler_cab_back_view_15' => "$request->wheeler_cab_back_view_15",
                'wheeler_cab_back_view_16' => "$request->wheeler_cab_back_view_16",
                'wheeler_cab_back_view_17' => "$request->wheeler_cab_back_view_17",
                'wheeler_cab_back_view_18' => "$request->wheeler_cab_back_view_18",
                'wheeler_cab_back_view_19' => "$request->wheeler_cab_back_view_19",
                'wheeler_cab_back_view_20' => "$request->wheeler_cab_back_view_20",
                'wheeler_cab_back_view_21' => "$request->wheeler_cab_back_view_21",
                'wheeler_cab_right_side_22' => "$request->wheeler_cab_right_side_22",
                'wheeler_cab_right_side_23' => "$request->wheeler_cab_right_side_23",
                'wheeler_cab_right_side_24' => "$request->wheeler_cab_right_side_24",
                'wheeler_cab_right_side_25' => "$request->wheeler_cab_right_side_25",
                'wheeler_cab_right_side_26' => "$request->wheeler_cab_right_side_26",
                'wheeler_cab_right_side_27' => "$request->wheeler_cab_right_side_27",
                'wheeler_cab_right_side_28' => "$request->wheeler_cab_right_side_28",
                'wheeler_cab_right_side_29' => "$request->wheeler_cab_right_side_29",
                'wheeler_cab_right_side_30' => "$request->wheeler_cab_right_side_30",
                'wheeler_cab_right_side_31' => "$request->wheeler_cab_right_side_31",
                'wheeler_cab_right_side_32' => "$request->wheeler_cab_right_side_32",
                'wheeler_cab_right_side_33' => "$request->wheeler_cab_right_side_33",
                'wheeler_cab_right_side_34' => "$request->wheeler_cab_right_side_34",
                'wheeler_cab_right_side_35' => "$request->wheeler_cab_right_side_35",
                'wheeler_cab_right_side_36' => "$request->wheeler_cab_right_side_36",
                'wheeler_cab_right_side_37' => "$request->wheeler_cab_right_side_37",
                'wheeler_cab_right_side_38' => "$request->wheeler_cab_right_side_38",
                'wheeler_cab_right_side_39' => "$request->wheeler_cab_right_side_39",
                'wheeler_cab_right_side_40' => "$request->wheeler_cab_right_side_40",
                'wheeler_cab_right_side_41' => "$request->wheeler_cab_right_side_41",
                'wheeler_cab_right_side_42' => "$request->wheeler_cab_right_side_42",
                'wheeler_cab_right_side_43' => "$request->wheeler_cab_right_side_43",
                'wheeler_cab_right_side_44' => "$request->wheeler_cab_right_side_44",
                'wheeler_cab_right_side_45' => "$request->wheeler_cab_right_side_45",
                'wheeler_cab_right_side_46' => "$request->wheeler_cab_right_side_46",
                'wheeler_cab_right_side_47' => "$request->wheeler_cab_right_side_47",
                'wheeler_cab_right_side_48' => "$request->wheeler_cab_right_side_48",
                'wheeler_cab_right_side_49' => "$request->wheeler_cab_right_side_49",
                'wheeler_cab_right_side_50' => "$request->wheeler_cab_right_side_50",
                'wheeler_cab_right_side_51' => "$request->wheeler_cab_right_side_51",
                'wheeler_cab_right_side_52' => "$request->wheeler_cab_right_side_52",
                'wheeler_cab_right_side_53' => "$request->wheeler_cab_right_side_53",
                'wheeler_cab_left_side_54'  => "$request->wheeler_cab_left_side_54",
                'wheeler_cab_left_side_55'  => "$request->wheeler_cab_left_side_55",
                'wheeler_cab_left_side_56'  => "$request->wheeler_cab_left_side_56",
                'wheeler_cab_left_side_57'  => "$request->wheeler_cab_left_side_57",
                'wheeler_cab_left_side_58'  => "$request->wheeler_cab_left_side_58",
                'wheeler_cab_left_side_59'  => "$request->wheeler_cab_left_side_59",
                'wheeler_cab_left_side_60'  => "$request->wheeler_cab_left_side_60",
                'wheeler_cab_left_side_61'  => "$request->wheeler_cab_left_side_61",
                'wheeler_cab_left_side_62'  => "$request->wheeler_cab_left_side_62",
                'wheeler_cab_left_side_63'  => "$request->wheeler_cab_left_side_63",
                'wheeler_cab_left_side_64'  => "$request->wheeler_cab_left_side_64",
                'wheeler_cab_left_side_65'  => "$request->wheeler_cab_left_side_65",
                'wheeler_cab_left_side_66'  => "$request->wheeler_cab_left_side_66",
                'wheeler_cab_left_side_67'  => "$request->wheeler_cab_left_side_67",
                'wheeler_cab_left_side_68'  => "$request->wheeler_cab_left_side_68",
                'wheeler_cab_left_side_69'  => "$request->wheeler_cab_left_side_69",
                'wheeler_cab_left_side_70'  => "$request->wheeler_cab_left_side_70",
                'wheeler_cab_left_side_71'  => "$request->wheeler_cab_left_side_71",
                'wheeler_cab_left_side_72'  => "$request->wheeler_cab_left_side_72",
                'wheeler_cab_left_side_73'  => "$request->wheeler_cab_left_side_73",
                'wheeler_cab_left_side_74'  => "$request->wheeler_cab_left_side_74",
                'wheeler_cab_left_side_75'  => "$request->wheeler_cab_left_side_75",
                'wheeler_cab_left_side_76'  => "$request->wheeler_cab_left_side_76",
                'wheeler_cab_left_side_77'  => "$request->wheeler_cab_left_side_77",
                'wheeler_cab_left_side_78'  => "$request->wheeler_cab_left_side_78",
                'wheeler_cab_left_side_79'  => "$request->wheeler_cab_left_side_79",
                'wheeler_cab_left_side_80'  => "$request->wheeler_cab_left_side_80",
                'wheeler_cab_left_side_81'  => "$request->wheeler_cab_left_side_81",
                'wheeler_cab_left_side_82'  => "$request->wheeler_cab_left_side_82",
                'wheeler_cab_left_side_83'  => "$request->wheeler_cab_left_side_83",
                'wheeler_cab_top_side_84'  => "$request->wheeler_cab_top_side_84",
                'wheeler_cab_top_side_85'  => "$request->wheeler_cab_top_side_85",
                'wheeler_cab_top_side_86'  => "$request->wheeler_cab_top_side_86",
                'wheeler_cab_top_side_87'  => "$request->wheeler_cab_top_side_87",
                'wheeler_cab_top_side_88'  => "$request->wheeler_cab_top_side_88",
                'wheeler_cab_top_side_89'  => "$request->wheeler_cab_top_side_89",
                'wheeler_cab_top_side_90'  => "$request->wheeler_cab_top_side_90",
                'wheeler_cab_top_side_91'  => "$request->wheeler_cab_top_side_91",
                'wheeler_cab_top_side_92'  => "$request->wheeler_cab_top_side_92",
                'wheeler_cab_top_side_93'  => "$request->wheeler_cab_top_side_93",
                'wheeler_cab_top_side_94'  => "$request->wheeler_cab_top_side_94",
                'wheeler_cab_top_side_95'  => "$request->wheeler_cab_top_side_95",
                'wheeler_cab_top_side_96'  => "$request->wheeler_cab_top_side_96",
                'wheeler_cab_top_side_97'  => "$request->wheeler_cab_top_side_97",
                'wheeler_cab_top_side_98'  => "$request->wheeler_cab_top_side_98",
                'wheeler_cab_top_side_99'  => "$request->wheeler_cab_top_side_99",
                'wheeler_cab_top_side_100'  => "$request->wheeler_cab_top_side_100",
                'wheeler_cab_top_side_101'  => "$request->wheeler_cab_top_side_101",
                'wheeler_cab_top_side_102'  => "$request->wheeler_cab_top_side_102",
                'wheeler_cab_top_side_103'  => "$request->wheeler_cab_top_side_103",
                'wheeler_cab_top_side_104'  => "$request->wheeler_cab_top_side_104",
                'wheeler_cab_top_side_105'  => "$request->wheeler_cab_top_side_105",
            );

            $vehicle_data = json_encode($vehicle_data);
        }

        if ($request->vehicle_type == "Bus") {
            $vehicle_data = array(
                "front_view_1" => $request->front_view_1,
                "front_view_2" => $request->front_view_2,
                "front_view_3" => $request->front_view_3,
                "front_view_4" => $request->front_view_4,
                "front_view_5" => $request->front_view_5,
                "front_view_6" => $request->front_view_6,
                "front_view_7" => $request->front_view_7,
                "front_view_8" => $request->front_view_8,
                "front_view_9" => $request->front_view_9,
                "front_view_10" => $request->front_view_10,
                "front_view_11" => $request->front_view_11,
                "front_view_12" => $request->front_view_12,
                "front_view_13" => $request->front_view_13,
                "front_view_14" => $request->front_view_14,
                "front_view_15" => $request->front_view_15,
                "front_view_16" => $request->front_view_16,
                "back_view_17"  => $request->back_view_17,
                "back_view_18"  => $request->back_view_18,
                "back_view_19"  => $request->back_view_19,
                "back_view_20"  => $request->back_view_20,
                "back_view_21"  => $request->back_view_21,
                "back_view_22"  => $request->back_view_22,
                "back_view_23"  => $request->back_view_23,
                "back_view_24"  => $request->back_view_24,
                "back_view_25"  => $request->back_view_25,
                "back_view_26"  => $request->back_view_26,
                "back_view_27"  => $request->back_view_27,
                "back_view_28"  => $request->back_view_28,
                "back_view_29"  => $request->back_view_29,
                "back_view_30"  => $request->back_view_30,
                "back_view_31"  => $request->back_view_31,
                "back_view_32"  => $request->back_view_32,
                "back_view_33"  => $request->back_view_33,
                "back_view_34"  => $request->back_view_34,
                "back_view_35"  => $request->back_view_35,
                "back_view_36"  => $request->back_view_36,
                "back_view_37"  => $request->back_view_37,
                "back_view_38"  => $request->back_view_38,
                "back_view_39"  => $request->back_view_39,
                "back_view_40"  => $request->back_view_40,
                "side_right_41" => $request->side_right_41,
                "side_right_42" => $request->side_right_42,
                "side_right_43" => $request->side_right_43,
                "side_right_44" => $request->side_right_44,
                "side_right_45" => $request->side_right_45,
                "side_right_46" => $request->side_right_46,
                "side_right_47" => $request->side_right_47,
                "side_right_48" => $request->side_right_48,
                "side_right_49" => $request->side_right_49,
                "side_right_50" => $request->side_right_50,
                "side_right_51" => $request->side_right_51,
                "side_right_52" => $request->side_right_52,
                "side_right_53" => $request->side_right_53,
                "side_right_54" => $request->side_right_54,
                "side_right_55" => $request->side_right_55,
                "side_right_56" => $request->side_right_56,
                "side_right_57" => $request->side_right_57,
                "side_right_58" => $request->side_right_58,
                "side_right_59" => $request->side_right_59,
                "side_right_60" => $request->side_right_60,
                "side_right_61" => $request->side_right_61,
                "side_right_62" => $request->side_right_62,
                "side_right_63" => $request->side_right_63,
                "side_right_64" => $request->side_right_64,
                "side_right_65" => $request->side_right_65,
                "side_right_66" => $request->side_right_66,
                "side_right_67" => $request->side_right_67,
                "side_right_68" => $request->side_right_68,
                "side_right_69" => $request->side_right_69,
                "side_right_70" => $request->side_right_70,
                "side_right_71" => $request->side_right_71,
                "side_right_72" => $request->side_right_72,
                "side_right_73" => $request->side_right_73,
                "side_right_74" => $request->side_right_74,
                "side_right_75" => $request->side_right_75,
                "side_right_76" => $request->side_right_76,
                "side_right_77" => $request->side_right_77,
                "side_right_78" => $request->side_right_78,
                "side_right_79" => $request->side_right_79,
                "side_right_80" => $request->side_right_80,
                "side_right_81" => $request->side_right_81,
                "side_right_82" => $request->side_right_82,
                "side_right_83" => $request->side_right_83,
                "side_right_84" => $request->side_right_84,
                "side_right_85" => $request->side_right_85,
                "side_right_86" => $request->side_right_86,
                "side_right_87" => $request->side_right_87,
                "side_right_88" => $request->side_right_88,
                "side_right_89" => $request->side_right_89,
                "side_right_90" => $request->side_right_90,
                "side_right_91" => $request->side_right_91,
                "side_right_92" => $request->side_right_92,
                "side_right_93" => $request->side_right_93,
                "side_right_94" => $request->side_right_94,
                "side_right_95" => $request->side_right_95,
                "side_right_96" => $request->side_right_96,
                "side_right_97" => $request->side_right_97,
                "side_right_98" => $request->side_right_98,
                "side_right_99" => $request->side_right_99,
                "side_right_100" => $request->side_right_100,
                "side_right_101" => $request->side_right_101,
                "side_right_102" => $request->side_right_102,
                "side_right_103" => $request->side_right_103,
                "side_right_104" => $request->side_right_104,
                "side_right_105" => $request->side_right_105,
                "side_right_106" => $request->side_right_106,
                "side_left_107" => $request->side_left_107,
                "side_left_108" => $request->side_left_108,
                "side_left_109" => $request->side_left_109,
                "side_left_110" => $request->side_left_110,
                "side_left_111" => $request->side_left_111,
                "side_left_112" => $request->side_left_112,
                "side_left_113" => $request->side_left_113,
                "side_left_114" => $request->side_left_114,
                "side_left_115" => $request->side_left_115,
                "side_left_116" => $request->side_left_116,
                "side_left_117" => $request->side_left_117,
                "side_left_118" => $request->side_left_118,
                "side_left_119" => $request->side_left_119,
                "side_left_120" => $request->side_left_120,
                "side_left_121" => $request->side_left_121,
                "side_left_122" => $request->side_left_122,
                "side_left_123" => $request->side_left_123,
                "side_left_124" => $request->side_left_124,
                "side_left_125" => $request->side_left_125,
                "side_left_126" => $request->side_left_126,
                "side_left_127" => $request->side_left_127,
                "side_left_128" => $request->side_left_128,
                "side_left_129" => $request->side_left_129,
                "side_left_130" => $request->side_left_130,
                "side_left_131" => $request->side_left_131,
                "side_left_132" => $request->side_left_132,
                "side_left_133" => $request->side_left_133,
                "side_left_134" => $request->side_left_134,
                "side_left_135" => $request->side_left_135,
                "side_left_136" => $request->side_left_136,
                "side_left_137" => $request->side_left_137,
                "side_left_138" => $request->side_left_138,
                "side_left_139" => $request->side_left_139,
                "side_left_140" => $request->side_left_140,
                "side_left_141" => $request->side_left_141,
                "side_left_142" => $request->side_left_142,
                "side_left_143" => $request->side_left_143,
                "side_left_144" => $request->side_left_144,
                "side_left_145" => $request->side_left_145,
                "side_left_146" => $request->side_left_146,
                "side_left_147" => $request->side_left_147,
                "side_left_148" => $request->side_left_148,
                "side_left_149" => $request->side_left_149,
                "side_left_150" => $request->side_left_150,
                "side_left_151" => $request->side_left_151,
                "side_left_152" => $request->side_left_152,
                "side_left_153" => $request->side_left_153,
                "side_left_154" => $request->side_left_154,
                "side_left_155" => $request->side_left_155,
                "side_left_156" => $request->side_left_156,
                "side_left_157" => $request->side_left_157,
                "side_left_158" => $request->side_left_158,
                "side_left_159" => $request->side_left_159,
                "side_left_160" => $request->side_left_160,
                "side_left_161" => $request->side_left_161,
                "side_left_162" => $request->side_left_162,
                "side_left_163" => $request->side_left_163,
                "side_left_164" => $request->side_left_164,
                "side_left_165" => $request->side_left_165,
                "side_left_166" => $request->side_left_166,
                "side_left_167" => $request->side_left_167,
                "side_left_168" => $request->side_left_168,
                "side_left_169" => $request->side_left_169,
                "side_left_170" => $request->side_left_170,
                "side_left_171" => $request->side_left_171,
                "side_left_172" => $request->side_left_172,
                "side_left_173" => $request->side_left_173,
                "side_left_174" => $request->side_left_174,
                "side_left_175" => $request->side_left_175,
                "side_left_176" => $request->side_left_176,
                "side_left_177" => $request->side_left_177,
                "side_left_178" => $request->side_left_178,
                "side_left_179" => $request->side_left_179,
                "side_left_180" => $request->side_left_180,
                "side_left_181" => $request->side_left_181,
                "side_left_182" => $request->side_left_182,
                "side_left_183" => $request->side_left_183,
                "side_left_184" => $request->side_left_184,
                "side_left_185" => $request->side_left_185,
                "side_left_186" => $request->side_left_186,
                "top_view_187" => $request->top_view_187,
                "top_view_188" => $request->top_view_188,
                "top_view_189" => $request->top_view_189,
                "top_view_190" => $request->top_view_190,
                "top_view_191" => $request->top_view_191,
                "top_view_192" => $request->top_view_192,
                "top_view_193" => $request->top_view_193,
                "top_view_194" => $request->top_view_194,
                "top_view_195" => $request->top_view_195,
                "top_view_196" => $request->top_view_196,
                "top_view_197" => $request->top_view_197,
                "top_view_198" => $request->top_view_198,
                "top_view_199" => $request->top_view_199,
                "top_view_200" => $request->top_view_200,
                "top_view_201" => $request->top_view_201,
                "top_view_202" => $request->top_view_202,
                "top_view_203" => $request->top_view_203,
                "top_view_204" => $request->top_view_204,
                "top_view_205" => $request->top_view_205,
                "top_view_206" => $request->top_view_206,
                "top_view_207" => $request->top_view_207,
                "top_view_208" => $request->top_view_208,
                "top_view_209" => $request->top_view_209,
                "top_view_210" => $request->top_view_210,
                "top_view_211" => $request->top_view_211,
                "top_view_212" => $request->top_view_212,
                "top_view_213" => $request->top_view_213,
                "top_view_214" => $request->top_view_214,
                "top_view_215" => $request->top_view_215,
                "top_view_216" => $request->top_view_216,
                "top_view_217" => $request->top_view_217,
                "top_view_218" => $request->top_view_218,
                "top_view_219" => $request->top_view_219,
                "top_view_220" => $request->top_view_220,
                "top_view_221" => $request->top_view_221,
                "top_view_222" => $request->top_view_222,
                "top_view_223" => $request->top_view_223,
                "top_view_224" => $request->top_view_224,
                "top_view_225" => $request->top_view_225,
                "top_view_226" => $request->top_view_226,
                "top_view_227" => $request->top_view_227,
                "top_view_228" => $request->top_view_228,
                "top_view_229" => $request->top_view_229,
                "top_view_230" => $request->top_view_230,
                "top_view_231" => $request->top_view_231,
                "top_view_232" => $request->top_view_232,
                "top_view_233" => $request->top_view_233,
                "top_view_234" => $request->top_view_234,
                "top_view_235" => $request->top_view_235,
                "top_view_236" => $request->top_view_236,
                "top_view_237" => $request->top_view_237,
                "top_view_238" => $request->top_view_238,
                "top_view_239" => $request->top_view_239,
                "top_view_240" => $request->top_view_240,
                "top_view_241" => $request->top_view_241,
                "top_view_242" => $request->top_view_242,
                "top_view_243" => $request->top_view_243,
                "top_view_244" => $request->top_view_244,
                "top_view_245" => $request->top_view_245,
                "top_view_246" => $request->top_view_246,
                "top_view_247" => $request->top_view_247,
                "top_view_248" => $request->top_view_248,
                "top_view_249" => $request->top_view_249,
                "top_view_250" => $request->top_view_250,
                "top_view_251" => $request->top_view_251,
                "top_view_252" => $request->top_view_252,
                "top_view_253" => $request->top_view_253,
                "top_view_254" => $request->top_view_254,
                "top_view_255" => $request->top_view_255,
                "top_view_256" => $request->top_view_256,
                "top_view_257" => $request->top_view_257,
                "top_view_258" => $request->top_view_258,
                "top_view_259" => $request->top_view_259,
                "top_view_260" => $request->top_view_260,
                "top_view_261" => $request->top_view_261,
                "top_view_262" => $request->top_view_262,
                "top_view_263" => $request->top_view_263,
                "top_view_264" => $request->top_view_264,
                "top_view_265" => $request->top_view_265,
                "top_view_266" => $request->top_view_266,
                "top_view_267" => $request->top_view_267,
                "top_view_268" => $request->top_view_268,
                "top_view_269" => $request->top_view_269,
                "top_view_270" => $request->top_view_270,
                "top_view_271" => $request->top_view_271,
                "top_view_272" => $request->top_view_272,
                "top_view_273" => $request->top_view_273,
                "top_view_274" => $request->top_view_274,
                "top_view_275" => $request->top_view_275,
                "top_view_276" => $request->top_view_276,
                "top_view_277" => $request->top_view_277,
                "top_view_278" => $request->top_view_278,
                "top_view_279" => $request->top_view_279,
                "top_view_280" => $request->top_view_280,
                "top_view_281" => $request->top_view_281,
                "top_view_282" => $request->top_view_282,
                "top_view_283" => $request->top_view_283,
                "top_view_284" => $request->top_view_284,
                "top_view_285" => $request->top_view_285,
                "top_view_286" => $request->top_view_286,
                "top_view_287" => $request->top_view_287,
                "top_view_288" => $request->top_view_288,
            );
            $vehicle_data = json_encode($vehicle_data);
        }

        if ($request->vehicle_type == "Camper - Large") {
            $vehicle_data = array(
                "camper_lg_right_1" => $request->camper_lg_right_1,
                "camper_lg_right_2" => $request->camper_lg_right_2,
                "camper_lg_right_3" => $request->camper_lg_right_3,
                "camper_lg_right_4" => $request->camper_lg_right_4,
                "camper_lg_right_5" => $request->camper_lg_right_5,
                "camper_lg_right_6" => $request->camper_lg_right_6,
                "camper_lg_right_7" => $request->camper_lg_right_7,
                "camper_lg_right_8" => $request->camper_lg_right_8,
                "camper_lg_right_9" => $request->camper_lg_right_9,
                "camper_lg_right_10" => $request->camper_lg_right_10,
                "camper_lg_right_11" => $request->camper_lg_right_11,
                "camper_lg_right_12" => $request->camper_lg_right_12,
                "camper_lg_right_13" => $request->camper_lg_right_13,
                "camper_lg_right_14" => $request->camper_lg_right_14,
                "camper_lg_right_15" => $request->camper_lg_right_15,
                "camper_lg_right_16" => $request->camper_lg_right_16,
                "camper_lg_right_17" => $request->camper_lg_right_17,
                "camper_lg_right_18" => $request->camper_lg_right_18,
                "camper_lg_right_19" => $request->camper_lg_right_19,
                "camper_lg_right_20" => $request->camper_lg_right_20,
                "camper_lg_right_21" => $request->camper_lg_right_21,
                "camper_lg_right_22" => $request->camper_lg_right_22,
                "camper_lg_right_23" => $request->camper_lg_right_23,
                "camper_lg_right_24" => $request->camper_lg_right_24,
                "camper_lg_right_25" => $request->camper_lg_right_25,
                "camper_lg_right_26" => $request->camper_lg_right_26,
                "camper_lg_right_27" => $request->camper_lg_right_27,
                "camper_lg_right_28" => $request->camper_lg_right_28,
                "camper_lg_right_29" => $request->camper_lg_right_29,
                "camper_lg_right_30" => $request->camper_lg_right_30,
                "camper_lg_right_31" => $request->camper_lg_right_31,
                "camper_lg_right_32" => $request->camper_lg_right_32,
                "camper_lg_right_33" => $request->camper_lg_right_33,
                "camper_lg_right_34" => $request->camper_lg_right_34,
                "camper_lg_right_35" => $request->camper_lg_right_35,
                "camper_lg_right_36" => $request->camper_lg_right_36,
                "camper_lg_right_37" => $request->camper_lg_right_37,
                "camper_lg_right_38" => $request->camper_lg_right_38,
                "camper_lg_right_39" => $request->camper_lg_right_39,
                "camper_lg_right_40" => $request->camper_lg_right_40,
                "camper_lg_right_41" => $request->camper_lg_right_41,
                "camper_lg_right_42" => $request->camper_lg_right_42,
                "camper_lg_right_43" => $request->camper_lg_right_43,
                "camper_lg_right_44" => $request->camper_lg_right_44,
                "camper_lg_right_45" => $request->camper_lg_right_45,
                "camper_lg_right_46" => $request->camper_lg_right_46,
                "camper_lg_right_47" => $request->camper_lg_right_47,
                "camper_lg_right_48" => $request->camper_lg_right_48,
                "camper_lg_right_49" => $request->camper_lg_right_49,
                "camper_lg_right_50" => $request->camper_lg_right_50,
                "camper_lg_right_51" => $request->camper_lg_right_51,
                "camper_lg_right_52" => $request->camper_lg_right_52,
                "camper_lg_right_53" => $request->camper_lg_right_53,
                "camper_lg_right_54" => $request->camper_lg_right_54,
                "camper_lg_right_55" => $request->camper_lg_right_55,
                "camper_lg_right_56" => $request->camper_lg_right_56,
                "camper_lg_right_57" => $request->camper_lg_right_57,
                "camper_lg_right_58" => $request->camper_lg_right_58,
                "camper_lg_right_59" => $request->camper_lg_right_59,
                "camper_lg_right_60" => $request->camper_lg_right_60,
                "camper_lg_right_61" => $request->camper_lg_right_61,
                "camper_lg_right_62" => $request->camper_lg_right_62,
                "camper_lg_right_63" => $request->camper_lg_right_63,
                "camper_lg_right_64" => $request->camper_lg_right_64,
                "camper_lg_right_65" => $request->camper_lg_right_65,
                "camper_lg_right_66" => $request->camper_lg_right_66,
                "camper_lg_right_67" => $request->camper_lg_right_67,
                "camper_lg_right_68" => $request->camper_lg_right_68,
                "camper_lg_right_69" => $request->camper_lg_right_69,
                "camper_lg_right_70" => $request->camper_lg_right_70,
                "camper_lg_right_71" => $request->camper_lg_right_71,
                "camper_lg_right_72" => $request->camper_lg_right_72,
                "camper_lg_right_73" => $request->camper_lg_right_73,
                "camper_lg_right_74" => $request->camper_lg_right_74,
                "camper_lg_right_75" => $request->camper_lg_right_75,
                "camper_lg_right_76" => $request->camper_lg_right_76,
                "camper_lg_right_77" => $request->camper_lg_right_77,
                "camper_lg_right_78" => $request->camper_lg_right_78,
                "camper_lg_right_79" => $request->camper_lg_right_79,
                "camper_lg_right_80" => $request->camper_lg_right_80,
                "camper_lg_right_81" => $request->camper_lg_right_81,
                "camper_lg_right_82" => $request->camper_lg_right_82,
                "camper_lg_right_83" => $request->camper_lg_right_83,
                "camper_lg_right_84" => $request->camper_lg_right_84,
                "camper_lg_right_85" => $request->camper_lg_right_85,
                "camper_lg_right_86" => $request->camper_lg_right_86,
                "camper_lg_right_87" => $request->camper_lg_right_87,
                "camper_lg_right_88" => $request->camper_lg_right_88,
                "camper_lg_right_89" => $request->camper_lg_right_89,
                "camper_lg_right_90" => $request->camper_lg_right_90,
                "camper_lg_right_91" => $request->camper_lg_right_91,
                "camper_lg_right_92" => $request->camper_lg_right_92,
                "camper_lg_right_93" => $request->camper_lg_right_93,
                "camper_lg_right_94" => $request->camper_lg_right_94,
                "camper_lg_right_95" => $request->camper_lg_right_95,
                "camper_lg_right_96" => $request->camper_lg_right_96,
                "camper_lg_right_97" => $request->camper_lg_right_97,
                "camper_lg_right_98" => $request->camper_lg_right_98,
                "camper_lg_right_99" => $request->camper_lg_right_99,
                "camper_lg_right_100" => $request->camper_lg_right_100,
                "camper_lg_right_101" => $request->camper_lg_right_101,
                "camper_lg_right_102" => $request->camper_lg_right_102,
                "camper_lg_right_103" => $request->camper_lg_right_103,
                "camper_lg_right_104" => $request->camper_lg_right_104,
                "camper_lg_right_105" => $request->camper_lg_right_105,
                "camper_lg_right_106" => $request->camper_lg_right_106,
                "camper_lg_right_107" => $request->camper_lg_right_107,
                "camper_lg_right_108" => $request->camper_lg_right_108,
                "camper_lg_right_109" => $request->camper_lg_right_109,
                "camper_lg_right_110" => $request->camper_lg_right_110,
                "camper_lg_right_111" => $request->camper_lg_right_111,
                "camper_lg_right_112" => $request->camper_lg_right_112,
                "camper_lg_right_114" => $request->camper_lg_right_114,
                "camper_lg_right_115" => $request->camper_lg_right_115,
                "camper_lg_right_116" => $request->camper_lg_right_116,
                "camper_lg_right_117" => $request->camper_lg_right_117,
                "camper_lg_right_118" => $request->camper_lg_right_118,
                "camper_lg_right_119" => $request->camper_lg_right_119,
                "camper_lg_right_120" => $request->camper_lg_right_120,
                "camper_lg_right_121" => $request->camper_lg_right_121,
                "camper_lg_right_122" => $request->camper_lg_right_122,
                "camper_lg_right_123" => $request->camper_lg_right_123,
                "camper_lg_right_124" => $request->camper_lg_right_124,
                "camper_lg_right_125" => $request->camper_lg_right_125,
                "camper_lg_right_126" => $request->camper_lg_right_126,
                "camper_lg_right_127" => $request->camper_lg_right_127,
                "camper_lg_right_128" => $request->camper_lg_right_128,
                "camper_lg_left_129" => $request->camper_lg_left_129,
                "camper_lg_left_130" => $request->camper_lg_left_130,
                "camper_lg_left_131" => $request->camper_lg_left_131,
                "camper_lg_left_132" => $request->camper_lg_left_132,
                "camper_lg_left_133" => $request->camper_lg_left_133,
                "camper_lg_left_134" => $request->camper_lg_left_134,
                "camper_lg_left_135" => $request->camper_lg_left_135,
                "camper_lg_left_136" => $request->camper_lg_left_136,
                "camper_lg_left_137" => $request->camper_lg_left_137,
                "camper_lg_left_138" => $request->camper_lg_left_138,
                "camper_lg_left_139" => $request->camper_lg_left_139,
                "camper_lg_left_140" => $request->camper_lg_left_140,
                "camper_lg_left_141" => $request->camper_lg_left_141,
                "camper_lg_left_142" => $request->camper_lg_left_142,
                "camper_lg_left_143" => $request->camper_lg_left_143,
                "camper_lg_left_144" => $request->camper_lg_left_144,
                "camper_lg_left_145" => $request->camper_lg_left_145,
                "camper_lg_left_146" => $request->camper_lg_left_146,
                "camper_lg_left_147" => $request->camper_lg_left_147,
                "camper_lg_left_148" => $request->camper_lg_left_148,
                "camper_lg_left_149" => $request->camper_lg_left_149,
                "camper_lg_left_150" => $request->camper_lg_left_150,
                "camper_lg_left_151" => $request->camper_lg_left_151,
                "camper_lg_left_152" => $request->camper_lg_left_152,
                "camper_lg_left_153" => $request->camper_lg_left_153,
                "camper_lg_left_154" => $request->camper_lg_left_154,
                "camper_lg_left_155" => $request->camper_lg_left_155,
                "camper_lg_left_156" => $request->camper_lg_left_156,
                "camper_lg_left_157" => $request->camper_lg_left_157,
                "camper_lg_left_158" => $request->camper_lg_left_158,
                "camper_lg_left_159" => $request->camper_lg_left_159,
                "camper_lg_left_160" => $request->camper_lg_left_160,
                "camper_lg_left_161" => $request->camper_lg_left_161,
                "camper_lg_left_162" => $request->camper_lg_left_162,
                "camper_lg_left_163" => $request->camper_lg_left_163,
                "camper_lg_left_164" => $request->camper_lg_left_164,
                "camper_lg_left_165" => $request->camper_lg_left_165,
                "camper_lg_left_166" => $request->camper_lg_left_166,
                "camper_lg_left_167" => $request->camper_lg_left_167,
                "camper_lg_left_168" => $request->camper_lg_left_168,
                "camper_lg_left_169" => $request->camper_lg_left_169,
                "camper_lg_left_170" => $request->camper_lg_left_170,
                "camper_lg_left_171" => $request->camper_lg_left_171,
                "camper_lg_left_172" => $request->camper_lg_left_172,
                "camper_lg_left_173" => $request->camper_lg_left_173,
                "camper_lg_left_174" => $request->camper_lg_left_174,
                "camper_lg_left_175" => $request->camper_lg_left_175,
                "camper_lg_left_176" => $request->camper_lg_left_176,
                "camper_lg_left_177" => $request->camper_lg_left_177,
                "camper_lg_left_178" => $request->camper_lg_left_178,
                "camper_lg_left_179" => $request->camper_lg_left_179,
                "camper_lg_left_180" => $request->camper_lg_left_180,
                "camper_lg_left_181" => $request->camper_lg_left_181,
                "camper_lg_left_182" => $request->camper_lg_left_182,
                "camper_lg_left_183" => $request->camper_lg_left_183,
                "camper_lg_left_184" => $request->camper_lg_left_184,
                "camper_lg_left_185" => $request->camper_lg_left_185,
                "camper_lg_left_186" => $request->camper_lg_left_186,
                "camper_lg_left_187" => $request->camper_lg_left_187,
                "camper_lg_left_188" => $request->camper_lg_left_188,
                "camper_lg_left_189" => $request->camper_lg_left_189,
                "camper_lg_left_190" => $request->camper_lg_left_190,
                "camper_lg_left_191" => $request->camper_lg_left_191,
                "camper_lg_left_192" => $request->camper_lg_left_192,
                "camper_lg_left_193" => $request->camper_lg_left_193,
                "camper_lg_left_194" => $request->camper_lg_left_194,
                "camper_lg_left_195" => $request->camper_lg_left_195,
                "camper_lg_left_196" => $request->camper_lg_left_196,
                "camper_lg_left_197" => $request->camper_lg_left_197,
                "camper_lg_left_198" => $request->camper_lg_left_198,
                "camper_lg_left_199" => $request->camper_lg_left_199,
                "camper_lg_left_200" => $request->camper_lg_left_200,
                "camper_lg_left_201" => $request->camper_lg_left_201,
                "camper_lg_left_202" => $request->camper_lg_left_202,
                "camper_lg_left_203" => $request->camper_lg_left_203,
                "camper_lg_left_204" => $request->camper_lg_left_204,
                "camper_lg_left_205" => $request->camper_lg_left_205,
                "camper_lg_left_206" => $request->camper_lg_left_206,
                "camper_lg_left_207" => $request->camper_lg_left_207,
                "camper_lg_left_208" => $request->camper_lg_left_208,
                "camper_lg_left_209" => $request->camper_lg_left_209,
                "camper_lg_left_210" => $request->camper_lg_left_210,
                "camper_lg_left_211" => $request->camper_lg_left_211,
                "camper_lg_left_212" => $request->camper_lg_left_212,
                "camper_lg_left_213" => $request->camper_lg_left_213,
                "camper_lg_left_214" => $request->camper_lg_left_214,
                "camper_lg_left_215" => $request->camper_lg_left_215,
                "camper_lg_left_216" => $request->camper_lg_left_216,
                "camper_lg_left_217" => $request->camper_lg_left_217,
                "camper_lg_left_218" => $request->camper_lg_left_218,
                "camper_lg_left_219" => $request->camper_lg_left_219,
                "camper_lg_left_220" => $request->camper_lg_left_220,
                "camper_lg_left_221" => $request->camper_lg_left_221,
                "camper_lg_left_222" => $request->camper_lg_left_222,
                "camper_lg_left_223" => $request->camper_lg_left_223,
                "camper_lg_left_224" => $request->camper_lg_left_224,
                "camper_lg_left_225" => $request->camper_lg_left_225,
                "camper_lg_left_226" => $request->camper_lg_left_226,
                "camper_lg_left_227" => $request->camper_lg_left_227,
                "camper_lg_left_228" => $request->camper_lg_left_228,
                "camper_lg_left_229" => $request->camper_lg_left_229,
                "camper_lg_left_230" => $request->camper_lg_left_230,
                "camper_lg_left_231" => $request->camper_lg_left_231,
                "camper_lg_left_232" => $request->camper_lg_left_232,
                "camper_lg_left_233" => $request->camper_lg_left_233,
                "camper_lg_left_234" => $request->camper_lg_left_234,
                "camper_lg_left_235" => $request->camper_lg_left_235,
                "camper_lg_left_236" => $request->camper_lg_left_236,
                "camper_lg_left_237" => $request->camper_lg_left_237,
                "camper_lg_left_238" => $request->camper_lg_left_238,
                "camper_lg_left_239" => $request->camper_lg_left_239,
                "camper_lg_left_240" => $request->camper_lg_left_240,
                "camper_lg_left_241" => $request->camper_lg_left_241,
                "camper_lg_left_242" => $request->camper_lg_left_242,
                "camper_lg_left_243" => $request->camper_lg_left_243,
                "camper_lg_left_244" => $request->camper_lg_left_244,
                "camper_lg_left_245" => $request->camper_lg_left_245,
                "camper_lg_left_246" => $request->camper_lg_left_246,
                "camper_lg_left_247" => $request->camper_lg_left_247,
                "camper_lg_left_248" => $request->camper_lg_left_248,
                "camper_lg_left_249" => $request->camper_lg_left_249,
                "camper_lg_left_250" => $request->camper_lg_left_250,
                "camper_lg_left_251" => $request->camper_lg_left_251,
                "camper_lg_left_252" => $request->camper_lg_left_252,
                "camper_lg_left_253" => $request->camper_lg_left_253,
                "camper_lg_left_254" => $request->camper_lg_left_254,
                "camper_lg_left_255" => $request->camper_lg_left_255,
                "camper_lg_left_256" => $request->camper_lg_left_256,
                "camper_lg_left_257" => $request->camper_lg_left_257,
                "camper_lg_left_258" => $request->camper_lg_left_258,
                "camper_lg_front_259" => $request->camper_lg_front_259,
                "camper_lg_front_260" => $request->camper_lg_front_260,
                "camper_lg_front_261" => $request->camper_lg_front_261,
                "camper_lg_front_262" => $request->camper_lg_front_262,
                "camper_lg_front_263" => $request->camper_lg_front_263,
                "camper_lg_front_264" => $request->camper_lg_front_264,
                "camper_lg_front_265" => $request->camper_lg_front_265,
                "camper_lg_front_266" => $request->camper_lg_front_266,
                "camper_lg_front_267" => $request->camper_lg_front_267,
                "camper_lg_front_268" => $request->camper_lg_front_268,
                "camper_lg_front_269" => $request->camper_lg_front_269,
                "camper_lg_front_270" => $request->camper_lg_front_270,
                "camper_lg_front_271" => $request->camper_lg_front_271,
                "camper_lg_front_272" => $request->camper_lg_front_272,
                "camper_lg_front_273" => $request->camper_lg_front_273,
                "camper_lg_front_274" => $request->camper_lg_front_274,
                "camper_lg_front_275" => $request->camper_lg_front_275,
                "camper_lg_front_276" => $request->camper_lg_front_276,
                "camper_lg_front_277" => $request->camper_lg_front_277,
                "camper_lg_front_278" => $request->camper_lg_front_278,
                "camper_lg_front_279" => $request->camper_lg_front_279,
                "camper_lg_front_280" => $request->camper_lg_front_280,
                "camper_lg_front_281" => $request->camper_lg_front_281,
                "camper_lg_front_282" => $request->camper_lg_front_282,
                "camper_lg_front_283" => $request->camper_lg_front_283,
                "camper_lg_front_284" => $request->camper_lg_front_284,
                "camper_lg_front_285" => $request->camper_lg_front_285,
                "camper_lg_front_286" => $request->camper_lg_front_286,
                "camper_lg_front_287" => $request->camper_lg_front_287,
                "camper_lg_front_288" => $request->camper_lg_front_288,
                "camper_lg_front_289" => $request->camper_lg_front_289,
                "camper_lg_front_290" => $request->camper_lg_front_290,
                "camper_lg_front_291" => $request->camper_lg_front_291,
                "camper_lg_front_292" => $request->camper_lg_front_292,
                "camper_lg_front_293" => $request->camper_lg_front_293,
                "camper_lg_front_294" => $request->camper_lg_front_294,
                "camper_lg_front_295" => $request->camper_lg_front_295,
                "camper_lg_front_296" => $request->camper_lg_front_296,
                "camper_lg_front_297" => $request->camper_lg_front_297,
                "camper_lg_front_298" => $request->camper_lg_front_298,
                "camper_lg_back_299" => $request->camper_lg_back_299,
                "camper_lg_back_300" => $request->camper_lg_back_300,
                "camper_lg_back_301" => $request->camper_lg_back_301,
                "camper_lg_back_302" => $request->camper_lg_back_302,
                "camper_lg_back_303" => $request->camper_lg_back_303,
                "camper_lg_back_304" => $request->camper_lg_back_304,
                "camper_lg_back_305" => $request->camper_lg_back_305,
                "camper_lg_back_306" => $request->camper_lg_back_306,
                "camper_lg_back_307" => $request->camper_lg_back_307,
                "camper_lg_back_308" => $request->camper_lg_back_308,
                "camper_lg_back_309" => $request->camper_lg_back_309,
                "camper_lg_back_310" => $request->camper_lg_back_310,
                "camper_lg_back_311" => $request->camper_lg_back_311,
                "camper_lg_back_312" => $request->camper_lg_back_312,
                "camper_lg_back_313" => $request->camper_lg_back_313,
                "camper_lg_back_314" => $request->camper_lg_back_314,
                "camper_lg_back_315" => $request->camper_lg_back_315,
                "camper_lg_back_316" => $request->camper_lg_back_316,
                "camper_lg_back_317" => $request->camper_lg_back_317,
                "camper_lg_back_318" => $request->camper_lg_back_318,
                "camper_lg_back_319" => $request->camper_lg_back_319,
                "camper_lg_back_320" => $request->camper_lg_back_320,
                "camper_lg_back_321" => $request->camper_lg_back_321,
                "camper_lg_back_322" => $request->camper_lg_back_322,
                "camper_lg_back_323" => $request->camper_lg_back_323,
                "camper_lg_back_324" => $request->camper_lg_back_324,
                "camper_lg_back_325" => $request->camper_lg_back_325,
                "camper_lg_back_326" => $request->camper_lg_back_326,
                "camper_lg_back_327" => $request->camper_lg_back_327,
                "camper_lg_back_328" => $request->camper_lg_back_328,
                "camper_lg_back_329" => $request->camper_lg_back_329,
                "camper_lg_back_330" => $request->camper_lg_back_330,
                "camper_lg_back_331" => $request->camper_lg_back_331,
                "camper_lg_back_332" => $request->camper_lg_back_332,
            );

            $vehicle_data = json_encode($vehicle_data);
        }
        if(!empty($request->detailing_correction_id))
        {
            $detailing_correction = DetailingCorrection::where('detailing_correction_id',base64_decode(trim($request->detailing_correction_id)))->first();
        }else{
            $detailing_correction = new DetailingCorrection();
        }

        $detailing_correction->user_id = auth()->user()->id;
        $detailing_correction->car_id = $car_id;
        $detailing_correction->service_id = $serviceId;
        $detailing_correction->service_type = "correction";
        $detailing_correction->vehicle_type = $request->vehicle_type;
        $detailing_correction->vehicle_data = $vehicle_data;
        $detailing_correction->unit = $request->unit;
        if ($detailing_correction->save()) {
            $commonClass = new CommonController;
            $commonClass->addServiceData($car_id, $serviceId);

            $checkservice = explode(',', auth()->user()->shop_services);
            if (count($checkservice) < 1) {

                return redirect()->route('shop-settings.mydashboard', ['myshopServices']);
                $redirecturl = '/shop-settings/mydashboard';
            }
             else {

                $detailing_correction_id = base64_encode($detailing_correction->detailing_correction_id);
                $redirecturl = '/shop-settings/detailing-professional/?servicedata='.$request->carShopService."&id=".$detailing_correction_id;
            }
            return $redirecturl;
        } else {
            return "fail";
        }
    }
}
