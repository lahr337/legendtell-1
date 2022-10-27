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

                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" >
                        <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                        <div class="form-box">
                          <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">DATE OF SERVICE:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="date" id="date_of_service" name="date_of_service" style="height:35px" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">MILEAGE:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_mileage" name="oil_mileage" style="height:35px" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">OIL TYPE:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_type" name="oil_type" style="height:35px" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">OIL BRAND:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_brand" name="oil_brand" style="height:35px" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">AMOUNT ADDED:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_amount_added" name="oil_amount_added" style="height:35px" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">FILTER PART NUMBER:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_filter_type" name="oil_filter_type" style="height:35px" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">FILTER BRAND:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <input class="form-control border-0 " type="text" id="oil_filter_brand" name="oil_filter_brand" style="height:35px" value="">
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row d-flex">
                                 <div class="col-md-4 col-12">
                                    <label class="p-0">FLUID SERVICE:</label>
                                 </div>
                                 <div class="col-md-8 col-12">
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check not_required" name="oil_fluid_service" value="WINDSHIELD" id="checkbox1" autocomplete="off" >
                                          <label for="checkbox1" class="text-center">WINDSHIELD <br> WASHER</label>
                                       </div>
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check not_required" name="oil_fluid_service" value="COOLANT" id="checkbox2" autocomplete="off" >
                                          <label for="checkbox2" class="text-center">COOLANT</label>
                                       </div>
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check not_required" name="oil_fluid_service" id="checkbox3" value="TRANSMISSION" autocomplete="off" >
                                          <label for="checkbox3" class="text-center">TRANSMISSION <br> FLUID </label>
                                       </div>

                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check not_required" name="oil_fluid_service" id="checkbox4" value="BRAKE FLUID" autocomplete="off" >
                                          <label for="checkbox4" class="text-center">BRAKE FLUID</label>
                                       </div>
                                       <div class="form-btnw-wrap upgrade-checked">
                                          <input type="checkbox" class="btn-check not_required" name="oil_fluid_service" value="POWER" id="checkbox5" autocomplete="off" >
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
                                       <input type="radio" class="btn-check not_required" name="oil_pan_removed" value="Yes" id="btnradio30" autocomplete="off"  >
                                       <label for="btnradio30">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check not_required" name="oil_pan_removed" value="No" id="btnradio31" autocomplete="off">
                                       <label for="btnradio31">NO</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3 col-12">
                                 <label class="p-0">OIL PAN PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="oil_pan_part_number" name="oil_pan_part_number" style="height:35px" value="">
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
                                       <input type="radio" class="btn-check not_required" value="Yes" name="oil_pan_gaskit" id="btnradio110" autocomplete="off" >
                                       <label for="btnradio110">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check not_required" value="No" name="oil_pan_gaskit" id="btnradio111" autocomplete="off" >
                                       <label for="btnradio111">NO</label>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-3 col-12">
                                 <label class="p-0">GASKET PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="gasket_part_number" name="gasket_part_number" style="height:35px" value="">
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
                                       <input type="radio" class="btn-check not_required" name="oil_pan_nut" id="btnradio112" autocomplete="off" value="Yes" >
                                       <label for="btnradio112">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check not_required" name="oil_pan_nut" id="btnradio113" autocomplete="off" value="No" >
                                       <label for="btnradio113">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">DRAIN PLUG PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="drain_plug_part_number" name="drain_plug_part_number" style="height:35px" value="">
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
                                       <input type="radio" class="btn-check not_required" name="crush_washer" id="btnradio114" autocomplete="off" value="Yes" >
                                       <label for="btnradio114">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check not_required" name="crush_washer" id="btnradio115" autocomplete="off" value="No" >
                                       <label for="btnradio115">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">CRUSH WASHER PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="crush_washer_part_number" name="crush_washer_part_number" style="height:35px" value="">
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
                                       <input type="radio" class="btn-check not_required" name="rubber_o_rings" id="btnradio116" autocomplete="off" value="Yes" >
                                       <label for="btnradio116">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check not_required" name="rubber_o_rings" id="btnradio117" autocomplete="off" value="No" >
                                       <label for="btnradio117">NO</label>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">RUBBER O-RINGS PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="rubber_o_rings_part_number" name="rubber_o_rings_part_number" style="height:35px" value="">
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
                                 <label class="switch">
                                 <input type="checkbox" name="oil_lines_serviced" value="Yes">
                                 <span class="slider"></span>
                              </div>

                              <div class="col-md-3 col-12">
                                 <!-- <label class="p-0">Turbo oil line part number</label> -->
                              </div>
                              <div class="col-md-3 col-12">
                                 <!-- <input class="form-control border-0 not_required " type="text" id="rubber_o_rings_part_number" name="rubber_o_rings_part_number" style="height:35px" value="@if($serviceDataCustom){{$serviceDataCustom->rubber_o_rings_part_number}}@endif"> -->
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINES REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <label class="switch">
                                 <input type="checkbox" name="oil_lines_replaced" value="Yes">
                                 <span class="slider"></span>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="turbo_oil_line_part_number" name="turbo_oil_line_part_number" style="height:35px" value="">
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE BOLTS REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <label class="switch">
                                 <input type="checkbox" name="line_bolts_replaced" value="Yes">
                                 <span class="slider"></span>
                                 </label>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE BOLT PART NUMBER</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="turbo_oil_line_bolt_part_number" name="turbo_oil_line_bolt_part_number" style="height:35px" value="">
                              </div>

                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE O-RINGS/CRUSH WASHERS REPLACED:</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <label class="switch">
                                 <input type="checkbox" name="rings_crush_washer_replaced" value="Yes">
                                 <span class="slider"></span>
                                 </label>
                              </div>

                              <div class="col-md-3 col-12">
                                 <label class="p-0">TURBO OIL LINE O-RINGS/CRUSH WASHERS PART NUMBERS</label>
                              </div>
                              <div class="col-md-3 col-12">
                                 <input class="form-control border-0 not_required " type="text" id="rings_crush_washer_part_number" name="rings_crush_washer_part_number" style="height:35px" value="">
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
                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="image btn-check_custom" name="oil_change_mileage[]">                                       
                                       <img class="imgshow" src="" alt="">
                                       <input type="hidden" name="oil_change_mileage[]" value=""></input>
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
                                          <input type="file" class="image btn-check_custom" name="oil_change_mileage[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_change_mileage[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_change_mileage[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value=""></input>

                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_change_mileage[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_change_mileage[]" value=""></input>
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
                                 <textarea id="" name="new_parts_notes" rows="6"></textarea>
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
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="pre_inspection[]">
                                          <img class="imgshow" src="" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="pre_inspection[]">
                                          <img class="imgshow" src="" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="pre_inspection[]">
                                          <img class="imgshow" src="" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="pre_inspection[]">
                                          <img class="imgshow" src="" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="pre_inspection[]">
                                          <img class="imgshow" src="" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="pre_inspection[]">
                                          <img class="imgshow" src="" alt="">   
                                          <input type="hidden" name="pre_inspection[]" value=""></input>
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
                              <textarea id="" rows="6" name="pre_inspection_notes"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section medium">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-12 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL FILTER AND PARTS INSPECTION:</label>
                                    </div>
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div> 
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="oil_filter_and_parts_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="oil_filter_and_parts_inspection[]" value=""></input>
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
                              <textarea id="" name="filter_and_parts_notes" rows="6"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section">
                              <div class="row d-flex align-items-center">
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL OUT:</label>
                                    </div>
                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="image btn-check_custom" name="oil_in_out[]">
                                       <img class="imgshow" src="" alt="">
                                       <input type="hidden" name="oil_in_out[]" value=""></input>
                                       <div class="overlay_image">+</div>
                                       <label class="text-center">UPLOAD <br> IMAGE</label>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL IN:</label>
                                    </div>
                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="image btn-check_custom" name="oil_in_out[]">
                                       <img class="imgshow" src="" alt="">
                                       <input type="hidden" name="oil_in_out[]" value=""></input>
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
                                    <textarea id="" name="oil_out_notes" rows="3"></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                 <div class="col-md-12 col-12 label_wrap">
                                    <label class="p-0">OIL IN NOTES:</label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <textarea id="" name="oil_in_notes" rows="3"></textarea>
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
                                    <div class="btn-group btn-group flex-row fluid-service_custom" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="torque_specs[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="torque_specs[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="torque_specs[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="torque_specs[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="torque_specs[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="torque_specs[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="torque_specs[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="torque_specs[]" value=""></input>
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
                                       <input type="file" class="image btn-check_custom" name="torque_specs[]">
                                       <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="torque_specs[]" value=""></input>
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
                                    <textarea id="" name="torque_specs_notes" rows="3"></textarea>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-12">
                                 <div class="col-md-12 col-12 label_wrap">
                                    <label class="p-0">OIL STATUS LEVEL NOTES:</label>
                                 </div>
                                 <div class="col-md-12 col-12">
                                    <textarea id="" name="oil_status_level_notes" rows="3"></textarea>
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
                                    <div class="btn-group btn-group flex-row fluid-service" role="group">
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="post_service_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="post_service_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="post_service_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="post_service_inspection[]">
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="post_service_inspection[]">                                          
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value=""></input>
                                          <div class="overlay_image">+</div>
                                          <label class="text-center">UPLOAD <br> IMAGE</label>
                                       </div>
                                       <div class="form-btnw-wrap small_img upgrade-checked">
                                          <input type="file" class="image btn-check_custom" name="post_service_inspection[]">                                         
                                          <img class="imgshow" src="" alt="">
                                          <input type="hidden" name="post_service_inspection[]" value=""></input>
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
                              <textarea id="" name="post_service_inspection_notes" rows="6"></textarea>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="upload-wrap images_section">
                              <div class="row d-flex align-items-center">
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL COLLECTED FOR ANALYSIS:</label>
                                    </div>                                  

                                    
                                    <div class="form-btnw-wrap large_img upgrade-checked">
                                       <input type="file" class="image btn-check_custom" name="oil_collected_for_analysis"> 
                                       <img class="imgshow" src="" alt="">
                                       <div class="overlay_image">+</div>
                                       <input type="hidden" name="oil_collected_for_analysis" value=""></input>

                                       <label class="text-center">UPLOAD <br> IMAGE</label>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 col-12">
                                    <div class="col-md-12 col-12 label_wrap">
                                       <label class="p-0">OIL ANALYSIS REPORT:</label>
                                    </div>
                                    
                                    <div class="form-box w-100 pdferrorwraper">
                                       <div class="images_section pdferror">
                                          <div class="row d-flex large_img align-items-center form-btnw-wrap documents_section">
                                             <div class="col-lg-4 col-12">
                                                <button class="btn uplaod">UPLOAD DOCUMENT
                                                   <input type="file" name="oil_analysis_report" id="insert_image_uploaded" class="not_required form-control image_uploaded_custom" accept=".xls,.pdf,.txt,.csv">
                                                   
                                                </button>
                                             </div>
                                             

                                             <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                                <ul>
                                                   
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
                              <textarea id="" name="oil_analysis_notes" rows="6"></textarea>
                           </div>
                        </div>
                        <div class="form-group mbot-10">
                           <div class="col-md-12 col-12 label_wrap">
                              <label class="p-0">OIL SERVICE NOTES:</label>
                           </div>
                           <div class="col-md-12 col-12">
                              <textarea id="" name="oil_service_notes" rows="6"></textarea>
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
