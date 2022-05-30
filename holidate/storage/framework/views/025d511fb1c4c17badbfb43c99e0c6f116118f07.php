<?php echo $__env->make('web_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $id = Session::get('gorgID');
   /* print_r($id); die;*/
    $userdata = DB::table('users')->where('id', $id)->first();
 ?>
<article class="profile_section">
    <section class="user_basic_info">
        <div class="container">
            <div class="row" style="margin: 40px 0;">
                <h2>Sorry this page is not ready yet!</h2>
            </div>
        </div>
    </section>
</article>
<?php echo $__env->make('web_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/holidate/holidate_web/resources/views/holidates_web/notready.blade.php ENDPATH**/ ?>