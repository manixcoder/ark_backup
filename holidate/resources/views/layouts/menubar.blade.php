<?php 
   $sessionId =  Session::get('gorgID');   
   $users = DB::table('users')->where('id', $sessionId)->first();   
?>
<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
   <div class="sidebar-inner slimscrollleft">
      <div class="user-details">
      </div>
      <!--- Divider -->
      <div id="sidebar-menu">
         <ul>
            <li><a href="{{ URL::to('dashboard')}}" class="waves-effect"><i class="fa fa-home" style="color:red"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span></a>
            </li>
         </ul>
          <ul>
            <li><a href="{{ URL::to('users')}}" class="waves-effect"><i class="fa fa-users" style="color:blue"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Users</span></a>
            </li>
         </ul>
         <ul>
            <li><a href="{{ URL::to('blog')}}" class="waves-effect"><i class="fa fa-newspaper" style="color:blue"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Blogs</span></a>
            </li>
         </ul>
          
         <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
   </div>
</div>
<div class="content-page">