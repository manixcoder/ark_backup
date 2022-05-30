<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

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
                                        <?php if($user->profile_image!=''): ?>
                                            <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($user->profile_image); ?>" />
                                        <?php else: ?>
                                            <img src="<?php echo e(asset('no-image.jpg')); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="username_section">
                                        <h3><?php echo e($user->name); ?> <?php echo e($user->surname); ?></h3>
                                        <p><i class="fa fa-envelope" aria-hidden="true"></i><?php echo e($user->email); ?></p>
                                        <p><i class="fa fa-phone" aria-hidden="true"></i><?php echo e($user->phone ?? ' '); ?></p>
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
                                   
                                        <h3 class="float-left"><?php echo e(__('You have to Pay before Connecting with')); ?> <?php echo e($user->name); ?></h3>

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
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php echo e($user->name); ?> <?php echo e($user->surname); ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Email Address')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php echo e($user->email); ?>

                                                        </td>
                                                    </tr>
                                                     <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Phone')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($user->phone ?? ''); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('City')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($user->city); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Country')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($user->country->name); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Address')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($user->address); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Hobbies')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php $__currentLoopData = $user->hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hobbie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e(__($hobbie->name)); ?>,
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Language')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php echo e($language->name); ?>,
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Web')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($user->web); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Current Company')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($user->current_company); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Marital Status')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                            <?php if($user->marital_status == 'Select Your Status'): ?>
                                                                
                                                            <?php else: ?>
                                                                <?php echo e(__($user->marital_status)); ?>

                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4"><?php echo e(__('Vacation City')); ?>:</th>
                                                        <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8"><?php echo e($user->vacation_city); ?></td>
                                                    </tr>
                                                  
                                                </tbody>
                                            </table>
                                    </div>
                                </div>
                                <?php if($user->posts->count() > 0): ?>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                        <h3><?php echo e(__('Post')); ?>:</h3>
                                        <div class="row">
                                            <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 width400">
                                                        <div class="row nomargin">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                                <h5><?php echo e($post->heading ?? ''); ?></h5>
                                                                <p><i class="fa fa-comments" aria-hidden="true"></i> <?php echo e($post->comment ?? ''); ?></p>
                                                                <p><b><?php echo e(__('Category')); ?> : </b><?php echo e(__($post->category->category_name)); ?></p>
                                                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo e($post->updated_at->diffForHumans() ?? ''); ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if($user->business): ?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('My Business')); ?>:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 width400">
                                            <div class="row nomargin">
                                                <div
                                                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content post_content">
                                                    <h5><?php echo e($user->business->name ?? ''); ?></h5>
                                                    <p><i class="fa fa-comments" aria-hidden="true"></i>
                                                        <?php echo e($user->business->address ?? ''); ?></p>
                                                    <p><b><?php echo e(__('Category')); ?> : </b><?php echo e(__($user->business->business_category->name)); ?></p>
                                                    <?php if(!$user->business->Guests): ?>
                                                    <?php else: ?>
                                                    <div><b><?php echo e(__('Guest List')); ?> : </b> <br>
                                                        <?php $__currentLoopData = $user->business->guests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php echo e($user->business->updated_at->diffForHumans() ?? ''); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/holidates_web/connect_people.blade.php ENDPATH**/ ?>