@extends('layouts.app')

@section('content')

<div class="header_section">
    <div class="container pt-5">
        {{-- Nav Bar Include --}}
        @include('includes.nav_bar')
        {{-- Nav Bar Include --}}

        {{-- Register Section --}}
        <div class="container register_container">
            <div class="register_box">
                <div class="box_title">
                    REGISTER
                </div>
                <div class="input_box">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-12 mb-0">
                            <button type="submit" class="register_button">
                                {{ __('Register') }}
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
                        <a href="/login">Already Registered?</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- Register Section --}}
    </div>
</div>


@endsection
