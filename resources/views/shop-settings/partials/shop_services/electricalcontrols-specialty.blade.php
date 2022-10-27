@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="electricData">
                  @csrf
                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <div class="oil-service cmn-right-label cmn-mx-75">


                     <div class="form-box">
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">SYSTEM:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <input type="text" name="system" value="" class="form-control border-0 system myerr" style="height:35px">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">DIAGNOSIS:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea class="form-control diagnosis-electric myerr" name="diagnosis" rows="5"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <div class="row d-flex align-items-center">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">ACTION:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <div class="btn-group btn-group flex-row fluid-service" role="group">
                                    <div class="form-btnw-wrap upgrade-checked myerr electric-action">
                                       <input type="radio" class="btn-check driver_front_break checked" name="action" value="Repaired" id="checkbox1" autocomplete="off">
                                       <label for="checkbox1" class="text-center">REPAIRED</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check driver_front_break checked" name="action" value="Replaced" id="checkbox2" autocomplete="off">
                                       <label for="checkbox2" class="text-center">REPLACED</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check driver_front_break checked" name="action" value="upgraded" id="checkbox3" autocomplete="off">
                                       <label for="checkbox3" class="text-center">UPGRADED</label>
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
                                 <input type="text" name="manufacturer_by" value="" class="form-control border-0 manufacturer_by myerr" style="height:35px">
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
                                       <input type="radio" class="btn-check elictricalWarrenty" value="Yes" name="is_waranty" id="btnradio30" autocomplete="off">
                                       <label for="btnradio30">YES</label>
                                    </div>
                                    <div class="form-btnw-wrap upgrade-checked">
                                       <input type="radio" class="btn-check elictricalWarrenty" value="No" name="is_waranty" id="btnradio31" autocomplete="off">
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
                                 <input type="text" name="waranty_company" class="form-control border-0 waranty_company electricalwarentycompany" value="" style="height:35px" readonly>
                              </div>
                           </div>
                        </div>

                        <div class="form-group">
                           <div class="row d-flex">
                              <div class="col-md-4 col-12">
                                 <label class="p-0">NOTES:</label>
                              </div>
                              <div class="col-md-8 col-12">
                                 <textarea class="form-control" name="electric_notes" rows="5"></textarea>
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
                                       Photos & Docs<input type="file" name="products_uploaded[]" id="insert_products_uploaded" class="form-control products_uploaded" value="Upload" multiple="multiple"> </button>
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
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="electricSave" type="button">Save</button>
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