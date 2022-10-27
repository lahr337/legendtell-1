    <header class="header">
      <div class="container header__container">
        <div class="header__logo-and-nav logo-and-nav">
          <a class="logo-and-nav__logo logo" href="/"
            ><picture
              ><img
                class="logo__img"
                src="/assets/images/header-logo/header-logo.png"
                alt="logo alt" /></picture
          ></a>
          @if(auth()->user()->role==3)
          <nav class="logo-and-nav__nav nav">
            <ul class="nav__list">
              <li class="nav__item">
                <a class="nav__link reportsHeaderMenu {{ isset($tab) && $tab == 'myReports' ? 'nav__link--active' : '' }}" href="{{route('account-settings.index',['myReports'])}}">Reports</a>
              </li>
             
              <li class="nav__item">
                <a class="nav__link {{ Route::currentRouteName() == 'car.index' ? 'nav__link--active' : '' }}" href="{{route('car.index')}}">Add your car</a>
              </li>
              <li class="nav__item">
                <a class="nav__link {{ Route::currentRouteName() == 'help.index' ? 'nav__link--active' : '' }}" href="{{route('help.index')}}">Help</a>
              </li>
            </ul>
          </nav>
          @endif
        </div>
        <div class="header__user-info user">
          <div class="user__info user-info" id="userInfo">
            <span class="user-info__name">Hello {{ucwords(auth()->user()->first_name)}} </span>
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
          @if(auth()->user()->role==3)
          <div class="user__nav user-nav" id="userNav">
            <ul class="user-nav__list">
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('account-settings.index',['editProfile'])}}"
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
                  <span class="user-nav__item-title">My Garage </span></a
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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="user-nav__link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#sign-out"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Sign Out</span>
                  </a>
              </li>
            </ul>
            <button class="user-nav__bue-reports btn btn--accent" type="button">
              Buy reports
            </button>
          </div>
          @endif
          @if(auth()->user()->role==2)
          <div class="user__nav user-nav" id="userNav">
            <ul class="user-nav__list">
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('shop-settings.index',['editProfile'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#profile"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Shop Profile</span></a
                >
              </li>
             
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('shop-settings.index',['mydashboard'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#my-cars"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">VIN Dashboard</span></a
                >
              </li>
              {{-- <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('shop-settings.index',['myReports'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#my-reports"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">My reports</span></a
                >
              </li> --}}
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('shop-settings.index',['myapperisal'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#my-reports"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Appraisals</span></a
                >
              </li>
              <li class="user-nav__item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="user-nav__link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#sign-out"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Sign Out</span>
                  </a>
              </li>
            </ul>
            <button class="user-nav__bue-reports btn btn--accent" type="button">
              Buy reports
            </button>
          </div>
          @endif
          @if(auth()->user()->role==1)
          <div class="user__nav user-nav" id="userNav">
            <ul class="user-nav__list">
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('admin-settings.index',['editProfile'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#profile"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Admin Profile</span></a
                >
              </li>
             
              {{-- <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('admin-settings.index',['myshopServices'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#myshopServices"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Shop Services</span></a
                >
              </li>
              <li class="user-nav__item">
                <a class="user-nav__link" href="{{route('admin-settings.index',['myuseredit'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#myuseredit"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Edit User</span></a
                >
              </li>
              <li class="user-nav__item">
                <a class="user-nav__link"href="{{route('admin-settings.index',['pendingapprasial'])}}"
                  ><div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#pendingapprasial"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Appraiser Requests</span></a
                >
              </li> --}}
           
              <li class="user-nav__item">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <a class="user-nav__link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                  <div class="user-nav__icon-wr">
                    <svg>
                      <use
                        xlink:href="/assets/svg/user-sprite.svg#sign-out"
                      ></use>
                    </svg>
                  </div>
                  <span class="user-nav__item-title">Sign Out</span>
                  </a>
              </li>
            </ul>
            <button class="user-nav__bue-reports btn btn--accent" type="button">
              Buy reports
            </button>
          </div>
          @endif
        </div>
        <button
          class="header__hamburger hamburger hamburger--stand"
          id="hamburger"
          type="button"
          aria-label="Menu"
          aria-controls="navigation"
          aria-expanded="true/false"
        >
          <span class="hamburger-box"></span
          ><span class="hamburger-inner"></span>
        </button>
      </div>
    </header>