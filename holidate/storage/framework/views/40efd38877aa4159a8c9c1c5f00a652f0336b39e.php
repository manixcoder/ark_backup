<?php echo $__env->make('web_layout.login_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Login-form-start -->
        <section class="allforms">
            <div class="login_form">
                <div class="row">
                    <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <a href="../index.html"><img src="../assets/images/logo.png" /></a>
                    </div> -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="register_form"  action="<?php echo e(URL::to('add-user')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data">
                       <?php echo e(csrf_field()); ?>

                            <div class="row nomargin">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                    <h3>Profile</h3>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="social_network_profile">Social Network Profile</label>
                                    <input type="text" id="social_network_profile" name="social_network_profile" class="form-control" placeholder="Social Network Profile">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="full_name">Tel</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                        placeholder="Telephone">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="web">Web</label>
                                    <input type="text" id="web" name="web" class="form-control"
                                        placeholder="Web">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Address</label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        placeholder="Address">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Nationality</label>
                                    <?php $nationality = DB::table('country')->get(); ?>
                                    <select class="form-control" name="country_id">
                                        <option>Choose Country</option>
                                        <?php $__currentLoopData = $nationality; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->country_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Language</label>
                                    <?php $language = DB::table('language')->get(); ?>
                                    <select class="form-control" name="languages_id">
                                        <option>Choose Language</option>
                                        <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->language_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                 <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Age</label>
                                    <input type="text" id="age" name="age" class="form-control"
                                        placeholder="Age">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Marital Status</label>
                                    <select class="form-control" name="languages_id">
                                        <option>Choose Marital Status</option>
                                        <option value="0">Married</option>
                                        <option value="1">Unmarried</option>                                   
                                    </select>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Professional Category</label>
                                    <?php $language = DB::table('category')->get(); ?>
                                    <select class="form-control" name="category_id">
                                        <option>Choose Category</option>
                                        <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->category_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                 <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Current Company</label>
                                    <input type="text" id="current_company" name="current_company" class="form-control"
                                        placeholder="Current Company">
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Hobbies</label>
                                    <?php $Hobbies = DB::table('hobbies')->get(); ?>
                                    <select class="form-control" name="hobbies_id">
                                        <option>Choose Hobbies</option>
                                        <?php $__currentLoopData = $Hobbies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->hobbies_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Vacations city</label>
                                    <input type="text" id="current_company" name="current_company" class="form-control"
                                        placeholder="Current Company">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Hosted At</label>
                                    <input type="text" id="hosted_at" name="hosted_at" class="form-control"
                                        placeholder="Hosted At">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">From to</label>
                                    <input type="text" id="from_to" name="from_to" class="form-control"
                                        placeholder="From to">
                                </div>

                                <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label for="email">Profile Image</label>
                                    <input type="file" id="profile_image" name="profile_image" class="form-control">
                                </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <button type="submit" class="btn btn-primary">Update Profile </button>
                            </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Login-form-end -->
    </div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/functionality.js"></script><?php /**PATH /home/holidate/holidate_web/resources/views/holidates_web/signup/profile.blade.php ENDPATH**/ ?>