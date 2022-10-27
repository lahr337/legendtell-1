@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr new_form">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="SaveOilData">
                  <div class="oil-service cmn-right-label form-box">
                     <diV class="cmn-mx-75">
                        @csrf
                        <input type="hidden" id="servicedata" name="carShopService" value="@if(!empty($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                        <div class="form-box">
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">MILEAGE:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_mileage" name="oil_mileage" style="height:35px" value="@if($serviceData){{$serviceData->oil_mileage}}@endif">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">OIL TYPE:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_type" name="oil_type" style="height:35px" value="@if($serviceData){{$serviceData->oil_type}}@endif">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">OIL BRAND:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_brand" name="oil_brand" style="height:35px" value="@if($serviceData){{$serviceData->oil_brand}}@endif">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">AMOUNT ADDED:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_amount_added" name="oil_amount_added" style="height:35px" value="@if($serviceData){{$serviceData->oil_amount_added}}@endif">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">FILTER PART NUMBER:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_filter_type" name="oil_filter_type" style="height:35px" value="@if($serviceData){{$serviceData->oil_filter_type}}@endif">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">FILTER BRAND:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_filter_brand" name="oil_filter_brand" style="height:35px" value="@if($serviceData){{$serviceData->oil_filter_brand}}@endif">
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
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">FLUID SERVICE:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check" name="oil_fluid_service" value="WINDSHIELD" id="checkbox1" autocomplete="off" @if($serviceData) @if(in_array('WINDSHIELD', $trimmed_array)) checked @endif @endif>
                                          <label for="checkbox1" class="text-center">WINDSHIELD <br> WASHER</label>
                                       </div>
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check" name="oil_fluid_service" value="COOLANT" id="checkbox2" autocomplete="off" @if($serviceData) @if(in_array('COOLANT', $trimmed_array)) checked @endif @endif>
                                          <label for="checkbox2" class="text-center">COOLANT</label>
                                       </div>
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check" name="oil_fluid_service" id="checkbox3" value="TRANSMISSION" autocomplete="off" @if($serviceData) @if(in_array('TRANSMISSION', $trimmed_array)) checked @endif @endif>
                                          <label for="checkbox3" class="text-center">TRANSMISSION <br> FLUID </label>
                                       </div>

                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check" name="oil_fluid_service" id="checkbox4" value="BRAKE FLUID" autocomplete="off" @if($serviceData) @if(in_array('BRAKE FLUID', $trimmed_array)) checked @endif @endif>
                                          <label for="checkbox4" class="text-center">BRAKE FLUID</label>
                                       </div>
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check" name="oil_fluid_service" value="POWER" id="checkbox5" autocomplete="off" @if($serviceData) @if(in_array('POWER', $trimmed_array)) checked @endif @endif>
                                          <label for="checkbox5" class="text-center">POWER <br> STEERING</label>
                                       </div>

                                    </div>
                                    <span class="newerrr" style="color:red;display:none">Please select fluid serivces</span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>

                     <diV class="cmn-mx-90">

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">OIL PAN REMOVED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_pan_removed" value="Yes" id="btnradio30" autocomplete="off" @if($serviceData) @if($serviceData->oil_pan_removed=='Yes') checked @endif @endif >
                                       <label for="btnradio30">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_pan_removed" value="No" id="btnradio31" autocomplete="off" @if($serviceData) @if($serviceData->oil_pan_removed=='No') checked @endif @else checked @endif>
                                       <label for="btnradio31">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <?php
                                 // echo"<pre>";
                                 // print_r($serviceDataCustom);
                                 // if(isset($serviceDataCustom)){
                                 //    echo"isset again done";
                                 // }
                                 // if($serviceDataCustom){
                                 //    echo"If done done";
                                 // }
                                 // die('stop');
                              ?>
                              @php
                                 $serviceDataCustom=isset($serviceDataCustom) ? $serviceDataCustom : '';
                              @endphp

                              <div class="col-md-3 col-12">
                                 <label class="p-0">OIL PAN PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="oil_pan_part_number" name="oil_pan_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->oil_pan_part_number}}@endif">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">OIL PAN GASKET REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" value="Yes" name="oil_pan_gaskit" id="btnradio110" autocomplete="off" @if($serviceData) @if($serviceData->oil_pan_gaskit=='Yes') checked @endif @endif>
                                       <label for="btnradio110">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" value="No" name="oil_pan_gaskit" id="btnradio111" autocomplete="off" @if($serviceData) @if($serviceData->oil_pan_gaskit=='No') checked @endif @else checked @endif>
                                       <label for="btnradio111">NO</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3 col-12">
                                 <label class="p-0">GASKET PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="gasket_part_number" name="gasket_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->gasket_part_number}}@endif">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">DRAIN PLUG REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_pan_nut" id="btnradio112" autocomplete="off" value="Yes" @if($serviceData) @if($serviceData->oil_pan_nut=='Yes') checked @endif @endif>
                                       <label for="btnradio112">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_pan_nut" id="btnradio113" autocomplete="off" value="No" @if($serviceData) @if($serviceData->oil_pan_nut=='No') checked @endif @else checked @endif>
                                       <label for="btnradio113">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">DRAIN PLUG PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="drain_plug_part_number" name="drain_plug_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->drain_plug_part_number}}@endif">
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">CRUSH WASHER REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="crush_washer" id="btnradio114" autocomplete="off" value="Yes" @if($serviceDataCustom) @if($serviceDataCustom->crush_washer=='Yes') checked @endif @endif>
                                       <label for="btnradio114">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="crush_washer" id="btnradio115" autocomplete="off" value="No" @if($serviceDataCustom) @if($serviceDataCustom->crush_washer=='No') checked @endif @else checked @endif>
                                       <label for="btnradio115">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">CRUSH WASHER PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="crush_washer_part_number" name="crush_washer_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->crush_washer_part_number}}@endif">
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">RUBBER O-RINGS REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="rubber_o_rings" id="btnradio116" autocomplete="off" value="Yes" @if($serviceDataCustom) @if($serviceDataCustom->rubber_o_rings=='Yes') checked @endif @endif>
                                       <label for="btnradio116">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="rubber_o_rings" id="btnradio117" autocomplete="off" value="No" @if($serviceDataCustom) @if($serviceDataCustom->rubber_o_rings=='No') checked @endif @else checked @endif>
                                       <label for="btnradio117">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">RUBBER O-RINGS PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="rubber_o_rings_part_number" name="rubber_o_rings_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->rubber_o_rings_part_number}}@endif">
                              </div>

                           </div>
                        </div>
                           <!-- new chnages start........................ -->
                         

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINES SERVICED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_lines_serviced" id="btnradio118" autocomplete="off" value="Yes" @if($serviceDataCustom) @if($serviceDataCustom->oil_lines_serviced=='Yes') checked @endif @endif>
                                       <label for="btnradio118">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_lines_serviced" id="btnradio119" autocomplete="off" value="No" @if($serviceDataCustom) @if($serviceDataCustom->oil_lines_serviced=='No') checked @endif @else checked @endif>
                                       <label for="btnradio119">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <!-- <label class="p-0">Turbo oil line part number</label> -->
                              </div>
                              <div class="col-md-3 col-12">
                                 <!-- <input class="form-control border-0 " type="text" id="rubber_o_rings_part_number" name="rubber_o_rings_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->rubber_o_rings_part_number}}@endif"> -->
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINES REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_lines_replaced" id="btnradio120" autocomplete="off" value="Yes" @if($serviceDataCustom) @if($serviceDataCustom->oil_lines_replaced=='Yes') checked @endif @endif>
                                       <label for="btnradio120">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="oil_lines_replaced" id="btnradio121" autocomplete="off" value="No" @if($serviceDataCustom) @if($serviceDataCustom->oil_lines_replaced=='No') checked @endif @else checked @endif>
                                       <label for="btnradio121">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="turbo_oil_line_part_number" name="turbo_oil_line_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->turbo_oil_line_part_number}}@endif">
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE BOLTS REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="line_bolts_replaced" id="btnradio122" autocomplete="off" value="Yes" @if($serviceDataCustom) @if($serviceDataCustom->line_bolts_replaced=='Yes') checked @endif @endif>
                                       <label for="btnradio122">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="line_bolts_replaced" id="btnradio123" autocomplete="off" value="No" @if($serviceDataCustom) @if($serviceDataCustom->line_bolts_replaced=='No') checked @endif @else checked @endif>
                                       <label for="btnradio123">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE BOLT PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="turbo_oil_line_bolt_part_number" name="turbo_oil_line_bolt_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->turbo_oil_line_bolt_part_number}}@endif">
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE O-RINGS/CRUSH WASHERS REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="rings_crush_washer_replaced" id="btnradio124" autocomplete="off" value="Yes" @if($serviceDataCustom) @if($serviceDataCustom->rings_crush_washer_replaced=='Yes') checked @endif @endif>
                                       <label for="btnradio124">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check" name="rings_crush_washer_replaced" id="btnradio125" autocomplete="off" value="No" @if($serviceDataCustom) @if($serviceDataCustom->rings_crush_washer_replaced=='No') checked @endif @else checked @endif>
                                       <label for="btnradio125">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE O-RINGS/CRUSH WASHERS PART NUMBERS</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 " type="text" id="rings_crush_washer_part_number" name="rings_crush_washer_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->rings_crush_washer_part_number}}@endif">
                              </div>

                           </div>
                        </div>

                        

                     </diV>



                     

                     <div class="form-box w-100 ">
                        <div class="form-group">
                           <div class="upload-wrap images_section">
                              <div class="row d-flex align-items-center">
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL CHNAGE MILEAGE:</label>
                                    </div>

                                    @if($serviceDataCustom)
                                       <?php
                                          $oil_change_mileage = explode(', ', $serviceDataCustom->oil_change_mileage);   
                                      ?>
                                     @endif
                                    
                                    



                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="btn-check_custom" name="oil_change_mileage[]">
                                       @php
                                          $oil_change_mileage0 = !empty($oil_change_mileage[0]) ? $oil_change_mileage[0] : "" ;
                                       @endphp
                                       <img class="imgshow" src="..{{$oil_change_mileage0}}" alt="">
                                       <input type="hidden" name="oil_change_mileage[]" value="{{$oil_change_mileage0}}"></input>
                                       <div class="overlay_image">+</div>
                                       <label class="text-center">UPLOAD <br> IMAGE</label>
                                    </div>
                                 </div>
                                 <div class="col-md-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">NEW PARTS:</label>
                                    </div>
                                    <div class="btn-group btn-group flex-row fluid-service_custom" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_change_mileage[]">
                                          @php
                                             $oil_change_mileage1 = !empty($oil_change_mileage[1]) ? $oil_change_mileage[1] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_change_mileage1}}" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value="{{$oil_change_mileage1}}"></input>

                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_change_mileage[]">
                                          @php
                                             $oil_change_mileage2 = !empty($oil_change_mileage[2]) ? $oil_change_mileage[2] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_change_mileage2}}" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value="{{$oil_change_mileage2}}"></input>

                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_change_mileage[]">
                                          @php
                                             $oil_change_mileage3 = !empty($oil_change_mileage[3]) ? $oil_change_mileage[3] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_change_mileage3}}" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value="{{$oil_change_mileage3}}"></input>

                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_change_mileage[]">
                                          @php
                                             $oil_change_mileage4 = !empty($oil_change_mileage[4]) ? $oil_change_mileage[4] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_change_mileage4}}" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value="{{$oil_change_mileage4}}"></input>

                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        
                        <div class="form-group mbot-10">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12 label_wrap">
                                 <label class="p-0">NEW PARTS AND NOTES:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea id="" name="new_parts_notes" rows="6">@if($serviceDataCustom){{$serviceDataCustom->new_parts_notes}}@endif</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section medium">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-12 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">PRE INSPECTION PICTURES:</label>
                                    </div>

                                    @if($serviceDataCustom)
                                       <?php
                                          $pre_inspection = explode(', ', $serviceDataCustom->pre_inspection); 
                                       ?>
                                     @endif
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="pre_inspection[]">
                                          @php
                                             $pre_inspection0 = !empty($pre_inspection[0]) ? $pre_inspection[0] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$pre_inspection0}}" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value="{{$pre_inspection0}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="pre_inspection[]">
                                          @php
                                             $pre_inspection1 = !empty($pre_inspection[1]) ? $pre_inspection[1] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$pre_inspection1}}" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value="{{$pre_inspection1}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="pre_inspection[]">
                                          @php
                                             $pre_inspection2 = !empty($pre_inspection[2]) ? $pre_inspection[2] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$pre_inspection2}}" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value="{{$pre_inspection2}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="pre_inspection[]">
                                          @php
                                             $pre_inspection3 = !empty($pre_inspection[3]) ? $pre_inspection[3] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$pre_inspection3}}" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value="{{$pre_inspection3}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="pre_inspection[]">
                                          @php
                                             $pre_inspection4 = !empty($pre_inspection[4]) ? $pre_inspection[4] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$pre_inspection4}}" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value="{{$pre_inspection4}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="pre_inspection[]">
                                          @php
                                             $pre_inspection5 = !empty($pre_inspection[5]) ? $pre_inspection[5] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$pre_inspection5}}" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value="{{$pre_inspection5}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group mbot-10">
                           <div class="col-md-12 col-12 label_wrap">
                              <label class="p-0">PRE INSPECTION FINDINGS AND NOTES:</label>
                           </div>
                           <div class="col-md-12 col-12">
                              <textarea id="" rows="6" name="pre_inspection_notes">@if($serviceDataCustom){{$serviceDataCustom->pre_inspection_notes}}@endif</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section medium">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-12 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL FILTER AND PARTS INSPECTION:</label>
                                    </div>
                                    @if($serviceDataCustom)
                                       <?php
                                          $oil_filter_and_parts_inspection = explode(', ', $serviceDataCustom->oil_filter_and_parts_inspection);                                    
                                       ?>
                                     @endif
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          @php
                                             $oil_filter_and_parts_inspection0 = !empty($oil_filter_and_parts_inspection[0]) ? $oil_filter_and_parts_inspection[0] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_filter_and_parts_inspection0}}" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value="{{$oil_filter_and_parts_inspection0}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          @php
                                             $oil_filter_and_parts_inspection1 = !empty($oil_filter_and_parts_inspection[1]) ? $oil_filter_and_parts_inspection[1] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_filter_and_parts_inspection1}}" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value="{{$oil_filter_and_parts_inspection1}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div> 
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          @php
                                             $oil_filter_and_parts_inspection2 = !empty($oil_filter_and_parts_inspection[2]) ? $oil_filter_and_parts_inspection[2] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_filter_and_parts_inspection2}}" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value="{{$oil_filter_and_parts_inspection2}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          @php
                                             $oil_filter_and_parts_inspection3 = !empty($oil_filter_and_parts_inspection[3]) ? $oil_filter_and_parts_inspection[3] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_filter_and_parts_inspection3}}" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value="{{$oil_filter_and_parts_inspection3}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          @php
                                             $oil_filter_and_parts_inspection4 = !empty($oil_filter_and_parts_inspection[4]) ? $oil_filter_and_parts_inspection[4] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_filter_and_parts_inspection4}}" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value="{{$oil_filter_and_parts_inspection4}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          @php
                                             $oil_filter_and_parts_inspection5 = !empty($oil_filter_and_parts_inspection[5]) ? $oil_filter_and_parts_inspection[5] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$oil_filter_and_parts_inspection5}}" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value="{{$oil_filter_and_parts_inspection5}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group mbot-10">
                           <div class="col-md-12 col-12 label_wrap">
                              <label class="p-0">FILTER AND PARTS INSPECTION NOTES:</label>
                           </div>
                           <div class="col-md-12 col-12">
                              <textarea id="" name="filter_and_parts_notes" rows="6">@if($serviceDataCustom){{$serviceDataCustom->filter_and_parts_notes}}@endif</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section">
                              <div class="row d-flex align-items-center">
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL OUT:</label>
                                    </div>
                                    @if($serviceDataCustom)
                                       <?php
                                          $oil_in_out = explode(', ', $serviceDataCustom->oil_in_out);                                    
                                       ?>
                                     @endif
                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="btn-check_custom" name="oil_in_out[]">
                                          @php
                                             $oil_in_out0= !empty($oil_in_out[0]) ? $oil_in_out[0] : "" ;
                                          @endphp
                                       <img class="imgshow" src="..{{$oil_in_out0}}" alt="">
                                       <input type="hidden" name="oil_in_out[]" value="{{$oil_in_out0}}"></input>
                                       <div class="overlay_image">+</div>
                                       <label class="text-center">UPLOAD <br> IMAGE</label>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL IN:</label>
                                    </div>
                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="btn-check_custom" name="oil_in_out[]">
                                          @php
                                             $oil_in_out1 = !empty($oil_in_out[1]) ? $oil_in_out[1] : "" ;
                                          @endphp
                                       <img class="imgshow" src="..{{$oil_in_out1}}" alt="">
                                       <input type="hidden" name= "oil_in_out[]" value="{{$oil_in_out1}}"></input>
                                       <div class="overlay_image">+</div>
                                       <label class="text-center">UPLOAD <br> IMAGE</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group mbot-10">
                           <div class="row d-flex">
                              <div class="col-lg-6 col-12">
                                 <div class="col-md-12 col-12 label_wrap">
                                    <label class="p-0">OIL OUT NOTES:</label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <textarea id="" name="oil_out_notes" rows="3">@if($serviceDataCustom){{$serviceDataCustom->oil_out_notes}}@endif</textarea>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                 <div class="col-md-12 col-12 label_wrap">
                                    <label class="p-0">OIL IN NOTES:</label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <textarea id="" name="oil_in_notes" rows="3">@if($serviceDataCustom){{$serviceDataCustom->oil_in_notes}}@endif</textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">TORQUE SPECS:</label>
                                    </div>
                                    @if($serviceDataCustom)
                                       <?php
                                          $torque_specs = explode(', ', $serviceDataCustom->torque_specs);                                    
                                       ?>
                                     @endif
                                    <div class="btn-group btn-group flex-row fluid-service_custom" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="torque_specs[]">
                                          @php
                                             $torque_specs0 = !empty($torque_specs[0]) ? $torque_specs[0] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$torque_specs0}}" alt="">
                                          <input type="hidden" name="torque_specs[]" value="{{$torque_specs0}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="torque_specs[]">
                                          @php
                                             $torque_specs1 = !empty($torque_specs[1]) ? $torque_specs[1] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$torque_specs1}}" alt="">
                                          <input type="hidden" name="torque_specs[]" value="{{$torque_specs1}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="torque_specs[]">
                                          @php
                                             $torque_specs2 = !empty($torque_specs[2]) ? $torque_specs[2] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$torque_specs2}}" alt="">
                                          <input type="hidden" name="torque_specs[]" value="{{$torque_specs2}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="torque_specs[]">
                                          @php
                                             $torque_specs3 = !empty($torque_specs[3]) ? $torque_specs[3] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$torque_specs3}}" alt="">
                                          <input type="hidden" name="torque_specs[]" value="{{$torque_specs3}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL STATUS LEVEL:</label>
                                    </div>
                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="btn-check_custom" name="torque_specs[]">
                                       @php
                                          $torque_specs4 = !empty($torque_specs[4]) ? $torque_specs[4] : "" ;
                                       @endphp
                                       <img class="imgshow" src="..{{$torque_specs4}}" alt="">
                                       <input type="hidden" name="torque_specs[]" value="{{$torque_specs4}}"></input>
                                       <div class="overlay_image">+</div>
                                       <label class="text-center">UPLOAD <br> IMAGE</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group mbot-10">
                           <div class="row d-flex">
                              <div class="col-lg-6 col-12">
                                 <div class="col-md-12 col-12 label_wrap">
                                    <label class="p-0">TORQUE SPECS NOTES:</label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <textarea id="" name="torque_specs_notes" rows="3">@if($serviceDataCustom){{$serviceDataCustom->torque_specs_notes}}@endif</textarea>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                 <div class="col-md-12 col-12 label_wrap">
                                    <label class="p-0">OIL STATUS LEVEL NOTES:</label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <textarea id="" name="oil_status_level_notes" rows="3">@if($serviceDataCustom){{$serviceDataCustom->oil_status_level_notes}}@endif</textarea>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section medium">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-12 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">POST SERVICE INSPECTION:</label>
                                    </div>
                                    @if($serviceDataCustom)
                                       <?php
                                          $post_service_inspection = explode(', ', $serviceDataCustom->post_service_inspection);                                    
                                       ?>
                                     @endif
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="post_service_inspection[]">
                                          @php
                                             $post_service_inspection0 = !empty($post_service_inspection[0]) ? $post_service_inspection[0] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$post_service_inspection0}}" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value="{{$post_service_inspection0}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="post_service_inspection[]">
                                          @php
                                             $post_service_inspection1 = !empty($post_service_inspection[1]) ? $post_service_inspection[1] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$post_service_inspection1}}" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value="{{$post_service_inspection1}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="post_service_inspection[]">
                                          @php
                                             $post_service_inspection2 = !empty($post_service_inspection[2]) ? $post_service_inspection[2] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$post_service_inspection2}}" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value="{{$post_service_inspection2}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="post_service_inspection[]">
                                          @php
                                             $post_service_inspection3 = !empty($post_service_inspection[3]) ? $post_service_inspection[3] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$post_service_inspection3}}" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value="{{$post_service_inspection3}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="post_service_inspection[]">
                                          @php
                                             $post_service_inspection4 = !empty($post_service_inspection[4]) ? $post_service_inspection[4] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$post_service_inspection4}}" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value="{{$post_service_inspection4}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="btn-check_custom" name="post_service_inspection[]">
                                          @php
                                             $post_service_inspection5 = !empty($post_service_inspection[5]) ? $post_service_inspection[5] : "" ;
                                          @endphp
                                          <img class="imgshow" src="..{{$post_service_inspection5}}" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value="{{$post_service_inspection5}}"></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group mbot-10">
                           <div class="col-md-12 col-12 label_wrap">
                              <label class="p-0">POST SERVICE INSPECTION NOTES:</label>
                           </div>
                           <div class="col-md-12 col-12">
                              <textarea id="" name="post_service_inspection_notes" rows="6">@if($serviceDataCustom){{$serviceDataCustom->post_service_inspection_notes}}@endif</textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section">
                              <div class="row d-flex align-items-center">
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL COLLECTED FOR ANALYSIS:</label>
                                    </div>                                    
                                    

                                    @if($serviceDataCustom)
                                       <?php
                                       $oil_collected_for_analysis="";
                                          $oil_collected_for_analysis = !empty($serviceDataCustom->oil_collected_for_analysis) ? $serviceDataCustom->oil_collected_for_analysis : "" ;
                                       ?>
                                     @endif


                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="btn-check_custom" name="oil_collected_for_analysis">                  
                                       <img class="imgshow" src="..{{$oil_collected_for_analysis ?? ''}}" alt="">
                                       <input type="hidden" name="oil_collected_for_analysis" value="{{$oil_collected_for_analysis ?? ''}}"></input>
                                       <div class="overlay_image">+</div>
                                       <label class="text-center">UPLOAD <br> IMAGE</label>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL ANALYSIS REPORT:</label>
                                    </div>
                                    @if($serviceDataCustom)
                                       <?php
                                          $Oil_analysis_report = !empty($serviceDataCustom->Oil_analysis_report) ? $serviceDataCustom->Oil_analysis_report : "" ;
                                       ?>
                                     @endif
                                    <div class="form-box w-100 pdferrorwraper">
                                       <div class="images_section pdferror">
                                          <div class="row d-flex large_img align-items-center form-btnw-wrap documents_section">
                                             <div class="col-lg-4 col-12">
                                                <button class="btn uplaod">UPLOAD DOCUMENT
                                                   <input type="file" name="Oil_analysis_report" id="insert_image_uploaded" class="form-control image_uploaded_custom" value="Upload" accept=".xls,.pdf,.txt,.csv">
                                                   
                                                </button>
                                             </div>
                                             

                                             <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                                <ul>@if($serviceDataCustom && $serviceDataCustom->Oil_analysis_report)
                                             
                                                   @foreach(explode(',',$serviceDataCustom->Oil_analysis_report) as $key=>$value)
                                                   
                                                   <?php
                                                   
                                                   
                                                   
                                                   $chkextension= explode('.',$value);
                                                   // echo"<pre>";
                                                   // print_r($chkextension);
                                                   // die('chkextension');
                                                   
                                                   ?>
                                                   @if((trim($chkextension[1])=='pdf'))
                                                   <input type="hidden" name="Oil_analysis_report" value="{{$value}}"></input>
                                                   <li id="{{$key}}"><span><button type='button' class="btn cross" id="{{$key}}">&nbsp;</button><a class="pdf_view" href="../{{$value}}" target='_blank'><img id="{{$key}}" src="../assets/images/pdf.png"  class="imgupdate imgshow"></a></span></li>
                                                   @else
                                                   <input type="hidden" name="Oil_analysis_report" value="{{$value}}"></input>
                                                   <li id="{{$key}}"><span><button type='button' class="btn cross" id="{{$key}}">&nbsp;</button><a class="pdf_view" href="../{{$value}}" target='_blank'><img id="{{$key}}" src="../assets/images/jpg.png"  class="imgupdate imgshow"></a></span></li>
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

                        <div class="form-group mbot-10">
                           <div class="col-md-12 col-12 label_wrap">
                              <label class="p-0">OIL ANALYSIS NOTES:</label>
                           </div>
                           <div class="col-md-12 col-12">
                              <textarea id="" name="oil_analysis_notes" rows="6">@if($serviceDataCustom){{$serviceDataCustom->oil_analysis_notes}}@endif</textarea>
                           </div>
                        </div>
                        <div class="form-group mbot-10">
                           <div class="col-md-12 col-12 label_wrap">
                              <label class="p-0">OIL SERVICE NOTES:</label>
                           </div>
                           <div class="col-md-12 col-12">
                              <textarea id="" name="oil_service_notes" rows="6">@if($serviceDataCustom){{$serviceDataCustom->oil_service_notes}}@endif</textarea>
                           </div>
                        </div>
                     </div>
                     <button class="car-adding__btn btn btn--accent insertOilServices cmn-btn" type="button">Save</button>
                  </div>
               </form>
            </div>
         </div>
         @include('shop-settings.partials.rightvinnumber')
      </div>
   </div>
</div>
</main>
@endsection
