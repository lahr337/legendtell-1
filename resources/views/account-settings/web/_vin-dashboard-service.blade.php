@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('account-settings.web.leftmenu')
<?php

use App\Http\Controllers\CommonController; ?>
<div class="account-settings__content-wr vin-user-active">
   <div class="account-settings__content account-settings__content-history-wr account-settings__content--active" id="vindashboard">

      <link href="{{ asset('/assets/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
      <link href="{{ asset('/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link href="{{ asset('/assets/css/web_service.css') }}" rel="stylesheet" type="text/css" />
      <div id="imageSlider">
         <div id="prev">
            <img src="{{ asset('/assets/images/caret-prev.png') }}">
         </div>
         <div id="next">
            <img src="{{ asset('/assets/images/caret-next.png') }}">
         </div>
         <?php
         $servicenamenew = "";
         $arr = array();

         $last_key = "";
         if ($car_service_data) {
            if (!empty($car_service_data) || $car_service_data != null) {
               $arr = $car_service_data;

               $last_key = ($arr)[count($arr) - 1];

               $servicename = App\Http\Controllers\CommonController::getServiceName($last_key);
               $servicenamenew = $servicename['service_name'];
            }
         }

         $newarr = sort($arr);

         $dataService = array();
         if (!empty($CarData->userData->shop_services)) {
            $dataService = explode(',', $CarData->userData->shop_services);
         }
         $dataServiceDate = array();
         if (!empty($car->allservice_date)) {
            $dataServiceDate = explode(',', $car->allservice_date);
         }

         $chkarrlength = 0;

         ?>
         {{-- new code --}}
         <div id="sliderWrapper" class="sliderWrapper">
            <ul class="slider-container">
               @if(count($carsShop)>0)
               @foreach($shopAllServices as $carslide)
               @if($carslide->service_id)
               <?php

               if ($carslide->service_id == '1') {
                  $id = $carslide->ac_id;
               }
               if ($carslide->service_id == '2') {
                  $id = $carslide->break_id;
               }
               if ($carslide->service_id == '3') {
                  $id = $carslide->battery_service_id;
               }
               if ($carslide->service_id == '4') {
                  $id = $carslide->wash_id;
               }
               if ($carslide->service_id == '5') {
                  $id = "";
               }
               if ($carslide->service_id == '6') {
                  $id = $carslide->collision_id;
               }
               if ($carslide->service_id == '7') {
                  $id = $carslide->conc_id;
               }
               if ($carslide->service_id == '8') {
                  $id = $carslide->custom_build_body_id;
               }
               if ($carslide->service_id == '9') {
                  $id = $carslide->dealer_ship_id;
               }
               if ($carslide->service_id == '10') {
                  $id = $carslide->detailing_correction_id;
               }
               if ($carslide->service_id == '11') {
                  $id = $carslide->electric_controls_id;
               }
               if ($carslide->service_id == '12') {
                  $id = $carslide->engine_id;
               }
               if ($carslide->service_id == '13') {
                  $id = $carslide->exhaust_id;
               }
               if ($carslide->service_id == '14') {
                  $id = $carslide->fabrication_welding;
               }
               if ($carslide->service_id == '15') {
                  $id = $carslide->frame_alignment_id;
               }
               if ($carslide->service_id == '16') {
                  $id = $carslide->fuel_system_id;
               }
               if ($carslide->service_id == '17') {
                  $id = $carslide->glass_id;
               }
               if ($carslide->service_id == '18') {
                  $id = $carslide->lubrication_id;
               }
               if ($carslide->service_id == '19') {
                  $id = $carslide->mechanical_id;
               }
               if ($carslide->service_id == '20') {
                  $id = $carslide->nitrous_id;
               }
               if ($carslide->service_id == '22') {
                  $id = $carslide->oil_id;
               }
               if ($carslide->service_id == '23') {
                  $id = $carslide->paint_body_id;
               }
               if ($carslide->service_id == '24') {
                  $id = $carslide->paint_protection_film_id;
               }
               if ($carslide->service_id == '25') {
                  $id = $carslide->part_id;
               }
               if ($carslide->service_id == '26') {
                  $id = $carslide->paintless_dent_repair_id;
               }
               if ($carslide->service_id == '27') {
                  $id = $carslide->performance_dyno_tuning_id;
               }
               if ($carslide->service_id == '28') {
                  $id = $carslide->powder_coating_id;
               }
               if ($carslide->service_id == '29') {
                  $id = $carslide->race_track_id;
               }
               if ($carslide->service_id == '31') {
                  $id = $carslide->rim_repair_id;
               }
               if ($carslide->service_id == '32') {
                  $id = $carslide->suspension_id;
               }
               if ($carslide->service_id == '33') {
                  $id = $carslide->specialty_other_id;
               }
               if ($carslide->service_id == '34') {
                  $id = $carslide->tire_id;
               }
               if ($carslide->service_id == '35') {
                  $id = $carslide->tint_id;
               }
               if ($carslide->service_id == '36') {
                  $id = $carslide->transmission_id;
               }
               if ($carslide->service_id == '37') {
                  $id = $carslide->vinyl_id;
               }
               ?>
               <li>
                  <div class="shop-content-wrap view-shop-slider">

                     <!-- <div class="shop-logo">
                        <img src="{{asset('/assets/images/services/').'/'.$carslide['shop_service']['service_photo']}}">
                     </div> -->
                  </a>
                     <?php
                     $nextservice = $nextservice;
                     if (!empty($arr[$carslide->service_id + 1])) {
                        $nextservice = $arr[$carslide->service_id + 1];
                     }
                     ?>
                     @if(in_array($carslide->service_id ,$arr))
                     <a href="/account-settings/vin-dashboard-service/{{base64_encode($carslide->car_id.'%%%'.$carslide->service_id.'%%%'.$chkarrlength.'%%%'.$id)}}">
                        <div class="shop-logo">
                           <img src="{{asset('/assets/images/services/').'/'.$carslide['shop_service']['service_photo']}}">
                        </div>
                        <ul class="shop-content">

                           <li>{{ucwords($carslide['shop_service']['service_name'])}}</li>
                           <li>{{ucwords($carslide->shop_user->shop_name)}}</li>
                           <li class="primary-red"> {{date("m/d/Y", strtotime($carslide['created_at']))}}</li>

                        </ul>
                     </a>
                     <?php $chkarrlength++; ?>
                     @else
                     <ul class="shop-content" style="cursor: not-allowed;">

                        <li style="color: #c1c1c1;">{{ucwords($carslide['shop_service']['service_name'])}}</li>
                        <li style="color: #c1c1c1;">None</li>
                     </ul>
                     @endif
                  </div>
               </li>
               @endif
               @endforeach
               @endif

            </ul>
         </div>
         {{-- end code --}}
         {{-- <div id="sliderWrapper" class="sliderWrapper">
            <ul class="slider-container">
               @if(count($carsShop)>0)
               @foreach($carsShop as $carslide)
               @if($carslide->service_id)
               <?php $lastckId = explode(',', $carslide->service_id);
               $AllService = [];
               foreach ($lastckId as $key => $value) {
                  $servicename2 = App\Http\Controllers\CommonController::getServiceName(($value));
                  $AllService[] = $servicename2['service_name'];
               }
               $servicenamenew = "";
               if (!empty($lastckId)) {
                  $servicename = App\Http\Controllers\CommonController::getServiceName(end($lastckId));
                  $servicenamenew = $servicename['service_name'];
               }
               ?>
               <li>
                  <div class="shop-content-wrap">
                     <a href="{{route('account-settings.index',['vindashboard',$carslide->id])}}">
         <div class="shop-logo">
            <img src="{{$carslide->userData->shop_photo ? $carslide->userData->shop_photo : '/shop_photo.png' }}">
         </div></a>
         <ul class="shop-content">
            <li>{{ucwords($carslide->userData->shop_name)}}</li>

            <li> {{COUNT($AllService)}} Service types</li>
            <li class="primary-red">{{date("m/d/Y", strtotime($carslide->service_date) )  }}</li>


            <li>{{($servicenamenew)}}</li>
         </ul>
      </div>
      </li>
      @endif
      @endforeach
      @endif

      </ul>
   </div> --}}
</div>
<div>
   <div class="content-cmn-wrap">
      <div class="row">
         <div class="col-12 col-md-6">
            @if($car->userData && $car->userData->shop_photo)
            @if($car->medias_picture && $car->medias_picture->filename)

            @if($car->medias_picture->type == "image")

            <img class="w-100" src="{{$car->medias_picture->filename}}">
            @else
            <video width="320" height="240" controls>
               <source src="{{$car->medias_picture->filename}}" type="video/mp4">
               <source src="{{$car->medias_picture->filename}}" type="video/ogg">
               Your browser does not support the video tag.
            </video>
            @endif
            @else
            <img src="{{$car->userData->shop_photo ? $car->userData->shop_photo : '/shop_photo.png' }}">
            @endif
            @else
            @if($car->medias_picture && $car->medias_picture->filename)
            @if($car->medias_picture->type == "image")
            <img class="w-100" src="{{$car->medias_picture->filename}}">
            @else
            <video width="320" height="240" controls>
               <source src="{{$car->medias_picture->filename}}" type="video/mp4">
               <source src="{{$car->medias_picture->filename}}" type="video/ogg">
               Your browser does not support the video tag.
            </video>
            @endif
            @else
            <img class="w-100" src="{{ asset('/assets/images/image-empty-state.jpg') }}">
            @endif
            @endif
            {{-- <img class="w-100" src="{{ asset('/assets/images/image-empty-state.jpg') }}"> --}}
         </div>
         <div class="col-12 col-md-6">
            <ul class="desc-wrap">
               <li class="cmn-serve-title primary-red">{{$car->vin ?? ''}}</li>
               <li class="cmn-serve-title">{{ $car->year ?? ''}}</li>
               <li class="cmn-serve-title">{{ $car->make}}</li>
               <li class="cmn-serve-title">{{ $car->model ?? ''}}</li>
               {{-- <li class="cmn-serve-title">Belize primary-Blue</li> --}}
               <li class="cmn-serve-title">@if($car->milage){{ $car->milage ?? ''}} Mileage @endif</li>
               <li class="cmn-serve-title">@if($car->color){{ $car->color ?? ''}} @endif</li>
            </ul>
         </div>
      </div>

      <div class="row border-bb">
         <div class="col-6 col-md-6">
            <div class="product-desc services-details text-right">
               <p>Service:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="product-desc services-details">
               <?php
               $servicename = "";
               if (!($car_service_data) || $car_service_data != null) {
                  $arr = $car_service_data;
                  $last_key = ($arr)[count($arr) - 1];
                  $servicename = App\Http\Controllers\CommonController::getServiceName($last_key);
               }


               ?>
               <p>{{ $latest_services['shop_service']['service_name']}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6 mt-4">
            <div class="services-details text-right">
               <p>Serviced by:</p>
            </div>
         </div>
         <div class="col-6 col-md-6 mt-4">
            <div class="services-details">
               <p>{{ucwords($latest_services->shop_user->shop_name)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p>Shop phone number:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>{{($latest_services->shop_user->contact_number)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p>Shop Email:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>{{($latest_services->shop_user->email )}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6 my-4">
            <div class="services-details text-right">
               <p>Date of service:</p>
            </div>
         </div>
         <div class="col-6 col-md-6 my-4">
            <div class="services-details">
               <p>{{date("m/d/Y", strtotime($latest_services->created_at) )  }}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="primary-red">Upcoming recommended service:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-red">None</p>
            </div>
         </div>
      </div>
      <div class="row border-bb">

         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">General Repair:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>@if($CarData->car_issue) @if($CarData->car_issue->repair_info) {{$CarData->car_issue->repair_info}} @else N/A @endif @endif </p>
            </div>
         </div>

         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">Known Issue:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>@if($CarData->car_issue) @if($CarData->car_issue->known_issue) {{$CarData->car_issue->known_issue}} @else N/A @endif @endif </p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">Manufacturer Recall:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>@if($CarData->car_issue) @if($CarData->car_issue->recall_issue) {{$CarData->car_issue->recall_issue}} @else N/A @endif @endif </p>
            </div>
         </div>

         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">New Install:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>@if($CarData->car_issue) @if($CarData->car_issue->install_info) {{$CarData->car_issue->install_info}} @else N/A @endif @endif </p>
            </div>
         </div>

         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">New Issue:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>@if($CarData->car_issue) @if($CarData->car_issue->diagnosis) {{$CarData->car_issue->diagnosis}} @else N/A @endif @endif </p>
            </div>
         </div>


         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">Regular Servicing:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>@if($CarData->car_issue) @if($CarData->car_issue->servicing_issue) {{$CarData->car_issue->servicing_issue}} @else N/A @endif @endif </p>
            </div>
         </div>



      </div>

      {{-- ac service --}}
      @if($serviceId==1)
      @if($CarData)
      <div class="row border-bb">
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">STATIC PRESSURE</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            &nbsp;
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p>Low Side Check</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>{{ucwords($CarData->static_pressure_low)}} @if(!empty($CarData->static_pressure_low))PSI @endif</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p>High Side Check</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p> {{ucwords($CarData->static_pressure_high)}} @if(!empty($CarData->static_pressure_high))PSI @endif</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold mt-4">DYNAMIC PRESSURE</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            &nbsp;
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p>Low Side Check</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p> {{ucwords($CarData->dynamic_pressure_low)}} @if(!empty($CarData->dynamic_pressure_low))PSI @endif</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p>High Side Check</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p>{{ucwords($CarData->dynamic_pressure_high)}} @if(!empty($CarData->dynamic_pressure_high))PSI @endif</p>
            </div>
         </div>
      </div>
      <div class="row border-bb">
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">CONDENSOR:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->condensor=='good')green @elseif($CarData->condensor=='bad')red  @elseif($CarData->condensor=='replaced')yellow @else blue @endif"> @if($CarData->condensor=='good')Checks @elseif($CarData->condensor=='bad') @elseif($CarData->condensor=='replaced')Was @elseif($CarData->condensor=='Upgraded')Was @else N/A @endif {{ucwords($CarData->condensor)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">COMPRESSOR:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->compressor=='good')green @elseif($CarData->compressor=='bad')red  @elseif($CarData->compressor=='replaced')yellow @else blue @endif">@if($CarData->compressor=='good')Checks @elseif($CarData->compressor=='bad') @elseif($CarData->compressor=='replaced')Was @elseif($CarData->compressor=='Upgraded')Was @else N/A @endif {{ucwords($CarData->compressor)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">EVAPORATOR CORE:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->evaporator_core=='good')green @elseif($CarData->evaporator_core=='bad')red  @elseif($CarData->evaporator_core=='replaced')yellow @else blue @endif">@if($CarData->evaporator_core=='good')Checks @elseif($CarData->evaporator_core=='bad') @elseif($CarData->evaporator_core=='replaced')Was @elseif($CarData->evaporator_core=='Upgraded') Was @else N/A @endif {{ucwords($CarData->evaporator_core)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">RECEIVER DRYER:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->receiver_dryer=='good')green @elseif($CarData->receiver_dryer=='bad')red  @elseif($CarData->receiver_dryer=='replaced')yellow @else blue @endif">@if($CarData->receiver_dryer=='good')Checks @elseif($CarData->receiver_dryer=='bad') @elseif($CarData->receiver_dryer=='replaced')Was @elseif($CarData->receiver_dryer=='Upgraded')Was @else N/A @endif {{ucwords($CarData->receiver_dryer)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">A/C LINES:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">

               <p class="primary-@if($CarData->ac_line=='good')green @elseif($CarData->ac_line=='bad')red  @elseif($CarData->ac_line=='replaced')yellow @else blue @endif">@if($CarData->ac_line=='good')Checks @elseif($CarData->ac_line=='bad') @elseif($CarData->ac_line=='replaced')Was @elseif($CarData->ac_line=='Upgraded')Was @else N/A @endif {{ucwords($CarData->ac_line)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">PRESSURE SWITCHES:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->pressure_switches=='good')green @elseif($CarData->pressure_switches=='bad')red  @elseif($CarData->pressure_switches=='replaced')yellow @else blue @endif">@if($CarData->pressure_switches=='good')Checks @elseif($CarData->pressure_switches=='bad') @elseif($CarData->pressure_switches=='replaced')Was @elseif($CarData->pressure_switches=='Upgraded')Was @else N/A @endif {{ucwords($CarData->pressure_switches)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">ORIFICE TUBE:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->office_tube=='good')green @elseif($CarData->office_tube=='bad')red  @elseif($CarData->office_tube=='replaced')yellow @else blue @endif">@if($CarData->office_tube=='good')Checks @elseif($CarData->office_tube=='bad') @elseif($CarData->office_tube=='replaced')Was @elseif($CarData->office_tube=='Upgraded')Was @else N/A @endif {{ucwords($CarData->office_tube)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">EXPANSION VALVE:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->expansion_valve=='good')green @elseif($CarData->expansion_valve=='bad')red  @elseif($CarData->expansion_valve=='replaced')yellow @else blue @endif">@if($CarData->expansion_valve=='good')Checks @elseif($CarData->expansion_valve=='bad') @elseif($CarData->expansion_valve=='replaced')Was @elseif($CarData->expansion_valve=='Upgraded')Was @else N/A @endif {{ucwords($CarData->expansion_valve)}}</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details text-right">
               <p class="font-bold">SEALS:</p>
            </div>
         </div>
         <div class="col-6 col-md-6">
            <div class="services-details">
               <p class="primary-@if($CarData->seals=='good')green @elseif($CarData->seals=='bad')red  @elseif($CarData->seals=='replaced')yellow @else blue @endif">@if($CarData->seals=='good')Checks @elseif($CarData->seals=='bad') @elseif($CarData->seals=='replaced')Was @elseif($CarData->seals=='Upgraded')Was @else N/A @endif {{ucwords($CarData->seals)}}</p>
            </div>
         </div>
      </div>

      <div class="service-desc-content border-bb">
         <h4>SHOP NOTES / DETAILS</h4>
         <p>
            {{($CarData->ac_notes)}}
         </p>
      </div>
      <div class="service-desc-content border-bb">
         <h4>PHOTOS</h4>
         <div class="cmn-slider-wrap carslider ">
            @if($CarData && $CarData->documents)
            <div class="owl-carousel owl-theme photos-slider">
               @foreach(explode(',',$CarData->documents) as $key=>$value)
               <?php $chkextension = explode('.', $value);
               error_reporting(0); ?>

               @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

               <div class="item">
                  <div class="slider-img lightbox" id="{{ $value}}">
                     <img src="{{ $value}}">
                     <span class="plus-overlay ">

                        <img src="{{ asset('/assets/images/plus.png') }}">
                     </span>
                  </div>
               </div>
               @endif
               @endforeach

            </div>
            @endif
         </div>
      </div>
      <div class="service-desc-content border-bb">
         <h4>DOCUMENTS</h4>
         <div class="cmn-slider-wrap carslider">
            @if($CarData && $CarData->documents)
            <div class="owl-carousel owl-theme document-slider">
               @foreach(explode(',',$CarData->documents) as $key=>$value)
               <?php $chkextension = explode('.', $value); ?>
               @if( trim($chkextension[5]) =='pdf')

               <div class="item">
                  <a href="{{ $value}}" target="_blank">
                     <div class="slider-img" id="{{ $value}}" style="background:none">
                        <img src="/assets/images/pdf.png">
                        <span class="plus-overlay ">

                           <img src="{{ asset('/assets/images/plus.png') }}">

                        </span>
                  </a>
               </div>
            </div>
            @endif
            @endforeach

         </div>
         @endif
      </div>
   </div>
   @endif
   @endif
   {{-- end ac service --}}
   {{-- Brake Service  --}}
   @if($serviceId==2)
   @if($CarData)
   <div class="row border-bb">
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold">DRIVER FRONT BRAKES:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->driver_front_break=='Good')green @elseif($CarData->driver_front_break=='Bad')red  @elseif($CarData->driver_front_break=='Replaced')yellow @else blue @endif">@if($CarData->driver_front_break=='Good')Checks @elseif($CarData->driver_front_break=='Bad') @elseif($CarData->driver_front_break=='Replaced')Was @elseif($CarData->driver_front_break=='Upgraded')Was @else N/A @endif{{ucwords($CarData->driver_front_break)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> DRIVER REAR BRAKES:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->driver_rear_break=='Good')green @elseif($CarData->driver_rear_break=='Bad')red  @elseif($CarData->driver_rear_break=='Replaced')yellow @else blue @endif">@if($CarData->driver_rear_break=='Good')Checks @elseif($CarData->driver_rear_break=='Bad') @elseif($CarData->driver_rear_break=='Replaced')Was @elseif($CarData->driver_rear_break=='Upgraded')Was @else N/A @endif{{ucwords($CarData->driver_rear_break)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> DRIVER FRONT ROTORS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->driver_front_rotors=='Good')green @elseif($CarData->driver_front_rotors=='Bad')red  @elseif($CarData->driver_front_rotors=='Replaced')yellow @else blue @endif">@if($CarData->driver_front_rotors=='Good')Checks @elseif($CarData->driver_front_rotors=='Bad') @elseif($CarData->driver_front_rotors=='Replaced')Was @elseif($CarData->driver_front_rotors=='Upgraded')Was @else N/A @endif{{ucwords($CarData->driver_front_rotors)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold">DRIVER REAR ROTORS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->driver_rear_rotors=='Good')green @elseif($CarData->driver_rear_rotors=='Bad')red  @elseif($CarData->driver_rear_rotors=='Replaced')yellow @else blue @endif">@if($CarData->driver_rear_rotors=='good')Checks @elseif($CarData->driver_rear_rotors=='Bad') @elseif($CarData->driver_rear_rotors=='Replaced')Was @elseif($CarData->driver_rear_rotors=='Upgraded')Was @else N/A @endif{{ucwords($CarData->driver_rear_rotors)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold">PASSENGER FRONT BRAKES:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">

            <p class="primary-@if($CarData->passenger_front_brakes=='Good')green @elseif($CarData->passenger_front_brakes=='Bad')red  @elseif($CarData->passenger_front_brakes=='Replaced')yellow @else blue @endif">@if($CarData->passenger_front_brakes=='Good')Checks @elseif($CarData->passenger_front_brakes=='Bad') @elseif($CarData->passenger_front_brakes=='Replaced')Was @elseif($CarData->passenger_front_brakes=='Upgraded')Was @else N/A @endif{{ucwords($CarData->passenger_front_brakes)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold">PASSENTER REAR BRAKES:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->passenter_rear_brakes=='Good')green @elseif($CarData->passenter_rear_brakes=='Bad')red  @elseif($CarData->passenter_rear_brakes=='Replaced')yellow @else blue @endif">@if($CarData->passenter_rear_brakes=='Good')Checks @elseif($CarData->passenter_rear_brakes=='Bad') @elseif($CarData->passenter_rear_brakes=='Replaced')Was @elseif($CarData->passenter_rear_brakes=='Upgraded')Was @else N/A @endif{{ucwords($CarData->passenter_rear_brakes)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> PASSENGER FRONT ROTORS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->passenger_front_rotors=='Good')green @elseif($CarData->passenger_front_rotors=='Bad')red  @elseif($CarData->passenger_front_rotors=='Replaced')yellow @else blue @endif">@if($CarData->passenger_front_rotors=='Good')Checks @elseif($CarData->passenger_front_rotors=='Bad') @elseif($CarData->passenger_front_rotors=='Replaced')Was @elseif($CarData->passenger_front_rotors=='Upgraded')Was @else N/A @endif{{ucwords($CarData->passenger_front_rotors)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold">PASSENGER REAR ROTORS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->passenger_rear_rotors=='Good')green @elseif($CarData->passenger_rear_rotors=='Bad')red  @elseif($CarData->passenger_rear_rotors=='Replaced')yellow @else blue @endif">@if($CarData->passenger_rear_rotors=='Good')Checks @elseif($CarData->passenger_rear_rotors=='Bad') @elseif($CarData->passenger_rear_rotors=='Replaced')Was @elseif($CarData->passenger_rear_rotors=='Upgraded')Was @else N/A @endif{{ucwords($CarData->passenger_rear_rotors)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> DRIVER FRONT CALIPERS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->driver_front_calipers=='Good')green @elseif($CarData->driver_front_calipers=='Bad')red  @elseif($CarData->driver_front_calipers=='Replaced')yellow @else blue @endif">@if($CarData->driver_front_calipers=='Good')Checks @elseif($CarData->driver_front_calipers=='Bad') @elseif($CarData->driver_front_calipers=='Replaced')Was @elseif($CarData->driver_front_calipers=='Upgarded')Was @else N/A @endif{{ucwords($CarData->driver_front_calipers)}}</p>
         </div>
      </div>

      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> DRIVER REAR CALIPERS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->driver_rear_calipers=='Good')green @elseif($CarData->driver_rear_calipers=='Bad')red  @elseif($CarData->driver_rear_calipers=='Replaced')yellow @else blue @endif">@if($CarData->driver_rear_calipers=='Good')Checks @elseif($CarData->driver_rear_calipers=='Bad') @elseif($CarData->driver_rear_calipers=='Replaced')Was @elseif($CarData->driver_rear_calipers=='Upgraded')Was @else N/A @endif{{ucwords($CarData->driver_rear_calipers)}}</p>
         </div>
      </div>

      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> PASSENGER FRONT CALIPERS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->passenger_front_calipers=='Good')green @elseif($CarData->passenger_front_calipers=='Bad')red  @elseif($CarData->passenger_front_calipers=='Replaced')yellow @else blue @endif">@if($CarData->passenger_front_calipers=='Good')Checks @elseif($CarData->passenger_front_calipers=='Bad') @elseif($CarData->passenger_front_calipers=='Replaced')Was @elseif($CarData->passenger_front_calipers=='Upgraded')Was @else N/A @endif{{ucwords($CarData->passenger_front_calipers)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> PASSENGER REAR CALIPERS:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->passenger_rear_calipers=='Good')green @elseif($CarData->passenger_rear_calipers=='Bad')red  @elseif($CarData->passenger_rear_calipers=='Replaced')yellow @else blue @endif">@if($CarData->passenger_rear_calipers=='Good')Checks @elseif($CarData->passenger_rear_calipers=='Bad') @elseif($CarData->passenger_rear_calipers=='Replaced')Was @elseif($CarData->passenger_rear_calipers=='Upgraded')Was @else N/A @endif{{ucwords($CarData->passenger_rear_calipers)}}</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold">BRAKE HOSES:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->brake_hoses=='Good')green @elseif($CarData->brake_hoses=='Bad')red  @elseif($CarData->brake_hoses=='Replaced')yellow @else blue @endif">@if($CarData->brake_hoses=='Good')Checks @elseif($CarData->brake_hoses=='Bad') @elseif($CarData->brake_hoses=='Replaced')Was @elseif($CarData->brake_hoses=='Upgraded')Was @else N/A @endif{{ucwords($CarData->brake_hoses)}}</p>
         </div>
      </div>

      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> BRAKE LINES:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->brake_lines=='Good')green @elseif($CarData->brake_lines=='Bad')red  @elseif($CarData->brake_lines=='Replaced')yellow @else blue @endif">@if($CarData->brake_lines=='Good')Checks @elseif($CarData->brake_lines=='Bad') @elseif($CarData->brake_lines=='Replaced')Was @elseif($CarData->brake_lines=='Upgraded')Was @else N/A @endif{{ucwords($CarData->brake_lines)}}</p>
         </div>
      </div>

      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold">WHEEL CYLINDER:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->wheel_cylinder=='Good')green @elseif($CarData->wheel_cylinder=='Bad')red  @elseif($CarData->wheel_cylinder=='Replaced')yellow @else blue @endif">@if($CarData->wheel_cylinder=='Good')Checks @elseif($CarData->wheel_cylinder=='Bad') @elseif($CarData->wheel_cylinder=='Replaced')Was @elseif($CarData->wheel_cylinder=='Upgraded')Was @else N/A @endif{{ucwords($CarData->wheel_cylinder)}}</p>
         </div>
      </div>

      <div class="col-6 col-md-6">
         <div class="services-details text-right">
            <p class="font-bold"> MASTER CYLINDER:</p>
         </div>
      </div>
      <div class="col-6 col-md-6">
         <div class="services-details">
            <p class="primary-@if($CarData->master_cylinder=='Good')green @elseif($CarData->master_cylinder=='Bad')red  @elseif($CarData->master_cylinder=='Replaced')yellow @else blue @endif">@if($CarData->master_cylinder=='Good')Checks @elseif($CarData->master_cylinder=='Bad') @elseif($CarData->master_cylinder=='Replaced')Was @elseif($CarData->master_cylinder=='Upgraded')Was @else N/A @endif{{ucwords($CarData->master_cylinder)}}</p>
         </div>
      </div>



   </div>


   <div class="service-desc-content border-bb">
      <h4>PHOTOS</h4>
      <div class="cmn-slider-wrap carslider">
         @if($CarData && $CarData->document)
         <div class="owl-carousel owl-theme photos-slider">
            @foreach(explode(',',$CarData->document) as $key=>$value)
            <?php $chkextension = explode('.', $value); ?>
            @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

            <div class="item">
               <div class="slider-img lightbox" id="{{ $value}}">
                  <img src="{{ $value}}">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">
                  </span>
               </div>
            </div>
            @endif
            @endforeach

         </div>
         @endif
      </div>
   </div>
   <div class="service-desc-content border-bb">
      <h4>DOCUMENTS</h4>
      <div class="cmn-slider-wrap carslider">
         @if($CarData && $CarData->document)
         <div class="owl-carousel owl-theme document-slider">
            @foreach(explode(',',$CarData->document) as $key=>$value)
            <?php $chkextension = explode('.', $value); ?>
            @if( trim($chkextension[5]) =='pdf')

            <div class="item">
               <a href="{{ $value}}" target="_blank">
                  <div class="slider-img" id="{{ $value}}" style="background:none">
                     <img src="/assets/images/pdf.png">
                     <span class="plus-overlay ">

                        <img src="{{ asset('/assets/images/plus.png') }}">

                     </span>
               </a>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
@endif
@endif
{{-- end Brake Service--}}
{{-- car handwash service --}}
@if($serviceId==4)
@if($CarData)
<div class="row border-bb">
   <h3>Handwash Services</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Services : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->service_name)}} </p>
      </div>
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>SHOP NOTES / DETAILS</h4>
   <p>
      {{($CarData->notes)}}
   </p>
</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->documents)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->documents)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end car handwash service --}}
{{-- car handwash self service --}}
@if($serviceId==4)
@if($CarData->carselfHistory)
<div class="row border-bb">
   <h3>Touchless Services</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Services : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->carselfHistory->service_name)}} </p>
      </div>
   </div>





</div>
</div>


<div class="service-desc-content border-bb">
   <h4>SHOP NOTES / DETAILS</h4>
   <p>
      {{($CarData->carselfHistory->notes)}}
   </p>
</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData->carselfHistory && $CarData->carselfHistory->documents)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->carselfHistory->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData->carselfHistory && $CarData->carselfHistory->documents)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->carselfHistory->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end car handwash self service --}}
{{-- car handwash tunnel service --}}
@if($serviceId==4)
@if($CarData->cartunnelHistory)
<div class="row border-bb">
   <h3>Tunnel Services</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Services : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->cartunnelHistory->service_name)}} </p>
      </div>
   </div>





</div>
</div>


<div class="service-desc-content border-bb">
   <h4>SHOP NOTES / DETAILS</h4>
   <p>
      {{($CarData->cartunnelHistory->notes)}}
   </p>
</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData->cartunnelHistory && $CarData->cartunnelHistory->documents)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->cartunnelHistory->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData->cartunnelHistory && $CarData->cartunnelHistory->documents)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->cartunnelHistory->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end car handwash self service --}}
{{-- car handwash tunnel service --}}
@if($serviceId==6)
@if($CarData)
<div class="row border-bb">



</div>
</div>


<div class="service-desc-content border-bb">
   <h4>SHOP NOTES / DETAILS</h4>
   <p>
      {{($CarData->collision_notes)}}
   </p>
</div>
<div class="service-desc-content border-bb">
   <h4>Before Image</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->before_image)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->before_image) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>Before DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->before_image)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->before_image) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>

{{-- estimate --}}
<div class="service-desc-content border-bb">
   <h4>Estimate Image</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document_of_estimate)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document_of_estimate) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>Before DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document_of_estimate)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document_of_estimate) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
{{-- end estimate --}}

{{-- Repair --}}
<div class="service-desc-content border-bb">
   <h4>Repair Image</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document_of_repair)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document_of_repair) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>Repair DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document_of_repair)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document_of_repair) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
{{-- end estimate --}}

{{-- After Image --}}
<div class="service-desc-content border-bb">
   <h4>After Image</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->after_image)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->after_image) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>After Repair DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->after_image)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->after_image) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
{{-- end estimate --}}
@endif
@endif
{{-- end car handwash self service --}}
{{-- car  tunnel service --}}
@if($serviceId==7)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>TRIP BEGIN : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->trip_begin)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>TRIP END : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->trip_end)}} </p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>TRIP Details : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->trip_details)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Client : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->client)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Incident Condition : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->incident_condition)}} </p>
      </div>
   </div>

</div>
</div>


<div class="service-desc-content border-bb">
   <h4>SHOP NOTES / DETAILS</h4>
   <p>
      {{($CarData->notesdata)}}
   </p>
</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end car tunnel service --}}
{{-- car engine spicality service --}}
@if($serviceId==12)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Block : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_block=='Good')green @elseif($CarData->engine_block=='Leaks')red  @elseif($CarData->engine_block=='Repaired')green @else  primary-yellow @endif">@if($CarData->engine_block=='Good')Checks @elseif($CarData->engine_block=='Leaks') @elseif($CarData->engine_block=='Repaired')Was @elseif($CarData->engine_block=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_block)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Pistons: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_pistons=='Good')green @elseif($CarData->engine_pistons=='Leaks')red  @elseif($CarData->engine_pistons=='Repaired')green @else  primary-yellow @endif">@if($CarData->engine_pistons=='Good')Checks @elseif($CarData->engine_pistons=='Leaks') @elseif($CarData->engine_pistons=='Repaired')Was @elseif($CarData->engine_pistons=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_pistons)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Rods : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_rods=='Good')green @elseif($CarData->engine_rods=='Leaks')red  @elseif($CarData->engine_rods=='Repaired')green @else  primary-yellow @endif">@if($CarData->engine_rods=='Good')Checks @elseif($CarData->engine_rods=='Leaks') @elseif($CarData->engine_rods=='Repaired')Was @elseif($CarData->engine_rods=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_rods)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Crankshaft : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_crankshaft=='Good')green @elseif($CarData->engine_crankshaft=='Leaks')red  @elseif($CarData->engine_crankshaft=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_crankshaft=='Good')Checks @elseif($CarData->engine_crankshaft=='Leaks') @elseif($CarData->engine_crankshaft=='Repaired')Was @elseif($CarData->engine_crankshaft=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_crankshaft)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Main Bearings : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_main_bearings=='Good')green @elseif($CarData->engine_main_bearings=='Leaks')red  @elseif($CarData->engine_main_bearings=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_main_bearings=='Good')Checks @elseif($CarData->engine_main_bearings=='Leaks') @elseif($CarData->engine_main_bearings=='Repaired')Was @elseif($CarData->engine_main_bearings=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_main_bearings)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Rod Bearing: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_rod_bearing=='Good')green @elseif($CarData->engine_rod_bearing=='Leaks')red  @elseif($CarData->engine_rod_bearing=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_rod_bearing=='Good')Checks @elseif($CarData->engine_rod_bearing=='Leaks') @elseif($CarData->engine_rod_bearing=='Repaired')Was @elseif($CarData->engine_rod_bearing=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_rod_bearing)}} </p>

      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Cam Bearing: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_cam_bearing=='Good')green @elseif($CarData->engine_cam_bearing=='Leaks')red  @elseif($CarData->engine_cam_bearing=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_cam_bearing=='Good')Checks @elseif($CarData->engine_cam_bearing=='Leaks') @elseif($CarData->engine_cam_bearing=='Repaired')Was @elseif($CarData->engine_cam_bearing=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_cam_bearing)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Piston Rings: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_piston_rings=='Good')green @elseif($CarData->engine_piston_rings=='Leaks')red  @elseif($CarData->engine_piston_rings=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_piston_rings=='Good')Checks @elseif($CarData->engine_piston_rings=='Leaks') @elseif($CarData->engine_piston_rings=='Repaired')Was @elseif($CarData->engine_piston_rings=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_piston_rings)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Heads: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_heads=='Good')green @elseif($CarData->engine_heads=='Leaks')red  @elseif($CarData->engine_heads=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_heads=='Good')Checks @elseif($CarData->engine_heads=='Leaks') @elseif($CarData->engine_heads=='Repaired')Was @elseif($CarData->engine_heads=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_heads)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Oil Pan: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_oil_pan=='Good')green @elseif($CarData->engine_oil_pan=='Leaks')red  @elseif($CarData->engine_oil_pan=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_oil_pan=='Good')Checks @elseif($CarData->engine_oil_pan=='Leaks') @elseif($CarData->engine_oil_pan=='Repaired')Was @elseif($CarData->engine_oil_pan=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_oil_pan)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Valves: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_valves=='Good')green @elseif($CarData->engine_valves=='Leaks')red  @elseif($CarData->engine_valves=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_valves=='Good')Checks @elseif($CarData->engine_valves=='Leaks') @elseif($CarData->engine_valves=='Repaired')Was @elseif($CarData->engine_valves=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_valves)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>engine Lifters: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_lifters=='Good')green @elseif($CarData->engine_lifters=='Leaks')red  @elseif($CarData->engine_lifters=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_lifters=='Good')Checks @elseif($CarData->engine_lifters=='Leaks') @elseif($CarData->engine_lifters=='Repaired')Was @elseif($CarData->engine_lifters=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_lifters)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Exhaust Manifold: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_exhaust_manifold=='Good')green @elseif($CarData->engine_exhaust_manifold=='Leaks')red  @elseif($CarData->engine_exhaust_manifold=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_exhaust_manifold=='Good')Checks @elseif($CarData->engine_exhaust_manifold=='Leaks') @elseif($CarData->engine_exhaust_manifold=='Repaired')Was @elseif($CarData->engine_exhaust_manifold=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_exhaust_manifold)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Intake Manifold: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_intake_manifold=='Good')green @elseif($CarData->engine_intake_manifold=='Leaks')red  @elseif($CarData->engine_intake_manifold=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_intake_manifold=='Good')Checks @elseif($CarData->engine_intake_manifold=='Leaks') @elseif($CarData->engine_intake_manifold=='Repaired')Was @elseif($CarData->engine_intake_manifold=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_intake_manifold)}} </p>

      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Timing: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->engine_timing=='Good')green @elseif($CarData->engine_timing=='Leaks')red  @elseif($CarData->engine_timing=='Repaired')green @else primary-yellow @endif">@if($CarData->engine_timing=='Good')Checks @elseif($CarData->engine_timing=='Leaks') @elseif($CarData->engine_timing=='Repaired')Was @elseif($CarData->engine_timing=='Replaced')Was @else N/A @endif{{ucwords($CarData->engine_timing)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Services: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">

         <p>{{ucwords($CarData->engine_services)}} </p>
      </div>
   </div>



</div>
</div>


<div class="service-desc-content border-bb">
   <h4>SHOP NOTES / DETAILS</h4>
   <p>
      {{($CarData->issue_diagnosis)}}
   </p>
</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end engine spicality service --}}
{{-- exhaust service --}}
@if($serviceId==13)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> MANIFOLD (S):</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->exhaust_manifold=='Good')green @elseif($CarData->exhaust_manifold=='Bad')red  @elseif($CarData->exhaust_manifold=='Replaced')yellow @else blue @endif">@if($CarData->exhaust_manifold=='Good')Checks @elseif($CarData->exhaust_manifold=='Serviced') @elseif($CarData->exhaust_manifold=='Replaced')Was @elseif($CarData->exhaust_manifold=='Upgraded')Was @elseif($CarData->exhaust_manifold=='Fabricated') @else N/A @endif{{ucwords($CarData->exhaust_manifold)}}</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>RESONATOR(S): </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->exhaust_resonator=='Good')green @elseif($CarData->exhaust_resonator=='Bad')red  @elseif($CarData->exhaust_resonator=='Replaced')yellow @else blue @endif">@if($CarData->exhaust_resonator=='Good')Checks @elseif($CarData->exhaust_resonator=='Serviced') @elseif($CarData->exhaust_resonator=='Replaced')Was @elseif($CarData->exhaust_resonator=='Upgraded')Was @elseif($CarData->exhaust_resonator=='Fabricated') @else N/A @endif{{ucwords($CarData->exhaust_resonator)}}</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>MUFFLER(S): </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->exhaust_muffler=='Good')green @elseif($CarData->exhaust_muffler=='Bad')red  @elseif($CarData->exhaust_muffler=='Replaced')yellow @else blue @endif">@if($CarData->exhaust_muffler=='Good')Checks @elseif($CarData->exhaust_muffler=='Serviced') @elseif($CarData->exhaust_muffler=='Replaced')Was @elseif($CarData->exhaust_muffler=='Upgraded')Was @elseif($CarData->exhaust_muffler=='Fabricated') @else N/A @endif{{ucwords($CarData->exhaust_muffler)}}</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> PIPES / CLAMPS : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->exhaust_pipes=='Good')green @elseif($CarData->exhaust_pipes=='Bad')red  @elseif($CarData->exhaust_pipes=='Replaced')yellow @else blue @endif">@if($CarData->exhaust_pipes=='Good')Checks @elseif($CarData->exhaust_pipes=='Serviced') @elseif($CarData->exhaust_pipes=='Replaced')Was @elseif($CarData->exhaust_pipes=='Upgraded')Was @elseif($CarData->exhaust_pipes=='Fabricated') @else N/A @endif{{ucwords($CarData->exhaust_pipes)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>ISOLATORS / GASKETS / LINKAGES : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->exhaust_isolators=='Good')green @elseif($CarData->exhaust_isolators=='Bad')red  @elseif($CarData->exhaust_isolators=='Replaced')yellow @else blue @endif">@if($CarData->exhaust_isolators=='Good')Checks @elseif($CarData->exhaust_isolators=='Serviced') @elseif($CarData->exhaust_isolators=='Replaced')Was @elseif($CarData->exhaust_isolators=='Upgraded')Was @elseif($CarData->exhaust_isolators=='Fabricated') @else N/A @endif{{ucwords($CarData->exhaust_isolators)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>O2 SENSOR<small>(S)</small> : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->exhaust_o2sensor=='Good')green @elseif($CarData->exhaust_o2sensor=='Bad')red  @elseif($CarData->exhaust_o2sensor=='Replaced')yellow @else blue @endif">@if($CarData->exhaust_o2sensor=='Good')Checks @elseif($CarData->exhaust_o2sensor=='Serviced') @elseif($CarData->exhaust_o2sensor=='Replaced')Was @elseif($CarData->exhaust_o2sensor=='Upgraded')Was @elseif($CarData->exhaust_o2sensor=='Fabricated') @else N/A @endif{{ucwords($CarData->exhaust_o2sensor)}}</p>
      </div>
   </div>


</div>



<div class="service-desc-content border-bb">
   <h4>SHOP NOTES / DETAILS</h4>
   <p>
      {{($CarData->exhasut_notes)}}
   </p>
</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end exhaust service --}}
{{-- oil service --}}
@if($serviceId==22)
@if($CarData)
<?php

// echo"<pre>";
// print_r($serviceDataCustom);
// echo"</pre>";

?>
<!-- <div class="form-box oil-info Vin_info">
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">GENERAL REPAIR:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($checkCarData->repair_info) ? $checkCarData->repair_info : '' }}</h3>
         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">KNOWN ISSUE</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($checkCarData->known_issue) ? $checkCarData->known_issue : '' }}</h3>

         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">MANUFACTURER RECALL</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($checkCarData->recall_issue) ? $checkCarData->recall_issue : '' }}</h3>

         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">NEW INSATLL</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($checkCarData->install_info) ? $checkCarData->install_info : '' }}</h3>

         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">NEW ISSUE</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($checkCarData->diagnosis) ? $checkCarData->diagnosis : '' }}</h3>

         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">REGULAR SERVICING</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($checkCarData->servicing_issue) ? $checkCarData->servicing_issue : '' }}</h3>

         </div>
      </div>
   </div>
</div> -->
<div class="form-box oil-info">
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">MILEAGE:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($CarData->oil_mileage) ? $CarData->oil_mileage : "" }}</h3>

         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">OIL TYPE:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($CarData->oil_mileage) ? $CarData->oil_mileage : "" }} </h3>

         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">OIL BRAND:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($CarData->oil_brand) ? $CarData->oil_brand : "" }}</h3>
         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">AMOUNT ADDED:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($CarData->oil_amount_added) ? $CarData->oil_amount_added : "" }}</h3>
         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">FILTER PART NUMBER:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($CarData->oil_filter_type) ? $CarData->oil_filter_type : "" }}</h3>
         </div>
      </div>
   </div>
   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">FILTER BRAND:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">{{ isset($CarData->oil_filter_brand) ? $CarData->oil_filter_brand : "" }}</h3>
         </div>
      </div>
   </div>
   @if(isset($CarData))
   <?php
   $trimmed_array = array_map('trim', explode(', ', $CarData->oil_fluid_service));

   ?>
   @endif
   <div class="form-group">
      <div class="row d-flex">
         <div class="col-md-6 col-12">
            <h3 class="p-0">FLUID SERVICE:</h3>
         </div>
         <div class="col-md-6 col-12">
            <ul class="display-block">
               <li>
                  <h3 class="text-green">@if($CarData) @if(in_array('WINDSHIELD', $trimmed_array))WINDSHIELD WASHER,@endif @endif</h3>
               </li>
               <li>
                  <h3 class="text-green">@if($CarData) @if(in_array('COOLANT', $trimmed_array))COOLANT,@endif @endif</h3>
               </li>
               <li>
                  <h3 class="text-green">@if($CarData) @if(in_array('TRANSMISSION', $trimmed_array))TRANSMISSION FLUID,@endif @endif</h3>
               </li>
               <li>
                  <h3 class="text-green">@if($CarData) @if(in_array('BRAKE FLUID', $trimmed_array))BRAKE FLUID,@endif @endif</h3>
               </li>
               <li>
                  <h3 class="text-green">@if($CarData) @if(in_array('POWER', $trimmed_array)) POWER STEERING @endif @endif</h3>
               </li>
            </ul>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">OIL PAN REMOVED:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($CarData) @if($CarData->oil_pan_removed=='Yes') Yes @else NO @endif @endif</h3>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">OIL PAN PART NUMBER</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->oil_pan_part_number}}@endif</h3>

         </div>
      </div>
   </div>



   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">OIL PAN GASKET REPLACED:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($CarData) @if($CarData->oil_pan_gaskit=='Yes') Yes @else NO @endif @endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">OIL PAN GASKET PART NUMBER:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->gasket_part_number}}@endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">DRAIN PLUG(S) REPLACED:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($CarData) @if($CarData->oil_pan_nut=='Yes') Yes @else NO @endif @endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">DRAIN PLUG(S) PART NUMBER:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->drain_plug_part_number}}@endif</h3>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">CRUSH WASHER REPLACED:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($CarData) @if($CarData->crush_washer=='Yes') Yes @else NO @endif @endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">CRUSH WASHER PART NUMBER:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->crush_washer_part_number}}@endif</h3>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">RUBBER O-RINGS REPLACED:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($CarData) @if($CarData->rubber_o_rings=='Yes') Yes @else NO @endif @endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">RUBBER O-RINGS PART NUMBER:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->rubber_o_rings_part_number}}@endif</h3>
         </div>
      </div>
   </div>

   <!-- new changes.................. -->

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">Turbo oil lines serviced:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->oil_lines_serviced}}@endif</h3>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">Turbo oil lines replaced:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->oil_lines_replaced}}@endif</h3>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">Turbo oil line part number:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->turbo_oil_line_part_number}}@endif</h3>
         </div>
      </div>
   </div>

   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">Turbo oil line bolts replaced:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->line_bolts_replaced}}@endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">Turbo oil line bolt part number:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->turbo_oil_line_bolt_part_number}}@endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">Turbo oil line o-rings/crush washers replaced:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->rings_crush_washer_replaced}}@endif</h3>
         </div>
      </div>
   </div>


   <div class="form-group">
      <div class="row d-flex align-items-center">
         <div class="col-md-6 col-12">
            <h3 class="p-0">Turbo oil line o-rings/crush washers part numbers:</h3>
         </div>
         <div class="col-md-6 col-12">
            <h3 class="text-green">@if($serviceDataCustom){{$serviceDataCustom->rings_crush_washer_part_number}}@endif</h3>
         </div>
      </div>
   </div>



</div>
@if($serviceDataCustom)
<div class="w-100 new_form view_oil_service  ">
   @if($serviceDataCustom->oil_change_mileage)

   <div class="form-group">
      <div class="upload-wrap images_section">
         <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">OIL CHNAGE MILEAGE</label>
               </div>
               @if($serviceDataCustom)
               <?php
               $oil_change_mileage = explode(', ', $serviceDataCustom->oil_change_mileage);
               ?>
               @endif
               <div class="form-btnw-wrap large_img upgrade-checked">
                  @php
                  $oil_change_mileage0 = !empty($oil_change_mileage[0]) ? $oil_change_mileage[0] : "" ;
                  @endphp
                  <img class="imgshow" src="{{$oil_change_mileage0}}" alt="">
               </div>
            </div>
            <div class="col-md-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">NEW PARTS</label>
               </div>
               <diV class="slider small">
                  @if($serviceDataCustom)
                  <?php
                  $oil_change_mileage = explode(', ', $serviceDataCustom->oil_change_mileage);

                  ?>
                  @endif
                  <div id="oil_change_mileage" class="carousel slide" data-bs-interval="false" data-bs-ride="false">
                     <div class="carousel-inner">
                        @foreach($oil_change_mileage as $key => $value)
                        @if($key==0)
                        @continue
                        @endif
                        <div class="carousel-item <?php if ($key == 1) {
                                                      echo 'active';
                                                   } ?>">
                           <img src="{{$value}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                     </div>
                     <button class="carousel-control-prev" type="button" data-bs-target="#oil_change_mileage" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#oil_change_mileage" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                     </button>
                  </div>
               </diV>
            </div>
         </div>
      </div>
   </div>

   @endif
   @if($serviceDataCustom->new_parts_notes)

   <div class="form-group">
      <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->new_parts_notes}}@endif </p>
   </div>
   @endif


   @if($serviceDataCustom->pre_inspection)

   <div class="form-group">
      <div class="upload-wrap images_section medium">
         <div class="row d-flex align-items-center">
            <div class="col-md-2 col-12">
            </div>
            <div class="col-md-8 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">PRE INSPECTION PICTURES</label>
               </div>
               <diV class="slider large">
                  @if($serviceDataCustom)
                  <?php
                  $pre_inspection = explode(', ', $serviceDataCustom->pre_inspection);
                  ?>
                  @endif
                  <div id="pre_inspection" class="carousel slide" data-bs-interval="false" data-bs-ride="false">
                     <div class="carousel-inner">
                        @foreach($pre_inspection as $key => $value)
                        <div class="carousel-item <?php if ($key == 0) {
                                                      echo 'active';
                                                   } ?>">
                           <img src="{{$value}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                     </div>
                     <button class="carousel-control-prev" type="button" data-bs-target="#pre_inspection" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#pre_inspection" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                     </button>
                  </div>
               </diV>
            </div>
            <div class="col-md-2 col-12">
            </div>
         </div>
      </div>
   </div>
   @endif


   @if($serviceDataCustom->pre_inspection_notes)
   <div class="form-group">
      <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->pre_inspection_notes}}@endif </p>
   </div>
   @endif


   @if($serviceDataCustom->oil_filter_and_parts_inspection)

   <div class="form-group">
      <div class="upload-wrap images_section medium">
         <div class="row d-flex align-items-center">
            <div class="col-md-2 col-12">
            </div>
            <div class="col-md-8 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">OIL FILTER AND PARTS INSPECTION</label>
               </div>
               <diV class="slider large">
                  @if($serviceDataCustom)
                  <?php
                  $oil_filter_and_parts_inspection = explode(', ', $serviceDataCustom->oil_filter_and_parts_inspection);
                  ?>
                  @endif

                  <div id="oil_filter_and_parts_inspection" class="carousel slide" data-bs-interval="false" data-bs-ride="false">
                     <div class="carousel-inner">
                        @foreach($oil_filter_and_parts_inspection as $key => $value)
                        <div class="carousel-item <?php if ($key == 0) {
                                                      echo 'active';
                                                   } ?>">
                           <img src="{{$value}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                     </div>
                     <button class="carousel-control-prev" type="button" data-bs-target="#oil_filter_and_parts_inspection" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#oil_filter_and_parts_inspection" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                     </button>
                  </div>
               </diV>
            </div>
            <div class="col-md-2 col-12">
            </div>
         </div>
      </div>
   </div>
   @endif

   @if($serviceDataCustom->filter_and_parts_notes)

   <div class="form-group">
      <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->filter_and_parts_notes}}@endif</p>
   </div>

   @endif


   @if($serviceDataCustom->oil_in_out)

   <div class="form-group">
      <div class="upload-wrap images_section">
         <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">OIL OUT</label>
               </div>
               @if($serviceDataCustom)
               <?php
               $oil_in_out = explode(', ', $serviceDataCustom->oil_in_out);
               ?>
               @endif
               <div class="form-btnw-wrap large_img upgrade-checked">
                  @php
                  $oil_in_out0= !empty($oil_in_out[0]) ? $oil_in_out[0] : "" ;
                  @endphp
                  <img class="imgshow" src="{{$oil_in_out0}}" alt="">
               </div>
            </div>
            <div class="col-lg-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">OIL IN</label>
               </div>
               <div class="form-btnw-wrap large_img upgrade-checked">
                  @php
                  $oil_in_out1 = !empty($oil_in_out[1]) ? $oil_in_out[1] : "" ;
                  @endphp
                  <img class="imgshow" src="{{$oil_in_out1}}" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>

   @endif



   <div class="form-group mbot-10">
      <div class="row d-flex">
         <div class="col-lg-6 col-12">
            @if($serviceDataCustom->oil_out_notes)
            <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->oil_out_notes}}@endif</p>
            @endif
         </div>
         <div class="col-lg-6 col-12">
            @if($serviceDataCustom->oil_in_notes)
            <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->oil_in_notes}}@endif</p>
            @endif
         </div>
      </div>
   </div>

   @if($serviceDataCustom->torque_specs)
   <div class="form-group">
      <div class="upload-wrap images_section">
         <div class="row d-flex align-items-center">
            <div class="col-md-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">TORQUE SPECS</label>
               </div>
               <diV class="slider small">
                  @if($serviceDataCustom)
                  <?php
                  $torque_specs = explode(', ', $serviceDataCustom->torque_specs);
                  ?>
                  @endif

                  <div id="torque_specs" class="carousel slide" data-bs-interval="false" data-bs-ride="false">
                     <div class="carousel-inner">
                        @foreach($torque_specs as $key => $value)
                        @if($key > count($torque_specs)-2 )
                        @continue
                        @endif
                        <div class="carousel-item <?php if ($key == 0) {
                                                      echo 'active';
                                                   } ?>">
                           <img src="{{$value}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                     </div>
                     <button class="carousel-control-prev" type="button" data-bs-target="#torque_specs" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#torque_specs" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                     </button>
                  </div>
               </diV>
            </div>
            <div class="col-lg-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">OIL STATUS LEVEL</label>
               </div>
               <div class="form-btnw-wrap large_img text-center upgrade-checked">
                  @php
                  $torque_specs4 = !empty($torque_specs[4]) ? $torque_specs[4] : "" ;
                  @endphp
                  <img class="imgshow" src="{{$torque_specs4}}" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>
   @endif

   <div class="form-group mbot-10">
      <div class="row d-flex">
         <div class="col-lg-6 col-12">
            @if($serviceDataCustom->torque_specs_notes)
            <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->torque_specs_notes}}@endif</p>
            @endif

         </div>
         <div class="col-lg-6 col-12">
            @if($serviceDataCustom->oil_status_level_notes)
            <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->oil_status_level_notes}}@endif</p>
            @endif
         </div>
      </div>
   </div>

   @if($serviceDataCustom->post_service_inspection)

   <div class="form-group">
      <div class="upload-wrap images_section medium">
         <div class="row d-flex align-items-center">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0 text-center">POST SERVICE INSPECTION</label>
               </div>
               <diV class="slider large">
                  @if($serviceDataCustom)
                  <?php
                  $post_service_inspection = explode(', ', $serviceDataCustom->post_service_inspection);
                  ?>
                  @endif

                  <div id="post_service_inspection" class="carousel slide" data-bs-interval="false" data-bs-ride="false">
                     <div class="carousel-inner">
                        @foreach($post_service_inspection as $key => $value)
                        <div class="carousel-item <?php if ($key == 0) {
                                                      echo 'active';
                                                   } ?>">
                           <img src="{{$value}}" class="d-block w-100" alt="...">
                        </div>
                        @endforeach
                     </div>
                     <button class="carousel-control-prev" type="button" data-bs-target="#post_service_inspection" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                     </button>
                     <button class="carousel-control-next" type="button" data-bs-target="#post_service_inspection" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                     </button>
                  </div>
               </diV>
            </div>
            <div class="col-md-2"></div>
         </div>
      </div>
   </div>
   @endif

   @if($serviceDataCustom->post_service_inspection_notes)
   <div class="form-group">
      <p class="text-blue">@if($serviceDataCustom){{$serviceDataCustom->post_service_inspection_notes}}@endif</p>
   </div>
   @endif

   @if($serviceDataCustom->oil_collected_for_analysis)

   <div class="form-group">
      <div class="upload-wrap images_section">
         <div class="row d-flex align-items-center">
            <div class="col-lg-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0">OIL COLLECTED FOR ANALYSIS:</label>
               </div>


               @if($serviceDataCustom)
               <?php
               $oil_collected_for_analysis = "";
               $oil_collected_for_analysis = !empty($serviceDataCustom->oil_collected_for_analysis) ? $serviceDataCustom->oil_collected_for_analysis : "";
               ?>
               @endif


               <div class="form-btnw-wrap large_img upgrade-checked">
                  <img class="imgshow" src="{{$oil_collected_for_analysis ?? ''}}" alt="">
               </div>
            </div>

            <?php
            // $im = new Imagick('file.pdf[0]');
            // $im->setImageFormat('jpg');
            // header('Content-Type: image/jpeg');
            // echo $im;
            ?>


            <div class="col-lg-6 col-12">
               <div class="col-md-12 col-12 label_wrap">
                  <label class="p-0">OIL ANALYSIS REPORT</label>
               </div>
               @if($serviceDataCustom)
               <?php
               $value = '';
               $Oil_analysis_report = !empty($serviceDataCustom->Oil_analysis_report) ? $serviceDataCustom->Oil_analysis_report : "";
               ?>
               @endif
               <div class="w-100 pdferrorwraper">
                  <div class="images_section pdferror">
                     <div class="row d-flex large_img align-items-center form-btnw-wrap documents_section">



                        <div class="col-lg-8 col-12 text-center display_image_list" id="display_image_list">
                           <ul>@if($serviceDataCustom && $serviceDataCustom->Oil_analysis_report)
                              @foreach(explode(',',$serviceDataCustom->Oil_analysis_report) as $key=>$value)
                              <?php
                              $chkextension = explode('.', $value);
                              ?>
                              @if((trim($chkextension[1])=='pdf'))
                              <li data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$key}}"><iframe class="pdf_image" width="100%" height="141px" name="plugin" src="{{$value}}" scrolling="no" page="1" type="application/pdf"></iframe>
                                 <div class="pdf_overlay"> +</div>
                              </li>
                              @else
                              <li data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$key}}"><iframe class="pdf_image" width="100%" height="141px" name="plugin" src="{{$value}}" scrolling="no" page="1" type="application/pdf"></iframe>
                                 <div class="pdf_overlay"> +</div>
                              </li>
                              @endif
                              @endforeach
                              @endif
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   @endif

   @if($serviceDataCustom->oil_analysis_notes)

   <div class="form-group">
      <div class="col-md-12 col-12 label_wrap">
         <label class="p-0">OIL ANALYSIS NOTES</label>
      </div>
      <div class="col-md-12 col-12">
         <p>@if($serviceDataCustom){{$serviceDataCustom->oil_analysis_notes}}@endif</p>
      </div>
   </div>
   @endif

   @if($serviceDataCustom->oil_service_notes)

   <div class="form-group mbot-10">
      <div class="col-md-12 col-12 label_wrap">
         <label class="p-0">OIL SERVICE NOTES</label>
      </div>
      <div class="col-md-12 col-12">
         <p>@if($serviceDataCustom){{$serviceDataCustom->oil_service_notes}}@endif</p>
      </div>
   </div>
   @endif

</div>
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-modal">
    <div class="modal-content modal-content-custom">
      <div class="modal-body">
          <embed width="100%" height="800px" name="plugin" src="{{$value ?? ''}}" type="application/pdf">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- <div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> MILEAGE:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_mileage)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>OIL TYPE: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>OIL BRAND: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_brand)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>AMOUNT ADDED : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_amount_added)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>FILTER TYPE: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_filter_type)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>FILTER BRAND : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_filter_brand)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>FLUID SERVICE : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_fluid_service)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>OIL PAN REMOVED: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_pan_removed)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>OIL PAN GASKET REPLACED : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_pan_gaskit)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>OIL PAN NUT REPLACED : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oil_pan_nut)}} </p>
      </div>
   </div>


</div> -->
</div>


<!-- <div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div> -->
</div>
@endif
@endif
{{-- brake service --}}
@if($serviceId==3)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Service Type:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->service_type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Batery TYPE: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->battery_type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Battery BRAND: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->battery_brand)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> Part Number : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->part_number)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Manufactured Date: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{date("m/d/Y", strtotime($CarData->manufactured_date) )}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Expiration Date: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{date("m/d/Y", strtotime($CarData->expiration_date) )  }} </p>
      </div>
   </div>

</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end brake service --}}
{{-- powder coating service --}}
@if($serviceId==28)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Was Powder Coating:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->was_powder_coating)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Manufacturer By: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->manufacturer_by)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>PC System: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->pc_system)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> Color Code: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->color_code)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> Paint Color: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->paint_color)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Is Waranty: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->is_waranty)}} </p>
      </div>
   </div>

   @if($CarData->is_waranty=='Yes')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Waranty Company: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->waranty_company)}} </p>
      </div>
   </div>
   @endif
   <div class="service-desc-content border-bb">
      <h4> NOTES / DETAILS</h4>
      <p>
         {{($CarData->powder_coating_note)}}
      </p>
   </div>
</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end powder coating service --}}
{{-- tire service --}}
@if($serviceId==34)
@if($CarData)
<div class="row border-bb">
   {{-- Front side --}}
   @if($CarData->driver_front_psi !="")
   <h3 class="tireheader">Driver Front</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>PSI:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_front_psi)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tread Depth::</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_front_tread_depth)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Condition: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_front_condition)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Brand: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_front_brand)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tire Size: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_front_tire_size)}} </p>
      </div>
   </div>
   @endif
   {{-- end front size --}}
   {{-- Driver Rear side --}}
   @if($CarData->driver_rear_psi !="")
   <h3 class="tireheader">Driver Rear</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>PSI:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_rear_psi)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tread Depath::</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_rear_tread_depth)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Condition: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_rear_condition)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Brand: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_rear_brand)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tire Size: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_rear_tire_size)}} </p>
      </div>
   </div>
   @endif
   {{-- end Driver rear size --}}
   {{-- Passenger Front start side --}}
   @if($CarData->passenger_front_psi !="")
   <h3 class="tireheader">Passenger Front</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>PSI:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_front_psi)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tread Depath::</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_front_tread_depth)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Condition: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_front_condition)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Brand: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_front_brand)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tier Size: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_front_tire_size)}} </p>
      </div>
   </div>
   @endif
   {{-- end Passenger Font --}}

   {{-- Passenger Rear start side --}}
   @if($CarData->passenger_rear_psi !="")
   <h3 class="tireheader">Passenger Rear</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>PSI:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_rear_psi)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tread Depath::</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_rear_tread_depth)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Condition: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_rear_condition)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Brand: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_rear_brand)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Tier Size: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_rear_tire_size)}} </p>
      </div>
   </div>
   @endif
   {{-- end Passenger Font --}}


</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end tire service --}}
{{-- parts service --}}
@if($serviceId==25)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>System:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->system)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Diagnosis: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->diagnosis)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Part: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->part)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> Manufacturer By: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->manufacturer_by)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Part Number: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->part_number)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Is Waranty: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->is_waranty)}} </p>
      </div>
   </div>

   @if($CarData->is_waranty=='Yes')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Waranty Company: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->waranty_company)}} </p>
      </div>
   </div>
   @endif
   <div class="service-desc-content border-bb">
      <h4> NOTES / DETAILS</h4>
      <p>
         {{($CarData->part_note)}}
      </p>
   </div>
</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Parts service --}}
{{-- electrical service --}}
@if($serviceId==11)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>System:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->system)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Diagnosis: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->diagnosis)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Action: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->action)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p> Manufacturer By: </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->manufacturer_by)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Is Waranty: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->is_waranty)}} </p>
      </div>
   </div>

   @if($CarData->is_waranty=='Yes')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Waranty Company: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->waranty_company)}} </p>
      </div>
   </div>
   @endif
   <div class="service-desc-content border-bb">
      <h4> NOTES / DETAILS</h4>
      <p>
         {{($CarData->electric_notes)}}
      </p>
   </div>
</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->documents)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->documents)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->documents) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end electrical service --}}
{{-- transmission service --}}
@if($serviceId==36)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Service Type:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>@if($CarData->service_type) ucwords($CarData->service_type) @else N/A @endif </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Fluid Type: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>@if($CarData->fluid_type) ucwords($CarData->fluid_type) @else N/A @endif </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Filter Brand: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>@if($CarData->filter_brand) ucwords($CarData->filter_brand) @else N/A @endif </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Lubrication Pan Gasket Replaced: </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>@if($CarData->lubrication_pan_gasket_replaced) ucwords($CarData->lubrication_pan_gasket_replaced) @else N/A @endif </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Lubrication Pan Replaced: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>@if($CarData->lubrication_pan_replaced) ucwords($CarData->lubrication_pan_replaced) @else N/A @endif </p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Mileage: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>@if($CarData->mileage) ucwords($CarData->mileage) @else N/A @endif </p>
      </div>
   </div>

   <div class="service-desc-content border-bb">
      <h4> NOTES / DETAILS</h4>
      <p>
         @if($CarData->transmission_notes) ($CarData->transmission_notes) @else N/A @endif
      </p>
   </div>
</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end tranmission service --}}
{{-- tint service --}}
@if($serviceId==35)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Service:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->tintservices)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Manufacture: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->tint_manufacture)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Type: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->tint_type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Percentage: </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->percentage)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Oem Match: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->tint_oem_match)}} </p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Oem Manufacture: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->oem_manufacture)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Is Waranty: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->tint_warranty)}} </p>
      </div>
   </div>

   @if($CarData->tint_warranty=='Yes')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Waranty Company: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->warranty_company)}} </p>
      </div>
   </div>
   @endif

   <div class="service-desc-content border-bb">
      <h4> NOTES / DETAILS</h4>
      <p>
         {{($CarData->tint_notes)}}
      </p>
   </div>
</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end tint service --}}

{{-- glass service --}}
@if($serviceId==17)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Windshield Services:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->windshield)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Brand Type: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->brand)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Front Window Motor: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_front_window_motor)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Back Window Motor: </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->driver_back_window_motor)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Passenger Rear Window Motor: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->passenger_rear_window_motor)}} </p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Back Hatch Window Motor: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->back_hatch_window_motor)}} </p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Windshield Replaced: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->windshield_replaced)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Sensor Data: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->sensor_data)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Is Waranty: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->warranty)}} </p>
      </div>
   </div>

   @if($CarData->warranty=='Yes')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Waranty Company: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->warranty_company)}} </p>
      </div>
   </div>
   @endif

   <div class="service-desc-content border-bb">
      <h4> NOTES / DETAILS</h4>
      <p>
         {{($CarData->glass_notes)}}
      </p>
   </div>
</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end glass service --}}
{{-- Rim track service --}}
@if($serviceId==31)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Service Type:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->service_type)}} </p>
      </div>
   </div>


</div>



<div class="service-desc-content border-bb">
   <h4>BEFORE SERVICE PHOTOS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->before_service_image)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->before_service_image) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->before_service_image)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->before_service_image) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>

{{-- AFTER PHOTO --}}
<div class="service-desc-content border-bb">
   <h4>AFTER SERVICE PHOTOS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->after_service_images)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->after_service_images) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap carslider ">
      @if($CarData && $CarData->after_service_images)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->after_service_images) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
{{-- END --}}
@endif
@endif
{{-- end rim service --}}

{{-- race and track --}}

@if($serviceId==29)

@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Track Name:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->track_name)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Location: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->location)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Track Type: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->track_type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>0-60 mph: </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->zero_to_sixty_mph)}} </p>
      </div>
   </div>
   @if($CarData->lap_one)
   @php
   $lapdata=json_decode($CarData->lap_one,true);

   @endphp
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Lap 1: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$lapdata['lap_one_min'] ?? '0'}} min @if($lapdata['lap_one_sec']){{$lapdata['lap_one_sec'] }} @else 0 @endif Sec </p>
      </div>
   </div>
   @endif

   @if($CarData->lap_two)
   @php
   $lapdata2=json_decode($CarData->lap_two,true);

   @endphp
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Lap 2: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$lapdata2['lap_two_min'] ?? '0'}} min @if($lapdata2['lap_two_sec']){{$lapdata2['lap_two_sec'] }} @else 0 @endif Sec </p>
         {{-- <p>{{ucwords($CarData->lap_two)}} </p> --}}
      </div>
   </div>
   @endif
   @if($CarData->lap_three)
   @php
   $lapdata3=json_decode($CarData->lap_three,true);

   @endphp
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Lap 3: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$lapdata3['lap_three_min'] ?? '0'}} min @if($lapdata3['lap_three_sec']){{$lapdata3['lap_three_sec'] }} @else 0 @endif Sec </p>
         {{-- <p>{{ucwords($CarData->lap_three)}} </p> --}}
      </div>
   </div>
   @endif
   @if($CarData->lap_four)
   @php
   $lapdata4=json_decode($CarData->lap_four,true);

   @endphp
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Lap 4: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$lapdata4['lap_four_min'] ?? '0'}} min @if($lapdata4['lap_four_sec']){{$lapdata4['lap_four_sec'] }} @else 0 @endif Sec </p>
         {{-- <p>{{ucwords($CarData->lap_four)}} </p> --}}
      </div>
   </div>
   @endif

   {{-- run 1 --}}
   @if($CarData->run_one)
   @php
   $run1=json_decode($CarData->run_one,true);
   @endphp
   <h3 class="tireheader">Run 1</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Stripe Name : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run1['stripe_name_run_one'] ?? ''}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Location : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run1['stripe_location_run_one'] ?? ''}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Opponent : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run1['stripe_opponent_run_one'] ?? ''}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>R/T : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run1['stripe_r_or_t_run_one']){{$run1['stripe_r_or_t_run_one'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>60': </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run1['stripe_sixty_degree_run_one']){{$run1['stripe_sixty_degree_run_one'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>330: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run1['stripe_three_hundred_degree_run_one']){{$run1['stripe_three_hundred_degree_run_one'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>0-60 mph: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run1['zero_to_sixty_mph_run_one']){{$run1['zero_to_sixty_mph_run_one'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>1/8 mile: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run1['one_or_eight_mile_run_one']){{$run1['one_or_eight_mile_run_one'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>MPH: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run1['mph_run_one']){{$run1['mph_run_one'] }} @else 0 @endif mph </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>1/4 mile: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run1['one_or_four_mile_run_one']){{$run1['one_or_four_mile_run_one'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Status: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> {{$run1['status']}} </p>
      </div>
   </div>
   @endif
   {{-- end run1 --}}
   {{-- run 2 --}}
   @if($CarData->run_two)
   @php
   $run2=json_decode($CarData->run_two,true);
   @endphp
   <h3 class="tireheader">Run 2</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Stripe Name : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run2['stripe_name_run_two'] ?? ''}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Location : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run2['stripe_location_run_two'] ?? ''}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Opponent : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run2['stripe_opponent_run_two'] ?? ''}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>R/T : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run2['stripe_r_or_t_run_two']){{$run2['stripe_r_or_t_run_two'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>60': </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run2['stripe_sixty_degree_run_two']){{$run2['stripe_sixty_degree_run_two'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>330: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run2['stripe_three_hundred_degree_run_two']){{$run2['stripe_three_hundred_degree_run_two'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>0-60 mph: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run2['zero_to_sixty_mph_run_two']){{$run2['zero_to_sixty_mph_run_two'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>1/8 mile: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run2['one_or_eight_mile_run_two']){{$run2['one_or_eight_mile_run_two'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>MPH: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run2['mph_run_two']){{$run2['mph_run_two'] }} @else 0 @endif mph </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>1/4 mile: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run2['one_or_four_mile_run_two']){{$run2['one_or_four_mile_run_two'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Status: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> {{$run2['status_two']}} </p>
      </div>
   </div>
   @endif
   {{-- end run2 --}}

   {{-- run 3 --}}
   @if($CarData->run_three)
   @php
   $run3=json_decode($CarData->run_three,true);
   @endphp
   <h3 class="tireheader">Run 3</h3>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Stripe Name : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run3['stripe_name_run_three'] ?? ''}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Location : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run3['stripe_location_run_three'] ?? ''}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Opponent : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{$run3['stripe_opponent_run_three'] ?? ''}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>R/T : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run3['stripe_r_or_t_run_three']){{$run3['stripe_r_or_t_run_three'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>60': </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run3['stripe_sixty_degree_run_three']){{$run3['stripe_sixty_degree_run_three'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>330: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run3['stripe_three_hundred_degree_run_three']){{$run3['stripe_three_hundred_degree_run_three'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>0-60 mph: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run3['zero_to_sixty_mph_run_three']){{$run3['zero_to_sixty_mph_run_three'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>1/8 mile: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run3['one_or_eight_mile_run_three']){{$run3['one_or_eight_mile_run_three'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>MPH: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run3['mph_run_three']){{$run3['mph_run_three'] }} @else 0 @endif mph </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>1/4 mile: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> @if($run3['one_or_four_mile_run_three']){{$run3['one_or_four_mile_run_three'] }} @else 0 @endif Sec </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Status: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p> {{$run3['status_three']}} </p>
      </div>
   </div>
   @endif
   {{-- end run3 --}}

</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end race and track service --}}
{{-- tint service --}}
@if($serviceId==33)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>LIST SPECIALTY:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->list_of_specialty)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>DETAILS OF SERVICE:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->detail_of_services)}} </p>
      </div>
   </div>

</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end tint service --}}
{{-- Brake Service  --}}
@if($serviceId==32)
@if($CarData)
<div class="row border-bb">
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Frame Bracket Mounts:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->frame_bracket_mounts=='Good')green @elseif($CarData->frame_bracket_mounts=='Replaced')yellow @else primary-blue @endif">@if($CarData->frame_bracket_mounts=='Good')Checks @elseif($CarData->frame_bracket_mounts=='Tightened') @elseif($CarData->frame_bracket_mounts=='Replaced')Was @elseif($CarData->frame_bracket_mounts=='Respaced')Was @else N/A @endif{{ucwords($CarData->frame_bracket_mounts)}}</p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Hanger Connections:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->hanger_connection=='Good')green @elseif($CarData->hanger_connection=='Replaced')yellow @else primary-blue @endif">@if($CarData->hanger_connection=='Good')Checks @elseif($CarData->hanger_connection=='Torqued') @elseif($CarData->hanger_connection=='Replaced')Was @else N/A @endif{{ucwords($CarData->hanger_connection)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Arm Bushings:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">

         <p class="primary-@if($CarData->arm_bushing=='Good')green  @elseif($CarData->arm_bushing=='Replaced')yellow @else primary-blue @endif">@if($CarData->arm_bushing=='Good')Checks @elseif($CarData->arm_bushing=='Torqued') @elseif($CarData->arm_bushing=='Replaced')Was @elseif($CarData->arm_bushing=='Respaced')Was @else N/A @endif{{ucwords($CarData->arm_bushing)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Axles:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->axles=='Good')green  @elseif($CarData->axles=='Replaced')yellow @else primary-blue @endif">@if($CarData->axles=='Good')Checks @elseif($CarData->axles=='Torqued') @elseif($CarData->axles=='Replaced')Was @else N/A @endif{{ucwords($CarData->axles)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold"> Axle Bushings & Bolts:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->axle_bushing_bolts=='Good')green  @elseif($CarData->axle_bushing_bolts=='Replaced')yellow @else primary-blue @endif">@if($CarData->axle_bushing_bolts=='Good')Checks @elseif($CarData->axle_bushing_bolts=='Torqued') @elseif($CarData->axle_bushing_bolts=='Replaced')Was @else N/A @endif {{ucwords($CarData->axle_bushing_bolts)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Hub Bearings:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->hub_bearings=='Good')green  @elseif($CarData->hub_bearings=='Replaced')yellow @else primary-blue @endif">@if($CarData->hub_bearings=='Good')Checks @elseif($CarData->hub_bearings=='Torqued') @elseif($CarData->hub_bearings=='Replaced')Was @elseif($CarData->hub_bearings=='Readjusted') @else N/A @endif {{ucwords($CarData->hub_bearings)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">King Pin Play:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->king_pin_play=='Good')green @else primary-blue @endif">@if($CarData->king_pin_play=='Good')Checks @elseif($CarData->king_pin_play=='Tightened') @else N/A @endif {{ucwords($CarData->king_pin_play)}}</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Tie Rods & Castle Nuts:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->tie_roads_and_castle_nuts=='Good')green  @elseif($CarData->tie_roads_and_castle_nuts=='Replaced')yellow @else primary-blue @endif">@if($CarData->tie_roads_and_castle_nuts=='Good')Checks @elseif($CarData->tie_roads_and_castle_nuts=='Torqued') @elseif($CarData->tie_roads_and_castle_nuts=='Replaced')Was @else N/A @endif {{ucwords($CarData->tie_roads_and_castle_nuts)}}</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Alignment:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->alignment=='Good')green @elseif($CarData->alignment=='Bad')red @else primary-blue @endif">@if($CarData->alignment=='Good')Checks @elseif($CarData->alignment=='Bad') @elseif($CarData->alignment=='Realigned') @else N/A @endif {{ucwords($CarData->alignment)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold"> Shocks:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->shocks=='Good')green  @elseif($CarData->shocks=='Replaced')yellow @else primary-blue @endif">@if($CarData->shocks=='Good')Checks @elseif($CarData->shocks=='Rebuilt') @elseif($CarData->shocks=='Replaced')Was @else N/A @endif {{ucwords($CarData->shocks)}}</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Air Compressor:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->air_compressor=='Good')green  @elseif($CarData->air_compressor=='Replaced')yellow @else primary-blue @endif">@if($CarData->air_compressor=='Good')Checks @elseif($CarData->air_compressor=='Serviced') @elseif($CarData->air_compressor=='Replaced')Was @elseif($CarData->air_compressor=='N/A')Was @else N/A @endif {{ucwords($CarData->air_compressor)}}</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Air Bags:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->air_bag=='Good')green  @elseif($CarData->air_bag=='Replaced')yellow @else primary-blue @endif">@if($CarData->air_bag=='Good')Checks @elseif($CarData->air_bag=='Torqued') @elseif($CarData->air_bag=='Replaced')Was @elseif($CarData->air_bag=='Rebuilt')Was @else N/A @endif {{ucwords($CarData->air_bag)}}</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p class="font-bold">Air Manifold:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p class="primary-@if($CarData->air_manifold=='Good')green  @elseif($CarData->air_manifold=='Replaced')yellow @else primary-blue @endif">@if($CarData->air_manifold=='Good')Checks @elseif($CarData->air_manifold=='Serviced') @elseif($CarData->air_manifold=='Replaced')Was @elseif($CarData->air_manifold=='N/A')Was @else N/A @endif {{ucwords($CarData->air_manifold)}}</p>
      </div>
   </div>




</div>


<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Brake Service--}}
{{-- Mechnical service --}}

@if($serviceId==19)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Service Type:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->service_type)}} </p>
      </div>
   </div>



</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end mechical service --}}
{{-- frame allignment service --}}

@if($serviceId==15)
<style>
   .chamber-float {
      display: flex;
      align-items: center;
      justify-content: space-between;
   }

   .chamber-wrap p {
      text-align: center;
      background: #efefef;
      padding: 2px 10px;
   }

   .chamber-float p {
      font-size: 1.5rem;
      background: #efefef;
      padding: 2px 10px;
   }

   .total-chamber {
      margin-top: 1rem
   }

   .colspnbtw {
      justify-content: space-evenly;
   }

   .colspncntr {
      justify-content: center;
   }
</style>
@if($CarData)


<h3 class="tireheader">Before Frame Allignement</h3>

{{-- camber --}}
<div class="row mb-5 colspnbtw">

   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Left Front Camber</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_left_front_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_left_front_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_left_front_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      {{-- caster --}}
      <div class="services-details text-center">
         <p>Caster</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_left_front_caster_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_left_front_caster_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_left_front_caster_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}
      {{-- toe --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_left_front_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_left_front_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_left_front_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end toe --}}
   </div>
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Right Front Camber</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_right_front_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_right_front_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_right_front_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- caster --}}
      <div class="services-details text-center">
         <p>Caster</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_right_front_caster_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_right_front_caster_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_right_front_caster_middle }}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}
      {{-- toe --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_right_front_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_right_front_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_right_front_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end toe --}}
   </div>

</div>
{{-- end camber --}}
{{-- right --}}
<div class="row mb-5 colspncntr">
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Front Total Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_front_total_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_front_total_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_front_total_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      <div class="services-details text-center">
         <p>Steer Ahead</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_front_steer_ahead_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_front_steer_ahead_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_front_steer_ahead_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
   </div>

</div>
{{-- end right --}}
{{-- camber --}}
<div class="row mb-5 colspnbtw">

   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Left Rear</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_left_rear_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_left_rear_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_left_rear_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      {{-- caster --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_left_rear_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_left_rear_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_left_rear_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}

   </div>
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Right Front Camber</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_right_rear_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_right_rear_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_right_rear_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- caster --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_right_rear_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_right_rear_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_right_rear_toe_middle }}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}

   </div>

</div>
{{-- end camber --}}
{{-- right --}}
<div class="row mb-5 colspncntr">
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Total Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_rear_total_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_rear_total_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_rear_total_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      <div class="services-details text-center">
         <p>Thrust Angel</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->before_rear_thrust_angle_left_top}}<sup>o</sup></p>
               <p>{{$CarData->before_rear_thrust_angle_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->before_rear_thrust_angle_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
   </div>

</div>
{{-- end right --}}
{{-- end before --}}


@endif
{{-- after allignement --}}
@if($CarData->AfterFrameAlignment)


<h3 class="tireheader">After Frame Allignement</h3>

{{-- camber --}}
<div class="row mb-5 colspnbtw">

   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Left Front Camber</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_left_front_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_left_front_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_left_front_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      {{-- caster --}}
      <div class="services-details text-center">
         <p>Caster</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_left_front_caster_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_left_front_caster_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_left_front_caster_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}
      {{-- toe --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_left_front_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_left_front_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_left_front_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end toe --}}
   </div>
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Right Front Camber</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_right_front_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_right_front_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_right_front_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- caster --}}
      <div class="services-details text-center">
         <p>Caster</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_right_front_caster_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_right_front_caster_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_right_front_caster_middle }}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}
      {{-- toe --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_right_front_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_right_front_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_right_front_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end toe --}}
   </div>

</div>
{{-- end camber --}}
{{-- right --}}
<div class="row mb-5 colspncntr">
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Front Total Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_front_total_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_front_total_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_front_total_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      <div class="services-details text-center">
         <p>Steer Ahead</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_front_steer_ahead_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_front_steer_ahead_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_front_steer_ahead_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
   </div>

</div>
{{-- end right --}}
{{-- camber --}}
<div class="row mb-5 colspnbtw">

   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Left Rear</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_left_rear_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_left_rear_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_left_rear_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      {{-- caster --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_left_rear_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_left_rear_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_left_rear_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}

   </div>
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Right Front Camber</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_right_rear_camber_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_right_rear_camber_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_right_rear_camber_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- caster --}}
      <div class="services-details text-center">
         <p>Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_right_rear_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_right_rear_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_right_rear_toe_middle }}<sup>o</sup>
            </p>
         </div>
      </div>
      {{-- end caster --}}

   </div>

</div>
{{-- end camber --}}
{{-- right --}}
<div class="row mb-5 colspncntr">
   <div class="col-6 col-md-3">
      <div class="services-details text-center">
         <p>Total Toe</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_rear_total_toe_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_rear_total_toe_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_rear_total_toe_middle}}<sup>o</sup>
            </p>
         </div>
      </div>

      <div class="services-details text-center">
         <p>Thrust Angel</p>
      </div>
      <div class="services-details" style="word-break: break-all;">
         <div class="chamber-wrap">
            <div class="chamber-float">
               <p>{{$CarData->AfterFrameAlignment->after_rear_thrust_angle_left_top}}<sup>o</sup></p>
               <p>{{$CarData->AfterFrameAlignment->after_rear_thrust_angle_right_top}}<sup>o</sup></p>
            </div>
            <p class="total-chamber">
               {{$CarData->AfterFrameAlignment->after_rear_thrust_angle_middle}}<sup>o</sup>
            </p>
         </div>
      </div>
   </div>

</div>
{{-- end right --}}
{{-- end before --}}


@endif
{{-- end allignement --}}
@endif
{{-- end frame allignement service --}}
{{-- paintless dent repiar --}}
@if($serviceId==26)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Vehicle Type:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->vehicle_type)}} </p>
      </div>
   </div>
   @if($CarData->vehicle_type=='other')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Notes:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->paintless_note)}} </p>
      </div>
   </div>
   @else
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Repaired Panels:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->repaired_panels)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Damage Type:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->damage_type)}} </p>
      </div>
   </div>
   @endif



</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end paintless dent repair --}}


{{-- Ceramic service --}}
@if($serviceId==5)
@if($CarData->ceramicHistory)
<div class="row border-bb">
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Manufacturer By: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->coating_manufacturer)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>COATING TYPE: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->coating_type)}} </p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Registered: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->registered)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Registered Company: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->registered_company)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Warranty : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->is_waranty)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Warranty Company : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->waranty_company)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Annual : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->annual_required)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Annual Completed : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->ceramicHistory->annual_completed)}} </p>
      </div>
   </div>
</div>
</div>

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData->ceramicHistory && $CarData->ceramicHistory->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->ceramicHistory->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData->ceramicHistory && $CarData->ceramicHistory->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->ceramicHistory->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end ceramic  service --}}

{{-- Ceramic service --}}
@if($serviceId==10)
@if($CarData)
<div class="row border-bb">


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Service TYPE: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->service_type)}} </p>
      </div>
   </div>

   @if($CarData->service_type == 'correction')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Correction: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->correction)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Vehicle Type: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->vehicle_type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Unit: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->unit)}} </p>
      </div>
   </div>

   <?php //echo "<pre>"; print_r(json_decode($CarData->vehicle_data)->camper_lg_right_1); die; 
   ?>


   <div class="vehicle-1 @if($CarData->vehicle_type != '18-Wheeler Cab')d-none @endif ">

      <div class="row justify-content-center">
         <div class="col-12 col-md-2 space-between">
            <div class="wheeler-1 cmn-input">
               <img src="/assets/images/details-page/1/vehicle-1.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_1}}@endif" name="wheeler_cab_front_view_1" class="wheeler-input1 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_1) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_2}}@endif" name="wheeler_cab_front_view_2" class="wheeler-input2 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_2) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_3}}@endif" name="wheeler_cab_front_view_3" class="wheeler-input3 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_3) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_4}}@endif" name="wheeler_cab_front_view_4" class="wheeler-input4 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_4) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_5}}@endif" name="wheeler_cab_front_view_5" class="wheeler-input5 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_5) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_6}}@endif" name="wheeler_cab_front_view_6" class="wheeler-input6 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_6) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_7}}@endif" name="wheeler_cab_front_view_7" class="wheeler-input7 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_7) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_8}}@endif" name="wheeler_cab_front_view_8" class="wheeler-input8 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_8) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_9}}@endif" name="wheeler_cab_front_view_9" class="wheeler-input9 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_9) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_10}}@endif" name="wheeler_cab_front_view_10" class="wheeler-input10 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_10) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_11}}@endif" name="wheeler_cab_front_view_11" class="wheeler-input11 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_11) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_12}}@endif" name="wheeler_cab_front_view_12" class="wheeler-input12 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_12) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_front_view_13}}@endif" name="wheeler_cab_front_view_13" class="wheeler-input13 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_front_view_13) filled @endif @endif" placeholder="0" />
            </div>
            <div class="wheeler-2 cmn-input">
               <img src="/assets/images/details-page/1/vehicle-2.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_14}}@endif" name="wheeler_cab_back_view_14" class="wheeler-input14 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_14) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_15}}@endif" name="wheeler_cab_back_view_15" class="wheeler-input15 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_15) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_16}}@endif" name="wheeler_cab_back_view_16" class="wheeler-input16 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_16) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_17}}@endif" name="wheeler_cab_back_view_17" class="wheeler-input17 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_17) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_18}}@endif" name="wheeler_cab_back_view_18" class="wheeler-input18 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_18) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_19}}@endif" name="wheeler_cab_back_view_19" class="wheeler-input19 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_19) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_20}}@endif" name="wheeler_cab_back_view_20" class="wheeler-input20 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_20) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_back_view_21}}@endif" name="wheeler_cab_back_view_21" class="wheeler-input21 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_back_view_21) filled @endif @endif" placeholder="0" />
            </div>
         </div>
         <div class="col-12 col-md-5 space-between">
            <div class="wheeler-3 cmn-input">
               <img src="/assets/images/details-page/1/vehicle-3.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_22}}@endif" name="wheeler_cab_right_side_22" class="wheeler-input22 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_22) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_23}}@endif" name="wheeler_cab_right_side_23" class="wheeler-input23 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_23) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_24}}@endif" name="wheeler_cab_right_side_24" class="wheeler-input24 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_24) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_25}}@endif" name="wheeler_cab_right_side_25" class="wheeler-input25 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_25) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_26}}@endif" name="wheeler_cab_right_side_26" class="wheeler-input26 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_26) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_27}}@endif" name="wheeler_cab_right_side_27" class="wheeler-input27 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_27) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_28}}@endif" name="wheeler_cab_right_side_28" class="wheeler-input28 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_28) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_29}}@endif" name="wheeler_cab_right_side_29" class="wheeler-input29 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_29) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_30}}@endif" name="wheeler_cab_right_side_30" class="wheeler-input30 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_30) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_31}}@endif" name="wheeler_cab_right_side_31" class="wheeler-input31 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_31) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_32}}@endif" name="wheeler_cab_right_side_32" class="wheeler-input32 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_32) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_33}}@endif" name="wheeler_cab_right_side_33" class="wheeler-input33 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_33) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_34}}@endif" name="wheeler_cab_right_side_34" class="wheeler-input34 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_34) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_35}}@endif" name="wheeler_cab_right_side_35" class="wheeler-input35 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_35) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_36}}@endif" name="wheeler_cab_right_side_36" class="wheeler-input36 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_36) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_37}}@endif" name="wheeler_cab_right_side_37" class="wheeler-input37 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_37) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_38}}@endif" name="wheeler_cab_right_side_38" class="wheeler-input38 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_38) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_39}}@endif" name="wheeler_cab_right_side_39" class="wheeler-input39 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_39) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_40}}@endif" name="wheeler_cab_right_side_40" class="wheeler-input40 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_40) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_41}}@endif" name="wheeler_cab_right_side_41" class="wheeler-input41 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_41) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_42}}@endif" name="wheeler_cab_right_side_42" class="wheeler-input42 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_42) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_43}}@endif" name="wheeler_cab_right_side_43" class="wheeler-input43 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_43) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_44}}@endif" name="wheeler_cab_right_side_44" class="wheeler-input44 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_44) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_45}}@endif" name="wheeler_cab_right_side_45" class="wheeler-input45 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_45) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_46}}@endif" name="wheeler_cab_right_side_46" class="wheeler-input46 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_46) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_47}}@endif" name="wheeler_cab_right_side_47" class="wheeler-input47 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_47) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_48}}@endif" name="wheeler_cab_right_side_48" class="wheeler-input48 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_48) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_49}}@endif" name="wheeler_cab_right_side_49" class="wheeler-input49 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_49) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_50}}@endif" name="wheeler_cab_right_side_50" class="wheeler-input50 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_50) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_51}}@endif" name="wheeler_cab_right_side_51" class="wheeler-input51 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_51) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_52}}@endif" name="wheeler_cab_right_side_52" class="wheeler-input52 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_52) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_right_side_53}}@endif" name="wheeler_cab_right_side_53" class="wheeler-input53 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_right_side_53) filled @endif @endif" placeholder="0" />
            </div>
            <div class="wheeler-4 cmn-input">
               <img src="/assets/images/details-page/1/vehicle-4.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_54}}@endif" name="wheeler_cab_left_side_54" class="wheeler-input54 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_54) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_55}}@endif" name="wheeler_cab_left_side_55" class="wheeler-input55 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_55) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_56}}@endif" name="wheeler_cab_left_side_56" class="wheeler-input56 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_56) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_57}}@endif" name="wheeler_cab_left_side_57" class="wheeler-input57 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_57) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_58}}@endif" name="wheeler_cab_left_side_58" class="wheeler-input58 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_58) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_59}}@endif" name="wheeler_cab_left_side_59" class="wheeler-input59 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_59) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_60}}@endif" name="wheeler_cab_left_side_60" class="wheeler-input60 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_60) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_61}}@endif" name="wheeler_cab_left_side_61" class="wheeler-input61 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_61) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_62}}@endif" name="wheeler_cab_left_side_62" class="wheeler-input62 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_62) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_63}}@endif" name="wheeler_cab_left_side_63" class="wheeler-input63 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_63) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_64}}@endif" name="wheeler_cab_left_side_64" class="wheeler-input65 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_64) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_65}}@endif" name="wheeler_cab_left_side_65" class="wheeler-input66 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_65) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_66}}@endif" name="wheeler_cab_left_side_66" class="wheeler-input67 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_66) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_67}}@endif" name="wheeler_cab_left_side_67" class="wheeler-input68 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_67) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_68}}@endif" name="wheeler_cab_left_side_68" class="wheeler-input69 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_68) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_69}}@endif" name="wheeler_cab_left_side_69" class="wheeler-input70 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_69) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_70}}@endif" name="wheeler_cab_left_side_70" class="wheeler-input71 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_70) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_71}}@endif" name="wheeler_cab_left_side_71" class="wheeler-input72 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_71) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_72}}@endif" name="wheeler_cab_left_side_72" class="wheeler-input73 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_72) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_73}}@endif" name="wheeler_cab_left_side_73" class="wheeler-input74 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_73) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_74}}@endif" name="wheeler_cab_left_side_74" class="wheeler-input75 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_74) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_75}}@endif" name="wheeler_cab_left_side_75" class="wheeler-input76 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_75) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_76}}@endif" name="wheeler_cab_left_side_76" class="wheeler-input77 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_76) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_77}}@endif" name="wheeler_cab_left_side_77" class="wheeler-input78 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_77) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_78}}@endif" name="wheeler_cab_left_side_78" class="wheeler-input79 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_78) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_79}}@endif" name="wheeler_cab_left_side_79" class="wheeler-input80 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_79) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_80}}@endif" name="wheeler_cab_left_side_80" class="wheeler-input81 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_80) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_81}}@endif" name="wheeler_cab_left_side_81" class="wheeler-input82 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_81) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_82}}@endif" name="wheeler_cab_left_side_82" class="wheeler-input84 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_82) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_left_side_83}}@endif" name="wheeler_cab_left_side_83" class="wheeler-input85 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_left_side_83) filled @endif @endif" placeholder="0" />
            </div>
         </div>
         <div class="col-12 col-md-2 space-between">
            <div class="wheeler-5 cmn-input">
               <img src="/assets/images/details-page/1/vehicle-5.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_84}}@endif" name="wheeler_cab_top_side_84" class="wheeler-input86 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_84) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_85}}@endif" name="wheeler_cab_top_side_85" class="wheeler-input87 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_85) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_86}}@endif" name="wheeler_cab_top_side_86" class="wheeler-input88 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_86) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_87}}@endif" name="wheeler_cab_top_side_87" class="wheeler-input89 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_87) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_88}}@endif" name="wheeler_cab_top_side_88" class="wheeler-input90 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_88) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_89}}@endif" name="wheeler_cab_top_side_89" class="wheeler-input91 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_89) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_90}}@endif" name="wheeler_cab_top_side_90" class="wheeler-input92 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_90) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_91}}@endif" name="wheeler_cab_top_side_91" class="wheeler-input93 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_91) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_92}}@endif" name="wheeler_cab_top_side_92" class="wheeler-input94 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_92) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_93}}@endif" name="wheeler_cab_top_side_93" class="wheeler-input95 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_93) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_94}}@endif" name="wheeler_cab_top_side_94" class="wheeler-input96 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_94) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_95}}@endif" name="wheeler_cab_top_side_95" class="wheeler-input97 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_95) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_96}}@endif" name="wheeler_cab_top_side_96" class="wheeler-input98 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_96) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_97}}@endif" name="wheeler_cab_top_side_97" class="wheeler-input99 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_97) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_98}}@endif" name="wheeler_cab_top_side_98" class="wheeler-input100 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_98) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_99}}@endif" name="wheeler_cab_top_side_99" class="wheeler-input101 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_99) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_100}}@endif" name="wheeler_cab_top_side_100" class="wheeler-input102 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_100) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_101}}@endif" name="wheeler_cab_top_side_101" class="wheeler-input103 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_101) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_102}}@endif" name="wheeler_cab_top_side_102" class="wheeler-input104 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_102) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_103}}@endif" name="wheeler_cab_top_side_103" class="wheeler-input105 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_103) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_104}}@endif" name="wheeler_cab_top_side_104" class="wheeler-input106 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_104) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->wheeler_cab_top_side_105}}@endif" name="wheeler_cab_top_side_105" class="wheeler-input107 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->wheeler_cab_top_side_105) filled @endif @endif" placeholder="0" />
            </div>
         </div>
      </div>
   </div>

   <div class="vehicle-2 @if($CarData->vehicle_type != 'Bus')d-none @endif">
      <div class="row justify-content-center">
         <div class="col-12 col-md-2 space-between">
            <div class="bus-1 cmn-input">
               <img src="/assets/images/details-page/bus/front-view.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_1}}@endif" name="front_view_1" class="bus-input1 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_1) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_2}}@endif" name="front_view_2" class="bus-input2 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_2) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_3}}@endif" name="front_view_3" class="bus-input3 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_3) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_4}}@endif" name="front_view_4" class="bus-input4 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_4) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_5}}@endif" name="front_view_5" class="bus-input5 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_5) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_6}}@endif" name="front_view_6" class="bus-input6 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_6) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_7}}@endif" name="front_view_7" class="bus-input7 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_7) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_8}}@endif" name="front_view_8" class="bus-input8 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_8) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_9}}@endif" name="front_view_9" class="bus-input9 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_9) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_10}}@endif" name="front_view_10" class="bus-input10 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_10) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_11}}@endif" name="front_view_11" class="bus-input11 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_11) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_12}}@endif" name="front_view_12" class="bus-input12 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_12) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_13}}@endif" name="front_view_13" class="bus-input13 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_13) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_14}}@endif" name="front_view_14" class="bus-input14 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_14) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_15}}@endif" name="front_view_15" class="bus-input15 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_15) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->front_view_16}}@endif" name="front_view_16" class="bus-input16 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->front_view_16) filled @endif @endif" placeholder="0" />
            </div>
            <div class="bus-2 cmn-input">
               <img src="/assets/images/details-page/bus/back-view.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_17}}@endif" name="back_view_17" class="bus-input17 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_17) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_18}}@endif" name="back_view_18" class="bus-input18 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_18) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_19}}@endif" name="back_view_19" class="bus-input19 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_19) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_20}}@endif" name="back_view_20" class="bus-input20 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_20) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_21}}@endif" name="back_view_21" class="bus-input21 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_21) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_22}}@endif" name="back_view_22" class="bus-input22 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_22) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_23}}@endif" name="back_view_23" class="bus-input23 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_23) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_24}}@endif" name="back_view_24" class="bus-input24 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_24) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_25}}@endif" name="back_view_25" class="bus-input25 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_25) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_26}}@endif" name="back_view_26" class="bus-input26 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_26) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_27}}@endif" name="back_view_27" class="bus-input27 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_27) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_28}}@endif" name="back_view_28" class="bus-input28 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_28) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_29}}@endif" name="back_view_29" class="bus-input29 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_29) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_30}}@endif" name="back_view_30" class="bus-input30 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_30) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_31}}@endif" name="back_view_31" class="bus-input31 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_31) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_32}}@endif" name="back_view_32" class="bus-input32 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_32) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_33}}@endif" name="back_view_33" class="bus-input33 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_33) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_34}}@endif" name="back_view_34" class="bus-input34 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_34) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_35}}@endif" name="back_view_35" class="bus-input35 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_35) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_36}}@endif" name="back_view_36" class="bus-input36 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_36) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_37}}@endif" name="back_view_37" class="bus-input37 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_37) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_38}}@endif" name="back_view_38" class="bus-input38 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_38) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_39}}@endif" name="back_view_39" class="bus-input39 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_39) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->back_view_40}}@endif" name="back_view_40" class="bus-input40 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->back_view_40) filled @endif @endif" placeholder="0" />

            </div>
         </div>
         <div class="col-12 col-md-6 space-between">
            <div class="bus-3 cmn-input">
               <img src="/assets/images/details-page/bus/side-right.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_41}}@endif" name="side_right_41" class="bus-input41 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_41) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_42}}@endif" name="side_right_42" class="bus-input42 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_42) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_43}}@endif" name="side_right_43" class="bus-input43 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_43) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_44}}@endif" name="side_right_44" class="bus-input44 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_44) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_45}}@endif" name="side_right_45" class="bus-input45 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_45) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_46}}@endif" name="side_right_46" class="bus-input46 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_46) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_47}}@endif" name="side_right_47" class="bus-input47 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_47) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_48}}@endif" name="side_right_48" class="bus-input48 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_48) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_49}}@endif" name="side_right_49" class="bus-input49 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_49) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_50}}@endif" name="side_right_50" class="bus-input50 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_50) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_51}}@endif" name="side_right_51" class="bus-input51 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_51) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_52}}@endif" name="side_right_52" class="bus-input52 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_52) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_53}}@endif" name="side_right_53" class="bus-input53 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_53) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_54}}@endif" name="side_right_54" class="bus-input54 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_54) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_55}}@endif" name="side_right_55" class="bus-input55 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_55) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_56}}@endif" name="side_right_56" class="bus-input56 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_56) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_57}}@endif" name="side_right_57" class="bus-input57 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_57) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_58}}@endif" name="side_right_58" class="bus-input58 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_58) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_59}}@endif" name="side_right_59" class="bus-input59 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_59) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_60}}@endif" name="side_right_60" class="bus-input60 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_60) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_61}}@endif" name="side_right_61" class="bus-input61 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_61) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_62}}@endif" name="side_right_62" class="bus-input62 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_62) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_63}}@endif" name="side_right_63" class="bus-input63 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_63) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_64}}@endif" name="side_right_64" class="bus-input64 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_64) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_65}}@endif" name="side_right_65" class="bus-input65 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_65) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_66}}@endif" name="side_right_66" class="bus-input66 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_66) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_67}}@endif" name="side_right_67" class="bus-input67 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_67) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_68}}@endif" name="side_right_68" class="bus-input68 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_68) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_69}}@endif" name="side_right_69" class="bus-input69 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_69) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_70}}@endif" name="side_right_70" class="bus-input70 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_70) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_71}}@endif" name="side_right_71" class="bus-input71 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_71) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_72}}@endif" name="side_right_72" class="bus-input72 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_72) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_73}}@endif" name="side_right_73" class="bus-input73 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_73) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_74}}@endif" name="side_right_74" class="bus-input74 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_74) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_75}}@endif" name="side_right_75" class="bus-input75 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_75) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_76}}@endif" name="side_right_76" class="bus-input76 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_76) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_77}}@endif" name="side_right_77" class="bus-input77 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_77) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_78}}@endif" name="side_right_78" class="bus-input78 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_78) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_79}}@endif" name="side_right_79" class="bus-input79 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_79) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_80}}@endif" name="side_right_80" class="bus-input80 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_80) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_81}}@endif" name="side_right_81" class="bus-input81 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_81) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_82}}@endif" name="side_right_82" class="bus-input82 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_82) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_83}}@endif" name="side_right_83" class="bus-input83 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_83) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_84}}@endif" name="side_right_84" class="bus-input84 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_84) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_85}}@endif" name="side_right_85" class="bus-input85 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_85) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_86}}@endif" name="side_right_86" class="bus-input86 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_86) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_87}}@endif" name="side_right_87" class="bus-input87 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_87) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_88}}@endif" name="side_right_88" class="bus-input88 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_88) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_89}}@endif" name="side_right_89" class="bus-input89 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_89) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_90}}@endif" name="side_right_90" class="bus-input90 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_90) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_91}}@endif" name="side_right_91" class="bus-input91 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_91) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_92}}@endif" name="side_right_92" class="bus-input92 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_92) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_93}}@endif" name="side_right_93" class="bus-input93 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_93) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_94}}@endif" name="side_right_94" class="bus-input94 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_94) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_95}}@endif" name="side_right_95" class="bus-input95 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_95) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_96}}@endif" name="side_right_96" class="bus-input96 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_96) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_97}}@endif" name="side_right_97" class="bus-input97 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_97) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_98}}@endif" name="side_right_98" class="bus-input98 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_98) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_99}}@endif" name="side_right_99" class="bus-input99 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_99) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_100}}@endif" name="side_right_100" class="bus-input100 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_100) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_101}}@endif" name="side_right_101" class="bus-input101 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_101) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_102}}@endif" name="side_right_102" class="bus-input102 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_102) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_103}}@endif" name="side_right_103" class="bus-input103 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_103) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_104}}@endif" name="side_right_104" class="bus-input104 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_104) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_105}}@endif" name="side_right_105" class="bus-input105 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_105) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_right_106}}@endif" name="side_right_106" class="bus-input106 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_right_106) filled @endif @endif" placeholder="0" />
            </div>
            <div class="bus-4 cmn-input">
               <img src="/assets/images/details-page/bus/side-left.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_107}}@endif" name="side_left_107" class="bus-input107 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_107) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_108}}@endif" name="side_left_108" class="bus-input108 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_108) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_109}}@endif" name="side_left_109" class="bus-input109 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_109) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_110}}@endif" name="side_left_110" class="bus-input110 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_110) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_111}}@endif" name="side_left_111" class="bus-input111 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_111) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_112}}@endif" name="side_left_112" class="bus-input112 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_112) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_113}}@endif" name="side_left_113" class="bus-input113 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_113) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_114}}@endif" name="side_left_114" class="bus-input114 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_114) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_115}}@endif" name="side_left_115" class="bus-input115 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_115) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_116}}@endif" name="side_left_116" class="bus-input116 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_116) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_117}}@endif" name="side_left_117" class="bus-input117 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_117) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_118}}@endif" name="side_left_118" class="bus-input118 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_118) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_119}}@endif" name="side_left_119" class="bus-input119 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_119) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_120}}@endif" name="side_left_120" class="bus-input120 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_120) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_121}}@endif" name="side_left_121" class="bus-input121 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_121) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_122}}@endif" name="side_left_122" class="bus-input122 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_122) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_123}}@endif" name="side_left_123" class="bus-input123 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_123) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_124}}@endif" name="side_left_124" class="bus-input124 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_124) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_125}}@endif" name="side_left_125" class="bus-input125 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_125) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_126}}@endif" name="side_left_126" class="bus-input126 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_126) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_127}}@endif" name="side_left_127" class="bus-input127 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_127) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_128}}@endif" name="side_left_128" class="bus-input128 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_128) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_129}}@endif" name="side_left_129" class="bus-input129 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_129) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_130}}@endif" name="side_left_130" class="bus-input130 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_130) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_131}}@endif" name="side_left_131" class="bus-input131 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_131) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_132}}@endif" name="side_left_132" class="bus-input132 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_132) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_133}}@endif" name="side_left_133" class="bus-input133 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_133) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_134}}@endif" name="side_left_134" class="bus-input134 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_134) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_135}}@endif" name="side_left_135" class="bus-input135 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_135) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_136}}@endif" name="side_left_136" class="bus-input136 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_136) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_137}}@endif" name="side_left_137" class="bus-input137 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_137) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_138}}@endif" name="side_left_138" class="bus-input138 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_138) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_139}}@endif" name="side_left_139" class="bus-input139 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_139) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_140}}@endif" name="side_left_140" class="bus-input140 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_140) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_141}}@endif" name="side_left_141" class="bus-input141 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_141) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_142}}@endif" name="side_left_142" class="bus-input142 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_142) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_143}}@endif" name="side_left_143" class="bus-input143 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_143) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_144}}@endif" name="side_left_144" class="bus-input144 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_144) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_145}}@endif" name="side_left_145" class="bus-input145 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_145) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_146}}@endif" name="side_left_146" class="bus-input146 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_146) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_147}}@endif" name="side_left_147" class="bus-input147 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_147) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_148}}@endif" name="side_left_148" class="bus-input148 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_148) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_149}}@endif" name="side_left_149" class="bus-input149 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_149) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_150}}@endif" name="side_left_150" class="bus-input150 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_150) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_151}}@endif" name="side_left_151" class="bus-input151 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_151) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_152}}@endif" name="side_left_152" class="bus-input152 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_152) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_153}}@endif" name="side_left_153" class="bus-input153 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_153) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_154}}@endif" name="side_left_154" class="bus-input154 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_154) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_155}}@endif" name="side_left_155" class="bus-input154 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_155) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_156}}@endif" name="side_left_156" class="bus-input155 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_156) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_157}}@endif" name="side_left_157" class="bus-input156 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_157) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_158}}@endif" name="side_left_158" class="bus-input157 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_158) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_159}}@endif" name="side_left_159" class="bus-input158 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_159) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_160}}@endif" name="side_left_160" class="bus-input159 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_160) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_161}}@endif" name="side_left_161" class="bus-input160 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_161) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_162}}@endif" name="side_left_162" class="bus-input161 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_162) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_163}}@endif" name="side_left_163" class="bus-input162 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_163) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_164}}@endif" name="side_left_164" class="bus-input163 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_164) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_165}}@endif" name="side_left_165" class="bus-input164 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_165) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_166}}@endif" name="side_left_166" class="bus-input165 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_166) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_167}}@endif" name="side_left_167" class="bus-input166 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_167) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_168}}@endif" name="side_left_168" class="bus-input167 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_168) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_169}}@endif" name="side_left_169" class="bus-input168 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_169) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_170}}@endif" name="side_left_170" class="bus-input169 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_170) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_171}}@endif" name="side_left_171" class="bus-input170 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_171) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_172}}@endif" name="side_left_172" class="bus-input171 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_172) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_173}}@endif" name="side_left_173" class="bus-input172 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_173) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_174}}@endif" name="side_left_174" class="bus-input173 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_174) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_175}}@endif" name="side_left_175" class="bus-input174 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_175) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_176}}@endif" name="side_left_176" class="bus-input175 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_176) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_177}}@endif" name="side_left_177" class="bus-input176 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_177) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_178}}@endif" name="side_left_178" class="bus-input177 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_178) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_179}}@endif" name="side_left_179" class="bus-input178 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_179) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_180}}@endif" name="side_left_180" class="bus-input179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_180) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_181}}@endif" name="side_left_181" class="bus-input179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_181) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_182}}@endif" name="side_left_182" class="bus-input179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_182) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_183}}@endif" name="side_left_183" class="bus-input179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_183) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_184}}@endif" name="side_left_184" class="bus-input179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_184) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_185}}@endif" name="side_left_185" class="bus-input179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_185) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->side_left_186}}@endif" name="side_left_186" class="bus-input179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->side_left_186) filled @endif @endif" placeholder="0" />
            </div>
         </div>
         <div class="col-12 col-md-2 space-between">
            <div class="bus-5 cmn-input">
               <img src="/assets/images/details-page/bus/top-view.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_187}}@endif" name="top_view_187" class="bus-input180 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_187) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_188}}@endif" name="top_view_188" class="bus-input181 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_188) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_189}}@endif" name="top_view_189" class="bus-input182 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_189) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_190}}@endif" name="top_view_190" class="bus-input183 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_190) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_191}}@endif" name="top_view_191" class="bus-input184 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_191) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_192}}@endif" name="top_view_192" class="bus-input185 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_192) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_193}}@endif" name="top_view_193" class="bus-input186 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_193) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_194}}@endif" name="top_view_194" class="bus-input187 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_194) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_195}}@endif" name="top_view_195" class="bus-input188 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_195) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_196}}@endif" name="top_view_196" class="bus-input189 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_196) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_197}}@endif" name="top_view_197" class="bus-input190 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_197) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_198}}@endif" name="top_view_198" class="bus-input191 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_198) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_199}}@endif" name="top_view_199" class="bus-input192 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_199) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_200}}@endif" name="top_view_200" class="bus-input193 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_200) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_201}}@endif" name="top_view_201" class="bus-input194 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_201) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_202}}@endif" name="top_view_202" class="bus-input195 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_202) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_203}}@endif" name="top_view_203" class="bus-input196 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_203) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_204}}@endif" name="top_view_204" class="bus-input197 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_204) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_205}}@endif" name="top_view_205" class="bus-input198 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_205) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_206}}@endif" name="top_view_206" class="bus-input199 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_206) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_207}}@endif" name="top_view_207" class="bus-input200 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_207) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_208}}@endif" name="top_view_208" class="bus-input201 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_208) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_209}}@endif" name="top_view_209" class="bus-input202 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_209) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_210}}@endif" name="top_view_210" class="bus-input203 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_210) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_211}}@endif" name="top_view_211" class="bus-input204 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_211) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_212}}@endif" name="top_view_212" class="bus-input205 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_212) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_213}}@endif" name="top_view_213" class="bus-input206 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_213) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_214}}@endif" name="top_view_214" class="bus-input207 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_214) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_215}}@endif" name="top_view_215" class="bus-input208 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_215) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_216}}@endif" name="top_view_216" class="bus-input209 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_216) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_217}}@endif" name="top_view_217" class="bus-input210 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_217) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_218}}@endif" name="top_view_218" class="bus-input211 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_218) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_219}}@endif" name="top_view_219" class="bus-input212 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_219) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_220}}@endif" name="top_view_220" class="bus-input213 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_220) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_221}}@endif" name="top_view_221" class="bus-input214 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_221) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_222}}@endif" name="top_view_222" class="bus-input215 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_222) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_223}}@endif" name="top_view_223" class="bus-input216 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_223) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_224}}@endif" name="top_view_224" class="bus-input217 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_224) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_225}}@endif" name="top_view_225" class="bus-input218 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_225) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_226}}@endif" name="top_view_226" class="bus-input219 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_226) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_227}}@endif" name="top_view_227" class="bus-input220 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_227) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_228}}@endif" name="top_view_228" class="bus-input221 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_228) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_229}}@endif" name="top_view_229" class="bus-input222 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_229) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_230}}@endif" name="top_view_230" class="bus-input223 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_230) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_231}}@endif" name="top_view_231" class="bus-input224 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_231) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_232}}@endif" name="top_view_232" class="bus-input225 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_232) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_233}}@endif" name="top_view_233" class="bus-input226 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_233) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_234}}@endif" name="top_view_234" class="bus-input227 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_234) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_235}}@endif" name="top_view_235" class="bus-input228 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_235) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_236}}@endif" name="top_view_236" class="bus-input229 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_236) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_237}}@endif" name="top_view_237" class="bus-input230 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_237) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_238}}@endif" name="top_view_238" class="bus-input231 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_238) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_239}}@endif" name="top_view_239" class="bus-input232 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_239) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_240}}@endif" name="top_view_240" class="bus-input233 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_240) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_241}}@endif" name="top_view_241" class="bus-input234 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_241) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_242}}@endif" name="top_view_242" class="bus-input235 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_242) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_243}}@endif" name="top_view_243" class="bus-input236 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_243) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_244}}@endif" name="top_view_244" class="bus-input237 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_244) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_245}}@endif" name="top_view_245" class="bus-input238 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_245) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_246}}@endif" name="top_view_246" class="bus-input239 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_246) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_247}}@endif" name="top_view_247" class="bus-input240 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_247) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_248}}@endif" name="top_view_248" class="bus-input241 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_248) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_249}}@endif" name="top_view_249" class="bus-input242 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_249) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_250}}@endif" name="top_view_250" class="bus-input243 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_250) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_251}}@endif" name="top_view_251" class="bus-input244 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_251) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_252}}@endif" name="top_view_252" class="bus-input245 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_252) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_253}}@endif" name="top_view_253" class="bus-input246 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_253) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_254}}@endif" name="top_view_254" class="bus-input247 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_254) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_255}}@endif" name="top_view_255" class="bus-input248 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_255) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_256}}@endif" name="top_view_256" class="bus-input249 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_256) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_257}}@endif" name="top_view_257" class="bus-input250 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_257) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_258}}@endif" name="top_view_258" class="bus-input251 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_258) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_259}}@endif" name="top_view_259" class="bus-input252 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_259) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_260}}@endif" name="top_view_260" class="bus-input253 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_260) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_261}}@endif" name="top_view_261" class="bus-input254 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_261) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_262}}@endif" name="top_view_262" class="bus-input255 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_262) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_263}}@endif" name="top_view_263" class="bus-input256 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_263) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_264}}@endif" name="top_view_264" class="bus-input257 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_264) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_265}}@endif" name="top_view_265" class="bus-input258 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_265) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_266}}@endif" name="top_view_266" class="bus-input259 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_266) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_267}}@endif" name="top_view_267" class="bus-input260 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_267) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_268}}@endif" name="top_view_268" class="bus-input261 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_268) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_269}}@endif" name="top_view_269" class="bus-input262 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_269) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_270}}@endif" name="top_view_270" class="bus-input263 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_270) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_271}}@endif" name="top_view_271" class="bus-input264 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_271) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_272}}@endif" name="top_view_272" class="bus-input265 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_272) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_273}}@endif" name="top_view_273" class="bus-input266 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_273) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_274}}@endif" name="top_view_274" class="bus-input267 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_274) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_275}}@endif" name="top_view_275" class="bus-input268 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_275) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_276}}@endif" name="top_view_276" class="bus-input269 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_276) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_277}}@endif" name="top_view_277" class="bus-input270 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_277) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_278}}@endif" name="top_view_278" class="bus-input271 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_278) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_279}}@endif" name="top_view_279" class="bus-input272 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_279) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_280}}@endif" name="top_view_280" class="bus-input273 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_280) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_281}}@endif" name="top_view_281" class="bus-input274 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_281) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_282}}@endif" name="top_view_282" class="bus-input275 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_282) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_283}}@endif" name="top_view_283" class="bus-input276 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_283) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_284}}@endif" name="top_view_284" class="bus-input277 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_284) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_285}}@endif" name="top_view_285" class="bus-input278 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_285) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_286}}@endif" name="top_view_286" class="bus-input279 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_286) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_287}}@endif" name="top_view_287" class="bus-input280 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_287) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->top_view_288}}@endif" name="top_view_288" class="bus-input281 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->top_view_288) filled @endif @endif" placeholder="0" />
            </div>
         </div>
      </div>
   </div>

   <div class="vehicle-3 @if($CarData->vehicle_type != 'Camper - Large')d-none @endif">
      <div class="row justify-content-center">
         <div class="col-12 col-md-8 space-between">
            <div class="camper-lg cmn-input">
               <img src="/assets/images/details-page/camper-lg/camper-lg-right.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_1}}@endif" name="camper_lg_right_1" class="camper-lg-1 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_1) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_2}}@endif" name="camper_lg_right_2" class="camper-lg-2 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_2) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_3}}@endif" name="camper_lg_right_3" class="camper-lg-3 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_3) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_4}}@endif" name="camper_lg_right_4" class="camper-lg-4 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_4) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_5}}@endif" name="camper_lg_right_5" class="camper-lg-5 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_5) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_6}}@endif" name="camper_lg_right_6" class="camper-lg-6 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_6) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_7}}@endif" name="camper_lg_right_7" class="camper-lg-7 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_7) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_8}}@endif" name="camper_lg_right_8" class="camper-lg-8 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_8) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_9}}@endif" name="camper_lg_right_9" class="camper-lg-9 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_9) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_10}}@endif" name="camper_lg_right_10" class="camper-lg-10 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_10) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_11}}@endif" name="camper_lg_right_11" class="camper-lg-11 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_11) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_12}}@endif" name="camper_lg_right_12" class="camper-lg-12 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_12) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_13}}@endif" name="camper_lg_right_13" class="camper-lg-13 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_13) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_14}}@endif" name="camper_lg_right_14" class="camper-lg-14 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_14) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_15}}@endif" name="camper_lg_right_15" class="camper-lg-15 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_15) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_16}}@endif" name="camper_lg_right_16" class="camper-lg-16 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_16) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_17}}@endif" name="camper_lg_right_17" class="camper-lg-17 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_17) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_18}}@endif" name="camper_lg_right_18" class="camper-lg-18 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_18) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_19}}@endif" name="camper_lg_right_19" class="camper-lg-19 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_19) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_20}}@endif" name="camper_lg_right_20" class="camper-lg-20 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_20) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_21}}@endif" name="camper_lg_right_21" class="camper-lg-21 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_21) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_22}}@endif" name="camper_lg_right_22" class="camper-lg-22 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_22) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_23}}@endif" name="camper_lg_right_23" class="camper-lg-23 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_23) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_24}}@endif" name="camper_lg_right_24" class="camper-lg-24 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_24) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_25}}@endif" name="camper_lg_right_25" class="camper-lg-25 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_25) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_26}}@endif" name="camper_lg_right_26" class="camper-lg-26 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_26) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_27}}@endif" name="camper_lg_right_27" class="camper-lg-27 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_27) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_28}}@endif" name="camper_lg_right_28" class="camper-lg-28 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_28) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_29}}@endif" name="camper_lg_right_29" class="camper-lg-29 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_29) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_30}}@endif" name="camper_lg_right_30" class="camper-lg-30 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_30) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_31}}@endif" name="camper_lg_right_31" class="camper-lg-31 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_31) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_32}}@endif" name="camper_lg_right_32" class="camper-lg-32 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_32) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_33}}@endif" name="camper_lg_right_33" class="camper-lg-33 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_33) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_34}}@endif" name="camper_lg_right_34" class="camper-lg-34 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_34) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_35}}@endif" name="camper_lg_right_35" class="camper-lg-35 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_35) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_36}}@endif" name="camper_lg_right_36" class="camper-lg-36 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_36) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_37}}@endif" name="camper_lg_right_37" class="camper-lg-37 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_37) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_38}}@endif" name="camper_lg_right_38" class="camper-lg-38 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_38) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_39}}@endif" name="camper_lg_right_39" class="camper-lg-39 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_39) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_40}}@endif" name="camper_lg_right_40" class="camper-lg-40 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_40) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_41}}@endif" name="camper_lg_right_41" class="camper-lg-41 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_41) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_42}}@endif" name="camper_lg_right_42" class="camper-lg-42 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_42) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_43}}@endif" name="camper_lg_right_43" class="camper-lg-43 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_43) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_44}}@endif" name="camper_lg_right_44" class="camper-lg-44 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_44) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_45}}@endif" name="camper_lg_right_45" class="camper-lg-45 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_45) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_46}}@endif" name="camper_lg_right_46" class="camper-lg-46 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_46) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_47}}@endif" name="camper_lg_right_47" class="camper-lg-47 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_47) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_48}}@endif" name="camper_lg_right_48" class="camper-lg-48 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_48) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_49}}@endif" name="camper_lg_right_49" class="camper-lg-49 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_49) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_50}}@endif" name="camper_lg_right_50" class="camper-lg-50 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_50) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_51}}@endif" name="camper_lg_right_51" class="camper-lg-51 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_51) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_52}}@endif" name="camper_lg_right_52" class="camper-lg-52 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_52) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_53}}@endif" name="camper_lg_right_53" class="camper-lg-53 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_53) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_54}}@endif" name="camper_lg_right_54" class="camper-lg-54 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_54) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_55}}@endif" name="camper_lg_right_55" class="camper-lg-55 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_55) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_56}}@endif" name="camper_lg_right_56" class="camper-lg-56 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_56) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_57}}@endif" name="camper_lg_right_57" class="camper-lg-57 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_57) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_58}}@endif" name="camper_lg_right_58" class="camper-lg-58 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_58) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_59}}@endif" name="camper_lg_right_59" class="camper-lg-59 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_59) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_60}}@endif" name="camper_lg_right_60" class="camper-lg-60 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_60) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_61}}@endif" name="camper_lg_right_61" class="camper-lg-61 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_61) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_62}}@endif" name="camper_lg_right_62" class="camper-lg-62 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_62) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_63}}@endif" name="camper_lg_right_63" class="camper-lg-63 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_63) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_64}}@endif" name="camper_lg_right_64" class="camper-lg-64 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_64) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_65}}@endif" name="camper_lg_right_65" class="camper-lg-65 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_65) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_66}}@endif" name="camper_lg_right_66" class="camper-lg-66 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_66) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_67}}@endif" name="camper_lg_right_67" class="camper-lg-67 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_67) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_68}}@endif" name="camper_lg_right_68" class="camper-lg-68 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_68) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_69}}@endif" name="camper_lg_right_69" class="camper-lg-69 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_69) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_70}}@endif" name="camper_lg_right_70" class="camper-lg-70 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_70) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_71}}@endif" name="camper_lg_right_71" class="camper-lg-71 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_71) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_72}}@endif" name="camper_lg_right_72" class="camper-lg-72 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_72) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_73}}@endif" name="camper_lg_right_73" class="camper-lg-73 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_73) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_74}}@endif" name="camper_lg_right_74" class="camper-lg-74 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_74) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_75}}@endif" name="camper_lg_right_75" class="camper-lg-75 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_75) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_76}}@endif" name="camper_lg_right_76" class="camper-lg-76 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_76) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_77}}@endif" name="camper_lg_right_77" class="camper-lg-77 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_77) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_78}}@endif" name="camper_lg_right_78" class="camper-lg-78 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_78) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_79}}@endif" name="camper_lg_right_79" class="camper-lg-79 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_79) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_80}}@endif" name="camper_lg_right_80" class="camper-lg-80 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_80) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_81}}@endif" name="camper_lg_right_81" class="camper-lg-81 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_81) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_82}}@endif" name="camper_lg_right_82" class="camper-lg-82 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_82) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_83}}@endif" name="camper_lg_right_83" class="camper-lg-83 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_83) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_84}}@endif" name="camper_lg_right_84" class="camper-lg-84 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_84) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_85}}@endif" name="camper_lg_right_85" class="camper-lg-85 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_85) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_86}}@endif" name="camper_lg_right_86" class="camper-lg-86 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_86) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_87}}@endif" name="camper_lg_right_87" class="camper-lg-87 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_87) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_88}}@endif" name="camper_lg_right_88" class="camper-lg-88 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_88) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_89}}@endif" name="camper_lg_right_89" class="camper-lg-89 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_89) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_90}}@endif" name="camper_lg_right_90" class="camper-lg-90 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_90) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_91}}@endif" name="camper_lg_right_91" class="camper-lg-91 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_91) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_92}}@endif" name="camper_lg_right_92" class="camper-lg-92 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_92) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_93}}@endif" name="camper_lg_right_93" class="camper-lg-93 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_93) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_94}}@endif" name="camper_lg_right_94" class="camper-lg-94 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_94) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_95}}@endif" name="camper_lg_right_95" class="camper-lg-95 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_95) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_96}}@endif" name="camper_lg_right_96" class="camper-lg-96 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_96) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_97}}@endif" name="camper_lg_right_97" class="camper-lg-97 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_97) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_98}}@endif" name="camper_lg_right_98" class="camper-lg-98 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_98) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_99}}@endif" name="camper_lg_right_99" class="camper-lg-99 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_99) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_100}}@endif" name="camper_lg_right_100" class="camper-lg-100 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_100) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_101}}@endif" name="camper_lg_right_101" class="camper-lg-101 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_101) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_102}}@endif" name="camper_lg_right_102" class="camper-lg-102 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_102) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_103}}@endif" name="camper_lg_right_103" class="camper-lg-103 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_103) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_104}}@endif" name="camper_lg_right_104" class="camper-lg-104 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_104) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_105}}@endif" name="camper_lg_right_105" class="camper-lg-105 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_105) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_106}}@endif" name="camper_lg_right_106" class="camper-lg-106 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_106) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_107}}@endif" name="camper_lg_right_107" class="camper-lg-107 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_107) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_108}}@endif" name="camper_lg_right_108" class="camper-lg-108 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_108) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_109}}@endif" name="camper_lg_right_109" class="camper-lg-109 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_109) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_110}}@endif" name="camper_lg_right_110" class="camper-lg-110 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_110) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_111}}@endif" name="camper_lg_right_111" class="camper-lg-111 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_111) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_112}}@endif" name="camper_lg_right_112" class="camper-lg-112 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_112) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_113}}@endif" name="camper_lg_right_113" class="camper-lg-113 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_113) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_114}}@endif" name="camper_lg_right_114" class="camper-lg-114 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_114) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_115}}@endif" name="camper_lg_right_115" class="camper-lg-115 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_115) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_116}}@endif" name="camper_lg_right_116" class="camper-lg-116 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_116) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_117}}@endif" name="camper_lg_right_117" class="camper-lg-117 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_117) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_118}}@endif" name="camper_lg_right_118" class="camper-lg-118 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_118) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_119}}@endif" name="camper_lg_right_119" class="camper-lg-119 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_119) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_120}}@endif" name="camper_lg_right_120" class="camper-lg-120 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_120) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_121}}@endif" name="camper_lg_right_121" class="camper-lg-121 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_121) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_122}}@endif" name="camper_lg_right_122" class="camper-lg-122 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_122) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_123}}@endif" name="camper_lg_right_123" class="camper-lg-123 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_123) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_124}}@endif" name="camper_lg_right_124" class="camper-lg-124 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_124) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_125}}@endif" name="camper_lg_right_125" class="camper-lg-125 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_125) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_126}}@endif" name="camper_lg_right_126" class="camper-lg-127 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_126) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_127}}@endif" name="camper_lg_right_127" class="camper-lg-128 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_127) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_right_128}}@endif" name="camper_lg_right_128" class="camper-lg-129 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_right_128) filled @endif @endif" placeholder="0" />

            </div>
            <div class="camper-lg cmn-input">
               <img src="/assets/images/details-page/camper-lg/camper-lg-left.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_129}}@endif" name="camper_lg_left_129" class="camper-lg-131 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_129) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_130}}@endif" name="camper_lg_left_130" class="camper-lg-132 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_130) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_131}}@endif" name="camper_lg_left_131" class="camper-lg-133 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_131) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_132}}@endif" name="camper_lg_left_132" class="camper-lg-134 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_132) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_133}}@endif" name="camper_lg_left_133" class="camper-lg-135 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_133) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_134}}@endif" name="camper_lg_left_134" class="camper-lg-136 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_134) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_135}}@endif" name="camper_lg_left_135" class="camper-lg-137 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_135) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_136}}@endif" name="camper_lg_left_136" class="camper-lg-138 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_136) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_137}}@endif" name="camper_lg_left_137" class="camper-lg-139 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_137) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_138}}@endif" name="camper_lg_left_138" class="camper-lg-140 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_138) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_139}}@endif" name="camper_lg_left_139" class="camper-lg-141 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_139) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_140}}@endif" name="camper_lg_left_140" class="camper-lg-142 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_140) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_141}}@endif" name="camper_lg_left_141" class="camper-lg-143 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_141) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_142}}@endif" name="camper_lg_left_142" class="camper-lg-144 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_142) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_143}}@endif" name="camper_lg_left_143" class="camper-lg-145 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_143) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_144}}@endif" name="camper_lg_left_144" class="camper-lg-146 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_144) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_145}}@endif" name="camper_lg_left_145" class="camper-lg-147 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_145) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_146}}@endif" name="camper_lg_left_146" class="camper-lg-148 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_146) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_147}}@endif" name="camper_lg_left_147" class="camper-lg-149 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_147) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_148}}@endif" name="camper_lg_left_148" class="camper-lg-150 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_148) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_149}}@endif" name="camper_lg_left_149" class="camper-lg-151 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_149) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_150}}@endif" name="camper_lg_left_150" class="camper-lg-152 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_150) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_151}}@endif" name="camper_lg_left_151" class="camper-lg-153 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_151) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_152}}@endif" name="camper_lg_left_152" class="camper-lg-154 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_152) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_153}}@endif" name="camper_lg_left_153" class="camper-lg-155 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_153) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_154}}@endif" name="camper_lg_left_154" class="camper-lg-156 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_154) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_155}}@endif" name="camper_lg_left_155" class="camper-lg-157 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_155) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_156}}@endif" name="camper_lg_left_156" class="camper-lg-158 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_156) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_157}}@endif" name="camper_lg_left_157" class="camper-lg-159 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_157) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_158}}@endif" name="camper_lg_left_158" class="camper-lg-160 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_158) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_159}}@endif" name="camper_lg_left_159" class="camper-lg-161 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_159) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_160}}@endif" name="camper_lg_left_160" class="camper-lg-162 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_160) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_161}}@endif" name="camper_lg_left_161" class="camper-lg-163 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_161) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_162}}@endif" name="camper_lg_left_162" class="camper-lg-164 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_162) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_163}}@endif" name="camper_lg_left_163" class="camper-lg-165 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_163) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_164}}@endif" name="camper_lg_left_164" class="camper-lg-166 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_164) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_165}}@endif" name="camper_lg_left_165" class="camper-lg-167 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_165) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_166}}@endif" name="camper_lg_left_166" class="camper-lg-168 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_166) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_167}}@endif" name="camper_lg_left_167" class="camper-lg-169 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_167) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_168}}@endif" name="camper_lg_left_168" class="camper-lg-170 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_168) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_169}}@endif" name="camper_lg_left_169" class="camper-lg-171 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_169) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_170}}@endif" name="camper_lg_left_170" class="camper-lg-172 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_170) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_171}}@endif" name="camper_lg_left_171" class="camper-lg-173 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_171) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_172}}@endif" name="camper_lg_left_172" class="camper-lg-174 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_172) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_173}}@endif" name="camper_lg_left_173" class="camper-lg-175 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_173) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_174}}@endif" name="camper_lg_left_174" class="camper-lg-176 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_174) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_175}}@endif" name="camper_lg_left_175" class="camper-lg-178 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_175) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_176}}@endif" name="camper_lg_left_176" class="camper-lg-179 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_176) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_177}}@endif" name="camper_lg_left_177" class="camper-lg-180 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_177) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_178}}@endif" name="camper_lg_left_178" class="camper-lg-181 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_178) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_179}}@endif" name="camper_lg_left_179" class="camper-lg-182 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_179) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_180}}@endif" name="camper_lg_left_180" class="camper-lg-183 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_180) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_181}}@endif" name="camper_lg_left_181" class="camper-lg-184 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_181) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_182}}@endif" name="camper_lg_left_182" class="camper-lg-185 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_182) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_183}}@endif" name="camper_lg_left_183" class="camper-lg-186 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_183) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_184}}@endif" name="camper_lg_left_184" class="camper-lg-187 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_184) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_185}}@endif" name="camper_lg_left_185" class="camper-lg-188 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_185) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_186}}@endif" name="camper_lg_left_186" class="camper-lg-189 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_186) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_187}}@endif" name="camper_lg_left_187" class="camper-lg-190 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_187) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_188}}@endif" name="camper_lg_left_188" class="camper-lg-191 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_188) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_189}}@endif" name="camper_lg_left_189" class="camper-lg-192 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_189) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_190}}@endif" name="camper_lg_left_190" class="camper-lg-194 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_190) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_191}}@endif" name="camper_lg_left_191" class="camper-lg-195 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_191) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_192}}@endif" name="camper_lg_left_192" class="camper-lg-196 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_192) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_193}}@endif" name="camper_lg_left_193" class="camper-lg-197 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_193) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_194}}@endif" name="camper_lg_left_194" class="camper-lg-198 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_194) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_195}}@endif" name="camper_lg_left_195" class="camper-lg-199 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_195) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_196}}@endif" name="camper_lg_left_196" class="camper-lg-200 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_196) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_197}}@endif" name="camper_lg_left_197" class="camper-lg-201 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_197) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_198}}@endif" name="camper_lg_left_198" class="camper-lg-202 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_198) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_199}}@endif" name="camper_lg_left_199" class="camper-lg-203 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_199) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_200}}@endif" name="camper_lg_left_200" class="camper-lg-204 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_200) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_201}}@endif" name="camper_lg_left_201" class="camper-lg-205 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_201) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_202}}@endif" name="camper_lg_left_202" class="camper-lg-206 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_202) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_203}}@endif" name="camper_lg_left_203" class="camper-lg-207 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_203) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_204}}@endif" name="camper_lg_left_204" class="camper-lg-208 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_204) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_205}}@endif" name="camper_lg_left_205" class="camper-lg-209 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_205) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_206}}@endif" name="camper_lg_left_206" class="camper-lg-210 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_206) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_207}}@endif" name="camper_lg_left_207" class="camper-lg-211 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_207) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_208}}@endif" name="camper_lg_left_208" class="camper-lg-212 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_208) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_209}}@endif" name="camper_lg_left_209" class="camper-lg-213 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_209) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_210}}@endif" name="camper_lg_left_210" class="camper-lg-214 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_210) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_211}}@endif" name="camper_lg_left_211" class="camper-lg-215 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_211) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_212}}@endif" name="camper_lg_left_212" class="camper-lg-216 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_212) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_213}}@endif" name="camper_lg_left_213" class="camper-lg-217 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_213) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_214}}@endif" name="camper_lg_left_214" class="camper-lg-218 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_214) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_215}}@endif" name="camper_lg_left_215" class="camper-lg-219 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_215) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_216}}@endif" name="camper_lg_left_216" class="camper-lg-220 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_216) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_217}}@endif" name="camper_lg_left_217" class="camper-lg-221 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_217) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_218}}@endif" name="camper_lg_left_218" class="camper-lg-222 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_218) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_219}}@endif" name="camper_lg_left_219" class="camper-lg-223 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_219) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_220}}@endif" name="camper_lg_left_220" class="camper-lg-224 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_220) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_221}}@endif" name="camper_lg_left_221" class="camper-lg-225 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_221) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_222}}@endif" name="camper_lg_left_222" class="camper-lg-226 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_222) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_223}}@endif" name="camper_lg_left_223" class="camper-lg-227 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_223) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_224}}@endif" name="camper_lg_left_224" class="camper-lg-228 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_224) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_225}}@endif" name="camper_lg_left_225" class="camper-lg-229 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_225) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_226}}@endif" name="camper_lg_left_226" class="camper-lg-230 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_226) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_227}}@endif" name="camper_lg_left_227" class="camper-lg-231 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_227) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_228}}@endif" name="camper_lg_left_228" class="camper-lg-232 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_228) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_229}}@endif" name="camper_lg_left_229" class="camper-lg-233 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_229) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_230}}@endif" name="camper_lg_left_230" class="camper-lg-234 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_230) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_231}}@endif" name="camper_lg_left_231" class="camper-lg-235 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_231) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_232}}@endif" name="camper_lg_left_232" class="camper-lg-236 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_232) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_233}}@endif" name="camper_lg_left_233" class="camper-lg-238 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_233) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_234}}@endif" name="camper_lg_left_234" class="camper-lg-239 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_234) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_235}}@endif" name="camper_lg_left_235" class="camper-lg-240 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_235) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_236}}@endif" name="camper_lg_left_236" class="camper-lg-241 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_236) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_237}}@endif" name="camper_lg_left_237" class="camper-lg-242 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_237) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_238}}@endif" name="camper_lg_left_238" class="camper-lg-243 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_238) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_239}}@endif" name="camper_lg_left_239" class="camper-lg-244 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_239) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_240}}@endif" name="camper_lg_left_240" class="camper-lg-245 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_240) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_241}}@endif" name="camper_lg_left_241" class="camper-lg-246 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_241) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_242}}@endif" name="camper_lg_left_242" class="camper-lg-247 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_242) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_243}}@endif" name="camper_lg_left_243" class="camper-lg-248 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_243) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_244}}@endif" name="camper_lg_left_244" class="camper-lg-249 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_244) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_245}}@endif" name="camper_lg_left_245" class="camper-lg-250 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_245) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_246}}@endif" name="camper_lg_left_246" class="camper-lg-251 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_246) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_247}}@endif" name="camper_lg_left_247" class="camper-lg-252 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_247) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_248}}@endif" name="camper_lg_left_248" class="camper-lg-253 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_248) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_249}}@endif" name="camper_lg_left_249" class="camper-lg-254 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_249) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_250}}@endif" name="camper_lg_left_250" class="camper-lg-255 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_250) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_251}}@endif" name="camper_lg_left_251" class="camper-lg-256 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_251) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_252}}@endif" name="camper_lg_left_252" class="camper-lg-257 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_252) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_253}}@endif" name="camper_lg_left_253" class="camper-lg-258 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_253) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_254}}@endif" name="camper_lg_left_254" class="camper-lg-259 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_254) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_255}}@endif" name="camper_lg_left_255" class="camper-lg-260 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_255) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_256}}@endif" name="camper_lg_left_256" class="camper-lg-261 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_256) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_257}}@endif" name="camper_lg_left_257" class="camper-lg-263 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_257) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_left_258}}@endif" name="camper_lg_left_258" class="camper-lg-264 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_left_258) filled @endif @endif" placeholder="0" />
            </div>
         </div>
         <div class="col-12 col-md-2 space-between">
            <div class="camper-lg cmn-input">
               <img src="/assets/images/details-page/camper-lg/camper-lg-front.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_259}}@endif" name="camper_lg_front_259" class="camper-lg-265 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_259) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_260}}@endif" name="camper_lg_front_260" class="camper-lg-266 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_260) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_261}}@endif" name="camper_lg_front_261" class="camper-lg-267 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_261) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_262}}@endif" name="camper_lg_front_262" class="camper-lg-268 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_262) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_263}}@endif" name="camper_lg_front_263" class="camper-lg-269 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_263) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_264}}@endif" name="camper_lg_front_264" class="camper-lg-270 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_264) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_265}}@endif" name="camper_lg_front_265" class="camper-lg-271 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_265) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_266}}@endif" name="camper_lg_front_266" class="camper-lg-272 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_266) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_267}}@endif" name="camper_lg_front_267" class="camper-lg-273 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_267) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_268}}@endif" name="camper_lg_front_268" class="camper-lg-274 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_268) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_269}}@endif" name="camper_lg_front_269" class="camper-lg-275 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_269) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_270}}@endif" name="camper_lg_front_270" class="camper-lg-276 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_270) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_271}}@endif" name="camper_lg_front_271" class="camper-lg-277 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_271) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_272}}@endif" name="camper_lg_front_272" class="camper-lg-278 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_272) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_273}}@endif" name="camper_lg_front_273" class="camper-lg-279 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_273) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_274}}@endif" name="camper_lg_front_274" class="camper-lg-280 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_274) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_275}}@endif" name="camper_lg_front_275" class="camper-lg-281 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_275) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_276}}@endif" name="camper_lg_front_276" class="camper-lg-282 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_276) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_277}}@endif" name="camper_lg_front_277" class="camper-lg-283 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_277) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_278}}@endif" name="camper_lg_front_278" class="camper-lg-284 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_278) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_279}}@endif" name="camper_lg_front_279" class="camper-lg-285 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_279) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_280}}@endif" name="camper_lg_front_280" class="camper-lg-286 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_280) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_281}}@endif" name="camper_lg_front_281" class="camper-lg-287 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_281) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_282}}@endif" name="camper_lg_front_282" class="camper-lg-288 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_282) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_283}}@endif" name="camper_lg_front_283" class="camper-lg-289 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_283) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_284}}@endif" name="camper_lg_front_284" class="camper-lg-290 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_284) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_285}}@endif" name="camper_lg_front_285" class="camper-lg-291 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_285) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_286}}@endif" name="camper_lg_front_286" class="camper-lg-292 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_286) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_287}}@endif" name="camper_lg_front_287" class="camper-lg-293 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_287) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_288}}@endif" name="camper_lg_front_288" class="camper-lg-294 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_288) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_289}}@endif" name="camper_lg_front_289" class="camper-lg-295 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_289) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_290}}@endif" name="camper_lg_front_290" class="camper-lg-296 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_290) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_291}}@endif" name="camper_lg_front_291" class="camper-lg-297 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_291) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_292}}@endif" name="camper_lg_front_292" class="camper-lg-298 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_292) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_293}}@endif" name="camper_lg_front_293" class="camper-lg-299 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_293) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_294}}@endif" name="camper_lg_front_294" class="camper-lg-300 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_294) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_295}}@endif" name="camper_lg_front_295" class="camper-lg-301 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_295) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_296}}@endif" name="camper_lg_front_296" class="camper-lg-302 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_296) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_297}}@endif" name="camper_lg_front_297" class="camper-lg-303 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_297) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_front_298}}@endif" name="camper_lg_front_298" class="camper-lg-304 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_front_298) filled @endif @endif" placeholder="0" />



            </div>
            <div class="camper-lg cmn-input">
               <img src="/assets/images/details-page/camper-lg/camper-lg-back.png">
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_299}}@endif" name="camper_lg_back_299" class="camper-lg-305 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_299) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_300}}@endif" name="camper_lg_back_300" class="camper-lg-306 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_300) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_301}}@endif" name="camper_lg_back_301" class="camper-lg-307 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_301) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_302}}@endif" name="camper_lg_back_302" class="camper-lg-308 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_302) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_303}}@endif" name="camper_lg_back_303" class="camper-lg-309 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_303) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_304}}@endif" name="camper_lg_back_304" class="camper-lg-310 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_304) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_305}}@endif" name="camper_lg_back_305" class="camper-lg-311 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_305) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_306}}@endif" name="camper_lg_back_306" class="camper-lg-312 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_306) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_307}}@endif" name="camper_lg_back_307" class="camper-lg-313 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_307) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_308}}@endif" name="camper_lg_back_308" class="camper-lg-314 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_308) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_309}}@endif" name="camper_lg_back_309" class="camper-lg-315 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_309) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_310}}@endif" name="camper_lg_back_310" class="camper-lg-316 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_310) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_311}}@endif" name="camper_lg_back_311" class="camper-lg-317 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_311) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_312}}@endif" name="camper_lg_back_312" class="camper-lg-318 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_312) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_313}}@endif" name="camper_lg_back_313" class="camper-lg-319 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_313) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_314}}@endif" name="camper_lg_back_314" class="camper-lg-320 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_314) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_315}}@endif" name="camper_lg_back_315" class="camper-lg-321 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_315) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_316}}@endif" name="camper_lg_back_316" class="camper-lg-322 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_316) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_317}}@endif" name="camper_lg_back_317" class="camper-lg-323 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_317) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_318}}@endif" name="camper_lg_back_318" class="camper-lg-324 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_318) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_319}}@endif" name="camper_lg_back_319" class="camper-lg-325 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_319) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_320}}@endif" name="camper_lg_back_320" class="camper-lg-326 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_320) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_321}}@endif" name="camper_lg_back_321" class="camper-lg-327 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_321) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_322}}@endif" name="camper_lg_back_322" class="camper-lg-328 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_322) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_323}}@endif" name="camper_lg_back_323" class="camper-lg-329 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_323) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_324}}@endif" name="camper_lg_back_324" class="camper-lg-330 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_324) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_325}}@endif" name="camper_lg_back_325" class="camper-lg-331 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_325) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_326}}@endif" name="camper_lg_back_326" class="camper-lg-332 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_326) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_327}}@endif" name="camper_lg_back_327" class="camper-lg-333 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_327) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_328}}@endif" name="camper_lg_back_328" class="camper-lg-334 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_328) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_329}}@endif" name="camper_lg_back_329" class="camper-lg-335 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_329) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_330}}@endif" name="camper_lg_back_330" class="camper-lg-336 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_330) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_331}}@endif" name="camper_lg_back_331" class="camper-lg-337 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_331) filled @endif @endif" placeholder="0" />
               <input type="number" value="@if($CarData->vehicle_data){{json_decode($CarData->vehicle_data)->camper_lg_back_332}}@endif" name="camper_lg_back_332" class="camper-lg-338 @if($CarData->vehicle_data) @if(json_decode($CarData->vehicle_data)->camper_lg_back_332) filled @endif @endif" placeholder="0" />
            </div>
         </div>
      </div>
   </div>







   @endif
   @if($CarData->service_type == 'cleaning mobile')

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Cleaning Mobile: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->cleaning_mobile)}} </p>
      </div>
   </div>
   @endif

</div>
</div>

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Detailing  service --}}


{{-- paint_body service --}}
@if($serviceId==23)
@if($CarData)
<div class="row border-bb">
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Vehicle Type: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->vehicle_type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Panels Repaired/Replaced: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->body_panels_repaired_or_replaced)}} </p>
      </div>
   </div>


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Manufacturer: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->paint_manufacturer)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>System: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->paint_system)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Code : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->paint_code)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Color : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->paint_color)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Notes : </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->paint_notes)}} </p>
      </div>
   </div>
</div>
</div>

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end paint_body  service --}}

{{-- performance dyno tuning Service --}}
@if($serviceId==27)
@if($CarData)
<div class="row border-bb">
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Engine Services: </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details">
         <p>{{ucwords($CarData->engine_services)}} </p>
      </div>
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end performance dyno tuning service --}}

{{-- Custom Build Body service --}}
@if($serviceId==8)
@if($CarData)

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')
         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">
                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach
      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Custom Build Body  service --}}

{{-- Dealership service --}}
@if($serviceId==9)
@if($CarData)

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Dealership service --}}

{{-- Fabrication service --}}
@if($serviceId==14)
@if($CarData)

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Febrication service --}}

{{-- Fuel system service --}}
@if($serviceId==16)
@if($CarData)

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Fuel System service --}}

{{-- Lubrication service --}}
@if($serviceId==18)
@if($CarData)

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Lubrication service --}}

{{-- Nitrous service --}}
@if($serviceId==20)
@if($CarData)

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach

   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Nitrous service --}}








{{-- Vinly service --}}

@if($serviceId==24)
@if($CarData)

<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>FILM MANUFACTURER:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->film_manufacturer)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>FILM THICKNESS:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->film_thickness)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>REGISTERED:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->registered)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>REGISTERED COMPANY:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->registered_company)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>WARRANTY:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->is_waranty)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>WARRANTY COMPANY:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->waranty_company)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>ANNUAL REQUIRED:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->annual_required)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>ANNUAL COMPLETED:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->annual_completed)}} </p>
      </div>
   </div>

   <div class="service-desc-content border-bb">
      <h4>PHOTOS</h4>
      <div class="cmn-slider-wrap">
         @if($CarData && $CarData->document)
         <div class="owl-carousel owl-theme photos-slider">
            @foreach(explode(',',$CarData->document) as $key=>$value)
            <?php $chkextension = explode('.', $value);
            error_reporting(0); ?>
            @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

            <div class="item">
               <div class="slider-img lightbox" id="{{ $value}}">
                  <img src="{{ $value}}">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">
                  </span>
               </div>
            </div>
            @endif
            @endforeach

         </div>
         @endif
      </div>
   </div>
   <div class="service-desc-content border-bb">
      <h4>DOCUMENTS</h4>
      <div class="cmn-slider-wrap">
         @if($CarData && $CarData->document)
         <div class="owl-carousel owl-theme document-slider">
            @foreach(explode(',',$CarData->document) as $key=>$value)
            <?php $chkextension = explode('.', $value); ?>
            @if( trim($chkextension[5]) =='pdf')

            <div class="item">
               <a href="{{ $value}}" target="_blank">
                  <div class="slider-img" id="{{ $value}}" style="background:none">
                     <img src="/assets/images/pdf.png">
                     <span class="plus-overlay ">

                        <img src="{{ asset('/assets/images/plus.png') }}">

                     </span>
               </a>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>

   @if($CarData->PPFInstall_Detail->type=='Car' || $CarData->PPFInstall_Detail->type=='Van')

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Hood:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->hood ?? 'N/A' ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Roof:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->roof ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Hatch:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->hatch ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Front Bumper:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->front_bumper ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Rear Bumper:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->rear_bumper ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Front Quarter:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_front_quarter_panel ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rear Quarter:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_rear_quarter_panel ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Front Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_front_door ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rear Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_rear_door ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Mirror:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_mirror ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass Front Quarter Panel:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pass_front_quarter_panel ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass Rear Quarter Panel:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pass_rear_quarter_panel ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Passenger Rear Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->passenger_rear_door ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Passenger Mirror:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->passenger_mirror ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pref Pass Window:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pref_passenger_window ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pref Back Windshild:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pref_back_windshield ?? 'N/A')}} </p>
      </div>
   </div>
   @endif

   @if($CarData->PPFInstall_Detail->type=='RV' || $CarData->PPFInstall_Detail->type=='Trailer' || $CarData->PPFInstall_Detail->type=='Bus' )
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Front:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->front ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Front:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->front ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Rear:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->rear ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Front Section:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_front_section ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver MID Section:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_mid_section ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rear Section:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_rear_section ?? 'N/A')}} </p>
      </div>
   </div>
   @endif

   @if($CarData->PPFInstall_Detail->type=='Car')

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Truck:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->trunk ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pref Driver Window:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pref_driver_window ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass A Pillar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pass_a_piller ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass B Pillar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pass_b_piller ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass C Pillar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->pass_c_piller ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Passenger Rocker Panel:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->passenger_rocker_panel ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Taligate:</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->tailgate ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver A Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_a_piller ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver B Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_b_piller ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver C Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_c_piller ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rocker Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->driver_rocker_panel ?? 'N/A')}} </p>
      </div>
   </div>
   @endif

   @if($CarData->type !='Other')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Wrap Color:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->wrap_color ?? 'N/A')}} </p>
      </div>
   </div>
   @endif


   @if($CarData->type=='Van')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Back Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->back_door ?? 'N/A')}} </p>
      </div>
   </div>
   @endif


   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Warranty:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->is_waranty)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Warranty Company:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->waranty_company ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Wrap Brand:</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->wrap_brand ?? 'N/A') }} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Wrap Brand:</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->PPFInstall_Detail->wrap_brand ?? 'N/A') }} </p>
      </div>
   </div>

</div>

<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData->PPFInstall_Detail && $CarData->PPFInstall_Detail->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->PPFInstall_Detail->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif

   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData->PPFInstall_Detail && $CarData->PPFInstall_Detail->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->PPFInstall_Detail->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>

@endif
@endif
{{-- end PPF service --}}

{{-- Vinly service --}}

@if($serviceId==37)
@if($CarData)
<div class="row border-bb">

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Type:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->type)}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Hood:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->hood ?? 'N/A' ?? 'N/A')}} </p>
      </div>
   </div>
   @if($CarData->type=='Car' || ($CarData->type=='Van'))
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Roof:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->roof ?? 'N/A')}} </p>
      </div>
   </div>
   @if($CarData->type=='Van')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Back Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->back_door ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   @if($CarData->type=='Car')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Truck:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->truck ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Hatch:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->hatch ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Front Bumper:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->front_bumper ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Rear Bumper:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->rear_bumper ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   @if($CarData->type=='RV' || $CarData->type=='Trailer' )
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Front:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->front ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Rear:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->rear ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Front Section:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->full_driver_front_section ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver MID Section:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->full_driver_mid_section ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rear Section:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->full_driver_rear_section ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Roof:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->roof ?? 'N/A')}} </p>
      </div>
   </div>

   @endif
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Wrap Brand:</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->wrap_brand ?? 'N/A') }} </p>
      </div>
   </div>
   @if($CarData->type=='Car')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Wrap Color:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->wrap_color ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Warranty:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->warranty)}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Warranty Company:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->warranty_company ?? 'N/A')}} </p>
      </div>
   </div>
   @if($CarData->type=='Car' || ($CarData->type=='Van'))
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Front Quarter:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_front_quarter ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rear Quarter:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_rear_quarter ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Front Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_front_door ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rear Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_rear_door ?? 'N/A')}} </p>
      </div>
   </div>
   @if($CarData->type=='Car')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver A Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_a_pilar ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver B Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_b_pilar ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver C Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_c_pilar ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Rocker Pilar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_rocker_pilar ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Driver Mirror:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->driver_mirror ?? 'N/A')}} </p>
      </div>
   </div>
   @if($CarData->type=='Car')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pref Driver Window:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pref_driver_window ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass Front Quarter Panel:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pass_front_quarter_panel ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass Rear Quarter Panel:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pass_rear_quarter_panel ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Passenger Rear Door:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->passenger_rear_door ?? 'N/A')}} </p>
      </div>
   </div>
   @if($CarData->type=='Car')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass A Pillar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pass_a_pillar ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass B Pillar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pass_b_pillar ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pass C Pillar:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pass_c_pillar ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Passenger Rocker Panel:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->passenger_rocker_panel ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Passenger Mirror:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->passenger_mirror ?? 'N/A')}} </p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pref Pass Window:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pref_pass_window ?? 'N/A')}} </p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Pref Back Windshild:</p>
      </div>
   </div>
   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->pref_back_windshild ?? 'N/A')}} </p>
      </div>
   </div>
   @if($CarData->type=='Car')
   <div class="col-6 col-md-6">
      <div class="services-details text-right">
         <p>Taligate:</p>
      </div>
   </div>

   <div class="col-6 col-md-6">
      <div class="services-details" style="word-break: break-all;">
         <p>{{ucwords($CarData->taligate ?? 'N/A')}} </p>
      </div>
   </div>
   @endif
   @endif
</div>



<div class="service-desc-content border-bb">
   <h4>PHOTOS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme photos-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value);
         error_reporting(0); ?>
         @if( trim($chkextension[5]) !='pdf' && trim($chkextension[5]) !='docx' && trim($chkextension[5]) !='doc')

         <div class="item">
            <div class="slider-img lightbox" id="{{ $value}}">
               <img src="{{ $value}}">
               <span class="plus-overlay ">

                  <img src="{{ asset('/assets/images/plus.png') }}">
               </span>
            </div>
         </div>
         @endif
         @endforeach

      </div>
      @endif
   </div>
</div>
<div class="service-desc-content border-bb">
   <h4>DOCUMENTS</h4>
   <div class="cmn-slider-wrap">
      @if($CarData && $CarData->document)
      <div class="owl-carousel owl-theme document-slider">
         @foreach(explode(',',$CarData->document) as $key=>$value)
         <?php $chkextension = explode('.', $value); ?>
         @if( trim($chkextension[5]) =='pdf')

         <div class="item">
            <a href="{{ $value}}" target="_blank">
               <div class="slider-img" id="{{ $value}}" style="background:none">
                  <img src="/assets/images/pdf.png">
                  <span class="plus-overlay ">

                     <img src="{{ asset('/assets/images/plus.png') }}">

                  </span>
            </a>
         </div>
      </div>
      @endif
      @endforeach
   </div>
   @endif
</div>
</div>
@endif
@endif
{{-- end Vinly service --}}

<div class="text-center">
   @if($mynxtservice !="")
   <?php $ids = 0; ?>
   <a href="/account-settings/vin-dashboard-service/{{base64_encode($car->id.'%%%'.$mynxtservice.'%%%'.$nextservice.'%%%'.$ids)}}" class="btn btn--accent nxt-service-btn">NEXT SERVICE RECORD </a>
   @else
   <a href="{{route('account-settings.index',['vindashboard',$car->id])}}" class="btn btn--accent nxt-service-btn">Back Menu</a>
   @endif

   {{-- <button class="btn btn--accent nxt-service-btn" type="submit"> NEXT SERVICE RECORD </button> --}}
</div>
</div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
<script>
   $(document).ready(function() {
      function loopNext() {
         $('.sliderWrapper').stop().animate({
            scrollLeft: '+=20'
         }, 'fast', 'linear', loopNext);
      }

      function loopPrev() {
         $('.sliderWrapper').stop().animate({
            scrollLeft: '-=20'
         }, 'fast', 'linear', loopPrev);
      }

      function stop() {
         $('.sliderWrapper').stop();
      }


      $('#next').hover(function() {
         loopNext();
      }, function() {
         stop();
      });

      $('#prev').hover(function() {
         loopPrev();
      }, function() {
         stop();
      });
   })
   $('#imageSlider').on('mousewheel DOMMouseScroll', function(e) {
      var scrollTo = null;
      if (e.type == 'mousewheel') {
         scrollTo = (e.originalEvent.wheelDelta * -1);
      } else if (e.type == 'DOMMouseScroll') {
         scrollTo = 40 * e.originalEvent.detail;
      }

      if (scrollTo) {
         e.preventDefault();
         $(this).scrollTop(scrollTo + $(this).scrollTop());
      }
      if (typeof e.originalEvent.detail == 'number' && e.originalEvent.detail !== 0) {

         if (e.originalEvent.detail > 0) {
            $('.sliderWrapper').stop().animate({
               scrollLeft: '+=20'
            }, 'fast', 'linear');
         } else if (e.originalEvent.detail < 0) {
            console.log('Up');
            $('.sliderWrapper').stop().animate({
               scrollLeft: '-=20'
            }, 'fast', 'linear');
         }
      } else if (typeof e.originalEvent.wheelDelta == 'number') {
         if (e.originalEvent.wheelDelta < 0) {
            $('.sliderWrapper').stop().animate({
               scrollLeft: '+=20'
            }, 'fast', 'linear');
         } else if (e.originalEvent.wheelDelta > 0) {
            console.log('Up');
            $('.sliderWrapper').stop().animate({
               scrollLeft: '-=20'
            }, 'fast', 'linear');
         }
      }

   });
</script>
<script>
   $('.photos-slider').owlCarousel({
      loop: false,
      margin: 10,
      nav: true,
      dots: false,
      navText: [
         '<img src="/assets/images/caret-prev.png">',
         '<img src="/assets/images/caret-next.png">'
      ],
      responsive: {
         0: {
            items: 1
         },
         600: {
            items: 3
         },
         1000: {
            items: 3
         }
      }
   })
</script>
<script>
   $('.document-slider').owlCarousel({
      loop: false,
      margin: 10,
      nav: true,
      dots: false,
      navText: [
         '<img src="/assets/images/caret-prev.png">',
         '<img src="/assets/images/caret-next.png">'
      ],
      responsive: {
         0: {
            items: 2
         },
         600: {
            items: 4
         },
         1000: {
            items: 8
         }
      }
   })
</script>
<script>
   $(document).ready(function() {
      "use strict";
      //  $(".lightbox").click(function () {
      //      var imgsrc = $(this).attr('src');
      //      $("body").append("<div class='img-popup'><span class='close-lightbox'>&times;</span><img src='" + imgsrc + "'></div>");
      //      $(".close-lightbox, .img-popup").click(function () {
      //          $(".img-popup").fadeOut(500, function () {
      //              $(this).remove();
      //          }).addClass("lightboxfadeout");
      //      });

      //  });

      $(".lightbox").click(function() {

         var imgsrc = this.id;
         $("body").append("<div class='img-popup'><span class='close-lightbox'>&times;</span><img src='" + imgsrc + "'></div>");
         $(".close-lightbox, .img-popup").click(function() {
            $(".img-popup").fadeOut(500, function() {
               $(this).remove();
            }).addClass("lightboxfadeout");
         });

      });
      //  $(".plusicon").click(function () {
      //      $(".img-popup").fadeIn(500);
      //  });
      $(".lightbox").click(function() {
         $(".img-popup").fadeIn(500);
      });

   });


   var $ul = $("ul");
   var ulWidth = 0;
   $("li").each(function() {
      ulWidth = ulWidth + $(this).width()
   });
   var add_css = ulWidth;
   $('head').append('<style>#sliderWrapper:after{width:' + add_css + 'px !important;}</style>');
</script>
</div>
</div>
</div>
</div>
</main>
<script src="{{ asset('/assets/js/home.js') }}" type="text/javascript"></script>
@endsection