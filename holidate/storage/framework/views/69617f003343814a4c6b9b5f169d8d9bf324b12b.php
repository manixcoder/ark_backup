<?php echo $__env->make('web_layout.login_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('web_assets/js/jquery.mockjax-2.2.1.js')); ?>"></script>
    <script src="<?php echo e(asset('web_assets/js/jquery.validate.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            var validator = $("#categoryForm").validate({
                rules: {
                    category_name: {
                        required: true
                    },
                    image: {
                        required: true
                    }
                },
                messages: {
                    category_name: {
                        required: "Provide a Name"
                    },
                    image: {
                        required: "Please Provide a Image",
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
<!-- Login-form-start -->
<section class="allforms">
    <div class="login_form">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                <h3>Add Category:</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <form class="register_form register_form1 show_label" id="categoryForm" action="<?php echo e(URL::to('addcategory')); ?>"
                            method="POST" id="FormValidation" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" id="category_name" name="category_name" class="form-control"
                                        placeholder="Category Name" />
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <label for="image">Category Image</label>
                                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
            <!--    <form class="register_form"  action="<?php echo e(URL::to('addcategory')); ?>" method="POST" id="FormValidation" enctype="multipart/form-data">-->
            <!--   <?php echo e(csrf_field()); ?>-->
            <!--        <div class="row nomargin">-->
            <!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">-->
            <!--                <h3>Add Category</h3>-->
            <!--            </div>-->
            <!--            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
            <!--                <label for="web">Category Name</label>-->
            <!--                <input type="text" id="category_name" name="category_name" class="form-control"-->
            <!--                    placeholder="Category Name">-->
            <!--            </div>-->
            <!--            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
            <!--                <label for="email">Category Image</label>-->
            <!--                <input type="file" id="image" name="image" class="form-control" accept="image/*">-->
            <!--            </div>-->
            <!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">-->
            <!--                <button type="submit" class="btn btn-primary">Submit</button>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </form>-->
            <!--</div>-->
        </div>
    </div>
</section>
<!-- Login-form-end -->
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/functionality.js"></script>
<?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/holidates_web/add_category.blade.php ENDPATH**/ ?>