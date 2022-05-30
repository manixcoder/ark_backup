@include('web_layout.login_header')
<!-- Login-form-start -->
        <section class="allforms">
            <div class="login_form">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="register_form" action="#" method="post">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h3>Forgot Password</h3>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <p>Don't have an account? <a href="{{ URL::to('signup')}}">Create Account</a></p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <!--<p>Email verification after fill the form <a href="../EmailVerification/emailverify.html">verify</a></p>-->
                                </div>
<!--                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <p>reset password page <a href="resetpassword.html">reset</a></p>
                                </div>-->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login-form-end -->
        
        </body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('web_assets/js/functionality.js') }}"></script>