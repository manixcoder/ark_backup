@extends('layouts.app')
@section('content')
<div class="loginfull-box">

    <div class="arklogin-box">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="logo-login">
            <a href="#"><img src="https://arknewtech.com/assets/images/ark_logo.png"></a>
        </div>
        <form class="loginform-sec" method="POST" id="loginform" action="{{ route('password.email') }}">
            @csrf
            <h3>Forgot Password</h3>
            <div class="from-group">
                <input type="email" name="email" placeholder="Enter Registered Email Address" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" style="display:block !important" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="from-group login-btn">
                <button type="submit" name="otp" class="btn login">Send Me OTP</button>
            </div>
        </form>
    </div>
</div>
@endsection