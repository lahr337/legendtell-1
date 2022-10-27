@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap">
            <div class="cmn-content cmn-mx-75">
               <form id="saveExhaust">
                  @csrf
                  <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif" > 
                  <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                  <div class="brake-service-wrap">
                     <div class="">
                        <div class="exhaust_content">
                           <h3 class="cmn_title">
                              MANIFOLD<small>(S)</small>
                           </h3>
                           <div class="btn-group" role="group">
                              <div class="form-btnw-wrap good-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Good" name="exhaust_manifold" id="exhaust_manifold" autocomplete="off">
                                 <label for="exhaust_manifold">Good</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Serviced" name="exhaust_manifold" id="exhaustradio2" autocomplete="off">
                                 <label for="exhaustradio2">Serviced</label>
                              </div>
                              <div class="form-btnw-wrap replaced-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Replaced" name="exhaust_manifold" id="exhaustradio3" autocomplete="off">
                                 <label for="exhaustradio3">Replaced</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Upgraded" name="exhaust_manifold" id="exhaustradio4">
                                 <label for="exhaustradio4">Upgraded</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Fabricated" name="exhaust_manifold" id="exhaustradio5" autocomplete="off">
                                 <label for="exhaustradio5">Fabricated</label>
                              </div>
                           </div>
                        </div>
                        <div class="exhaust_content">
                           <h3 class="cmn_title">
                              RESONATOR(S)
                           </h3>
                           <div class="btn-group" role="group">
                              <div class="form-btnw-wrap good-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Good" name="exhaust_resonator" id="exhaustradio6" autocomplete="off">
                                 <label for="exhaustradio6">Good</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Serviced" name="exhaust_resonator" id="exhaustradio7" autocomplete="off">
                                 <label for="exhaustradio7">Serviced</label>
                              </div>
                              <div class="form-btnw-wrap replaced-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Replaced" name="exhaust_resonator" id="exhaustradio8" autocomplete="off">
                                 <label for="exhaustradio8">Replaced</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Upgraded" name="exhaust_resonator" id="exhaustradio9" autocomplete="off">
                                 <label for="exhaustradio9">Upgraded</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Fabricated" name="exhaust_resonator" id="exhaustradio10" autocomplete="off">
                                 <label for="exhaustradio10">Fabricated</label>
                              </div>
                           </div>
                        </div>
                        <div class="exhaust_content">
                           <h3 class="cmn_title">
                              MUFFLER<small>(S)</small>
                           </h3>
                           <div class="btn-group" role="group">
                              <div class="form-btnw-wrap good-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Good" name="exhaust_muffler" id="exhaustradio11" autocomplete="off">
                                 <label for="exhaustradio11">Good</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Serviced" name="exhaust_muffler" id="exhaustradio12" autocomplete="off">
                                 <label for="exhaustradio12">Serviced</label>
                              </div>
                              <div class="form-btnw-wrap replaced-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Replaced" name="exhaust_muffler" id="exhaustradio13" autocomplete="off">
                                 <label for="exhaustradio13">Replaced</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Upgraded" name="exhaust_muffler" id="exhaustradio14" autocomplete="off">
                                 <label for="exhaustradio14">Upgraded</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Fabricated" name="exhaust_muffler" id="exhaustradio15" autocomplete="off">
                                 <label for="exhaustradio15">Fabricated</label>
                              </div>
                           </div>
                        </div>
                        <div class="exhaust_content">
                           <h3 class="cmn_title">
                              PIPES / CLAMPS
                           </h3>
                           <div class="btn-group" role="group">
                              <div class="form-btnw-wrap good-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Good" name="exhaust_pipes" id="exhaustradio16" autocomplete="off">
                                 <label for="exhaustradio16">Good</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Serviced" name="exhaust_pipes" id="exhaustradio17" autocomplete="off">
                                 <label for="exhaustradio17">Serviced</label>
                              </div>
                              <div class="form-btnw-wrap replaced-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Replaced" name="exhaust_pipes" id="exhaustradio18" autocomplete="off">
                                 <label for="exhaustradio18">Replaced</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Upgraded" name="exhaust_pipes" id="exhaustradio19" autocomplete="off">
                                 <label for="exhaustradio19">Upgraded</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Fabricated" name="exhaust_pipes" id="exhaustradio20" autocomplete="off">
                                 <label for="exhaustradio20">Fabricated</label>
                              </div>
                           </div>
                        </div>
                        <div class="exhaust_content">
                           <h3 class="cmn_title">
                              ISOLATORS / GASKETS / LINKAGES
                           </h3>
                           <div class="btn-group" role="group">
                              <div class="form-btnw-wrap good-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Good" name="exhaust_isolators" id="exhaustradio21" autocomplete="off">
                                 <label for="exhaustradio21">Good</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Serviced" name="exhaust_isolators" id="exhaustradio22" autocomplete="off">
                                 <label for="exhaustradio22">Serviced</label>
                              </div>
                              <div class="form-btnw-wrap replaced-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Replaced" name="exhaust_isolators" id="exhaustradio23" autocomplete="off">
                                 <label for="exhaustradio23">Replaced</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Upgraded" name="exhaust_isolators" id="exhaustradio24" autocomplete="off">
                                 <label for="exhaustradio24">Upgraded</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Fabricated" name="exhaust_isolators" id="exhaustradio25" autocomplete="off" >
                                 <label for="exhaustradio25">Fabricated</label>
                              </div>
                           </div>
                        </div>
                        <div class="exhaust_content">
                           <h3 class="cmn_title">
                              O2 SENSOR<small>(S)</small>
                           </h3>
                           <div class="btn-group" role="group">
                              <div class="form-btnw-wrap good-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Good" name="exhaust_o2sensor" id="exhaustradio26" autocomplete="off">
                                 <label for="exhaustradio26">Good</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Serviced" name="exhaust_o2sensor" id="exhaustradio27" autocomplete="off">
                                 <label for="exhaustradio27">Serviced</label>
                              </div>
                              <div class="form-btnw-wrap replaced-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Replaced" name="exhaust_o2sensor" id="exhaustradio28" autocomplete="off">
                                 <label for="exhaustradio28">Replaced</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Upgraded" name="exhaust_o2sensor" id="exhaustradio29" autocomplete="off">
                                 <label for="exhaustradio29">Upgraded</label>
                              </div>
                              <div class="form-btnw-wrap upgrade-checked">
                                 <input type="radio" class="btn-check driver_front_break checked" value="Fabricated" name="exhaust_o2sensor" id="exhaustradio30" autocomplete="off">
                                 <label for="exhaustradio30">Fabricated</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="cmn-note-flex">
                              <div class="form-group row">
                                 <div class="col-12 col-md-4">
                                          <label class="p-0">Notes:</label>
                                 </div>
                                 <div class="col-12 col-md-8">
                                       <textarea class="form-control"  name="exhasut_notes" rows="5"></textarea>
                                 </div>
                           </div> 
                     </div>         
                     <div class="form-box w-100">
                        <div class="form-group">
                           <div class="upload-wrap">
                              <div class="row d-flex align-items-center">
                                 <div class="col-lg-4 col-12">
                                    <button class="btn uplaod">UPLOAD
                                       Photos & Docs
                                        <input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple" accept="image/*,.pdf"> </button>
                                 </div>
               
                                 <div class="col-lg-8 col-12 text-center display_image_list"  id="display_image_list">
                                    <ul>
                                    </ul>                  
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
                     <button class="btn btn--accent cmn-btn InsertExhaust" id="InsertExhaust" type="button">Save</button>
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