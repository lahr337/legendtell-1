<div class="account-settings__content account-settings__content-form {{ $tab == 'edit_vin' ? 'account-settings__content--active' : '' }} settings-form" id="edit_vin_dashboard">
    @csrf
    @method('put')

    <div class="grid-view-shop">

        <div class="settings-form__inner dashboard-tab">
            <div class="dashboard-tabs" id="dashboardTabs">
                <div class="dashboard-tabs__slider swiper" id="dashboardTabSlider">
                    <div class="dashboard-tabs__slider-wrapper swiper-wrapper">
                        <button class="dashborad-tabs__slide btn btn--with-icon btn--tab btn--tab-active" type="button" id="editbtnView" data-tab="editVin">
                            <div class="btn__icon">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_100_1509)">
                                        <path d="M12.4963 10.7801L9.38221 7.66605L11.9098 5.13847C12.7305 5.32903 13.6272 5.11039 14.268 4.46973C14.9692 3.76917 15.1615 2.76168 14.867 1.88057L13.677 3.06996C13.256 3.4922 12.5611 3.47905 12.1228 3.04074C11.6863 2.60358 11.6726 1.90865 12.093 1.48714L13.2823 0.297755C12.4031 0.00137392 11.3961 0.194961 10.6938 0.896778C10.0543 1.53567 9.83639 2.43232 10.0275 3.25436L7.49988 5.78132L4.97345 3.25488C5.16401 2.43357 4.94422 1.53681 4.30534 0.896674C3.60477 0.195482 2.59791 0.00252186 1.7168 0.297024L2.90619 1.48703C3.3278 1.90802 3.31528 2.60358 2.87634 3.04126C2.43918 3.47842 1.7455 3.49147 1.32274 3.07111L0.133254 1.8812C-0.161874 2.76105 0.0310863 3.76927 0.73353 4.47036C1.37179 5.1105 2.26845 5.32778 3.09111 5.13784L5.61745 7.66355L2.50399 10.777C1.93732 10.7378 1.35823 10.9258 0.926699 11.3599C0.130854 12.1544 0.130854 13.4434 0.926699 14.2392C1.72004 15.0332 3.00961 15.0332 3.8042 14.2392C4.23698 13.8065 4.42441 13.2267 4.3883 12.6601L7.49988 9.54724L10.614 12.6613C10.5754 13.228 10.764 13.8077 11.1968 14.2399C11.9908 15.0351 13.281 15.0351 14.0756 14.2399C14.8702 13.4453 14.8702 12.1563 14.0756 11.3611C13.6427 10.9284 13.063 10.7404 12.4963 10.7801ZM2.64143 13.8339L1.60587 13.5575L1.33005 12.5219L2.08665 11.764L3.12221 12.0411L3.39929 13.076L2.64143 13.8339ZM13.393 13.5593L12.358 13.8352L11.6002 13.0773L11.8766 12.0424L12.9122 11.7653L13.6707 12.5231L13.393 13.5593Z" fill="#272727" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_100_1509">
                                            <rect width="15" height="15" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <span class="btn__name">Edit VIN Owner</span>
                        </button>

                    </div>
                </div>
            </div>

            @include('admin-settings.partials._tab-contents._edit-vin')
        </div>

        <div class="vvn-number">
            <h3>My VIN Numbers </h3>

            <ul id="viewVin">
                @foreach($VInGet as $vinList)
                <?php
                $vinid = base64_encode($vinList->id);
                ?>
                {{-- <li><a href="{{route('shop-settings.index-vin',['car_id'=>$vinid])}}">{{$vinList->vin}}</a></li> --}}
                <li><a href="javascript:void(0)" class="getVinNumbers" id="{{$vinid}}">{{$vinList->vin}}</a></li>
                @endforeach

            </ul>

            <h3>PULL A FULL VIN REPORT</h3>
            <div class="form-group">
                <label>VIN:</label>
                <input type="text" class="form-control">
            </div>
            <button class="btn">ORDER NOW!</button>
        </div>

    </div>

</div>