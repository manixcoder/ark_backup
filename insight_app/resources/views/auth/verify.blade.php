@extends('layouts.auth')
@section('content')

<div class="pl-3 pr-3">
    <div class="sheet max-width-400">
        <h1 class="header-dark-24 text-center">Create an Account</h1>
        <div class="card">
            <div class="card-header">{{ __('Verify Your Email Address') }}</div>
            <div class="card-body">
                @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    {{ __('A fresh verification link has been sent to your email address.') }}
                </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
            </div>
        </div>
    </div>
</div>
@endsection