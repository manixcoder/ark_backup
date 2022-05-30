@include('web_layout.header')<!doctype html>
        <article class="allevents">
            <section class="event_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                    <form class="register_form" action="#" method="post">
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="search_people">Search People</label>
                                                <input type="search" id="search_people" name="search_people" class="form-control"
                                                    placeholder="Search People">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                    <div class="btn-group filter-button filter-button1 ">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"> <i class="fa fa-filter" aria-hidden="true"></i> Sort</button>
                                        <!-- <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"></button> -->
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Response Time</a></li>
                                            <li><a href="#">Location</a></li>
                                            <li><a href="#">Category</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $userdata  = DB::table('users')->get(); ?>
                        @if($userdata!='')
                        @foreach($userdata as $data)
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                    <div class="people_img">
                                        @if($data->profile_image!='')
                                        <img src="{{ asset('public/profile_image/') }}/{{ $data->profile_image}}"/>
                                        @else
                                            <img src="{{ asset('public/no-image.jpg')}}"/>
                                        @endif
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                        <h4>{{ $data->name }} {{ $data->surname }}</h4>
                                        <?php $hobbies  = DB::table('hobbies')->where('id', $data->hobbies_id)->first(); ?>
                                        <h5>{{ $hobbies->hobbies_name }}</h5>
                                        <p>Delhi</p>
                                        <button class="btn btn-block" onclick="myFunction();"><a class="people_conection" href="{{ URL::to('userdetail', $data->id) }}">Connect</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach                        
                        @else
                        <p>Data not found </p>                        
                        @endif
                    </div>
                </div>
            </section>
        </article>

@include('web_layout.footer')