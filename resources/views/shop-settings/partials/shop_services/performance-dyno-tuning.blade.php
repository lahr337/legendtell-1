@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="pdtData">
                  @csrf
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <div class="dyno-tuning">
                     <div class="row">
                        <div class="col-12 col-md-3">
                           <div class="ac_service_checklist_pdf data-file">
                              <div class="chk_pdf_wrap"><img src="/assets/images/data-icon.png"></div>
                              <button class="cmn-btn cmn-btn-dwnld" type="button">UPLOAD LT <br />DATA FILE</button>
                           </div>
                           <div class="ac_service_checklist_pdf data-file">
                              <div class="chk_pdf_wrap"><img src="/assets/images/data-icon.png"></div>
                              <button class="cmn-btn cmn-btn-dwnld" type="button">UPLOAD LT <br />DATA FILE</button>
                           </div>
                           <div class="ac_service_checklist_pdf data-file">
                              <div class="chk_pdf_wrap"><img src="/assets/images/data-icon.png"></div>
                              <button class="cmn-btn cmn-btn-dwnld" type="button">UPLOAD LT <br />DATA FILE</button>
                           </div>
                           <button class="btn--accent cmn-btn mt-4" type="button">PLOT DATA</button>
                        </div>

                        <div class="col-12 col-md-9">
                           <div class="form-box grid-2 cmn-checked">
                              <div class="form-btnw-wrap">
                                 <input type="checkbox" class="btn-check" value="CONNECT LT OBD DEVICE" name="engine_services[]" id="checkbox3" autocomplete="off">
                                 <label for="checkbox3" class="text-center">CONNECT <br /> LT OBD DEVICE</label>
                              </div>
                              <div class="form-btnw-wrap">
                                 <input type="checkbox" class="btn-check" value="PURCHASE LT OBD DEVICE" name="engine_services[]" id="checkbox4" autocomplete="off">
                                 <label for="checkbox4" class="text-center">PURCHASE <br /> LT OBD DEVICE</label>
                              </div>
                           </div>
                           <!-- <div class="dyno-graph mt-4">
                              <img src="/assets/images/dyno-graph.png">
                           </div> -->
                           <div class=" coming-soon">
                                <h2>COMING SOON</h2>
                            </div>
                        </div>
                     </div>


                     <!--col-->

                     <div class="form-box w-100">
                        <div class="form-group">
                           <div class="upload-wrap">
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
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="savePDT" type="button">Save</button>
                  </div>
            </div>
         </div>
         @include('shop-settings.partials.rightvinnumber')
      </div>
   </div>
</div>
</main>
@endsection