<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><?php echo e(__('Categories')); ?></h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('adminpanel.dashboard')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                <li class="active"><?php echo e(__('Categories')); ?></li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title"><?php echo e(__('Categories')); ?> 
                    <button data-toggle="modal" data-target="#addCategory" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light"><?php echo e(__('Create')); ?></button>
                </h3>
                
                <div id="addCategory" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 style="font-weight: 600;"><?php echo e(__('Create')); ?> <?php echo e(__('Category')); ?></h4>
                                <form class="" action="<?php echo e(route('adminpanel.category.store')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="category_name"><?php echo e(__('Category')); ?> <?php echo e(__('Name')); ?></label>
                                            <input type="text" id="category_name" name="category_name" class="form-control" placeholder="<?php echo e(__('Category')); ?> <?php echo e(__('Name')); ?>" />
                                        </div>
                                        <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="image"><?php echo e(__('Category')); ?> <?php echo e(__('Image')); ?></label>
                                            <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                            <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                
                <p class="text-muted"><?php echo e(__('All')); ?> <?php echo e(__('Categories')); ?> <?php echo e(__('available on')); ?> <code>Holidate.es</code></p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Image')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Created At')); ?></th>
                                <th><?php echo e(__('Updated At')); ?></th>
                                <th><?php echo e(__('Action')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($category->id); ?></td>
                                <td>
                                    <?php if($category->image!=''): ?>
                                    <img style="width:50px; height:30px; object-fit:cover;" src="<?php echo e(asset('category_image/')); ?>/<?php echo e($category->image); ?>" />
                                    <?php else: ?>
                                    <img style="width:50px; height:30px; object-fit:cover;" src="<?php echo e(asset('no-image.jpg')); ?>" />
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($category->category_name); ?></td>
                                <td><?php echo e($category->created_at->diffForHumans()); ?></td>
                                <td><?php echo e($category->updated_at->diffForHumans()); ?></td>
                                <td>
                                    <div style="display: flex;">
                                        <a data-toggle="modal" data-target="#editCategory<?php echo e($category->id); ?>" class="btn btn-primary font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px; margin-right:5px;"><?php echo e(__('Edit')); ?></a>
                                        <form action="<?php echo e(route('adminpanel.category.destroy', $category->id)); ?>" method="POST">
                                            <?php echo e(method_field('DELETE')); ?>

                                            <?php echo e(csrf_field()); ?>

                                            <button type="submit" class="btn btn-danger font-12 hidden-sm waves-effect waves-light" style="padding:2px 8px;"><?php echo e(__('Delete')); ?></button>
                                        </form>
                                    </div>
                                    
                                    <div id="editCategory<?php echo e($category->id); ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h4 style="font-weight: 600;"><?php echo e(__('Edit')); ?>: <?php echo e($category->category_name); ?></h4>
                                                    <form class="" action="<?php echo e(route('adminpanel.category.update')); ?>" method="post" enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <div class="row">
                                                            <input type="text" name="category_id" value="<?php echo e($category->id); ?>" style="display: none;">
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <label for="category_name"><?php echo e(__('Category')); ?> <?php echo e(__('Name')); ?></label>
                                                                <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Category Name" value="<?php echo e($category->category_name); ?>" />
                                                            </div>
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                                <label for="image"><?php echo e(__('Category')); ?> <?php echo e(__('Image')); ?></label>
                                                                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                                            </div>
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                                <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\222holidate\resources\views/admin/categories.blade.php ENDPATH**/ ?>