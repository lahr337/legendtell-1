@extends('layout.default')
<!-- leftcode -->
@section('content')
<style>
    .mynewcsl {
        pointer-events: none;
        background: #cdcdcd !Important;
    }
</style>
@include('shop-settings.leftshowmenu')
<div class="account-settings__content-wr">
    <div class="account-settings__content-form">
        <div class="grid-view-shop">
            <div class="common-wrap">
                <div class="cmn-content">
                    <h3 class="cmn-title">Select type of issue/repair</h3>
                    <ul class="services-c service-type">

                        <li><a href="javascript:void(0)" id="regular_service" class="issueBtn">General Repair</a></li>
                        <li><a href="javascript:void(0)" id="known_issue" class="issueBtn">Known Issue</a></li>
                        <li><a href="javascript:void(0)" id="new_install" class="issueBtn">Manufacturer Recall</a></li>
                        <li><a href="javascript:void(0)" id="manfacture_recall" class="issueBtn">New Install</a></li>
                        <li><a href="javascript:void(0)" id="general_repair" class="issueBtn">New Issue</a></li>
                        <li><a href="javascript:void(0)" id="new_issue" class="issueBtn">Regular Servicing</a></li>

                        {{-- <li><a href="javascript:void(0)" id="general_repair" class="issueBtn @if( $checkCarData &&$checkCarData->diagnosis !='') active @endif">General Repair</a></li>
            <li><a href="javascript:void(0)" id="known_issue" class="issueBtn @if($checkCarData &&$checkCarData->known_issue !='') active @endif">Known Issue</a></li>
            <li><a href="javascript:void(0)" id="manfacture_recall" class="issueBtn @if($checkCarData &&$checkCarData->install_info !='') active @endif">Manufacturer Recall</a></li>
            <li><a href="javascript:void(0)" id="new_install" class="issueBtn @if($checkCarData &&$checkCarData->recall_issue !='') active @endif">New Install</a></li>
            <li><a href="javascript:void(0)" id="new_issue" class="issueBtn @if($checkCarData &&$checkCarData->servicing_issue !='') active @endif">New Issue</a></li>
            <li><a href="javascript:void(0)" id="regular_service" class="issueBtn @if($checkCarData &&$checkCarData->repair_info !='') active @endif">Regular Servicing</a></li>      --}}
                    </ul>

                    <div class="service-type_issue-repair-form">
                        <form id="saveIssueForm" name="saveIssueForm" action="{{route('shop-settings.save-issue-repair')}}" method="POST" accept-charset="multipart/form-data">
                            @csrf
                            @method('post')

                            <input type="hidden" id="carShopService" name="carShopService" value="@if(isset($_GET['issueServiceid'])){{ $_GET['issueServiceid'] }}
             @endif">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Important Repair Information:</label>
                                        <textarea class="form-control txt_issueBtn issuetabclose mynewcsl" name="repair_info" tab-type-="1" rows="5" id="text_regular_service" readonly></textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Known Issue Details:</label>
                                        <textarea class="form-control txt_issueBtn test issuetabclose mynewcsl" name="know_issue" tab-type-="2" rows="5" id="text_known_issue" readonly></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Manufacturer Recall Information:</label>
                                        <textarea class="form-control txt_issueBtn issuetabclose mynewcsl" name="recall_issue" tab-type-="3" rows="5" id="text_new_install" readonly></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Important New Install Information:</label>
                                        <textarea class="form-control txt_issueBtn issuetabclose mynewcsl" name="install_info" tab-type-="4" rows="5" id="text_manfacture_recall" readonly></textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Diagnosis:</label>
                                        <textarea class="form-control txt_issueBtn issuetabclose mynewcsl" name="diagnosis" tab-type-="5" rows="5" id="text_general_repair" readonly></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label>Important Servicing Information:</label>
                                        <textarea class="form-control txt_issueBtn issuetabclose mynewcsl" rows="5" tab-type-="6" name="service_info" id="text_new_issue" readonly></textarea>
                                    </div>
                                </div>

                                <button type="button" class="car-adding__btn btn btn--accent insertussueform cmn-btn" type="submit">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @include('shop-settings.partials.rightvinnumber')
        </div>
    </div>
</div>
</main>
@endsection