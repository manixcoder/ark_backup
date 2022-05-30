<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('admin/plugins/images/favicon.png')); ?>">
    <title>Holidate - AdminPanel</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('admin/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?php echo e(asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')); ?>" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?php echo e(asset('admin/plugins/bower_components/toast-master/css/jquery.toast.css')); ?>" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?php echo e(asset('admin/plugins/bower_components/morrisjs/morris.css')); ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?php echo e(asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo e(asset('admin/css/animate.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('admin/css/style.css')); ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo e(asset('admin/css/colors/default.css')); ?>" id="theme" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="fix-header">
    <script src="<?php echo e(asset('admin/plugins/bower_components/toast-master/js/jquery.toast.js')); ?>"></script>
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
    <?php if( $errors->count() > 0 ): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <script>
                popup('Error', "<?php echo $message;?>");
            </script>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="lang">
        <a class="<?php echo e(App::isLocale('en') ? ' lang_active' : ''); ?>" href="<?php echo e(URL('/en')); ?>"><img src="<?php echo e(asset('images/')); ?>/uk.png" style="width: 12px; margin-right:5px;"> English</a>
        <a class="<?php echo e(App::isLocale('es') ? ' lang_active' : ''); ?>" href="<?php echo e(URL('/es')); ?>"><img src="<?php echo e(asset('images/')); ?>/es.png" style="width: 12px; margin-right:5px;"> Spanish</a>
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
    
            <div style="background: #e1e1e1; height:100vh; display:flex; align-items: center;">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12" 
                    style="border: 2px solid #dfdede; 
                    border-radius:8px; 
                    padding: 20px; background:#ffffff; 
                    box-shadow: 0px 2px 14px #b9b9b93e;
                    ">
                        <form class="register_form show_label1" id="loginForm" method="POST" action="<?php echo e(route('login')); ?>" novalidate="novalidate">
                        <?php echo e(csrf_field()); ?>

                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h3>Admin Panel <?php echo e(__('Login')); ?></h3>
                                    <div style="margin: 10px 0;">
                                        <?php if($errors->has('email')): ?>
                                            <span class="text-sm text-danger"><?php echo e($errors->first('email')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email"><?php echo e(__('Email')); ?></label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="<?php echo e(__('Email Address')); ?>">                                    
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12"style="position: relative;">                                    
                                    <label for="password"><?php echo e(__('Password')); ?></label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>" >
                                    <?php if($errors->has('password')): ?>
                                    <span class="text-sm text-danger"><?php echo e(__($errors->first('password'))); ?></span>
                                    <?php endif; ?>
                                    <p class="eye_icon" onclick="togglePassword()"><i id="passwordEye" class="fa fa-eye" aria-hidden="true" style="color: #b1b1b1; position: absolute; top:36px; right:30px;"></i></p>
                                    <script>
                                        function togglePassword() {
                                            var passwordInput = document.getElementById('password');
                                            var eye = document.getElementById('passwordEye');
                                            if (passwordInput.type === 'password') {
                                                passwordInput.type = 'text';
                                                eye.classList.remove('fa-eye');
                                                eye.classList.add('fa-eye-slash');
                                            } else {
                                                passwordInput.type = 'password';
                                                eye.classList.remove('fa-eye-slash');
                                                eye.classList.add('fa-eye');
                                            }
                                        }
                                    </script>
                                </div>
                                
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Login')); ?></button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            
        
    <script src="<?php echo e(asset('admin/plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?php echo e(asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')); ?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo e(asset('admin/js/jquery.slimscroll.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('admin/js/waves.js')); ?>"></script>
    <!--Counter js -->
    <script src="<?php echo e(asset('admin/plugins/bower_components/waypoints/lib/jquery.waypoints.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/bower_components/counterup/jquery.counterup.min.js')); ?>"></script>
    <!-- chartist chart -->
    <script src="<?php echo e(asset('admin/plugins/bower_components/chartist-js/dist/chartist.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="<?php echo e(asset('admin/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js')); ?>"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(asset('admin/js/custom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/js/dashboard1.js')); ?>"></script>   
</body>
</html><?php /**PATH /home/holidate/holidate_web/resources/views/admin/login.blade.php ENDPATH**/ ?>