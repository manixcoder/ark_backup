
<!doctype html>
<html>
<head>
    <title>Index || Holidate</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
<link href="{{ asset('public/web_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>

<script src="{{ asset('public/web_assets/js/bootstrap.min.js') }}"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="{{ asset('public/web_assets/css/style.css') }}" rel="stylesheet"/>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/png" href="{{ asset('public/web_assets/images/logo.png') }}"/>
</head>

<body>
    <div class="login_page">
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
                            <a class="navbar-brand logo" href="{{ URL::to('home')}}"><img src="{{ asset('public/web_assets/images/logo.png') }}"
                                    class="img-responsive" /></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse main-nav" id="navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right sub-nav">
                                <!-- <li><a class="rghtborder" href="../startnewgroup/startnewgroup.html">Start a new group</a></li> -->
                                @if(Session::get('gorgID') > 0)
                                <li><a href="{{URL::to('profile')}}">Profile</a></li>
                                <li><a href="{{URL::to('login_web')}}">Login</a></li>
                                <li><a href="{{URL::to('signup')}}">Sign up</a></li>
                                @else
                                @endif

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- navigation-section-End -->
        </header>
        <!-- Login-form-start -->
        <section class="allforms">
            <div class="login_form">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="register_form" id="loginForm" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                        {{csrf_field()}}
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h3>LOGIN</h3>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Password">
                                    <p class="eye_icon"><i class="fa fa-eye" aria-hidden="true" style="color: #707070;"></i></p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <p><a href="../ForgotPassword/forgotpassword.html">Forgot Password?</a></p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" class="btn btn-primary">login</button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <p>Don't have an account? <a href="../Signup/signup.html">Create Account</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login-form-end -->
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('public/web_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/web_assets/js/functionality.js') }}"></script>