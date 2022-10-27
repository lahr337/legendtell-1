<div class="account-settings__content account-settings__content-form {{ $tab == 'search_vin' ? 'account-settings__content--active' : '' }} settings-form" id="search_vin">
    @csrf
    @method('put')

    <div class="grid-view-shop">

        <div class="settings-form__inner dashboard-tab">
            <div class="dashboard-tabs" id="dashboardTabs">
                <div class="dashboard-tabs__slider swiper" id="dashboardTabSlider">
                    <div class="dashboard-tabs__slider-wrapper swiper-wrapper">
                        <button class="dashborad-tabs__slide btn btn--with-icon btn--tab btn--tab-active" type="button" data-tab="search_vin">
                            <div class="btn__icon">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.37141 1.90406V0.46875C9.37141 0.21 9.16141 0 8.90266 0C8.64391 0 8.43391 0.21 8.43391 0.46875V1.87781H2.81172V0.46875C2.81172 0.21 2.60172 0 2.34297 0C2.08422 0 1.87422 0.21 1.87422 0.46875V1.90406C0.913281 2.03156 0.154844 2.79094 0.0273438 3.75281H11.2211C11.0936 2.78906 10.3333 2.02969 9.37141 1.90406Z" fill="#272727" />
                                    <path d="M11.25 7.54687V4.69031H0V10.9716C0 12.1603 0.9675 13.1278 2.15625 13.1278H7.75875C7.60125 12.6853 7.5 12.2156 7.5 11.7187C7.5 9.54937 9.14344 7.78312 11.25 7.54687ZM2.81156 11.2491C2.29406 11.2491 1.875 10.83 1.875 10.3125C1.875 9.795 2.29406 9.37594 2.81156 9.37594C3.32906 9.37594 3.74719 9.795 3.74719 10.3125C3.74719 10.83 3.32812 11.2491 2.81156 11.2491ZM2.81156 8.4375C2.29406 8.4375 1.875 8.01844 1.875 7.50094C1.875 6.98344 2.29406 6.56437 2.81156 6.56437C3.32906 6.56437 3.74719 6.98437 3.74719 7.50094C3.74719 8.0175 3.32812 8.4375 2.81156 8.4375ZM5.62406 8.4375C5.10656 8.4375 4.6875 8.01844 4.6875 7.50094C4.6875 6.98344 5.10656 6.56437 5.62406 6.56437C6.14156 6.56437 6.55969 6.98437 6.55969 7.50094C6.55969 8.0175 6.14062 8.4375 5.62406 8.4375Z" fill="#272727" />
                                    <path d="M11.7188 8.4375C9.90656 8.4375 8.4375 9.90656 8.4375 11.7188C8.4375 13.5309 9.90656 15 11.7188 15C13.5309 15 15 13.5309 15 11.7188C15 9.90656 13.5309 8.4375 11.7188 8.4375ZM13.9838 11.0409L12.1088 13.8534C12.0216 13.9838 11.8753 14.0625 11.7188 14.0625C11.5622 14.0625 11.4159 13.9838 11.3287 13.8534L9.45375 11.0409C9.31031 10.8263 9.36844 10.5347 9.58406 10.3912C9.79687 10.2487 10.0894 10.305 10.2338 10.5216L11.7188 12.7491L13.2037 10.5216C13.3481 10.3059 13.6397 10.2497 13.8534 10.3912C14.0691 10.5347 14.1272 10.8263 13.9838 11.0409Z" fill="#272727" />
                                </svg>
                            </div>
                            <span class="btn__name">Search VIN</span>
                        </button>
                    </div>
                </div>
            </div> @include('admin-settings.partials._tab-contents._search-vin')
        </div>

        <div class="vvn-number">
            <h3>My VIN Numbers </h3>

            <ul id="viewVin">
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