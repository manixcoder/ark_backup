<!-- banner-start -->
@include('web_layout.header')
@include('holidates_web.inc.header_search')
        <style scoped>
            .colored-bg{background-color: #dfe4ea; border-top: 2px solid #949494;}
            .ul-cat{margin:20px 0;}
            .a-cat{margin: 6px 4px; font-size: 14px !important; background-color: #fff; padding: 4px 10px; color: #212121; border: 1px solid #C2A12A; border-radius: 4px; display: inline-block;}
            .a-cat:hover{background-color: #212121; color:#fff; border: 1px solid transparent;}
            .a-cat-act{background-color: #212121 !important; color:#fff; border: 1px solid transparent;}
            .a-cat-active{margin: 6px 4px; background-color: #212121; padding: 4px 10px; color: #fff; border: 1px solid transparent; border-radius: 4px; display: inline-block;}
            .font22{font-size: 22px;}
        </style>
    {{-- <div class="colored-bg">
        <div class="container" id="catii" >
            <div class="row" style="margin:30px 0;">        
                <div class="font22">Filter By Category: </div>
                <ul class="ul-cat">                    
                    @foreach ($categories as $category)
                        <a href="{{route('home.search.cat', $category->id)}}" class="a-cat 
                            @if($cat == '0') 
                            @elseif($cat->id == $category->id)
                            a-cat-act
                            @endif ">{{$category->category_name}}</a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div> --}}
        {{--  --}}
<div class="container">
    <div class="row" style="margin:40px 0 80px 0; min-height:60vh;">
        {{--  --}}
        @php Session::put('search', $search); @endphp
        <div class="h2">{{__('Results for')}} {{$search}}
            @if($cat == '0')
            @else
                {{__('in')}} {{$cat->category_name}} {{__('Category')}}
            @endif
        </div>
        @if ($users->count() == 0)
            <p style="margin: 10px 0;">{{__('Sorry!! No Results found for')}} {{$search}}</p>
        @else            
            <div style="margin: 20px 0;">{{__('Results are shown near 50 kms of you')}}!</div>
            @foreach ($users as $user)
                @if($user->score == 100)                
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding"><div class="people_img">
                                <img src="{{ asset('profile_image/') }}/{{ $user->profile_image}}"/>
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
                                <!--<button class="btn btn-block" onclick="return alert('First you have to pay for see details');"><a class="people_conection">Connect</a></button>-->
                                {{-- <button class="btn btn-block" onclick="myFunction();"><a href="{{ route('connect', $user->id) }}" onclick="return confirm('First you have to pay for see details');" class="people_conection">Connect</a></button> --}}
                                <a href="{{ route('connect', $user->id) }}" class="btn btn-block people_btn" onclick="return confirm('First you have to pay for see details');" class="people_conection">{{__('Connect')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
@include('web_layout.footer')
<script>
    function scroll(){
        var elmnt = document.getElementById("catii");
        elmnt.scrollIntoView();
    }
    scroll();
</script>