<!doctype html>
<html>
<head>
    <title>Index || Holidate</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('web_assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href="{{ asset('web_assets/css/style.css') }}" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/png" href="{{ asset('web_assets/images/logo.png') }}"/>
    {{-- sfdk --}}
</head>
<body>
<div class="main_home_page">
        <!-- header-start -->
    <header class="header_Section">
        <!-- navigation-section-start -->
        <div class="navigation-section">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header left-nav">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    <a class="navbar-brand logo" href="index.html"><img src="{{ asset('web_assets/images/logo.png')}}" class="img-responsive"/></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse main-nav" id="navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right sub-nav"> 
                            <li><a class="rghtborder" href="startnewgroup/startnewgroup.html">Start a new group</a></li>
                            <li><a href="Login/login.html">Login</a></li>
                            <li><a href="Signup/signup.html">Sign up</a></li> 
                            <!-- <li><a href="profile/profile.html"  class="user"><i class="fa fa-user" aria-hidden="true"></i></a></li>  -->
                            <li>
                                <div class="btn-group filter-button">
                                    <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"><i class="fa fa-user" aria-hidden="true"></i></button>
                                    <!-- <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle"></button> -->
                                    <ul class="dropdown-menu">
                                        <li><a href="profile/profile.html">View Profile</a></li>
                                        <!-- <li><a href="profile/editprofile.html">Edit Profile</a></li> -->
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
        <!-- header-end -->
        <!-- banner-start -->
        <section class="banner_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner_content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offet-0 col-xs-offset-0 nopadding">
                                        <h3>Optimize your time in your place of temporary stay</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner_form">
                                <div class="row">
                                    <form class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offet-0 col-xs-offset-0">
                                        <div class="row">
                                            <div class="form-group col-lg-4 col-md-4 col-sm-6 col-xs-4 col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-offset-1 nopadding">
                                                <p class="location_img"><img src="{{ asset('web_assets/images/location1.png')}}"/></p>
                                                <select class="form-control">
                                                  <option>Location Name</option>
                                                  <option>2</option>
                                                  <option>3</option>
                                                  <option>4</option>
                                                  <option>5</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-8 col-md-8 col-sm-6 col-xs-6 nopadding">
                                                <input type="search" class="form-control" placeholder="Type here to search">
                                                <button class="btn">Search</button>
                                            </div>
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
        <section class="features_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offet-0 col-xs-offset-0">
                                <ul>
                                    <li>
                                        <a href="#">Join a movement</a>
                                    </li>
                                    <li>
                                        <a href="#">Hike a mountain</a>
                                    </li>
                                    <li>
                                        <a href="#">Photography</a>
                                    </li>
                                    <li>
                                        <a href="#">Weekend groups</a>
                                    </li>
                                    <li>
                                        <a href="#">Practice a language</a>
                                    </li>
                                </ul>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </section>
        <!-- feature-section-end -->
        <!-- Events-section-start -->
        <section class="event_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row main_heading">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                <h4>Events near you</h4>
                                <p>See what’s happening soon where you are stayed</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                                <a href="Events/allevents.html">See all</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                        <h5>FRI, MAY 15, 4:00 PM</h5>
                                        <h3>Rock Singing Concert</h3>
                                        <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                        <p class="location"><img src="{{ asset('web_assets/images/place.png')}}"/><b>Location Name</b></p>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">
                                                <p><img src="{{ asset('web_assets/images/user.png')}}"/> <b>10 people attending</b></p>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">
                                                <button class="btn btn-block" ><a href="Events/selectedevent.html">Attend</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                        <h5>FRI, MAY 15, 4:00 PM</h5>
                                        <h3>Job interview</h3>
                                        <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                        <p class="location"><img src="{{ asset('web_assets/images/place.png')}}"/><b>Location Name</b></p>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">
                                                <p><img src="{{ asset('web_assets/images/user.png')}}"/> <b>10 people attending</b></p>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">
                                                <button class="btn btn-block"><a href="Events/selectedevent.html">Attend</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 width100">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 event_content">
                                        <h5>FRI, MAY 15, 4:00 PM</h5>
                                        <h3>Photography competition</h3>
                                        <p>Lorem ipsum dolor sit amet, ipsum dolor si…</p>
                                        <p class="location"><img src="{{ asset('web_assets/images/place.png')}}"/><b>Location Name</b></p>
                                        <div class="row">
                                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-8 people_count">
                                                <p><img src="{{ asset('web_assets/images/user.png')}}"/> <b>10 people attending</b></p>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-4 border_button">
                                                <button class="btn btn-block"><a href="Events/selectedevent.html">Attend</a></button>
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
        <!-- Events-section-end -->
        <!-- group-section-start -->
        <section class="group_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row main_heading">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                <h4>Groups near you</h4>
                                <p>Find groups that get together to do the things they love.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                                <a href="groups/allgroups.html">See all</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content">
                                        <div class="row">
                                            <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                                <img src="{{ asset('web_assets/images/group1.png')}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <h5>TECH</h5>
                                                <h4>Hiking</h4>
                                                <p>Location</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 people_count">
                                                <p><img src="{{ asset('web_assets/images/user1.png')}}"/> <b>100</b></p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 border_button">
                                                <button class="btn btn-block"><a href="groups/selectedgroup.html">Join</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content">
                                        <div class="row">
                                            <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                                <img src="{{ asset('web_assets/images/group2.png')}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <h5>TECH</h5>
                                                <h4>Weekend Fun</h4>
                                                <p>Location</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 people_count">
                                                <p><img src="{{ asset('web_assets/images/user1.png')}}"/> <b>100</b></p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 border_button">
                                                <button class="btn btn-block"><a href="groups/selectedgroup.html">Join</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content">
                                        <div class="row">
                                            <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                                <img src="{{ asset('web_assets/images/group3.png')}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <h5>TECH</h5>
                                                <h4>Cyclings</h4>
                                                <p>Location</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 people_count">
                                                <p><img src="{{ asset('web_assets/images/user1.png"')}}/> <b>100</b></p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 border_button">
                                                <button class="btn btn-block"><a href="groups/selectedgroup.html">Join</a></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 group_content">
                                        <div class="row">
                                            <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                                <img src="{{ asset('web_assets/images/group4.png')}}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <h5>TECH</h5>
                                                <h4>Code Lovers</h4>
                                                <p>Location</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7 people_count">
                                                <p><img src="{{ asset('web_assets/images/user1.png')}}"/> <b>100</b></p>
                                            </div>
                                            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5 border_button">
                                                <button class="btn btn-block"><a href="groups/selectedgroup.html">Join</a></button>
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
        <!-- group-section-end -->
        <!-- people-section-start -->
        <section class="people_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row main_heading">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                <h4>People near you</h4>
                                <p>Find people they share same interest as you.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                                <a href="people/allpeople.html">See all</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                        <div class="people_img">
                                            <img src="{{ asset('web_assets/images/people1.png')}}"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                            <h4>John Doe</h4>
                                            <h5>Photographer</h5>
                                            <p>Location name</p>
                                            <button class="btn btn-block" onclick="myFunction();"><a class="people_conection">Connect</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                        <div class="people_img">
                                            <img src="{{ asset('web_assets/images/people2.png')}}"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                            <h4>John Doe</h4>
                                            <h5>Guitarist</h5>
                                            <p>Location name</p>
                                            <button class="btn btn-block" onclick="myFunction();"><a class="people_conection">Connect</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                        <div class="people_img">
                                            <img src="{{ asset('web_assets/images/people1.png')}}"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                            <h4>John Doe</h4>
                                            <h5>Photographer</h5>
                                            <p>Location name</p>
                                            <button class="btn btn-block"><a href="#">Connect</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 width400">
                                <div class="row nomargin">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_content nopadding">
                                        <div class="people_img">
                                            <img src="{{ asset('web_assets/images/people2.png')}}"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 people_info">
                                            <h4>John Doe</h4>
                                            <h5>Guitarist</h5>
                                            <p>Location name</p>
                                            <button class="btn btn-block"><a href="#">Connect</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- people-section-end -->
        <!-- categories-section-start -->
        <section class="categories_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row main_heading">
                            <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8">
                                <h4>Categories</h4>
                                <p>Browse groups by topics you’re interested in.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-4 text-right">
                                <!-- <a href="#">See all</a> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category1.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Outdoors & Adventure</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category2.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Nightlife</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category3.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Food & Drink</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category4.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Sports & Fitness</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category5.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Music</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category6.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Movements</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category7.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Film</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category8.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Video Games</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category9.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>LGBTQ</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category10.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Arts</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category11.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Social</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 category_section width400">
                                <div class="row nomargin">
                                    <a href="categories/categories.html">
                                        <div class="img_section col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <img src="{{ asset('web_assets/images/category12.png')}}" width="100%"/>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                            <p>Career & Business</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- categories-section-end -->
        <!-- holidate_work-section-start -->
        <section class="holidatework_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center holidate_heading">
                       <h2>How Holidate Works</h2> 
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 holidate_content">
                                <div class="row nomargin">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <h3>Discover people</h3>
                                        <p>See who’s hosting local events for all the things you love.</p>
                                        <a href="Signup/signup.html">Join Holidate <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 holidate_content">
                                <div class="row nomargin">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                        <h3>Join an event</h3>
                                        <p>See who’s hosting local events for all the things you love.</p>
                                        <a href="Events/allevents.html">Get Started <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- holidate_work-section-end -->
        <!-- app-section-start -->
        <section class="app_section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 app_img">
                                <img src="{{ asset('web_assets/images/app_img.png')}}" width="100%"/>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 app_right_content width100">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <h3>Download the App</h3>
                                        <p>Lorem ipsum door sit amet</p>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <ul>
                                            <li><a href="#"><img src="{{ asset('web_assets/images/app_store.png')}}"/></a></li>
                                            <li><a href="#"><img src="{{ asset('web_assets/images/google_play.png')}}"/></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <!-- app-section-end -->
         <!-- footer-section-start -->
         <footer class="footer_section">
             <div class="container-fluid">
                 <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content width100">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <img src="{{ asset('web_assets/images/logo.png')}}"/>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content">
                        <div class="row">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <li><h5>Discover</h5></li>
                                <li><a href="groups/allgroups.html">Groups</a></li>
                                <li><a href="people/allpeople.html">People</a></li>
                                <li><a href="Events/allevents.html">Events</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content">
                        <div class="row">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <li><h5>Holidate</h5></li>
                                <li><a href="aboutus/aboutus.html">About Us</a></li>
                                <li><a href="career/career.html">Careers</a></li>
                                <!-- <li><a href="#">Apps</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer_content width100">
                        <div class="row">
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <li><h5>Follow us</h5></li>
                            </ul>
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 socaillinks">
                                <li><a href="#" class="background395693"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="background0e72a3"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#" class="background1c9cea"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            </ul>
                            <ul class="col-lg-12 col-md-12 col-sm-12 col-xs-12 applinkes">
                                <li><a href="#"><img src="{{ asset('web_assets/images/app_store.png')}}"/></a></li>
                                <li><a href="#"><img src="{{ asset('web_assets/images/google_play.png')}}"/></a></li>
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
                    <p>Copyright 2020</p>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ asset('web_assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('web_assets/js/functionality.js') }}"></script>