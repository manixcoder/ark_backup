<!-- banner-start -->
<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('holidates_web.inc.header_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- people-section-start -->
<?php if($search_data ?? '' > 0): ?>
<section class="people_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4><?php echo e(__('Search Result')); ?></h4>
                        <p><?php echo e(__('Find people they share same interest as you.')); ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        <!-- <a href="people/allpeople.html">See all</a> -->
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $search_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $userdata = DB::table('users')->where('id', $data->user_id)->first();
                                   $hobbiesdata = DB::table('hobbies')->where('id', $userdata->hobbies_id)->first();
                             ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                        <div class="row nomargin">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                <div class="people_img">
                                    <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($userdata->profile_image); ?>" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                    <h4><?php echo e($userdata->name); ?> <?php echo e($userdata->surname); ?></h4>
                                    <h5><?php echo e($hobbi->hobbies_name); ?></h5>
                                    <p><?php echo e(__('Delhi')); ?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- people-section-end -->
<!-- latest publics -->
<section class="people_section" style="z-index: 999; background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4><?php echo e(__('Latest Publications by Users')); ?></h4>
                        <p><?php echo e(__('Find people who has posted recently.')); ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        <a href="<?php echo e(route('latest_publications')); ?>"><?php echo e(__('See all')); ?></a>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $latest_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latest_post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($latest_post->user->profile_image!=''): ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                        <div class="row nomargin">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                <div class="people_img">
                                    <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($latest_post->user->profile_image); ?>" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                    <h4><?php echo e($latest_post->user->name); ?> <?php echo e($latest_post->user->surname); ?></h4>
                                    <?php if($latest_post->user->hobbies->count() == 0): ?>
                                    <?php else: ?>
                                    
                                    <h5><?php echo e(__($latest_post->user->hobbies->first()->name)); ?></h5>
                                    <?php endif; ?>
                                    <p>
                                        <?php if(!$latest_post->user->city): ?>
                                        <?php else: ?>
                                            <?php echo e($latest_post->user->city); ?>

                                        <?php endif; ?>
                                    </p>
                                    <a href="<?php echo e(route('connect', $latest_post->user->id)); ?>" class="btn btn-block people_btn"
                                        onclick="return confirm('First you have to pay for see details');"
                                        class="people_conection"><?php echo e(__('Connect')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //latest publics -->
<!-- people-section-start -->
<section class="people_section" style="z-index: 999; background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4><?php echo e(__('People near you')); ?></h4>
                        <p><?php echo e(__('Find people they share same interest as you.')); ?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        <a href="<?php echo e(route('allpeople')); ?>"><?php echo e(__('See all')); ?></a>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($user->profile_image!=''): ?>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                        <div class="row nomargin">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                <div class="people_img">
                                    <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($user->profile_image); ?>" />
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                    <h4><?php echo e($user->name); ?> <?php echo e($user->surname); ?></h4>
                                    <?php if($user->hobbies->count() == 0): ?>
                                    <?php else: ?>
                                    
                                    <h5><?php echo e(__($user->hobbies->first()->name)); ?></h5>
                                    <?php endif; ?>
                                    <p>
                                        <?php if(!$user->city): ?>
                                        <?php else: ?>
                                        <?php echo e($user->city); ?>

                                        <?php endif; ?>
                                    </p>
                                    <a href="<?php echo e(route('connect', $user->id)); ?>" class="btn btn-block people_btn"
                                        onclick="return confirm('First you have to pay for see details');"
                                        class="people_conection"><?php echo e(__('Connect')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade connect_modal" id="connectwithpeople" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modal-title1" id="exampleModalLabel"><?php echo e(__('Choose Your Option')); ?></h5>
            </div>
            <div class="modal-body">
                <p><?php echo e(__('First you have to pay amount for see details.')); ?></p>
            </div>
            <div class="modal-footer">
                <p id=""></p>
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="submit" class="btn btn-primary"><a href="#" id="modelurl"><?php echo e(__('Connect')); ?></a></button>
            </div>
        </div>
    </div>
</div>
<!-- people-section-end -->
<section class="container" style="margin-top: 40px; margin-bottom: 40px;">
    <div class="embed-responsive embed-responsive-16by9">
        <video width="100%"  controls="">
            <source src="<?php echo e(asset('images')); ?>/holidate.mp4" type="video/mp4">
        </video>
    </div>
</section>
<!-- Events-section-start -->
<!--<section class="event_section" style="z-index: 999; background:#fff;">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="row main_heading">-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">-->
<!--                        <h4><?php echo e(__('Events near you')); ?></h4>-->
<!--                        <p><?php echo e(__('See what’s happening soon where you are stayed')); ?></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <?php $events = DB::table('events')->get(); ?>-->
<!--                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">-->
<!--                        <div class="row nomargin">-->
<!--                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">-->
<!--                                <h5><?php echo e($data->event_start_time); ?></h5>-->
<!--                                <h3><?php echo e($data->heading); ?></h3>-->
<!--                                <p><?php echo substr($data->description, 0,45) ?> ...</p>-->
<!--                                <p class="location"><img-->
<!--                                        src="<?php echo e(asset('web_assets/images/place.png')); ?>" /><b><?php echo e($data->location ?? 'Location name'); ?></b>-->
<!--                                </p>-->
<!--                                <div class="row">-->
<!--                                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">-->
<!--                                        <p><img src="<?php echo e(asset('web_assets/images/user.png')); ?>" /> <b><?php echo e(__('10 people attending')); ?></b></p>-->
<!--                                    </div>-->
<!--                                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">-->
<!--                                        <button class="btn btn-block"><a href="#"><?php echo e(__('Attend')); ?></a></button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Events-section-end -->
<!-- categories-section-start -->

<!--<?php if($categories->count() > 0): ?>-->
<!--<section class="categories_section" style="padding: 20px 0 80px 0; z-index: 999; background:#fff;" id="categoriesHere">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="row main_heading">-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">-->
<!--                        <h4><?php echo e(__('Categories')); ?></h4>-->
<!--                        <p><?php echo e(__('Browse groups by topics you’re interested in.')); ?></p>-->
<!--                    </div>-->
<!--                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">-->
<!--                        <a href="<?php echo e(route('category.showall')); ?>"><?php echo e(__('Show All')); ?></a>-->
<!--                        <?php if(auth()->guard()->guest()): ?>-->
<!--                        <?php else: ?>-->
<!--                        <?php if(Auth::User()->users_role == 1 ): ?>-->
<!--                        <a href="<?php echo e(route('category.create')); ?>" style="margin:0 10px; text-decoration:underline;"><?php echo e(__('Add Category')); ?></a>-->
<!--                        <?php endif; ?>-->
<!--                        <?php endif; ?>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row">-->
<!--                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
<!--                    <?php if($data->image!=''): ?>-->
<!--                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">-->
<!--                        <div class="row nomargin">-->
<!--                            <?php if(auth()->guard()->guest()): ?>-->
<!--                            <?php else: ?>-->
<!--                            <?php if(Auth::User()->users_role == 1 ): ?>-->
<!--                            <a href="<?php echo e(route('category.destroy',  $data->id)); ?>"-->
<!--                                style="position: absolute; right:20px; z-index:10; top:-10px;">-->
<!--                                <img src="<?php echo e(asset('images/delete.png')); ?>" alt="">-->
<!--                            </a>-->
<!--                            <?php endif; ?>-->
<!--                            <?php endif; ?>-->
<!--                            <a href="<?php echo e(route('category.show', $data->id)); ?>">-->
<!--                                <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">-->
<!--                                    <?php if($data->image!=''): ?>-->
<!--                                    <img src="<?php echo e(asset('category_image/')); ?>/<?php echo e($data->image); ?>" width="100%" />-->
<!--                                    <?php else: ?>-->
<!--                                    <img src="<?php echo e(asset('no-image.jpg')); ?>" width="100%" />-->
<!--                                    <?php endif; ?>-->
<!--                                </div>-->
<!--                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">-->
<!--                                    <p><?php echo e(__($data->category_name)); ?></p>-->
<!--                                </div>-->
<!--                            </a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <?php endif; ?>-->
<!--                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
<!--                </div>-->
<!--                <div class="row nomargin" style="float: right;">-->
<!--                    <?php echo e($categories->links()); ?>-->
<!--                </div>-->
<!--                <div style="clear: both;"></div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<?php endif; ?>-->
<!-- categories-section-end -->
<!-- holidate_work-section-start -->
<section class="holidatework_section" style="padding-top:40px; z-index: 999;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center holidate_heading">
                <h2><?php echo e(__('How Holidate Works')); ?></h2>
            </div>
            <div
                class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 holidate_content">
                        <div class="row nomargin">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <h3><?php echo e(__('Discover people')); ?></h3>
                                <p><?php echo e(__('See who’s hosting local events for all the things you love.')); ?></p>
                                <a href="<?php echo e(URL::to('signup')); ?>"><?php echo e(__('Join Holidate')); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 holidate_content">
                        <div class="row nomargin">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <h3><?php echo e(__('Join an event')); ?></h3>
                                <p><?php echo e(__('See who’s hosting local events for all the things you love.')); ?></p>
                                <a href="<?php echo e(URL::to('signup')); ?>"><?php echo e(__('Get Started')); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- holidate_work-section-end -->
<!-- app-section-start -->
<section class="app_section" style="z-index: 999; background:#fff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 app_img">
                        <img src="<?php echo e(asset('web_assets/images/app_img.png')); ?>" width="100%" />
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 app_right_content width100">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h3><?php echo e(__('Download the App')); ?></h3>
                                <p>Lorem ipsum door sit amet</p>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <ul>
                                    <li><a target="_blank" href="https://www.apple.com/in/ios/app-store/"><img
                                                src="<?php echo e(asset('web_assets/images/app_store.png')); ?>" /></a></li>
                                    <li><a target="_blank" href="https://play.google.com/store?hl=en_IN"><img
                                                src="<?php echo e(asset('web_assets/images/google_play.png')); ?>" /></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="embed-responsive embed-responsive-16by9">-->
<!--    <video width="100%"  controls="">-->
<!--        <source src="<?php echo e(asset('images')); ?>/holidate.mp4" type="video/mp4">-->
<!--      </video>-->
<!--</section>-->
<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- app-section-end -->
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/holidate/holidate_web/resources/views/holidates_web/home.blade.php ENDPATH**/ ?>