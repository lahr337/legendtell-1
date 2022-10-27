@extends('layout.default')

@section('content')
    <main class="page-wrapper">
        <div class="create-your-account page">
            <div class="container">
                <div class="create-your-account__heading page-heading">
                    <h2 class="page-heading__title">Forgot Password</h2>
                </div>
                <div class="create-your-account__content-wr">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="create-your-account__by-email sign-email">
                        <div class="sign-email__tabs-content">
                            <div class="sign-email__tab-content">
                                <form class="sign-email__form sign-email__form--active" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="sign-email__fields">
                                        <div class="sign-email__field custom-input custom-input--default">
                                            <input class="custom-input__field" id="loginEmail" type="email" name="email" value="{{ old('email') }}" placeholder="Enter email address" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="sign-email__privacy">By signing up, you confirm that you’ve read and
                                        accepted our <a href="/">Terms of Use</a> and <a href="/">Privacy Policy</a>
                                    </div><button class="sign-email__submit btn btn--accent" type="submit">Forgot</button>
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
