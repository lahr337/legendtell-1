<?php
   // phpinfo();
   // die('php info');
   // use Imagick;
?>
@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr new_form view_vin_page view_oil_service">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="SaveOilData">
                  <div class="oil-service cmn-right-label form-box border-none">
                     <diV class="">
                        @csrf
                        <?php
                           // echo"<pre>";
                           
                           // print_r($VInGet[0]->year);
                           // print_r($VInGet->year);
                           // die('checkCarData');
                        ?>

                        <input type="hidden" id="servicedata" name="carShopService" value="@if(!empty($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                        <div class="form-group">
                           <div class="col-md-12 col-12 text-center">
                              <h1 class="red">OIL SERVICE HISTORY TIMELINE</h1>
                           </div>
                        </div>
                        <div class="oil-info ">

                          <!-- code live site -->

                        <div class="row d-flex align-items-center">
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
                              <h2 class="red">{{$car->vin ?? ''}}</h2>
                              <h2 class="text-green">{{ $car->year ?? ''}}</h2>
                              <h2 class="text-green">{{ $car->make}}</h2>
                              <h2 class="text-green">{{ $car->model ?? ''}}</h2>
                              <h2 class="text-green">@if($car->milage){{ $car->milage ?? ''}} Mileage @endif</h2>
                              <h2 class="text-green">@if($car->color){{ $car->color ?? ''}} @endif</h2>
                           </div>
                        </div>

                        <div class="form-box border-bb Vin_info mt-4">
                           <div class="row d-flex align-items-center">

                              <div class="col-6 col-md-6">
                                 <div class="product-desc services-details text-right">
                                    <h2 class="p-0">Service:</h2>
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
                                    <h2 class="text-green">{{isset($latest_services['shop_service'])?$latest_services['shop_service']['service_name']:""}}</h2>
                                 </div>
                              </div>
                           </div>

                           

                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6 mt-4">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">Serviced by:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 mt-4">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($latest_services)?ucwords($latest_services->shop_user->shop_name):""}}</h3>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">Shop phone number:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($latest_services)?$latest_services->shop_user->contact_number:""}}</h3>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">Shop Email:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($latest_services)?$latest_services->shop_user->email:""}}</h3>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6 my-4">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">Date of service:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6 my-4">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($latest_services)?date("m/d/Y", strtotime($latest_services->created_at)):"" }}</h3>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center mb-4">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0 red">Upcoming recommended service:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="red">None</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-box row border-bb mt-4">
                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">General Repair:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($CarData->car_issue->repair_info)?$CarData->car_issue->repair_info:""}}</h3>
                                 </div>
                              </div>
                           </div>
                           
                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">Known Issue:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($CarData->car_issue->known_issue)?$CarData->car_issue->known_issue:""}}</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">Manufacturer Recall:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($CarData->car_issue->recall_issue)?$CarData->car_issue->recall_issue:""}}</h3>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">New Install:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($CarData->car_issue->install_info)?$CarData->car_issue->install_info:""}}</h3>
                                 </div>
                              </div>
                           </div>

                           <div class="row d-flex align-items-center">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">New Issue:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($CarData->car_issue->diagnosis)?$CarData->car_issue->diagnosis:""}}</h3>
                                 </div>
                              </div>
                           </div>


                           <div class="row d-flex align-items-center mb-4">
                              <div class="col-6 col-md-6">
                                 <div class="services-details text-right">
                                    <h3 class="p-0">Regular Servicing:</h3>
                                 </div>
                              </div>
                              <div class="col-6 col-md-6">
                                 <div class="services-details">
                                    <h3 class="text-green">{{isset($$CarData->car_issue->servicing_issue)?$CarData->car_issue->servicing_issue:""}}</h3>
                                 </div>
                              </div>
                           </div>



                        </div>                                                  
                          
                           
                           
                        </div>

                        

                        <div class="form-box oil-info">
                          
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-6 col-12">
                                    <h3 class="p-0">OIL TYPE:</h3>
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <h3 class="text-green">@if($serviceData){{$serviceData->oil_mileage}}@endif </h3>

                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-6 col-12">
                                    <h3 class="p-0">OIL BRAND:</h3>
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <h3 class="text-green">@if($serviceData){{$serviceData->oil_brand}}@endif</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-6 col-12">
                                    <h3 class="p-0">AMOUNT ADDED:</h3>
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <h3 class="text-green">@if($serviceData){{$serviceData->oil_amount_added}}@endif</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-6 col-12">
                                    <h3 class="p-0">FILTER PART NUMBER:</h3>
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <h3 class="text-green">@if($serviceData){{$serviceData->oil_filter_type}}@endif</h3>
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-6 col-12">
                                    <h3 class="p-0">FILTER BRAND:</h3>
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <h3 class="text-green">@if($serviceData){{$serviceData->oil_filter_brand}}@endif</h3>
                                 </div>
                              </div>
                           </div>
                           @if($serviceData)
                           <?php
                           $trimmed_array = array_map('trim', explode(', ', $serviceData->oil_fluid_service));

                           ?>
                           @endif
                           <div class="form-group">
                              <div class="row d-flex">
                                 <div class="col-md-6 col-12">
                                    <h3 class="p-0">FLUID SERVICE:</h3>
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <ul class="display-block">
                                       <li><h3 class="text-green">@if($serviceData) @if(in_array('WINDSHIELD', $trimmed_array))WINDSHIELD WASHER,@endif @endif</h3></li>
                                       <li><h3 class="text-green">@if($serviceData) @if(in_array('COOLANT', $trimmed_array))COOLANT,@endif @endif</h3></li>
                                       <li><h3 class="text-green">@if($serviceData) @if(in_array('TRANSMISSION', $trimmed_array))TRANSMISSION FLUID,@endif @endif</h3></li>
                                       <li><h3 class="text-green">@if($serviceData) @if(in_array('BRAKE FLUID', $trimmed_array))BRAKE FLUID,@endif @endif</h3></li>
                                       <li><h3 class="text-green">@if($serviceData) @if(in_array('POWER', $trimmed_array)) POWER STEERING @endif @endif</h3></li>
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
                                    <h3 class="text-green">@if($serviceData) @if($serviceData->oil_pan_removed=='Yes') Yes @else NO @endif @endif</h3>
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
                                    <h3 class="text-green">@if($serviceData) @if($serviceData->oil_pan_gaskit=='Yes') Yes @else NO @endif @endif</h3>
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
                                    <h3 class="text-green">@if($serviceData) @if($serviceData->oil_pan_nut=='Yes') Yes @else NO @endif @endif</h3>
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
                                    <h3 class="text-green">@if($serviceData) @if($serviceData->crush_washer=='Yes') Yes @else NO @endif @endif</h3>
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
                                    <h3 class="text-green">@if($serviceData) @if($serviceData->rubber_o_rings=='Yes') Yes @else NO @endif @endif</h3>
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
                     </div>
                     <!-- .................... -->

                     @if($serviceDataCustom)
                     <div class="w-100 ">
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
                                          <img class="imgshow" src="..{{$oil_change_mileage0}}" alt="">
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
                                                   <div class="carousel-item <?php if($key == 1){echo 'active';}?>">
                                                      <img src="..{{$value}}" class="d-block w-100" alt="...">
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
                                                   <div class="carousel-item <?php if($key == 0){echo 'active';}?>">
                                                      <img src="..{{$value}}" class="d-block w-100" alt="...">
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
                                                      <div class="carousel-item <?php if($key == 0){echo 'active';}?>">
                                                         <img src="..{{$value}}" class="d-block w-100" alt="...">
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
                                          <img class="imgshow" src="..{{$oil_in_out0}}" alt="">
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
                                          <img class="imgshow" src="..{{$oil_in_out1}}" alt="">
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
                                                      <div class="carousel-item <?php if($key == 0){echo 'active';}?>">
                                                         <img src="..{{$value}}" class="d-block w-100" alt="...">
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
                                          <img class="imgshow" src="..{{$torque_specs4}}" alt="">
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
                                                   <div class="carousel-item <?php if($key == 0){echo 'active';}?>">
                                                      <img src="..{{$value}}" class="d-block w-100" alt="...">
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
                                          <img class="imgshow" src="..{{$oil_collected_for_analysis ?? ''}}" alt="">
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
                                       $value='';
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
                                                      <li data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$key}}"><iframe class="pdf_image" width="100%" height="141px" name="plugin" src="../{{$value}}" scrolling="no" page="1" type="application/pdf"></iframe>
                                                      <div class="pdf_overlay"> +</div>
                                                      </li>
                                                      @else
                                                      <li data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$key}}"><iframe class="pdf_image" width="100%" height="141px" name="plugin" src="../{{$value}}" scrolling="no" page="1" type="application/pdf"></iframe>
                                                      <div class="pdf_overlay"> +</div>
                                                      </li>
                                                      <!-- <li id="{{$key}}"><span><button type='button' class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="{{$key}}">&nbsp;</button><img id="{{$key}}" src="../assets/images/jpg.png" class="imgshow position-absolute"></span></li> -->
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
                     <a class="cmn-btn btn white n-hover" href="../shop-settings/mydashboard"> back</a>
                  </div>
               </form>
            </div>
         </div>
         <div style="width:33%"></div>
         <!-- @include('shop-settings.partials.rightvinnumber') -->
      </div>
   </div>
</div>
</main>
@endsection


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered custom-modal">
    <div class="modal-content modal-content-custom">
      <div class="modal-body">
          <embed width="100%" height="800px" name="plugin" src="../{{$value ?? ''}}" type="application/pdf">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>