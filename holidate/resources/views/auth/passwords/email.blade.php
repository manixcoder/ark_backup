@include('web_layout.login_header')
<section class="allforms">
    <div class="login_form">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <form class="register_form show_label1" id="loginForm" method="POST" action="{{ route('password.email') }}" novalidate="novalidate">
                {{csrf_field()}}
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <h3>{{__('Reset Password')}}</h3>
                            <div style="margin: 10px 0;">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger alert-dismissible text-left" style="position: relative;">
                                    <a class="close" style="position: relative" data-dismiss="alert" aria-hidden="true">×</a>
                                   @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                   @endforeach
                               </div>
                               @endif
                            </div>
                            <div class="alert alert-info alert-dismissible text-left" style="position: relative;">
                                <a class="close" style="position: relative" data-dismiss="alert" aria-hidden="true">×</a>
                                @if (session('status'))
                                    {{ session('status') }}
                                @else
                                {{__('Enter your Email and instructions will be sent to you')}}!
                                @endif
                            </div>
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="{{__('Email Address')}}">
                            
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
    {{-- <div class="wrapper-page">
        <div class="card card-pages">
            <div class="card-header bg-img"> 
                <div class="bg-overlay"></div>
                <h3 class="text-center m-t-10 text-white"> Reset Password </h3>
            </div> 
            <div class="card-body">
             @if (count($errors) > 0)
             <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </div>
            @endif
            <form  method="POST" action="{{ route('password.email') }}" class="text-center"> 
                @csrf
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    @if (session('status'))
                    {{ session('status') }}
                    @else
                    Enter your <b>Email</b> and instructions will be sent to you!
                    @endif
                </div>
                <div class="form-group m-b-0"> 
                    <div class="input-group"> 
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span class="input-group-append"> <button type="submit" class="btn btn-primary waves-effect waves-light"> {{ __('Send Password Reset Link') }}</button> </span> 
                    </div> 
                </div> 
            </form>
        </div>                                 
    </div> --}}
</div>
<script>
    var resizefunc = [];
</script>
<!-- Main  -->
<script src="{{ asset('public/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/detect.js') }}"></script>
<script src="{{ asset('public/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('public/assets/js/waves.js') }}"></script>
<script src="{{ asset('public/assets/js/wow.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('public/assets/js/jquery.app.js') }}"></script>
</body>
<!-- Mirrored from coderthemes.com/moltran/blue/pages-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Jun 2019 12:16:16 GMT -->
</html>