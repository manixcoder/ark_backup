<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA&callback=initGeolocation" type="text/javascript"></script>
<script type="text/javascript">
    function initGeolocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Sorry, your browser does not support geolocation services.");
        }
    }
    function success(position) {
        var lon = position.coords.longitude;
        var lat = position.coords.latitude;
        var latlon = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + "," +
            position.coords.longitude + "&sensor=true+CA&key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA";
        $.get({
            url: latlon,
            success: function (data) {
                console.log(data);

                /* document.getElementById("addressBox").value = data.results[1].formatted_address;
                document.getElementById("longitudeBox").value = lon;
                document.getElementById("latitudeBox").value = lat; */

            }
        });
        //alert(latlon);
    }
    function fail() {
        // Could not obtain location
    }
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
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center basic_info">
                                    <div class="profile_img">
                                        <button type="button" class="text-center pic-edit" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        <?php echo $__env->make('holidates_web.inc.pic-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php if($userdata->profile_image!=''): ?>
                                        <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($userdata->profile_image); ?>" />
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('no-image.jpg')); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="username_section">
                                        <h3><?php echo e($userdata->name); ?> <?php echo e($userdata->surname); ?></h3>
                                        <p><i class="fa fa-envelope" aria-hidden="true"></i><?php echo e($userdata->email); ?></p>
                                        <p><i class="fa fa-phone" aria-hidden="true"></i><?php echo e($userdata->phone); ?></p>
                                    </div>
                                    <div class="network_section">
                                        <ul>
                                            <li><a href="#" class="backgroundfacebook"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="backgroundtwitter"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#" class="backgroundlinkedin"><i class="fa fa-twitter"
                                                        aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    
                                    <!-- <div class="new_event">
                                        <a class="btn btn-primary " href="<?php echo e(route('event.create')); ?>">Add New Event</a>
                                    </div>-->
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('Edit User')); ?>:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label"
                                                action="<?php echo e(route('user.profile.update')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="name"><?php echo e(__('Name')); ?></label>
                                                        <input type="text" class="form-control" name="name"
                                                            placeholder="Name" value="<?php echo e($user->name); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="surname"><?php echo e(__('Surname')); ?></label>
                                                        <input type="text" class="form-control" name="surname"
                                                            placeholder="Surame" value="<?php echo e($user->surname); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="emil"><?php echo e(__('Email')); ?></label>
                                                        <input type="email" class="form-control" disabled name="email"
                                                            placeholder="Email" value="<?php echo e($user->email); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="phone"><?php echo e(__('Phone')); ?></label>
                                                        <input type="tel" class="form-control" name="phone"
                                                            value="<?php echo e($user->phone); ?>" maxlength="10">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="Hobbies"><?php echo e(__('Hobbies')); ?></label>
                                                        <select name="hobbies[]" class="form-control" multiple style="height: 70px;">
                                                            <?php $__currentLoopData = $user->hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hob): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option selected value="<?php echo e($hob->id); ?>"><?php echo e(__($hob->name)); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hobbie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($hobbie->id); ?>"><?php echo e(__($hobbie->name)); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="languages"><?php echo e(__('Languages')); ?></label>
                                                        <select id="selectLanguages" name="languages[]"
                                                            class="form-control js-example-basic-multiple" multiple style="height: 70px;">
                                                            <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option selected value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($language->id); ?>"><?php echo e($language->name); ?>

                                                            </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="web"><?php echo e(__('Website')); ?></label>
                                                        <input type="text" class="form-control" name="web"
                                                            value="<?php echo e($user->web); ?>" value="<?php echo e($user->web); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Country')); ?></label>
                                                        <select name="country_id" class="form-control">
                                                            <option selected value="<?php echo e($user->country->id ?? ''); ?>"><?php echo e($user->country->name ?? 'Select Your Country'); ?></option>
                                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Professional Category')); ?></label>
                                                        <select name="professional_category_id" class="form-control">
                                                            <option value="<?php echo e($user->professional_category->id ?? ''); ?>"><?php echo e($user->professional_category->name ?? 'Select Your Professional Category'); ?></option>
                                                            <?php $__currentLoopData = $pro_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Marital Status')); ?></label>
                                                        <select name="marital_status" class="form-control">
                                                            <option selected
                                                                value="<?php echo e($user->marital_status ?? 'Select Your Status'); ?>">
                                                                <?php echo e($user->marital_status ?? 'Select Your Status'); ?>

                                                            </option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Single'): ?> hidden <?php endif; ?>"
                                                                value="Single">Single</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Married'): ?> hidden <?php endif; ?>"
                                                                value="Married">Married</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Widowed'): ?> hidden <?php endif; ?>"
                                                                value="Widowed">Widowed</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Separated'): ?> hidden <?php endif; ?>"
                                                                value="Separated">Separated</option>
                                                            <option
                                                                class="<?php if($user->marital_status == 'Divorced'): ?> hidden <?php endif; ?>"
                                                                value="Divorced">Divorced</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="vacation_city"><?php echo e(__('Vacation City')); ?></label>
                                                        <input type="text" class="form-control" name="vacation_city" value="<?php echo e($user->vacation_city); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="city"><?php echo e(__('City')); ?></label>
                                                        <input type="text" class="form-control" name="city" value="<?php echo e($user->city); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="country"><?php echo e(__('Age')); ?></label>
                                                        <input type="text" class="form-control" name="age" value="<?php echo e($user->age); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('Current Company')); ?></label>
                                                        <input type="text" class="form-control" name="current_company" value="<?php echo e($user->current_company); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('Address')); ?></label>
                                                        <input type="text" id="addressBox" class="form-control" name="address" value="<?php echo e($user->address); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('latitude')); ?></label>
                                                        <input type="text" id="latitudeBox" class="form-control" name="latitude" readonly value="<?php echo e($user->latitude); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="current_company"><?php echo e(__('longitude')); ?></label>
                                                        <input type="text" id="longitudeBox" class="form-control" name="longitude" readonly value="<?php echo e($user->longitude); ?>">
                                                    </div>                                                    
                                                </div>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                                <script>
                                                $(document).ready(function(){
                                                    $("#addressBox").keyup(function(){
                                                    add = $("#addressBox").val();
                                                        $.get("https://maps.googleapis.com/maps/api/geocode/json?address="+add+",+CA&key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA", function(data, status){
                                                        // console.log(data);
                                                        $("#latitudeBox").val(data.results[0].geometry.location.lat);
                                                        $("#longitudeBox").val(data.results[0].geometry.location.lng);
                                                        });
                                                    });
                                                });
                                                </script>
                                                <div class="row">                                                    
                                                    <div style="text-align: center; font-size:18px;">Social Media <?php echo e(__('Profile')); ?></div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="facebook"><i class="fa fa-facebook-square"></i>  Facebook</label>
                                                        <input type="text" class="form-control" name="facebook" value="<?php echo e($user->facebook); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="instagram"><i class="fa fa-instagram"></i>  instagram</label>
                                                        <input type="text" class="form-control" name="instagram" value="<?php echo e($user->instagram); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="twitter"><i class="fa fa-twitter-square"></i>  twitter</label>
                                                        <input type="text" class="form-control" name="twitter" value="<?php echo e($user->twitter); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="youtube"><i class="fa fa-youtube-square"></i>  youtube</label>
                                                        <input type="text" class="form-control" name="youtube" value="<?php echo e($user->youtube); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="linkedin"><i class="fa fa-linkedin-square"></i>  linkedin</label>
                                                        <input type="text" class="form-control" name="linkedin" value="<?php echo e($user->linkedin); ?>">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary" id="search"><?php echo e(__('Update')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Profile Pic</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="register_form register_form1 show_label"
                                                action="<?php echo e(route('user.profile-pic-update')); ?>" method="post"
                                                enctype="multipart/form-data">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <?php if($errors->has('profile_image')): ?>
                                                        <span
                                                            class="text-sm text-danger"><?php echo e($errors->first('profile_image')); ?></span>
                                                        <?php endif; ?>
                                                        <input type="file" class="form-control" id="profile_image"
                                                            name="profile_image">
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save </button>
                                                    </div>




                                                </div>
                                            </form>
                                        </div>

                                        <!--<form action="<?php echo e(route('user.profile-pic-update')); ?>" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?php if($errors->has('profile_image')): ?>
                            <span class="text-sm text-danger"><?php echo e($errors->first('profile_image')); ?></span>
                        <?php endif; ?>
                        <label for="email">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image" class="form-control" >
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>-->
                                    </div>
                                </div>
                            </div>




                            <!--<div class=" nomargin">-->
                            <!--    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">-->

                            <!--         <h3>Edit User</h3>-->

                            <!--        <form action="<?php echo e(route('user.profile.update')); ?>" method="post">-->
                            <!--            <?php echo csrf_field(); ?>-->
                            <!--            <div class="row">-->
                            <!--                <div class="col-md-12">-->
                            <!--                    <div class="text-sm text-danger">-->
                            <!--                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                            <!--                            <?php echo $error; ?> <br>-->
                            <!--                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="name">Name</label>-->
                            <!--                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo e($user->name); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="surname">Surname</label>-->
                            <!--                        <input type="text" class="form-control" name="surname" placeholder="Surame" value="<?php echo e($user->surname); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="phone">Phone</label>-->
                            <!--                        <input type="text" class="form-control" name="phone" value="<?php echo e($user->phone); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="web">Web</label>-->
                            <!--                        <input type="text" class="form-control" name="web" value="<?php echo e($user->web); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="address">Address</label>-->
                            <!--                        <input type="text" class="form-control" name="address" value="<?php echo e($user->address); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="country_id">Country</label>-->
                            <!--                        <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo e($user->country_id); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="age">Age</label>-->
                            <!--                        <input type="text" class="form-control" name="age" placeholder="Age" value="<?php echo e($user->age); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="current_company">Current Company</label>-->
                            <!--                        <input type="text" class="form-control" name="current_company" placeholder="Current Company" value="<?php echo e($user->current_company); ?>">-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6">-->
                            <!--                    <div class="form-group">-->
                            <!--                        <label for="Hobbies">Hobbies</label>-->
                            <!--                        <select name="hobbies[]" class="form-control" multiple>-->
                            <!--                            <?php $__currentLoopData = $hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hobbie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                            <!--                            <option value="<?php echo e($hobbie->id); ?>"><?php echo e($hobbie->name); ?></option>-->
                            <!--                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                            <!--                        </select>-->
                            <!--                        -->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <div class="col-md-6 col-md-offset-6">-->
                            <!--                    <button type="submit" class="btn btn-primary">submit</button>-->
                            <!--                </div>-->
                            <!--            </div>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
    /* select2 */

    /* end of select2 */

</script>
<?php /**PATH D:\xampp\htdocs\222holidate\resources\views/holidates_web/profile_edit.blade.php ENDPATH**/ ?>