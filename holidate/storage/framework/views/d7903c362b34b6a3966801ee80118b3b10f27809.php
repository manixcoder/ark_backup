<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center basic_info">
                                    <div class="profile_img">
                                        <button type="button" class="text-center pic-edit" data-toggle="modal"
                                            data-target="#exampleModal"><i class="fa fa-pencil"
                                                aria-hidden="true"></i></button>
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
                                            <li><a target="_blank" href="https://www.facebook.com/" class="backgroundfacebook"><i class="fa fa-facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a target="_blank" href="https://www.linkedin.com/" class="backgroundtwitter"><i class="fa fa-linkedin"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a target="_blank" href="https://twitter.com/" class="backgroundlinkedin"><i class="fa fa-twitter"
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
                            <div class=" nomargin">
                                
                                <style scoped>
                                    .dat-bg{background: #b40000}
                                </style>
                                <div class="progress">
                                    <div class="progress-bar  <?php if($userdata->score < '100'): ?> dat-bg <?php endif; ?>" role="progressbar" style="width: <?php echo e($userdata->score); ?>%;" aria-valuenow="<?php echo e($userdata->score); ?>" aria-valuemin="0" aria-valuemax="100">Your <?php echo e(__('Profile Score')); ?> <?php echo e($userdata->score); ?>%</div>
                                  </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <ul>
                                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                            <h5><?php echo e(__('Location')); ?></h5>
                                            <a href="#"><?php echo e($meuser->address); ?></a>
                                        </li>
                                        <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <h5><?php echo e(__('Holidate member since')); ?>:</h5>
                                            <a
                                                href="#"><?php echo date("M j, Y", strtotime($userdata->created_at)); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('Listed Events')); ?>:</h3>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 width100">
                                            <div class="row nomargin">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                                    <h5>FRI, MAY 15, 4:00 PM</h5>
                                                    <h3>Rock Singing Concert</h3>
                                                    <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                                    <p class="location"><img
                                                            src="<?php echo e(asset('web_assets/images/place.png')); ?>" /><b>Location
                                                            Name</b></p>
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_count">
                                                            <p><img src="<?php echo e(asset('web_assets/images/user.png')); ?>" />
                                                                <b>10 people attending</b></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('Update Business')); ?>:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label" id="loginForm"
                                                method="POST" action="<?php echo e(Route('user.business.update')); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="row">
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <label for="category"><?php echo e(__('Choose')); ?> <?php echo e(__('Category')); ?></label>
                                                        <?php $b_category = DB::table('business_categories')->get(); ?>
                                                        <select class="form-control" name="category_id" required="">
                                                            <option disabled ><?php echo e(__('Choose')); ?> <?php echo e(__('Category')); ?></option>
                                                            <?php $__currentLoopData = $b_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($b->id); ?>">
                                                                <?php echo e(__($b->name)); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Enter Business Name')); ?></label>
                                                        <input type="text" name="name" class="form-control" placeholder="<?php echo e(__('Enter Heading')); ?>" required="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                        <label><?php echo e(__('Enter Address')); ?></label>
                                                        <input type="text" id="addressBox" name="address" class="form-control" placeholder="<?php echo e(__('Enter Address')); ?>" required="">
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                        <label>Latitude</label>
                                                        <input type="text" disabled id="latitudeBox" name="lat" class="form-control" placeholder="Latitude" required="">
                                                    </div>
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                                        <label>Longitude</label>
                                                        <input type="text" disabled id="longitudeBox" name="lng" class="form-control" placeholder="Longitude" required="">
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
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label class=""><?php echo e(__('Enter Your Guests Emails')); ?></label>
                                                        <div>
                                                            <textarea id="guest_list" class="form-control" style="width:100% !important;" rows="4" cols="300" name="guest_list" placeholder="<?php echo e(__('Enter Guest Emails')); ?> [<?php echo e(__('separated by commas')); ?>] " data-role="tagsinput" ></textarea>
                                                        </div>
                                                        <input type="hidden" name="user_id" value="<?php echo e($userdata->id); ?>">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('public')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <style>
                                    div.tagsinput { border:1px solid #CCC; background: #FFF; padding:5px; width:300px; height:100px; overflow-y: auto;}
                                    div.tagsinput span.tag { border: 1px solid #a5d24a; -moz-border-radius:2px; -webkit-border-radius:2px; display: block; float: left; padding: 5px; text-decoration:none; background: #cde69c; color: #638421; margin-right: 5px; margin-bottom:5px;font-family: helvetica;  font-size:13px;}
                                    div.tagsinput span.tag a { font-weight: bold; color: #82ad2b; text-decoration:none; font-size: 11px;  } 
                                    div.tagsinput input { width:80px; margin:0px; font-family: helvetica; font-size: 13px; border:1px solid transparent; padding:5px; background: transparent; color: #000; outline:0px;  margin-right:5px; margin-bottom:5px; }
                                    div.tagsinput div { display:block; float: left; } 
                                    .tags_clear { clear: both; width: 100%; height: 0px; }
                                    .not_valid {background: #FBD8DB !important; color: #90111A !important;}
                                </style>
                                <?php if(Auth::User()->business): ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('My Business')); ?>:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 width400">
                                            <div class="row nomargin">
                                                <div
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                    <h5><?php echo e(Auth::User()->business->name ?? ''); ?></h5>
                                                    <p><i class="fa fa-globe" aria-hidden="true"></i>
                                                        <?php echo e(Auth::User()->business->address ?? ''); ?></p>
                                                    <p><b><?php echo e(__('Category')); ?> : </b><?php echo e(__(Auth::User()->business->business_category->name)); ?></p>
                                                    <?php if(!Auth::User()->business->Guests): ?>
                                                    <?php else: ?>
                                                    <div><b><?php echo e(__('Guest List')); ?> : </b> <br>
                                                        <?php $__currentLoopData = Auth::User()->business->guests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-2 col-sm-6 col-xs-6">
                                                                <div style="margin:10px 0; ">
                                                                    <?php if($guest->profile_image!=''): ?>
                                                                    <img class="img-fluid" style="height: 100px; width:100px; border-radius:50%; object-fit:cover;" src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($guest->profile_image); ?>" />
                                                                    <?php else: ?>
                                                                    <img class="img-fluid" style="height: 100px; width:100px; border-radius:50%; object-fit:cover;" src="<?php echo e(asset('no-image.jpg')); ?>" />
                                                                    <?php endif; ?>
                                                                    <div class="text-center" style="margin-top:10px;"><?php echo e($guest->name); ?></div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <?php endif; ?>
                                                        <div class="col-md-12" style="margin: 20px 0; width:!00%;">
                                                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                            <?php echo e(Auth::User()->business->updated_at->diffForHumans() ?? ''); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <?php endif; ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('Update Post')); ?>:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label" id="loginForm"
                                                method="POST" action="<?php echo e(Route('post.update')); ?>">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="row">
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <label for="category"><?php echo e(__('Choose')); ?> <?php echo e(__('Category')); ?></label>
                                                        <?php $category = DB::table('categories')->get(); ?>
                                                        <select class="form-control" name="category_id" required="">
                                                            <option disabled ><?php echo e(__('Choose')); ?> <?php echo e(__('Category')); ?></option>
                                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($data->id); ?>">
                                                                <?php echo e($data->category_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Enter Heading')); ?></label>
                                                        <input type="text" name="heading" class="form-control" placeholder="<?php echo e(__('Enter Heading')); ?>" required="">
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Enter Your Comment')); ?></label>
                                                        <textarea class="form-control" rows="4" cols="300" name="comment" placeholder="<?php echo e(__('Comment here')); ?>" required=""></textarea>
                                                        <input type="hidden" name="user_id" value="<?php echo e($userdata->id); ?>">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('public')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php if(Auth::User()->posts->count() > 0): ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('My Post')); ?>:</h3>
                                    <div class="row">
                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 width400">
                                            <div class="row nomargin">
                                                <div
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                    <h5><?php echo e($post->heading ?? ''); ?></h5>
                                                    <p><i class="fa fa-comments" aria-hidden="true"></i>
                                                        <?php echo e($post->comment ?? ''); ?></p>
                                                    <p><b><?php echo e(__('Category')); ?> : </b><?php echo e(__($post->category->category_name)); ?></p>
                                                    <p><i class="fa fa-clock-o" aria-hidden="true"></i>
                                                        <?php echo e($post->updated_at->diffForHumans() ?? ''); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<article class="editprofile_detail">
    <section class="editprofile_info">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 allprofile_options">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#general"><?php echo e(__('General')); ?></a></li>
                                
                            </ul>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="general">
                                    <div class="allprofile_detail">
                                        <h3 class="float-left"><?php echo e(__('General')); ?> <small><a href="<?php echo e(route('user.profile.edit')); ?>"
                                                    class=""><?php echo e(__('edit')); ?></a></small></h3>
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
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Name')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($userdata->name); ?> <?php echo e($userdata->surname); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Email Address')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($userdata->email); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Phone')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->phone)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->phone); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Password')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">********</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Location')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->address)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->address); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Hobbies')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if($meuser->hobbies->count() == 0): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php $__currentLoopData = $meuser->hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hobbie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e(__($hobbie->name)); ?>,
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>                                                            
                                                        </td>
                                                    </tr>
                                                    
                                                    
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Web')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->web)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->web); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Country')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->country->name)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->country->name); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Address')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->address)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->address); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Languages')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if($meuser->languages->count() == 0): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php $__currentLoopData = $meuser->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e($language->name); ?>,
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Age')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->age)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->age); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Professional Category')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->professional_category->name)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->professional_category->name); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Current Company')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->current_company)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->current_company); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Vacations city')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->vacation_city)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->vacation_city); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('City')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->city)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->city); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Hosted at')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->hosted_at)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->hosted_at); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('From to')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->country)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->country->name); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th style="font-weight:600;">Social Media <?php echo e(__('Profile')); ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Facebook:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->facebook)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->facebook); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Instagram:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->instagram)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->instagram); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Twitter:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->twitter)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->twitter); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Youtube:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->youtube)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->youtube); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Linkedin:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if(empty($meuser->linkedin)): ?>
                                                                <span class="text-danger text-bold"><?php echo e(__('Please Fill this Data')); ?></span>
                                                            <?php else: ?>
                                                                <?php echo e($meuser->linkedin); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade in active" id="passwordChange">
                                    <div class="allprofile_detail">
                                        <h3 class=""><?php echo e(__('Update')); ?> <?php echo e(__('Password')); ?><small></h3>
                                        <div class="" style="margin: 20px 0">
                                            <form class="register_form register_form1 show_label" id="loginForm" method="POST" action="<?php echo e(Route('user.profile.password.update')); ?>"="novalidate">
                                                <?php echo e(csrf_field()); ?>

                                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="text-danger" style="margin: 10px 0;"> <?php echo $error; ?></div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(session('success')): ?>
                                                    <div class="alert alert-success">
                                                        <?php echo e(session('success')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <?php if(session('error')): ?>
                                                    <div class="alert alert-danger">
                                                        <?php echo e(session('error')); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Enter Your Password')); ?></label>
                                                        <input type="password" name="password" id="password" class="form-control" placeholder="<?php echo e(__('Enter Your Password')); ?>" style="position: relative">
                                                        <p class="eye_icon" onclick="togglePassword()"><i id="currentPassword" class="fa fa-eye" aria-hidden="true" style="color: #d3b406; position: absolute; top:3px; right:5px;"></i></p>
                                                        <script>
                                                            function togglePassword() {
                                                                var passwordInput = document.getElementById('password');
                                                                var eye = document.getElementById('currentPassword');
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
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Enter New Password')); ?></label>
                                                        <input type="password" name="newpassword" id="newpassword" class="form-control" placeholder="<?php echo e(__('Enter New Password')); ?>" style="position: relative">
                                                        <p class="eye_icon" onclick="toggleNewPassword()"><i id="newPassword" class="fa fa-eye" aria-hidden="true" style="color: #d3b406; position: absolute; top:3px; right:5px;"></i></p>
                                                        <script>
                                                            function toggleNewPassword() {
                                                                var passwordInput = document.getElementById('newpassword');
                                                                var eye = document.getElementById('newPassword');
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
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Confirm New Password')); ?></label>
                                                        <input type="password" name="confirmation_newpassword" id="confirm_newpassword" class="form-control" placeholder="<?php echo e(__('Confirm New Password')); ?>" style="position: relative">
                                                        <p class="eye_icon" onclick="toggleConfirmNewPassword()"><i id="confirmNewPassword" class="fa fa-eye" aria-hidden="true" style="color: #d3b406; position: absolute; top:3px; right:5px;"></i></p>
                                                        <script>
                                                            function toggleConfirmNewPassword() {
                                                                var passwordInput = document.getElementById('confirm_newpassword');
                                                                var eye = document.getElementById('confirmNewPassword');
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
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- set bio -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="float: left" id="exampleModalLabel"><?php echo e(__('Edit Profile Pic')); ?></h5>
                <button type="button" class="close" style="float: right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div style="clear: both;"></div>
            </div>
            <div class="modal-body">
                <form class="register_form register_form1 show_label" action="<?php echo e(route('user.profile-pic-update')); ?>"
                    method="post" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <?php if($errors->has('profile_image')): ?>
                            <span class="text-sm text-danger"><?php echo e($errors->first('profile_image')); ?></span>
                            <?php endif; ?>
                            <input type="file" class="form-control" id="profile_image" name="profile_image">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?> </button>
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
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/jquery-ui.min.js'></script>

<script src="<?php echo e(asset('js/')); ?>/jquery.tagsinput.js"></script>
<script type="text/javascript">

    function onAddTag(tag) {
      alert("Added a tag: " + tag);
    }
    function onRemoveTag(tag) {
      alert("Removed a tag: " + tag);
    }

    function onChangeTag(input,tag) {
      alert("Changed a tag: " + tag);
    }

    $(function() {

      $('#guest_list').tagsInput({width:'auto'});


// Uncomment this line to see the callback functions in action
//			$('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

// Uncomment this line to see an input with no interface for adding new tags.
//			$('input.tags').tagsInput({interactive:false});
    });

  </script><?php /**PATH D:\xampp\htdocs\222holidate\resources\views/holidates_web/profile.blade.php ENDPATH**/ ?>