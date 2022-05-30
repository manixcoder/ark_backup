<?php echo $__env->make('admin.web_layouts.innerheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- dashboard-section-start-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<section class="dashboard_main">
   <div class="container container1">
      <!-- let container-fluid for max-width designs -->
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row nomargin">
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="myID">
                  <div class="row">
                     <form class="form_outer mdt0 search_dashboard col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                           <div class="form-group searchicon col-lg-10 col-md-10 col-sm-10 col-xs-10 dashboard_search_bar">
                              <input type="text" class="form-control" id="search" placeholder="Search for brand, model, artist..." name="search"/>
                           </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 dashboard_filter">
                              <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
                                    <div class="filter_img">
                                       <a href="#" data-toggle="modal" data-target="#myModal3">
                                       <img src="<?php echo e(asset('admin/web_assets/images/filter.png')); ?>"/>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                        <div class="card">
                           <div class="card-body">
                              <div class="table-responsive table-responsive1">
                                 <table class="table table1 setresponsive cursor" id="myTable">
                                    <thead>
                                       <tr>
                                          <th>Brand</th>
                                          <th>ID N0.</th>
                                          <th>Model</th>
                                          <th>Year</th>
                                          <th>Features</th>
                                          <th>PCT(%)</th>
                                          <th>Price</th>
                                          <th class="text-right">
                                             <button  class="increase">
                                             <img id="expand_img" onclick="myFunction()"  src="<?php echo e(asset('admin/web_assets/images/extend.png')); ?>" width="25px"/>
                                             <img id="expand_img2" onclick="myFunctionblock()" style="display:none;" src="<?php echo e(asset('admin/web_assets/images/collapse.png')); ?>" width="25px"/>
                                             </button>
                                          </th>
                                       </tr>
                                    </thead>
                                    <?php /*
                                       $product = DB::table('product')->where('status', 0)->get();
                                       */
                                    ?>
                                    <tbody>
                                    	
                                    	<?php /*
                                    		$model = DB::table('category')->where('id', $data->model_id)->first(); 
                                    		$brand = DB::table('brand')->where('id', $data->brand_id)->first();
                                    		$features = explode(",", $data->features); 
                                    	*/ ?>
                                       	
                                       
                                    </tbody>
                                 </table>

	
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="fullwidthsection">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card"  id="myID1">
                        <div class="card">
                           <div class="card-body">
                              <div class="table-responsive table-responsive2  table-container" id="fullheight1">
                                 <table class="table cursor">
                                    <thead>
                                       <tr>
                                          <th colspan="3">In Safe</th>
                                          <th class="text-right">
                                             <button  class="increase">
                                             <img id="expand_img5" onclick="myFunction1()"  src="<?php echo e(asset('admin/web_assets/images/extend.png')); ?>" width="25px"/>
                                             <img id="expand_img6" onclick="myFunctionblock1()" style="display:none;" src="<?php echo e(asset('admin/web_assets/images/collapse.png')); ?>" width="25px"/>
                                             </button>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal2">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal2">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal2">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal2">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                       <tr data-toggle="modal" data-id="1" data-target="#myModal1">
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right"><button class="btn buy_btn">Sell</button></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card"  id="myID3">
                        <div class="card">
                           <div class="card-body">
                              <div class="table-responsive table-responsive2"  id="fullheight">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th colspan="3">Market place</th>
                                          <th class="text-right">
                                             <button  class="increase">
                                             <img id="expand_img7" onclick="myFunction3()"  src="<?php echo e(asset('admin/web_assets/images/extend.png')); ?>" width="25px"/>
                                             <img id="expand_img8" onclick="myFunctionblock3()" style="display:none;" src="<?php echo e(asset('admin/web_assets/images/collapse.png')); ?>" width="25px"/>
                                             </button>
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right">
                                             <button class="btn buy_btn"  data-toggle="modal" data-id="1" data-target="#myModal4">Offer</button>
                                             <a class="cancel">Cancel</a>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right">
                                             <button class="btn buy_btn"  data-toggle="modal" data-id="1" data-target="#myModal4">Offer</button>
                                             <a class="cancel">Cancel</a>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right">
                                             <button class="btn buy_btn"  data-toggle="modal" data-id="1" data-target="#myModal4">Offer</button>
                                             <a class="cancel">Cancel</a>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td><a href="#"><img src="<?php echo e(asset('admin/web_assets/images/Omega.png')); ?>"/ 
                                             width="30px"></a></td>
                                          <td colspan="2">
                                             <p>#0000205</p>
                                             <span>GMT-Master ice</span>
                                             <p>#0000205</p>
                                          </td>
                                          <td class="text-right">
                                             <button class="btn buy_btn"  data-toggle="modal" data-id="1" data-target="#myModal4">Offer</button>
                                             <a class="cancel">Cancel</a>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" id="myID2">
                  <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card fullwidthtable">
                        <div class="card">
                           <div class="card-body">
                              <div class="table-responsive" style="height: auto;">
                                 <table class="table">
                                    <thead class="fullwidth">
                                       <tr>
                                          <th colspan="3">Transactions</th>
                                          <th class="text-right">
                                             <button  class="increase">
                                             <img id="expand_img3" onclick="myFunction2()"  src="<?php echo e(asset('admin/web_assets/images/extend.png')); ?>" width="25px"/>
                                             <img id="expand_img4" onclick="myFunctionblock2()" style="display:none;" src="<?php echo e(asset('admin/web_assets/images/collapse.png')); ?>" width="25px"/>
                                             </button>
                                          </th>
                                       </tr>
                                    </thead>
                                 </table>
                                 <section id="tabs" class="project-tab">
                                    <div class="col-md-12 nopadding">
                                       <nav>
                                          <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                             <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Money</a>
                                             <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Watch</a>
                                          </div>
                                       </nav>
                                       <div class="tab-content" id="nav-tabContent">
                                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                             <div class="table-responsive table-responsive3">
                                                <table class="table" cellspacing="0">
                                                   <tbody>
                                                      <tr>
                                                         <td colspan="2">
                                                            <span>
                                                               <p>Txn. ID : <b>#09090921</b></p>
                                                               <p>Buy/Omega/planetocean/watchmarketwallet</p>
                                                            </span>
                                                         </td>
                                                         <td>
                                                            <p class="negative">- $ 35,000.00</p>
                                                            <span>22 Jul, 20</span>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td colspan="2">
                                                            <span>
                                                               <p>Txn. ID : <b>#09090921</b></p>
                                                               <p>Buy/Omega/planetocean/watchmarketwallet</p>
                                                            </span>
                                                         </td>
                                                         <td>
                                                            <p class="positive">+ $ 35,000.00</p>
                                                            <span>22 Jul, 20</span>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td colspan="2">
                                                            <span>
                                                               <p>Txn. ID : <b>#09090921</b></p>
                                                               <p>Buy/Omega/planetocean/watchmarketwallet</p>
                                                            </span>
                                                         </td>
                                                         <td>
                                                            <p class="negative">- $ 35,000.00</p>
                                                            <span>22 Jul, 20</span>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                             <div class="table-responsive table-responsive3">
                                                <table class="table" cellspacing="0">
                                                   <tbody>
                                                      <tr>
                                                         <td colspan="2">
                                                            <span>
                                                               <p>Txn. ID : <b>#09090921</b></p>
                                                               <p>Buy/Omega/planetocean/watchmarketwallet</p>
                                                            </span>
                                                         </td>
                                                         <td>
                                                            <p class="negative">- $ 35,000.00</p>
                                                            <span>22 Jul, 20</span>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td colspan="2">
                                                            <span>
                                                               <p>Txn. ID : <b>#09090921</b></p>
                                                               <p>Buy/Omega/planetocean/watchmarketwallet</p>
                                                            </span>
                                                         </td>
                                                         <td>
                                                            <p class="positive">+ $ 35,000.00</p>
                                                            <span>22 Jul, 20</span>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td colspan="2">
                                                            <span>
                                                               <p>Txn. ID : <b>#09090921</b></p>
                                                               <p>Buy/Omega/planetocean/watchmarketwallet</p>
                                                            </span>
                                                         </td>
                                                         <td>
                                                            <p class="negative">- $ 35,000.00</p>
                                                            <span>22 Jul, 20</span>
                                                         </td>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </section>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 grid-margin stretch-card">
                        <div class="card">
                           <?php
                              $userdetail = DB::table('users')->where('id', Session::get('gorgID'))->first();
                            ?>
                           <div class="card-body">
                              <div class="table-responsive table-responsive4">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th colspan="4">Account Manager</th>
                                       </tr>
                                    </thead>
                                    <tbody class="user_detail">
                                       <tr style="border-bottom:0px">
                                          <td colspan="1">
                                             <img src="<?php echo e(asset('public/profile_image')); ?>/<?php echo e($userdetail->profile_image); ?>" width="80px">
                                          </td>
                                          <td colspan="2">
                                             <ul>
                                                <li><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo e($userdetail->name); ?></li>
                                                <li><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo e($userdetail->email); ?></li>
                                                <li><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e($userdetail->phone); ?></li>
                                             </ul>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

	<script>
      $(document).ready(function(){
        $("#search").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
   </script>

<!-- dashboard-section-end-->
<?php echo $__env->make('admin.web_layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- code for expand and collase section on full width start -->
<style>
   .firstDiv,
   .firstDiv1,
   .firstDiv2,
   .firstDiv3,
   .firstDiv2 .fullwidthtable
   {
   width: 100% !important;
   max-width: 100% !important;
   flex: none !important;
   display: inline-block;
   position: absolute;
   left: 0;
   right: 0;
   top: 0;
   z-index: 99;
   background-color: #ffffff;
   height:100%;
   }
   .firstDiv .stretch-card .table thead,
   .firstDiv1 .stretch-card .table thead,
   .firstDiv2 .stretch-card .table thead,
   .firstDiv3 .stretch-card .table thead
   {
   width: 100% !important;
   }
   .firstDiv .stretch-card .table tbody,
   .firstDiv1 .stretch-card .table tbody,
   .firstDiv2 .stretch-card .table tbody,
   .firstDiv3 .stretch-card .table tbody
   {
   width: 100% !important;
   }
</style>
<script type="text/javascript">
   function myFunction() {
    var element = document.getElementById("myID");
    element.classList.toggle("firstDiv");
    document.getElementById("myID1").style.display="none";
    document.getElementById("myID2").style.display="none";
    document.getElementById("myID3").style.display="none";
    document.getElementById("expand_img").style.display="none";
    document.getElementById("expand_img2").style.display="block";
   }
   function myFunctionblock() {
   var element = document.getElementById("myID");
    element.classList.toggle("firstDiv");
    document.getElementById("myID1").style.display="block";
    document.getElementById("myID2").style.display="block";
    document.getElementById("myID3").style.display="block";
    document.getElementById("expand_img").style.display="block";
    document.getElementById("expand_img2").style.display="none";
   }
   function myFunction1() {
    var element = document.getElementById("myID1");
    element.classList.toggle("firstDiv1");
    document.getElementById("fullwidthsection").style.cssText = "width: 100% !important; max-width: 100% !important;flex: none !important;display: inline-block;position: absolute;left: 0;right: 0;top: 0;z-index: 99;background-color: #ffffff;height:100%;";
    document.getElementById("myID").style.display="none";
    document.getElementById("myID2").style.display="none";
    document.getElementById("myID3").style.display="none";
    document.getElementById("fullheight1").style.cssText = "height:600px !important;";
    document.getElementById("expand_img5").style.display="none";
    document.getElementById("expand_img6").style.display="block";
    document.getElementById("expand_img7").style.display="none";
    document.getElementById("expand_img8").style.display="none";
   }
   function myFunctionblock1() {
    var element = document.getElementById("myID1");
    element.classList.toggle("firstDiv1");
    document.getElementById("fullwidthsection").style.cssText = "width: auto !important; max-width: auto !important;flex: auto !important;display: inline-block;position: relative;left: 0;right: 0;top: 0;z-index: 99;background-color: #ffffff;height:auto;";
    document.getElementById("myID").style.display="block";
    document.getElementById("myID2").style.display="block";
    document.getElementById("myID3").style.display="block";
    document.getElementById("fullheight1").style.cssText = "height:342px !important;";
    document.getElementById("expand_img5").style.display="block";
    document.getElementById("expand_img6").style.display="none";
    document.getElementById("expand_img7").style.display="block";
    document.getElementById("expand_img8").style.display="none";
   }
   function myFunction2() {
    var element = document.getElementById("myID2");
    element.classList.toggle("firstDiv2");
    document.getElementById("myID1").style.display="none";
    document.getElementById("myID").style.display="none";
    document.getElementById("myID3").style.display="none";
    document.getElementById("expand_img3").style.display="none";
    document.getElementById("expand_img4").style.display="block";
   }
   function myFunctionblock2() {
    var element = document.getElementById("myID2");
    element.classList.toggle("firstDiv2");
    document.getElementById("myID1").style.display="block";
    document.getElementById("myID").style.display="block";
    document.getElementById("myID3").style.display="block";
    document.getElementById("expand_img3").style.display="block";
    document.getElementById("expand_img4").style.display="none";
   }
   function myFunction3() {
    var element = document.getElementById("myID3");
    element.classList.toggle("firstDiv3","marketwidth");
     document.getElementById("fullwidthsection").style.cssText = "width: 100% !important; max-width: 100% !important;flex: none !important;display: inline-block;display: inline-block;position: absolute;left: 0;right: 0;top: 0;z-index: 99;background-color: #ffffff;height:100%;";
     document.getElementById("fullheight").style.cssText = "height:600px !important;";
    document.getElementById("myID1").style.display="none";
    document.getElementById("myID2").style.display="none";
    document.getElementById("myID").style.display="none";
    document.getElementById("expand_img5").style.display="none";
    document.getElementById("expand_img6").style.display="none";
    document.getElementById("expand_img7").style.display="none";
    document.getElementById("expand_img8").style.display="block";
   }
   function myFunctionblock3() {
    var element = document.getElementById("myID3");
    element.classList.toggle("firstDiv3");
    document.getElementById("fullwidthsection").style.cssText = "width: auto !important; max-width: auto !important;flex: auto !important;display: inline-block;position: relative;left: 0;right: 0;top: 0;z-index: 99;background-color: #ffffff;height:auto;";
    document.getElementById("myID1").style.display="block";
    document.getElementById("myID2").style.display="block";
    document.getElementById("myID").style.display="block";
    document.getElementById("fullheight").style.cssText = "height:342px !important;";
    document.getElementById("expand_img5").style.display="block";
    document.getElementById("expand_img6").style.display="none";
    document.getElementById("expand_img7").style.display="block";
    document.getElementById("expand_img8").style.display="none";
   }
</script>
<!-- code for expand and collase section on full width end -->
<?php /**PATH D:\xampp\htdocs\222holidate\resources\views/admin/web/dashboard/dashboard.blade.php ENDPATH**/ ?>