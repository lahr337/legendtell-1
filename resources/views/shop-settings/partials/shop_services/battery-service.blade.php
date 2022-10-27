@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="batteryServiceData">
                  @csrf
                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <div class="battery-service cmn-radio cmn-mx-75">
                     <div class="btn-group" role="group">
                        <div class="form-btnw-wrap">
                           <input type="radio" class="btn-check" name="service_type" value="REPLACEMENT" id="battery-service1" autocomplete="off" @if($serviceData) @if($serviceData->service_type == "REPLACEMENT") checked @endif @else checked @endif>
                           <label for="battery-service1">REPLACEMENT</label>
                        </div>
                        <div class="form-btnw-wrap">
                           <input type="radio" class="btn-check" name="service_type" value="UPGRADE" id="battery-service2" autocomplete="off" @if($serviceData) @if($serviceData->service_type == "UPGRADE") checked @endif @endif>
                           <label for="battery-service2">UPGRADE</label>
                        </div>
                     </div>
                     <div class="form-box mt-5">
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">BATTERY TYPE:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 battery_type" name="battery_type" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">BATTERY BRAND:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 battery_brand" name="battery_brand" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">PART NUMBER:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 part_number" name="part_number" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center"> 
                              <div class="col-md-4 col-12">
                                 <label class="p-0">MANUFACTURED DATE:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 manufactured_date" id="datepicker" name="manufactured_date" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">EXPIRATION DATE:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="date" class="form-control border-0 expiration_date" name="expiration_date" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="form-box w-100">
                        <div class="form-group">
                           <div class="upload-wrap">
                              <div class="row align-items-center">
                                 <div class="col-lg-4 col-12">
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
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="saveBatteryService" type="button">Save</button>
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