<?php 
	// $userdetails = DB::table('users')->where('id', Session::get('gorgID'))->first();
	// $clientwallet = DB::table('wallet_transaction')->where('client_id', Session::get('gorgID'))->orderBy('id', 'DESC')->first();
	/*print_r($userdetails); die;*/
?>
<!doctype html>
<html>

<head>
    <title>Holidate - AdminPanel </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' href="<?php echo e(asset('admin/web_assets/css/bootstrap.css')); ?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo e(asset('admin/web_assets/css/bootstrap.min.css')); ?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo e(asset('admin/web_assets/css/font-awesome.css')); ?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo e(asset('admin/web_assets/css/font-awesome.min.css')); ?>" />
    <link rel='stylesheet' type='text/css' href="<?php echo e(asset('admin/web_assets/css/style.css')); ?>" />
    <link rel='stylesheet' type='text/css'
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" />
    <link rel="shortcut icon" href="<?php echo e(asset('admin/web_assets/images/goldent_logo.png')); ?>" type="image/x-icon">
</head>

<body>
    <!-- header-section-start -->
    <header class="main_header">
        <div id="wrapper" class="animate">
            <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
                <div class="container container1">
                    <a class="navbar-brand" href="<?php echo e(URL::to('dashboard')); ?>"><img
                            src="<?php echo e(asset('admin/web_assets/images/goldent_logo.png')); ?>" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <div class="languages languages1">
                            <form>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>EN</option>
                                        <option>IND</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="languages languages1">
                            <form>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option>$</option>
                                        <option>&euro;</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <ul class="navbar-nav ml-md-auto d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link inner_header" href="#">
                                    <p>My Watch</p>
                                    <b><img src="<?php echo e(asset('admin/web_assets/images/watch.png')); ?>" width="15px" />
                                        1</b>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- header-section-end -->
<?php /**PATH D:\xampp\htdocs\222holidate\resources\views/admin/web_layouts/innerheader.blade.php ENDPATH**/ ?>