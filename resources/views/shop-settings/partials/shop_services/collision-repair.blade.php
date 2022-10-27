@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="collisionSave">
                  @csrf
                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <!-- <input type="hidden" id="c_id" name="tint_id" value="@if($serviceData){{ $serviceData->tint_id }} @endif"> -->
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <div class="service-type_collison-repair">
                     <div class="row">
                        <div class="form-box w-100">
                           <div class="form-group row">
                              <div class="col-lg-4">
                                 <label>Notes:</label>
                              </div>
                              <div class="col-lg-8">
                                 <textarea class="form-control" name="collision_notes" rows="5"></textarea>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="upload-wrap">
                                 <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                       <button class="btn uplaod">UPLOAD <br> BEFORE PHOTOS <input type="file" name="before_image[]" id="insert_products_uploaded" class="form-control before_image" value="Upload" multiple="multiple"> </button>
                                    </div>
                                    <div class="col-12 col-md-8 text-center display_product_list_before">
                                       <ul>
                                       </ul>
                                    </div>
                                    <!--col-->
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="upload-wrap">
                                 <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                       <button class="btn uplaod">UPLOAD <br> ESTIMATE DOCS <input type="file" name="document_of_estimate[]" id="insert_products_estimate" class="form-control estimated_document" value="Upload" multiple="multiple"> </button>
                                    </div>
                                    <div class="col-12 col-md-8 text-center display_product_list_estimate">
                                       <ul>
                                       </ul>
                                    </div>
                                    <!--col-->
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="upload-wrap">
                                 <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                       <button class="btn uplaod">UPLOAD <br> REPAIR DOCS <input type="file" name="document_of_repair[]" id="insert_products_repair_document" class="form-control repair_document" value="Upload" multiple="multiple"> </button>
                                    </div>
                                    <div class="col-12 col-md-8 text-center display_product_list_repair_document">
                                       <ul>
                                       </ul>
                                    </div>
                                    <!--col-->
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="upload-wrap">
                                 <div class="row align-items-center">
                                    <div class="col-12 col-md-4">
                                       <button class="btn uplaod">UPLOAD <br> AFTER PHOTOS<input type="file" name="after_image[]" id="insert_products_after_image" class="form-control after_image" value="Upload" multiple="multiple"> </button>
                                    </div>
                                    <div class="col-12 col-md-8 text-center display_product_list_after_image">
                                       <ul>
                                       </ul>
                                    </div>
                                    <!--col-->
                                 </div>
                              </div>
                           </div>
                        </div>
                        <button class="car-adding__btn btn btn--accent cmn-btn" id="saveCollision" type="button">Save</button>
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