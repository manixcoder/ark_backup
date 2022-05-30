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
                                        <button type="button" class="text-center pic-edit" data-toggle="modal" data-target="#exampleModal">Edit</button>
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
                                            <li><a href="#" class="backgroundfacebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="backgroundtwitter"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="backgroundlinkedin"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    {{--  --}}
                                    <div class="" style="margin-bottom: 20px;">
                                        <a class="btn btn-primary " href="{{route('event.create')}}">Add New Event</a>
                                    </div>
                                    {{--  --}}
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class=" nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>Add a Event</h3>
                                    <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-sm text-danger">
                                                    @foreach ($errors->all() as $error)
                                                        {!! $error !!} <br>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-12">{{-- col-md-12 --}}
                                                <div class="form-group">
                                                    <label for="heading">Heading</label>
                                                    <input type="text" class="form-control" name="heading" placeholder="Heading">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-12 --}}
                                            <div class="col-md-12">{{-- col-md-12 --}}
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" class="form-control" rows="4"></textarea>
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-12 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="image">Image</label>
                                                    <input type="file" class="form-control" name="image">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="image">Location</label>
                                                    <input type="type" class="form-control" name="location">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="buy_link">buy_link</label>
                                                    <input type="text" class="form-control" name="buy_link" placeholder="Buy Link">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="online_booking_fee">Online Booking Fee</label>
                                                    <input type="text" class="form-control" name="online_booking_fee" placeholder="Online Booking Fee">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="event_start_time">Event Start Time</label>
                                                    <input type="datetime-local" class="form-control" name="event_start_time" placeholder="Event Start Time">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="event_end_time">Event end Time</label>
                                                    <input type="datetime-local" class="form-control" name="event_end_time" placeholder="Event end Time">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="longitude">Longitude</label>
                                                    <input type="text" class="form-control" name="longitude" placeholder="Longitude">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6">{{-- col-md-6 --}}
                                                <div class="form-group">
                                                    <label for="latitude">Latitude</label>
                                                    <input type="text" class="form-control" name="latitude" placeholder="Latitude">
                                                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                                </div>
                                            </div>{{-- //col-md-6 --}}
                                            <div class="col-md-6 col-md-offset-6">
                                                <button type="submit" class="btn btn-primary">submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
@include('web_layout.footer')
