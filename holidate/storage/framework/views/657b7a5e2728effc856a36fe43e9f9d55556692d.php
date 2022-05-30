<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('holidates_web.inc.header_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<article class="allevents">
    <section class="event_section" style="min-height: 90vh;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo e(__('All Peoples')); ?></h2>
                        </div>
                    </div>
                </div>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <!--<button class="btn btn-block" onclick="return alert('First you have to pay for see details');"><a  class="people_conection">Connect</a></button>-->
                                
                                <a href="<?php echo e(route('connect', $user->id)); ?>" class="btn btn-block people_btn" onclick="return confirm('First you have to pay for see details');" class="people_conection"><?php echo e(__('Connect')); ?></a>
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
<?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/holidates_web/allpeople.blade.php ENDPATH**/ ?>