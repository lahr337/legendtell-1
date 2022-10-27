@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <div class="vinyl_wrap">
                  <div class="row">
                     <div class="col-12 col-md-3">
                        <div class="ac_service_checklist_pdf">
                           <div class="chk_pdf_wrap">
                              <img src="/assets/images/pdf.png" />
                           </div>
                           <button class="cmn-btn cmn-btn-dwnld" type="button">Download Checklist</button>
                        </div>
                     </div>
                     <div class="col-12 col-md-9">
                        <ul class="nav nav-pills nav-tabs" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs active myvinlytab" id="car-tab" data-bs-toggle="tab" data-bs-target="#car" type="button" role="tab" aria-controls="car" aria-selected="true">Car/Truck/SUV</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs myvinlytab" id="van-tab" data-bs-toggle="tab" data-bs-target="#van" type="button" role="tab" aria-controls="van" aria-selected="false">VAN</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs myvinlytab" id="rv-tab" data-bs-toggle="tab" data-bs-target="#rv" type="button" role="tab" aria-controls="rv" aria-selected="false">RV</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs myvinlytab" id="trailer-tab" data-bs-toggle="tab" data-bs-target="#trailer" type="button" role="tab" aria-controls="trailer" aria-selected="false">TRAILER</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs myvinlytab" id="bus-tab" data-bs-toggle="tab" data-bs-target="#bus" type="button" role="tab" aria-controls="bus" aria-selected="false">BUS</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs myvinlytab" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">OTHER</button>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="car" role="tabpanel" aria-labelledby="car-tab">
                        <form id="carvinlyIn">
                           @csrf
                           <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                           <input type="hidden" name="outType" value="Car">
                           <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" > 
                           <div class="vinyl-content">
                              <div class="row">
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Hood:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="hood_radio" id="vinyl-tab1" autocomplete="off"  value="Partial">
                                                      <label for="vinyl-tab1">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="hood_radio" id="vinyl-tab2" autocomplete="off" value="Full">
                                                      <label for="vinyl-tab2">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Roof:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="roof_radio" id="vinyl-tab3" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab3">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="roof_radio" value="Full" id="vinyl-tab4" autocomplete="off">
                                                      <label for="vinyl-tab4">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Trunk:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="truck_radio" id="vinyl-tab5" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab5">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="truck_radio" value="Full" id="vinyl-tab6" autocomplete="off">
                                                      <label for="vinyl-tab6">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Hatch:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="hatch_radio" id="vinyl-tab7" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab7">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="hatch_radio" value="Full" id="vinyl-tab8" autocomplete="off">
                                                      <label for="vinyl-tab8">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Front Bumper:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="front_bumper_radio" id="vinyl-tab9" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab9">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="front_bumper_radio" value="Full" id="vinyl-tab10" autocomplete="off">
                                                      <label for="vinyl-tab10">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Rear Bumper:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="rear_bumper_radio" id="vinyl-tab11" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab11">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="rear_bumper_radio" value="Full" id="vinyl-tab12" autocomplete="off">
                                                      <label for="vinyl-tab12">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP BRAND:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_brand_err_car">
                                                <input class="form-control border-0 wrap_brand_car" style="height:35px" name="wrap_brand" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP COLOR:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_color_err_car">
                                                <input class="form-control border-0 wrap_color_car" style="height:35px" name="wrap_color"  value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">WARRANTY:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap is_waranty_car">
                                                      <input type="radio" class="btn-check yes_waranty_car" name="warranty_radio" id="vinyl-tab13" autocomplete="off" value="YES">
                                                      <label for="vinyl-tab13">YES</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check no_waranty_car" name="warranty_radio" value="NO" id="vinyl-tab14" autocomplete="off">
                                                      <label for="vinyl-tab14">NO</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center mb-0">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WARRANTY COMPANY:</label>
                                             </div>
                                             <div class="col-lg-12 col-12">
                                                <input class="form-control border-0 company_waranty" readonly style="height:35px" name="warranty_company" value="" >
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_front_panel_radio" id="vinyl-tab15" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab15">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_front_panel_radio" id="vinyl-tab16" autocomplete="off" value="Full">
                                                      <label for="vinyl-tab16">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_rear_panel" id="vinyl-tab17" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab17">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_rear_panel" id="vinyl-tab18" autocomplete="off" value="Full">
                                                      <label for="vinyl-tab18">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT DOOR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_front_door" id="vinyl-tab19" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab19">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_front_door" id="vinyl-tab20" autocomplete="off" value="Full">
                                                      <label for="vinyl-tab20">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR DOOR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_rear_door" id="vinyl-tab21" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab21">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_rear_door" value="Full" id="vinyl-tab22" autocomplete="off">
                                                      <label for="vinyl-tab22">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER A PILLAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_a_pillar" id="vinyl-tab23" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab23">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_a_pillar" value="Full" id="vinyl-tab24" autocomplete="off">
                                                      <label for="vinyl-tab24">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER B PILLAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_b_pillar" id="vinyl-tab25" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab25">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_b_pillar" id="vinyl-tab26" autocomplete="off" value="Full">
                                                      <label for="vinyl-tab26">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER C PILLAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_c_pillar" id="vinyl-tab27" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab27">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_c_pillar" value="Full" id="vinyl-tab28" autocomplete="off">
                                                      <label for="vinyl-tab28">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER ROCKER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_rocker_panel" id="vinyl-tab29" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab29">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_rocker_panel" value="Full" id="vinyl-tab30" autocomplete="off">
                                                      <label for="vinyl-tab30">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MIRROR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_mirroe" id="vinyl-tab31" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab31">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_mirroe" value="Full" id="vinyl-tab32" autocomplete="off">
                                                      <label for="vinyl-tab32">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PREF DRIVER WINDOWS:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pref_driver_window" id="vinyl-tab33" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab33">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pref_driver_window" value="Full" id="vinyl-tab34" autocomplete="off">
                                                      <label for="vinyl-tab34">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-checked">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="checkbox" class="btn-check selectallcar" name="full_vehicle_wrap" id="vinyl-tab35" autocomplete="off" value="Full">
                                                      <label for="vinyl-tab35">FULL VEHICLE WRAP</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASS FRONT QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_front_quarter" id="vinyl-tab36" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab36">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" value="Full" name="pass_front_quarter" id="vinyl-tab37" autocomplete="off">
                                                      <label for="vinyl-tab37">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASS REAR QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_rear_quarter" id="vinyl-tab38" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab38">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_rear_quarter" value="Full" id="vinyl-tab39" autocomplete="off">
                                                      <label for="vinyl-tab39">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASSENGER REAR DOOR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="passenger_rear_door" id="vinyl-tab40" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab40">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="passenger_rear_door" id="vinyl-tab41" value="Full" autocomplete="off">
                                                      <label for="vinyl-tab41">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASS A PILLAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_a_pillar" value="Partial" id="vinyl-tab44" autocomplete="off">
                                                      <label for="vinyl-tab44">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_a_pillar" value="Full" id="vinyl-tab45" autocomplete="off" >
                                                      <label for="vinyl-tab45">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASS B PILLAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_b_pillar" id="vinyl-tab46" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab46">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_b_pillar" value="Full" id="vinyl-tab47" autocomplete="off">
                                                      <label for="vinyl-tab47">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASS C PILLAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_c_pillar" id="vinyl-tab48" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab48">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_c_pillar" value="Full" id="vinyl-tab49" autocomplete="off">
                                                      <label for="vinyl-tab49">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASSENGER ROCKER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="passenger_rocker_panel" value="Partial" id="vinyl-tab50" autocomplete="off">
                                                      <label for="vinyl-tab50">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="passenger_rocker_panel" value="Full" id="vinyl-tab51" autocomplete="off">
                                                      <label for="vinyl-tab51">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASSENGER MIRROR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="passenger_mirror" id="vinyl-tab52" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab52">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="passenger_mirror" value="Full" id="vinyl-tab53" autocomplete="off">
                                                      <label for="vinyl-tab53">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PREF PASS WINDOWS:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pref_pass_windows" id="vinyl-tab54" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab54">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pref_pass_windows" id="vinyl-tab55" autocomplete="off" value="Full">
                                                      <label for="vinyl-tab55">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PREF BACK WINDSHIELD:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pref_back_windshield" id="vinyl-tab56" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab56">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pref_back_windshield" value="Full" id="vinyl-tab57" autocomplete="off">
                                                      <label for="vinyl-tab57">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">TAILGATE:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="tailgate" id="vinyl-tab58" autocomplete="off" value="Partial">
                                                      <label for="vinyl-tab58">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="tailgate" value="Full" id="vinyl-tab59" autocomplete="off">
                                                      <label for="vinyl-tab59">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                              </div>
                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="upload-wrap">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-lg-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br /> Photos & Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="cmn-btn-wrap">
                                 {{-- <a href="{{$redirectUrl}}"  class="car-adding__btn btn btn--accent cmn-btn btn btn-danger redirectUrl m-0">Back</a> --}}
                              <button class="car-adding__btn btn btn--accent cmn-btn saveVinly" type="button" id="saveCarVinly">Save</button>
                                
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- Van Tab -->
                     <div class="tab-pane fade" id="van" role="tabpanel" aria-labelledby="van-tab">
                        <div class="vinyl-content">
                           <form id="InsertVanVinly">
                              @csrf
                              <input type="hidden" name="outType" value="Van">
                              <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" > 
                           <div class="row">
                              <div class="col-12 col-md-4">
                                 <div class="cmn-vinyl-content">
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">Hood:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab1" id="vinyl-vantab1" autocomplete="off" value="Partial">
                                                   <label for="vinyl-vantab1">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab1" id="vinyl-vantab2"  value="Full" autocomplete="off">
                                                   <label for="vinyl-vantab2">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">Roof:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab2" id="vinyl-vantab3" autocomplete="off" value="Partial">
                                                   <label for="vinyl-vantab3">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab2" id="vinyl-vantab4" autocomplete="off" value="Full">
                                                   <label for="vinyl-vantab4">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">BACK DOORS:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab3" id="vinyl-vantab5" autocomplete="off" value="Partial">
                                                   <label for="vinyl-vantab5">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab3" id="vinyl-vantab6" autocomplete="off" value="Full">
                                                   <label for="vinyl-vantab6">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">Hatch:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab4" id="vinyl-vantab7" autocomplete="off" value="Partial">
                                                   <label for="vinyl-vantab7">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab4" id="vinyl-vantab8" autocomplete="off" value="Full">
                                                   <label for="vinyl-vantab8">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">Front Bumper:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab5" id="vinyl-vantab9" autocomplete="off" value="Partial">
                                                   <label for="vinyl-vantab9">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab5" id="vinyl-vantab10" autocomplete="off" value="Full">
                                                   <label for="vinyl-vantab10">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">Rear Bumper:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab6" id="vinyl-vantab11" autocomplete="off" value="Partial">
                                                   <label for="vinyl-vantab11">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab6" id="vinyl-vantab12" autocomplete="off" value="Full">
                                                   <label for="vinyl-vantab12">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row">
                                          <div class="col-lg-12 col-12">
                                             <label class="p-0 cmn-label">WRAP BRAND:</label>
                                          </div>
                                          <div class="col-lg-12 col-12 myerr wrap_brand_err_van">
                                             <input class="form-control border-0 wrap_brand_van" style="height:35px" name="van_wrap_brand" value="">
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP COLOR:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_color_err_van">
                                                <input class="form-control border-0 wrap_color_van" style="height:35px" name="van_wrap_color" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">WARRANTY:</label>
                                          </div>
                                          <div class="col-12 col-md-12 is_waranty_van">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check yes_waranty_van" name="vantab7" id="vinyl-vantab13" autocomplete="off" value="YES">
                                                      <label for="vinyl-vantab13">YES</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check no_waranty_van" name="vantab7" value="NO" id="vinyl-vantab14" autocomplete="off">
                                                      <label for="vinyl-vantab14">NO</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center mb-0">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WARRANTY COMPANY:</label>
                                             </div>
                                             <div class="col-lg-12 col-12">
                                                <input class="form-control border-0 company_waranty_van" style="height:35px" name="van_warranty_company" value="">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MIRROR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab8" id="vinyl-vantab15" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab15">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab8" id="vinyl-vantab16" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab16">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASSENGER MIRROR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab9" id="vinyl-vantab17" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab17">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab9" id="vinyl-vantab18" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab18">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                      
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab12" id="vinyl-vantab23" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab23">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab12" value="Full" id="vinyl-vantab24" autocomplete="off">
                                                      <label for="vinyl-vantab24">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab13" id="vinyl-vantab25" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab25">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab13" id="vinyl-vantab26" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab26">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT DOOR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab14" id="vinyl-vantab27" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab27">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab14" id="vinyl-vantab28" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab28">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR DOOR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab15" id="vinyl-vantab29" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab29">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab15" id="vinyl-vantab30" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab30">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASS FRONT QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab16" id="vinyl-vantab31" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab31">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab16" id="vinyl-vantab32" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab32">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASS REAR QUARTER PANEL:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab17" id="vinyl-vantab33" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab33">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab17" id="vinyl-vantab34" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab34">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASSENGER FRONT DOOR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab18" id="vinyl-vantab35" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab35">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab18" id="vinyl-vantab36" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab36">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PASSENGER REAR DOOR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab19" id="vinyl-vantab37" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab37">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab19" value="Full" id="vinyl-vantab38" autocomplete="off">
                                                      <label for="vinyl-vantab38">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PREF DRIVER WINDOWS:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab20" id="vinyl-vantab39" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab39">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab20" id="vinyl-vantab40" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab40">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PREF PASS WINDOWS:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab21" id="vinyl-vantab41" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab41">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab21" id="vinyl-vantab42" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab42">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">PREF BACK WINDSHIELD:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_van driver_front_break checked" name="vantab22" id="vinyl-vantab43" autocomplete="off" value="Partial">
                                                      <label for="vinyl-vantab43">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check van_check driver_front_break checked" name="vantab22" id="vinyl-vantab44" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab44">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-checked">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="checkbox" class="btn-check vanselectall" name="vantab23" id="vinyl-vantab45" autocomplete="off" value="Full">
                                                      <label for="vinyl-vantab45">FULL VAN WRAP</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                              
                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="upload-wrap">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-lg-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br /> Photos & Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded2" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- <button class="car-adding__btn btn btn--accent saveVinly cmn-btn" type="button" id="saveVanVinly">Save</button> --}}

                              <div class="cmn-btn-wrap">
                                 {{-- <a href="{{$redirectUrl}}"  class="car-adding__btn btn btn--accent cmn-btn btn btn-danger redirectUrl m-0">Back</a> --}}
                              <button class="car-adding__btn btn btn--accent cmn-btn saveVinly" type="button" id="saveVanVinly">Save</button>
                                
                              </div>
                            
                           </div>
                        </form>
                        </div>
                     </div>
                        <!-- RV Tab -->
                        <div class="tab-pane fade" id="rv" role="tabpanel" aria-labelledby="rv-tab">
                           <div class="vinyl-content">
                              <form id="InsertRvVinly1">
                                 @csrf
                                 <input type="hidden" name="outType" value="RV">
                                 <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" > 
                              <div class="row">
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Hood:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab1" id="vinyl-rvtab1" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab1">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab1" value="Full" id="vinyl-rvtab2" autocomplete="off">
                                                      <label for="vinyl-rvtab2">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">FRONT:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab2" id="vinyl-rvtab3" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab3">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab2" value="Full" id="vinyl-rvtab4" autocomplete="off">
                                                      <label for="vinyl-rvtab4">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">REAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab3" id="vinyl-rvtab5" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab5">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab3" Value="Full" id="vinyl-rvtab6" autocomplete="off">
                                                      <label for="vinyl-rvtab6">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP BRAND:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_brand_err_rv">
                                                <input class="form-control border-0 wrap_brand_rv" name ="rv_wrap_brand" style="height:35px" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP COLOR:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_color_err_rv">
                                                <input class="form-control border-0 wrap_color_rv" name="rv_wrap_color" style="height:35px" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">WARRANTY:</label>
                                          </div>
                                          <div class="col-12 col-md-12 is_waranty_rv">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check yes_waranty_rv" name="rvtab4" id="vinyl-rvtab7" autocomplete="off" value="YES">
                                                      <label for="vinyl-rvtab7">YES</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check no_waranty_rv" name="rvtab4" value="NO" id="vinyl-rvtab8" autocomplete="off">
                                                      <label for="vinyl-rvtab8">NO</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center mb-0">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WARRANTY COMPANY:</label>
                                             </div>
                                             <div class="col-lg-12 col-12">
                                                <input class="form-control border-0 company_waranty_rv" name="rv_warranty_Company" style="height:35px" value="">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab5" id="vinyl-rvtab9" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab9">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab5" value="Full" id="vinyl-rvtab10" autocomplete="off">
                                                      <label for="vinyl-rvtab10">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MID SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab6" id="vinyl-rvtab11" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab11">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab6" id="vinyl-rvtab12" autocomplete="off" value="Full">
                                                      <label for="vinyl-rvtab12">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab7" id="vinyl-rvtab13" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab13">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab7" id="vinyl-rvtab14" autocomplete="off" value="Full">
                                                      <label for="vinyl-rvtab14">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-checked">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="checkbox" class="btn-check rvselectall" name="rv_full_wrap" id="vinyl-rvtab15" value="Full" autocomplete="off">
                                                      <label for="vinyl-rvtab15">FULL RV WRAP</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab9" id="vinyl-rvtab16" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab16">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab9" value="Full" id="vinyl-rvtab17" autocomplete="off">
                                                      <label for="vinyl-rvtab17">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MID SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab10" id="vinyl-rvtab18" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab18">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab10" id="vinyl-rvtab19" autocomplete="off" value="Full">
                                                      <label for="vinyl-rvtab19">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab11" id="vinyl-rvtab20" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab20">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab11" id="vinyl-rvtab21" autocomplete="off" value="Full">
                                                      <label for="vinyl-rvtab21">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">ROOF:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_rv driver_front_break checked" name="rvtab12" id="vinyl-rvtab22" autocomplete="off" value="Partial">
                                                      <label for="vinyl-rvtab22">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check rv_check driver_front_break checked" name="rvtab12" id="vinyl-rvtab23" autocomplete="off" value="Full">
                                                      <label for="vinyl-rvtab23">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                              </div>
                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="upload-wrap">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-lg-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br /> Photos & Docs <input type="file" name="image_uploaded[]" id="insert_image_uploadedthree" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- <button class="car-adding__btn btn btn--accent saveVinly cmn-btn" type="button" id="saveRvVinly">Save</button> --}}
                              <div class="cmn-btn-wrap">
                                 {{-- <a href="{{$redirectUrl}}"  class="car-adding__btn btn btn--accent cmn-btn btn btn-danger redirectUrl m-0">Back</a> --}}
                              <button class="car-adding__btn btn btn--accent cmn-btn saveVinly" type="button" id="saveRvVinly">Save</button>
                                
                              </div>
                           </form>
                           </div>
                        
                        </div>
                        <!-- Trailer -->
                        <div class="tab-pane fade" id="trailer" role="tabpanel" aria-labelledby="trailer-tab">
                           <div class="vinyl-content">
                              <form id="InsertTrailerVinly">
                                 @csrf
                                 <input type="hidden" name="outType" value="Trailer">
                                 <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" > 
                              <div class="row">
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Hood:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab1" id="vinyl-trailertab1" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab1">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab1" value="Full" id="vinyl-trailertab2" autocomplete="off">
                                                      <label for="vinyl-trailertab2">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">FRONT:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab2" id="vinyl-trailertab3" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab3">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab2" value="Full" id="vinyl-trailertab4" autocomplete="off">
                                                      <label for="vinyl-trailertab4">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">REAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab3" id="vinyl-trailertab5" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab5">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab3" value="Full" id="vinyl-trailertab6" autocomplete="off">
                                                      <label for="vinyl-trailertab6">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP BRAND:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_brand_err_trailer">
                                                <input class="form-control border-0 wrap_brand_trailer" style="height:35px" name="trailer_wrap_brand" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP COLOR:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_color_err_trailer">
                                                <input class="form-control border-0 wrap_color_trailer" style="height:35px" name="trailer_wrap_color" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">WARRANTY:</label>
                                          </div>
                                          <div class="col-12 col-md-12 is_waranty_trailer">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check yes_waranty_trailer" name="trailertab4" id="vinyl-trailertab7" autocomplete="off" value="YES">
                                                      <label for="vinyl-trailertab7">YES</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check no_waranty_trailer" name="trailertab4" value="NO" id="vinyl-trailertab8" autocomplete="off">
                                                      <label for="vinyl-trailertab8">NO</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center mb-0">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WARRANTY COMPANY:</label>
                                             </div>
                                             <div class="col-lg-12 col-12">
                                                <input class="form-control border-0 company_waranty_trailer" style="height:35px" value="" name="trailer_warranty_company">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab5" id="vinyl-trailertab9" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab9">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab5" id="vinyl-trailertab10" autocomplete="off" value="Full">
                                                      <label for="vinyl-trailertab10">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MID SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab6" id="vinyl-trailertab11" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab11">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab6" id="vinyl-trailertab12" autocomplete="off" value="Full">
                                                      <label for="vinyl-trailertab12">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab7" id="vinyl-trailertab13" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab13">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab7" value="Full"  id="vinyl-trailertab14" autocomplete="off">
                                                      <label for="vinyl-trailertab14">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-checked">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="checkbox" class="btn-check trailorselectall" name="trailertab8" id="vinyl-trailertab15" autocomplete="off" name="full_rv_wrap" value="Full">
                                                      <label for="vinyl-trailertab15">FULL RV WRAP</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab9" id="vinyl-trailertab16" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab16">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab9" value="Full" id="vinyl-trailertab17" autocomplete="off">
                                                      <label for="vinyl-trailertab17">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MID SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab10" value="Partial" id="vinyl-trailertab18" autocomplete="off">
                                                      <label for="vinyl-trailertab18">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab10" value="Full" id="vinyl-trailertab19" autocomplete="off">
                                                      <label for="vinyl-trailertab19">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab11" id="vinyl-trailertab20" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab20">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab11" value="Full"  id="vinyl-trailertab21" autocomplete="off">
                                                      <label for="vinyl-trailertab21">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">ROOF:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_trailor driver_front_break checked" name="trailertab12" id="vinyl-trailertab22" autocomplete="off" value="Partial">
                                                      <label for="vinyl-trailertab22">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check trailor_check driver_front_break checked" name="trailertab12" value="Full" id="vinyl-trailertab23" autocomplete="off">
                                                      <label for="vinyl-trailertab23">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                              </div>
                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="upload-wrap">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-lg-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br /> Photos & Docs <input type="file" name="image_uploaded[]" id="insert_image_uploadedfour" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- <button class="car-adding__btn btn btn--accent saveVinly cmn-btn" type="button" id="savetrailerVinly">Save</button> --}}
                              
                              <div class="cmn-btn-wrap">
                                 {{-- <a href="{{$redirectUrl}}"  class="car-adding__btn btn btn--accent cmn-btn btn btn-danger redirectUrl m-0">Back</a> --}}
                              <button class="car-adding__btn btn btn--accent cmn-btn saveVinly" type="button" id="savetrailerVinly">Save</button>
                                
                              </div>
                              </form>
                           </div>
                        </div>
                        <!-- Bus Tab -->
                        <div class="tab-pane fade" id="bus" role="Bus" aria-labelledby="bus-tab">
                           <form id="InsertBusVinly">
                              @csrf
                              <input type="hidden" name="outType" value="Bus">
                              <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" > 
                           <div class="vinyl-content">
                              <div class="row">
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">Hood:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab1" id="vinyl-bustab1" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab1">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab1" value="Full" id="vinyl-bustab2" autocomplete="off">
                                                      <label for="vinyl-bustab2">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">FRONT:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab2" id="vinyl-bustab3" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab3">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab2" value="Full" id="vinyl-bustab4" autocomplete="off">
                                                      <label for="vinyl-bustab4">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">REAR:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab3" id="vinyl-bustab5" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab5">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab3" id="vinyl-bustab6" autocomplete="off" value="Full">
                                                      <label for="vinyl-bustab6">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP BRAND:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_brand_err_bus">
                                                <input class="form-control border-0 wrap_brand_bus" name="bus_wrap_brand" style="height:35px" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP COLOR:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 myerr wrap_color_err_bus">
                                                <input class="form-control border-0 wrap_color_bus"  name="bus_wrap_color" style="height:35px" value="">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">WARRANTY:</label>
                                          </div>
                                          <div class="col-12 col-md-12 is_waranty_bus">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check yes_waranty_bus" name="bustab4" id="vinyl-bustab7" autocomplete="off" value="Yes">
                                                      <label for="vinyl-bustab7">YES</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check no_waranty_bus" name="bustab4" id="vinyl-bustab8" autocomplete="off" value="No">
                                                      <label for="vinyl-bustab8">NO</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center mb-0">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WARRANTY COMPANY:</label>
                                             </div>
                                             <div class="col-lg-12 col-12">
                                                <input class="form-control border-0 company_waranty_bus" name="bus_warranty_company" style="height:35px" value="">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab5" id="vinyl-bustab9" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab9">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab5" id="vinyl-bustab10" autocomplete="off" value="Full">
                                                      <label for="vinyl-bustab10">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MID SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab6" id="vinyl-bustab11" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab11">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab6" id="vinyl-bustab12" autocomplete="off" value="Full">
                                                      <label for="vinyl-bustab12">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab7" id="vinyl-bustab13" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab13">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab7" id="vinyl-bustab14" autocomplete="off" value="Full">
                                                      <label for="vinyl-bustab14">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-checked">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="checkbox" class="btn-check busselectall" name="bustab8" id="vinyl-bustab15" autocomplete="off" Value="Full">
                                                      <label for="vinyl-bustab15">FULL RV WRAP</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                                 <div class="col-12 col-md-4">
                                    <div class="cmn-vinyl-content vinylcol">
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER FRONT SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab9" id="vinyl-bustab16" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab16">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab9" value="Full" id="vinyl-bustab17" autocomplete="off">
                                                      <label for="vinyl-bustab17">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER MID SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab10" id="vinyl-bustab18" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab18">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab10" id="vinyl-bustab19" autocomplete="off" value="Full">
                                                      <label for="vinyl-bustab19">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">DRIVER REAR SECTION:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab11" id="vinyl-bustab20" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab20">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab11" id="vinyl-bustab21" autocomplete="off" value="Full">
                                                      <label for="vinyl-bustab21">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">ROOF:</label>
                                          </div>
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check check_bus driver_front_break checked" name="bustab12" id="vinyl-bustab22" autocomplete="off" value="Partial">
                                                      <label for="vinyl-bustab22">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check bus_check driver_front_break checked" name="bustab12" id="vinyl-bustab23" autocomplete="off" value="Full">
                                                      <label for="vinyl-bustab23">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- Col -->
                              </div>
                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="upload-wrap">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-lg-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br /> Photos & Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded5" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- <button class="car-adding__btn btn btn--accent saveVinly cmn-btn" type="button" id="saveBusVinly">Save</button> --}}
                              <div class="cmn-btn-wrap">
                                 {{-- <a href="{{$redirectUrl}}"  class="car-adding__btn btn btn--accent cmn-btn btn btn-danger redirectUrl m-0">Back</a> --}}
                              <button class="car-adding__btn btn btn--accent cmn-btn saveVinly" type="button" id="saveBusVinly">Save</button>
                                
                              </div>
                           </div>
                        </form>
                        </div>
                        <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                           <form id="InsertOtherVinly">
                              @csrf
                              <input type="hidden" name="outType" value="Other">
                              <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" > 
                           <div class="form-box other-tab vinyl-content cmn-radio">
                              <div class="form-group">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-lg-12 col-12">
                                       <span class="label-title">
                                       <label class="cmn-label">Service Completed:</label>
                                       </span>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                       <span class="input-wrap">
                                       <textarea class="form-control" rows="3" name="other_service_competed"></textarea>
                                       </span>
                                    </div>
                                 </div>
                              </div>
                              <div class="other-content-max">
                                 <div class="form-group my-4 align-items-center">
                                    <div class="row">
                                       <div class="col-lg-12 col-12">
                                          <label class="p-0 cmn-label">BRAND WRAP:</label>
                                       </div>
                                       <div class="col-lg-12 col-12 myerr wrap_brand_err_other">
                                          <input class="form-control border-0 wrap_brand_other" style="height:35px" name="other_brand_wrap" value="">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group my-4 align-items-center">
                                    <div class="row">
                                       <div class="col-lg-12 col-12">
                                          <label class="p-0 cmn-label">WRAP COLOR:</label>
                                       </div>
                                       <div class="col-lg-12 col-12 myerr wrap_color_err_other">
                                          <input class="form-control border-0 wrap_color_other" style="height:35px" name="other_wrap_color"  value="">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row align-items-center vinyl-other-warranty">
                                    <div class="col-12 col-md-4">
                                       <label class="cmn-label">WARRANTY:</label>
                                    </div>
                                    <div class="col-12 col-md-8 d-flex is_waranty_other">
                                       <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                          <div class="custom-check__field-wr m-0">
                                             <input class="custom-check__field notifications yes_waranty_other" id="vinyl-other-warn1" type="radio" value="Yes" name="vinyl_other_warranty">
                                             <div class="custom-check__customize">
                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                </svg>
                                             </div>
                                          </div>
                                          <label class="custom-check__label cmn-label" for="serviceCheck">Yes</label>
                                       </div>
                                       <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                          <div class="custom-check__field-wr">
                                             <input class="custom-check__field notifications no_waranty_other" id="vinyl-other-warn2" type="radio" value="No" name="vinyl_other_warranty">
                                             <div class="custom-check__customize">
                                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                   <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                </svg>
                                             </div>
                                          </div>
                                          <label class="custom-check__label cmn-label" for="serviceCheck">No</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group my-4 align-items-center mb-0">
                                    <div class="row">
                                       <div class="col-lg-12 col-12">
                                          <label class="p-0 cmn-label">WARRANTY COMPANY:</label>
                                       </div>
                                       <div class="col-lg-12 col-12">
                                          <input class="form-control border-0 company_waranty_other" name="other_warranty_company" style="height:35px" value="">
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="upload-wrap">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br /> Photos & Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded6" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-md-8 col-12 text-center display_image_list"  id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- <button class="car-adding__btn btn btn--accent saveVinly cmn-btn" type="button" id="saveOtherVinly">Save</button> --}}
                              <div class="cmn-btn-wrap">
                                 {{-- <a href="{{$redirectUrl}}"  class="car-adding__btn btn btn--accent cmn-btn btn btn-danger redirectUrl m-0">Back</a> --}}
                              <button class="car-adding__btn btn btn--accent cmn-btn saveVinly" type="button" id="saveOtherVinly">Save</button>
                                
                              </div>
                           </div>
                        </form>
                        </div>
                     </div>
                  </div>
              
            </div>
            </div>
            @include('shop-settings.partials.rightvinnumber')
         </div>
      </div>
   </div>
</div>
</main>
@endsection