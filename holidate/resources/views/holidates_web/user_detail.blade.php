@include('web_layout.header')

<?php
/*print_r($id); die;*/
 /*   $id = Session::get('gorgID');*/
    $userdata = DB::table('users')->where('id', $id)->first();
?>
        <article class="profile_section">
            <section class="user_basic_info">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                    <div class="row nomargin">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center basic_info">
                                            <div class="profile_img">
                                                @if($userdata->profile_image!='')
                                                <img src="{{ asset('public/profile_image/') }}/{{ $userdata->profile_image}}"/>
                                                @else
                                                    <img src="{{ asset('public/no-image.jpg')}}"/>
                                                @endif
                                            </div>
                                            <div class="username_section">
                                                <h3>{{ $userdata->name}} {{ $userdata->surname}}</h3>
                                                <p><i class="fa fa-envelope" aria-hidden="true"></i> {{ $userdata->email}}</p>
                                                <p><i class="fa fa-phone" aria-hidden="true"></i> {{ $userdata->phone}}</p>
                                            </div>
                                            <div class="network_section">
                                                <ul>
                                                    <li><a href="#" class="backgroundfacebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" class="backgroundtwitter"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="#" class="backgroundlinkedin"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                    <div class=" nomargin">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                            <ul>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <h5>Location</h5>
                                                    <a href="profile.html">Delhi</a></li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <h5>Holidate member since:</h5>
                                                    <a href="#"><?php echo date("M j, Y", strtotime($userdata->created_at)); ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                            <ul>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <h5>Chat</h5>
                                                    <a href="profile.html">Delhi</a></li>
                                                <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <h5>Holidate member since:</h5>
                                                    <a href="#"><?php echo date("M j, Y", strtotime($userdata->created_at)); ?></a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 profile_description">
                                            <h3>His Post:</h3>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6 width400">
                                <?php $userpost = DB::table('public_data')->where('user_id', $id)->first(); ?>
                                                   
                                                    <div class="row nomargin">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <h5>Heading:</h5>
                                                                    <p>{{ $userpost->heading ?? ''}}</p>
                                                                    <h4>Comment:</h4>
                                                                    <p>{{ $userpost->comment ?? ''}}</p>
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
                        </div>
                    </div>
                </div>
            </section>
        </article>
        <article class="editprofile_detail">
            <section class="editprofile_info">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 allprofile_options">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#general">General</a></li>
                                        <!-- <li><a data-toggle="tab" href="#socialmedia">Social Media</a></li> -->
                                    </ul>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="general" >
                                            <div class="allprofile_detail">
                                                <h3>General Information</h3>
                                                <div class="listofprofile table-responsive">
                                                    <table class="table">
                                                        <!-- <thead>
                                                          <tr>
                                                            <th scope="col">Name:</th>
                                                            <th scope="col">First</th>
                                                          </tr>
                                                        </thead> -->
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Name:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{ $userdata->name}} {{ $userdata->surname }}
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Email Address:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">{{ $userdata->email}}
                                                               
                                                            </td>
                                                          </tr>                                                 <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Location:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">Delhi, India
                                                                
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Hometown:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">Bathinda, India
                                                               </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Language:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">English
                                                                </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Birthday:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                                <a data-toggle="tab" href="">01/07/1992</a>
                                                               </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Gender:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                                <a data-toggle="tab" href="">Female</a>
                                                            </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Intrest:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">Travelling
                                                                </td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-4 col-xs-4">Bio:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-8 col-xs-8">
                                                               
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                      </table>
                                                </div>
                                            </div>      
<!-- 
                                            <div class="allprofile_detail">
                                                <h3>Your Interests</h3>
                                                <p>Add interests so we can recommend the best Holidate for you.</p>
                                                <div class="addinterest">
                                                    <ul>
                                                        <li><a href="#">Arts & Entertainment</a> <span class="add_interest"><a href="#"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Business & Career</a> <span class="add_interest"><a href="#"><i class="fa fa-minus-square-o" aria-hidden="true"></i></a></span></li>
                                                    </ul>
                                                </div>
                                                <h3>Add Interests</h3>
                                                <p>Add interests so we can recommend the best Holidate for you.</p>
                                                <div class="addinterest">
                                                    <ul>
                                                        <li><a href="#">Arts & Entertainment</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Business & Career</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Communities & Lifestyles</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Cultures & Languages</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Internet & Technology</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Politics & Activism</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Social</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Hobbies</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Pets & Animals</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                        <li><a href="#">Sports & Recreation</a> <span class="add_interest"><a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a></span></li>
                                                    </ul>
                                                </div>
                                            </div> -->

                                            
                                        </div>
                                        
                                        <!-- deactivate account -->
                                        <div id="deactivateaccount" class="tab-pane fade allprofile_detail">
                                            <h3>Deactivate Your Account</h3>
                                            <p>Are you sure you want to do this? If you decide to use Holidate again, you’ll need to create a new account.</p>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="password">Enter Password</label>
                                                        <input type="password" id="password" name="password" class="form-control"
                                                            placeholder="Enter Password">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <a class="edit_link" href="../ForgotPassword/forgotpassword.html">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <!-- chamge your name -->
                                        <div id="editname" class="tab-pane fade allprofile_detail">
                                            <h3>Change Your Name</h3>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="name">Enter Name</label>
                                                        <input type="name" id="name" name="name" class="form-control"
                                                            placeholder="Enter Name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- chamge your email -->
                                        <div id="editemail" class="tab-pane fade allprofile_detail">
                                            <h3>Change Your Email</h3>
                                            <p>Current Email Address: <b>demo@gmail.com</b></p>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="newemail">Enter New Email</label>
                                                        <input type="email" id="newemail" name="newemail" class="form-control"
                                                            placeholder="Enter New Email">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="password">Enter Password</label>
                                                        <input type="password" id="password" name="password" class="form-control"
                                                            placeholder="Enter Password">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                    <a class="edit_link" href="../ForgotPassword/forgotpassword.html">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- chamge your password -->
                                        <div id="editpassword" class="tab-pane fade allprofile_detail">
                                            <h3>Change Your Password</h3>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="currentpassword">Your Current Password</label>
                                                        <input type="password" id="currentpassword" name="currentpassword" class="form-control"
                                                            placeholder="Your Current Password">
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-left">
                                                        <a class="edit_link" href="../ForgotPassword/forgotpassword.html">Forgot Password?</a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="newpassword">Enter New Password</label>
                                                        <input type="password" id="newpassword" name="newpassword" class="form-control"
                                                            placeholder="Your New Password">
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="retypepassword">Retype New Password</label>
                                                        <input type="password" id="retypepassword" name="retypepassword" class="form-control"
                                                            placeholder="Retype New Password">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- chamge your location -->
                                        <div id="editlocation" class="tab-pane fade allprofile_detail">
                                            <h3>Change Your Location</h3>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 width100">
                                                        <label for="country">Country</label>
                                                        <select class="form-control" id="country" name="country">
                                                          <option>Select country</option>
                                                          <option>India</option>
                                                          <option>Austria</option>
                                                          <option>Canada</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 width100">
                                                        <label for="city">City</label>
                                                        <select class="form-control" id="city" name="city">
                                                          <option>Select City</option>
                                                          <option>Punjab</option>
                                                          <option>Agra</option>
                                                          <option>Noida</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="hometown">Enter Hometown</label>
                                                        <input type="text" id="hometown" name="hometown" class="form-control"
                                                            placeholder="Enter Hometown">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- chamge your location -->
                                        <div id="editlanguage" class="tab-pane fade allprofile_detail">
                                            <h3>Change Your Location</h3>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <label for="editlanguage">Language</label>
                                                        <select class="form-control" id="editlanguage" name="editlanguage">
                                                          <option>Select Language</option>
                                                          <option>English</option>
                                                          <option>French</option>
                                                          <option>Hindi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- set birthday -->
                                        <div id="setbirthday" class="tab-pane fade allprofile_detail">
                                            <h3>Edit Your Birthday and Gender</h3>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-2 col-md-2 col-sm-3 col-xs-3 width100">
                                                        <label for="month">Month</label>
                                                        <select class="form-control" id="month" name="month">
                                                          <option>Month</option>
                                                          <option>1</option>
                                                          <option>2</option>
                                                          <option>3</option>
                                                          <option>4</option>
                                                          <option>5</option>
                                                          <option>6</option>
                                                          <option>7</option>
                                                          <option>8</option>
                                                          <option>9</option>
                                                          <option>10</option>
                                                          <option>11</option>
                                                          <option>12</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-2 col-md-2 col-sm-3 col-xs-3 width100">
                                                        <label for="day">Day</label>
                                                        <select class="form-control" id="day" name="day">
                                                          <option>Day</option>
                                                          <option>1</option>
                                                          <option>2</option>
                                                          <option>3</option>
                                                          <option>4</option>
                                                          <option>5</option>
                                                          <option>6</option>
                                                          <option>7</option>
                                                          <option>8</option>
                                                          <option>9</option>
                                                          <option>10</option>
                                                          <option>11</option>
                                                          <option>12</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-2 col-md-2 col-sm-3 col-xs-3 width100">
                                                        <label for="year">Year</label>
                                                        <select class="form-control" id="year" name="year">
                                                          <option>Year</option>
                                                          <option>1993</option>
                                                          <option>1994</option>
                                                          <option>1994</option>
                                                          <option>1995</option>
                                                          <option>1996</option>
                                                          <option>1997</option>
                                                          <option>1998</option>
                                                          <option>1999</option>
                                                          <option>2000</option>
                                                          <option>2001</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-lg-6 col-md-6 col-sm-3 col-xs-3 width100">
                                                        <label for="gender">Gender</label>
                                                        <select class="form-control" id="gender" name="gender">
                                                          <option>Gender</option>
                                                          <option>Male</option>
                                                          <option>Female</option>
                                                          <option>Others</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- set bio -->
                                        <div id="addbio" class="tab-pane fade allprofile_detail">
                                            <h3>Change Your Name</h3>
                                            <form class="register_form register_form2" action="#" method="post">
                                                <div class="row">
                                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="bio">Enter Bio</label>
                                                        <textarea type="name" id="bio" name="bio" class="form-control"
                                                            placeholder="Enter Bio" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                        <button class="btn"><a href="profile.html">Submit</a></button>
                                                        <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div id="socialmedia" class="tab-pane fade allprofile_detail">
                                                <h3>Change Your Name</h3>
                                                <!-- <div class="listofprofile table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                          <tr>
                                                            <th scope="row" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">Name:</th>
                                                            <td class="col-lg-9 col-md-9 col-sm-9 col-xs-9">Priyanka Garg 
                                                                <a data-toggle="tab" href="#editname">edit</a>
                                                            </td>
                                                          </tr>
                                                        </tbody>
                                                    </table>
                                                </div> -->
                                                <form class="register_form2" action="#" method="post">
                                                    <div class="row">
                                                        <div class="form-check col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label show" for="defaultCheck1">
                                                                Facebook
                                                            </label>
                                                          </div>
                                                          <div class="form-check col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label show" for="defaultCheck1">
                                                                Linkedin
                                                            </label>
                                                          </div>
                                                          <div class="form-check col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label show" for="defaultCheck1">
                                                                Twitter
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="row register_form">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                            <button class="btn"><a href="profile.html">Submit</a></button>
                                                            <a class="cancel_link" data-toggle="tab" href="#general">Cancel</a>
                                                        </div>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
@include('web_layout.footer')