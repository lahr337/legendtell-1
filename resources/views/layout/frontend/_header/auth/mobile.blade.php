    <div class="mobile-menu mobile-menu--user" id="mobileMenu">
      <div class="container mobile-menu__container">
        <div class="mobile-menu__user-info user">
          <div
            class="user__info user-info user-info--mobile-nav"
            id="userInfoMobile"
          >
            <span class="user-info__name">Hello, {{auth()->user()->first_name}}</span>
            <div class="user-info__img-wr">
              <picture
                ><img
                  class="user-info__img avatarImg"
                  src="{{ auth()->user()->avatar_url }}"
                  alt="alt"
                  loading="lazy"
              /></picture>
            </div>
            <div class="user-info__arrow">
              <svg
                width="10"
                height="6"
                viewBox="0 0 10 6"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path d="M1 0.5L5 4.5L9 0.5" stroke="#272727" />
              </svg>
            </div>
          </div>
          <div
            class="user__nav user-nav user-nav--mobile-nav"
            id="userNavMobile"
          >
            <ul class="user-nav__list">
              <li class="user-nav__item">
                <a class="user-nav__link" href="/"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#profile"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Profile</span></a
                >
              </li>
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('car.index')}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#my-cars"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">My cars</span></a
                >
              </li>
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('account-settings.index',['myReports'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#my-reports"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">My reports</span></a
                >
              </li>
              <li class="user-nav__item">
                <a class="user-nav__link" href="/"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#sign-out"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Sign Out</span></a
                >
              </li>
            </ul>
            <button class="user-nav__bue-reports btn btn--accent" type="button">
              Buy reports
            </button>
          </div>
        </div>
        <nav class="mobile-menu__nav nav--mobile-user nav">
          <ul class="nav__list">
            <li class="nav__item">
              <a class="nav__link reportsHeaderMenu {{ isset($tab) && $tab == 'myReports' ? 'nav__link--active' : '' }}" href="{{route('account-settings.index',['myReports'])}}"
                >Reports</a
              >
            </li>
            <li class="nav__item">
              <a class="nav__link {{ Route::currentRouteName() == 'car.index' ? 'nav__link--active' : '' }}" href="{{route('car.index')}}">Add your car</a>
            </li>
            <li class="nav__item">
              <a class="nav__link {{ Route::currentRouteName() == 'help.index' ? 'nav__link--active' : '' }}" href="{{route('help.index')}}">Help</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>