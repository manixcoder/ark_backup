<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/plugins/images/favicon.png')}}">
    <title>Holidate - AdminPanel</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="{{ asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}" rel="stylesheet">
    <!-- toast CSS -->
    <link href="{{ asset('admin/plugins/bower_components/toast-master/css/jquery.toast.css')}}" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{ asset('admin/plugins/bower_components/morrisjs/morris.css')}}" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="{{ asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')}}" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{ asset('admin/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{ asset('admin/css/colors/default.css')}}" id="theme" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header">
    <script src="{{ asset('admin/plugins/bower_components/toast-master/js/jquery.toast.js')}}"></script>
    <script>
        function popup(text, body){
            $.toast({
                heading: text,
                text: body,
                position: 'top-right',
                loaderBg: '#fff',
                icon: 'warning',
                hideAfter: 3500,
                stack: 6
            })
        }
    </script>
    @if ( $errors->count() > 0 )
        @foreach( $errors->all() as $message )
            <script>
                popup('Error', "<?php echo $message;?>");
            </script>
        @endforeach
    @endif
    <div class="lang">
        <a class="{{ App::isLocale('en') ? ' lang_active' : '' }}" href="{{URL('/en')}}"><img src="{{ asset('images/') }}/uk.png" style="width: 12px; margin-right:5px;"> English</a>
        <a class="{{ App::isLocale('es') ? ' lang_active' : '' }}" href="{{URL('/es')}}"><img src="{{ asset('images/') }}/es.png" style="width: 12px; margin-right:5px;"> Spanish</a>
    </div>
    <style>
        .lang{
            display: inline-block;
            top: 0;
            right: 160px;
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
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="{{route('adminpanel.dashboard')}}">
                        <!-- Logo icon image, you can use font-icon also -->
                        <b>
                            <!--This is dark logo icon-->
                            <img src="{{ asset('admin/plugins/images/admin-logo.png')}}" alt="home" class="dark-logo" />
                            <!--This is light logo icon-->
                            <img src="{{ asset('admin/plugins/images/admin-logo-dark.png')}}" alt="home" class="light-logo" />
                        </b>
                        <!-- Logo text image you can use text also -->
                        <span class="hidden-xs">
                            <!--This is dark logo text-->
                            <img src="{{ asset('admin/plugins/images/admin-text.png')}}" alt="home" class="dark-logo" />
                            <!--This is light logo text-->
                            <img src="{{ asset('admin/plugins/images/admin-text-dark.png')}}" alt="home" class="light-logo" />
                        </span> 
                    </a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="nav-toggler open-close waves-effect waves-light hidden-md hidden-lg" href="javascript:void(0)"><i class="fa fa-bars"></i></a>
                    </li>
                    {{-- <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> 
                            <a href="">
                                <i class="fa fa-search"></i>
                            </a> 
                        </form>
                    </li> --}}
                    <li>
                        <a class="profile-pic" data-toggle="dropdown" class="btn btn-default dropdown-toggle">
                            <img src="{{ asset('profile_image/') }}/{{ Auth::User()->profile_image}}" alt="user-img" style="height:36px; width:36px; object-fit:cover;" class="img-circle"><b class="hidden-xs">{{Auth::User()->name}}</b>
                        </a>
                        {{-- <button type="button" ><i class="fa fa-user" aria-hidden="true"></i></button> --}}
                        <ul class="dropdown-menu">
                            {{-- <li><a href="{{ URL::to('user_profile')}}">{{__('View Profile')}}</a></li> --}}
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    class="dropdown-item"><i class="md md-settings-power mr-2"></i>
                                    {{ __('Logout') }}</a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;"><a href="{{route('adminpanel.dashboard')}}" class="waves-effect"><i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>{{__('Dashboard')}}</a></li>
                    <li><a href="{{route('adminpanel.users')}}" class="waves-effect"><i class="fa fa-users fa-fw" aria-hidden="true"></i>{{__('Users')}}</a></li>
                    <li><a href="{{route('adminpanel.posts')}}" class="waves-effect"><i class="fa fa-bullhorn fa-fw" aria-hidden="true"></i>{{__('Posts')}}</a></li>
                    <li><a href="{{route('adminpanel.categories')}}" class="waves-effect"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i>{{__('Categories')}}</a></li>
                    <li><a href="{{route('adminpanel.report')}}" class="waves-effect"><i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>{{__('Report')}}</a></li>
                </ul>
                {{-- <div class="center p-20">
                     <a href="#" target="_blank" class="btn btn-danger btn-block waves-effect waves-light">Upgrade to Pro</a>
                 </div> --}}
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            @yield('content')
            <!-- /.container-fluid -->
            <footer class="footer text-center"> Holidate.es | AdminPanel </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/3.0.6/metisMenu.min.js" integrity="sha512-60b5sBjPn8P3x2sRsLFwdKgnCXXXliy9Z6sKgpLzTxj9+5G7Bu0coHIMTOggKZplcwPh4uPQ5V0sYpVEZW4Pjg==" crossorigin="anonymous"></script> --}}
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{ asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{ asset('admin/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('admin/js/waves.js')}}"></script>
    <!--Counter js -->
    <script src="{{ asset('admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js')}}"></script>
    <script src="{{ asset('admin/plugins/bower_components/counterup/jquery.counterup.min.js')}}"></script>
    <!-- chartist chart -->
    <script src="{{ asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.js')}}"></script>
    <script src="{{ asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')}}"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="{{ asset('admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin/js/custom.min.js') }}"></script>
    <script src="{{ asset('admin/js/dashboard1.js') }}"></script>
    
    
</body>
</html>