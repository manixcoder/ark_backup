@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{__('Categories')}}</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            {{-- <a href="https://wrappixel.com/templates/ampleadmin/" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Upgrade
                to Pro
            </a> --}}
            <ol class="breadcrumb">
                <li><a href="{{route('adminpanel.dashboard')}}">{{__('Dashboard')}}</a></li>
                <li class="active">{{__('Categories')}}</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">{{__('Categories')}} 
                    <button data-toggle="modal" data-target="#addCategory" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">{{__('Create')}}</button>
                </h3>
                {{-- modal --}}
                <div id="addCategory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 style="font-weight: 600;">{{__('Create')}} {{__('Category')}}</h4>
                                <form class="" action="{{route('adminpanel.category.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">{{-- row --}}
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="category_name">{{__('Category')}} {{__('Name')}}</label>
                                            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="{{__('Category')}} {{__('Name')}}" />
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="image">{{__('Category')}} {{__('Image')}}</label>
                                            <input type="file" id="image" name="image" class="form-control" accept="image/*" required>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                        </div>
                                    </div>{{-- ./row --}}
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                {{-- ./modal --}}
                <p class="text-muted">{{__('All')}} {{__('Categories')}} {{__('available on')}} <code>Holidate.es</code></p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Created At')}}</th>
                                <th>{{__('Updated At')}}</th>
                                <th>{{__('Action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>
                                    @if($category->image!='')
                                    <img style="width:50px; height:30px; object-fit:cover;" src="{{ asset('category_image/') }}/{{ $category->image}}" />
                                    @else
                                    <img style="width:50px; height:30px; object-fit:cover;" src="{{ asset('no-image.jpg')}}" />
                                    @endif
                                </td>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->created_at->diffForHumans()}}</td>
                                <td>{{$category->updated_at->diffForHumans()}}</td>
                                <td>
                                    <div style="display: flex;">
                                        <a data-toggle="modal" data-target="#editCategory{{$category->id}}" class="btn btn-primary font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px; margin-right:5px;">{{__('Edit')}}</a>
                                        <form action="{{ route('adminpanel.category.destroy', $category->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px;">{{__('Delete')}}</button>
                                        </form>
                                    </div>
                                    {{-- modal --}}
                                    <div id="editCategory{{$category->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h4 style="font-weight: 600;">{{__('Edit')}}: {{$category->category_name}}</h4>
                                                    <form class="" action="{{route('adminpanel.category.update')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">{{-- row --}}
                                                            <input type="text" name="category_id" value="{{$category->id}}" style="display: none;">
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <label for="category_name">{{__('Category')}} {{__('Name')}}</label>
                                                                <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name" value="{{$category->category_name}}" />
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <label for="image">{{__('Category')}} {{__('Image')}}</label>
                                                                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                                <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                                            </div>
                                                        </div>{{-- ./row --}}
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    {{-- ./modal --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection