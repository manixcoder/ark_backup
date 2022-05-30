@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{__('Report')}}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade
                to Pro
            </a> --}}
            <ol class="breadcrumb">
                <li><a href="{{route('adminpanel.dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="active">{{__('Report')}}</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="">
                {{-- <h3 class="box-title">Report</h3> --}}
                <div class="filter-parent" style="margin:20px 0 40px 0;">
                    <a href="{{route('adminpanel.filter.weekly')}}" id="filterUserWeekly" class="filter-box bg-primary waves-effect waves-light">{{__('Weekly')}}</a>
                    <a href="{{route('adminpanel.filter.monthly')}}" id="filterUserMonthly" class="filter-box bg-danger waves-effect waves-light">{{__('Monthly')}}</a>
                    <a href="{{route('adminpanel.filter.quarterly')}}" id="filterUserQuarterly" class="filter-box bg-success waves-effect waves-light">{{__('Quarterly')}}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <style>
        .filter-parent{
            margin: 10px 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            border-radius: 4px;
            overflow: hidden;
        }
        .filter-box{
            border:none;
            margin:0;
            width: 33.33%;
            padding: 4px 0;
            color:#fff;
            text-align: center;
            display: inline-block;
        }
        .box-text{
            font-size: 16px;
            font-weight: 400;
            color: #7e7e7e;
        }
    </style>
    <div class="row">{{-- row --}}
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-text">{{__('Total')}} {{__('Users')}} {{__('in last')}} {{__($txt)}}</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success" id="userCount">{{$users->count()}}</span></li>
                </ul>
            </div>
            <div class="white-box analytics-info">
                {{--  --}}
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}} {{$user->surname}}</td>
                                <td>{{$user->email ?? 'Not Available'}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{-- {{ $users->links() }} --}}
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-text">{{__('Total')}} {{__('Posts')}} {{__('in last')}} {{__($txt)}}</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info">{{$posts->count()}}</span></li>
                </ul>
            </div>
            <div class="white-box analytics-info">
                @foreach ($posts as $post)
                <div style="font-size: 20px; margin:10px 0; font-weight:500;">{{ $post->heading ?? ''}}</div>
                <p><i class="fa fa-comments" aria-hidden="true"></i> {{ $post->comment ?? ''}}</p>
                <p><b>{{__('Category')}} : </b>{{__($post->category->category_name)}}</p>
                <hr>
                @endforeach
            </div>
        </div>
    </div>{{-- ./row --}}
</div>
@endsection