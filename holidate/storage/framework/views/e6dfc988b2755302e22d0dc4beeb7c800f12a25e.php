<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('holidates_web.inc.header_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <article class="allevents">
            <section class="event_section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                    <form class="register_form" action="#" method="post">
                                        <div class="row">
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <label for="search_event">Search Event</label>
                                                <input type="search" id="search_event" name="search_event" class="form-control"
                                                    placeholder="Search Event">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-right">
                                    <div class="btn-group filter-button filter-button1 ">
                                        <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"> <i class="fa fa-filter" aria-hidden="true"></i> Sort</button>
                                        <!-- <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"></button> -->
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Response Time</a></li>
                                            <li><a href="#">Location</a></li>
                                            <li><a href="#">Category</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php $events = DB::table('events')->get(); ?>
                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">
                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                    <h5><?php echo e($data->date); ?></h5>
                                    <h3><?php echo e($data->heading); ?></h3>
                                    <p ><?php echo substr($data->description, 0,50) ?> ...</p>
                                    <p class="location"><img src="<?php echo e(asset('public/web_assets/images/place.png')); ?>"/><b>Location Name</b></p>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">
                                            <p><img src="<?php echo e(asset('public/web_assets/images/user.png')); ?>"/> <b>10 people attending</b></p>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">
                                            <button class="btn btn-block" ><a href="<?php echo e(URL::to('eventdetail' ,$data->id)); ?>">Attend</a></button>
                                        </div>
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

        <?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/holidates_web/all_events.blade.php ENDPATH**/ ?>