@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="partData">
                  @csrf
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">

                  <div class="oil-service cmn-right-label cmn-mx-75">


                     <div class="form-box">
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">SYSTEM:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input name="system" class="form-control border-0 system myerr" value="" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">DIAGNOSIS:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea class="form-control diagnosis myerr" name="diagnosis" rows="5"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">PART:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <div class="btn-group flex-row fluid-service cmn-radio myerr part_cl" role="group">
                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="OEM" name="part" id="checkbox1" autocomplete="off">
                                       <label for="checkbox1" class="text-center">OEM</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="AFTER MARKET" name="part" id="checkbox2" autocomplete="off">
                                       <label for="checkbox2" class="text-center">AFTER MARKET</label>
                                    </div>
                                    <div class="form-btnw-wrap">
                                       <input type="radio" class="btn-check driver_front_break checked" value="PERFORMANCE UPGRADE" name="part" id="checkbox3" autocomplete="off">
                                       <label for="checkbox3" class="text-center">PERFORMANCE UPGRADE</label>
                                    </div>


                                 </div>
                              </div>
                           </div>
                        </div>


                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">MANUFACTURER:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input name="manufacturer_by" class="form-control border-0 manufacturer_by myerr" value="" style="height:35px">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">PART NUMBER:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input name="part_number" value="" class="form-control border-0 part_number myerr" style="height:35px">
                              </div>
                           </div>
                        </div>


                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">WARRANTY:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <div class="btn-group btn-group d-flex flex-row myerr is_waranty" role="group" style="column-gap: 10px;">
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check partWarrenty" value="Yes" name="is_waranty" id="btnradio30" autocomplete="off">
                                       <label for="btnradio30">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check partWarrenty" value="No" name="is_waranty" id="btnradio31" autocomplete="off">
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
                                 <input name="waranty_company" class="form-control border-0 waranty_company myerr powderwarentycompany" value="" style="height:35px">
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">NOTES:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea class="form-control" name="part_note" rows="5"></textarea>
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
                                       Photos & Docs<input type="file" name="products_uploaded[]" id="insert_products_uploaded" class="form-control file_upload" value="Upload" multiple="multiple"> </button>
                                 </div>
                                 <div class="col-md-8 col-12 text-center display_image_list5">
                                    <ul></ul>
                                 </div>
                                 <!--col-->
                              </div>
                              <!--row-->
                           </div>
                        </div>
                     </div>
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="savePart" type="button">Save</button>
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