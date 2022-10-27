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
                              <button class="nav-link navTabs active" id="car-tab" data-bs-toggle="tab" data-bs-target="#car" type="button" role="tab" aria-controls="car" aria-selected="true">Car/Truck/SUV</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs" id="van-tab" data-bs-toggle="tab" data-bs-target="#van" type="button" role="tab" aria-controls="van" aria-selected="false">VAN</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs" id="rv-tab" data-bs-toggle="tab" data-bs-target="#rv" type="button" role="tab" aria-controls="rv" aria-selected="false">RV</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs" id="trailer-tab" data-bs-toggle="tab" data-bs-target="#trailer" type="button" role="tab" aria-controls="trailer" aria-selected="false">TRAILER</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs" id="bus-tab" data-bs-toggle="tab" data-bs-target="#bus" type="button" role="tab" aria-controls="bus" aria-selected="false">BUS</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">OTHER</button>
                           </li>
                        </ul>
                     </div>
                  </div>

                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="car" role="tabpanel" aria-labelledby="car-tab">
                        <form id="savecarPPF">
                           @csrf
                           <input type="hidden" name="type" value="Car">
                           <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">

                           <input type="hidden" value="{{$id}}" name="paint_protection_films_id">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="hood_car" value="Partial" id="vinyl-tab1" autocomplete="off">
                                                      <label for="vinyl-tab1">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="hood_car" value="Full" id="vinyl-tab2" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="roof_car" value="Partial" id="vinyl-tab3" autocomplete="off">
                                                      <label for="vinyl-tab3">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="roof_car" value="Full" id="vinyl-tab4" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="trunk_car" value="Partial" id="vinyl-tab5" autocomplete="off">
                                                      <label for="vinyl-tab5">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="trunk_car" value="Full" id="vinyl-tab6" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="hatch_car" value="Partial" id="vinyl-tab7" autocomplete="off">
                                                      <label for="vinyl-tab7">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="hatch_car" value="Full" id="vinyl-tab8" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="front_bumper_car" value="Partial" id="vinyl-tab9" autocomplete="off">
                                                      <label for="vinyl-tab9">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="front_bumper_car" value="Full" id="vinyl-tab10" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="rear_bumper_car" value="Partial" id="vinyl-tab11" autocomplete="off">
                                                      <label for="vinyl-tab11">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="rear_bumper_car" value="Full" id="vinyl-tab12" autocomplete="off">
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
                                             <div class="col-lg-12 col-12 wrap_brand_err_car">
                                                <input class="form-control border-0 wrap_brand_car" name="wrap_brand_car" value="" style="height:35px"></input>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="form-group my-4 align-items-center">
                                          <div class="row">
                                             <div class="col-lg-12 col-12">
                                                <label class="p-0 cmn-label">WRAP COLOR:</label>
                                             </div>
                                             <div class="col-lg-12 col-12 wrap_color_err_car">
                                                <input class="form-control border-0 wrap_color_car" name="wrap_color_car" value="" style="height:35px"></input>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <label class="cmn-label">WARRANTY:</label>
                                          </div>
                                          <div class="col-12 col-md-12 is_waranty_car">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check yes_waranty_car" name="is_waranty_car" value="YES" id="vinyl-tab13" autocomplete="off">
                                                      <label for="vinyl-tab13">YES</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check no_waranty_car" name="is_waranty_car" value="NO" id="vinyl-tab14" autocomplete="off">
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
                                                <input class="form-control border-0 company_waranty" name="waranty_company_car" value="" style="height:35px"></input>
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_front_quarter_panel_car" value="Partial" id="vinyl-tab15" autocomplete="off">
                                                      <label for="vinyl-tab15">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_front_quarter_panel_car" value="Full" id="vinyl-tab16" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_rear_quarter_panel_car" value="Partial" id="vinyl-tab17" autocomplete="off">
                                                      <label for="vinyl-tab17">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_rear_quarter_panel_car" value="Full" id="vinyl-tab18" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_front_door_car" value="Partial" id="vinyl-tab19" autocomplete="off">
                                                      <label for="vinyl-tab19">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_front_door_car" value="Full" id="vinyl-tab20" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_rear_door_car" value="Partial" id="vinyl-tab21" autocomplete="off">
                                                      <label for="vinyl-tab21">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_rear_door_car" value="Full" id="vinyl-tab22" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_a_piller_car" value="Partial" id="vinyl-tab23" autocomplete="off">
                                                      <label for="vinyl-tab23">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_a_piller_car" value="Full" id="vinyl-tab24" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_b_piller_car" value="Partial" id="vinyl-tab25" autocomplete="off">
                                                      <label for="vinyl-tab25">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_b_piller_car" value="Full" id="vinyl-tab26" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_c_piller_car" value="Partial" id="vinyl-tab27" autocomplete="off">
                                                      <label for="vinyl-tab27">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_c_piller_car" value="Full" id="vinyl-tab28" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_rocker_panel_car" value="Partial" id="vinyl-tab29" autocomplete="off">
                                                      <label for="vinyl-tab29">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_rocker_panel_car" value="Full" id="vinyl-tab30" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="driver_mirror_car" value="Partial" id="vinyl-tab31" autocomplete="off">
                                                      <label for="vinyl-tab31">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="driver_mirror_car" value="Full" id="vinyl-tab32" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pref_driver_window_car" value="Partial" id="vinyl-tab33" autocomplete="off">
                                                      <label for="vinyl-tab33">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pref_driver_window_car" value="Full" id="vinyl-tab34" autocomplete="off">
                                                      <label for="vinyl-tab34">Full</label>
                                                   </div>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                       <div class="row align-items-center">
                                          <div class="col-12 col-md-12">
                                             <ul class="cmn-radio">
                                                <li>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check selectallcar" name="btnradio18" id="vinyl-tab35" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_front_quarter_panel_car" value="Partial" id="vinyl-tab36" autocomplete="off">
                                                      <label for="vinyl-tab36">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_front_quarter_panel_car" value="Full" id="vinyl-tab37" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_rear_quarter_panel_car" value="Partial" id="vinyl-tab38" autocomplete="off">
                                                      <label for="vinyl-tab38">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_rear_quarter_panel_car" value="Full" id="vinyl-tab39" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="passenger_rear_door_car" value="Partial" id="vinyl-tab40" autocomplete="off">
                                                      <label for="vinyl-tab40">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="passenger_rear_door_car" value="Full" id="vinyl-tab41" autocomplete="off">
                                                      <label for="vinyl-tab41">Full</label>
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="passenger_front_door_car" value="Partial" id="vinyl-tab42" autocomplete="off">
                                                      <label for="vinyl-tab42">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="passenger_front_door_car" value="Full" id="vinyl-tab43" autocomplete="off">
                                                      <label for="vinyl-tab43">Full</label>
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_a_piller_car" value="Partial" id="vinyl-tab44" autocomplete="off">
                                                      <label for="vinyl-tab44">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_a_piller_car" value="Full" id="vinyl-tab45" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_b_piller_car" value="Partial" id="vinyl-tab46" autocomplete="off"f>
                                                      <label for="vinyl-tab46">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_b_piller_car" value="Full" id="vinyl-tab47" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pass_c_piller_car" value="Partial" id="vinyl-tab48" autocomplete="off">
                                                      <label for="vinyl-tab48">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pass_c_piller_car" value="Full" id="vinyl-tab49" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="passenger_rocker_panel_car" value="Partial" id="vinyl-tab50" autocomplete="off">
                                                      <label for="vinyl-tab50">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="passenger_rocker_panel_car" value="Full" id="vinyl-tab51" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="passenger_mirror_car" value="Partial" id="vinyl-tab52" autocomplete="off">
                                                      <label for="vinyl-tab52">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="passenger_mirror_car" value="Full" id="vinyl-tab53" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pref_passenger_window_car" value="Partial" id="vinyl-tab54" autocomplete="off">
                                                      <label for="vinyl-tab54">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pref_passenger_window_car" value="Full" id="vinyl-tab55" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="pref_back_windshield_car" value="Partial" id="vinyl-tab56" autocomplete="off">
                                                      <label for="vinyl-tab56">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="pref_back_windshield_car" value="Full" id="vinyl-tab57" autocomplete="off">
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
                                                      <input type="radio" class="btn-check check_car driver_front_break checked" name="tailgate_car" value="Partial" id="vinyl-tab58" autocomplete="off">
                                                      <label for="vinyl-tab58">Partial</label>
                                                   </div>
                                                   <div class="form-btnw-wrap">
                                                      <input type="radio" class="btn-check car_check driver_front_break checked" name="tailgate_car" value="Full" id="vinyl-tab59" autocomplete="off">
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
                                       <div class="row align-items-center">
                                          <div class="col-lg-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br />
                                                Photos & Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list" id="display_image_list">
                                             <ul></ul>
                                          </div>
                                          <!--col-->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="install-btn-wrap">
                                 <a class="car-adding__btn btn btn--accent cmn-btn back-btn">BACK TO FILM DETAILS</a>
                                 <button class="car-adding__btn btn btn--accent cmn-btn bck-btn-float saveCarDataInsertDetail" id="saveCarDataPPF" type="button">Save</button>
                              </div>
                        </form>
                     </div>
                  </div>



                  <!-- Van Tab -->
                  <div class="tab-pane fade" id="van" role="tabpanel" aria-labelledby="van-tab">
                     <form id="savevanPPF">
                        @csrf
                        <input type="hidden" name="type" value="Van">
                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">

                        <input type="hidden" value="{{$id}}" name="paint_protection_films_id">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="hood_van" value="Partial" id="vinyl-vantab1" autocomplete="off">
                                                   <label for="vinyl-vantab1">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="hood_van" value="Full" id="vinyl-vantab2" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="roof_van" value="Partial" id="vinyl-vantab3" autocomplete="off">
                                                   <label for="vinyl-vantab3">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="roof_van" value="Full" id="vinyl-vantab4" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="back_doors" value="Partial" id="vinyl-vantab5" autocomplete="off">
                                                   <label for="vinyl-vantab5">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="back_doors" value="Full" id="vinyl-vantab6" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="hatch_van" value="Partial" id="vinyl-vantab7" autocomplete="off">
                                                   <label for="vinyl-vantab7">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="hatch_van" value="Full" id="vinyl-vantab8" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="front_bumper_van" value="Partial" id="vinyl-vantab9" autocomplete="off">
                                                   <label for="vinyl-vantab9">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="front_bumper_van" value="Full" id="vinyl-vantab10" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="rear_bumper_van" id="vinyl-vantab11" value="Partial" autocomplete="off">
                                                   <label for="vinyl-vantab11">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="rear_bumper_van" id="vinyl-vantab12" value="Full" autocomplete="off">
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
                                          <div class="col-lg-12 col-12 wrap_brand_err_van">
                                             <input class="form-control border-0 wrap_brand_van" name="wrap_brand_van" value="" style="height:35px"></input>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row">
                                          <div class="col-lg-12 col-12">
                                             <label class="p-0 cmn-label">WRAP COLOR:</label>
                                          </div>
                                          <div class="col-lg-12 col-12 wrap_color_err_van">
                                             <input class="form-control border-0 wrap_color_van" name="wrap_color_van" value="" style="height:35px"></input>
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
                                                   <input type="radio" class="btn-check yes_waranty_van" name="is_waranty_van" value="YES" id="vinyl-vantab13" autocomplete="off">
                                                   <label for="vinyl-vantab13">YES</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check no_waranty_van" name="is_waranty_van" value="NO" id="vinyl-vantab14" autocomplete="off">
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
                                             <input class="form-control border-0 company_waranty_van" name="waranty_company_van" value="" style="height:35px"></input>
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="driver_mirror_van" value="Partial" id="vinyl-vantab15" autocomplete="off">
                                                   <label for="vinyl-vantab15">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap"> 
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="driver_mirror_van" value="Full" id="vinyl-vantab16" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="passenger_mirror_van" value="Partial" id="vinyl-vantab17" autocomplete="off">
                                                   <label for="vinyl-vantab17">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="passenger_mirror_van" value="Full" id="vinyl-vantab18" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="driver_front_quarter_panel_van" value="Partial" id="vinyl-vantab23" autocomplete="off">
                                                   <label for="vinyl-vantab23">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="driver_front_quarter_panel_van" value="Full" id="vinyl-vantab24" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="driver_rear_quarter_panel_van" id="vinyl-vantab25" value="Partial" autocomplete="off">
                                                   <label for="vinyl-vantab25">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="driver_rear_quarter_panel_van" id="vinyl-vantab26" value="Full" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="driver_front_door_van" value="Partial" id="vinyl-vantab27" autocomplete="off">
                                                   <label for="vinyl-vantab27">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="driver_front_door_van" value="Full" id="vinyl-vantab28" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="driver_rear_door_van" value="Partial" id="vinyl-vantab29" autocomplete="off">
                                                   <label for="vinyl-vantab29">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="driver_rear_door_van" value="Full" id="vinyl-vantab30" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="pass_front_quarter_panel_van" value="Partial" id="vinyl-vantab31" autocomplete="off">
                                                   <label for="vinyl-vantab31">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="pass_front_quarter_panel_van" value="Full" id="vinyl-vantab32" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="pass_rear_quarter_panel_van" value="Partial" id="vinyl-vantab33" autocomplete="off">
                                                   <label for="vinyl-vantab33">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="pass_rear_quarter_panel_van" value="Full" id="vinyl-vantab34" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="passenger_front_door_van" value="Partial" id="vinyl-vantab35" autocomplete="off">
                                                   <label for="vinyl-vantab35">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="passenger_front_door_van" value="Full" id="vinyl-vantab36" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="passenger_rear_door_van" id="vinyl-vantab37" autocomplete="off">
                                                   <label for="vinyl-vantab37">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="passenger_rear_door_van" id="vinyl-vantab38" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="pref_driver_window_van" value="Partial" id="vinyl-vantab39" autocomplete="off">
                                                   <label for="vinyl-vantab39">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="pref_driver_window_van" value="Full" id="vinyl-vantab40" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="pref_passenger_window_van" value="Partial" id="vinyl-vantab41" autocomplete="off">
                                                   <label for="vinyl-vantab41">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="pref_passenger_window_van" value="Full" id="vinyl-vantab42" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_van driver_front_break checked" name="pref_back_windshield_van" value="Partial" id="vinyl-vantab43" autocomplete="off">
                                                   <label for="vinyl-vantab43">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check van_check driver_front_break checked" name="pref_back_windshield_van" value="Full" id="vinyl-vantab44" autocomplete="off">
                                                   <label for="vinyl-vantab44">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">

                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check vanselectall" name="vantab23" id="vinyl-vantab45" autocomplete="off">
                                                   <label for="vinyl-vantab45">FULL VAN WRAP</label>
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
                                    <div class="row align-items-center">
                                       <div class="col-lg-4 col-12">
                                          <button class="btn uplaod">UPLOAD <br />
                                             Photos & Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded2" class="form-control image_uploaded2" value="Upload" multiple="multiple"> </button>
                                       </div>
                                       <div class="col-lg-8 col-12 text-center display_image_list2" id="display_image_list">
                                          <ul></ul>
                                       </div>
                                       <!--col-->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="install-btn-wrap">
                              <a class="car-adding__btn btn btn--accent cmn-btn back-btn">BACK TO FILM DETAILS</a>
                              <button class="car-adding__btn btn btn--accent cmn-btn bck-btn-float saveCarDataInsertDetail" id="saveVan" type="button">Save</button>
                           </div>
                        </div>
                     </form>
                  </div>

                  <!-- RV Tab -->
                  <div class="tab-pane fade" id="rv" role="tabpanel" aria-labelledby="rv-tab">
                     <form id="savervPPF">
                        @csrf
                        <input type="hidden" name="type" value="RV">
                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">

                        <input type="hidden" value="{{$id}}" name="paint_protection_films_id">
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
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="hood_rv" value="Partial" id="vinyl-rvtab1" autocomplete="off">
                                                   <label for="vinyl-rvtab1">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="hood_rv" value="Full" id="vinyl-rvtab2" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="front_rv" value="Partial" id="vinyl-rvtab3" autocomplete="off">
                                                   <label for="vinyl-rvtab3">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="front_rv" value="Full" id="vinyl-rvtab4" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="rear_rv" value="Partial" id="vinyl-rvtab5" autocomplete="off">
                                                   <label for="vinyl-rvtab5">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="rear_rv" value="Full" id="vinyl-rvtab6" autocomplete="off">
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
                                          <div class="col-lg-12 col-12 wrap_brand_err_rv">
                                             <input class="form-control border-0 wrap_brand_rv" name="wrap_brand_rv" value="" style="height:35px"></input>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row">
                                          <div class="col-lg-12 col-12">
                                             <label class="p-0 cmn-label">WRAP COLOR:</label>
                                          </div>
                                          <div class="col-lg-12 col-12 wrap_color_err_rv">
                                             <input class="form-control border-0 wrap_color_rv" name="wrap_color_rv" value="" style="height:35px"></input>
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
                                                   <input type="radio" class="btn-check yes_waranty_rv" name="is_waranty_rv" value="YES" id="vinyl-rvtab7" autocomplete="off">
                                                   <label for="vinyl-rvtab7">YES</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check no_waranty_rv" name="is_waranty_rv" value="NO" id="vinyl-rvtab8" autocomplete="off">
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
                                             <input class="form-control border-0 company_waranty_rv" name="waranty_company_rv" value="" style="height:35px"></input>
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
                                          <label class="cmn-label">PASSENGER FRONT SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="passenger_front_section_rv" value="Partial" id="vinyl-rvtab9" autocomplete="off">
                                                   <label for="vinyl-rvtab9">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="passenger_front_section_rv" value="Full" id="vinyl-rvtab10" autocomplete="off">
                                                   <label for="vinyl-rvtab10">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">PASSENGER MID SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="passenger_mid_section_rv" value="Partial" id="vinyl-rvtab11" autocomplete="off">
                                                   <label for="vinyl-rvtab11">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="passenger_mid_section_rv" value="Full" id="vinyl-rvtab12" autocomplete="off">
                                                   <label for="vinyl-rvtab12">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">PASSENGER REAR SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="passenger_rear_section_rv" value="Partial" id="vinyl-rvtab13" autocomplete="off">
                                                   <label for="vinyl-rvtab13">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="passenger_rear_section_rv" value="Full" id="vinyl-rvtab14" autocomplete="off">
                                                   <label for="vinyl-rvtab14">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>

                                    <div class="row align-items-center">

                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rvselectall" name="rvtab8" id="vinyl-rvtab15" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="driver_front_section_rv" value="Partial" id="vinyl-rvtab16" autocomplete="off">
                                                   <label for="vinyl-rvtab16">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="driver_front_section_rv" value="Full" id="vinyl-rvtab17" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="driver_mid_section_rv" value="Partial" id="vinyl-rvtab18" autocomplete="off">
                                                   <label for="vinyl-rvtab18">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="driver_mid_section_rv" value="Full" id="vinyl-rvtab19" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="driver_rear_section_rv" value="Partial" id="vinyl-rvtab20" autocomplete="off">
                                                   <label for="vinyl-rvtab20">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="driver_rear_section_rv" value="Full" id="vinyl-rvtab21" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_rv driver_front_break checked" name="roof_rv" value="Partial" id="vinyl-rvtab22" autocomplete="off">
                                                   <label for="vinyl-rvtab22">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check rv_check driver_front_break checked" name="roof_rv" value="Full" id="vinyl-rvtab23" autocomplete="off">
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
                                    <div class="row align-items-center">
                                       <div class="col-lg-4 col-12">
                                          <button class="btn uplaod">UPLOAD <br />
                                             Photos & Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded3" class="form-control image_uploaded3" value="Upload" multiple="multiple"> </button>
                                       </div>
                                       <div class="col-lg-8 col-12 text-center display_image_list3" id="display_image_list">
                                          <ul></ul>
                                       </div>
                                       <!--col-->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="install-btn-wrap">
                              <a class="car-adding__btn btn btn--accent cmn-btn back-btn">BACK TO FILM DETAILS</a>
                              <button class="car-adding__btn btn btn--accent cmn-btn bck-btn-float saveCarDataInsertDetail" id="saveRV" type="button">Save</button>
                           </div>
                        </div>
                     </form>
                  </div>

                  <!-- Trailer -->
                  <div class="tab-pane fade" id="trailer" role="tabpanel" aria-labelledby="trailer-tab">
                     <form id="savetrailerPPF">
                        @csrf
                        <input type="hidden" name="type" value="Trailer">
                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">

                        <input type="hidden" value="{{$id}}" name="paint_protection_films_id">
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
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="hood_trailer" value="Partial" id="vinyl-trailertab1" autocomplete="off">
                                                   <label for="vinyl-trailertab1">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="hood_trailer" value="Full" id="vinyl-trailertab2" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="front_trailer" value="Partial" id="vinyl-trailertab3" autocomplete="off">
                                                   <label for="vinyl-trailertab3">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="front_trailer" value="Full" id="vinyl-trailertab4" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="rear_trailer" value="Partial" id="vinyl-trailertab5" autocomplete="off">
                                                   <label for="vinyl-trailertab5">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="rear_trailer" value="Full" id="vinyl-trailertab6" autocomplete="off">
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
                                          <div class="col-lg-12 col-12 wrap_brand_err_trailer">
                                             <input class="form-control border-0 wrap_brand_trailer" name="wrap_brand_trailer" value="" style="height:35px"></input>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row">
                                          <div class="col-lg-12 col-12">
                                             <label class="p-0 cmn-label">WRAP COLOR:</label>
                                          </div>
                                          <div class="col-lg-12 col-12 wrap_color_err_trailer">
                                             <input class="form-control border-0 wrap_color_trailer" name="wrap_color_trailer" value="" style="height:35px"></input>
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
                                                   <input type="radio" class="btn-check yes_waranty_trailer" name="is_waranty_trailer" value="YES" id="vinyl-trailertab7" autocomplete="off">
                                                   <label for="vinyl-trailertab7">YES</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check no_waranty_trailer" name="is_waranty_trailer" value="NO" id="vinyl-trailertab8" autocomplete="off">
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
                                             <input class="form-control border-0 company_waranty_trailer" name="waranty_company_trailer" value="" style="height:35px"></input>
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
                                          <label class="cmn-label">PASSENGER FRONT SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="passenger_front_section_trailer" value="Partial" id="vinyl-trailertab9" autocomplete="off">
                                                   <label for="vinyl-trailertab9">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="passenger_front_section_trailer" value="Full" id="vinyl-trailertab10" autocomplete="off">
                                                   <label for="vinyl-trailertab10">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">PASSENGER MID SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="passenger_mid_section_trailer" value="Partial" id="vinyl-trailertab11" autocomplete="off">
                                                   <label for="vinyl-trailertab11">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="passenger_mid_section_trailer" value="Full" id="vinyl-trailertab12" autocomplete="off">
                                                   <label for="vinyl-trailertab12">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">PASSENGER REAR SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="passenger_rear_section_trailer" value="Partial" id="vinyl-trailertab13" autocomplete="off">
                                                   <label for="vinyl-trailertab13">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="passenger_rear_section_trailer" value="Full" id="vinyl-trailertab14" autocomplete="off">
                                                   <label for="vinyl-trailertab14">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>

                                    <div class="row align-items-center">

                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailorselectall" name="trailertab8" id="vinyl-trailertab15" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="driver_front_section_trailer" value="Partial" id="vinyl-trailertab16" autocomplete="off">
                                                   <label for="vinyl-trailertab16">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="driver_front_section_trailer" value="Full" id="vinyl-trailertab17" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="driver_mid_section_trailer" value="Partial" id="vinyl-trailertab18" autocomplete="off">
                                                   <label for="vinyl-trailertab18">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="driver_mid_section_trailer" value="Full" id="vinyl-trailertab19" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="driver_rear_section_trailer" value="Partial" id="vinyl-trailertab20" autocomplete="off">
                                                   <label for="vinyl-trailertab20">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="driver_rear_section_trailer" value="Full" id="vinyl-trailertab21" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_trailor driver_front_break checked" name="roof_trailer" value="Partial" id="vinyl-trailertab22" autocomplete="off">
                                                   <label for="vinyl-trailertab22">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check trailor_check driver_front_break checked" name="roof_trailer" value="Full" id="vinyl-trailertab23" autocomplete="off">
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
                                    <div class="row align-items-center">
                                       <div class="col-lg-4 col-12">
                                          <button class="btn uplaod">UPLOAD <br />
                                             Photos & Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded4" class="form-control image_uploaded4" value="Upload" multiple="multiple"> </button>
                                       </div>
                                       <div class="col-lg-8 col-12 text-center display_image_list4" id="display_image_list">
                                          <ul></ul>
                                       </div>
                                       <!--col-->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="install-btn-wrap">
                              <a class="car-adding__btn btn btn--accent cmn-btn back-btn">BACK TO FILM DETAILS</a>
                              <button class="car-adding__btn btn btn--accent cmn-btn bck-btn-float saveCarDataInsertDetail" id="saveTrailer" type="button">Save</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <!-- Bus Tab -->
                  <div class="tab-pane fade" id="bus" role="tabpanel" aria-labelledby="bus-tab">
                     <form id="savebusPPF">
                        @csrf
                        <input type="hidden" name="type" value="Bus">
                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">

                        <input type="hidden" value="{{$id}}" name="paint_protection_films_id">
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
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="hood_bus" value="Partial" id="vinyl-bustab1" autocomplete="off">
                                                   <label for="vinyl-bustab1">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="hood_bus" value="Full" id="vinyl-bustab2" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="front_bus" value="Partial" id="vinyl-bustab3" autocomplete="off">
                                                   <label for="vinyl-bustab3">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="front_bus" value="Full" id="vinyl-bustab4" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="rear_bus" value="Partial" id="vinyl-bustab5" autocomplete="off">
                                                   <label for="vinyl-bustab5">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="rear_bus" value="Full" id="vinyl-bustab6" autocomplete="off">
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
                                          <div class="col-lg-12 col-12 wrap_brand_err_bus">
                                             <input class="form-control border-0 wrap_brand_bus" name="wrap_brand_bus" value="" style="height:35px"></input>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row">
                                          <div class="col-lg-12 col-12">
                                             <label class="p-0 cmn-label">WRAP COLOR:</label>
                                          </div>
                                          <div class="col-lg-12 col-12 wrap_color_err_bus">
                                             <input class="form-control border-0 wrap_color_bus" name="wrap_color_bus" value="" style="height:35px"></input>
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
                                                   <input type="radio" class="btn-check yes_waranty_bus" name="is_waranty_bus" value="YES" id="vinyl-bustab7" autocomplete="off">
                                                   <label for="vinyl-bustab7">YES</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check no_waranty_bus" name="is_waranty_bus" value="NO" id="vinyl-bustab8" autocomplete="off">
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
                                             <input class="form-control border-0 company_waranty_bus" name="waranty_company_bus" value="" style="height:35px"></input>
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
                                          <label class="cmn-label">PASSENGER FRONT SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="passenger_front_section_bus" value="Partial" id="vinyl-bustab9" autocomplete="off">
                                                   <label for="vinyl-bustab9">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="passenger_front_section_bus" value="Full" id="vinyl-bustab10" autocomplete="off">
                                                   <label for="vinyl-bustab10">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">PASSENGER MID SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="passenger_mid_section_bus" value="Partial" id="vinyl-bustab11" autocomplete="off">
                                                   <label for="vinyl-bustab11">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="passenger_mid_section_bus" value="Full" id="vinyl-bustab12" autocomplete="off">
                                                   <label for="vinyl-bustab12">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row align-items-center">
                                       <div class="col-12 col-md-12">
                                          <label class="cmn-label">PASSENGER REAR SECTION:</label>
                                       </div>
                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="passenger_rear_section_bus" value="Partial" id="vinyl-bustab13" autocomplete="off">
                                                   <label for="vinyl-bustab13">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="passenger_rear_section_bus" value="Full" id="vinyl-bustab14" autocomplete="off">
                                                   <label for="vinyl-bustab14">Full</label>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>

                                    <div class="row align-items-center">

                                       <div class="col-12 col-md-12">
                                          <ul class="cmn-radio">
                                             <li>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check busselectall" name="bustab8" id="vinyl-bustab15" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="driver_front_section_bus" value="Partial" id="vinyl-bustab16" autocomplete="off">
                                                   <label for="vinyl-bustab16">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="driver_front_section_bus" value="Full" id="vinyl-bustab17" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="driver_mid_section_bus" value="Partial" id="vinyl-bustab18" autocomplete="off">
                                                   <label for="vinyl-bustab18">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="driver_mid_section_bus" value="Full" id="vinyl-bustab19" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="driver_rear_section_bus" value="Partial" id="vinyl-bustab20" autocomplete="off">
                                                   <label for="vinyl-bustab20">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="driver_rear_section_bus" value="Full" id="vinyl-bustab21" autocomplete="off">
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
                                                   <input type="radio" class="btn-check check_bus driver_front_break checked" name="roof_bus" value="Partial" id="vinyl-bustab22" autocomplete="off">
                                                   <label for="vinyl-bustab22">Partial</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                   <input type="radio" class="btn-check bus_check driver_front_break checked" name="roof_bus" value="Full" id="vinyl-bustab23" autocomplete="off">
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
                                    <div class="row align-items-center">
                                       <div class="col-lg-4 col-12">
                                          <button class="btn uplaod">UPLOAD <br />
                                             Photos & Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded5" class="form-control image_uploaded5" value="Upload" multiple="multiple"> </button>
                                       </div>
                                       <div class="col-lg-8 col-12 text-center display_image_list5" id="display_image_list">
                                          <ul>
                                          </ul>
                                       </div>
                                       <!--col-->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="install-btn-wrap">
                              <a class="car-adding__btn btn btn--accent cmn-btn back-btn">BACK TO FILM DETAILS</a>
                              <button class="car-adding__btn btn btn--accent cmn-btn bck-btn-float saveCarDataInsertDetail" id="saveBus" type="button">Save</button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                     <form id="saveotherPPF">
                        @csrf
                        <input type="hidden" name="type" value="Other">
                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">

                        <input type="hidden" value="{{$id}}" name="paint_protection_films_id">
                        <div class="form-box other-tab vinyl-content">
                           <div class="form-group">
                              <div class="row d-flex align-items-center">
                                 <div class="col-lg-12 col-12">
                                    <span class="label-title">
                                       <label class="cmn-label">WRAP DETAILS AND NOTES OF PROJECT</label>
                                    </span>
                                 </div>
                                 <div class="col-lg-12 col-12">
                                    <span class="input-wrap">
                                       <textarea class="form-control" name="wrap_detail_and_notes_of_project" rows="3"></textarea>
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
                                       <input class="form-control border-0 wrap_brand_other" name="wrap_brand_other" value="" style="height:35px"></input>
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
                                          <input class="custom-check__field notifications yes_waranty_other" id="vinyl-other-warn1" type="radio" value="YES" name="is_waranty_other">
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
                                          <input class="custom-check__field notifications no_waranty_other" id="vinyl-other-warn2" type="radio" value="NO" name="is_waranty_other">
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
                                       <input class="form-control border-0 company_waranty_other" name="waranty_company_other" value="" style="height:35px"></input>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="form-box">
                              <div class="form-group">
                                 <div class="upload-wrap">
                                    <div class="row align-items-center">
                                       <div class="col-lg-4 col-12">
                                          <button class="btn uplaod">UPLOAD <br />
                                             Photos & Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded6" class="form-control image_uploaded6" value="Upload" multiple="multiple"> </button>
                                       </div>
                                       <div class="col-lg-8 col-12 text-center display_image_list6" id="display_image_list">
                                          <ul></ul>
                                       </div>
                                       <!--col-->
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="install-btn-wrap">
                              <a class="car-adding__btn btn btn--accent cmn-btn back-btn">BACK TO FILM DETAILS</a>
                              <button class="car-adding__btn btn btn--accent cmn-btn bck-btn-float saveCarDataInsertDetail" id="saveOther" type="button">Save</button>
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
</main>
@endsection