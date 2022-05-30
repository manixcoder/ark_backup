<?php 
    $id = Session::get('gorgID');
    $userrole = Session::get('userRole');
    $userdata = DB::table('users')->where('id', $id)->first();
   
?>
<!doctype html>
<html>
<head>
    <title>Index || Holidate</title>
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
<link href="{{ asset('web_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    {{-- <script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script> --}}
<script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="{{ asset('web_assets/css/style.css') }}" rel="stylesheet"/>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/png" href="{{ asset('web_assets/images/logo.png') }}"/>
<style>
    /* .error{margin: 0; padding: 0;} */
</style>
</head>

<body>
    <div class="lang">
        <a class="{{ App::isLocale('en') ? ' lang_active' : '' }}" href="{{URL('/en')}}"><img src="{{ asset('images/') }}/uk.png" style="width: 12px; margin-right:5px;"> English</a>
        <a class="{{ App::isLocale('es') ? ' lang_active' : '' }}" href="{{URL('/es')}}"><img src="{{ asset('images/') }}/es.png" style="width: 12px; margin-right:5px;"> Spanish</a>
    </div>
    <style>
        .lang{
            display: inline-block;
            top: 0;
            right: 30px;
            position: absolute;
            z-index: 9999;
            border:none;
        }
        .lang a{
            background: #707070;
            margin: 0 auto;
            font-size: 10px;
            padding: 4px 10px;
            color: #fff;
        }
        .lang_active{
            background: #4e4e4e !important;
            color: #FDCE22 !important;
        }
    </style>
    <div class="login_page login_page1">
        <!-- header-start -->
        <header class="header_Section login_header">
            <!-- navigation-section-start -->
            <div class="navigation-section">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header left-nav">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>  
                            <a class="navbar-brand logo" href="{{ URL::to('home')}}"><img src="{{ asset('web_assets/images/logo.png') }}"
                                    class="img-responsive" /></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse main-nav" id="navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right sub-nav">
                                @guest
                                    <!-- <li><a href="{{URL::to('signup')}}">Sign up</a></li>  -->
                                    <!-- <li><a href="{{URL::to('profile')}}">Profile</a></li> -->
                                    <li><a href="{{URL::to('signup')}}">{{__('Sign up')}}</a></li>
                                    <li><a href="{{URL::to('login_web')}}">{{__('Login')}}</a></li>
                                    
                                @else
                                    
                                   <li><a class="rghtborder disabled" href="#" disable>Notification</a></li>
                                    <div class="btn-group filter-button">
                                        <button type="button" data-toggle="dropdown" lass="btn btn-default dropdown-toggle"><i class="fa fa-user" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ URL::to('user_profile')}}">{{__('View Profile')}}</a></li>
                                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> {{ __('Logout') }}</a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                    
                                    
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- navigation-section-End -->
        </header>