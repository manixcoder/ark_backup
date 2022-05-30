@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{__('Posts')}}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank"
                class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade
                to Pro
            </a> --}}
            <ol class="breadcrumb">
                <li><a href="{{route('adminpanel.dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="active">{{__('Posts')}}</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{__('Posts')}}</h3>
                <p class="text-muted">{{__('All')}} {{__('Posts')}} {{__('available on')}} <code>Holidate.es</code></p>
                {{-- posts --}}
                @foreach ($posts as $post)
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div style="font-size: 20px; margin:10px 0; font-weight:500;">[{{$post->id}}]. {{ $post->heading ?? ''}}</div>
                            <p><i class="fa fa-comments" aria-hidden="true"></i> {{ $post->comment ?? ''}}</p>
                            <p><b>{{__('Category')}} : </b>{{__($post->category->category_name)}}</p>
                            <p>
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <b>{{__('Updated At')}}:</b> {{ $post->updated_at->diffForHumans() ?? ''}} - 
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <b>{{__('Created At')}}:</b> {{ $post->created_at->diffForHumans() ?? ''}}
                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">{{-- row --}}
                                <div class="col-md-2">
                                    @if($post->user->profile_image!='')
                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="{{ asset('profile_image/') }}/{{ $post->user->profile_image}}" />
                                    @else
                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="{{ asset('no-image.jpg')}}" />
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <div style="margin: 10px 0;"><b>User ID: </b>{{$post->user->id}} - <b>User: </b>{{$post->user->name}} {{$post->user->surname}}</div>
                                    <div style="margin: 10px 0;"><b>{{__('Email')}}: </b>{{$post->user->email}}</div>
                                </div>
                            </div>{{-- ./row --}}
                            <div style="margin: 10px 0;"><b>{{__('Phone')}}: </b>{{$post->user->phone}}</div>
                            <div style="margin: 10px 0;"><b>{{__('City')}}: </b>{{$post->user->city}} - <b>{{__('Country')}}: </b>{{$post->user->country->name}}</div>
                        </div>
                        <div class="col-md-12">
                            <div style="display: flex;">
                                <button data-toggle="modal" data-target="#editPost{{$post->id}}" class="btn btn-primary font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px; margin-right:5px;">{{__('Edit')}}</button>
                                <form action="{{ route('adminpanel.post.delete', $post->id) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px;">{{__('Delete')}}</button>
                                </form>
                            </div>
                            {{-- modal --}}
                            <div id="editPost{{$post->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4 style="font-weight: 600;">{{__('Edit')}}: {{$post->heading}}</h4>
                                            <form class="" action="{{route('adminpanel.post.update')}}" method="post">
                                                @csrf
                                                <input type="text" name="post_id" value="{{$post->id}}" style="display: none;">
                                                <div class="row">{{-- row --}}
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <label for="category">{{__('Choose')}} {{__('Category')}}</label>
                                                        <?php $category = DB::table('categories')->get(); ?>
                                                        <select class="form-control" name="category_id" required="">
                                                            @if ($post->category)
                                                                <option value="{{$post->category->id}}">{{$post->category->category_name}}</option>
                                                            @else
                                                                <option disabled>{{__('Choose')}} {{__('Category')}}</option>
                                                            @endif
                                                            @foreach($category as $data)
                                                            <option value="{{ $data->id }}"> {{ $data->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label>{{__('Enter Heading')}}</label>
                                                        <input type="text" name="heading" class="form-control" placeholder="{{__('Enter Heading')}}" required="" value="{{$post->heading}}">
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label>{{__('Enter Your Comment')}}</label>
                                                        <textarea class="form-control" rows="4" cols="300" name="comment" placeholder="{{__('Comment here')}}" required="">{{$post->comment}}</textarea>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                                                    </div>
                                                </div>{{-- ./row --}}
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            {{-- ./modal --}}
                        </div>
                    </div>
                    <div style="border:1px solid #dfdfdf; width:100%; margin:20px 0;"></div>
                @endforeach
                {{-- /.posts --}}
                <div>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection