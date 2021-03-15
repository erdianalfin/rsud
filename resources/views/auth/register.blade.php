<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Hogo– Creative Admin Multipurpose Responsive Bootstrap4 Dashboard HTML Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="html admin template, bootstrap admin template premium, premium responsive admin template, admin dashboard template bootstrap, bootstrap simple admin template premium, web admin template, bootstrap admin template, premium admin template html5, best bootstrap admin template, premium admin panel template, admin template" />

    <!-- Favicon -->
    <link rel="icon" href="admin/images/brand/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="/admin/images/brand/favicon.ico" />

    <!-- Title -->
    <title>Rsud Register</title>

    <!--Bootstrap.min css-->
    <link rel="stylesheet" href="/admin/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Dashboard css -->
    <link href="/admin/css/style.css" rel="stylesheet" />

    <!-- Custom scroll bar css-->
    <link href="/admin/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

    <!-- Sidemenu css -->
    <link href="/admin/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />

    <!--Daterangepicker css-->
    <link href="/admin/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Sidebar Accordions css -->
    <link href="/admin/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

    <!-- Rightsidebar css -->
    <link href="/admin/plugins/sidebar/sidebar.css" rel="stylesheet">

    <!---Font icons css-->
    <link href="/admin/plugins/iconfonts/plugin.css" rel="stylesheet" />
    <link href="/admin/plugins/iconfonts/icons.css" rel="stylesheet" />
    <link href="/admin/fonts/fonts/font-awesome.min.css" rel="stylesheet">

</head>

<body>
    <!-- page -->
    <div class="page">

        <!-- page-content -->
        <div class="page-content">
            <div class="container text-center text-dark">
                <div class="row">
                    <div class="col-lg-4 d-block mx-auto">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-md-12">
                                <div class="card">
                                    <div class="card-body text-left">
                                        <form action="/auth/register/post" method="post">
                                        @csrf
                                            <h3 class="text-center">Register</h3>
											<p class="text-muted mb-5 text-center">Create New Account</p>
											
											<div class="input-group mb-2 mt-5">
												<span class="input-group-addon bg-white"><i class="fa fa-user w-4"></i></span>
												<input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
											</div>
											@error('username') <span class="text-danger mb-5 text-left">{{ $message }}</span> @enderror
                                            <div class="input-group mb-2 mt-5">
                                                <span class="input-group-addon bg-white"><i class="fa fa-envelope-open"></i></span>
                                                <input type="text" class="form-control" placeholder="Email" value="{{ old('email') }}" name="email">
                                            </div>
                                            @error('email') <span class="text-danger mb-5 text-left">{{ $message }}</span> @enderror
                                            
                                            <div class="input-group mb-2 mt-5">
                                                <span class="input-group-addon bg-white"><i class="fa fa-unlock-alt"></i></span>
                                                <input type="password" class="form-control" placeholder="Password" name="password">
                                            </div>
                                            @error('password') <span class="text-danger mb-5 text-left">{{ $message }}</span> @enderror
                                            
                                            <div class="row mt-5">
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                                </div>
												<div class="col-12 text-center">
													<a href="/auth/login" class="btn btn-link box-shadow-0 px-0">Sudah punya akun ?</a>
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

        </div>
        <!-- page-content end -->
    </div>
    <!-- page End-->

    <!-- Jquery js-->
    <script src="/admin/js/vendors/jquery-3.2.1.min.js"></script>

    <!--Bootstrap.min js-->
    <script src="/admin/plugins/bootstrap/popper.min.js"></script>
    <script src="/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!--Jquery Sparkline js-->
    <script src="/admin/js/vendors/jquery.sparkline.min.js"></script>

    <!-- Chart Circle js-->
    <script src="/admin/js/vendors/circle-progress.min.js"></script>

    <!-- Star Rating js-->
    <script src="/admin/plugins/rating/jquery.rating-stars.js"></script>

    <!-- Sidebar Accordions js -->
    <script src="/admin/plugins/accordion1/js/easyResponsiveTabs.js"></script>

    <!--Moment js-->
    <script src="/admin/plugins/moment/moment.min.js"></script>

    <!-- Daterangepicker js-->
    <script src="/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom scroll bar js-->
    <script src="/admin/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

    <!-- Custom js-->
    <script src="/admin/js/custom.js"></script>

</body>

</html>