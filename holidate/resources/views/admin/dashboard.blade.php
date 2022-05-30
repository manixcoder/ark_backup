@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{__('Dashboard')}}</h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade to Pro</a> --}}
            <ol class="breadcrumb">
                <li><a href="{{route('adminpanel.dashboard')}}">{{__('Dashboard')}}</a></li>
                {{-- <li><a href="#">Dashboard</a></li> --}}
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- ============================================================== -->
    <!-- Different data widgets -->
    <!-- ============================================================== -->
    <!-- .row -->
    <div class="row">
        <a href="{{route('adminpanel.users')}}" class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">{{__('Total')}} {{__('Users')}}</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success">{{$users->count()}}</span></li>
                </ul>
            </div>
        </a>
        <a href="{{route('adminpanel.categories')}}" class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">{{__('Total')}} {{__('Categories')}}</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple">{{$categories->count()}}</span></li>
                </ul>
            </div>
        </a>
        <a href="{{route('adminpanel.posts')}}" class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">{{__('Total')}} {{__('Posts')}}</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$posts->count()}}</span></li>
                </ul>
            </div>
        </a>
    </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
    {{-- <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Products Yearly Sales</h3>
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-info"></i>Mac</h5> </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Windows</h5> </li>
                </ul>
                <div id="ct-visits" style="height: 405px;"></div>
            </div>
        </div>
    </div> --}}
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                {{-- <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                    <select class="form-control pull-right row b-none">
                        <option>March 2017</option>
                        <option>April 2017</option>
                        <option>May 2017</option>
                        <option>June 2017</option>
                        <option>July 2017</option>
                    </select>
                </div> --}}
                <h3 class="box-title">{{__('Recent Signup Users')}}</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('City')}}</th>
                                <th>{{__('Country')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestusers as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    @if($user->profile_image!='')
                                    <img style="width:30px; height:30px; object-fit:cover; border-radius:50%;" src="{{ asset('profile_image/') }}/{{ $user->profile_image}}" />
                                    @else
                                    <img style="width:30px; height:30px; object-fit:cover; border-radius:50%;" src="{{ asset('no-image.jpg')}}" />
                                    @endif
                                    <span style="margin-left:10px;">{{$user->name}} {{$user->surname}}</span>
                                </td>
                                <td>{{$user->email ?? 'Not Available'}}</td>
                                <td>{{$user->phone ?? 'Not Available'}}</td>
                                <td>{{$user->city ?? 'Not Available'}}</td>
                                <td>{{$user->country->name ?? 'Not Available'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- chat-listing & recent comments -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- .col -->
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{__('Recent Posts')}}</h3>
                <div class="comment-center p-t-10">
                    @foreach ($latestposts as $latestpost)                        
                    <div class="comment-body">
                        <div class="user-img">
                            @if($latestpost->user->profile_image!='')
                            {{-- <img src="{{ asset('admin/plugins/images/users/pawandeep.jpg')}}" alt="user" > --}}
                            <img style="width:50px; height:50px; object-fit:cover; border-radius:50%;" src="{{ asset('profile_image/') }}/{{ $latestpost->user->profile_image}}" />
                            @else
                            <img style="width:50px; height:50px; object-fit:cover; border-radius:50%;" src="{{ asset('no-image.jpg')}}" />
                            @endif
                        </div>
                        <div class="mail-contnet">
                            <h5>{{$latestpost->user->name}} {{$latestpost->user->surname}}</h5><span class="time"><b>{{__('Updated at')}}: </b>{{$latestpost->updated_at->diffForHumans()}}</span>
                            <p class="mail-desc"><b>{{__('Category')}}: </b>{{$latestpost->category->category_name}}</p>
                            <p class="mail-desc"><b>{{__('Heading')}}: </b> <b>{{$latestpost->heading}}</b></p>
                            <p class="mail-desc"><b>{{__('Comment')}}: </b>{{$latestpost->comment}}</p> 
                            {{-- <a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline m-r-5"><i class="ti-check text-success m-r-5"></i>Approve</a>
                            <a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a> --}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="panel">
                <div class="sk-chat-widgets">
                    <div class="panel panel-default">
                        <div class="panel-heading">CHAT LISTING</div>
                        <div class="panel-body">
                            <ul class="chatonline">
                                <li>
                                    <div class="call-chat">
                                        <button class="btn btn-success btn-circle btn-lg" type="button"><i class="fa fa-phone"></i></button>
                                        <button class="btn btn-info btn-circle btn-lg" type="button"><i class="fa fa-comments-o"></i></button>
                                    </div>
                                    <a><img src="{{ asset('admin/plugins/images/users/varun.jpg')}}" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /.col -->
    </div>
</div>
@endsection