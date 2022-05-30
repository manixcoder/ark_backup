<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo e(asset('web_assets/js/jquery.validate.js')); ?>"></script>
<script>
    $(document).ready(function() {
        var validator = $("#categoryForm").validate({
            rules: {
                category_name: {
                    required: true
                },
                image: {
                    required: true,
                    // remote: "emails.action"
                }
                // terms: "required"
            },
            messages: {
                category_name: {
                    required: "<?php echo e(__('Please Provide a Name')); ?>"
                },
                image: {
                    required: "<?php echo e(__('Please Provide a Image')); ?>",
                    // remote: jQuery.validator.format("{0} is already in use")
                }
                // terms: " "
            },
            success: function(label) {
                // set &nbsp; as text for IE
                label.html("&nbsp;").addClass("checked");
            },
            highlight: function(element, errorClass) {
                $(element).parent().next().find("." + errorClass).removeClass("checked");
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if (firstname && lastname && !this.value) {
                this.value = (firstname + "." + lastname).toLowerCase();
            }
        });
    });
    </script>
<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info user_basic_info1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                    <h3><?php echo e(__('Add Category')); ?>:</h3>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <form class="register_form register_form1 show_label" id="categoryForm" action="<?php echo e(route('category.store')); ?>" method="post"  enctype="multipart/form-data">
                                            <?php echo e(csrf_field()); ?>

                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="category_name"><?php echo e(__('Category Name')); ?></label>
                                                        <input type="text" id="category_name" name="category_name" class="form-control" placeholder="<?php echo e(__('Category Name')); ?>"/>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="image"><?php echo e(__('Category Image')); ?></label>
                                                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <!--<div class="col-lg-9 col-md-9 col-md-offset-1 col-sm-8 col-xs-12">-->
                        <!--    <div class=" nomargin">-->
                        <!--        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">-->
                        <!--            <h3>Add Category:</h3>-->
                        <!--            <form action="<?php echo e(route('category.store')); ?>" method="post"  enctype="multipart/form-data">-->
                        <!--                <?php echo csrf_field(); ?>-->
                        <!--                <div class="row">-->
                        <!--                    <div class="col-md-12">-->
                        <!--                        <div class="text-sm text-danger">-->
                        <!--                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
                        <!--                                <?php echo $error; ?> <br>-->
                        <!--                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-md-12">-->
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="name">Name</label>-->
                        <!--                            <input type="text" class="form-control" name="name" placeholder="Name">-->
                        <!--                            -->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-md-12">-->
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="image">image</label>-->
                        <!--                            <input type="file" class="form-control" name="image" placeholder="image">-->
                        <!--                            -->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                    <div class="col-md-6 col-md-offset-6">-->
                        <!--                        <button type="submit" class="btn btn-primary">submit</button>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </form>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<?php echo $__env->make('web_layout.footer_without_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH D:\xampp\htdocs\222holidate\resources\views/holidates_web/category/create.blade.php ENDPATH**/ ?>