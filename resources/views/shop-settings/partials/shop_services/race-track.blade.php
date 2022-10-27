@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<style> 
.run_two{
   pointer-events: none;
}
.run_three{
   pointer-events: none;
}
</style>
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               @csrf
               <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
               <input type="hidden" class="race_track_id" value="">
               <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

               <div class="race-track">
                  <div class="row" style="row-gap:25px;">

                     <div class="col-md-6">
                        <div class="cst-wrap">
                           <h2 class="text-center w-100 mb-4">TRACK</h2>

                           <div class="form-box">
                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">Track Name:</label>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-8 col-12">
                                       <input type="text" class="form-control border-0" style="height:35px" name="track_name" value="" id="track_name">
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>
                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">Location:</label>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-8 col-12">
                                       <input type="text" class="form-control border-0" style="height:35px" name="track_location" value="" id="track_location">
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>
                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">Track Type:</label>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-8 col-12">
                                       <input type="text" class="form-control border-0" style="height:35px" name="track_type" value="" id="track_type">
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>

                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">0-60 mph:</label>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-8 col-12 d-flex">
                                       <input type="text" class="form-control border-0 zero_to_sixty_mph numberonly" name="zero_to_sixty_mph" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>


                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">Lap 1:</label>
                                    </div>
                                    <!--col-->
                                    
                                    <div class="col-md-8 col-12 d-flex">
                                       <input type="text" class="form-control border-0 numberonly lap_one_min" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">min</label>
                                     
                                       <input type="text" class="form-control border-0 lap_one_sec numberonly" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;width:auto;">sec</label>
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>

                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">Lap 2:</label>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-8 col-12 d-flex">
                                       <input type="text" class="form-control border-0 lap_two_min numberonly" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">min</label>

                                       <input type="text" class="form-control border-0 lap_two_sec numberonly" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;width:auto;">sec</label>
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>


                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">Lap 3:</label>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-8 col-12 d-flex">
                                       <input type="text" class="form-control border-0 lap_three_min numberonly" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">min</label>

                                       <input type="text" class="form-control border-0 lap_three_sec numberonly" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;width:auto;">sec</label>
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>


                              <div class="form-group my-4 align-items-center">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">Lap 4:</label>
                                    </div>
                                    <!--col-->
                                    <div class="col-md-8 col-12 d-flex">
                                       <input type="text" class="form-control border-0 lap_four_min numberonly" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">min</label>

                                       <input type="text" class="form-control border-0 lap_four_sec numberonly" value="" style="height:35px">
                                       <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;width:auto;">sec</label>
                                    </div>
                                    <!--col-->
                                 </div>
                                 <!--row-->
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--col-->

                     <div class="col-md-6">
                        <div class="cst-border-left">
                           <h2 class="text-center w-100 mb-4">DRAG STRIP</h2>
                           <ul class="nav nav-pills nav-tabs" role="tablist">
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs active"  id="correction-tab" data-bs-toggle="tab" data-bs-target="#correction" type="button" role="tab" aria-controls="correction" aria-selected="true">RUN 1</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs run_two" id="coating-tab"  data-bs-toggle="tab" data-bs-target="#coating" type="button" role="tab" aria-controls="coating" aria-selected="false">RUN 2</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs run_three" id="cleaning-tab" data-bs-toggle="tab" data-bs-target="#cleaning" type="button" role="tab" aria-controls="cleaning" aria-selected="false">RUN 3</button>
                              </li>
                           </ul>
                           <div class="tab-content" id="myTabContent">
                              {{-- run 1 start --}}
                              <div class="tab-pane fade show active" id="correction" role="tabpanel" aria-labelledby="correction-tab">
                                 <div class="form-box">
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <input type="hidden" id="runonecheck" name="runonecheck" value="">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Strip Name:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0 " id="stripe_name_run_one" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Location:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0" id="stripe_location_run_one" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Opponent:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0" id="stripe_opponent_run_one" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">R/T:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 numberonly" id="stripe_r_or_t_run_one" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">60’:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 numberonly" id="stripe_sixty_degree_run_one" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">300':</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 numberonly" id="stripe_three_hundred_degree_run_one" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">0-60 mph:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 numberonly" id="zero_to_sixty_mph_run_one" value=""  style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">1/8 mile:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 numberonly" id="one_or_eight_mile_run_one" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">MPH:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 numberonly" id="mph_run_one" value="" style="height:35px;width:52%;">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">1/4 mile:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 numberonly" id="one_or_four_mile_run_one" value=""  style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                   
                                    <div class="row align-items-center vinyl-other-warranty cmn-radio">
                                       <div class="col-12 col-md-4">
                                       </div>
                                       <div class="col-12 col-md-8 d-flex">
                                          <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                             <div class="custom-check__field-wr m-0">
                                                <input class="custom-check__field notifications win_run_one driver_front_break checked" id="vinyl-other-warn1" type="radio" value="Win" name="status">
                                                <div class="custom-check__customize">
                                                   <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                   </svg>
                                                </div>
                                             </div>
                                             <label class="custom-check__label cmn-label" for="serviceCheck">Win</label>
                                          </div>
                                          <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                             <div class="custom-check__field-wr">
                                                <input class="custom-check__field notifications lost_run_one driver_front_break checked" id="vinyl-other-warn2" type="radio" value="lost" name="status">
                                                <div class="custom-check__customize">
                                                   <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                   </svg>
                                                </div>
                                             </div>
                                             <label class="custom-check__label cmn-label" for="serviceCheck">Lost</label>
                                          </div>
                                       </div>
                                    </div>
                                    <input type="hidden" value="1" class="tab_one">
                                    <div class="row">
                                       <div class="col-md-4 col-12">&nbsp;</div>
                                       <div class="col-md-8 col-12">
                                          <button class="car-adding__btn btn btn--accent cmn-btn mx-0 mb-5" id="saveRunOne" type="button">Save</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- run 1 end --}}
                              {{-- run 2 start --}}
                              <div class="tab-pane fade" id="coating" role="tabpanel" aria-labelledby="coating-tab">
                                 <div class="form-box">
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Strip Name:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0 stripe_name_run_two" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Location:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0 stripe_location_run_two" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Opponent:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0 stripe_opponent_run_two" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">R/T:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 stripe_r_or_t_run_two numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">60’:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 stripe_sixty_degree_run_two numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">300':</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 stripe_three_hundred_degree_run_two numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">0-60 mph:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 zero_to_sixty_mph_run_two numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">1/8 mile:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 one_or_eight_mile_run_two numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">MPH:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 mph_run_two numberonly" value="" style="height:35px;width:52%;">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">1/4 mile:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 one_or_four_mile_run_two numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    
                                    <div class="row align-items-center vinyl-other-warranty cmn-radio">
                                       <div class="col-12 col-md-4">
                                       </div>
                                       <div class="col-12 col-md-8 d-flex">
                                          <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                             <div class="custom-check__field-wr m-0">
                                                <input class="custom-check__field notifications driver_front_break checked" id="vinyl-other-warn3" type="radio" value="Win" name="status_two">
                                                <div class="custom-check__customize">
                                                   <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                   </svg>
                                                </div>
                                             </div>
                                             <label class="custom-check__label cmn-label" for="serviceCheck">Win</label>
                                          </div>
                                          <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                             <div class="custom-check__field-wr">
                                                <input class="custom-check__field notifications driver_front_break checked" id="vinyl-other-warn4" type="radio" value="lost" name="status_two">
                                                <div class="custom-check__customize">
                                                   <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                   </svg>
                                                </div>
                                             </div>
                                             <label class="custom-check__label cmn-label" for="serviceCheck">Lost</label>
                                          </div>
                                       </div>
                                    </div>
                                    <input type="hidden" value="2" class="tab_two">
                                    <div class="row">
                                       <div class="col-md-4 col-12">&nbsp;</div>
                                       <div class="col-md-8 col-12">
                                          <button class="car-adding__btn btn btn--accent cmn-btn mx-0 mb-5" id="saveRunTwo" type="button">Save</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- run 2 end --}}
                              {{-- run 3 start --}}
                              <div class="tab-pane fade" id="cleaning" role="tabpanel" aria-labelledby="cleaning-tab">
                                 <div class="form-box">
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Strip Name:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0 stripe_name_run_three" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Location:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0 stripe_location_run_three" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">Opponent:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12">
                                             <input type="text" class="form-control border-0 stripe_opponent_run_three" value="" style="height:35px">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">R/T:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 stripe_r_or_t_run_three numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">60’:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 stripe_sixty_degree_run_three numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">300':</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 stripe_three_hundred_degree_run_three numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">0-60 mph:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 zero_to_sixty_mph_run_three numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">1/8 mile:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 one_or_eight_mile_run_three numberonly" value=""  style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">MPH:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 mph_run_three numberonly" value="" style="height:35px;width:52%;">
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    <div class="form-group my-4 align-items-center">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-md-4 col-12">
                                             <label class="p-0">1/4 mile:</label>
                                          </div>
                                          <!--col-->
                                          <div class="col-md-8 col-12 d-flex">
                                             <input type="text" class="form-control border-0 one_or_four_mile_run_three numberonly" value="" style="height:35px">
                                             <label class="p-0" style="text-align: left;display: flex;align-items: center;margin-left: 10px;">sec</label>
                                          </div>
                                          <!--col-->
                                       </div>
                                       <!--row-->
                                    </div>
                                    
                                    <div class="row align-items-center vinyl-other-warranty cmn-radio">
                                       <div class="col-12 col-md-4">
                                       </div>
                                       <div class="col-12 col-md-8 d-flex">
                                          <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                             <div class="custom-check__field-wr m-0">
                                                <input class="custom-check__field notifications driver_front_break checked" id="vinyl-other-warn5" type="radio" value="Win" name="status_three">
                                                <div class="custom-check__customize">
                                                   <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                   </svg>
                                                </div>
                                             </div>
                                             <label class="custom-check__label cmn-label" for="serviceCheck">Win</label>
                                          </div>
                                          <div class="manage-notifications__item custom-check custom-check--with-label custom-check--with-label-xl mt-0">
                                             <div class="custom-check__field-wr">
                                                <input class="custom-check__field notifications driver_front_break checked" id="vinyl-other-warn6" type="radio" value="Lost" name="status_three">
                                                <div class="custom-check__customize">
                                                   <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                      <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white"></path>
                                                   </svg>
                                                </div>
                                             </div>
                                             <label class="custom-check__label cmn-label" for="serviceCheck">Lost</label>
                                          </div>
                                       </div>
                                    </div>
                                    <input type="hidden" value="3" class="tab_three">
                                    <div class="row">
                                       <div class="col-md-4 col-12">&nbsp;</div>
                                       <div class="col-md-8 col-12">
                                          <button class="car-adding__btn btn btn--accent cmn-btn mx-0 mb-5" id="saveRunThree" type="button">Save</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- run 3 end --}}
                           </div>
                        </div>
                        <!--col-->
                     </div>
                  </div>
                  <div class="form-box w-100">
                     <div class="form-group">
                        <div class="upload-wrap" style="border-top: 2px solid #D8D8D8;padding-top: 20px;margin: 0;">
                           <div class="row align-items-center">
                              <div class="col-md-4 col-12">
                                 <button class="btn uplaod">UPLOAD <br />
                                    Photos & Docs<input type="file" name="products_uploaded[]" id="insert_products_uploaded" class="form-control products_uploaded_image" value="Upload" multiple="multiple"> </button>
                              </div>
                              <div class="col-md-8 col-12 text-center display_image_list3">
                                 <ul>
                                 </ul>
                              </div>
                              <!--col-->
                           </div>
                           <!--row-->
                        </div>
                     </div>
                  </div>
                  <button class="car-adding__btn btn btn--accent cmn-btn" id="saveRaceTrack" type="button">Save</button>
               </div>
            </div>
         </div>
         @include('shop-settings.partials.rightvinnumber')
      </div>
   </div>
</div>
</main>
@endsection