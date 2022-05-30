<?php echo $__env->make('web_layout.login_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="allforms">
    <div class="login_form">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form class="register_form show_label1" id="loginForm" method="POST" action="<?php echo e(route('password.email')); ?>" novalidate="novalidate">
                <?php echo e(csrf_field()); ?>

                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <h3><?php echo e(__('Reset Password')); ?></h3>
                            <div style="margin: 10px 0;">
                                <?php if(count($errors) > 0): ?>
                                <div class="alert alert-danger alert-dismissible text-left" style="position: relative;">
                                    <a class="close" style="position: relative" data-dismiss="alert" aria-hidden="true">×</a>
                                   <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li><?php echo e($error); ?></li>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               </div>
                               <?php endif; ?>
                            </div>
                            <div class="alert alert-info alert-dismissible text-left" style="position: relative;">
                                <a class="close" style="position: relative" data-dismiss="alert" aria-hidden="true">×</a>
                                <?php if(session('status')): ?>
                                    <?php echo e(session('status')); ?>

                                <?php else: ?>
                                <?php echo e(__('Enter your Email and instructions will be sent to you')); ?>!
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="email"><?php echo e(__('Email')); ?></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="<?php echo e(__('Email Address')); ?>">
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    
</div>
<script>
    var resizefunc = [];
</script>
<!-- Main  -->
<script src="<?php echo e(asset('public/assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/detect.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.blockUI.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/waves.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/wow.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.nicescroll.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.scrollTo.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/assets/js/jquery.app.js')); ?>"></script>
</body>
<!-- Mirrored from coderthemes.com/moltran/blue/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 12:16:16 GMT -->
</html><?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>