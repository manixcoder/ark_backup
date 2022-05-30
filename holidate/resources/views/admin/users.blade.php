@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{__('Users')}}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank"
                class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade
                to Pro
            </a> --}}
            <ol class="breadcrumb">
                <li><a href="{{route('adminpanel.dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="active">{{__('Users')}}</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    {{-- <script>
        popup('cool', 's');
    </script> --}}
    <style>
        .xo_input{
            padding:2px 10px;
            margin:0 2px;
            border: 1px solid #e3e3e3;
            border-radius: 4px;
        }
        .xo_grp{
            position: relative;
        }
        .xo_grp_label{
            position: absolute;
            top: -14px;
            left: 10px;
            padding: 0 4px;
            background: #ffffff;
            /* display: block; */
            font-size: 12px;
        }
        .date__1{
        }
        .search_input{

        }
        .search_btn{
            background: #0441ab;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 2px 8px;
        }
    </style>
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-12">
                        <h3 class="box-title">{{__('Users')}}</h3>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12">
                        <form action="{{route('adminpanel.user.search')}}" method="GET" role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            @csrf
                            <span class="xo_grp">
                                <span class="xo_grp_label">{{__('from')}}</span>
                                <input type="date" name="from" id="" class="xo_input date__1" placeholder="from">
                            </span>
                            <span class="xo_grp">
                                <span class="xo_grp_label">{{__('to')}}</span>
                                <input type="date" name="to" id="" class="xo_input date__1" placeholder="to">
                            </span>
                            <span>
                                <input type="text" name="search" placeholder="{{__('Search')}}..." class="search_input xo_input"> 
                                <button type="submit" class="search_btn"><i class="fa fa-search"></i></button> 
                            </span>
                        </form>
                    </div>
                </div>
                <p class="text-muted">{{__('All')}} {{__('Users')}} {{__('available on')}} <code>Holidate.es</code></p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Role')}}</th>
                                <th>{{__('Created At')}}</th>
                                <th>{{__('Updated At')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
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
                                <td>@if ($user->users_role == 1) Admin @elseif($user->users_role == 2) User @endif</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>{{$user->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a data-toggle="modal" data-target="#editUser{{$user->id}}" class="btn btn-primary font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px; margin-right:5px;">{{__('Edit')}}</a>
                                        <form action="{{ route('adminpanel.user.delete', $user->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px;">{{__('Delete')}}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <div id="editUser{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4 style="font-weight: 600;">{{__('Edit')}} {{$user->name}}</h4>
                                            <div class="row" style="margin:20px 0; border-top: 1px solid #cfcfcf;border-bottom: 1px solid #cfcfcf; padding:10px 0;">
                                                <div class="col-md-12" style="margin: 0 0 10px 0;">
                                                    <b>{{__('Update')}} {{$user->name}} Profile Image</b>
                                                </div>
                                                <div class="col-md-3">
                                                    @if($user->profile_image!='')
                                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="{{ asset('profile_image/') }}/{{ $user->profile_image}}" />
                                                    @else
                                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="{{ asset('no-image.jpg')}}" />
                                                    @endif
                                                </div>
                                                <div class="col-md-9">
                                                    <form action="{{route('adminpanel.user.image.update')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="user_id" value="{{$user->id}}" style="display: none;">
                                                        <div class="row" style="padding:10px;">
                                                            <div class="col-md-6">
                                                                <input type="file" name="profile_image" id="" accept="image/*">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button type="submit" >{{__('Update')}}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <form class="" action="{{route('adminpanel.user.update')}}" method="post">
                                                @csrf
                                                <input type="text" name="user_id" value="{{$user->id}}" style="display: none;">
                                            <div class="row">{{-- row --}}
                                                <div class="col-md-12">{{-- col-md-6 --}}
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="name">{{__('Name')}}</label>
                                                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="surname">{{__('Surname')}}</label>
                                                        <input type="text" class="form-control" name="surname" placeholder="Surame" value="{{$user->surname}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="emil">{{__('Email')}}</label>
                                                        <input type="email" class="form-control" disabled name="email" placeholder="Email" value="{{$user->email}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="phone">{{__('Phone')}}</label>
                                                        <input type="tel" class="form-control" name="phone" value="{{$user->phone }}" maxlength="10">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="Hobbies">{{__('Hobbies')}}</label>
                                                        <select name="hobbies[]" class="form-control" multiple style="height: 70px;">
                                                            @foreach ($user->hobbies as $hob)
                                                            <option selected value="{{$hob->id}}">{{__($hob->name)}}
                                                            </option>
                                                            @endforeach
                                                            @foreach ($hobbies as $hobbie)
                                                            <option value="{{$hobbie->id}}">{{__($hobbie->name)}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="languages">{{__('Languages')}}</label>
                                                        <select id="selectLanguages" name="languages[]"
                                                            class="form-control js-example-basic-multiple" multiple style="height: 70px;">
                                                            @foreach ($user->languages as $item)
                                                                <option selected value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                            @foreach ($languages as $language)
                                                            <option value="{{$language->id}}">{{$language->name}}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="web">{{__('Website')}}</label>
                                                        <input type="text" class="form-control" name="web" value="{{$user->web }}" value="{{$user->web}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Country')}}</label>
                                                        <select name="country_id" class="form-control">
                                                            <option selected value="{{$user->country->id ?? ''}}">{{$user->country->name ?? 'Select Your Country'}}</option>
                                                            @foreach ($countries as $c)
                                                            <option value="{{$c->id}}">{{$c->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Professional Category')}}</label>
                                                        <select name="professional_category_id" class="form-control">
                                                            <option value="{{$user->professional_category->id ?? ''}}">{{$user->professional_category->name ?? 'Select Your Professional Category'}}</option>
                                                            @foreach ($pro_categories as $cx)
                                                            <option value="{{$cx->id}}">{{$cx->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Marital Status')}}</label>
                                                        <select name="marital_status" class="form-control">
                                                            <option selected
                                                                value="{{$user->marital_status ?? 'Select Your Status'}}">
                                                                {{$user->marital_status ?? 'Select Your Status'}}
                                                            </option>
                                                            <option
                                                                class="@if($user->marital_status == 'Single') hidden @endif"
                                                                value="Single">Single</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Married') hidden @endif"
                                                                value="Married">Married</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Widowed') hidden @endif"
                                                                value="Widowed">Widowed</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Separated') hidden @endif"
                                                                value="Separated">Separated</option>
                                                            <option
                                                                class="@if($user->marital_status == 'Divorced') hidden @endif"
                                                                value="Divorced">Divorced</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="vacation_city">{{__('Vacation City')}}</label>
                                                        <input type="text" class="form-control" name="vacation_city" value="{{$user->vacation_city }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="city">{{__('City')}}</label>
                                                        <input type="text" class="form-control" name="city" value="{{$user->city }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country">{{__('Age')}}</label>
                                                        <input type="text" class="form-control" name="age" value="{{$user->age }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('Current Company')}}</label>
                                                        <input type="text" class="form-control" name="current_company" value="{{$user->current_company }}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('Address')}}</label>
                                                        <input type="text" id="addressBox" class="form-control" name="address" value="{{$user->address}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('latitude')}}</label>
                                                        <input type="text" id="latitudeBox" class="form-control" name="latitude" readonly value="{{$user->latitude}}">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company">{{__('longitude')}}</label>
                                                        <input type="text" id="longitudeBox" class="form-control" name="longitude" readonly value="{{$user->longitude}}">
                                                    </div>   
                                                </div>{{-- /.col-md-6 --}}
                                                <div class="col-md-6">{{-- col-md-6 --}}
                                                    
                                                </div>{{-- /.col-md-6 --}}
                                            </div>{{-- /.row --}}
                                            <div class="row">{{-- row --}}
                                                <div style="text-align: center; font-size:18px; padding: 0 10px;">Social Media {{__('Profile')}}</div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="facebook"><i class="fa fa-facebook-square"></i>  Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" value="{{$user->facebook }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="instagram"><i class="fa fa-instagram"></i>  instagram</label>
                                                        <input type="text" class="form-control" name="instagram" value="{{$user->instagram }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="twitter"><i class="fa fa-twitter-square"></i>  twitter</label>
                                                        <input type="text" class="form-control" name="twitter" value="{{$user->twitter }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="youtube"><i class="fa fa-youtube-square"></i>  youtube</label>
                                                        <input type="text" class="form-control" name="youtube" value="{{$user->youtube }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div style="margin: 10px 10px;">
                                                        <label for="linkedin"><i class="fa fa-linkedin-square"></i>  linkedin</label>
                                                        <input type="text" class="form-control" name="linkedin" value="{{$user->linkedin }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                    <button type="submit" class="btn btn-primary" id="search">{{__('Update')}}</button>
                                                </div>
                                            </div>{{-- ../ row --}}
                                            </form>
                                            {{--  --}}
                                            <div class="row" style="padding-bottom:20px;">
                                                <div class="col-md-12">
                                                    <form action="{{route('adminpanel.user.updatepassword')}}" method="post">
                                                        @csrf
                                                        <input type="text" name="user_id" value="{{$user->id}}" style="display: none;">
                                                        <div style="margin:20px 0; text-align:center; font-size:18px; ">Update Password</div>
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <input type="password" id="newpassword" class="form-control" name="newpassword" placeholder="********" style="position: relative;">
                                                                <p class="eye_icon" onclick="togglePassword()"><i id="passwordEye" class="fa fa-eye" aria-hidden="true" style="color: #b1b1b1; position: absolute; top:14px; right:30px;"></i></p>
                                                                <script>
                                                                    function togglePassword() {
                                                                        var passwordInput = document.getElementById('newpassword');
                                                                        var eye = document.getElementById('passwordEye');
                                                                        if (passwordInput.type === 'password') {
                                                                            passwordInput.type = 'text';
                                                                            eye.classList.remove('fa-eye');
                                                                            eye.classList.add('fa-eye-slash');
                                                                        } else {
                                                                            passwordInput.type = 'password';
                                                                            eye.classList.remove('fa-eye-slash');
                                                                            eye.classList.add('fa-eye');
                                                                        }
                                                                    }
                                                                </script>
                                                            </div>
                                                            <div class="col-md-3">    
                                                                <button type="submit" class="btn btn-primary" id="search">{{__('Update')}}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            {{--  --}}
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var last_valid_selection = null;
        $('#selectLanguages').change(function (event) {
            if ($(this).val().length > 5) {
                $(this).val(last_valid_selection);
                alert('You Can\'t Select more than 5 lanugages');
            } else {
                last_valid_selection = $(this).val();
            }
        });
    });
</script>

@endsection