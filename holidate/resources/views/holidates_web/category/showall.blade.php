<!-- banner-start -->
@include('web_layout.header')
@include('holidates_web.inc.header_search')
<!-- categories-section-start -->
<?php $category = DB::table('categories')->orderBy('id', 'desc')->get(); ?>
@if($category!='')
<section class="categories_section" style="margin: 20px 0 80px 0;" id="categoriesHere">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4>{{__('All Categories')}} ({{$category->count()}})</h4>
                        <p>{{__('Browse groups by topics you’re interested in')}}.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        {{-- <a href="{{ route('category.showall') }}">Show All</a> --}}
                    @guest
                    @else
                    @if (Auth::User()->users_role == 1 )
                        <a href="{{ route('category.create') }}">{{__('Add Category')}}</a>
                        @endif
                        @endguest
                    </div>
                </div>
                <div class="row">
                    @foreach($category as $data)
                    @if($data->image!='')
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                        <div class="row nomargin">
                            @guest
                            @else
                            @if (Auth::User()->users_role == 1 )
                            <a href="{{route('category.destroy',  $data->id)}}"
                                style="position: absolute; right:20px; z-index:10; top:-10px;">
                                <img src="{{asset('images/delete.png')}}" alt="">
                            </a>
                            @endif
                            @endguest
                            <a href="{{route('category.show', $data->id)}}">
                                <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    @if($data->image!='')
                                    <img src="{{ asset('category_image/') }}/{{ $data->image}}" width="100%" />
                                    @else
                                    <img src="{{ asset('no-image.jpg')}}" width="100%" />
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    <p>{{ __($data->category_name) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- categories-section-end -->

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- app-section-end -->
@include('web_layout.footer')
