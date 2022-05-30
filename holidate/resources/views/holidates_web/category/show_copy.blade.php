@include('web_layout.header')
@include('holidates_web.inc.header_search')
<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info">
        <div class="container">
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center basic_info" style="padding-top: 20px;">
                                    @if($category->image!='')
                                        <img src="{{ asset('category_image/') }}/{{ $category->image}}" width="100%" style="object-fit: cover; height: 170px; border-radius: 10px;}"/>
                                    @else
                                        <img src="{{ asset('no-image.jpg')}}" width="100%"/>
                                    @endif
                                    <h4 style="margin:10px 0;">{{$category->category_name}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class=" nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    {{-- <h3>Results</h3> --}}
                                    @forelse ($posts as $post)
                                        <div class="row" style="margin:20px 0;">
                                            <div class="col-md-4">
                                                <div class="people-content">
                                                    @if($post->user->profile_image!='')
                                                    <img src="{{ asset('profile_image/') }}/{{ $post->user->profile_image}}" style="width:100%; border-radius:4px;" />
                                                    @else
                                                    <img src="{{ asset('no-image.jpg')}}" style="width:100%; border-radius:4px;" />
                                                    @endif
                                                </div>
                                                <div class="people_info">
                                                    <!--<button class="btn btn-block" style="background: #b88703; color:#ffffff !important; margin:4px 0;" onclick="return alert('First you have to pay for see details');"><a style="color:#ffffff" class="people_conection">Connect</a></button>-->
                                                    <button class="btn btn-block" style="background: #b88703; color:#ffffff !important; margin:4px 0;" onclick="myFunction();"><a style="color:#ffffff" href="{{ route('connect', $post->user->id) }}" onclick="return confirm('First you have to pay for see details');" class="people_conection">Connect</a></button>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <p style="margin:10px 0;"><b>Name: </b>{{ $post->user->name ?? ''}}</p>
                                                <p style="margin:10px 0;"><b>Hobbies: </b>
                                                    @foreach ($post->user->hobbies as $hobbie)
                                                        {{$hobbie->name}}, 
                                                    @endforeach
                                                </p>
                                                <p style="margin:10px 0;"><b>Heading: </b>{{ $post->heading ?? ''}}</p>
                                                <p style="margin:10px 0;"><b>Comment: </b>{{ $post->comment ?? ''}}</p>
                                                <p style="margin:10px 0;"><b>Created at:</b> {{ $post->updated_at->diffForHumans() ?? ''}}</p>
                                                <p style="margin:10px 0;"><b>Created at:</b> {{ $post->updated_at->diffForHumans() ?? ''}}</p>
                                                
                                            </div>
                                        </div>
                                    @empty
                                        <p>No User Available interested in this category</p>
                                    @endforelse
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
