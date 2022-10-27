@extends('layout.default')

@section('content')

<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
    <!--begin::Aside-->
    <div class="login-aside order-2 order-lg-1 d-flex flex-row-auto position-relative overflow-hidden">
        <!--begin: Aside Container-->
        <div class="d-flex flex-column-fluid flex-column justify-content-between py-9 px-7 py-lg-13 px-lg-35">
            <!--begin::Logo-->
            <a href="#" class="text-center pt-2">
                <img src="{{ asset('/media/logos/logo.png') }}" class="max-h-75px" alt="">
            </a>
            <!--end::Logo-->
            <!--begin::Aside body-->
            <div class="d-flex flex-column-fluid flex-column flex-center">
                <!--begin::Signin-->
                <div class="login-form login-signin py-11">
                    <!--begin::Form-->
                    <form method="POST" action="{{ route('invitation.check') }}" class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" id="kt_invitation_form">
                        @csrf
                        <input type="hidden" name="verify_token" value="{{$user->verify_token}}"/>
                        <!--begin::Title-->
                        <div class="text-center pb-8">
                            <h2 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">{{$page_title}}</h2>
                        </div>
                        <!--end::Title-->
                        <!--begin::Form group-->
                        <div class="form-group fv-plugins-icon-container">
                            <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ $user->email }}" required autocomplete="off" readonly/>
                            <div class="fv-plugins-message-container"></div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group fv-plugins-icon-container">
                            <label class="font-size-h6 font-weight-bolder text-dark">Username</label>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('email') is-invalid @enderror" id="username" type="username" name="username" value="{{ $user->username }}" required autocomplete="off"/>
                            <div class="fv-plugins-message-container"></div>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group fv-plugins-icon-container">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                            </div>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('password') is-invalid @enderror" id="password" type="password" name="password" autocomplete="off">
                            <div class="fv-plugins-message-container"></div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Form group-->
                        <!--begin::Form group-->
                        <div class="form-group fv-plugins-icon-container">
                            <div class="d-flex justify-content-between mt-n5">
                                <label class="font-size-h6 font-weight-bolder text-dark pt-5">Confirm Password</label>
                            </div>
                            <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg @error('confirm-password') is-invalid @enderror" id="confirm-password" type="password" name="confirm-password" autocomplete="off">
                            <div class="fv-plugins-message-container"></div>
                            @error('confirm-password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!--end::Form group-->
                        <!--begin::Action-->
                        <div class="text-center pt-2">
                            <button class="btn btn-dark font-weight-bolder font-size-h6 px-8 py-4 my-3" id="kt_invitation_submit">Sign In</button>
                        </div>
                        <!--end::Action-->
                        <input type="hidden">
                        <div></div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Signin-->
            </div>
            <!--end::Aside body-->
        </div>
        <!--end: Aside Container-->
    </div>
    <!--begin::Aside-->
    <!--begin::Content-->
    <div class="content order-1 order-lg-2 d-flex flex-column w-100 pb-0" style="background-color: #B1DCED;">
        <!--begin::Image-->
        <div class="content-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(/media/svg/illustrations/login-visual-2.svg);"></div>
        <!--end::Image-->
    </div>
    <!--end::Content-->
</div>
@endsection


{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('css/pages/login/login-2.css?v=7.2.8') }}" rel="stylesheet" type="text/css" />
    <style type="text/css">iframe#_hjRemoteVarsFrame {display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;}</style>
@endsection

{{-- Scripts Section --}}
@section('scripts')
    <script src="{{ asset('js/pages/custom/invitation/invitation-general.js?v=7.2.8') }}"></script>
@endsection