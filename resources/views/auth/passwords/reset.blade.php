@extends('layout.default')

@section('content')
    <main class="page-wrapper">
        <div class="create-your-account page">
            <div class="container">
                <div class="create-your-account__heading page-heading">
                    <h2 class="page-heading__title">Reset Password</h2>
                </div>
                <div class="create-your-account__content-wr">
                   
                    <div class="create-your-account__by-email sign-email">
                        <div class="sign-email__tabs-content">
                            <div class="sign-email__tab-content">
                                <form  method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="sign-email__fields">
                                        <div class="sign-email__field custom-input custom-input--default">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="custom-input__field @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                           
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- password --}}
                                    <div class="sign-email__fields">
                                        <div class="sign-email__field custom-input custom-input--default">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <input id="password" type="password" class="custom-input__field @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- end password --}}
                                    {{-- password --}}
                                    <div class="sign-email__fields">
                                        <div class="sign-email__field custom-input custom-input--default">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <input id="password-confirm" type="password" class="custom-input__field"  placeholder="Enter password-confirm" name="password_confirmation" required autocomplete="new-password"> 

                                            @error('password-confirm')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- end password --}}
                                   
                                    <button class=" btn btn--accent" type="submit">{{ __('Reset Password') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection


@section('styles')
    <link href="{{ asset('/assets/css/createYourAccount.css') }}" rel="stylesheet" type="text/css" />
@endsection


