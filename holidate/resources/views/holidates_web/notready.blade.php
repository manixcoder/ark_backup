@include('web_layout.header')

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
@include('web_layout.footer')
