@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <div class="vinyl_wrap detailing-correction">
                  <div class="row align-items-center">
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
                              <button class="nav-link navTabs active" id="correction-tab" data-bs-toggle="tab" data-bs-target="#correction" type="button" role="tab" aria-controls="correction" aria-selected="true">CORRECTION</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs" id="coating-tab" data-bs-toggle="tab" data-bs-target="#coating" type="button" role="tab" aria-controls="coating" aria-selected="false">CERAMIC COATING</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link navTabs" id="cleaning-tab" data-bs-toggle="tab" data-bs-target="#cleaning" type="button" role="tab" aria-controls="cleaning" aria-selected="false">CLEANING & MOBILE</button>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="tab-content" id="myTabContent">
                     <div class="tab-pane fade show active" id="correction" role="tabpanel" aria-labelledby="correction-tab">
                        <div class="vinyl-content">
                           <form id="correctionData">
                              @csrf
                              <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{$_GET['servicedata']}} @endif">
                              <input type="hidden" name="service_type" value="correction">
                              <input type="hidden" name="detailing_correction_id" value="@if(isset($_GET['id'])){{$_GET['id']}} @endif">
                              <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                              <div class="row">
                                 <div class="col-12 col-md-4">
                                    <div class="">
                                       <h4 class="text-center">Select vehicle type from dropdown menu to record paint thickness</h4>
                                       <div class="custom-input custom-input--default custom-input--with-label-above settings-form__field settings-form__field--state">
                                          <div class="custom-input__field-wr fv-row">
                                             <select class="custom-input__field bg-white p-3" id="type_vehicle" name="" type="text">
                                                <option value="">-select </option>
                                                <option value="Car - Sedan">Car - Sedan</option>
                                                <option value="Car - Coupe">Car - Coupe</option>
                                                <option value="Truck">Truck</option>
                                                <option value="SUV - X-Large">SUV - X-Large</option>
                                                <option value="SUV">SUV</option>
                                                <option value="RV">RV</option>
                                                <option value="Camper - Small">Camper - Small</option>
                                                <option value="Camper - Large" data-id="camper-lg">Camper - Large</option>
                                                <option value="Van - Family">Van - Family</option>
                                                <option value="Van - Small">Van - Small</option>
                                                <option value="Van - Large">Van - Large</option>
                                                <option value="Van - Hauler">Van - Hauler</option>
                                                <option value="Bus" data-id="bus">Bus</option>
                                                <option value="Commercial Truck - Small">Commercial Truck - Small</option>
                                                <option value="Commercial Truck - Medium">Commercial Truck - Medium</option>
                                                <option value="Commercial Truck - Large">Commercial Truck - Large</option>
                                                <option value="18-Wheeler Cab" data-id="wheeler-cab">18-Wheeler Cab</option>
                                                <option value="Travel Trailer">Travel Trailer</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div>
                                          <a href="/shop-settings/detailing-correction?servicedata={{$_GET['servicedata']}}">
                                             <img class="w-100 mt-4" src="/assets/images/not-recorded.png" />
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-8">
                                    <div class="correc-detail cmn-checked grid-2">
                                       <div class="btn-group" role="group">
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="HANDWASH WATERLESS" name="correction[]" id="checkbox1" autocomplete="off">
                                             <label for="checkbox1">HANDWASH WATERLESS</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="CLAY PROCESS" name="correction[]" id="checkbox2" autocomplete="off">
                                             <label for="checkbox2">CLAY PROCESS</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="DECONTAMINATED ORGANIC" name="correction[]" id="checkbox3" autocomplete="off">
                                             <label for="checkbox3">DECONTAMINATED ORGANIC</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="DECONTAMINATED ORGANIC" name="correction[]" id="checkbox4" autocomplete="off">
                                             <label for="checkbox4">DECONTAMINATED INDUSTRIAL</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="DECONTAMINATED PETROLEUM" name="correction[]" id="checkbox5" autocomplete="off">
                                             <label for="checkbox5">DECONTAMINATED PETROLEUM</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="IRON DEPOSIT REMOVAL" name="correction[]" id="checkbox6" autocomplete="off">
                                             <label for="checkbox6">IRON DEPOSIT REMOVAL</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="HAND WET-SAND" name="correction[]" id="checkbox7" autocomplete="off">
                                             <label for="checkbox7">HAND WET-SAND</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="COMPOUND HEAVY CUT" name="correction[]" id="checkbox8" autocomplete="off">
                                             <label for="checkbox8">COMPOUND HEAVY CUT</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="COMPOUND MEDIUM CUT" name="correction[]" id="checkbox9" autocomplete="off">
                                             <label for="checkbox9">COMPOUND MEDIUM CUT</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="MEDIUM POLISH" name="correction[]" id="checkbox10" autocomplete="off">
                                             <label for="checkbox10">MEDIUM POLISH</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="FINISHING POLISH" name="correction[]" id="checkbox11" autocomplete="off">
                                             <label for="checkbox11">FINISHING POLISH</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="LIQUID/PASTE/CARNUBA WAX" name="correction[]" id="checkbox12" autocomplete="off">
                                             <label for="checkbox12">LIQUID/PASTE/CARNUBA WAX</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="SPRAY SEALANT" name="correction[]" id="checkbox13" autocomplete="off">
                                             <label for="checkbox13">SPRAY SEALANT</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="checkbox" class="btn-check driver_front_break checked" value="CERAMIC COAT" name="correction[]" id="checkbox14" autocomplete="off">
                                             <label for="checkbox14">CERAMIC COAT</label>
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
                                             <button class="btn uplaod">UPLOAD <br /> Photos | Videos | Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list" id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <button class="car-adding__btn btn btn--accent cmn-btn" id="saveCorrection" type="button">Save</button>
                           </form>
                        </div>
                     </div>
                     <!-- Van Tab -->
                     <div class="tab-pane fade" id="coating" role="tabpanel" aria-labelledby="coating-tab">
                        <form id="creamicCoatingData">
                           @csrf
                           <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                           <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                           <input type="hidden" name="service_ids" value="5">
                           <div class="cmn-mx-75">
                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">COATING MANUFACTURER:</label>
                                       </div>
                                       <div class="col-md-8 col-12">
                                          <input type="text" name="coating_manufacturer" class="form-control border-0 coating_manufacturer" style="height:35px"></input>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">COATING TYPE:</label>
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="SiO2" name="coating_type" id="btnradio1" autocomplete="off">
                                                <label for="btnradio1">SiO2</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="TiO2" name="coating_type" id="btnradio2" autocomplete="off">
                                                <label for="btnradio2">TiO2</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="RGO" name="coating_type" id="btnradio3" autocomplete="off">
                                                <label for="btnradio3">RGO</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">REGISTERED:</label>
                                       </div>
                                       <div class="col-md-6 col-12 registered_err">
                                          <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check check_register_yes" value="Yes" name="registered" id="btnradio304" autocomplete="off">
                                                <label for="btnradio304">YES</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check check_register_no" value="No" name="registered" id="btnradio4" autocomplete="off">
                                                <label for="btnradio4">NO</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">REGISTERED COMPANY:</label>
                                       </div>
                                       <div class="col-md-8 col-12">
                                          <input type="text" class="form-control border-0 registered_company" readonly name="registered_company" style="height:35px"></input>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">WARRANTY:</label>
                                       </div>
                                       <div class="col-md-6 col-12 is_waranty">
                                          <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check yes_waranty_car" value="Yes" name="is_waranty" id="btnradio30" autocomplete="off">
                                                <label for="btnradio30">YES</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check no_waranty_car" value="No" name="is_waranty" id="btnradio31" autocomplete="off">
                                                <label for="btnradio31">NO</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">WARRANTY COMPANY:</label>
                                       </div>
                                       <div class="col-md-8 col-12">
                                          <input class="form-control border-0 company_waranty" name="waranty_company" readonly value="" style="height:35px"></input>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">ANNUAL REQUIRED:</label>
                                       </div>
                                       <div class="col-md-6 col-12 annual_required">
                                          <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check" value="YES" name="annual_required" id="btnradio5" autocomplete="off">
                                                <label for="btnradio5">YES</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check" value="NO" name="annual_required" id="btnradio6" autocomplete="off">
                                                <label for="btnradio6">NO</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="row d-flex">
                                       <div class="col-md-4 col-12">
                                          <label class="p-0">ANNUAL COMPLETED:</label>
                                       </div>
                                       <div class="col-md-6 col-12">
                                          <div class="btn-group annual-year-detailing cmn-radio" role="group" style="column-gap: 10px;">
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 1" name="annual_completed" id="btnradio7" autocomplete="off">
                                                <label for="btnradio7">YEAR 1</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 2" name="annual_completed" id="btnradio8" autocomplete="off">
                                                <label for="btnradio8">YEAR 2</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 3" name="annual_completed" id="btnradio9" autocomplete="off">
                                                <label for="btnradio9">YEAR 3</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 4" name="annual_completed" id="btnradio10" autocomplete="off">
                                                <label for="btnradio10">YEAR 4</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 5" name="annual_completed" id="btnradio11" autocomplete="off">
                                                <label for="btnradio11">YEAR 5</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 6" name="annual_completed" id="btnradio12" autocomplete="off">
                                                <label for="btnradio12">YEAR 6</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 7" name="annual_completed" id="btnradio13" autocomplete="off">
                                                <label for="btnradio13">YEAR 7</label>
                                             </div>
                                             <div class="form-btnw-wrap">
                                                <input type="radio" class="btn-check driver_front_break checked" value="YEAR 8" name="annual_completed" id="btnradio14" autocomplete="off">
                                                <label for="btnradio14">YEAR 8</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-box">
                                    <div class="form-group">
                                       <div class="upload-wrap">
                                          <div class="row d-flex align-items-center">
                                             <div class="col-lg-4 col-12">
                                                <button class="btn uplaod">UPLOAD <br /> Photos | Videos | Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded2" class="form-control image_uploaded2" value="Upload" multiple="multiple"> </button>
                                             </div>
                                             <div class="col-lg-8 col-12 text-center display_image_list2" id="display_image_list">
                                                <ul></ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <button class="car-adding__btn btn btn--accent cmn-btn" id="saveCreamicCoating" type="button">Save</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <!-- RV Tab -->
                     <div class="tab-pane fade" id="cleaning" role="tabpanel" aria-labelledby="cleaning-tab">
                        <form id="cleaningData">
                           @csrf
                           <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                           <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                           <input type="hidden" name="service_type" value="cleaning mobile">
                           <div class="correc-detail cmn-checked grid-2 cmn-mx-75">
                              <div class="btn-group" role="group">
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="HANDWASH" name="cleaning[]" id="checkbox15" autocomplete="off">
                                    <label for="checkbox15">HANDWASH</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="WATERLESS WASH" name="cleaning[]" id="checkbox16" autocomplete="off">
                                    <label for="checkbox16">WATERLESS WASH</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="CLAY" name="cleaning[]" id="checkbox17" autocomplete="off">
                                    <label for="checkbox17">CLAY</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="LIGHT POLISH" name="cleaning[]" id="checkbox18" autocomplete="off">
                                    <label for="checkbox18">LIGHT POLISH</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="RIM/TIRE CLEAN" name="cleaning[]" id="checkbox19" autocomplete="off">
                                    <label for="checkbox19">RIM/TIRE CLEAN</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="WAX / SEALANT" name="cleaning[]" id="checkbox20" autocomplete="off">
                                    <label for="checkbox20">WAX / SEALANT</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="TIRE DRESS" name="cleaning[]" id="checkbox21" autocomplete="off">
                                    <label for="checkbox21">TIRE DRESS</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="WINDOW COATING" name="cleaning[]" id="checkbox22" autocomplete="off">
                                    <label for="checkbox22">WINDOW COATING</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="QUICK DETAIL SPRAY" name="cleaning[]" id="checkbox23" autocomplete="off">
                                    <label for="checkbox23">QUICK DETAIL SPRAY</label>
                                 </div>
                                 <div class="form-btnw-wrap">
                                    <input type="checkbox" class="btn-check driver_front_break checked" value="SPRAY SEALANT" name="cleaning[]" id="checkbox24" autocomplete="off">
                                    <label for="checkbox24">SPRAY SEALANT</label>
                                 </div>
                              </div>

                              <div class="form-box">
                                 <div class="form-group">
                                    <div class="upload-wrap">
                                       <div class="row d-flex align-items-center">
                                          <div class="col-lg-4 col-12">
                                             <button class="btn uplaod">UPLOAD <br /> Photos | Videos | Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded3" class="form-control image_uploaded3" value="Upload" multiple="multiple"> </button>
                                          </div>
                                          <div class="col-lg-8 col-12 text-center display_image_list3" id="display_image_list">
                                             <ul></ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <button class="car-adding__btn btn btn--accent cmn-btn" id="saveCleaning" type="button">Save</button>

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