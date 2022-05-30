<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- footer-section-start -->
<footer class="footer_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content width100">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <img src="<?php echo e(asset('web_assets/images/logo.png')); ?>" />
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content">
                <div class="row">
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <li>
                            <h5><?php echo e(__('Discover')); ?></h5>
                        </li>
                        <!--<li><a href="<?php echo e(URL::to('not-available')); ?>">Groups</a></li>-->
                        <li><a href="<?php echo e(URL::to('all_people')); ?>"><?php echo e(__('People')); ?></a></li>
                        <li><a href="#"><?php echo e(__('Events')); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content">
                <div class="row">
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <li>
                            <h5><?php echo e(__('Holidate')); ?></h5>
                        </li>
                        <li><a href="#"><?php echo e(__('About Us')); ?></a></li>
                        <li><a href="#"><?php echo e(__('Careers')); ?></a></li>
                        <!-- <li><a href="#">Apps</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content width100">
                <div class="row">
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <li>
                            <h5><?php echo e(__('Follow us')); ?></h5>
                        </li>
                    </ul>
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 socaillinks">
                        <li><a target="_blank" href="https://www.facebook.com" class="background395693"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com" class="background0e72a3"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com" class="background1c9cea"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 applinkes">
                        <li><a target="_blank" href="https://www.apple.com/in/ios/app-store/"><img
                                    src="<?php echo e(asset('web_assets/images/app_store.png')); ?>" /></a></li>
                        <li><a target="_blank" href="https://play.google.com/store?hl=en_IN"><img
                                    src="<?php echo e(asset('web_assets/images/google_play.png')); ?>" /></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<section class="copyright_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <p><?php echo e(__('Copyright')); ?> 2020</p>
            </div>
        </div>
    </div>
</section>
</div>
</body>

</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="<?php echo e(asset('web_assets/js/bootstrap.min.js')); ?>"></script>



<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>



<script type="text/javascript">
    function view_model(id) {
        var url = "<?php echo e(url('people/connect/')); ?>" + '/' + id;
        $("#modelurl").attr("href", url);
        $('#connectwithpeople').modal('show');
    }

</script>

<?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/web_layout/footer.blade.php ENDPATH**/ ?>