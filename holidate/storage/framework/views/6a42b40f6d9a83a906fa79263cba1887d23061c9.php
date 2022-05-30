<?php 
   // $sessionId =  Session::get('gorgID');
   // $users = DB::table('users')->where('id', $sessionId)->first();
?>

<link href="<?php echo e(asset('admin/web_assets/css/home.css')); ?>" rel="stylesheet" type="text/css" />
<!-- Start content -->
<div class="content">
   <div class="container-fluid">
      <div class="">
         <div class="">
            <!-- Page-Title -->
            <div class="row">
               <div class="col-sm-12">
                  <h3 class="pull-left page-title">Welcome, <?php echo e($users->name ?? ''); ?>.!</h3>
                  <ol class="breadcrumb pull-right">
                     <li><a href="#">Admin</a></li>
                     <li class="active">Dashboard</li>
                  </ol>
               </div>
            </div>
            <div class="row">
               
               <!-- White Labels  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($whitelabel ?? ''); ?></span>
                           Total White Labels
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">White Labels<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <!-- Managers  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($manager ?? ''); ?></span>
                           Total Managers
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Managers<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div> 
               
               <!-- Employees  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($employee ?? ''); ?></span>
                           Total Employees
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Employees<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <!-- Clients  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($client ?? ''); ?></span>
                           Total Clients
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Clients<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <!-- Leads  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($lead ?? ''); ?></span>
                           Total Leads
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Leads<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <!-- Transictions  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($transaction ?? ''); ?></span>
                           Total Transaction
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Transaction<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div> 
               <!-- Products  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($product ?? ''); ?></span>
                           Total Product
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Product<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div> 
               <!-- Model  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($usredata ?? ''); ?></span>
                           Total Model
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Model<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>
               <!-- Brands  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($usredata ?? ''); ?></span>
                           Total Brand
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Brand<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div> 
               <!-- Agenda  -->
               <div class="col-md-3 col-xl-3">
                  <a href="">
                     <div class="mini-stat clearfix bg-primary bx-shadow">
                        <span class="mini-stat-icon"><i class="fa fa-users"></i></span>
                        <div class="mini-stat-info text-right">
                           <span class="counter"><?php echo e($usredata ?? ''); ?></span>
                           Total Agenda
                        </div>
                        <div class="tiles-progress">
                           <div class="m-t-20">
                              <h5 class="text-uppercase text-white m-0">Agenda<span class="pull-right">View</span></h5>
                           </div>
                        </div>
                     </div>
                  </a>
               </div>

            </div>
         </div>
      </div>
   </div>
</div><?php /**PATH D:\xampp\htdocs\222holidate\resources\views/admin/admin/home.blade.php ENDPATH**/ ?>