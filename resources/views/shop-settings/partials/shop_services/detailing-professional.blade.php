@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<?php
$vehicle_type = $_GET['vehicle_type']

?>
<style> 
.cmn-input input.vehicle_inp.filled {
    background: green;
}

.btn-measurement {
  background-color: #0076C6 !important;
  -webkit-border-radius: 10px;
  border-radius: 10px;
  border: none;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Arial;
  font-size: 14px;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  -webkit-animation: glowing 1500ms infinite;
  -moz-animation: glowing 1500ms infinite;
  -o-animation: glowing 1500ms infinite;
  animation: glowing 1500ms infinite;
}
@-webkit-keyframes glowing {
  0% { background-color: #0076C6; -webkit-box-shadow: 0 0 3px #0076C6; }
  50% { background-color: #0076C6; -webkit-box-shadow: 0 0 40px #0076C6; }
  100% { background-color: #0076C6; -webkit-box-shadow: 0 0 3px #0076C6; }
}

@-moz-keyframes glowing {
  0% { background-color: #0076C6; -moz-box-shadow: 0 0 3px #0076C6; }
  50% { background-color: #0076C6; -moz-box-shadow: 0 0 40px #0076C6; }
  100% { background-color: #0076C6; -moz-box-shadow: 0 0 3px #0076C6; }
}

@-o-keyframes glowing {
  0% { background-color: #0076C6; box-shadow: 0 0 3px #0076C6; }
  50% { background-color: #0076C6; box-shadow: 0 0 40px #0076C6; }
  100% { background-color: #0076C6; box-shadow: 0 0 3px #0076C6; }
}

@keyframes glowing {
  0% { background-color: #0076C6; box-shadow: 0 0 3px #0076C6; }
  50% { background-color: #0076C6; box-shadow: 0 0 40px #0076C6; }
  100% { background-color: #0076C6; box-shadow: 0 0 3px #0076C6; }
}

</style>
<div class="account-settings__content-wr">
   <div class="account-settings__content-form">
      <div class="grid-view-shop">
         <div class="common-wrap common-wrap-bg-none">
            <div class="cmn-content">
               <div class="cmn-detailing">
                  <div class="mechanic cmn-mx-55 number-center cmn-radio">
                     <h4>You can change your vehicle type selection if needed:</h4>
                     <div class="custom-input custom-input--default custom-input--with-label-above settings-form__field settings-form__field--state">
                        <div class="custom-input__field-wr fv-row">
                           <select class="custom-input__field" id="vehicle_type" name="vehicle_type">
                              <option value="">-select </option>
                              <option value="Car - Sedan">Car - Sedan</option>
                              <option value="Car - Coupe">Car - Coupe</option>
                              <option value="Truck">Truck</option>
                              <option value="SUV - X-Large">SUV - X-Large</option>
                              <option value="SUV">SUV</option>
                              <option value="RV">RV</option>
                              <option value="Camper - Small">Camper - Small</option>
                              <option value="Camper - Large" @if($vehicle_type=='camper-lg' )selected @endif data-id="camper-lg">Camper - Large</option>
                              <option value="Van - Family">Van - Family</option>
                              <option value="Van - Small">Van - Small</option>
                              <option value="Van - Large">Van - Large</option>
                              <option value="Van - Hauler">Van - Hauler</option>
                              <option value="Bus" data-id="bus" @if($vehicle_type=='bus' )selected @endif>Bus</option>
                              <option value="Commercial Truck - Small">Commercial Truck - Small</option>
                              <option value="Commercial Truck - Medium">Commercial Truck - Medium</option>
                              <option value="Commercial Truck - Large">Commercial Truck - Large</option>
                              <option value="18-Wheeler Cab" @if($vehicle_type=='wheeler-cab' )selected @endif data-id="wheeler-cab">18-Wheeler Cab</option>
                              <option value="Travel Trailer">Travel Trailer</option>
                           </select>
                        </div>
                        <div class="btn-group" role="group">
                           <div class="form-btnw-wrap">
                              <input type="radio" class="btn-check" value="Micron ( µm )" name="units1" id="units1" autocomplete="off" checked>
                              <label for="units1">Micron ( µm )</label>
                           </div>
                           <div class="form-btnw-wrap">
                              <input type="radio" class="btn-check" value="Millimeter (mils)" name="units1" id="units2" autocomplete="off">
                              <label for="units2">Millimeter (mils)</label>
                           </div>
                        </div>
                        <div class="active" style="text-align: center;  color:#0076C6; margin-bottom:20px">
                           <h4 class="btn-measurement">Please click on the vehicle image to take measurements</h4>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-12 col-md-12">
                        <div class="wheeler-1 cmn-input" data-bs-toggle="modal" href="#exampleModalToggle" role="button">
                           <img src="/assets/images/details-page/1/wheeler-cab.jpg" class="vehicle-full-1 @if($vehicle_type != 'wheeler-cab')d-none @endif vehicle" id="wheeler-cab">
                           <img src="/assets/images/details-page/bus/bus.jpg" class="vehicle-full-2 vehicle @if($vehicle_type != 'bus')d-none @endif" id="bus">
                           <img src="/assets/images/details-page/camper-lg/camper-lg.jpg" class="vehicle-full-3 @if($vehicle_type != 'camper-lg')d-none @endif vehicle" id="camper-lg">
                        </div>
                     </div>
                  </div>
                  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                     <div class="modal-dialog modal-dialog-centered vehicle-modal">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="btn-close cnf" data-close="exampleModalToggle" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                              <div class="vehicle-1 @if($vehicle_type != 'wheeler-cab')d-none @endif vehicle_mod" id="wheeler-cab1">
                                 <form id="wheelercabData">
                                    @csrf
                                    <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{$_GET['servicedata']}} @endif">
                                    <input type="hidden" name="vehicle_type" value="18-Wheeler Cab">
                                    <div class="row justify-content-center">
                                       <div class="col-12 col-md-2 space-between">
                                          <div class="wheeler-1 cmn-input">
                                             <img src="/assets/images/details-page/1/vehicle-1.png">
                                             <input type="number" value="" name="wheeler_cab_front_view_1" class="wheeler-input1 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_2" class="wheeler-input2 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_3" class="wheeler-input3 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_4" class="wheeler-input4 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_5" class="wheeler-input5 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_6" class="wheeler-input6 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_7" class="wheeler-input7 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_8" class="wheeler-input8 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_9" class="wheeler-input9 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_10" class="wheeler-input10 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_11" class="wheeler-input11 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_12" class="wheeler-input12 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_front_view_13" class="wheeler-input13 vehicle_inp" placeholder="0" />
                                          </div>
                                          <div class="wheeler-2 cmn-input">
                                             <img src="/assets/images/details-page/1/vehicle-2.png">
                                             <input type="number" value="" name="wheeler_cab_back_view_14" class="wheeler-input14 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_back_view_15" class="wheeler-input15 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_back_view_16" class="wheeler-input16 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_back_view_17" class="wheeler-input17 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_back_view_18" class="wheeler-input18 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_back_view_19" class="wheeler-input19 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_back_view_20" class="wheeler-input20 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_back_view_21" class="wheeler-input21 vehicle_inp" placeholder="0" />
                                          </div>
                                       </div>
                                       <div class="col-12 col-md-5 space-between">
                                          <div class="wheeler-3 cmn-input">
                                             <img src="/assets/images/details-page/1/vehicle-3.png">
                                             <input type="number" value="" name="wheeler_cab_right_side_22" class="wheeler-input22 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_23" class="wheeler-input23 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_24" class="wheeler-input24 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_25" class="wheeler-input25 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_26" class="wheeler-input26 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_27" class="wheeler-input27 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_28" class="wheeler-input28 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_29" class="wheeler-input29 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_30" class="wheeler-input30 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_31" class="wheeler-input31 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_32" class="wheeler-input32 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_33" class="wheeler-input33 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_34" class="wheeler-input34 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_35" class="wheeler-input35 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_36" class="wheeler-input36 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_37" class="wheeler-input37 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_38" class="wheeler-input38 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_39" class="wheeler-input39 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_40" class="wheeler-input40 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_41" class="wheeler-input41 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_42" class="wheeler-input42 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_43" class="wheeler-input43 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_44" class="wheeler-input44 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_45" class="wheeler-input45 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_46" class="wheeler-input46 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_47" class="wheeler-input47 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_48" class="wheeler-input48 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_49" class="wheeler-input49 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_50" class="wheeler-input50 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_51" class="wheeler-input51 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_52" class="wheeler-input52 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_right_side_53" class="wheeler-input53 vehicle_inp" placeholder="0" />
                                          </div>
                                          <div class="wheeler-4 cmn-input">
                                             <img src="/assets/images/details-page/1/vehicle-4.png">
                                             <input type="number" value="" name="wheeler_cab_left_side_54" class="wheeler-input54 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_55" class="wheeler-input55 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_56" class="wheeler-input56 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_57" class="wheeler-input57 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_58" class="wheeler-input58 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_59" class="wheeler-input59 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_60" class="wheeler-input60 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_61" class="wheeler-input61 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_62" class="wheeler-input62 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_63" class="wheeler-input63 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_64" class="wheeler-input65 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_65" class="wheeler-input66 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_66" class="wheeler-input67 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_67" class="wheeler-input68 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_68" class="wheeler-input69 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_69" class="wheeler-input70 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_70" class="wheeler-input71 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_71" class="wheeler-input72 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_72" class="wheeler-input73 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_73" class="wheeler-input74 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_74" class="wheeler-input75 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_75" class="wheeler-input76 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_76" class="wheeler-input77 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_77" class="wheeler-input78 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_78" class="wheeler-input79 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_79" class="wheeler-input80 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_80" class="wheeler-input81 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_81" class="wheeler-input82 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_82" class="wheeler-input84 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_left_side_83" class="wheeler-input85 vehicle_inp" placeholder="0" />
                                          </div>
                                       </div>
                                       <div class="col-12 col-md-2 space-between">
                                          <div class="wheeler-5 cmn-input">
                                             <img src="/assets/images/details-page/1/vehicle-5.png">
                                             <input type="number" value="" name="wheeler_cab_top_side_84" class="wheeler-input86 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_85" class="wheeler-input87 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_86" class="wheeler-input88 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_87" class="wheeler-input89 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_88" class="wheeler-input90 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_89" class="wheeler-input91 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_90" class="wheeler-input92 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_91" class="wheeler-input93 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_92" class="wheeler-input94 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_93" class="wheeler-input95 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_94" class="wheeler-input96 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_95" class="wheeler-input97 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_96" class="wheeler-input98 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_97" class="wheeler-input99 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_98" class="wheeler-input100 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_99" class="wheeler-input101 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_100" class="wheeler-input102 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_101" class="wheeler-input103 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_102" class="wheeler-input104 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_103" class="wheeler-input105 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_104" class="wheeler-input106 vehicle_inp" placeholder="0" />
                                             <input type="number" value="" name="wheeler_cab_top_side_105" class="wheeler-input107 vehicle_inp" placeholder="0" />
                                          </div>
                                       </div>
                                    </div>
                                    <button class="car-adding__btn btn btn--accent cmn-btn mt-5 saveVehicle" id="Wheeler-cab" type="button">Save</button>
                                 </form>
                              </div>

                              <div class="vehicle-2 @if($vehicle_type != 'bus')d-none @endif vehicle_mod" id="bus1">
                              <form id="busData">
                                    @csrf
                                    <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{$_GET['servicedata']}} @endif">
                                    <input type="hidden" name="vehicle_type" value="Bus">
                                 <div class="row justify-content-center">
                                    <div class="col-12 col-md-2 space-between">
                                       <div class="bus-1 cmn-input">
                                          <img src="/assets/images/details-page/bus/front-view.png">
                                          <input type="number" value="" name="front_view_1" class="bus-input1 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_2" class="bus-input2 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_3" class="bus-input3 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_4" class="bus-input4 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_5" class="bus-input5 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_6" class="bus-input6 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_7" class="bus-input7 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_8" class="bus-input8 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_9" class="bus-input9 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_10" class="bus-input10 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_11" class="bus-input11 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_12" class="bus-input12 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_13" class="bus-input13 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_14" class="bus-input14 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_15" class="bus-input15 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="front_view_16" class="bus-input16 vehicle_inp" placeholder="0" />
                                       </div>
                                       <div class="bus-2 cmn-input">
                                          <img src="/assets/images/details-page/bus/back-view.png">
                                          <input type="number" value="" name="back_view_17" class="bus-input17 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_18" class="bus-input18 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_19" class="bus-input19 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_20" class="bus-input20 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_21" class="bus-input21 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_22" class="bus-input22 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_23" class="bus-input23 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_24" class="bus-input24 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_25" class="bus-input25 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_26" class="bus-input26 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_27" class="bus-input27 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_28" class="bus-input28 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_29" class="bus-input29 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_30" class="bus-input30 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_31" class="bus-input31 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_32" class="bus-input32 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_33" class="bus-input33 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_34" class="bus-input34 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_35" class="bus-input35 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_36" class="bus-input36 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_37" class="bus-input37 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_38" class="bus-input38 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_39" class="bus-input39 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="back_view_40" class="bus-input40 vehicle_inp" placeholder="0" />

                                       </div>
                                    </div>
                                    <div class="col-12 col-md-6 space-between">
                                       <div class="bus-3 cmn-input">
                                          <img src="/assets/images/details-page/bus/side-right.png">
                                          <input type="number" value="" name="side_right_41" class="bus-input41 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_42" class="bus-input42 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_43" class="bus-input43 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_44" class="bus-input44 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_45" class="bus-input45 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_46" class="bus-input46 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_47" class="bus-input47 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_48" class="bus-input48 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_49" class="bus-input49 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_50" class="bus-input50 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_51" class="bus-input51 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_52" class="bus-input52 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_53" class="bus-input53 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_54" class="bus-input54 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_55" class="bus-input55 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_56" class="bus-input56 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_57" class="bus-input57 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_58" class="bus-input58 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_59" class="bus-input59 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_60" class="bus-input60 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_61" class="bus-input61 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_62" class="bus-input62 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_63" class="bus-input63 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_64" class="bus-input64 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_65" class="bus-input65 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_66" class="bus-input66 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_67" class="bus-input67 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_68" class="bus-input68 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_69" class="bus-input69 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_70" class="bus-input70 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_71" class="bus-input71 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_72" class="bus-input72 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_73" class="bus-input73 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_74" class="bus-input74 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_75" class="bus-input75 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_76" class="bus-input76 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_77" class="bus-input77 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_78" class="bus-input78 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_79" class="bus-input79 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_80" class="bus-input80 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_81" class="bus-input81 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_82" class="bus-input82 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_83" class="bus-input83 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_84" class="bus-input84 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_85" class="bus-input85 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_86" class="bus-input86 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_87" class="bus-input87 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_88" class="bus-input88 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_89" class="bus-input89 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_90" class="bus-input90 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_91" class="bus-input91 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_92" class="bus-input92 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_93" class="bus-input93 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_94" class="bus-input94 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_95" class="bus-input95 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_96" class="bus-input96 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_97" class="bus-input97 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_98" class="bus-input98 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_99" class="bus-input99 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_100" class="bus-input100 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_101" class="bus-input101 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_102" class="bus-input102 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_103" class="bus-input103 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_104" class="bus-input104 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_105" class="bus-input105 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_right_106" class="bus-input106 vehicle_inp" placeholder="0" />
                                       </div>
                                       <div class="bus-4 cmn-input">
                                          <img src="/assets/images/details-page/bus/side-left.png">
                                          <input type="number" value="" name="side_left_107" class="bus-input107 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_108" class="bus-input108 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_109" class="bus-input109 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_110" class="bus-input110 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_111" class="bus-input111 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_112" class="bus-input112 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_113" class="bus-input113 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_114" class="bus-input114 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_115" class="bus-input115 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_116" class="bus-input116 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_117" class="bus-input117 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_118" class="bus-input118 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_119" class="bus-input119 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_120" class="bus-input120 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_121" class="bus-input121 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_122" class="bus-input122 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_123" class="bus-input123 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_124" class="bus-input124 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_125" class="bus-input125 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_126" class="bus-input126 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_127" class="bus-input127 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_128" class="bus-input128 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_129" class="bus-input129 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_130" class="bus-input130 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_131" class="bus-input131 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_132" class="bus-input132 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_133" class="bus-input133 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_134" class="bus-input134 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_135" class="bus-input135 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_136" class="bus-input136 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_137" class="bus-input137 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_138" class="bus-input138 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_139" class="bus-input139 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_140" class="bus-input140 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_141" class="bus-input141 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_142" class="bus-input142 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_143" class="bus-input143 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_144" class="bus-input144 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_145" class="bus-input145 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_146" class="bus-input146 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_147" class="bus-input147 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_148" class="bus-input148 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_149" class="bus-input149 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_150" class="bus-input150 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_151" class="bus-input151 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_152" class="bus-input152 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_153" class="bus-input153 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_154" class="bus-input154 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_155" class="bus-input154 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_156" class="bus-input155 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_157" class="bus-input156 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_158" class="bus-input157 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_159" class="bus-input158 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_160" class="bus-input159 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_161" class="bus-input160 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_162" class="bus-input161 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_163" class="bus-input162 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_164" class="bus-input163 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_165" class="bus-input164 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_166" class="bus-input165 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_167" class="bus-input166 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_168" class="bus-input167 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_169" class="bus-input168 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_170" class="bus-input169 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_171" class="bus-input170 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_172" class="bus-input171 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_173" class="bus-input172 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_174" class="bus-input173 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_175" class="bus-input174 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_176" class="bus-input175 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_177" class="bus-input176 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_178" class="bus-input177 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_179" class="bus-input178 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_180" class="bus-input179 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_181" class="bus-input179 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_182" class="bus-input179 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_183" class="bus-input179 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_184" class="bus-input179 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_185" class="bus-input179 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="side_left_186" class="bus-input179 vehicle_inp" placeholder="0" />
                                       </div>
                                    </div>
                                    <div class="col-12 col-md-2 space-between">
                                       <div class="bus-5 cmn-input">
                                          <img src="/assets/images/details-page/bus/top-view.png">
                                          <input type="number" value="" name="top_view_187" class="bus-input180 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_188" class="bus-input181 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_189" class="bus-input182 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_190" class="bus-input183 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_191" class="bus-input184 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_192" class="bus-input185 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_193" class="bus-input186 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_194" class="bus-input187 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_195" class="bus-input188 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_196" class="bus-input189 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_197" class="bus-input190 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_198" class="bus-input191 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_199" class="bus-input192 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_200" class="bus-input193 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_201" class="bus-input194 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_202" class="bus-input195 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_203" class="bus-input196 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_204" class="bus-input197 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_205" class="bus-input198 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_206" class="bus-input199 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_207" class="bus-input200 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_208" class="bus-input201 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_209" class="bus-input202 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_210" class="bus-input203 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_211" class="bus-input204 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_212" class="bus-input205 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_213" class="bus-input206 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_214" class="bus-input207 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_215" class="bus-input208 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_216" class="bus-input209 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_217" class="bus-input210 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_218" class="bus-input211 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_219" class="bus-input212 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_220" class="bus-input213 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_221" class="bus-input214 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_222" class="bus-input215 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_223" class="bus-input216 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_224" class="bus-input217 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_225" class="bus-input218 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_226" class="bus-input219 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_227" class="bus-input220 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_228" class="bus-input221 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_229" class="bus-input222 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_230" class="bus-input223 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_231" class="bus-input224 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_232" class="bus-input225 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_233" class="bus-input226 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_234" class="bus-input227 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_235" class="bus-input228 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_236" class="bus-input229 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_237" class="bus-input230 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_238" class="bus-input231 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_239" class="bus-input232 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_240" class="bus-input233 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_241" class="bus-input234 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_242" class="bus-input235 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_243" class="bus-input236 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_244" class="bus-input237 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_245" class="bus-input238 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_246" class="bus-input239 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_247" class="bus-input240 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_248" class="bus-input241 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_249" class="bus-input242 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_250" class="bus-input243 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_251" class="bus-input244 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_252" class="bus-input245 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_253" class="bus-input246 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_254" class="bus-input247 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_255" class="bus-input248 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_256" class="bus-input249 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_257" class="bus-input250 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_258" class="bus-input251 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_259" class="bus-input252 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_260" class="bus-input253 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_261" class="bus-input254 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_262" class="bus-input255 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_263" class="bus-input256 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_264" class="bus-input257 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_265" class="bus-input258 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_266" class="bus-input259 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_267" class="bus-input260 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_268" class="bus-input261 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_269" class="bus-input262 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_270" class="bus-input263 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_271" class="bus-input264 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_272" class="bus-input265 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_273" class="bus-input266 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_274" class="bus-input267 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_275" class="bus-input268 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_276" class="bus-input269 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_277" class="bus-input270 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_278" class="bus-input271 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_279" class="bus-input272 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_280" class="bus-input273 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_281" class="bus-input274 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_282" class="bus-input275 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_283" class="bus-input276 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_284" class="bus-input277 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_285" class="bus-input278 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_286" class="bus-input279 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_287" class="bus-input280 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="top_view_288" class="bus-input281 vehicle_inp" placeholder="0" />
                                       </div>
                                    </div>
                                 </div>
                                 <button class="car-adding__btn btn btn--accent cmn-btn mt-5 saveVehicle" id="saveBus" type="button">Save</button>
                              </form>
                              </div>

                              <div class="vehicle-3 @if($vehicle_type != 'camper-lg')d-none @endif vehicle_mod" id="camper-lg2">
                              <form id="camperLargeData">
                                    @csrf
                                    <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{$_GET['servicedata']}} @endif">
                                    <input type="hidden" name="vehicle_type" value="Camper - Large">
                                 <div class="row justify-content-center">
                                    <div class="col-12 col-md-8 space-between">
                                       <div class="camper-lg cmn-input">
                                          <img src="/assets/images/details-page/camper-lg/camper-lg-right.png">
                                          <input type="number" value="" name="camper_lg_right_1" class="camper-lg-1 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_2" class="camper-lg-2 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_3" class="camper-lg-3 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_4" class="camper-lg-4 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_5" class="camper-lg-5 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_6" class="camper-lg-6 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_7" class="camper-lg-7 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_8" class="camper-lg-8 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_9" class="camper-lg-9 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_10" class="camper-lg-10 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_11" class="camper-lg-11 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_12" class="camper-lg-12 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_13" class="camper-lg-13 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_14" class="camper-lg-14 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_15" class="camper-lg-15 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_16" class="camper-lg-16 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_17" class="camper-lg-17 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_18" class="camper-lg-18 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_19" class="camper-lg-19 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_20" class="camper-lg-20 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_21" class="camper-lg-21 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_22" class="camper-lg-22 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_23" class="camper-lg-23 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_24" class="camper-lg-24 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_25" class="camper-lg-25 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_26" class="camper-lg-26 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_27" class="camper-lg-27 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_28" class="camper-lg-28 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_29" class="camper-lg-29 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_30" class="camper-lg-30 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_31" class="camper-lg-31 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_32" class="camper-lg-32 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_33" class="camper-lg-33 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_34" class="camper-lg-34 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_35" class="camper-lg-35 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_36" class="camper-lg-36 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_37" class="camper-lg-37 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_38" class="camper-lg-38 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_39" class="camper-lg-39 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_40" class="camper-lg-40 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_41" class="camper-lg-41 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_42" class="camper-lg-42 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_43" class="camper-lg-43 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_44" class="camper-lg-44 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_45" class="camper-lg-45 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_46" class="camper-lg-46 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_47" class="camper-lg-47 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_48" class="camper-lg-48 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_49" class="camper-lg-49 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_50" class="camper-lg-50 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_51" class="camper-lg-51 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_52" class="camper-lg-52 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_53" class="camper-lg-53 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_54" class="camper-lg-54 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_55" class="camper-lg-55 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_56" class="camper-lg-56 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_57" class="camper-lg-57 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_58" class="camper-lg-58 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_59" class="camper-lg-59 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_60" class="camper-lg-60 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_61" class="camper-lg-61 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_62" class="camper-lg-62 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_63" class="camper-lg-63 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_64" class="camper-lg-64 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_65" class="camper-lg-65 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_66" class="camper-lg-66 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_67" class="camper-lg-67 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_68" class="camper-lg-68 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_69" class="camper-lg-69 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_70" class="camper-lg-70 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_71" class="camper-lg-71 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_72" class="camper-lg-72 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_73" class="camper-lg-73 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_74" class="camper-lg-74 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_75" class="camper-lg-75 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_76" class="camper-lg-76 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_77" class="camper-lg-77 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_78" class="camper-lg-78 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_79" class="camper-lg-79 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_80" class="camper-lg-80 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_81" class="camper-lg-81 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_82" class="camper-lg-82 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_83" class="camper-lg-83 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_84" class="camper-lg-84 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_85" class="camper-lg-85 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_86" class="camper-lg-86 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_87" class="camper-lg-87 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_88" class="camper-lg-88 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_89" class="camper-lg-89 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_90" class="camper-lg-90 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_91" class="camper-lg-91 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_92" class="camper-lg-92 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_93" class="camper-lg-93 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_94" class="camper-lg-94 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_95" class="camper-lg-95 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_96" class="camper-lg-96 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_97" class="camper-lg-97 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_98" class="camper-lg-98 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_99" class="camper-lg-99 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_100" class="camper-lg-100 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_101" class="camper-lg-101 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_102" class="camper-lg-102 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_103" class="camper-lg-103 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_104" class="camper-lg-104 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_105" class="camper-lg-105 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_106" class="camper-lg-106 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_107" class="camper-lg-107 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_108" class="camper-lg-108 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_109" class="camper-lg-109 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_110" class="camper-lg-110 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_111" class="camper-lg-111 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_112" class="camper-lg-112 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_113" class="camper-lg-113 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_114" class="camper-lg-114 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_115" class="camper-lg-115 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_116" class="camper-lg-116 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_117" class="camper-lg-117 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_118" class="camper-lg-118 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_119" class="camper-lg-119 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_120" class="camper-lg-120 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_121" class="camper-lg-121 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_122" class="camper-lg-122 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_123" class="camper-lg-123 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_124" class="camper-lg-124 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_125" class="camper-lg-125 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_126" class="camper-lg-127 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_127" class="camper-lg-128 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_right_128" class="camper-lg-129 vehicle_inp" placeholder="0" />

                                       </div>
                                       <div class="camper-lg cmn-input">
                                          <img src="/assets/images/details-page/camper-lg/camper-lg-left.png">
                                          <input type="number" value="" name="camper_lg_left_129" class="camper-lg-131 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_130" class="camper-lg-132 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_131" class="camper-lg-133 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_132" class="camper-lg-134 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_133" class="camper-lg-135 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_134" class="camper-lg-136 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_135" class="camper-lg-137 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_136" class="camper-lg-138 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_137" class="camper-lg-139 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_138" class="camper-lg-140 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_139" class="camper-lg-141 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_140" class="camper-lg-142 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_141" class="camper-lg-143 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_142" class="camper-lg-144 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_143" class="camper-lg-145 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_144" class="camper-lg-146 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_145" class="camper-lg-147 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_146" class="camper-lg-148 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_147" class="camper-lg-149 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_148" class="camper-lg-150 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_149" class="camper-lg-151 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_150" class="camper-lg-152 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_151" class="camper-lg-153 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_152" class="camper-lg-154 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_153" class="camper-lg-155 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_154" class="camper-lg-156 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_155" class="camper-lg-157 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_156" class="camper-lg-158 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_157" class="camper-lg-159 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_158" class="camper-lg-160 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_159" class="camper-lg-161 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_160" class="camper-lg-162 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_161" class="camper-lg-163 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_162" class="camper-lg-164 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_163" class="camper-lg-165 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_164" class="camper-lg-166 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_165" class="camper-lg-167 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_166" class="camper-lg-168 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_167" class="camper-lg-169 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_168" class="camper-lg-170 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_169" class="camper-lg-171 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_170" class="camper-lg-172 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_171" class="camper-lg-173 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_172" class="camper-lg-174 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_173" class="camper-lg-175 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_174" class="camper-lg-176 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_175" class="camper-lg-178 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_176" class="camper-lg-179 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_177" class="camper-lg-180 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_178" class="camper-lg-181 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_179" class="camper-lg-182 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_180" class="camper-lg-183 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_181" class="camper-lg-184 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_182" class="camper-lg-185 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_183" class="camper-lg-186 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_184" class="camper-lg-187 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_185" class="camper-lg-188 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_186" class="camper-lg-189 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_187" class="camper-lg-190 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_188" class="camper-lg-191 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_189" class="camper-lg-192 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_190" class="camper-lg-194 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_191" class="camper-lg-195 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_192" class="camper-lg-196 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_193" class="camper-lg-197 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_194" class="camper-lg-198 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_195" class="camper-lg-199 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_196" class="camper-lg-200 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_197" class="camper-lg-201 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_198" class="camper-lg-202 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_199" class="camper-lg-203 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_200" class="camper-lg-204 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_201" class="camper-lg-205 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_202" class="camper-lg-206 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_203" class="camper-lg-207 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_204" class="camper-lg-208 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_205" class="camper-lg-209 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_206" class="camper-lg-210 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_207" class="camper-lg-211 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_208" class="camper-lg-212 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_209" class="camper-lg-213 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_210" class="camper-lg-214 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_211" class="camper-lg-215 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_212" class="camper-lg-216 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_213" class="camper-lg-217 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_214" class="camper-lg-218 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_215" class="camper-lg-219 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_216" class="camper-lg-220 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_217" class="camper-lg-221 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_218" class="camper-lg-222 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_219" class="camper-lg-223 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_220" class="camper-lg-224 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_221" class="camper-lg-225 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_221" class="camper-lg-226 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_223" class="camper-lg-227 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_224" class="camper-lg-228 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_225" class="camper-lg-229 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_226" class="camper-lg-230 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_227" class="camper-lg-231 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_228" class="camper-lg-232 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_229" class="camper-lg-233 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_230" class="camper-lg-234 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_231" class="camper-lg-235 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_232" class="camper-lg-236 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_233" class="camper-lg-238 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_234" class="camper-lg-239 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_235" class="camper-lg-240 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_236" class="camper-lg-241 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_237" class="camper-lg-242 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_238" class="camper-lg-243 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_239" class="camper-lg-244 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_240" class="camper-lg-245 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_241" class="camper-lg-246 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_242" class="camper-lg-247 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_243" class="camper-lg-248 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_244" class="camper-lg-249 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_245" class="camper-lg-250 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_246" class="camper-lg-251 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_247" class="camper-lg-252 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_248" class="camper-lg-253 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_249" class="camper-lg-254 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_250" class="camper-lg-255 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_251" class="camper-lg-256 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_252" class="camper-lg-257 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_253" class="camper-lg-258 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_254" class="camper-lg-259 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_255" class="camper-lg-260 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_256" class="camper-lg-261 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_257" class="camper-lg-263 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_left_258" class="camper-lg-264 vehicle_inp" placeholder="0" />
                                       </div>
                                    </div>
                                    <div class="col-12 col-md-2 space-between">
                                       <div class="camper-lg cmn-input">
                                          <img src="/assets/images/details-page/camper-lg/camper-lg-front.png">
                                          <input type="number" value="" name="camper_lg_front_259" class="camper-lg-265 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_260" class="camper-lg-266 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_261" class="camper-lg-267 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_262" class="camper-lg-268 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_263" class="camper-lg-269 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_264" class="camper-lg-270 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_265" class="camper-lg-271 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_266" class="camper-lg-272 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_267" class="camper-lg-273 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_268" class="camper-lg-274 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_269" class="camper-lg-275 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_270" class="camper-lg-276 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_271" class="camper-lg-277 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_272" class="camper-lg-278 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_273" class="camper-lg-279 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_274" class="camper-lg-280 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_275" class="camper-lg-281 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_276" class="camper-lg-282 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_277" class="camper-lg-283 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_278" class="camper-lg-284 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_279" class="camper-lg-285 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_280" class="camper-lg-286 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_281" class="camper-lg-287 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_282" class="camper-lg-288 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_283" class="camper-lg-289 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_284" class="camper-lg-290 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_285" class="camper-lg-291 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_286" class="camper-lg-292 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_287" class="camper-lg-293 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_288" class="camper-lg-294 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_289" class="camper-lg-295 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_290" class="camper-lg-296 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_291" class="camper-lg-297 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_292" class="camper-lg-298 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_293" class="camper-lg-299 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_294" class="camper-lg-300 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_295" class="camper-lg-301 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_296" class="camper-lg-302 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_297" class="camper-lg-303 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_front_298" class="camper-lg-304 vehicle_inp" placeholder="0" />



                                       </div>
                                       <div class="camper-lg cmn-input">
                                          <img src="/assets/images/details-page/camper-lg/camper-lg-back.png">
                                          <input type="number" value="" name="camper_lg_back_299" class="camper-lg-305 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_300" class="camper-lg-306 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_301" class="camper-lg-307 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_302" class="camper-lg-308 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_303" class="camper-lg-309 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_304" class="camper-lg-310 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_305" class="camper-lg-311 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_306" class="camper-lg-312 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_307" class="camper-lg-313 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_308" class="camper-lg-314 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_309" class="camper-lg-315 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_310" class="camper-lg-316 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_311" class="camper-lg-317 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_312" class="camper-lg-318 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_313" class="camper-lg-319 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_314" class="camper-lg-320 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_315" class="camper-lg-321 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_316" class="camper-lg-322 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_317" class="camper-lg-323 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_318" class="camper-lg-324 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_319" class="camper-lg-325 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_320" class="camper-lg-326 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_321" class="camper-lg-327 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_322" class="camper-lg-328 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_323" class="camper-lg-329 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_324" class="camper-lg-330 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_325" class="camper-lg-331 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_326" class="camper-lg-332 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_327" class="camper-lg-333 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_328" class="camper-lg-334 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_329" class="camper-lg-335 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_330" class="camper-lg-336 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_331" class="camper-lg-337 vehicle_inp" placeholder="0" />
                                          <input type="number" value="" name="camper_lg_back_332" class="camper-lg-338 vehicle_inp" placeholder="0" />
                                       </div>
                                    </div>
                                 </div>
                                 <button class="car-adding__btn btn btn--accent cmn-btn mt-5 saveVehicle" id="saveCamperLG" type="button">Save</button>
                              </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
         @include('shop-settings.partials.rightvinnumber')
      </div>
   </div>
</div>
</main>
@endsection
