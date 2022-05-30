
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?php echo e(__('Report')); ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('adminpanel.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="active"><?php echo e(__('Report')); ?></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="">
                
                <div class="filter-parent" style="margin:20px 0 40px 0;">
                    <a href="<?php echo e(route('adminpanel.filter.weekly')); ?>" id="filterUserWeekly" class="filter-box bg-primary waves-effect waves-light"><?php echo e(__('Weekly')); ?></a>
                    <a href="<?php echo e(route('adminpanel.filter.monthly')); ?>" id="filterUserMonthly" class="filter-box bg-danger waves-effect waves-light"><?php echo e(__('Monthly')); ?></a>
                    <a href="<?php echo e(route('adminpanel.filter.quarterly')); ?>" id="filterUserQuarterly" class="filter-box bg-success waves-effect waves-light"><?php echo e(__('Quarterly')); ?></a>
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
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-text"><?php echo e(__('Total')); ?> <?php echo e(__('Users')); ?> <?php echo e(__('in last')); ?> <?php echo e(__($txt)); ?></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success" id="userCount"><?php echo e($users->count()); ?></span></li>
                </ul>
            </div>
            <div class="white-box analytics-info">
                
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($user->id); ?></td>
                                <td><?php echo e($user->name); ?> <?php echo e($user->surname); ?></td>
                                <td><?php echo e($user->email ?? 'Not Available'); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-text"><?php echo e(__('Total')); ?> <?php echo e(__('Posts')); ?> <?php echo e(__('in last')); ?> <?php echo e(__($txt)); ?></h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?php echo e($posts->count()); ?></span></li>
                </ul>
            </div>
            <div class="white-box analytics-info">
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div style="font-size: 20px; margin:10px 0; font-weight:500;"><?php echo e($post->heading ?? ''); ?></div>
                <p><i class="fa fa-comments" aria-hidden="true"></i> <?php echo e($post->comment ?? ''); ?></p>
                <p><b><?php echo e(__('Category')); ?> : </b><?php echo e(__($post->category->category_name)); ?></p>
                <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/holidate/holidate_web/resources/views/admin/report.blade.php ENDPATH**/ ?>