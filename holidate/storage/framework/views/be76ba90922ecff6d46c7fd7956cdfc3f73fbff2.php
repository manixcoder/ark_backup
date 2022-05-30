<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('holidates_web.inc.header_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="allevents" style="min-height:70vh;">
    <section class="event_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h2><?php echo e(__('Category')); ?>: <?php echo e(__($category->category_name)); ?></h2>
                        </div>
                    </div>
                </div>
                <?php if($users->count() == 0): ?>
                    <div style="margin: 60px 16px; font-size:18px; color:rgb(255, 0, 0);">
                        <?php echo e(__('no users available')); ?>!
                    </div>
                <?php else: ?>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                            <div class="people_img">
                                <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($user->profile_image); ?>" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                <h4><?php echo e($user->name); ?> <?php echo e($user->surname); ?></h4>
                                <h5><?php echo e(__('Photographer')); ?></h5>
                                <p><?php echo e(__('Delhi')); ?></p>
                                <!--<button class="btn btn-block" onclick="return alert('First you have to pay for see details');"><a  class="people_conection">Connect</a></button>-->
                                
                                <a href="<?php echo e(route('connect', $user->id)); ?>" class="btn btn-block people_btn" onclick="return confirm('First you have to pay for see details');" class="people_conection"><?php echo e(__('Connect')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</article>
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/holidate/holidate_web/resources/views/holidates_web/category/show.blade.php ENDPATH**/ ?>