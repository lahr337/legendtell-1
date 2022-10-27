@extends('layout.default')

@section('content')
    <main class="page-wrapper">
        <div class="create-your-account page">
            <div class="container">
                <div class="create-your-account__heading page-heading">
                    <h2 class="page-heading__title">Sign in Your Account</h2>
                </div>
                <div class="create-your-account__content-wr">
                    <div class="create-your-account__by-email sign-email">
                        <div class="sign-email__tabs" style="display:none">
                            <button class="sign-email__tab btn {{ $type == 'register' ? 'btn--accent' : 'btn--light' }} toLogin" id="toLogin" type="button">User Sign Up</button>
                            <button class="sign-email__tab btn {{ $type == 'businessSignup' ? 'btn--accent' : 'btn--light' }} toSignup" id="toSignup" type="button">Business Sign Up</button>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="sign-email__tabs-content">
                            <div class="sign-email__tab-content">
                                <form class="sign-email__form sign-email__form--active" id="loginForm" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <input type="hidden" id="ctrole" name="ctrole" value=""> 
                                    <input type="hidden" id="is_admin" name="is_admin" value="{{$is_admin}}">
                                    <div class="sign-email__fields">
                                        <div class="sign-email__field custom-input custom-input--default fv-row">
                                            <input class="custom-input__field" id="signupEmail" type="email" name="email" placeholder="Enter email address"/>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="sign-email__field custom-input custom-input--password custom-input--default fv-row">
                                            <div class="custom-input__field-wr">
                                                <input class="custom-input__field signupPassword" id="signupPassword" type="password" name="password" autocomplete="off" placeholder="Enter password"/>
                                                <button class="custom-input__eye-btn" id="seePasswordSignup" type="button">
                                                <svg class="visible-eye">
                                                        <use xlink:href="/assets/svg/sign-sprite.svg#eye"></use>
                                                    </svg>
                                                    <svg class="hidden-eye">
                                                        <use xlink:href="/assets/svg/sign-sprite.svg#hidden"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="sign-email__field custom-input custom-input--password custom-input--default fv-row" style="display: none">
                                            <div class="custom-input__field-wr">
                                                <input class="custom-input__field" id="signupConfirmPassword" type="password" name="password_confirmation" autocomplete="off" placeholder="Confirm password"/>
                                                <button class="custom-input__eye-btn" id="seeConfirmPasswordSignup" type="button">
                                                    <svg>
                                                        <use xlink:href="/assets/svg/sign-sprite.svg#eye"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="sign-email__field custom-input custom-input--password custom-input--default fv-row" style="display:none">
                                            <div class="custom-input__field-wr">
                                                {{-- <input class="custom-input__field" id="loginPassword" type="password" name="password" autocomplete="off" placeholder="Enter password"/> --}}
                                                <button class="custom-input__eye-btn" id="seePassword" type="button">
                                                    <svg>
                                                        <use xlink:href="/assets/svg/sign-sprite.svg#eye"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sign-email__privacy">By signing up, you confirm that you’ve read and
                                        accepted our <a href="/">Terms of Use</a> and <a href="/">Privacy Policy</a>
                                    </div><button class="sign-email__submit btn btn--accent" id="kt_login_submit" type="submit">Login</button><a class="sign-email__forgot link link--full-accent" href="{{route('password.request')}}">Forgot
                                        password?</a>
                                </form>
                                <form class="sign-email__form {{ $type == 'businessSignup' ? 'sign-email__form--active' : '' }}" id="signupForm" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <input type="hidden" name="role" value="2">
                                    <div class="sign-email__fields">
                                        <div class="sign-email__field custom-input custom-input--default fv-row">
                                            <input class="custom-input__field" id="signupEmail" type="email" name="email" placeholder="Enter email address"/>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="sign-email__field custom-input custom-input--password custom-input--default fv-row">
                                            <div class="custom-input__field-wr">
                                                <input class="custom-input__field" id="seePasswordbusinessfiled" type="password" name="password" autocomplete="off" placeholder="Create password"/>
                                                <button class="custom-input__eye-btn" id="seePasswordbusiness" type="button">
                                                    <svg>
                                                        <use xlink:href="/assets/svg/sign-sprite.svg#eye"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="sign-email__field custom-input custom-input--password custom-input--default fv-row">
                                            <div class="custom-input__field-wr">
                                                <input class="custom-input__field" id="seeConfirmPasswordBusinessFiled" type="password" name="password_confirmation" autocomplete="off" placeholder="Confirm password"/>
                                                <button class="custom-input__eye-btn" id="seeConfirmPasswordBusiness" type="button">
                                                    <svg>
                                                        <use xlink:href="/assets/svg/sign-sprite.svg#eye"></use>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="fv-plugins-message-container"><div  class="fv-help-block mismatcherror" style="display: none">Password mismatch</div></div>
                                        </div>
                                    </div>
                                    <div class="sign-email__privacy">By signing up, you confirm that you’ve read and
                                        accepted our <a href="/">Terms of Use</a> and <a href="/">Privacy Policy</a>
                                    </div><button class="sign-email__submit btn btn--accent"  id="kt_register_submit"  type="submit">Sign
                                        Up</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="create-your-account__choose-line account-choose-line"><span
                            class="account-choose-line__text">or sign up with social</span></div>
                    <div class="create-your-account__social sign-social"><button
                            class="sign-social__btn social-sign-btn social-sign-btn--google" type="button"><svg>
                                <use xlink:href="/assets/svg/sign-sprite.svg#google"></use>
                            </svg><span class="social-sign-btn__text">Continue with Google</span></button>
                            <a href="{{ url('auth/facebook') }}"><button
                            class="sign-social__btn social-sign-btn social-sign-btn--facebook" type="button"><svg>
                                <use xlink:href="/assets/svg/sign-sprite.svg#facebook"></use>
                            </svg><span class="social-sign-btn__text">Continue with Facebook</span></button></a></div>
                       
                            {{-- <a class="btn" href="{{ url('auth/facebook') }}"
                    style="background: #3B5499; color: #ffffff; padding: 10px; width: 100%; text-align: center; display: block; border-radius:3px;">
                    Login with Facebook
                </a> --}}
                </div>
            </div>
        </div>
    </main>
@endsection


{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('/assets/css/createYourAccount.css') }}" rel="stylesheet" type="text/css" />
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('/assets/js/createYourAccount.js') }}" type="text/javascript"></script>
@endsection