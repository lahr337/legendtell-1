@extends('layout.default')
<!-- leftcode -->
@section('content')
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
    <div class="account-settings__content-form">
        <div class="grid-view-shop">
            <div class="common-wrap">
                <div class="cmn-content">
                    <form id="creamicCoatingData">
                        @csrf
                        <input type="hidden" id="issue_id" name="issue_id" value="@if(isset($_GET['id'])){{ $_GET['id'] }} @endif">

                        <input type="hidden" id="servicedata" name="carShopService" value="@if(isset($_GET['servicedata'])){{ $_GET['servicedata'] }} @endif">
                        <div class="cmn-mx-75">
                            <div class="form-box">
                                <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-4 col-12">
                                            <label class="p-0">COATING MANUFACTURER:</label>
                                        </div>
                                        <div class="col-md-8 col-12">
                                            <input type="text" name="coating_manufacturer" class="form-control border-0 coating_manufacturer" style="height:35px"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-4 col-12">
                                            <label class="p-0">COATING TYPE:</label>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="SiO2" name="coating_type" id="btnradio1" autocomplete="off">
                                                    <label for="btnradio1">SiO2</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="TiO2" name="coating_type" id="btnradio2" autocomplete="off">
                                                    <label for="btnradio2">TiO2</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="RGO" name="coating_type" id="btnradio3" autocomplete="off">
                                                    <label for="btnradio3">RGO</label>
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
                                        <div class="col-md-6 col-12 registered_err">
                                            <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check check_register_yes" value="Yes" name="registered" id="btnradio304" autocomplete="off">
                                                    <label for="btnradio304">YES</label>
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
                                            <input type="text" class="form-control border-0 registered_company" name="registered_company" style="height:35px"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-4 col-12">
                                            <label class="p-0">WARRANTY:</label>
                                        </div>
                                        <div class="col-md-6 col-12 is_waranty">
                                            <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check yes_waranty_car" value="Yes" name="is_waranty" id="btnradio30" autocomplete="off">
                                                    <label for="btnradio30">YES</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check no_waranty_car" value="No" name="is_waranty" id="btnradio31" autocomplete="off">
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
                                            <input class="form-control border-0 company_waranty" name="waranty_company" value="" style="height:35px"></input>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-md-4 col-12">
                                            <label class="p-0">ANNUAL REQUIRED:</label>
                                        </div>
                                        <div class="col-md-6 col-12 annual_required">
                                            <div class="btn-group d-flex flex-row cmn-radio" role="group" style="column-gap: 10px;">
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YES" name="annual_required" id="btnradio5" autocomplete="off" checked>
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
                                            <div class="btn-group annual-year-detailing cmn-radio" role="group" style="column-gap: 10px;">
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 1" name="annual_completed" id="btnradio7" autocomplete="off" checked>
                                                    <label for="btnradio7">YEAR 1</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 2" name="annual_completed" id="btnradio8" autocomplete="off">
                                                    <label for="btnradio8">YEAR 2</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 3" name="annual_completed" id="btnradio9" autocomplete="off">
                                                    <label for="btnradio9">YEAR 3</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 4" name="annual_completed" id="btnradio10" autocomplete="off">
                                                    <label for="btnradio10">YEAR 4</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 5" name="annual_completed" id="btnradio11" autocomplete="off">
                                                    <label for="btnradio11">YEAR 5</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 6" name="annual_completed" id="btnradio12" autocomplete="off">
                                                    <label for="btnradio12">YEAR 6</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 7" name="annual_completed" id="btnradio13" autocomplete="off">
                                                    <label for="btnradio13">YEAR 7</label>
                                                </div>
                                                <div class="form-btnw-wrap">
                                                    <input type="radio" class="btn-check" value="YEAR 8" name="annual_completed" id="btnradio14" autocomplete="off">
                                                    <label for="btnradio14">YEAR 8</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-box">
                                    <div class="form-group">
                                        <div class="upload-wrap">
                                            <div class="row d-flex align-items-center">
                                                <div class="col-lg-4 col-12">
                                                    <button class="btn uplaod">UPLOAD <br /> Photos | Videos | Docs <input type="file" name="image_uploaded[]" id="insert_image_uploaded" class="form-control image_uploaded" value="Upload" multiple="multiple"> </button>
                                                </div>
                                                <div class="col-lg-8 col-12 text-center display_image_list" id="display_image_list">
                                                    <ul></ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="car-adding__btn btn btn--accent cmn-btn" id="saveCreamicCoating" type="button">Save</button>
                            </div>
                    </form>
                </div>
            </div>

        </div>
        @include('shop-settings.partials.rightvinnumber')
    </div>
</div>
</main>
@endsection