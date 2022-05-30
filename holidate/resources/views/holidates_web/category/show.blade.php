@include('web_layout.header')
@include('holidates_web.inc.header_search')
<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="allevents" style="min-height:70vh;">
    <section class="event_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>{{__('Category')}}: {{__($category->category_name)}}</h2>
                        </div>
                    </div>
                </div>
                @if ($users->count() == 0)
                    <div style="margin: 60px 16px; font-size:18px; color:rgb(255, 0, 0);">
                        {{__('no users available')}}!
                    </div>
                @else
                @foreach ($users as $user)
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                            <div class="people_img">
                                <img src="{{ asset('profile_image/') }}/{{ $user->profile_image}}" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                <h4>{{$user->name}} {{$user->surname}}</h4>
                                <h5>{{__('Photographer')}}</h5>
                                <p>{{__('Delhi')}}</p>
                                <!--<button class="btn btn-block" onclick="return alert('First you have to pay for see details');"><a  class="people_conection">Connect</a></button>-->
                                {{-- <button class="btn btn-block" onclick="myFunction();"><a href="{{ route('connect', $user->id) }}" onclick="return confirm('First you have to pay for see details');" class="people_conection">Connect</a></button> --}}
                                <a href="{{ route('connect', $user->id) }}" class="btn btn-block people_btn" onclick="return confirm('First you have to pay for see details');" class="people_conection">{{__('Connect')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </section>
</article>
@include('web_layout.footer')
