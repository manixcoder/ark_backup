@include('web_layout.header')
<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center basic_info">
                                    <div class="profile_img">
                                        <button type="button" class="text-center pic-edit" data-toggle="modal"
                                            data-target="#exampleModal"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></button>
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
                                            <li><a target="_blank" href="https://www.facebook.com/" class="backgroundfacebook"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a target="_blank" href="https://www.linkedin.com/" class="backgroundtwitter"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a target="_blank" href="https://twitter.com/" class="backgroundlinkedin"><i class="fa fa-twitter"
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
                            <div class=" nomargin">
                                {{-- <h1>UserScore: {{$userdata->score}}</h1> --}}
                                <style scoped>
                                    .dat-bg{background: #b40000}
                                </style>
                                <div class="progress">
                                    <div class="progress-bar  @if($userdata->score < '100') dat-bg @endif" role="progressbar" style="width: {{$userdata->score}}%;" aria-valuenow="{{$userdata->score}}" aria-valuemin="0" aria-valuemax="100">Your {{__('Profile Score')}} {{$userdata->score}}%</div>
                                  </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <ul>
                                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <h5>{{__('Location')}}</h5>
                                            <a href="#">{{$meuser->address}}</a>
                                        </li>
                                        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <h5>{{__('Holidate member since')}}:</h5>
                                            <a
                                                href="#"><?php echo date("M j, Y", strtotime($userdata->created_at)); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('Listed Events')}}:</h3>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 width100">
                                            <div class="row nomargin">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                                    <h5>FRI, MAY 15, 4:00 PM</h5>
                                                    <h3>Rock Singing Concert</h3>
                                                    <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                                    <p class="location"><img
                                                            src="{{ asset('web_assets/images/place.png') }}" /><b>Location
                                                            Name</b></p>
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_count">
                                                            <p><img src="{{ asset('web_assets/images/user.png') }}" />
                                                                <b>10 people attending</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('Update Business')}}:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label" id="loginForm"
                                                method="POST" action="{{ Route('user.business.update') }}">
                                                {{csrf_field()}}
                                                <div class="row">
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <label for="category">{{__('Choose')}} {{__('Category')}}</label>
                                                        <?php $b_category = DB::table('business_categories')->get(); ?>
                                                        <select class="form-control" name="category_id" required="">
                                                            <option disabled >{{__('Choose')}} {{__('Category')}}</option>
                                                            @foreach($b_category as $b)
                                                            <option value="{{ $b->id }}">
                                                                {{ __($b->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label>{{__('Enter Business Name')}}</label>
                                                        <input type="text" name="name" class="form-control" placeholder="{{__('Enter Heading')}}" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                        <label>{{__('Enter Address')}}</label>
                                                        <input type="text" id="addressBox" name="address" class="form-control" placeholder="{{__('Enter Address')}}" required="">
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                        <label>Latitude</label>
                                                        <input type="text" disabled id="latitudeBox" name="lat" class="form-control" placeholder="Latitude" required="">
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                        <label>Longitude</label>
                                                        <input type="text" disabled id="longitudeBox" name="lng" class="form-control" placeholder="Longitude" required="">
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
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label class="">{{__('Enter Your Guests Emails')}}</label>
                                                        <div>
                                                            <textarea id="guest_list" class="form-control" style="width:100% !important;" rows="4" cols="300" name="guest_list" placeholder="{{__('Enter Guest Emails')}} [{{__('separated by commas')}}] " data-role="tagsinput" ></textarea>
                                                        </div>
                                                        <input type="hidden" name="user_id" value="{{ $userdata->id}}">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary">{{__('public')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    div.tagsinput { border:1px solid #CCC; background: #FFF; padding:5px; width:300px; height:100px; overflow-y: auto;}
                                    div.tagsinput span.tag { border: 1px solid #a5d24a; -moz-border-radius:2px; -webkit-border-radius:2px; display: block; float: left; padding: 5px; text-decoration:none; background: #cde69c; color: #638421; margin-right: 5px; margin-bottom:5px;font-family: helvetica;  font-size:13px;}
                                    div.tagsinput span.tag a { font-weight: bold; color: #82ad2b; text-decoration:none; font-size: 11px;  } 
                                    div.tagsinput input { width:80px; margin:0px; font-family: helvetica; font-size: 13px; border:1px solid transparent; padding:5px; background: transparent; color: #000; outline:0px;  margin-right:5px; margin-bottom:5px; }
                                    div.tagsinput div { display:block; float: left; } 
                                    .tags_clear { clear: both; width: 100%; height: 0px; }
                                    .not_valid {background: #FBD8DB !important; color: #90111A !important;}
                                </style>
                                @if (Auth::User()->business)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('My Business')}}:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 width400">
                                            <div class="row nomargin">
                                                <div
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                    <h5>{{ Auth::User()->business->name ?? ''}}</h5>
                                                    <p><i class="fa fa-globe" aria-hidden="true"></i>
                                                        {{ Auth::User()->business->address ?? ''}}</p>
                                                    <p><b>{{__('Category')}} : </b>{{ __(Auth::User()->business->business_category->name)}}</p>
                                                    @if (!Auth::User()->business->Guests)
                                                    @else
                                                    <div><b>{{__('Guest List')}} : </b> <br>
                                                        @foreach (Auth::User()->business->guests as $guest)
                                                            <div class="col-md-2 col-sm-6 col-xs-6">
                                                                <div style="margin:10px 0; ">
                                                                    @if($guest->profile_image!='')
                                                                    <img class="img-fluid" style="height: 100px; width:100px; border-radius:50%; object-fit:cover;" src="{{ asset('profile_image/') }}/{{ $guest->profile_image}}" />
                                                                    @else
                                                                    <img class="img-fluid" style="height: 100px; width:100px; border-radius:50%; object-fit:cover;" src="{{ asset('no-image.jpg')}}" />
                                                                    @endif
                                                                    <div class="text-center" style="margin-top:10px;">{{$guest->name}}</div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                        <div class="col-md-12" style="margin: 20px 0; width:!00%;">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            {{ Auth::User()->business->updated_at->diffForHumans() ?? ''}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                @endif
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('Update Post')}}:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label" id="loginForm"
                                                method="POST" action="{{ Route('post.update') }}">
                                                {{csrf_field()}}
                                                <div class="row">
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <label for="category">{{__('Choose')}} {{__('Category')}}</label>
                                                        <?php $category = DB::table('categories')->get(); ?>
                                                        <select class="form-control" name="category_id" required="">
                                                            <option disabled >{{__('Choose')}} {{__('Category')}}</option>
                                                            @foreach($category as $data)
                                                            <option value="{{ $data->id }}">
                                                                {{ $data->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label>{{__('Enter Heading')}}</label>
                                                        <input type="text" name="heading" class="form-control" placeholder="{{__('Enter Heading')}}" required="">
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label>{{__('Enter Your Comment')}}</label>
                                                        <textarea class="form-control" rows="4" cols="300" name="comment" placeholder="{{__('Comment here')}}" required=""></textarea>
                                                        <input type="hidden" name="user_id" value="{{ $userdata->id}}">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary">{{__('public')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @if (Auth::User()->posts->count() > 0)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('My Post')}}:</h3>
                                    <div class="row">
                                        @foreach ($posts as $post)
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 width400">
                                            <div class="row nomargin">
                                                <div
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                    <h5>{{ $post->heading ?? ''}}</h5>
                                                    <p><i class="fa fa-comments" aria-hidden="true"></i>
                                                        {{ $post->comment ?? ''}}</p>
                                                    <p><b>{{__('Category')}} : </b>{{__($post->category->category_name)}}</p>
                                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        {{ $post->updated_at->diffForHumans() ?? ''}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<article class="editprofile_detail">
    <section class="editprofile_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 allprofile_options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#general">{{__('General')}}</a></li>
                                {{-- <li><a data-toggle="tab" href="#socialmedia">Social Media</a></li> --}}
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="general">
                                    <div class="allprofile_detail">
                                        <h3 class="float-left">{{__('General')}} <small><a href="{{route('user.profile.edit')}}"
                                                    class="">{{__('edit')}}</a></small></h3>
                                        <div class="listofprofile table-responsive">
                                            <table class="table">
                                                <!-- <thead>
                                                          <tr>
                                                            <th scope="col">Name:</th>
                                                            <th scope="col">First</th>
                                                          </tr>
                                                        </thead> -->
                                                <tbody>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Name')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{ $userdata->name}} {{ $userdata->surname }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Email Address')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{ $userdata->email}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Phone')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->phone)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->phone}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Password')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">********</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Location')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->address)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->address}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Hobbies')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @if($meuser->hobbies->count() == 0)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                @foreach ($meuser->hobbies as $hobbie)
                                                                    {{__($hobbie->name)}},
                                                                @endforeach
                                                            @endif                                                            
                                                        </td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Hobbies:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->hobbies)
                                                                <span class="text-danger text-bold">Please Fill this Data</span>
                                                            @else
                                                                @foreach ($meuser->hobbies as $hobbie)
                                                                    {{$hobbie->name}},
                                                                @endforeach
                                                            @endempty                                                            
                                                        </td>
                                                    </tr> --}}
                                                    {{-- <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Social Network Profile:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">Delhi, India</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Web')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->web)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->web}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Country')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->country->name)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->country->name}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Address')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->address)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->address}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Languages')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @if($meuser->languages->count() == 0)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                @foreach ($meuser->languages as $language)
                                                                    {{$language->name}},
                                                                @endforeach
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Age')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->age)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->age}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Professional Category')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->professional_category->name)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->professional_category->name}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Current Company')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->current_company)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->current_company}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Vacations city')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->vacation_city)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->vacation_city}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('City')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->city)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->city}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Hosted at')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->hosted_at)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->hosted_at}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('From to')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->country)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->country->name}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight:600;">Social Media {{__('Profile')}}</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Facebook:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->facebook)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->facebook}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Instagram:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->instagram)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->instagram}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Twitter:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->twitter)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->twitter}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Youtube:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->youtube)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->youtube}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Linkedin:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @empty($meuser->linkedin)
                                                                <span class="text-danger text-bold">{{__('Please Fill this Data')}}</span>
                                                            @else
                                                                {{$meuser->linkedin}}
                                                            @endempty
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in active" id="passwordChange">
                                    <div class="allprofile_detail">
                                        <h3 class="">{{__('Update')}} {{__('Password')}}<small></h3>
                                        <div class="" style="margin: 20px 0">
                                            <form class="register_form register_form1 show_label" id="loginForm" method="POST" action="{{ Route('user.profile.password.update') }}"="novalidate">
                                                {{csrf_field()}}
                                                @foreach ($errors->all() as $error)
                                                    <div class="text-danger" style="margin: 10px 0;"> {!! $error !!}</div>
                                                @endforeach
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                @if (session('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label>{{__('Enter Your Password')}}</label>
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="{{__('Enter Your Password')}}" style="position: relative">
                                                        <p class="eye_icon" onclick="togglePassword()"><i id="currentPassword" class="fa fa-eye" aria-hidden="true" style="color: #d3b406; position: absolute; top:3px; right:5px;"></i></p>
                                                        <script>
                                                            function togglePassword() {
                                                                var passwordInput = document.getElementById('password');
                                                                var eye = document.getElementById('currentPassword');
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
                                                        <label>{{__('Enter New Password')}}</label>
                                                        <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="{{__('Enter New Password')}}" style="position: relative">
                                                        <p class="eye_icon" onclick="toggleNewPassword()"><i id="newPassword" class="fa fa-eye" aria-hidden="true" style="color: #d3b406; position: absolute; top:3px; right:5px;"></i></p>
                                                        <script>
                                                            function toggleNewPassword() {
                                                                var passwordInput = document.getElementById('newpassword');
                                                                var eye = document.getElementById('newPassword');
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
                                                        <label>{{__('Confirm New Password')}}</label>
                                                        <input type="password" name="confirmation_newpassword" id="confirm_newpassword" class="form-control" placeholder="{{__('Confirm New Password')}}" style="position: relative">
                                                        <p class="eye_icon" onclick="toggleConfirmNewPassword()"><i id="confirmNewPassword" class="fa fa-eye" aria-hidden="true" style="color: #d3b406; position: absolute; top:3px; right:5px;"></i></p>
                                                        <script>
                                                            function toggleConfirmNewPassword() {
                                                                var passwordInput = document.getElementById('confirm_newpassword');
                                                                var eye = document.getElementById('confirmNewPassword');
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
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- set bio -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="float: left" id="exampleModalLabel">{{__('Edit Profile Pic')}}</h5>
                <button type="button" class="close" style="float: right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div style="clear: both;"></div>
            </div>
            <div class="modal-body">
                <form class="register_form register_form1 show_label" action="{{route('user.profile-pic-update')}}"
                    method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @if ($errors->has('profile_image'))
                            <span class="text-sm text-danger">{{ $errors->first('profile_image') }}</span>
                            @endif
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                            <button type="submit" class="btn btn-primary">{{__('Save')}} </button>
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
@include('web_layout.footer')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>

<script src="{{asset('js/')}}/jquery.tagsinput.js"></script>
<script type="text/javascript">

    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }
    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input,tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {

      $('#guest_list').tagsInput({width:'auto'});


// Uncomment this line to see the callback functions in action
//			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

// Uncomment this line to see an input with no interface for adding new tags.
//			$('input.tags').tagsInput({interactive:false});
    });

  </script>