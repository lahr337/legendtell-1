<div class="account-settings__content
                    account-settings__content-notifications
                    shop-notifications
                " id="shopNotifications">
    <div class="shop-notifications__heading">
        <div class="block-heading">
            <h2 class="block-heading__title">SHOP/LOCATION TYPE</h2>
            <p>select the services your shop offers</p>
        </div>
        <div class="
                            shop-notifications__turn-all
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field" id="turnAll" type="checkbox" name="notifications-all" />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="turnAll">Turn all</label>
        </div>
    </div>
    @php($notification_setting = auth()->user()->notification_setting ?? new \App\Models\NotificationSetting)
    <div class="manage-notifications__items-wr">
        <form id="saveNotificationSettingForm" action="{{route('account-settings.save-notification-setting')}}" method="PUT" accept-charset="multipart/form-data">
        @csrf
        @method('put')
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="openRecalls" type="checkbox" value="1" name="notifications[open_recall]" {{$notification_setting->open_recall == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="openRecalls">Open Recalls</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="oilChangeDue" type="checkbox" value="1" name="notifications[oil_change_due]" {{$notification_setting->oil_change_due == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="oilChangeDue">Oil Change Due</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="tireRotationDue" type="checkbox" value="1" name="notifications[tire_rotation_due]" {{$notification_setting->tire_rotation_due == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="tireRotationDue">Tire Rotation Due</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="safetyInspectionDue" type="checkbox" value="1" name="notifications[safety_inspection_due]" {{$notification_setting->safety_inspection_due == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="safetyInspectionDue">Safety Inspection Due</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="registrationDue" type="checkbox" value="1" name="notifications[registration_due]" {{$notification_setting->registration_due == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="registrationDue">Registration Due</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="emissionsInspectionDue" type="checkbox" value="1" name="notifications[emissions_inspection_due]" {{$notification_setting->emissions_inspection_due == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="emissionsInspectionDue">Emissions Inspection Due</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="leaveServiceReview" type="checkbox" value="1" name="notifications[leave_service_review]" {{$notification_setting->leave_service_review == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="leaveServiceReview">Leave a Service Review</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="monthlyVehicleReport" type="checkbox" value="1" name="notifications[monthly_vehicle_report]" {{$notification_setting->monthly_vehicle_report == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="monthlyVehicleReport">Monthly Vehicle Report</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="addVehicleReport" type="checkbox" value="1" name="notifications[add_vehicle_reminder]" {{$notification_setting->add_vehicle_reminder == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="addVehicleReport">Add Vehicle Reminder</label>
        </div>
        <div class="
                            manage-notifications__item
                            custom-check
                            custom-check--with-label
                            custom-check--with-label-xl
                        ">
            <div class="custom-check__field-wr">
                <input class="custom-check__field notifications" id="stillOwnVehicle" type="checkbox" value="1" name="notifications[still_own_vehicle]" {{$notification_setting->still_own_vehicle == 1 ? 'checked' : ''}} />
                <div class="custom-check__customize">
                    <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 7.66667L7 12.3333L12.3333 1" stroke="white" />
                    </svg>
                </div>
            </div>
            <label class="custom-check__label" for="stillOwnVehicle">Still Own This Vehicle</label>
        </div>
        <button class="payment-methods__add-method btn btn--accent" id="SaveNotificationSetting" type="button">Save Setting</button>
    </div>
</div>
