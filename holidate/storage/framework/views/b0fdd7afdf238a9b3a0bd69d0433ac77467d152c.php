<!-- banner-start -->
<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('holidates_web.inc.header_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- categories-section-start -->
<?php $category = DB::table('categories')->orderBy('id', 'desc')->get(); ?>
<?php if($category!=''): ?>
<section class="categories_section" style="margin: 20px 0 80px 0;" id="categoriesHere">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row main_heading">
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                        <h4><?php echo e(__('All Categories')); ?> (<?php echo e($category->count()); ?>)</h4>
                        <p><?php echo e(__('Browse groups by topics you’re interested in')); ?>.</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                        
                    <?php if(auth()->guard()->guest()): ?>
                    <?php else: ?>
                    <?php if(Auth::User()->users_role == 1 ): ?>
                        <a href="<?php echo e(route('category.create')); ?>"><?php echo e(__('Add Category')); ?></a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($data->image!=''): ?>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                        <div class="row nomargin">
                            <?php if(auth()->guard()->guest()): ?>
                            <?php else: ?>
                            <?php if(Auth::User()->users_role == 1 ): ?>
                            <a href="<?php echo e(route('category.destroy',  $data->id)); ?>"
                                style="position: absolute; right:20px; z-index:10; top:-10px;">
                                <img src="<?php echo e(asset('images/delete.png')); ?>" alt="">
                            </a>
                            <?php endif; ?>
                            <?php endif; ?>
                            <a href="<?php echo e(route('category.show', $data->id)); ?>">
                                <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    <?php if($data->image!=''): ?>
                                    <img src="<?php echo e(asset('category_image/')); ?>/<?php echo e($data->image); ?>" width="100%" />
                                    <?php else: ?>
                                    <img src="<?php echo e(asset('no-image.jpg')); ?>" width="100%" />
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                    <p><?php echo e(__($data->category_name)); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- categories-section-end -->

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- app-section-end -->
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/holidates_web/category/showall.blade.php ENDPATH**/ ?>