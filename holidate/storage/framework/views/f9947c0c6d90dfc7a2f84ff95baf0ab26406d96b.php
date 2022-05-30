<!-- banner-start -->
<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('holidates_web.inc.header_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <style scoped>
            .colored-bg{background-color: #dfe4ea; border-top: 2px solid #949494;}
            .ul-cat{margin:20px 0;}
            .a-cat{margin: 6px 4px; font-size: 14px !important; background-color: #fff; padding: 4px 10px; color: #212121; border: 1px solid #C2A12A; border-radius: 4px; display: inline-block;}
            .a-cat:hover{background-color: #212121; color:#fff; border: 1px solid transparent;}
            .a-cat-act{background-color: #212121 !important; color:#fff; border: 1px solid transparent;}
            .a-cat-active{margin: 6px 4px; background-color: #212121; padding: 4px 10px; color: #fff; border: 1px solid transparent; border-radius: 4px; display: inline-block;}
            .font22{font-size: 22px;}
        </style>
    
        
<div class="container">
    <div class="row" style="margin:40px 0 80px 0; min-height:60vh;">
        
        <?php Session::put('search', $search); ?>
        <div class="h2">Results for <?php echo e($search); ?>

            <?php if($cat == '0'): ?>
            <?php else: ?>
                in <?php echo e($cat->category_name); ?> Category
            <?php endif; ?>
        </div>
        <?php if($users->count() == 0): ?>
            <p style="margin: 10px 0;">Sorry!! No Results found for <?php echo e($search); ?></p>
        <?php else: ?>            
            <div style="margin: 20px 0;">Results are shown near 50 kms of you!</div>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->score == 100): ?>                
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                    <div class="row nomargin">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding"><div class="people_img">
                                <img src="<?php echo e(asset('profile_image/')); ?>/<?php echo e($user->profile_image); ?>"/>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                <h4><?php echo e($user->name); ?> <?php echo e($user->surname); ?></h4>
                                <?php if($user->hobbies->count() == 0): ?>
                                <?php else: ?>
                                
                                <h5><?php echo e($user->hobbies->first()->name); ?></h5>
                                <?php endif; ?>
                                <p>
                                    <?php if(!$user->city): ?>
                                    <?php else: ?>
                                    <?php echo e($user->city); ?>

                                    <?php endif; ?>
                                </p>
                                <!--<button class="btn btn-block" onclick="return alert('First you have to pay for see details');"><a class="people_conection">Connect</a></button>-->
                                
                                <a href="<?php echo e(route('connect', $user->id)); ?>" class="btn btn-block people_btn" onclick="return confirm('First you have to pay for see details');" class="people_conection">Connect</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
</div>
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    function scroll(){
        var elmnt = document.getElementById("catii");
        elmnt.scrollIntoView();
    }
    scroll();
</script><?php /**PATH /home/holidate/holidate_web/resources/views/holidates_web/search_result.blade.php ENDPATH**/ ?>