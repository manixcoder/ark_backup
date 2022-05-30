@include('web_layout.header')
@include('holidates_web.inc.header_search')
<article class="allevents">
    <section class="event_section" style="min-height: 90vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{__('Latest Publications by Users')}}</h2>
                        </div>
                    </div>
                </div>
                @foreach ($latest_users as $post)
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                            <div class="people_img">
                                <img src="{{ asset('profile_image/') }}/{{ $post->user->profile_image}}" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                <h4>{{$post->user->name}} {{$post->user->surname}}</h4>
                                @if ($post->user->hobbies->count() == 0)
                                @else
                                {{-- @foreach ($post->user->hobbies as $hobbie)
                                <h5>{{$hobbie->name}}</h5>
                                @endforeach --}}
                                <h5>{{__($post->user->hobbies->first()->name)}}</h5>
                                @endif
                                <p>
                                    @if(!$post->user->city)
                                    @else
                                    {{$post->user->city}}
                                    @endif
                                </p>
                                <!--<button class="btn btn-block" onclick="return alert('First you have to pay for see details');"><a  class="people_conection">Connect</a></button>-->
                                {{-- <button class="btn btn-block" onclick="myFunction();"><a href="{{ route('connect', $post->user->id) }}" onclick="return confirm('First you have to pay for see details');" class="people_conection">Connect</a></button> --}}
                                <a href="{{ route('connect', $post->user->id) }}" class="btn btn-block people_btn" onclick="return confirm('First you have to pay for see details');" class="people_conection">{{__('Connect')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</article>
@include('web_layout.footer')
