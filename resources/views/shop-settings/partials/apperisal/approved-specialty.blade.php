@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="w-100">
            <div class="cmn-content">
               <div class="carwash_wrap">
                  <ul class="nav nav-pills nav-tabs border-0 approved-specialty-tab" id="myTab" role="tablist">
                     <li class="nav-item" role="presentation">
                        <button class="nav-link navTabs active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">CREATE APPRAISAL</button>
                     </li>
                     <li class="nav-item" role="presentation">
                        <button class="nav-link navTabs" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">MY APPRAISALS</button>
                     </li>
                  </ul>
                  <div class="tab-content" style="max-width:100%" id="myTabContent">
                     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     
                     <div class="form-box">
                        <form id="apperialapproved">
                           @csrf
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-lg-4">
                                       <label>APPRAISAL ID:</label>
                                    </div><!--col-->
                                    <div class="col-lg-8">
                                       <span style="background: #C4C4C4;display: flex;align-items: center;height: 40px;padding: 0 15px;color: #fff;">{{$apprisasetting->apparisal_id}}</span>
                                    </div><!--col-->
                                 </div><!--row-->
                              </div>
                           </div><!--col-->
                           <div class="col-lg-4">
                              <div class="form-group">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-lg-4">
                                       <label>VIN NUMBER:</label>
                                    </div><!--col-->
                                    <div class="col-lg-8">
                                       <input type="text" class="form-control border">
                                    </div><!--col-->
                                 </div><!--row-->
                              </div>
                           </div><!--col-->
                           <div class="col-lg-4">                              
                           </div><!--col-->
                        </div><!--row-->
                        </div><!--form-box-->
                        @foreach($SelectServices as $key =>$listservice)
                           <div class="create-appraisal mt-4">
                              <div class="row">
                                 <div class="col-lg-8">
                                    <div class="row">
                                       <div class="col-lg-2">
                                          <label>{{ucwords($listservice->service_name)}}:</label>
                                       </div><!--col-->
                                       <input type="hidden" name="service_id[]" value="{{$listservice->service_id}}">
                                       <div class="col-lg-10">
                                          <ul>
                                             <li><input type="radio" name="range_{{$key }}" value="5"><span>5</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="10"><span>10</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="15"><span>15</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="20"><span>20</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="25"><span>25</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="30"><span>30</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="35"><span>35</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="40"><span>40</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="45"><span>45</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="50"><span>50</span></li>         
                                             <li><input type="radio" name="range_{{$key }}" value="55"><span>55</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="60"><span>60</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="65"><span>65</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="70"><span>70</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="75"><span>75</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="80"><span>80</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="85"><span>85</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="90"><span>90</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="95"><span>95</span></li>
                                             <li><input type="radio" name="range_{{$key }}" value="100"><span>100</span></li>
                                          </ul>
                                       </div><!--col-->
                                    </div><!--row-->
                                 </div><!--col-->
                                 <div class="col-lg-4">
                                    <div class="upload-doc">
                                       <div>
                                          <button class="btn">UPLOAD <br> PHOTOS/ DOCS</button>
                                          <span>12 sources <br> uploaded</span>
                                       </div>
                                       <div class="w-100">
                                          <textarea name="description_{{$key }}[]" id="" class="form-control"></textarea>
                                       </div>
                                    </div>
                                 </div><!--col-->
                              </div><!--row-->
                           </div>
                           @endforeach

                        {{-- <div class="create-appraisal mt-4">
                           <div class="row">
                              <div class="col-lg-8">
                                 <div class="row">
                                    <div class="col-lg-2">
                              <label>Transmission:</label>
                                    </div><!--col-->
                                    <div class="col-lg-10">
                                       <ul>
                                          <li><input type="radio" name="radio2" value="5"><span>5</span></li>
                                          <li><input type="radio" name="radio2" value="10"><span>10</span></li>
                                          <li><input type="radio" name="radio2" value="15"><span>15</span></li>
                                          <li><input type="radio" name="radio2" value="20"><span>20</span></li>
                                          <li><input type="radio" name="radio2" value="25"><span>25</span></li>
                                          <li><input type="radio" name="radio2" value="30"><span>30</span></li>
                                          <li><input type="radio" name="radio2" value="35"><span>35</span></li>
                                          <li><input type="radio" name="radio2" value="40"><span>40</span></li>
                                          <li><input type="radio" name="radio2" value="45"><span>45</span></li>
                                          <li><input type="radio" name="radio2" value="50"><span>50</span></li>         
                                          <li><input type="radio" name="radio2" value="55"><span>55</span></li>
                                          <li><input type="radio" name="radio2" value="60"><span>60</span></li>
                                          <li><input type="radio" name="radio2" value="65"><span>65</span></li>
                                          <li><input type="radio" name="radio2" value="70"><span>70</span></li>
                                          <li><input type="radio" name="radio2" value="75"><span>75</span></li>
                                          <li><input type="radio" name="radio2" value="80"><span>80</span></li>
                                          <li><input type="radio" name="radio2" value="85"><span>85</span></li>
                                          <li><input type="radio" name="radio2" value="90"><span>90</span></li>
                                          <li><input type="radio" name="radio2" value="95"><span>95</span></li>
                                          <li><input type="radio" name="radio2" value="100"><span>100</span></li>
                                       </ul>
                                    </div><!--col-->
                                 </div><!--row-->
                              </div><!--col-->
                              <div class="col-lg-4">
                                 <div class="upload-doc">
                                    <div>
                                       <button class="btn">UPLOAD <br> PHOTOS/ DOCS</button>
                                       <span>12 sources <br> uploaded</span>
                                    </div>
                                    <div class="w-100">
                                       <textarea name="description" id="" class="form-control"></textarea>
                                    </div>
                                 </div>
                              </div><!--col-->
                           </div><!--row-->
                        </div> --}}



                        <section class="upload-box1">

                                 <div class="upload-doc">
                                    <div>
                                       <button class="btn">UPLOAD <br> PHOTOS/ DOCS</button>
                                       <span>12 sources <br> uploaded</span>
                                    </div>
                                    <div class="w-100">
                                       <label>Vehicle History / Heritage / Details:</label>
                                       <textarea name="description" id="" class="form-control"></textarea>
                                    </div>
                                 </div>
                                 <div class="upload-doc">
                                    <div>
                                       <button class="btn">UPLOAD <br> PHOTOS/ DOCS</button>
                                       <span>12 sources <br> uploaded</span>
                                    </div>
                                    <div class="w-100">
                                       <label>Known Issues / Manufacturer Recalls:</label>
                                       <textarea name="description" id="" class="form-control"></textarea>
                                    </div>
                                 </div>
                                 
                        </section>

                        <button  class="btn btn-primary appiralsubmit" type="button">Save </button>
                           {{-- <a href="#" class="btn save">SAVE</a> --}}
                           </form>      
                     </div>
                     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="vvn-number my-appraisal">
                           <div class="form-box">

                           <div class="form-group d-block">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-lg-4">
                                       <label>Search by VIN:</label>
                                    </div><!--col-->
                                    <div class="col-lg-8">
                                       <input type="text" class="form-control m-0">
                                    </div><!--col-->
                                 </div><!--row-->
                              </div>

                              <div class="form-group d-block">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-lg-4">
                                       <label>Search by <br> Appraisal ID#:</label>
                                    </div><!--col-->
                                    <div class="col-lg-8">
                                       <input type="text" class="form-control m-0">
                                    </div><!--col-->
                                 </div><!--row-->
                              </div>

                              <div class="form-group d-block">
                                 <div class="row d-flex align-items-center">
                                    <div class="col-lg-4">
                                       <label>Search by <br> Appraisal Date:</label>
                                    </div><!--col-->
                                    <div class="col-lg-8">
                                       <input type="text" class="form-control m-0">
                                    </div><!--col-->
                                 </div><!--row-->
                              </div>

                           </div>
                        </div>
                        
                        <a href="#" class="btn delete-appraisal">DELETE APPRAISAL</a>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         {{-- @include('shop-settings.partials.rightvinnumber') --}}
      </div>
   </div>
</div>
</main>
@endsection