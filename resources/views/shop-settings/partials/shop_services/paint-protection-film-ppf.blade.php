@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<style>
.url-disable{
   pointer-events: none;
}

</style>
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content">
               <form id="storePPF">
                  @csrf
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                  <div class="battery-service ppf cmn-radio">
                     <div class="btn-group cmn-mx-50" role="group">
                        <div class="form-btnw-wrap">
                           <input type="radio" class="btn-check" name="btnradio" id="ppf1" autocomplete="off" checked>
                           <label for="ppf1">FILM DETAILS</label>
                        </div>
                        <div class="form-btnw-wrap">
                           <?php  $servicedata = $_GET['servicedata']; ?>
                          
                           <a disabled class="url-disable" href="{{url("/shop-settings/install-details?servicedata=$servicedata")}}"> 
                              <label for="ppf2">INSTALL DETAILS</label>
                           </a>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-12">
                           <div class="form-box mt-5">
                              <div class="form-group">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">FILM MANUFACTURER:</label>
                                    </div>
                                    <div class="col-md-8 col-12 myerr film_manufacturer_err">
                                       <input type="text" class="form-control border-0 film_manufacturer" name="film_manufacturer" value="" style="height:35px"></input>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">FILM THICKNESS:</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="btn-group d-flex flex-row cmn-radio myerr film_thickness_err" role="group" style="column-gap: 10px;">
                                          <div class="form-btnw-wrap">
                                             <input type="radio" class="btn-check film_thickness driver_front_break checked" value="8 MIL" name="film_thickness" id="btnradio1" autocomplete="off">
                                             <label for="btnradio1">8 MIL</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="radio" class="btn-check film_thickness driver_front_break checked" value="10 MIL" name="film_thickness" id="btnradio2" autocomplete="off">
                                             <label for="btnradio2">10 MIL</label>
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
                                    <div class="col-md-6 col-12">
                                       <div class="btn-group d-flex flex-row cmn-radio myerr registered_err" role="group" style="column-gap: 10px;">
                                          <div class="form-btnw-wrap">
                                             <input type="radio" class="btn-check check_register_yes" value="Yes" name="registered" id="btnradio3" autocomplete="off">
                                             <label for="btnradio3">YES</label>
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
                                       <input type="text" class="form-control border-0 registered_company" name="registered_company" value="" style="height:35px"></input>
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">WARRANTY:</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="btn-group d-flex flex-row cmn-radio myerr is_waranty" role="group" style="column-gap: 10px;">
                                          <div class="form-btnw-wrap">
                                             <input type="radio" class="btn-check check_waranty_yes" value="Yes" name="is_waranty" id="btnradio30" autocomplete="off">
                                             <label for="btnradio30">YES</label>
                                          </div>
                                          <div class="form-btnw-wrap">
                                             <input type="radio" class="btn-check check_waranty_no" value="No" name="is_waranty" id="btnradio31" autocomplete="off">
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
                                       <input class="form-control border-0 waranty_company" style="height:35px"></input>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 col-12">
                           <div class="form-box mt-5">
                              <div class="form-group">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">ANNUAL REQUIRED:</label>
                                    </div>
                                    <div class="col-md-6 col-12">
                                       <div class="btn-group d-flex flex-row cmn-radio myerr annual_required" role="group" style="column-gap: 10px;">
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
                                       <div class="btn-group annual-year cmn-radio" role="group" style="column-gap: 10px;">
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

                              <div class="form-group">
                                 <div class="row d-flex">
                                    <div class="col-md-4 col-12">
                                       <label class="p-0">NOTES:</label>
                                    </div>
                                    <div class="col-md-8 col-12">
                                       <textarea class="form-control" name="description" rows="5"></textarea>
                                    </div>
                                 </div>
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
                                       Photos & Docs<input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                 </div>
                                 <div class="col-lg-8 col-12 text-center display_image_list" id="display_image_list">
                                    <ul>
                                    </ul>
                                 </div>
                                 <!--col-->
                              </div>
                              <!--row-->
                           </div>
                        </div>
                     </div>
                     <button class="car-adding__btn btn btn--accent cmn-btn" id="savePPF" type="button">Save</button>
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