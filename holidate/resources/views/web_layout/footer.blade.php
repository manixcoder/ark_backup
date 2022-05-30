<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- footer-section-start -->
<footer class="footer_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content width100">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <img src="{{ asset('web_assets/images/logo.png') }}" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content">
                <div class="row">
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <li>
                            <h5>{{__('Discover')}}</h5>
                        </li>
                        <!--<li><a href="{{ URL::to('not-available') }}">Groups</a></li>-->
                        <li><a href="{{ URL::to('all_people') }}">{{__('People')}}</a></li>
                        <!--<li><a href="#">{{__('Events')}}</a></li>-->
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content">
                <div class="row">
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <li>
                            <h5>{{__('Holidate')}}</h5>
                        </li>
                        <li><a href="#">{{__('About Us')}}</a></li>
                        <li><a href="#">{{__('Careers')}}</a></li>
                        <!-- <li><a href="#">Apps</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content width100">
                <div class="row">
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <li>
                            <h5>{{__('Follow us')}}</h5>
                        </li>
                    </ul>
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 socaillinks">
                        <li><a target="_blank" href="https://www.facebook.com" class="background395693"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com" class="background0e72a3"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com" class="background1c9cea"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 applinkes">
                        <li><a target="_blank" href="https://www.apple.com/in/ios/app-store/"><img
                                    src="{{ asset('web_assets/images/app_store.png') }}" /></a></li>
                        <li><a target="_blank" href="https://play.google.com/store?hl=en_IN"><img
                                    src="{{ asset('web_assets/images/google_play.png') }}" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="copyright_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <p>{{__('Copyright')}} 2020</p>
            </div>
        </div>
    </div>
</section>
</div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script>
{{-- <script src="{{ asset('web_assets/js/functionality.js') }}"></script> --}}
{{-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> --}}

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
{{-- <script type="text/javascript" src="../js/dialogbox.js"></script> --}}
{{-- <script type="text/javascript">
    function initGeolocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Sorry, your browser does not support geolocation services.");
        }
    }

    function success(position) {
        var lon = position.coords.longitude;
        var lat = position.coords.latitude;
        var latlon = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," +
            position.coords.longitude + "&sensor=true";
        $.get({
            url: latlon,
            success: function (data) {
                console.log(data);
                document.getelementbyid('city')
            }
        });
        //alert(latlon);
    }

    function fail() {
        // Could not obtain location
    }

</script> --}}

<script type="text/javascript">
    function view_model(id) {
        var url = "{{url('people/connect/')}}" + '/' + id;
        $("#modelurl").attr("href", url);
        $('#connectwithpeople').modal('show');
    }

</script>

