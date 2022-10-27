@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="powderCoatingData">
                  @csrf
                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <div class="oil-service cmn-right-label cmn-mx-75">


                     <div class="form-box">
                        <div class="form-group">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">What was powder coated<span class="astrick">*</span>:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea class="form-control was_powder_coating myerr" name="was_powder_coating" rows="2"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">Powder Coating Manufacturer<span class="astrick">*</span>:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 manufacturer_by myerr" name="manufacturer_by" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">Powder Coating System<span class="astrick">*</span>:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 pc_system myerr" value="" name="pc_system" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">Color CODE<span class="astrick">*</span>:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 color_code myerr" value="" name="color_code" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">Paint COLOR<span class="astrick">*</span>:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" class="form-control border-0 myerr paint_color" value="" name="paint_color" style="height:35px">
                              </div>
                           </div>
                        </div>



                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">WARRANTY:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <div class="btn-group d-flex flex-row cmn-radio is_waranty myerr" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap">
                                       <input type="radio" value="Yes" class="btn-check powderWarrenty" name="is_waranty" id="btnradio30" autocomplete="off">
                                       <label for="btnradio30">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="radio" value="No" class="btn-check powderWarrenty" name="is_waranty" id="btnradio31" autocomplete="off">
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
                                 <input type="text" class="form-control border-0 powderwarentycompany waranty_company myerr" readonly value="" name="waranty_company" style="height:35px" @if($serviceData) @if($serviceData->is_waranty == "No") readonly @endif @endif>
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">NOTES:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea class="form-control powder_coating_note" name="powder_coating_note" rows="5"></textarea>
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
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="savePowderCoating" type="button">Save</button>
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