@include('web_layout.header')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA&callback=initGeolocation" type="text/javascript"></script>
<script type="text/javascript">
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
        var latlon = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," +
            position.coords.longitude + "&sensor=true+CA&key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA";
        $.get({
            url: latlon,
            success: function (data) {
                console.log(data);

                /* document.getElementById("addressBox").value = data.results[1].formatted_address;
                document.getElementById("longitudeBox").value = lon;
                document.getElementById("latitudeBox").value = lat; */

            }
        });
        //alert(latlon);
    }
    function fail() {
        // Could not obtain location
    }
</script>

<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info user_basic_info1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center basic_info">
                                    <div class="profile_img">
                                        <button type="button" class="text-center pic-edit" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        @include('holidates_web.inc.pic-edit')
                                        @if($userdata->profile_image!='')
                                        <img src="{{ asset('profile_image/') }}/{{ $userdata->profile_image}}" />
                                        @else
                                        <img src="{{ asset('no-image.jpg')}}" />
                                        @endif
                                    </div>
                                    <div class="username_section">
                                        <h3>{{ $userdata->name}} {{ $userdata->surname}}</h3>
                                        <p><i class="fa fa-envelope" aria-hidden="true"></i>{{ $userdata->email}}</p>
                                        <p><i class="fa fa-phone" aria-hidden="true"></i>{{ $userdata->phone}}</p>
                                    </div>
                                    <div class="network_section">
                                        <ul>
                                            <li><a href="#" class="backgroundfacebook"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="backgroundtwitter"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="backgroundlinkedin"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    {{--  --}}
                                    <!-- <div class="new_event">
                                        <a class="btn btn-primary " href="{{route('event.create')}}">Add New Event</a>
                                    </div>-->
                                    {{--  --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('Edit User')}}:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label"
                                                action="{{route('user.profile.update')}}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="name">{{__('Name')}}</label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="surname">{{__('Surname')}}</label>
                                                        <input type="text" class="form-control" name="surname"
                                                            placeholder="Surame" value="{{$user->surname}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="emil">{{__('Email')}}</label>
                                                        <input type="email" class="form-control" disabled name="email"
                                                            placeholder="Email" value="{{$user->email}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="phone">{{__('Phone')}}</label>
                                                        <input type="tel" class="form-control" name="phone"
                                                            value="{{$user->phone }}" maxlength="10">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="Hobbies">{{__('Hobbies')}}</label>
                                                        <select name="hobbies[]" class="form-control" multiple style="height: 70px;">
                                                            @foreach ($user->hobbies as $hob)
                                                            <option selected value="{{$hob->id}}">{{__($hob->name)}}
                                                            </option>
                                                            @endforeach
                                                            @foreach ($hobbies as $hobbie)
                                                            <option value="{{$hobbie->id}}">{{__($hobbie->name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="languages">{{__('Languages')}}</label>
                                                        <select id="selectLanguages" name="languages[]"
                                                            class="form-control js-example-basic-multiple" multiple style="height: 70px;">
                                                            @foreach ($user->languages as $item)
                                                                <option selected value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                            @foreach ($languages as $language)
                                                            <option value="{{$language->id}}">{{$language->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="web">{{__('Website')}}</label>
                                                        <input type="text" class="form-control" name="web"
                                                            value="{{$user->web }}" value="{{$user->web}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Country')}}</label>
                                                        <select name="country_id" class="form-control">
                                                            <option selected value="{{$user->country->id ?? ''}}">{{$user->country->name ?? 'Select Your Country'}}</option>
                                                            @foreach ($countries as $c)
                                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Professional Category')}}</label>
                                                        <select name="professional_category_id" class="form-control">
                                                            <option value="{{$user->professional_category->id ?? ''}}">{{$user->professional_category->name ?? 'Select Your Professional Category'}}</option>
                                                            @foreach ($pro_categories as $c)
                                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Marital Status')}}</label>
                                                        <select name="marital_status" class="form-control">
                                                            <option selected
                                                                value="{{$user->marital_status ?? 'Select Your Status'}}">
                                                                {{$user->marital_status ?? 'Select Your Status'}}
                                                            </option>
                                                            <option
                                                                class="@if($user->marital_status == 'Single') hidden @endif"
                                                                value="Single">Single</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Married') hidden @endif"
                                                                value="Married">Married</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Widowed') hidden @endif"
                                                                value="Widowed">Widowed</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Separated') hidden @endif"
                                                                value="Separated">Separated</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Divorced') hidden @endif"
                                                                value="Divorced">Divorced</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="vacation_city">{{__('Vacation City')}}</label>
                                                        <input type="text" class="form-control" name="vacation_city" value="{{$user->vacation_city }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="city">{{__('City')}}</label>
                                                        <input type="text" class="form-control" name="city" value="{{$user->city }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Age')}}</label>
                                                        <input type="text" class="form-control" name="age" value="{{$user->age }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('Current Company')}}</label>
                                                        <input type="text" class="form-control" name="current_company" value="{{$user->current_company }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('Address')}}</label>
                                                        <input type="text" id="addressBox" class="form-control" name="address" value="{{$user->address}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('latitude')}}</label>
                                                        <input type="text" id="latitudeBox" class="form-control" name="latitude" readonly value="{{$user->latitude}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('longitude')}}</label>
                                                        <input type="text" id="longitudeBox" class="form-control" name="longitude" readonly value="{{$user->longitude}}">
                                                    </div>                                                    
                                                </div>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                <script>
                                                $(document).ready(function(){
                                                    $("#addressBox").keyup(function(){
                                                    add = $("#addressBox").val();
                                                        $.get("https://maps.googleapis.com/maps/api/geocode/json?address="+add+",+CA&key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA", function(data, status){
                                                        // console.log(data);
                                                        $("#latitudeBox").val(data.results[0].geometry.location.lat);
                                                        $("#longitudeBox").val(data.results[0].geometry.location.lng);
                                                        });
                                                    });
                                                });
                                                </script>
                                                <div class="row">                                                    
                                                    <div style="text-align: center; font-size:18px;">Social Media {{__('Profile')}}</div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="facebook"><i class="fa fa-facebook-square"></i>  Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" value="{{$user->facebook }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="instagram"><i class="fa fa-instagram"></i>  instagram</label>
                                                        <input type="text" class="form-control" name="instagram" value="{{$user->instagram }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="twitter"><i class="fa fa-twitter-square"></i>  twitter</label>
                                                        <input type="text" class="form-control" name="twitter" value="{{$user->twitter }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="youtube"><i class="fa fa-youtube-square"></i>  youtube</label>
                                                        <input type="text" class="form-control" name="youtube" value="{{$user->youtube }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="linkedin"><i class="fa fa-linkedin-square"></i>  linkedin</label>
                                                        <input type="text" class="form-control" name="linkedin" value="{{$user->linkedin }}">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary" id="search">{{__('Update')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile Pic</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="register_form register_form1 show_label"
                                                action="{{route('user.profile-pic-update')}}" method="post"
                                                enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        @if ($errors->has('profile_image'))
                                                        <span
                                                            class="text-sm text-danger">{{ $errors->first('profile_image') }}</span>
                                                        @endif
                                                        <input type="file" class="form-control" id="profile_image"
                                                            name="profile_image">
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save </button>
                                                    </div>




                                                </div>
                                            </form>
                                        </div>

                                        <!--<form action="{{route('user.profile-pic-update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @if ($errors->has('profile_image'))
                            <span class="text-sm text-danger">{{ $errors->first('profile_image') }}</span>
                        @endif
                        <label for="email">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>-->
                                    </div>
                                </div>
                            </div>




                            <!--<div class=" nomargin">-->
                            <!--    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">-->

                            <!--         <h3>Edit User</h3>-->

                            <!--        <form action="{{route('user.profile.update')}}" method="post">-->
                            <!--            @csrf-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-md-12">-->
                            <!--                    <div class="text-sm text-danger">-->
                            <!--                        @foreach ($errors->all() as $error)-->
                            <!--                            {!! $error !!} <br>-->
                            <!--                        @endforeach-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="name">Name</label>-->
                            <!--                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="surname">Surname</label>-->
                            <!--                        <input type="text" class="form-control" name="surname" placeholder="Surame" value="{{$user->surname}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="phone">Phone</label>-->
                            <!--                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="web">Web</label>-->
                            <!--                        <input type="text" class="form-control" name="web" value="{{$user->web}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="address">Address</label>-->
                            <!--                        <input type="text" class="form-control" name="address" value="{{$user->address}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="country_id">Country</label>-->
                            <!--                        <input type="text" class="form-control" name="country" placeholder="Country" value="{{$user->country_id}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="age">Age</label>-->
                            <!--                        <input type="text" class="form-control" name="age" placeholder="Age" value="{{$user->age}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="current_company">Current Company</label>-->
                            <!--                        <input type="text" class="form-control" name="current_company" placeholder="Current Company" value="{{$user->current_company}}">-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6">{{-- col-md-6 --}}-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="Hobbies">Hobbies</label>-->
                            <!--                        <select name="hobbies[]" class="form-control" multiple>-->
                            <!--                            @foreach ($hobbies as $hobbie)-->
                            <!--                            <option value="{{$hobbie->id}}">{{$hobbie->name}}</option>-->
                            <!--                            @endforeach-->
                            <!--                        </select>-->
                            <!--                        {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                            <!--                    </div>-->
                            <!--                </div>{{-- //col-md-6 --}}-->
                            <!--                <div class="col-md-6 col-md-offset-6">-->
                            <!--                    <button type="submit" class="btn btn-primary">submit</button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
@include('web_layout.footer')

<script type="text/javascript">
    $(document).ready(function () {
        var last_valid_selection = null;
        $('#selectLanguages').change(function (event) {
            if ($(this).val().length > 5) {
                $(this).val(last_valid_selection);
                alert('You Can\'t Select more than 5 lanugages');
            } else {
                last_valid_selection = $(this).val();
            }
        });
    });
    /* select2 */

    /* end of select2 */

</script>
