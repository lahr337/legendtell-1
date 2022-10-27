    <div class="mobile-menu mobile-menu--no-user" id="mobileMenu">
        <div class="container mobile-menu__container">
            <div class="sign-block mobile-menu__user-info">
                <ul class="sign-block__list">
                    <li class="sign-block__item"><a class="sign-block__link toLogin" href="{{route('auth.login-or-signup',['login'])}}">Log In</a></li>
                    <li class="sign-block__item"><a class="sign-block__link toSignup" href="{{route('auth.login-or-signup',['register'])}}">Sign Up</a></li>
                </ul>
            </div>
            
            <nav class="mobile-menu__nav nav--mobile-no-user nav">
                <ul class="nav__list">
                    <li class="nav__item"><a class="nav__link" href="{{route('account-settings.index',['myReports'])}}">Reports</a></li>
                    <li class="nav__item"><a class="nav__link" href="{{route('car.index')}}">Add your car</a></li>
                    <li class="nav__item"><a class="nav__link" href="{{route('help.index')}}">Help</a></li>
                </ul>
            </nav>
        </div>
    </div>