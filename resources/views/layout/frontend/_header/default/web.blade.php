    <header class="header">
        <div class="container header__container">
            <div class="header__logo-and-nav logo-and-nav"><a class="logo-and-nav__logo logo" href="/">
                    <picture><img class="logo__img" src="/assets/images/header-logo/header-logo.png" alt="logo alt" />
                    </picture>
                </a>
                
                {{-- <nav class="logo-and-nav__nav nav">
                    <ul class="nav__list">
                        <li class="nav__item"><a class="nav__link" href="{{route('account-settings.index',['myReports'])}}">Reports</a>
                        </li>
                        <li class="nav__item"><a class="nav__link" href="{{route('car.index')}}">Add your car</a></li>
                        <li class="nav__item"><a class="nav__link" href="{{route('help.index')}}">Help</a></li>
                    </ul>
                </nav> --}}
            </div>
            <div class="sign-block header__user-info">
                <ul class="sign-block__list">
                    <li class="sign-block__item"><a class="sign-block__link toLogin" href="{{route('auth.login-or-signup',['login'])}}">Log In</a></li>
                    <li class="sign-block__item"><a class="sign-block__link toSignup" href="{{route('auth.login-or-signup',['register'])}}">Sign Up</a></li>
                </ul>
            </div><button class="header__hamburger hamburger hamburger--stand" id="hamburger" type="button"
                aria-label="Menu" aria-controls="navigation" aria-expanded="true/false"><span
                    class="hamburger-box"></span><span class="hamburger-inner"></span></button>
        </div>
    </header>