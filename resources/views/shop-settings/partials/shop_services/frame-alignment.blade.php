@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="storeFrameAlignment">
                  @csrf
                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <div class="frame-align">
                     <div class="row align-items-center mb-5">
                        <div class="col-12 col-md-3">
                           <div class="ac_service_checklist_pdf">
                              <div class="chk_pdf_wrap"><img src="/assets/images/pdf.png"></div>
                              <button class="cmn-btn cmn-btn-dwnld" type="button">DOWNLOAD CHECKLIST</button>
                           </div>
                        </div>
                        <div class="col-12 col-md-9">
                           <ul class="nav nav-pills nav-tabs" role="tablist">
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs active" id="align-before-tab" data-bs-toggle="tab" data-bs-target="#align-before" type="button" role="tab" aria-controls="align-before" aria-selected="true">Alignment Before</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs current" id="align-after-tab" data-bs-toggle="tab" data-bs-target="#align-after" type="button" role="tab" aria-controls="align-after" aria-selected="false" disabled>Alignment After</button>
                              </li>
                           </ul>
                        </div>
                     </div>
                     <div class="roww">
                        <div class="tabs-panel">
                           <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="align-before" role="tabpanel" aria-labelledby="align-before-tab">
                                 <div class="frame-wrap">
                                    <h5 class="frame-title">Before Measurements</h5>
                                    <div class="row">
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Left Front</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_left_front_camber_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_left_front_camber_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_left_front_camber_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_left_front_caster_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_left_front_caster_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_left_front_caster_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Caster</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_left_front_toe_left_top" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                         <input type="text" name="before_left_front_toe_right_top" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                      </div>
                                                      <input type="text" name="before_left_front_toe_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-12 col-md-6">
                                          <img src="/assets/images/front.png">
                                          <div class="row justify-content-center">
                                             <div class="col-12 col-md-6">
                                                <ul class="align-wrap">
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <label class="cmn-label p-0">Front</label>
                                                            <div class="float-input">
                                                               <input type="text" name="before_front_total_toe_left_top" class="form-control border-0 check_inp decimal" value="">
                                                               <input type="text" name="before_front_total_toe_right_top" class="form-control border-0 check_inp decimal" value="">
                                                            </div>
                                                            <input type="text" name="before_front_total_toe_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <label class="cmn-label p-0">Total Toe</label>
                                                            <div class="float-input">
                                                               <input type="text" name="before_front_steer_ahead_left_top" class="form-control border-0 check_inp decimal" value="">
                                                               <input type="text" name="before_front_steer_ahead_right_top" class="form-control border-0 check_inp decimal" value="">
                                                            </div>
                                                            <input type="text" name="before_front_steer_ahead_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                            <label class="cmn-label p-0">Steer Ahead</label>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Right Front</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_right_front_camber_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_right_front_camber_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_right_front_camber_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_right_front_caster_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_right_front_caster_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_right_front_caster_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Caster</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_right_front_toe_left_top" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                         <input type="text" name="before_right_front_toe_right_top" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                      </div>
                                                      <input type="text" name="before_right_front_toe_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Left Rear</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_left_rear_camber_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_left_rear_camber_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_left_rear_camber_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_left_rear_toe_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_left_rear_toe_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_left_rear_toe_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-12 col-md-6">
                                          <img src="/assets/images/rear.png">
                                          <div class="row justify-content-center">
                                             <div class="col-12 col-md-6">
                                                <ul class="align-wrap">
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <label class="cmn-label p-0">Rear</label>
                                                            <div class="float-input">
                                                               <input type="text" name="before_rear_total_toe_left_top" class="form-control border-0 check_inp decimal" value="">
                                                               <input type="text" name="before_rear_total_toe_right_top" class="form-control border-0 check_inp decimal" value="">
                                                            </div>
                                                            <input type="text" name="before_rear_total_toe_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                            <label class="cmn-label p-0">Total Toe</label>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <div class="float-input">
                                                               <input type="text" name="before_rear_thrust_angle_left_top" class="form-control border-0 decimal" value="">
                                                               <input type="text" name="before_rear_thrust_angle_right_top" class="form-control border-0 decimal" value="">
                                                            </div>
                                                            <input type="text" name="before_rear_thrust_angle_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                            <label class="cmn-label p-0">Thrust Angle</label>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Right Rear</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_right_rear_camber_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_right_rear_camber_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_right_rear_camber_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="before_right_rear_toe_left_top" class="form-control border-0 check_inp decimal" value="">
                                                         <input type="text" name="before_right_rear_toe_right_top" class="form-control border-0 check_inp decimal" value="">
                                                      </div>
                                                      <input type="text" name="before_right_rear_toe_middle" class="form-control border-0 check_inp decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <li class="nav-item" role="presentation">
                                    <button class="car-adding__btn btn btn--accent cmn-btn mt-4 next-btn" id="align-after-tab" data-bs-toggle="tab" data-bs-target="#align-after" type="button" role="tab" aria-controls="align-after" aria-selected="true" disabled>Next</button>
                                 </li>
                              </div>
                              <!-- Van Tab -->
                              <div class="tab-pane fade" id="align-after" role="tabpanel" aria-labelledby="align-after-tab">
                                 <div class="frame-wrap">
                                    <h5 class="frame-title">Current Measurements</h5>
                                    <div class="row">
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Left Front</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_left_front_camber_left_top" class="form-control border-0 decimal" value="">
                                                         <input type="text" name="after_left_front_camber_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_left_front_camber_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_left_front_caster_left_top" class="form-control border-0 decimal" value="">
                                                         <input type="text" name="after_left_front_caster_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_left_front_caster_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Caster</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_left_front_toe_left_top" class="form-control border-0 decimal" style="height:35px" value="">
                                                         <input type="text" name="after_left_front_toe_right_top" class="form-control border-0 decimal" style="height:35px" value="">
                                                      </div>
                                                      <input type="text" name="after_left_front_toe_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-12 col-md-6">
                                          <img src="/assets/images/front.png">
                                          <div class="row justify-content-center">
                                             <div class="col-12 col-md-6">
                                                <ul class="align-wrap">
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <label class="cmn-label p-0">Front</label>
                                                            <div class="float-input">
                                                               <input type="text" name="after_front_total_toe_left_top" class="form-control border-0 decimal" value="">
                                                               <input type="text" name="after_front_total_toe_right_top" class="form-control border-0 decimal" value="">
                                                            </div>
                                                            <input type="text" name="after_front_total_toe_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <label class="cmn-label p-0">Total Toe</label>
                                                            <div class="float-input">
                                                               <input type="text" name="after_front_steer_ahead_left_top" class="form-control border-0 decimal" value="">
                                                               <input type="text" name="after_front_steer_ahead_right_top" class="form-control border-0 decimal" value="">
                                                            </div>
                                                            <input type="text" name="after_front_steer_ahead_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                            <label class="cmn-label p-0">Steer Ahead</label>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Right Front</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_right_front_camber_left_top" class="form-control border-0 decimal" value="">
                                                         <input type="text" name="after_right_front_camber_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_right_front_camber_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_right_front_caster_left_top" class="form-control border-0 decimal" value="@if($serviceData) {{$serviceData->AfterFrameAlignment->after_right_front_caster_left_top}} @endif">
                                                         <input type="text" name="after_right_front_caster_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_right_front_caster_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Caster</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_right_front_toe_left_top" class="form-control border-0 decimal" style="height:35px" value="">
                                                         <input type="text" name="after_right_front_toe_right_top" class="form-control border-0 decimal" style="height:35px" value="">
                                                      </div>
                                                      <input type="text" name="after_right_front_toe_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Left Rear</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_left_rear_camber_left_top" class="form-control border-0 decimal" value="">
                                                         <input type="text" name="after_left_rear_camber_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_left_rear_camber_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_left_rear_toe_left_top" class="form-control border-0 decimal" value="">
                                                         <input type="text" name="after_left_rear_toe_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_left_rear_toe_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                       <div class="col-12 col-md-6">
                                          <img src="/assets/images/rear.png">
                                          <div class="row justify-content-center">
                                             <div class="col-12 col-md-6">
                                                <ul class="align-wrap">
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <label class="cmn-label p-0">Rear</label>
                                                            <div class="float-input">
                                                               <input type="text" name="after_rear_total_toe_left_top" class="form-control border-0 decimal" value="">
                                                               <input type="text" name="after_rear_total_toe_right_top" class="form-control border-0 decimal" value="">
                                                            </div>
                                                            <input type="text" name="after_rear_total_toe_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                            <label class="cmn-label p-0">Total Toe</label>
                                                         </div>
                                                      </div>
                                                   </li>
                                                   <li class="left-align">
                                                      <div class="form-box">
                                                         <div class="form-group my-4 align-items-center">
                                                            <div class="float-input">
                                                               <input type="text" name="after_rear_thrust_angle_left_top" class="form-control border-0 decimal" value="">
                                                               <input type="text" name="after_rear_thrust_angle_right_top" class="form-control border-0 decimal" value="">
                                                            </div>
                                                            <input type="text" name="after_rear_thrust_angle_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                            <label class="cmn-label p-0">Thrust Angle</label>
                                                         </div>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 col-md-3">
                                          <ul class="align-wrap">
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Right Rear</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_right_rear_camber_left_top" class="form-control border-0 decimal" value="">
                                                         <input type="text" name="after_right_rear_camber_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_right_rear_camber_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                   </div>
                                                </div>
                                             </li>
                                             <li class="left-align">
                                                <div class="form-box">
                                                   <div class="form-group my-4 align-items-center">
                                                      <label class="cmn-label p-0">Camber</label>
                                                      <div class="float-input">
                                                         <input type="text" name="after_right_rear_toe_left_top" class="form-control border-0 decimal" value="">
                                                         <input type="text" name="after_right_rear_toe_right_top" class="form-control border-0 decimal" value="">
                                                      </div>
                                                      <input type="text" name="after_right_rear_toe_middle" class="form-control border-0 decimal" style="height:35px" value="">
                                                      <label class="cmn-label p-0">Toe</label>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="car-adding__btn btn btn--accent cmn-btn mt-4" id="saveFrameAlignment" type="button">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>

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