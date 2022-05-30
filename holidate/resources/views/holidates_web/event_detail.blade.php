@include('web_layout.header')
<?php
    $eventdetail = DB::table('events')->where('id', $id)->first();
    $hosterdetail = DB::table('users')->where('id', $id)->first();
?>
<article class="events_section">
    <!-- Event informationsection start -->
    <section class="event_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h5>FRI, MAY 15, 4:00 PM</h5>
                    <h3>Rock Singing Concert</h3>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_user">
                    <div class="row">
                        <div class="col-lg-1 col-md-2 col-xs-3 col-sm-2 cirular_img">
                            <img src="{{ asset('profile_image/') }}/{{ $hosterdetail->profile_image}}"/>
                        </div>
                        <div class="col-lg-10 col-md-10 col-xs-9 col-sm-10">
                            <!-- <p>Hosted By</p> -->
                            <h4>{{ $hosterdetail->name }} {{ $hosterdetail->surname }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 event_img">
                    <img src="{{ asset('event_image/') }}/{{ $eventdetail->image}}"/>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 event_user1">
                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-xs-12 col-sm-8">
                            <h4>DETAILS</h4>
                            <p>THIS IS A PAID EVENT
                                <br>
                                Buy ticket: {{ $eventdetail->buy_link }}
                            </p>
                            <p>Online Booking Fee : {{ $eventdetail->online_booking_fee }}₹
                                 <br>
                                 On-Spot Entry Fee: {{ $eventdetail->offline_booking_fee ?? 'free'}}₹
                            </p>
                            <p>{{ $eventdetail->description }}</p>
                            <p>Buy tickets- {{ $eventdetail->buy_link }}</p>

                            <div class="row allattended_content_section">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <div class="row main_heading">
                                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                            <h4>Attendees</h4>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                                            <a href="attendees/attendees.html">See all</a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php $attendee = DB::table('event_attendees')->where('event_id', $eventdetail->id)->get(); ?>
                                        
                                        @foreach($attendee as $data)
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width400">
                                            <div class="row nomargin">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 allattended_content text-center">
                                                    <div class="row">
                                                        <?php $userdata = DB::table('users')->where('id', $data->user_id)->first(); ?>
                                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 event_user cirular_img">
                                                            <img src="{{ asset('profile_image/') }}/{{ $userdata->profile_image}}"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_user2">
                                                            <h5>{{ $userdata->name }}</h5>
                                                            <p><?php echo date("M j, g:i A", strtotime($data->datetime)); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-xs-12 col-sm-4">
                            <div class="row event_address nomargin">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                    <p><!-- Sunday, May 24, 2020 -->
                                       <?php echo date("D, M j, Y", strtotime($eventdetail->event_start_time)); ?>
                                        <br> <?php echo date("g:i A", strtotime($eventdetail->event_start_time)); ?> 
                                         to <?php echo date("g:i A", strtotime($eventdetail->event_end_time)); ?>   GMT+5:30</p>
                                    <p>Connaught Place </p>
                                    <p>Connaught Place · Delhi </p>
                                    <p>How to find us </p>
                                    <p>MEETUP: https://bit.ly/2PMM1P0 FACEBOOK: https://bit.ly/2wvEBIQ 
                                        INSTAGRAM: https://bit.ly/39jSpoq 
                                        LINKEDIN: https://bit.ly/38sxQVw 
                                        Email - gaashilifestyle@gmail.com</p>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 map_img">
                                    <img src="{{ asset('web_assets/images/map.png') }}" width="100%"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Event informationsection end -->
     <!-- SimilarEvents-section-start -->
     <section class="event_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row main_heading">
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                            <h4>Similar events near you</h4>
                            <p>See what’s happening soon where you are stayed</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                            <a href="#">See all</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                    <h5>FRI, MAY 15, 4:00 PM</h5>
                                    <h3>Rock Singing Concert</h3>
                                    <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                    <p class="location"><img src="{{asset('web_assets/images/place.png')}}"/><b>Location Name</b></p>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">
                                            <p><img src="{{asset('web_assets/images/user.png')}}"/> <b>10 people attending</b></p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">
                                            <button class="btn btn-block" ><a href="event1.html">Attend</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                    <h5>FRI, MAY 15, 4:00 PM</h5>
                                    <h3>Job interview</h3>
                                    <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                    <p class="location"><img src="{{asset('web_assets/images/place.png')}}"/><b>Location Name</b></p>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">
                                            <p><img src="{{asset('web_assets/images/user.png')}}"/> <b>10 people attending</b></p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">
                                            <button class="btn btn-block"><a href="event1.html">Attend</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                    <h5>FRI, MAY 15, 4:00 PM</h5>
                                    <h3>Photography competition</h3>
                                    <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                    <p class="location"><img src="{{asset('web_assets/images/place.png')}}"/><b>Location Name</b></p>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">
                                            <p><img src="{{asset('web_assets/images/user.png')}}"/> <b>10 people attending</b></p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">
                                            <button class="btn btn-block"><a href="event1.html">Attend</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SimilarEvents-section-end -->
</article>
@include('web_layout.footer')