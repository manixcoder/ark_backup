@extends('layouts.app')
@section('content')

<div class="loginfull-box">
    <div class="arklogin-box">
        <div class="logo-login">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <a href="#"><img src="https://arknewtech.com/assets/images/ark_logo.png"></a>
        </div>
        <form class="loginform-sec" method="POST" id="loginform" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
            <h3>Verification</h3>
            <div class="from-group">
                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" style="display:block !important" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="from-group">
                <input type="text" name="otp" placeholder="Enter OTP" class="form-control">
            </div>
            <div class="from-group login-btn">
                <button type="submit" name="Verify" class="btn login">Verify</button>
            </div>
        </form>
    </div>
</div>


@endsection