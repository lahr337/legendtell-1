@extends('layout.default')
<!-- leftcode -->
@section('content') @include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
    <style>
        .mynewcsl {
            pointer-events: none;
            background: #cdcdcd !Important;
        }

        .disable_btn {
            background: #cdcdcd !important;
        }
    </style>
    <div class="account-settings__content-form">
        <div class="grid-view-shop">
            <div class="common-wrap">
                <div class="cmn-content">
                    <form id="saveBreak">

                        @csrf
                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                        <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                        <div class="brake-service-wrap">
                            <div class="row">
                                <div class="col-12 col-md-6">

                                    <div class="">
                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                DRIVER FRONT BRAKES 
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_break" id="driver_front_break" autocomplete="off" value="Good">
                                                    <label for="driver_front_break">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_break" id="brkradio2" autocomplete="off" value="Bad">
                                                    <label for="brkradio2">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_break" id="brkradio3" autocomplete="off" value="Replaced">
                                                    <label for="brkradio3">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_break" id="brkradio4" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio4">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                DRIVER REAR BRAKES
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" id="brkradio5" name="driver_rear_break" value="Good">
                                                    <label for="brkradio5">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_rear_break" id="brkradio6" autocomplete="off" value="Bad">
                                                    <label for="brkradio6">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" id="brkradio7" name="driver_rear_break" value="Replaced">
                                                    <label for="brkradio7">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_rear_break" value="Upgrade" id="brkradio8" autocomplete="off">
                                                    <label for="brkradio8">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                DRIVER FRONT ROTORS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" id="brkradio9" name="driver_front_rotors" value="Good">
                                                    <label for="brkradio9">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" id="brkradio10" name="driver_front_rotors" value="Bad">
                                                    <label for="brkradio10">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" id="brkradio11" name="driver_front_rotors" value="Replaced">
                                                    <label for="brkradio11">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" value="Upgrade" class="btn-check driver_front_break checked" name="driver_front_rotors" id="brkradio12" autocomplete="off">
                                                    <label for="brkradio12">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                DRIVER REAR ROTORS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" id="brkradio13" name="driver_rear_rotors" value="Good">
                                                    <label for="brkradio13">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" id="brkradio14" name="driver_rear_rotors" value="Bad">
                                                    <label for="brkradio14">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_rear_rotors" id="brkradio15" autocomplete="off" value="Replaced">
                                                    <label for="brkradio15">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_rear_rotors" id="brkradio16" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio16">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                PASSENGER FRONT BRAKES
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_brakes" id="brkradio17" autocomplete="off" value="Good">
                                                    <label for="brkradio17">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" value="Bad" class="btn-check driver_front_break checked" name="passenger_front_brakes" id="brkradio18" autocomplete="off">
                                                    <label for="brkradio18">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_brakes" id="brkradio19" value="Replaced">
                                                    <label for="brkradio19">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" value="Upgraded" class="btn-check driver_front_break checked" name="passenger_front_brakes" id="brkradio20" autocomplete="off">
                                                    <label for="brkradio20">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                PASSENGER REAR BRAKES
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenter_rear_brakes" id="brkradio21" autocomplete="off" value="Good">
                                                    <label for="brkradio21">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenter_rear_brakes" value="Bad" id="brkradio22" autocomplete="off">
                                                    <label for="brkradio22">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenter_rear_brakes" value="Replaced" id="brkradio23" autocomplete="off">
                                                    <label for="brkradio23">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" value="Upgraded" class="btn-check driver_front_break checked" name="passenter_rear_brakes" id="brkradio24" autocomplete="off">
                                                    <label for="brkradio24">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                PASSENGER FRONT ROTORS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_rotors" value="Good" id="brkradio25" autocomplete="off">
                                                    <label for="brkradio25">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_rotors" value="Bad" id="brkradio26" autocomplete="off">
                                                    <label for="brkradio26">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_rotors" value="Replaced" id="brkradio27" autocomplete="off">
                                                    <label for="brkradio27">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_rotors" id="brkradio28" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio28">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                PASSENGER REAR ROTORS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_rear_rotors" id="brkradio29" autocomplete="off" value="Good">
                                                    <label for="brkradio29">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" value="Bad" class="btn-check driver_front_break checked" name="passenger_rear_rotors" id="brkradio30" autocomplete="off">
                                                    <label for="brkradio30">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" value="Replaced" class="btn-check driver_front_break checked" name="passenger_rear_rotors" id="brkradio31" autocomplete="off">
                                                    <label for="brkradio31">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" value="Upgraded" class="btn-check driver_front_break checked" name="passenger_rear_rotors" id="brkradio32" autocomplete="off">
                                                    <label for="brkradio32">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn--accent mt-5 cmn-btn m-ml-0 fluidactive" type="button" style="height:auto;border-radius:0;margin-right:0;">BRAKE SYSTEM FLUSH</button>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="brake-col">
                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                DRIVER FRONT CALIPERS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_calipers" id="brkradio33" autocomplete="off" value="Good">
                                                    <label for="brkradio33">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_calipers" id="brkradio34" autocomplete="off" value="Bad">
                                                    <label for="brkradio34">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_calipers" id="brkradio35" autocomplete="off" value="Replaced">
                                                    <label for="brkradio35">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_front_calipers" id="brkradio36" autocomplete="off" value="Upgarded">
                                                    <label for="brkradio36">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                DRIVER REAR CALIPERS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_rear_calipers" id="brkradio37" autocomplete="off" value="Good">
                                                    <label for="brkradio37">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_rear_calipers" id="brkradio38" autocomplete="off" value="Bad">
                                                    <label for="brkradio38">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" value="Replaced" class="btn-check driver_front_break checked" name="driver_rear_calipers" id="brkradio39" autocomplete="off">
                                                    <label for="brkradio39">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="driver_rear_calipers" id="brkradio40" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio40">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                PASSENGER FRONT CALIPERS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_calipers" id="brkradio41" autocomplete="off" value="Good">
                                                    <label for="brkradio41">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_calipers" id="brkradio42" autocomplete="off" value="Bad">
                                                    <label for="brkradio42">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_calipers" id="brkradio43" autocomplete="off" value="Replaced">
                                                    <label for="brkradio43">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_front_calipers" id="brkradio44" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio44">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                PASSENGER REAR CALIPERS
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_rear_calipers" value="Good" id="brkradio45" autocomplete="off">
                                                    <label for="brkradio45">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_rear_calipers" value="Bad" id="brkradio46" autocomplete="off">
                                                    <label for="brkradio46">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_rear_calipers" value="Replaced" id="brkradio47" autocomplete="off">
                                                    <label for="brkradio47">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="passenger_rear_calipers" value="Upgraded" id="brkradio48" autocomplete="off">
                                                    <label for="brkradio48">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                BRAKE HOSES
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_hoses" id="brkradio49" autocomplete="off" value="Good">
                                                    <label for="brkradio49">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_hoses" value="Bad" id="brkradio50" autocomplete="off">
                                                    <label for="brkradio50">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_hoses" value="Replaced" id="brkradio51" autocomplete="off">
                                                    <label for="brkradio51">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_hoses" value="Upgraded" id="brkradio52" autocomplete="off">
                                                    <label for="brkradio52">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                BRAKE LINES
                                            </h3>
                                            <div class="btn-group form-btnw-wrap " role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_lines" id="brkradio53" autocomplete="off" value="Good">
                                                    <label for="brkradio53">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_lines" id="brkradio54" autocomplete="off" value="Bad">
                                                    <label for="brkradio54">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_lines" id="brkradio55" autocomplete="off" value="Replaced">
                                                    <label for="brkradio55">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="brake_lines" id="brkradio56" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio56">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                WHEEL CYLINDER
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="wheel_cylinder" id="brkradio57" autocomplete="off" value="Good">
                                                    <label for="brkradio57">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="wheel_cylinder" id="brkradio58" autocomplete="off" value="Bad">
                                                    <label for="brkradio58">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="wheel_cylinder" id="brkradio59" autocomplete="off" value="Replaced">
                                                    <label for="brkradio59">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="wheel_cylinder" id="brkradio60" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio60">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="ac_service_content">
                                            <h3 class="ac_service_title">
                                                MASTER CYLINDER
                                            </h3>
                                            <div class="btn-group" role="group">
                                                <div class="form-btnw-wrap good-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="master_cylinder" id="brkradio61" autocomplete="off" value="Good">
                                                    <label for="brkradio61">Good</label>
                                                </div>

                                                <div class="form-btnw-wrap bad-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="master_cylinder" id="brkradio62" autocomplete="off" value="Bad">
                                                    <label for="brkradio62">Bad</label>
                                                </div>

                                                <div class="form-btnw-wrap replaced-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="master_cylinder" id="brkradio63" autocomplete="off" value="Replaced">
                                                    <label for="brkradio63">Replaced</label>
                                                </div>

                                                <div class="form-btnw-wrap upgrade-checked">
                                                    <input type="radio" class="btn-check driver_front_break checked" name="master_cylinder" id="brkradio64" autocomplete="off" value="Upgraded">
                                                    <label for="brkradio64">Upgraded</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-box mt-5">
                                        <div class="form-group align-items-center w-100 d-inline-block">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-lg-4 col-12">
                                                    <label class="p-0">BRAKE FLUID:</label>
                                                </div>
                                                <!--col-->
                                                <input type="hidden" id="chkfluiddate" value="0">
                                                <div class="col-lg-8 col-12">
                                                    <input class="form-control border-0 brake_fluid" name="brake_fluid" id="brake_fluid" type="text" value="" style="height:35px">
                                                </div>
                                                <!--col-->
                                            </div>
                                            <!--row-->
                                        </div>
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
                                                    <input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                            </div>

                                            <div class="col-lg-8 col-12 text-center display_image_list" id="display_image_list">
                                                <ul></ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn--accent cmn-btn InsertBreakService" type="button">Save</button>
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