<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('holidates_web.inc.header_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<article class="allevents">
    <section class="event_section" style="min-height: 90vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo e(__('Latest Publications by Users')); ?></h2>
                        </div>
                    </div>
                </div>
                <?php $__currentLoopData = $latest_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                            <div class="people_img">
                                <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($post->user->profile_image); ?>" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                <h4><?php echo e($post->user->name); ?> <?php echo e($post->user->surname); ?></h4>
                                <?php if($post->user->hobbies->count() == 0): ?>
                                <?php else: ?>
                                
                                <h5><?php echo e(__($post->user->hobbies->first()->name)); ?></h5>
                                <?php endif; ?>
                                <p>
                                    <?php if(!$post->user->city): ?>
                                    <?php else: ?>
                                    <?php echo e($post->user->city); ?>

                                    <?php endif; ?>
                                </p>
                                <!--<button class="btn btn-block" onclick="return alert('First you have to pay for see details');"><a  class="people_conection">Connect</a></button>-->
                                
                                <a href="<?php echo e(route('connect', $post->user->id)); ?>" class="btn btn-block people_btn" onclick="return confirm('First you have to pay for see details');" class="people_conection"><?php echo e(__('Connect')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
</article>
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\xampp\htdocs\222holidate\resources\views/holidates_web/all_latest_users.blade.php ENDPATH**/ ?>