<?php echo $__env->make('web_layout.login_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script src="<?php echo e(asset('web_assets/js/jquery.mockjax-2.2.1.js')); ?>"></script>
    <script src="<?php echo e(asset('web_assets/js/jquery.validate.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            var validator = $("#loginForm").validate({
                rules: {
                    password: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                        // remote: "emails.action"
                    }
                    // terms: "required"
                },
                messages: {
                    password: {
                        required: "<?php echo e(__('Provide a password')); ?>",
                        minlength: jQuery.validator.format("Enter at least {0} characters")
                    },
                    email: {
                        required: "<?php echo e(__('Please enter a valid email address')); ?>",
                        minlength: "<?php echo e(__('Please enter a valid email address')); ?>",
                        email: "<?php echo e(__('Please enter a valid email address')); ?>",
                        // remote: jQuery.validator.format("{0} is already in use")
                    }
                    // terms: " "
                },
                success: function(label) {
                    // set &nbsp; as text for IE
                    label.html("&nbsp;").addClass("checked");
                },
                highlight: function(element, errorClass) {
                    $(element).parent().next().find("." + errorClass).removeClass("checked");
                }
            });
    
            // propose username by combining first- and lastname
            $("#username").focus(function() {
                var firstname = $("#firstname").val();
                var lastname = $("#lastname").val();
                if (firstname && lastname && !this.value) {
                    this.value = (firstname + "." + lastname).toLowerCase();
                }
            });
        });
        </script>
        <!-- Login-form-start -->
        <section class="allforms">
            <div class="login_form">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="register_form show_label1" id="loginForm" method="POST" action="<?php echo e(route('login')); ?>" novalidate="novalidate">
                        <?php echo e(csrf_field()); ?>

                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h3><?php echo e(__('Login')); ?></h3>
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
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">                                    
                                    <label for="password"><?php echo e(__('Password')); ?></label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>">
                                    <?php if($errors->has('password')): ?>
                                    <span class="text-sm text-danger"><?php echo e(__($errors->first('password'))); ?></span>
                                    <?php endif; ?>
                                    <p class="eye_icon" onclick="togglePassword()"><i id="passwordEye" class="fa fa-eye" aria-hidden="true" style="color: #d3b406;"></i></p>
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
                                    <p><a href="<?php echo e(URL::to('password/reset')); ?>"><?php echo e(__('Forgot Password')); ?>?</a></p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Login')); ?></button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <p><?php echo e(__('Don\'t have an account')); ?>? <a href="<?php echo e(URL::to('signup')); ?>"><?php echo e(__('Create Account')); ?></a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login-form-end -->
</body>

</html>
<?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/holidates_web/Login/login.blade.php ENDPATH**/ ?>