@include('web_layout.header')
{{-- <script src="{{asset('web_assets/js/jquery.mockjax-2.2.1.js')}}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{asset('web_assets/js/jquery.validate.js')}}"></script>
<script>
    $(document).ready(function() {
        var validator = $("#categoryForm").validate({
            rules: {
                category_name: {
                    required: true
                },
                image: {
                    required: true,
                    // remote: "emails.action"
                }
                // terms: "required"
            },
            messages: {
                category_name: {
                    required: "{{__('Please Provide a Name')}}"
                },
                image: {
                    required: "{{__('Please Provide a Image')}}",
                    // remote: jQuery.validator.format("{0} is already in use")
                }
                // terms: " "
            },
            success: function(label) {
                // set &nbsp; as text for IE
                label.html("&nbsp;").addClass("checked");
            },
            highlight: function(element, errorClass) {
                $(element).parent().next().find("." + errorClass).removeClass("checked");
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if (firstname && lastname && !this.value) {
                this.value = (firstname + "." + lastname).toLowerCase();
            }
        });
    });
    </script>
<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info user_basic_info1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3>{{__('Add Category')}}:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label" id="categoryForm" action="{{route('category.store')}}" method="post"  enctype="multipart/form-data">
                                            {{csrf_field()}}
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="category_name">{{__('Category Name')}}</label>
                                                        <input type="text" id="category_name" name="category_name" class="form-control" placeholder="{{__('Category Name')}}"/>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="image">{{__('Category Image')}}</label>
                                                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <!--<div class="col-lg-9 col-md-9 col-md-offset-1 col-sm-8 col-xs-12">-->
                        <!--    <div class=" nomargin">-->
                        <!--        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">-->
                        <!--            <h3>Add Category:</h3>-->
                        <!--            <form action="{{route('category.store')}}" method="post"  enctype="multipart/form-data">-->
                        <!--                @csrf-->
                        <!--                <div class="row">-->
                        <!--                    <div class="col-md-12">-->
                        <!--                        <div class="text-sm text-danger">-->
                        <!--                            @foreach ($errors->all() as $error)-->
                        <!--                                {!! $error !!} <br>-->
                        <!--                            @endforeach-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-md-12">{{-- col-md-6 --}}-->
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="name">Name</label>-->
                        <!--                            <input type="text" class="form-control" name="name" placeholder="Name">-->
                        <!--                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                        <!--                        </div>-->
                        <!--                    </div>{{-- //col-md-6 --}}-->
                        <!--                    <div class="col-md-12">{{-- col-md-6 --}}-->
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="image">image</label>-->
                        <!--                            <input type="file" class="form-control" name="image" placeholder="image">-->
                        <!--                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}-->
                        <!--                        </div>-->
                        <!--                    </div>{{-- //col-md-6 --}}-->
                        <!--                    <div class="col-md-6 col-md-offset-6">-->
                        <!--                        <button type="submit" class="btn btn-primary">submit</button>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </form>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
@include('web_layout.footer_without_js')
