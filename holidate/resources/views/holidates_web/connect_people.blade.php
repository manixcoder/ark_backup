@include('web_layout.header')

<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info">
        <div class="container">
            <div class="row" style="margin-bottom:40px;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center basic_info">
                                    <div class="profile_img">
                                        @if($user->profile_image!='')
                                            <img src="{{ asset('profile_image/') }}/{{ $user->profile_image}}" />
                                        @else
                                            <img src="{{ asset('no-image.jpg')}}" />
                                        @endif
                                    </div>
                                    <div class="username_section">
                                        <h3>{{ $user->name}} {{ $user->surname}}</h3>
                                        <p><i class="fa fa-envelope" aria-hidden="true"></i>{{ $user->email}}</p>
                                        <p><i class="fa fa-phone" aria-hidden="true"></i>{{ $user->phone ?? ' '}}</p>
                                    </div>
                                    <div class="network_section">
                                        <ul>
                                            <li><a target="_blank" href="https://www.facebook.com/" class="backgroundfacebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a target="_blank" href="https://www.linkedin.com/" class="backgroundtwitter"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li><a target="_blank" href="https://twitter.com/" class="backgroundlinkedin"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 allprofile_detail">
                                   
                                        <h3 class="float-left">{{__('You have to Pay before Connecting with')}} {{$user->name}}</h3>

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
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            {{ $user->name}} {{ $user->surname }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Email Address')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            {{ $user->email}}
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Phone')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{ $user->phone ?? ''}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('City')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{$user->city}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Country')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{$user->country->name}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Address')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{$user->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Hobbies')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @foreach ($user->hobbies as $hobbie)
                                                                {{__($hobbie->name)}},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Language')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @foreach ($user->languages as $language)
                                                                {{$language->name}},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Web')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{$user->web}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Current Company')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{$user->current_company}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Marital Status')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            @if ($user->marital_status == 'Select Your Status')
                                                                
                                                            @else
                                                                {{__($user->marital_status)}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">{{__('Vacation City')}}:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{$user->vacation_city}}</td>
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                @if ($user->posts->count() > 0)
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                        <h3>{{__('Post')}}:</h3>
                                        <div class="row">
                                            @foreach ($user->posts as $post)
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 width400">
                                                        <div class="row nomargin">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                                <h5>{{ $post->heading ?? ''}}</h5>
                                                                <p><i class="fa fa-comments" aria-hidden="true"></i> {{ $post->comment ?? ''}}</p>
                                                                <p><b>{{__('Category')}} : </b>{{__($post->category->category_name)}}</p>
                                                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> {{ $post->updated_at->diffForHumans() ?? ''}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if ($user->business)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('My Business')}}:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 width400">
                                            <div class="row nomargin">
                                                <div
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                    <h5>{{ $user->business->name ?? ''}}</h5>
                                                    <p><i class="fa fa-comments" aria-hidden="true"></i>
                                                        {{ $user->business->address ?? ''}}</p>
                                                    <p><b>{{__('Category')}} : </b>{{__($user->business->business_category->name)}}</p>
                                                    @if (!$user->business->Guests)
                                                    @else
                                                    <div><b>{{__('Guest List')}} : </b> <br>
                                                        @foreach ($user->business->guests as $guest)
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
                                                        {{ $user->business->updated_at->diffForHumans() ?? ''}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
@include('web_layout.footer')