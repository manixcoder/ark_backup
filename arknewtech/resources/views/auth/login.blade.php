@extends('layouts.app')
@section('content')

    <div class="loginfull-box">
        <div class="arklogin-box">
            <div class="logo-login">
                <a href="#"><img src="https://arknewtech.com/assets/images/ark_logo.png"></a>
            </div>
            <form class="loginform-sec" method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Admin Login</h3>
                <div class="from-group">
                    <input type="email" name="email" placeholder="Email address" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="from-group">
                    <input type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="from-group forgat-pass">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password ?</a>
                    @endif
                </div>
                <div class="from-group login-btn">
                    <button type="submit" name="login" class="btn login">Login</button>
                </div>
            </form>
        </div>
    </div>

@endsection