<section class="banner_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner_content">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="row">
                            <div
                                class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offet-0 col-xs-offset-0 nopadding">
                                <h3><?php echo e(__('Optimize your time in your place of temporary stay')); ?></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner_form">
                        <div class="row">
                            <form
                                class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offet-0 col-xs-offset-0"
                                method="POST" action="<?php echo e(route('home.search')); ?>" novalidate="novalidate">
                                <div class="row">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-4 col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-offset-1 nopadding">
                                        <p class="location_img">
                                            <img src="<?php echo e(asset('web_assets/images/location1.png')); ?>"/>
                                        </p>
                                        <input type="text" name="mycity" class="form-control" style="padding-left:40px;" placeholder="<?php echo e(__('Enter a location')); ?>" id="cityBox" required>
                                        
                                    </div>
                                    <div class="form-group col-lg-8 col-md-8 col-sm-6 col-xs-6 nopadding">
                                        <input onkeyup="ableOrNot()" type="text" name="search" id="searchBox2" class="form-control" placeholder="<?php echo e(__('Type here to search')); ?>" required="" autocomplete="" runat="server">
                                        <input type="text" name="lat" id="lat" hidden>
                                        <input type="text" name="lng" id="lng" hidden>
                                        <button class="btn disabled" id="search"><?php echo e(__('Search')); ?></button>
                                    </div>
                                    
                                    <script>
                                        function ableOrNot(){
                                            var searchBox = document.getElementById('searchBox2');
                                            var btn = document.getElementById('search');
                                            btn.classList.add('disabled');
                                            if(searchBox.value.length == 0){
                                                btn.classList.add('disabled');
                                            } else{
                                                btn.classList.remove('disabled');
                                            }
                                        }
                                    </script>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-end -->
<!-- feature-section-start -->



<style scoped>
    .thisactive{
        
    }
    .linkme{
        color: #707070;
        background-color: #ffffff;
        border: 1px solid #C2A12A;
        font-size: 14px;
        padding: 7px 16px;
        display: inline-block;
        text-align: center;
        overflow-wrap: normal;
        width: 180px !important;
        border-radius: 5px;
        margin: 20px 20px;
    }
    .linkme:hover{
        color: #FDCE22;
        background-color: #000000;
        border: 1px solid #000000;
        font-size: 14px;
        padding: 7px 20px;
        border-radius: 5px;
        text-decoration: none;
    }
    .myscrollme{
        white-space: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
    }
    .myscrollme::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(229, 226, 226, 0.3);
    }

    .myscrollme::-webkit-scrollbar-thumb {
        background-color: darkgrey;
        outline: 1px solid slategrey;
    }
</style>
<div class="" style="background: #e1e1e1;">
    <div class="container">
        <div class="row">
            <ul style="display: flex;">
                <div style="">
                    <a href="/holidates/home" class="linkme" <?php if(Request::path() == 'home' or Request::path() == 'all_people'): ?> style="color: #FDCE22;
                    background-color: #000000;
                    border: 1px solid #000000;
                    font-size: 14px;
                    padding: 7px 20px;
                    border-radius: 5px;
                    text-decoration: none;" <?php endif; ?>><?php echo e(__('All')); ?></a>
                </div>
                <div class="myscrollme" id="bannerCategory">
                    <?php $category = DB::table('categories')->orderBy('id', 'desc')->get(); ?>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route('category.show', $item->id)); ?>#bannerCategory" class="linkme " <?php if(Request::path() == 'category/'.$item->id): ?> style="color: #FDCE22;
                        background-color: #000000;
                        border: 1px solid #000000;
                        font-size: 14px;
                        padding: 7px 20px;
                        border-radius: 5px;
                        text-decoration: none;" <?php endif; ?>><?php echo e(__($item->category_name)); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </ul>
        </div>
    </div>
</div>


<script>
    (function () {
        function scrollHorizontally(e) {
            e = window.event || e;
            var delta = Math.max(-1, Math.min(1, (e.wheelDelta || -e.detail)));
            document.getElementById('bannerCategory').scrollLeft -= (delta * 40); // Multiplied by 40
            e.preventDefault();
        }
        if (document.getElementById('bannerCategory').addEventListener) {
            // IE9, Chrome, Safari, Opera
            document.getElementById('bannerCategory').addEventListener('mousewheel', scrollHorizontally, false);
            // Firefox
            document.getElementById('bannerCategory').addEventListener('DOMMouseScroll', scrollHorizontally, false);
        } else {
            // IE 6/7/8
            document.getElementById('bannerCategory').attachEvent('onmousewheel', scrollHorizontally);
        }
    })();
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#cityBox").keyup(function(){
        add = $("#cityBox").val();
            $.get("https://maps.googleapis.com/maps/api/geocode/json?address="+add+",+CA&key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA", function(data, status){
            // console.log(data);
            $("#lat").val(data.results[0].geometry.location.lat);
            $("#lng").val(data.results[0].geometry.location.lng);
            });
        });
    });
</script>

<style>
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4t5WaIQjdbhrnzMm56d5iV37cUcBVQKA&libraries=places"></script>
    <script>
        function initialize() {
          var input = document.getElementById('cityBox');
          var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                // document.getElementById('city2').value = place.name;
                document.getElementById('lat').value = place.geometry.location.lat();
                document.getElementById('lng').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
<?php /**PATH D:\Web\htdocs\222holidates_new\resources\views/holidates_web/inc/header_search.blade.php ENDPATH**/ ?>