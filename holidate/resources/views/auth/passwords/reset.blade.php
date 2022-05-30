@include('web_layout.login_header')
        <!-- Login-form-start -->
        <section class="allforms">
            <div class="login_form">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="register_form show_label1" id="loginForm" method="POST" action="{{ route('password.update') }}" novalidate="novalidate">
                        {{csrf_field()}}
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h3>{{__('Reset Password')}}</h3>
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div style="margin: 10px 0;">
                                        @if ($errors->has('email'))
                                            <span class="text-sm text-danger">{{ __($errors->first('email')) }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">{{__('Email')}}</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="{{__('Email Address')}}">
                                    
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">                                    
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="{{__('Password')}}">
                                    @if ($errors->has('password'))
                                    <span class="text-sm text-danger">{{ __($errors->first('password')) }}</span>
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
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">                                    
                                    <label for="password">{{__('Confirm Password')}}</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                    <span class="text-sm text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                    <p class="eye_icon" onclick="togglePassword()"><i id="passwordEye" class="fa fa-eye" aria-hidden="true" style="color: #d3b406;"></i></p>
                                    <script>
                                        function togglePassword() {
                                            var passwordInput = document.getElementById('password_confirmation');
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
                                    <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
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