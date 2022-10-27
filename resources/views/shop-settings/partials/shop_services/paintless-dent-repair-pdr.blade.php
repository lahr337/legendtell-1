@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <?php
            if (isset($serviceData->repaired_panels)) {
               $repaired_panels = explode(',', $serviceData->repaired_panels);
            } else {
               $repaired_panels = array();
            }
            ?>
            <div class="cmn-content">
               <form id="storePaintlessDentRepair">
                  @csrf
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <div class="dent-repair">
                     <div class="row justify-content-center mb-5">
                        <div class="col-12 col-md-8">
                           <ul class="nav nav-pills nav-tabs" role="tablist">
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs reset active vehicle_type" id="car-tab" data-bs-toggle="tab" data-bs-target="#car" type="button" role="tab" aria-controls="car" aria-selected="true">CAR</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs reset vehicle_type" id="truck-tab" data-bs-toggle="tab" data-bs-target="#truck" type="button" role="tab" aria-controls="truck" aria-selected="false">TRUCK</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs reset vehicle_type" id="suv-tab" data-bs-toggle="tab" data-bs-target="#suv" type="button" role="tab" aria-controls="suv" aria-selected="false">SUV</button>
                              </li>
                              <li class="nav-item" role="presentation">
                                 <button class="nav-link navTabs reset vehicle_type" id="other-tab" data-bs-toggle="tab" data-bs-target="#other" type="button" role="tab" aria-controls="other" aria-selected="false">OTHER</button>
                              </li>
                           </ul>
                        </div>
                        <input type="hidden" name="vehicle_type" id="vehicle_type" value="">
                     </div>
                     <div class="row">
                        <div class="col-12 col-md-3 mo-2">
                           <div class="repaired-panel cmn-checked myerr" id="repaired_pannels_err">
                              <h3>SELECT REPAIRED PANELS</h3>
                              <div class="grid-1 mb-2">
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" value="HOOD" class="btn-check uncheck" name="repaired_panels[]" id="hood" autocomplete="off">
                                    <label for="hood">HOOD</label>
                                 </div>
                              </div>
                              <div class="grid-2 mt-0">
                                 <div class="btn-group" role="group">
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="DRIVER FRONT QUARTER PANEL" class="btn-check uncheck" name="repaired_panels[]" id="windshield-front" autocomplete="off">
                                       <label for="windshield-front">DRIVER FRONT QUARTER PANEL</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="DRIVER REAR QUARTER PANEL" class="btn-check uncheck" name="repaired_panels[]" id="windshield-rear" autocomplete="off">
                                       <label for="windshield-rear">DRIVER REAR QUARTER PANEL</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="DRIVER A-PILLAR" class="btn-check uncheck" name="repaired_panels[]" id="gasket-front" autocomplete="off">
                                       <label for="gasket-front">DRIVER A-PILLAR</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="DRIVER B-PILLAR" class="btn-check uncheck" name="repaired_panels[]" id="gasket-rear" autocomplete="off">
                                       <label for="gasket-rear">DRIVER B-PILLAR</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="DRIVER C-PILLAR" class="btn-check uncheck" name="repaired_panels[]" id="mirror-alignment" autocomplete="off">
                                       <label for="mirror-alignment">DRIVER C-PILLAR</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="PASS FRONT QUARTER PANEL" class="btn-check uncheck" name="repaired_panels[]" id="sensor" autocomplete="off">
                                       <label for="sensor">PASS FRONT QUARTER PANEL</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="PASS REAR QUARTER PANEL" class="btn-check uncheck" name="repaired_panels[]" id="sensor-replace" autocomplete="off">
                                       <label for="sensor-replace">PASS REAR QUARTER PANEL</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="PASSENGER A-PILLAR" class="btn-check uncheck" name="repaired_panels[]" id="replace-driver" autocomplete="off">
                                       <label for="replace-driver">PASSENGER A-PILLAR</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="PASSENGER B-PILLAR" class="btn-check uncheck" name="repaired_panels[]" id="replace-driver-door" autocomplete="off">
                                       <label for="replace-driver-door">PASSENGER B-PILLAR</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="PASSENGER C-PILLAR" class="btn-check uncheck" name="repaired_panels[]" id="replace-driver-panel" autocomplete="off">
                                       <label for="replace-driver-panel">PASSENGER C-PILLAR</label>
                                    </div>
                                 </div>
                                 <div class="grid-1">
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="ROOF" class="btn-check uncheck" name="repaired_panels[]" id="roof" autocomplete="off">
                                       <label for="roof">ROOF</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="TRUNK-LID" class="btn-check uncheck" name="repaired_panels[]" id="replace-pass-rear" autocomplete="off">
                                       <label for="replace-pass-rear">TRUNK-LID</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="checkbox" value="TAILGATE" class="btn-check uncheck" name="repaired_panels[]" id="replace-pass-panel" autocomplete="off">
                                       <label for="replace-pass-panel">TAILGATE</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 mo-1">
                           <div class="tabs-panel">
                              <div class="tab-content" id="myTabContent">
                                 <div class="tab-pane fade" id="car" role="tabpanel" aria-labelledby="car-tab">
                                    <div class="vinyl-content">
                                       <img src="/assets/images/paint-dent-repair/sedan.jpg">
                                    </div>
                                 </div>
                                 <!-- Van Tab -->
                                 <div class="tab-pane fade" id="truck" role="tabpanel" aria-labelledby="truck-tab">
                                    <img src="/assets/images/paint-dent-repair/truck.jpg">
                                 </div>
                                 <!-- RV Tab -->
                                 <div class="tab-pane fade" id="suv" role="tabpanel" aria-labelledby="suv-tab">
                                    <img src="/assets/images/paint-dent-repair/suv.jpg">
                                 </div>
                                 <!-- Others -->
                                 <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                                    <div class="cmn-note-flex m-0">
                                       <div class="form-group row">
                                          <div class="col-12 col-md-4">
                                             <label class="p-0">Notes:</label>
                                          </div>
                                          <div class="col-12 col-md-8">
                                             <textarea class="form-control" name="paintless_note" id="paintless_note" rows="5"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-3 mo-3">
                           <div class="repaired-panel">
                              <h3>SELECT DAMAGE TYPE</h3>
                              <div class="grid-1 mb-3 cmn-radio myerr" id="damage_type_err">
                                 <div class="form-btnw-wrap">
                                    <input type="radio" value="HAIL DAMAGE" class="btn-check uncheck driver_front_break checked" name="damage_type" id="hail-damage" autocomplete="off">
                                    <label for="hail-damage">HAIL DAMAGE</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="radio" value="PRIOR POOR PDR" class="btn-check uncheck driver_front_break checked" name="damage_type" id="poor-pdr" autocomplete="off">
                                    <label for="poor-pdr">PRIOR POOR PDR</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="radio" value="FACTORY PAINT DAMAGE" class="btn-check uncheck driver_front_break checked" name="damage_type" id="factory-paint-damage" autocomplete="off">
                                    <label for="factory-paint-damage">FACTORY PAINT DAMAGE</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="radio" value="PRIOR PAINT DAMAGE" class="btn-check uncheck driver_front_break checked" name="damage_type" id="prior-paint-damage" autocomplete="off">
                                    <label for="prior-paint-damage">PRIOR PAINT DAMAGE</label>
                                 </div>

                                 <div class="form-btnw-wrap">
                                    <input type="radio" value="IMPACT DAMAGE" class="btn-check uncheck" name="damage_type" id="impact-damage" autocomplete="off">
                                    <label for="impact-damage">IMPACT DAMAGE</label>
                                 </div>

                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-box">
                        <div class="form-group">
                           <div class="upload-wrap">
                              <div class="row d-flex align-items-center">
                                 <div class="col-md-4 col-12">
                                    <button class="btn uplaod">UPLOAD <br /> Photos & Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                 </div>
                                 <div class="col-md-8 col-12 text-center display_image_list" id="display_image_list">
                                 <ul>
                                </ul>     
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="savePaintlessDentRepair" type="button">Save</button>
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