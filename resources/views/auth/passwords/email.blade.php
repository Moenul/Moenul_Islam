@extends('layouts.app')

@section('content')

<div class="header_section">
    <div class="container pt-5">

        {{-- Email Section --}}
        <div class="container register_container">
            <div class="register_box">
                <div class="box_title">
                    {{ __('Reset Password') }}
                </div>
                <div class="input_box">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="col-12 mb-3">
                            <button type="submit" class="register_button">
                                {{ __('Send Password Reset Link') }}
                            </button>
                            <p class="text-center mt-2">
                                <a href="../" class="text-dark">Return Back?</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Email Section --}}
    </div>
</div>
@endsection
