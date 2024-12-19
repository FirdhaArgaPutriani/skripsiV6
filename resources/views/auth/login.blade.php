@extends('layouts.app')

@section('title', 'Login - Dionne')

@section('content')
<section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="signup-image-link">Create an account</a>
                @endif

            </div>

            <div class="signin-form">
                <h2 class="form-title">{{ __('Log In') }}</h2>
                <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                    @csrf

                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password"><i class="zmdi zmdi-lock"></i></label>
                        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="agree-term" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="label-agree-term" for="remember">
                            <span><span></span></span>{{ __('Remember Me') }}
                        </label>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>

                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="{{ __('Log In') }}" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
