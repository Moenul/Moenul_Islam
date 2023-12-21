@extends('layouts.app')

@section('content')

<div class="header_section">
    <div class="container pt-5">
        {{-- Nav Bar Include --}}
        @include('includes.nav_bar')
        {{-- Nav Bar Include --}}

        {{-- Login Section --}}
        <div class="container register_container">
            <div class="register_box">
                <div class="box_title">
                    LOG IN
                </div>
                <div class="input_box">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-0">
                            <button type="submit" class="register_button">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="social_login_section">
                    <div class="orDiv"><span>Or</span> continue with </div>
                    <div class="social_box">
                        <div class="social_item github_link">
                            <a href="/auth/github/redirect"><iconify-icon icon="bi:github"></iconify-icon></a>
                        </div>
                        <div class="social_item google_link">
                            <a href="/auth/google/redirect"><iconify-icon icon="devicon:google"></iconify-icon></a>
                        </div>
                        <div class="social_item facebook_link">
                            <a href="/auth/facebook/redirect"><iconify-icon icon="logos:facebook"></iconify-icon></a>
                        </div>
                        <div class="social_item linkedin_link">
                            <a href="/auth/linkedin/redirect"><iconify-icon icon="entypo-social:linkedin-with-circle" style="color: #0077b5; font-size:46px;"></iconify-icon></a>
                        </div>
                    </div>
                    <div class="alredyRegistered">
                        <a href="/register">Don't have an Account?</a><br>
                        @if (Route::has('password.request'))
                            <a class="pt-1" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
        {{-- Login Section --}}
    </div>
</div>


@endsection
