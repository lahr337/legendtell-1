<?php

use App\Http\Controllers\CommonController;

$UserInfo = App\Http\Controllers\CommonController::getUserInfo(1);
?>

<div class="account-settings__content account-settings__content-history-wr {{ $tab == 'vindashboard' ? 'account-settings__content--active' : '' }}" id="vindashboard">
   <link href="{{ asset('/assets/css/web_service.css') }}" rel="stylesheet" type="text/css" />
   @if($car)
   @if(count($SelectServices)>0)
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
            </div>
            <div class="col-12 col-md-6">
               <ul class="desc-wrap">
                  <li class="cmn-serve-title primary-red">{{ $car->vin ?? ''}} </li>
                  <li class="cmn-serve-title">{{ $car->year ?? '2021'}}</li>
                  <li class="cmn-serve-title">{{ $car->make ?? ''}}</li>
                  <li class="cmn-serve-title">{{ $car->model ?? '2021'}}</li>
                  <li class="cmn-serve-title">@if($car->color){{ $car->color ?? ''}} @endif</li>
                  <li class="cmn-serve-title">@if($car->milage){{ $car->milage ?? ''}} Mileage @endif</li>

               </ul>
            </div>
         </div>
         <div class="row mt-5">
            <div class="col-6 col-md-6">
               <div class="services-details text-right">
                  <p>Most recent service:</p>
               </div>
            </div>
            <div class="col-6 col-md-6">
               <div class="services-details">
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
                  ?>
                  <p>{{ $servicenamenew}}</p>

               </div>
            </div>
            <div class="col-6 col-md-6">
               <div class="services-details text-right">
                  <p>Serviced by:</p>
               </div>
            </div>
            <div class="col-6 col-md-6">
               <div class="services-details ">
                  <p>{{ucwords($CarData->userData->shop_name)}}</p>
               </div>
            </div>
            <div class="col-6 col-md-6">
               <div class="services-details text-right">
                  <p>Date of service:</p>
               </div>
            </div>
            <div class="col-6 col-md-6">
               <div class="services-details ">
                  <p>{{date("m/d/Y", strtotime($car->service_date) ) ?? ''  }}</p>
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
      </div>
   </div>

   <div id="imageSlider">
      <div id="prev">
         <img src="{{ asset('/assets/images/caret-prev.png') }}">
      </div>
      <div id="next">
         <img src="{{ asset('/assets/images/caret-next.png') }}">
      </div>
      <div id="sliderWrapper" class="sliderWrapper">
         <ul class="slider-container">


            @if(count($service_data)>0)
            @foreach($service_data as $carslide)
            @if($carslide)
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
            $chkarrlength = 0;
            ?>
            <li>
               <div class="shop-content-wrap">
                  <a href="/account-settings/vin-dashboard-service/{{base64_encode($carslide->car_id.'%%%'.$carslide->service_id.'%%%'.$chkarrlength.'%%%'.$id)}}">
                     <div class="shop-logo">

                        <img src="{{$carslide->shop_user->avatar ? $carslide->shop_user->avatar : '/shop_photo.png' }}">
                     </div>
                  </a>
                  <ul class="shop-content">
                     <li>{{ucwords($carslide->shop_user->shop_name)}}</li>
                     <li class="primary-red">{{date("m/d/Y", strtotime($carslide->created_at)) }}</li>
                     <li>@if($carslide->shop_service){{ucwords($carslide->shop_service->service_name)}}@endif</li>
                  </ul>
               </div>
            </li>
            @endif
            @endforeach
            @endif

         </ul>
      </div>
   </div>
   <div>

      <div class="row">

         <?php
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
         @if(count($dataService)>0)
         <?php
         $newarr = sort($arr);
         ?>
         {{-- new code sarv --}}
         @foreach($shopAllServices as $carService)
         <?php



         $servicename = App\Http\Controllers\CommonController::getServiceName($carService->service_id);

         $servicedate = App\Http\Controllers\CommonController::latest_services($carService['service_name'], $car->id, $carService->service_id);

         ?>
         <div class="col-12 col-md-6 col-lg-4">
            <div class="services-wrap">
               <div class="img-wrap">
                  <img src="{{asset('/assets/images/services/').'/'.$carService['service_photo']}}">

               </div>
               <h4><a href="">{{ucwords($carService['service_name'])}}</a></h4>

               <p class="rcnt-date">recent service date</p>
               <?php
               $nextservice = "";
               if (!empty($arr[$carService->service_id + 1])) {
                  $nextservice = $arr[$carService->service_id + 1];
               }
               ?>

               @if(in_array($carService->service_id ,$arr))


               <p class="product-date">@if(!empty($servicedate))@if(!empty($servicedate->created_at)) {{date("m/d/Y", strtotime($servicedate->created_at))}} @endif @endif</p>
               <?php  //echo "<pre>"; print_r($carService->service_id); echo "<pre>"; print_r($last_key); 
               $ids = 0;
               ?>
               @if($carService->service_id==$last_key)
               <a href="/account-settings/vin-dashboard-service/{{base64_encode($car->id.'%%%'.$carService->service_id.'%%%'.$chkarrlength.'%%%'.$ids)}}" class="service-btn new-service-btn">New Service</a>
               @else
               <a href="/account-settings/vin-dashboard-service/{{base64_encode($car->id.'%%%'.$carService->service_id.'%%%'.$chkarrlength.'%%%'.$ids)}}" class="service-btn">View Service </a>
               @endif
               <?php $chkarrlength++; ?>
               @else
               <p class="product-date" style="color:red">None </p>
               <a href="#" class="service-btn no-service-btn">NO Service</a>
               @endif

            </div>
         </div>
         @endforeach

         @endif

      </div>
   </div>
   @else
<span class="service-history__text" style="padding-right: 800;">No service history are available at this time</span>
@endif
   @endif
</div>

<script>
   $(document).ready(function() {
      // var owl = $('.owl-carousel');

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

   var $ul = $("ul");

   var ulWidth = 0;
   $("li").each(function() {
      ulWidth = ulWidth + $(this).width()
   });
   var add_css = ulWidth;
   $('head').append('<style>#sliderWrapper:after{width:' + add_css + 'px !important;}</style>');
</script>