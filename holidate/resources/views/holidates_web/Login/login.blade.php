@include('web_layout.login_header')

    <script src="{{asset('web_assets/js/jquery.mockjax-2.2.1.js')}}"></script>
    <script src="{{asset('web_assets/js/jquery.validate.js')}}"></script>
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
                        required: "{{__('Provide a password')}}",
                        minlength: jQuery.validator.format("Enter at least {0} characters")
                    },
                    email: {
                        required: "{{__('Please enter a valid email address')}}",
                        minlength: "{{__('Please enter a valid email address')}}",
                        email: "{{__('Please enter a valid email address')}}",
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
                        <form class="register_form show_label1" id="loginForm" method="POST" action="{{ route('login') }}" novalidate="novalidate">
                        {{csrf_field()}}
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h3>{{__('Login')}}</h3>
                                    <div style="margin: 10px 0;">
                                        @if ($errors->has('email'))
                                            <span class="text-sm text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">{{__('Email')}}</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="{{__('Email Address')}}">                                    
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">                                    
                                    <label for="password">{{__('Password')}}</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="{{__('Password')}}">
                                    @if ($errors->has('password'))
                                    <span class="text-sm text-danger">{{ __($errors->first('password'))  }}</span>
                                    @endif
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
                                    <p><a href="{{ URL::to('password/reset')}}">{{__('Forgot Password')}}?</a></p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" class="btn btn-primary">{{__('Login')}}</button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <p>{{__('Don\'t have an account')}}? <a href="{{ URL::to('signup')}}">{{__('Create Account')}}</a></p>
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('web_assets/js/functionality.js') }}"></script> --}}