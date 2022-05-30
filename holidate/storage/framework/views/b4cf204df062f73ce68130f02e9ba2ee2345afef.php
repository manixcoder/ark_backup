
<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?php echo e(__('Posts')); ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('adminpanel.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="active"><?php echo e(__('Posts')); ?></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title"><?php echo e(__('Posts')); ?></h3>
                <p class="text-muted"><?php echo e(__('All')); ?> <?php echo e(__('Posts')); ?> <?php echo e(__('available on')); ?> <code>Holidate.es</code></p>
                
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div style="font-size: 20px; margin:10px 0; font-weight:500;">[<?php echo e($post->id); ?>]. <?php echo e($post->heading ?? ''); ?></div>
                            <p><i class="fa fa-comments" aria-hidden="true"></i> <?php echo e($post->comment ?? ''); ?></p>
                            <p><b><?php echo e(__('Category')); ?> : </b><?php echo e(__($post->category->category_name)); ?></p>
                            <p>
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <b><?php echo e(__('Updated At')); ?>:</b> <?php echo e($post->updated_at->diffForHumans() ?? ''); ?> - 
                                <i class="fa fa-clock-o" aria-hidden="true"></i> <b><?php echo e(__('Created At')); ?>:</b> <?php echo e($post->created_at->diffForHumans() ?? ''); ?>

                            </p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-2">
                                    <?php if($post->user->profile_image!=''): ?>
                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($post->user->profile_image); ?>" />
                                    <?php else: ?>
                                    <img style="width:60px; height:60px; object-fit:cover; border-radius:50%;" src="<?php echo e(asset('no-image.jpg')); ?>" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-10">
                                    <div style="margin: 10px 0;"><b>User ID: </b><?php echo e($post->user->id); ?> - <b>User: </b><?php echo e($post->user->name); ?> <?php echo e($post->user->surname); ?></div>
                                    <div style="margin: 10px 0;"><b><?php echo e(__('Email')); ?>: </b><?php echo e($post->user->email); ?></div>
                                </div>
                            </div>
                            <div style="margin: 10px 0;"><b><?php echo e(__('Phone')); ?>: </b><?php echo e($post->user->phone); ?></div>
                            <div style="margin: 10px 0;"><b><?php echo e(__('City')); ?>: </b><?php echo e($post->user->city); ?> - <b><?php echo e(__('Country')); ?>: </b><?php echo e($post->user->country->name); ?></div>
                        </div>
                        <div class="col-md-12">
                            <div style="display: flex;">
                                <button data-toggle="modal" data-target="#editPost<?php echo e($post->id); ?>" class="btn btn-primary font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px; margin-right:5px;"><?php echo e(__('Edit')); ?></button>
                                <form action="<?php echo e(route('adminpanel.post.delete', $post->id)); ?>" method="POST">
                                    <?php echo e(method_field('DELETE')); ?>

                                    <?php echo e(csrf_field()); ?>

                                    <button type="submit" class="btn btn-danger font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px;"><?php echo e(__('Delete')); ?></button>
                                </form>
                            </div>
                            
                            <div id="editPost<?php echo e($post->id); ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h4 style="font-weight: 600;"><?php echo e(__('Edit')); ?>: <?php echo e($post->heading); ?></h4>
                                            <form class="" action="<?php echo e(route('adminpanel.post.update')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="text" name="post_id" value="<?php echo e($post->id); ?>" style="display: none;">
                                                <div class="row">
                                                    <div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                        <label for="category"><?php echo e(__('Choose')); ?> <?php echo e(__('Category')); ?></label>
                                                        <?php $category = DB::table('categories')->get(); ?>
                                                        <select class="form-control" name="category_id" required="">
                                                            <?php if($post->category): ?>
                                                                <option value="<?php echo e($post->category->id); ?>"><?php echo e($post->category->category_name); ?></option>
                                                            <?php else: ?>
                                                                <option disabled><?php echo e(__('Choose')); ?> <?php echo e(__('Category')); ?></option>
                                                            <?php endif; ?>
                                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($data->id); ?>"> <?php echo e($data->category_name); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Enter Heading')); ?></label>
                                                        <input type="text" name="heading" class="form-control" placeholder="<?php echo e(__('Enter Heading')); ?>" required="" value="<?php echo e($post->heading); ?>">
                                                    </div>
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label><?php echo e(__('Enter Your Comment')); ?></label>
                                                        <textarea class="form-control" rows="4" cols="300" name="comment" placeholder="<?php echo e(__('Comment here')); ?>" required=""><?php echo e($post->comment); ?></textarea>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            
                        </div>
                    </div>
                    <div style="border:1px solid #dfdfdf; width:100%; margin:20px 0;"></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <div>
                    <?php echo e($posts->links()); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/holidate/holidate_web/resources/views/admin/posts.blade.php ENDPATH**/ ?>