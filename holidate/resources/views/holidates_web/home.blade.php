<!-- banner-start -->
@include('web_layout.header')
@include('holidates_web.inc.header_search')

<!-- people-section-start -->
@if($search_data ?? '' > 0)
<section class="people_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4>{{__('Search Result')}}</h4>
                        <p>{{__('Find people they share same interest as you.')}}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        <!-- <a href="people/allpeople.html">See all</a> -->
                    </div>
                </div>
                <div class="row">
                    @foreach($search_data as $data)
                    <?php $userdata = DB::table('users')->where('id', $data->user_id)->first();
                                   $hobbiesdata = DB::table('hobbies')->where('id', $userdata->hobbies_id)->first();
                             ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                        <div class="row nomargin">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                <div class="people_img">
                                    <img src="{{ asset('profile_image/') }}/{{ $userdata->profile_image}}" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                    <h4>{{ $userdata->name }} {{ $userdata->surname }}</h4>
                                    <h5>{{ $hobbi->hobbies_name }}</h5>
                                    <p>{{__('Delhi')}}</p>
                                    {{-- <button class="btn btn-block" onclick="myFunction();"><a class="people_conection" onclick="return confirm('First you have to pay for see details');" href="{{ URL::to('userdetail', $userdata->id) }}">Contact</a></button>
                                    --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- people-section-end -->
<!-- latest publics -->
<section class="people_section" style="z-index: 999; background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4>{{__('Latest Publications by Users')}}</h4>
                        <p>{{__('Find people who has posted recently.')}}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        <a href="{{ route('latest_publications') }}">{{__('See all')}}</a>
                    </div>
                </div>
                <div class="row">
                    @foreach($latest_users as $latest_post)
                    @if($latest_post->user->profile_image!='')
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                        <div class="row nomargin">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                <div class="people_img">
                                    <img src="{{ asset('profile_image/') }}/{{ $latest_post->user->profile_image}}" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                    <h4>{{ $latest_post->user->name }} {{ $latest_post->user->surname }}</h4>
                                    @if ($latest_post->user->hobbies->count() == 0)
                                    @else
                                    {{-- @foreach ($latest_post->user->hobbies as $hobbie)
                                    <h5>{{$hobbie->name}}</h5>
                                    @endforeach --}}
                                    <h5>{{__($latest_post->user->hobbies->first()->name)}}</h5>
                                    @endif
                                    <p>
                                        @if(!$latest_post->user->city)
                                        @else
                                            {{$latest_post->user->city}}
                                        @endif
                                    </p>
                                    <a href="{{ route('connect', $latest_post->user->id) }}" class="btn btn-block people_btn"
                                        onclick="return confirm('First you have to pay for see details');"
                                        class="people_conection">{{__('Connect')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //latest publics -->
<!-- people-section-start -->
<section class="people_section" style="z-index: 999; background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4>{{__('People near you')}}</h4>
                        <p>{{__('Find people they share same interest as you.')}}</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        <a href="{{ route('allpeople') }}">{{__('See all')}}</a>
                    </div>
                </div>
                <div class="row">
                    @foreach($users as $user)
                    @if($user->profile_image!='')
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                        <div class="row nomargin">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                <div class="people_img">
                                    <img src="{{ asset('profile_image/') }}/{{ $user->profile_image}}" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                    <h4>{{ $user->name }} {{ $user->surname }}</h4>
                                    @if ($user->hobbies->count() == 0)
                                    @else
                                    {{-- @foreach ($user->hobbies as $hobbie)
                                    <h5>{{$hobbie->name}}</h5>
                                    @endforeach --}}
                                    <h5>{{__($user->hobbies->first()->name)}}</h5>
                                    @endif
                                    <p>
                                        @if(!$user->city)
                                        @else
                                        {{$user->city}}
                                        @endif
                                    </p>
                                    <a href="{{ route('connect', $user->id) }}" class="btn btn-block people_btn"
                                        onclick="return confirm('First you have to pay for see details');"
                                        class="people_conection">{{__('Connect')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade connect_modal" id="connectwithpeople" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-title1" id="exampleModalLabel">{{__('Choose Your Option')}}</h5>
            </div>
            <div class="modal-body">
                <p>{{__('First you have to pay amount for see details.')}}</p>
            </div>
            <div class="modal-footer">
                <p id=""></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button type="submit" class="btn btn-primary"><a href="#" id="modelurl">{{__('Connect')}}</a></button>
            </div>
        </div>
    </div>
</div>
<!-- people-section-end -->
<section class="container" style="margin-top: 40px; margin-bottom: 40px;">
    <div class="embed-responsive embed-responsive-16by9">
        <video width="100%"  controls="">
            <source src="{{asset('images')}}/holidate.mp4" type="video/mp4">
        </video>
    </div>
</section>
<!-- Events-section-start -->
<!--<section class="event_section" style="z-index: 999; background:#fff;">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="row main_heading">-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">-->
<!--                        <h4>{{__('Events near you')}}</h4>-->
<!--                        <p>{{__('See what’s happening soon where you are stayed')}}</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <?php $events = DB::table('events')->get(); ?>-->
<!--                    @foreach($events as $data)-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">-->
<!--                        <div class="row nomargin">-->
<!--                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">-->
<!--                                <h5>{{ $data->event_start_time }}</h5>-->
<!--                                <h3>{{ $data->heading }}</h3>-->
<!--                                <p><?php echo substr($data->description, 0,45) ?> ...</p>-->
<!--                                <p class="location"><img-->
<!--                                        src="{{ asset('web_assets/images/place.png') }}" /><b>{{$data->location ?? 'Location name'}}</b>-->
<!--                                </p>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">-->
<!--                                        <p><img src="{{ asset('web_assets/images/user.png') }}" /> <b>{{__('10 people attending')}}</b></p>-->
<!--                                    </div>-->
<!--                                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">-->
<!--                                        <button class="btn btn-block"><a href="#">{{__('Attend')}}</a></button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    @endforeach-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Events-section-end -->
<!-- categories-section-start -->

<!--@if($categories->count() > 0)-->
<!--<section class="categories_section" style="padding: 20px 0 80px 0; z-index: 999; background:#fff;" id="categoriesHere">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="row main_heading">-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">-->
<!--                        <h4>{{__('Categories')}}</h4>-->
<!--                        <p>{{__('Browse groups by topics you’re interested in.')}}</p>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">-->
<!--                        <a href="{{ route('category.showall') }}">{{__('Show All')}}</a>-->
<!--                        @guest-->
<!--                        @else-->
<!--                        @if (Auth::User()->users_role == 1 )-->
<!--                        <a href="{{ route('category.create') }}" style="margin:0 10px; text-decoration:underline;">{{__('Add Category')}}</a>-->
<!--                        @endif-->
<!--                        @endguest-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    @foreach($categories as $data)-->
<!--                    @if($data->image!='')-->
<!--                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">-->
<!--                        <div class="row nomargin">-->
<!--                            @guest-->
<!--                            @else-->
<!--                            @if (Auth::User()->users_role == 1 )-->
<!--                            <a href="{{route('category.destroy',  $data->id)}}"-->
<!--                                style="position: absolute; right:20px; z-index:10; top:-10px;">-->
<!--                                <img src="{{asset('images/delete.png')}}" alt="">-->
<!--                            </a>-->
<!--                            @endif-->
<!--                            @endguest-->
<!--                            <a href="{{route('category.show', $data->id)}}">-->
<!--                                <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">-->
<!--                                    @if($data->image!='')-->
<!--                                    <img src="{{ asset('category_image/') }}/{{ $data->image}}" width="100%" />-->
<!--                                    @else-->
<!--                                    <img src="{{ asset('no-image.jpg')}}" width="100%" />-->
<!--                                    @endif-->
<!--                                </div>-->
<!--                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">-->
<!--                                    <p>{{__($data->category_name) }}</p>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    @endif-->
<!--                    @endforeach-->
<!--                </div>-->
<!--                <div class="row nomargin" style="float: right;">-->
<!--                    {{ $categories->links() }}-->
<!--                </div>-->
<!--                <div style="clear: both;"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--@endif-->
<!-- categories-section-end -->
<!-- holidate_work-section-start -->
<section class="holidatework_section" style="padding-top:40px; z-index: 999;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center holidate_heading">
                <h2>{{__('How Holidate Works')}}</h2>
            </div>
            <div
                class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 holidate_content">
                        <div class="row nomargin">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <h3>{{__('Discover people')}}</h3>
                                <p>{{__('See who’s hosting local events for all the things you love.')}}</p>
                                <a href="{{ URL::to('signup') }}">{{__('Join Holidate')}} <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 holidate_content">
                        <div class="row nomargin">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <h3>{{__('Join an event')}}</h3>
                                <p>{{__('See who’s hosting local events for all the things you love.')}}</p>
                                <a href="{{ URL::to('signup') }}">{{__('Get Started')}} <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- holidate_work-section-end -->
<!-- app-section-start -->
<section class="app_section" style="z-index: 999; background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 app_img">
                        <img src="{{ asset('web_assets/images/app_img.png') }}" width="100%" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 app_right_content width100">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3>{{__('Download the App')}}</h3>
                                <p>Lorem ipsum door sit amet</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul>
                                    <li><a target="_blank" href="https://www.apple.com/in/ios/app-store/"><img
                                                src="{{ asset('web_assets/images/app_store.png') }}" /></a></li>
                                    <li><a target="_blank" href="https://play.google.com/store?hl=en_IN"><img
                                                src="{{ asset('web_assets/images/google_play.png') }}" /></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="embed-responsive embed-responsive-16by9">-->
<!--    <video width="100%"  controls="">-->
<!--        <source src="{{asset('images')}}/holidate.mp4" type="video/mp4">-->
<!--      </video>-->
<!--</section>-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- app-section-end -->
@include('web_layout.footer')
