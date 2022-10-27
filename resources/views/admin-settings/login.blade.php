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
                                <form class="sign-email__form sign-email__form--active" id="loginForm" method="POST" action="{{ url('admin/login') }}">
                                    @csrf
                                    @if (session('success'))
									<div class="col-sm-12 successMessage">
										<div class="alert  alert-success alert-dismissible fade show" role="alert" style="color: green;">
											{{ session('success') }}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>


									
									@endif
									@if (session('error'))
									<div class="col-sm-12 successMessage">
										<div class="alert  alert-danger alert-dismissible fade show" role="alert" style="color: red;">
											{{ session('error') }}
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									</div>
									@endif
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
                                   <button class="sign-email__submit btn btn--accent" id="kt_login_submit" type="submit">Login</button><a class="sign-email__forgot link link--full-accent" href="{{route('password.request')}}">Forgot
                                        password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
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