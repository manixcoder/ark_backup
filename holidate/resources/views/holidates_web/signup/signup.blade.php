@include('web_layout.login_header')
{{--  --}}
    {{-- <script src="{{asset('web_assets/js/jquery.js')}}"></script> --}}
    <script src="{{asset('web_assets/js/jquery.mockjax-2.2.1.js')}}"></script>
    <script src="{{asset('web_assets/js/jquery.validate.js')}}"></script>
	{{-- <script src="../../lib/jquery.mockjax.js"></script>
	<script src="../../dist/jquery.validate.js"></script> --}}
	<script>
	$(document).ready(function() {
		$.mockjax({
			url: "emails.action",
			response: function(settings) {
                var email = settings.data.email,
                        
                    // emails = ["glen@marketo.com", "george@bush.gov", "me@god.com", "aboutface@cooper.com", "steam@valve.com", "bill@gates.com"];
                    emails = [
                        @php 
                        $allemails =  DB::table('users')->select('email')->get(); 
                        $allemails = json_decode($allemails, true);
                        foreach ($allemails as $d) {
                            foreach ($d as $k => $v) {
                                echo "'$v',";
                            }
                        }
                        @endphp

                    ]
				this.responseText = "true";
				if ($.inArray(email, emails) !== -1) {
					this.responseText = "false";
				}
			},
			responseTime: 500
		});

		// $.mockjax({
		// 	url: "users.action",
		// 	response: function(settings) {
		// 		var user = settings.data.username,
		// 			users = ["asdf", "Peter", "Peter2", "George"];
		// 		this.responseText = "true";
		// 		if ($.inArray(user, users) !== -1) {
		// 			this.responseText = "false";
		// 		}
		// 	},
		// 	responseTime: 500
		// });

        // validate signup form on keyup and submit
        $.validator.addMethod("pwcheckspechars", function (value) {
            return /[!@#$%^&*()_=\[\]{};':"\\|,.<>\/?+-]/.test(value)
        }, "{{__('The password must contain at least one special character')}}");
        
        $.validator.addMethod("pwchecklowercase", function (value) {
            return /[a-z]/.test(value) // has a lowercase letter
        }, "{{__('The password must contain at least one lowercase letter')}}");
        
        $.validator.addMethod("pwcheckrepeatnum", function (value) {
            return /\d{2}/.test(value) // has a lowercase letter
        }, "{{__('The password must contain at least one lowercase letter')}}");
        
        $.validator.addMethod("pwcheckuppercase", function (value) {
            return /[A-Z]/.test(value) // has an uppercase letter
        }, "{{__('The password must contain at least one uppercase letter')}}");
        
        $.validator.addMethod("pwchecknumber", function (value) {
            return /\d/.test(value) // has a digit
        }, "{{__('The password must contain at least one number')}}");
		var validator = $("#signupform").validate({
			rules: {
				name: {
                    required: true,
                },
				surname:{
                    required: true,
                },
                profile_image:{
                    required: true,
                },
                hobbies:{
                    required: true,
                },
				// username: {
				// 	required: true,
				// 	minlength: 2,
				// 	remote: "users.action" hobbies
				// },
				password: {
					required: true,
					pwchecklowercase: true,
                    pwcheckuppercase: true,
                    pwchecknumber: true,
                    pwcheckspechars: true,
                    minlength: 8,
				},
				password_confirm: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
                password_confirmation: {
					required: true,
					minlength: 8,
					equalTo: "#password"
				},
				email: {
					required: true,
					email: true,
					remote: "emails.action"
                },
                
				phone: {
                    required: true,
					minlength: 10,
                },
				// terms: "required"
			},
			messages: {
				name: {
                    required: "{{__('Enter your firstname')}}"
                },
				surname: {
                    required: "{{__('Enter your lastname')}}"
                },
                profile_image: {
                    required: "{{__('Please provide a image')}}"
                },
                hobbies: {
                    required: "{{__('Please select a hobbie')}}"
                },
				// username: {
				// 	required: "Enter a username", hobbies
				// 	minlength: jQuery.validator.format("Enter at least {0} characters"),
				// 	remote: jQuery.validator.format("{0} is already in use")
				// },
				password: {
					required: "{{__('Provide a password')}}",
					minlength: jQuery.validator.format("{{__('Enter at least')}} {0} {{__('characters')}}")
				},
				password_confirm: {
					required: "{{__('Repeat your password')}}",
					minlength: jQuery.validator.format("{{__('Enter at least')}} {0} {{__('characters')}}"),
					equalTo: "{{__('Enter the same password as above')}}"
				},
                password_confirmation: {
					required: "{{__('Repeat your password')}}",
					minlength: jQuery.validator.format("{{__('Enter at least')}} {0} {{__('characters')}}"),
					equalTo: "{{__('Enter the same password as above')}}"
				},
				email: {
					required: "{{__('Please enter a valid email address')}}",
					minlength: "{{__('Please enter a valid email address')}}",
					remote: jQuery.validator.format("{0} {{__('is already in use')}}")
				},
				phone: {
                    required: "{{__('Please enter a Phone number')}}",
					minlength: jQuery.validator.format("{{__('Enter at least')}} {0} {{__('characters')}}")
                }
				// terms: " "
			},
			// the errorPlacement has to take the table layout into account
			// errorPlacement: function(error, element) {
			// 	if (element.is(":radio"))
			// 		error.appendTo(element.parent().next().next());
			// 	else if (element.is(":checkbox"))
			// 		error.appendTo(element.next());
			// 	else
			// 		error.appendTo(element.parent().next());
			// },
			// specifying a submitHandler prevents the default submit, good for the demo
			// submitHandler: function() {
			// 	alert("submitted!");
			// },
			// set this class to error-labels to indicate valid fields
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

{{--  --}}
<!-- header-end -->
<!-- Login-form-start -->
{{-- <script src="{{ asset('web_assets/js/jquery-3.5.1.slim.min.js') }}"></script> --}}

<section class="allforms allforms1">
    <div class="login_form signup_form1">
        <div class="row">
            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <a href="../index.html"><img src="../assets/images/logo.png" /></a>
                    </div> -->
                    
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form class="register_form show_label1" action="{{ URL::to('add-user') }}" method="POST" id="signupform" enctype="multipart/form-data" name="signupform">
                    {{csrf_field()}}
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <h3>{{__('Sign up')}}</h3>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                            {{-- @foreach ($errors->all() as $error)
                            {!! $error !!} <br>
                            @endforeach --}}
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label for="name">{{__('Name')}} <sup>*</sup></label>
                            <!--{{-- <p id="nameError" style="font-size:12px; color:#a90000;">Name is required</p> --}}-->
                            <input type="text" id="name" name="name" class="form-control name-valid" placeholder="{{__('Name')}}" required />
                            <!--{{-- <script>-->
                            <!--    var nameToggle = document.getElementById('nameError');-->
                            <!--    var nameCheck = function(){-->
                            <!--    nameToggle.style.display = "none";-->
                            <!--        if(document.myForm.name.length >= 1){-->
                            <!--            nameToggle.style.display = "none";-->
                            <!--        } else{-->
                            <!--            nameToggle.style.display = "block";-->
                            <!--        }-->
                            <!--    }-->
                            <!--    nameCheck();-->
                            <!--</script> --}}-->
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="surname">{{__('Surname')}} <sup>*</sup></label>
                            <input type="text" id="surname" name="surname" class="form-control name-valid" placeholder="{{__('Surname')}}" required="" />
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="email">{{__('Email Id')}} <sup>*</sup></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="{{__('Email Id')}}" required>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <!--@if ($errors->has('phone'))-->
                            <!--    <span class="text-sm text-danger">{{ $errors->first('phone') }}</span>-->
                            <!--@endif-->
                            <label for="phone">{{__('Phone Number')}} <sup>*</sup></label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="{{__('Phone Number')}}"
                                required=""
                                onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"
                                maxlength="10">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="hobbies">{{__('Hobbies')}} <sup>*</sup></label>
                            <?php $hobbies = DB::table('hobbies')->get(); ?>
                            <select name="hobbies[]" id="hobbies" multiple class="form-control" required  style="height: 70px;">
                                @foreach ($hobbies as $hobbie)
                                <option value="{{$hobbie->id}}">{{__($hobbie->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="profile_image">{{__('Profile Image')}} <sup>*</sup></label>
                            <input type="file" id="file" name="profile_image" onchange="Filevalidation()" class="form-control demoInputBox" accept="image/x-png,image/gif,image/jpeg" required=""  style="height: 70px;">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="password">{{__('Password')}} <sup>*</sup></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="{{__('Password')}}" required="">
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
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label for="password_confirmation">{{__('Confirm Password')}} <sup>*</sup></label>
                            <input type="password" id="confirm_password" name="password_confirmation"
                                class="form-control" placeholder="{{__('Confirm Password')}}" required=""
                                onchange="passwordmach()">
                            <span id='message'></span>
                            <p class="eye_icon" onclick="togglePassword2()"><i id="confirmPasswordEye" class="fa fa-eye" aria-hidden="true" style="color: #d3b406;"></i></p>
                            <script>
                                function togglePassword2() {
                                    var passwordInput = document.getElementById('confirm_password');
                                    var eye = document.getElementById('confirmPasswordEye');
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
                            {{-- @if ($errors->has('password'))
                                <span class="text-sm text-danger">{{ $errors->first('password') }}</span>
                            @endif --}}
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="teramandconditions" style="display: flex; padding:4px;">
                                <input type="checkbox" id="terms" name="terms" value="Bike">
                                <a href="#" style="padding:18px 12px; text-decoration: none !important;">{{__('Terms & Conditions')}}. <span>{{__('By clicking Create Account I agree to Reminders')}}.</span></a>
                            </div>
                            <!-- <div class="" style="display: flex; padding:4px;">
                                <input type="checkbox" id="privacy" name="privacy" value="Bike">
                                <a href="#" style="padding:18px 12px;">Privacy Policy.</a>
                            </div>-->
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <div class="text-left text-danger" id="checkTerms">{{__('Please accept and tick "Terms & Conditions" check box and read the same carefully before Sigup')}}.</div>
                            <button type="button" class="btn btn-primary" id="submitBtn" onclick="submitBtnFun()">{{__('Sign up')}}</button>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <p>{{__('Already a member')}}? <a href="{{ URL::to('login_web')}}">{{__('Login')}}</a></p>
                        </div>
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <p>Email verification after fill the form <a href="../EmailVerification/emailverify.html">verify</a></p>
                        </div>-->
                        <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <p>After Email verification create profile <a href="{{ URL::to('signup')}}">Create Profile</a></p>
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Login-form-end -->
</div>
{{-- <script src="{{asset('web_assets/js/jquery-3.5.1.slim.min.js')}}"></script> --}}
<script>
    // Name and Surname Validation for letters and space only
    $(document).ready(function () {
        $('.name-valid').on('keypress', function (e) {
            var regex = new RegExp("^[a-zA-Z ]*$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            e.preventDefault();
            return false;
        });
    });

</script>
<script>
    function passwordmach()
    {
        var pass = $('#password').val()
        var copass = $('#confirm_password').val()
        if(pass == copass){
            return true;
        }else{
            alert('Please enter valid confirm password');
            $("#confirm_password").val('');    
          $("#confirm_password").focus();
        }
    }
    $('#password, #confirm_password').on('keyup', function () {
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('{{__('Matching')}}').css('color', 'green');
      } else 
        $('#message').html('{{__('Not')}} {{__('Matching')}}').css('color', 'red');
    });

</script>
<script>
    //Check Therms & Conditions check box
    var submitBtn = document.getElementById('submitBtn');
    checkTerms.style.display = "none";

    function submitBtnFun() {
        // alert('hello');
        var terms = document.getElementById('terms');
        var checkTerms = document.getElementById('checkTerms');
        //var privacy = document.getElementById('privacy');
        if (terms.checked == true) {
            submitBtn.type = 'submit';
            checkTerms.style.display = "none";
        } else {
            checkTerms.style.display = "block";
        }
    }

</script>
<script>
    //File Validation
    Filevalidation = () => {
        const fi = document.getElementById('file');
        // Check if any file is selected. 
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                if (file >= 2048) {
                    alert("File too Big, please select a file less than 2mb");
                    $("#file").val('');
                    $("#file").focus();
                } else {
                    return true;
                }
            }
        }
    }
</script>
<script type="text/javascript">
    //email duplicacy check
    function email_check() {
        var y = $('#email').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{url('useremail/')}}" + '/' + y,
            method: "POST",
            contentType: 'application/json',
            success: function (data) {
                if (data) {
                    alert('Email already registered');
                    $("#email").val('');
                    $("#email").focus();
                } else {
                    return true;
                }
            }
        });
    }

</script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> --}}
{{-- <script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script> --}}
{{-- <script src="{{ asset('web_assets/js/jquery.validate.min.js') }}"></script> --}}
{{-- <script src="{{ asset('web_assets/js/additional-methods.js') }}"></script> --}}
{{-- <script src="{{ asset('web_assets/js/signup_validation.js') }}"></script> --}}
{{-- <script src="{{ asset('web_assets/js/functionality.js') }}"></script> --}}
</body>
</html>

