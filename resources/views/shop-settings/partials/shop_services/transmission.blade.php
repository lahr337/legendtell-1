@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="transmissionData">
                  @csrf
                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <div class="oil-service cmn-right-label cmn-mx-75">


                     <div class="form-box">
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">SERVICE TYPE:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <div class="btn-group flex-row fluid-service cmn-radio myerr service_type" role="group">
                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="FLUID/FILTER CHANGE" name="service_type" id="checkbox1" autocomplete="off">
                                       <label for="checkbox1" class="text-center">FLUID/FILTER CHANGE</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="DIAGNOSIS" name="service_type" id="checkbox2" autocomplete="off">
                                       <label for="checkbox2" class="text-center">DIAGNOSIS</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="REBUILD" name="service_type" id="checkbox3" autocomplete="off">
                                       <label for="checkbox3" class="text-center">REBUILD</label>
                                    </div>

                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="REPAIR" name="service_type" id="checkbox4" autocomplete="off">
                                       <label for="checkbox4" class="text-center">REPAIR</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="REPLACE / INSTALLATION" name="service_type" id="checkbox5" autocomplete="off">
                                       <label for="checkbox5" class="text-center">REPLACE / INSTALLATION</label>
                                    </div>

                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">FLUID TYPE:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input class="form-control border-0 myerr fluid_type" name="fluid_type" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">FILTER BRAND:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input class="form-control border-0 myerr filter_brand" name="filter_brand" value="" style="height:35px">
                              </div>
                           </div>
                        </div>


                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">LUBRICATION PAN GASKET REPLACED:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check driver_front_break checked" value="Yes" name="lubrication_pan_gasket_replaced" id="btnradio30" autocomplete="off">
                                       <label for="btnradio30">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check driver_front_break checked" value="No" name="lubrication_pan_gasket_replaced" id="btnradio31" autocomplete="off">
                                       <label for="btnradio31">NO</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">LUBRICATION PAN REPLACED:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <div class="btn-group btn-group d-flex flex-row" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check driver_front_break checked" value="Yes" name="lubrication_pan_replaced" id="btnradio110" autocomplete="off">
                                       <label for="btnradio110">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check driver_front_break checked" value="No" name="lubrication_pan_replaced" id="btnradio111" autocomplete="off">
                                       <label for="btnradio111">NO</label>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">MILEAGE:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input class="form-control border-0 myerr mileage numberonly" name="mileage" value="" style="height:35px">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">NOTES:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea class="form-control transmission_notes" name="transmission_notes" rows="5"></textarea>
                              </div>
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
                                    <ul></ul>
                                 </div>
                                 <!--col-->
                              </div>
                              <!--row-->
                           </div>
                        </div>
                     </div>
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="transmissionSave" type="button">Save</button>
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