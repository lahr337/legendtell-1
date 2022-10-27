<form class="account-settings__content account-settings__content-form {{ $tab == 'editProfile' ? 'account-settings__content--active' : '' }} settings-form" id="editProfile" action="{{route('shop-settings.save-profile')}}" method="PUT" accept-charset="multipart/form-data">
    @csrf
    @method('put')
    <div class="settings-form__inner row">
        <div class="settings-form__avatar account-avatar fv-row col-12 col-md-4">
            <div class="account-avatar__photo-wrap">
                <div class="account-avatar__photo-wr">

                    <img class="account-avatar__img avatarImg" id="avatarImg" src="{{asset(auth()->user()->avatar ? '' .auth()->user()->avatar : 'avatar.jpg')}}" alt="alt" />
                </div>
                <div class="account-avatar__edit-icon">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 2.31233C15 1.69465 14.7595 1.11406 14.3228 0.677342C13.8861 0.240681 13.3054 0.00012207 12.6878 0.00012207C12.0702 0.00012207 11.4896 0.240681 11.0528 0.677342L10.3593 1.37087L10.357 1.36855L10.2923 1.43784L6.88406 4.84606C6.83769 4.89254 6.79004 4.94414 6.74245 4.99944C6.58529 5.18214 6.66649 5.31412 6.72893 5.3765L9.63711 8.28468C9.69126 8.33883 9.74732 8.36628 9.80379 8.36628C9.88139 8.36628 9.93565 8.31637 9.97163 8.28329C9.97703 8.2783 9.98208 8.27365 9.98672 8.26971C10.0475 8.218 10.1039 8.16629 10.1542 8.11603L13.5609 4.70932L13.6309 4.64235L13.6293 4.64084L14.3229 3.94737C14.7595 3.51059 15 2.92995 15 2.31233Z" fill="white" />
                        <path d="M5.68191 6.79716C5.62835 6.74359 5.55748 6.71411 5.48239 6.71411C5.40468 6.71411 5.3294 6.74696 5.27601 6.80436L1.12273 11.2626C1.03115 11.3608 0.9181 11.543 0.870569 11.6686L0.655024 12.2392C0.601631 12.3807 0.643533 12.5752 0.750435 12.6821L0.792163 12.7238L0.0187771 14.7715C-0.0148256 14.8605 0.00304943 14.9153 0.0239423 14.9455C0.0482593 14.9806 0.0884782 15.0001 0.137286 15.0001C0.165202 15.0001 0.196019 14.9938 0.228751 14.9814L2.27626 14.208L2.31798 14.2497C2.39099 14.3227 2.50927 14.3681 2.62668 14.3681C2.67531 14.3681 2.7204 14.3603 2.76085 14.3451L3.33146 14.1296C3.45699 14.0822 3.63917 13.9691 3.73754 13.8775L8.19574 9.7242C8.25255 9.67127 8.28459 9.59972 8.28598 9.52276C8.28732 9.4458 8.25789 9.3732 8.20293 9.3183L5.68191 6.79716Z" fill="white" />
                    </svg>
                </div>
                <input class="account-avatar__field" id="avatar" name="avatar" type="file" accept="image/jpeg,image/jpg,image/BMP,image/png,image/webp,image/gif,image/svg+xml,image/bmp,image/x-icon,image/apng,image/avif" />
            </div>

            {{-- locationset --}}
            <div class="type-box">

                <h3>Shop/Location Type</h3>
                <ul>

                    @foreach($SelectServices as $listservice)
                    <li>
                        <a href="#">{{ucwords($listservice->service_name)}}</a>
                    </li>
                    @endforeach

                </ul>
                <a href="/shop-settings/all-services" class="payment-methods__add-method btn btn--accent mt-0 edit-page-btn"> Edit </a>
                {{-- <a type="button" class="btn">edit</a> --}}
                {{-- end Location set --}}
                {{-- image tag --}}
                <div class="uploaded-img">
                    <span><img class="shopImg" id="shopImg" src="{{asset(auth()->user()->shop_photo ? '' .auth()->user()->shop_photo : 'shop_photo.png')}}" alt="">
                        {{-- <a href="#">edit</a> --}}
                        <div class="account-avatar__edit-icon">
                            <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 2.31233C15 1.69465 14.7595 1.11406 14.3228 0.677342C13.8861 0.240681 13.3054 0.00012207 12.6878 0.00012207C12.0702 0.00012207 11.4896 0.240681 11.0528 0.677342L10.3593 1.37087L10.357 1.36855L10.2923 1.43784L6.88406 4.84606C6.83769 4.89254 6.79004 4.94414 6.74245 4.99944C6.58529 5.18214 6.66649 5.31412 6.72893 5.3765L9.63711 8.28468C9.69126 8.33883 9.74732 8.36628 9.80379 8.36628C9.88139 8.36628 9.93565 8.31637 9.97163 8.28329C9.97703 8.2783 9.98208 8.27365 9.98672 8.26971C10.0475 8.218 10.1039 8.16629 10.1542 8.11603L13.5609 4.70932L13.6309 4.64235L13.6293 4.64084L14.3229 3.94737C14.7595 3.51059 15 2.92995 15 2.31233Z" fill="white" />
                                <path d="M5.68191 6.79716C5.62835 6.74359 5.55748 6.71411 5.48239 6.71411C5.40468 6.71411 5.3294 6.74696 5.27601 6.80436L1.12273 11.2626C1.03115 11.3608 0.9181 11.543 0.870569 11.6686L0.655024 12.2392C0.601631 12.3807 0.643533 12.5752 0.750435 12.6821L0.792163 12.7238L0.0187771 14.7715C-0.0148256 14.8605 0.00304943 14.9153 0.0239423 14.9455C0.0482593 14.9806 0.0884782 15.0001 0.137286 15.0001C0.165202 15.0001 0.196019 14.9938 0.228751 14.9814L2.27626 14.208L2.31798 14.2497C2.39099 14.3227 2.50927 14.3681 2.62668 14.3681C2.67531 14.3681 2.7204 14.3603 2.76085 14.3451L3.33146 14.1296C3.45699 14.0822 3.63917 13.9691 3.73754 13.8775L8.19574 9.7242C8.25255 9.67127 8.28459 9.59972 8.28598 9.52276C8.28732 9.4458 8.25789 9.3732 8.20293 9.3183L5.68191 6.79716Z" fill="white" />
                            </svg>
                        </div>
                    </span>
                    <input type="file" id="shop_photo" name="shop_photo" class="account-avatar__field" accept="image/jpeg,image/jpg,image/BMP,image/png,image/webp,image/gif,image/svg+xml,image/bmp,image/x-icon,image/apng,image/avif" />
                </div>


                {{-- end image tag --}}
            </div>

        </div>

        <div class="settings-form__fields col-12 col-md-8">
            <div class="settings-form__changes-saved changes-saved" id="changesSaved">
                <div class="changes-saved__icon-wr">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C11.6355 15 15 11.6355 15 7.5C15 3.3645 11.6355 0 7.5 0ZM7.5 13.6364C4.11636 13.6364 1.36364 10.8836 1.36364 7.5C1.36364 4.11641 4.11636 1.36364 7.5 1.36364C10.8836 1.36364 13.6364 4.11641 13.6364 7.5C13.6364 10.8836 10.8836 13.6364 7.5 13.6364Z" fill="#6AC355" />
                        <path d="M10.3122 4.84836L6.45516 8.70531L4.68743 6.93754C4.4212 6.67132 3.98948 6.67127 3.7232 6.9375C3.45693 7.20377 3.45693 7.63545 3.7232 7.90172L5.97303 10.1516C6.10089 10.2795 6.2743 10.3514 6.45512 10.3514C6.45516 10.3514 6.45512 10.3514 6.45516 10.3514C6.63598 10.3514 6.80939 10.2795 6.93726 10.1517L11.2764 5.81263C11.5427 5.54636 11.5427 5.11468 11.2764 4.84841C11.0101 4.58214 10.5784 4.58209 10.3122 4.84836Z" fill="#6AC355" />
                    </svg>
                </div>
                <span class="changes-saved__text">Changes saved!</span>
            </div>

            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--shop-name
            ">
                <label class="custom-input__label" for="shopname">Shop/Location Name<span class="astrick">*</span> </label>

                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field " id="shopName" name="shop_name" type="text" placeholder="User Name" value="{{ auth()->user()->shop_name }}" />
                </div>
                <div class="fv-plugins-message-container">
                    <div id="shop_nameerror" class="fv-help-block" style="display:none">Shop Name is required</div>
                </div>
            </div>

            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--first-name
            ">
                <label class="custom-input__label" for="firstName">Contact First name<span class="astrick">*</span></label>
                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field " id="firstName" name="first_name" type="text" placeholder="First Name" value="{{ auth()->user()->first_name }}" />
                </div>
            </div>
            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--last-name
            ">
                <label class="custom-input__label " for="lastName">Contact Last name<span class="astrick">*</span></label>
                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field" id="lastName" name="last_name" type="text" placeholder="Last Name" value="{{auth()->user()->last_name}}" required />
                </div>
            </div>
            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--email
            ">
                <label class="custom-input__label" for="email">Email<span class="astrick">*</span></label>
                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field" id="email" type="email" name="email" placeholder="Enter Email" value="{{ auth()->user()->email }}" required />
                </div>
            </div>
            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--number
            ">
                <label class="custom-input__label" for="number">Contacts number<span class="astrick">*</span></label>
                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field" id="number" name="contact_number" type="text" placeholder="661-654-5234" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="12" inputmode="tel" value="{{auth()->user()->contact_number}}" required />
                </div>
            </div>
            {{-- map code --}}
            <div class="custom-input custom-input--default custom-input--with-label-above settings-form__field settings-form__field--address">
                <label class="custom-input__label" for="address_address">Address<span class="astrick">*</span></label>
                <div class="custom-input__field-wr fv-row">
                    <input type="text" id="address-input" name="address" class="custom-input__field map-input" value="{{auth()->user()->address}}">
                    <input type="hidden" name="shop_latitude" id="address-latitude" value="0" />
                    <input type="hidden" name="shop_longitude" id="address-longitude" value="0" />
                </div>
            </div>
            <div id="address-map-container" style="width:100%;height:400px;display:none ">
                <div style="width: 100%; height: 100px" id="address-map"></div>
            </div>
            {{-- end map code --}}

            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--city
            ">
                <label class="custom-input__label" for="city">City<span class="astrick">*</span></label>
                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field" id="city" name="city" type="text" placeholder="Mcallen" value="{{auth()->user()->city}}" required />
                </div>
            </div>
            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--state
            ">
                <label class="custom-input__label" for="state">State</label>
                <div class="custom-input__field-wr fv-row">
                    <select class="custom-input__field" id="state" name="state" type="text">
                        @foreach($states as $statelist)
                        <option value="{{$statelist->name}} " @if($statelist->name==auth()->user()->state) selected @endif>{{$statelist->name}}</option>
                        @endforeach
                    </select>
                    {{-- <input class="custom-input__field" id="state" name="state" type="text" placeholder="New York" value="{{auth()->user()->state}}" required /> --}}
                </div>
            </div>
            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--zip
            ">
                <label class="custom-input__label" for="zipCode">Zip Code</label>
                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field custom-input__field--number" id="zipCode" name="zip_code" type="text" maxlength="7" placeholder="Zip Code" value="{{auth()->user()->zip_code}}" required />
                </div>
            </div>
            <div class="
            custom-input
            custom-input--default
            custom-input--with-label-above
            settings-form__field settings-form__field--country
            " style="display: none">
                <label class="custom-input__label" for="country">Country</label>
                <div class="custom-input__field-wr fv-row">
                    <input class="custom-input__field" id="country" name="country" type="text" placeholder="United States" value="233" required />
                </div>
            </div>
            <div class="settings-form__field settings-form__field--password-wr">
                <div class="settings-form__field--password custom-input custom-input--default custom-input--with-label-above custom-input--password">
                    <label class="custom-input__label" for="passwrod">Current Password</label>
                    <div class="custom-input__field-wr">
                        <input class="custom-input__field custom-input__field--password" id="passwrod" type="password" name="current_password" placeholder="Current Password" value="" />
                        <button class="custom-input__eye-btn" id="showPassword" type="button">
                            <svg class="visible-eye">
                                <use xlink:href="/assets/svg/sign-sprite.svg#eye"></use>
                            </svg>
                            <svg class="hidden-eye">
                                <use xlink:href="/assets/svg/sign-sprite.svg#hidden"></use>
                            </svg>
                        </button>

                    </div>
                    <div class="fv-plugins-message-container">
                        <div class="fv-help-block" id="error_current_password"></div>
                    </div>
                </div>
                <a class="settings-form__change-pass-link link--full-accent link--accent-underline" id="ChangePassword" href="javascript:void(0);" data-url="{{route('account-settings.change-password')}}">Change</a>
                <div class="changes-saved__icon-wr" id="passwordChangedIndicator" style="display:none;">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 0C3.3645 0 0 3.3645 0 7.5C0 11.6355 3.3645 15 7.5 15C11.6355 15 15 11.6355 15 7.5C15 3.3645 11.6355 0 7.5 0ZM7.5 13.6364C4.11636 13.6364 1.36364 10.8836 1.36364 7.5C1.36364 4.11641 4.11636 1.36364 7.5 1.36364C10.8836 1.36364 13.6364 4.11641 13.6364 7.5C13.6364 10.8836 10.8836 13.6364 7.5 13.6364Z" fill="#6AC355" />
                        <path d="M10.3122 4.84836L6.45516 8.70531L4.68743 6.93754C4.4212 6.67132 3.98948 6.67127 3.7232 6.9375C3.45693 7.20377 3.45693 7.63545 3.7232 7.90172L5.97303 10.1516C6.10089 10.2795 6.2743 10.3514 6.45512 10.3514C6.45516 10.3514 6.45512 10.3514 6.45516 10.3514C6.63598 10.3514 6.80939 10.2795 6.93726 10.1517L11.2764 5.81263C11.5427 5.54636 11.5427 5.11468 11.2764 4.84841C11.0101 4.58214 10.5784 4.58209 10.3122 4.84836Z" fill="#6AC355" />
                    </svg>
                </div>
            </div>
            <div class="settings-form__field settings-form__field--password-wr">
                <div class="settings-form__field--password custom-input custom-input--default custom-input--with-label-above custom-input--password">
                    <label class="custom-input__label" for="passwrod">New Password</label>
                    <div class="custom-input__field-wr">
                        <input class="custom-input__field custom-input__field--password" id="new_passwrod" type="password" name="password" placeholder="New Password" value="" />
                        <button class="custom-input__eye-btn" id="showNewPassword" type="button">
                            <svg class="visible-eye">
                                <use xlink:href="/assets/svg/sign-sprite.svg#eye"></use>
                            </svg>
                            <svg class="hidden-eye">
                                <use xlink:href="/assets/svg/sign-sprite.svg#hidden"></use>
                            </svg>
                        </button>

                    </div>
                    <div class="fv-plugins-message-container">
                        <div class="fv-help-block" id="error_new_password"></div>
                    </div>
                </div>
            </div>
            <style>
                .custom-input--password input[type=text]~button .visible-eye,
                .custom-input--password input[type=password]~button .hidden-eye {
                    display: block;
                }

                .custom-input--password input[type=password]~button .visible-eye,
                .custom-input--password input[type=text]~button .hidden-eye {
                    display: none;
                }
            </style>
            <button class="settings-form__submit-btn btn btn--accent" id="kt_edit_profile_submit" type="submit"> Save </button>
        </div>
    </div>
</form>