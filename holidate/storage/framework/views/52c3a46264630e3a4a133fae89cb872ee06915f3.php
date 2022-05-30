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
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->
<link href="<?php echo e(asset('web_assets/css/bootstrap.min.css')); ?>" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
<script src="<?php echo e(asset('web_assets/js/bootstrap.min.js')); ?>"></script>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="<?php echo e(asset('web_assets/css/style.css')); ?>" rel="stylesheet"/>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/png" href="<?php echo e(asset('web_assets/images/logo.png')); ?>"/>
<style>
    /* .error{margin: 0; padding: 0;} */
</style>
</head>

<body>
    <div class="lang">
        <a class="<?php echo e(App::isLocale('en') ? ' lang_active' : ''); ?>" href="<?php echo e(URL('/en')); ?>"><img src="<?php echo e(asset('images/')); ?>/uk.png" style="width: 12px; margin-right:5px;"> English</a>
        <a class="<?php echo e(App::isLocale('es') ? ' lang_active' : ''); ?>" href="<?php echo e(URL('/es')); ?>"><img src="<?php echo e(asset('images/')); ?>/es.png" style="width: 12px; margin-right:5px;"> Spanish</a>
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
                            <a class="navbar-brand logo" href="<?php echo e(URL::to('home')); ?>"><img src="<?php echo e(asset('web_assets/images/logo.png')); ?>"
                                    class="img-responsive" /></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse main-nav" id="navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right sub-nav">
                                <?php if(auth()->guard()->guest()): ?>
                                    <!-- <li><a href="<?php echo e(URL::to('signup')); ?>">Sign up</a></li>  -->
                                    <!-- <li><a href="<?php echo e(URL::to('profile')); ?>">Profile</a></li> -->
                                    <li><a href="<?php echo e(URL::to('signup')); ?>"><?php echo e(__('Sign up')); ?></a></li>
                                    <li><a href="<?php echo e(URL::to('login_web')); ?>"><?php echo e(__('Login')); ?></a></li>
                                    
                                <?php else: ?>
                                    
                                   <li><a class="rghtborder disabled" href="#" disable>Notification</a></li>
                                    <div class="btn-group filter-button">
                                        <button type="button" data-toggle="dropdown" lass="btn btn-default dropdown-toggle"><i class="fa fa-user" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?php echo e(URL::to('user_profile')); ?>"><?php echo e(__('View Profile')); ?></a></li>
                                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" class="dropdown-item"><i class="md md-settings-power mr-2"></i> <?php echo e(__('Logout')); ?></a>
                                            </li>
                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                style="display: none;">
                                                <?php echo csrf_field(); ?>
                                            </form>
                                        </ul>
                                    </div>
                                    
                                    
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <!-- navigation-section-End -->
        </header><?php /**PATH D:\xampp\htdocs\222holidate\resources\views/web_layout/login_header.blade.php ENDPATH**/ ?>