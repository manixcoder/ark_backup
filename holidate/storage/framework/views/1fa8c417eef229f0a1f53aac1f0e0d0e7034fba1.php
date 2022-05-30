
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?php echo e(__('Dashboard')); ?></h4> </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('adminpanel.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                
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
        <a href="<?php echo e(route('adminpanel.users')); ?>" class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title"><?php echo e(__('Total')); ?> <?php echo e(__('Users')); ?></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?php echo e($users->count()); ?></span></li>
                </ul>
            </div>
        </a>
        <a href="<?php echo e(route('adminpanel.categories')); ?>" class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title"><?php echo e(__('Total')); ?> <?php echo e(__('Categories')); ?></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?php echo e($categories->count()); ?></span></li>
                </ul>
            </div>
        </a>
        <a href="<?php echo e(route('adminpanel.posts')); ?>" class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title"><?php echo e(__('Total')); ?> <?php echo e(__('Posts')); ?></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo e($posts->count()); ?></span></li>
                </ul>
            </div>
        </a>
    </div>
    <!--/.row -->
    <!--row -->
    <!-- /.row -->
    
    <!-- ============================================================== -->
    <!-- table -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                
                <h3 class="box-title"><?php echo e(__('Recent Signup Users')); ?></h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Phone')); ?></th>
                                <th><?php echo e(__('City')); ?></th>
                                <th><?php echo e(__('Country')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $latestusers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td>
                                    <?php if($user->profile_image!=''): ?>
                                    <img style="width:30px; height:30px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($user->profile_image); ?>" />
                                    <?php else: ?>
                                    <img style="width:30px; height:30px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('no-image.jpg')); ?>" />
                                    <?php endif; ?>
                                    <span style="margin-left:10px;"><?php echo e($user->name); ?> <?php echo e($user->surname); ?></span>
                                </td>
                                <td><?php echo e($user->email ?? 'Not Available'); ?></td>
                                <td><?php echo e($user->phone ?? 'Not Available'); ?></td>
                                <td><?php echo e($user->city ?? 'Not Available'); ?></td>
                                <td><?php echo e($user->country->name ?? 'Not Available'); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h3 class="box-title"><?php echo e(__('Recent Posts')); ?></h3>
                <div class="comment-center p-t-10">
                    <?php $__currentLoopData = $latestposts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestpost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                    <div class="comment-body">
                        <div class="user-img">
                            <?php if($latestpost->user->profile_image!=''): ?>
                            
                            <img style="width:50px; height:50px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($latestpost->user->profile_image); ?>" />
                            <?php else: ?>
                            <img style="width:50px; height:50px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('no-image.jpg')); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="mail-contnet">
                            <h5><?php echo e($latestpost->user->name); ?> <?php echo e($latestpost->user->surname); ?></h5><span class="time"><b><?php echo e(__('Updated at')); ?>: </b><?php echo e($latestpost->updated_at->diffForHumans()); ?></span>
                            <p class="mail-desc"><b><?php echo e(__('Category')); ?>: </b><?php echo e($latestpost->category->category_name); ?></p>
                            <p class="mail-desc"><b><?php echo e(__('Heading')); ?>: </b> <b><?php echo e($latestpost->heading); ?></b></p>
                            <p class="mail-desc"><b><?php echo e(__('Comment')); ?>: </b><?php echo e($latestpost->comment); ?></p> 
                            
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
        <!-- /.col -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/holidate/holidate_web/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>