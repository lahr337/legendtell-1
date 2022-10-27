    <footer class="footer">
      <div class="container footer__container">
        <div class="footer__left-side">
          <div class="footer__logo-and-nav logo-and-nav">
            <a class="logo-and-nav__logo logo" href="/"
              ><picture
                ><img
                  class="logo__img"
                  src="/assets/images/header-logo/header-logo.png"
                  alt="logo alt" /></picture
            ></a>
          
            {{-- <nav class="logo-and-nav__nav nav">
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
            </nav> --}}
          
          </div>
          <div class="footer__content">
            <p>
            Putting the value of your ride in your control.
              <p>
            </p>
          </div>
        </div>
        <div class="footer__right-side">
          <a class="footer__link-item link link--accent-underline" href="/term-use"
            >Terms of Use</a
          ><a class="footer__link-item link link--accent-underline" href="/privacy-policy"
            >Privacy Statement</a
          >
        </div>
      </div>
    </footer>