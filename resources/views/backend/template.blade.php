<!doctype html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="RSUD" name="author">

	<!-- Favicon -->
	<link rel="icon" href="/admin/images/brand/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="/admin/images/brand/favicon.ico" />

	<!-- Title -->
	<title>RSUD | Administrator</title>

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

	<!-- sweet alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>

	<!-- fontawesome -->
	<link rel="stylesheet" type="text/css" href="/vendor/fontawesome/css/all.min.css">

	<!-- Rightsidebar css -->
	<link href="/admin/plugins/sidebar/sidebar.css" rel="stylesheet">

	<!-- Sidebar Accordions css -->
	<link href="/admin/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

	<!---Font icons css-->
	<link href="/admin/plugins/iconfonts/plugin.css" rel="stylesheet" />
	<link href="/admin/plugins/iconfonts/icons.css" rel="stylesheet" />
	<link href="/admin/fonts/fonts/font-awesome.min.css" rel="stylesheet">

	<!-- Data table css -->
	<link href="/admin/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/admin/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />

	<!--Summernote css-->
	<link rel="stylesheet" href="/admin/plugins/summernote/summernote-bs4.css">

	<!-- File Uploads css-->
	<link href="/admin/plugins/fileuploads/css/dropify.css" rel="stylesheet" type="text/css" />
	

</head>

<body class="app sidebar-mini rtl">

	<!--Global-Loader-->
	<!-- <div id="global-loader">
		<img src="/admin/images/icons/loader.svg" alt="loader">
	</div> -->

	<div class="page">
		<div class="page-main">

			<!--app-header-->
			<div class="app-header header d-flex shadow">
				<div class="container-fluid">
					<div class="d-flex">
						<a class="header-brand align-self-center" href="index.html">
							<h4 class="font-weight-bold text-primary mt-5"><i class="fas fa-stethoscope mr-3"></i> REKAM MEDIS</h4>
						</a><!-- logo-->
						<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
						<div class="d-flex order-lg-2 ml-auto header-rightmenu">
							<div class="dropdown header-user">
								<a class="nav-link leading-none siderbar-link" data-toggle="sidebar-right" data-target=".sidebar-right">
									<span class="mr-3 d-none d-lg-block">
										<span class="text-gray-white"><span class="ml-2">{{ user()->username }}</span></span>
									</span>
									<span class="avatar avatar-md brround"><img src="{{ user()->picture() }}" alt="Profile-img" class="avatar avatar-md brround"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<div class="header-user text-center mt-4 pb-4">
										<span class="avatar avatar-xxl brround"><img src="{{ user()->picture() }}" alt="Profile-img" class="avatar avatar-xxl brround"></span>
										<a href="#" class="dropdown-item text-center font-weight-semibold user h3 mb-0">{{ user()->username }}</a>
										<small>{{ user()->level() }}</small>
									</div>
									<a class="dropdown-item" href="#">
										<i class="dropdown-icon mdi mdi-account-outline "></i> Spruko technologies
									</a>
									<a class="dropdown-item" href="#">
										<i class="dropdown-icon  mdi mdi-account-plus"></i> Add another Account
									</a>
									<div class="card-body border-top">
										<div class="row">
											<div class="col-6 text-center">
												<a class="" href=""><i class="dropdown-icon mdi mdi-message-outline fs-30 m-0 leading-tight"></i></a>
												<div>Inbox</div>
											</div>
											<div class="col-6 text-center">
												<a class="" href=""><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
												<div>Sign out</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- profile -->
						</div>
					</div>
				</div>
			</div>
			<!--app-header end-->

			<!-- Sidebar menu-->
			<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
			<aside class="app-sidebar toggle-sidebar">
				<div class="app-sidebar__user py-0 mb-0">
					<!-- <div class="user-body">
						<img src="{{ user()->picture() }}" alt="Profile-img" class="avatar avatar-lg brround">
					</div>
					<div class="user-info">
						<a href="#" class="ml-2"><span class="text-dark app-sidebar__user-name font-weight-semibold">{{ user()->username }}</span><br>
							<span class="text-muted app-sidebar__user-name text-sm"> {{ user()->level() }}</span>
						</a>
					</div>
					<a href="/user/account/profile" class="btn btn-primary btn-sm mt-2 mb-4" style="border-radius: 20px;"><i class="fas fa-pencil-alt"></i> Edit Profile</a> -->
				</div>
				<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
					<div class="tab-content">
						<div class="tab-pane active " id="index1">
							<ul class="side-menu toggle-menu">
								<li>
									<a class="side-menu__item" href="/backend"><i class="side-menu__icon typcn typcn-device-desktop"></i><span class="side-menu__label">Dashboard</span></a>
								</li>
								@can ('admin')
								<li>
									<a class="side-menu__item" href="/backend/users"><i class="fas fa-user mr-2"></i><span class="side-menu__label">Users</span></a>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-book mr-2"></i><span class="side-menu__label">Booking schedule</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/bookings" class="slide-item"> Waiting</a></li>
										<li><a href="/backend/booking/process" class="slide-item"> Process</a></li>
									</ul>
								</li>
								@endcan
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-laptop-medical mr-2"></i><span class="side-menu__label">Health care</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/awareness" class="slide-item"> Pemerikasaan</a></li>
										<li><a href="/backend/hospitalizations" class="slide-item"> Rawat inap</a></li>
										<li><a href="/backend/outpatients" class="slide-item"> Rawat jalan</a></li>
									</ul>
								</li>
								@can ('admin')
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-notes-medical mr-2"></i><span class="side-menu__label">Awareness</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/guarantees" class="slide-item"> Guarantees</a></li>
										<li><a href="/backend/access" class="slide-item"> Access</a></li>
									</ul>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-hospital-user mr-2"></i><span class="side-menu__label">Rekab medis</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/patients" class="slide-item"> Patient</a></li>
										<li><a href="/backend/patient/familys" class="slide-item"> Family Patient</a></li>
									</ul>
								</li>
								@endcan
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-capsules mr-2"></i><span class="side-menu__label">Drug</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/drugs" class="slide-item"> Drug</a></li>
										<li><a href="/backend/drug/types" class="slide-item"> Drug Type</a></li>
									</ul>
								</li>
								@can ('admin')
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-bed mr-2"></i><span class="side-menu__label">Living room</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/livings" class="slide-item"><span>Livings</span></a></li>
										<li><a href="/backend/living/levels" class="slide-item"><span>Levels</span></a></li>
										<li><a href="/backend/living/buildings" class="slide-item"><span>Buildings</span></a></li>
									</ul>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-user-nurse mr-2"></i><span class="side-menu__label">Doctor</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/doctors" class="slide-item">Doctors</a></li>
										<li><a href="/backend/doctor/specialists" class="slide-item"> Specialists</a></li>
									</ul>
								</li>
								<li>
									<a class="side-menu__item" href="/backend/departements"><i class="fas fa-building mr-2"></i><span class="side-menu__label">Departement</span></a>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-notes-medical mr-2"></i><span class="side-menu__label">Doctor's schedule</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/schedules" class="slide-item">Schedules</a></li>
										<li><a href="/backend/schedule/polikliniks" class="slide-item"> Poliklinik</a></li>
									</ul>
								</li>
								<li class="slide">
									<a class="side-menu__item" data-toggle="slide" href="#"><i class="fas fa-street-view mr-2"></i><span class="side-menu__label">Employees</span><i class="angle fa fa-angle-right"></i></a>
									<ul class="slide-menu">
										<li><a href="/backend/employees" class="slide-item">Employees</a></li>
										<li><a href="/backend/employees/positions" class="slide-item"> Positions</a></li>
									</ul>
								</li>
								@endcan
								@can('doctor')
								<li>
									<a class="side-menu__item" href="/backend/schedules"><i class="fas fa-notes-medical mr-2"></i><span class="side-menu__label">Doctor's schedule</span></a>
								</li>
								@endcan
							</ul>
						</div>
					</div>
				</div>
			</aside>
			<!--sidemenu end-->

			<!-- app-content-->
			<div class="app-content  my-3 my-md-5 toggle-content shadow">
				<div class="side-app">
					<!-- page-header -->
					<div class="page-header">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="/backend"><i class="fal fa-home"></i> Dashboard</a></li>
						</ol>

						<div class="ml-auto">
							@yield('widget')
						</div>
					</div>
					<!-- End page-header -->

					@yield('content')

				</div>
			</div>
			<!--End side app-->

			<!-- Right-sidebar-->
			<div class="sidebar sidebar-right sidebar-animate">
				<div class="tab-menu-heading siderbar-tabs border-0">
					<div class="tabs-menu ">
						<!-- Tabs -->
						<ul class="nav panel-tabs justify-content-center">
							<li class=""><h4 class="text-primary font-weight-bold mt-4"><i class="fas fa-user"></i> User Profile</h4></li>
						</ul>
					</div>
				</div>
				<div class="panel-body tabs-menu-body side-tab-body p-0 border-0 ">
					<div class="tab-content border-top">
						<div class="tab-pane active " id="tab">
							<div class="card-body p-0">
								<div class="header-user text-center mt-4 pb-4">
									<span class="avatar avatar-xxl brround"><img src="{{ user()->picture() }}" alt="Profile-img" class="avatar avatar-xxl brround"></span>
									<div class="dropdown-item text-center font-weight-semibold user h3 mb-0">{{ user()->username }}</div>
									<small>{{ user()->level() }}</small>
								</div>
								<div class="card-body border-top">
									<div class="row">
										<div class="col-4 text-center">
											<a class="" href="/user/account/password"><i class="dropdown-icon mdi  mdi-key fs-30 m-0 leading-tight"></i></a>
											<div>Password</div>
										</div>
										<div class="col-4 text-center">
											<a class="" href="/user/account/profile"><i class="dropdown-icon mdi mdi-tune fs-30 m-0 leading-tight"></i></a>
											<div>Settings</div>
										</div>
										<div class="col-4 text-center">
											<a class="" href="/auth/logout"><i class="dropdown-icon mdi mdi-logout-variant fs-30 m-0 leading-tight"></i></a>
											<div>Sign out</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab1">
							<div class="chat">
								<div class="contacts_card">
									<div class="input-group p-3">
										<input type="text" placeholder="Search..." class="form-control search">
										<div class="input-group-prepend">
											<span class="input-group-text search_btn  "><i class="fa fa-search"></i></span>
										</div>
									</div>
									<ul class="contacts mb-0">
										<li class="active">
											<div class="d-flex bd-highlight">
												<div class="img_cont">
													<img src="/admin/images/users/male/3.jpg" class="rounded-circle user_img" alt="img">
													<span class="online_icon"></span>
												</div>
												<div class="user_info">
													<h6 class="mt-1 mb-0 ">Maryam Naz</h6>
													<small class="text-muted">Maryam is online</small>
												</div>
												<div class="float-right text-right ml-auto mt-auto mb-auto"><small>01-02-2019</small></div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="tab2">
							@foreach(user()->activities as $activity)
							<div class="list d-flex align-items-center border-bottom p-4">
								<div class="wrapper w-100 ml-3">
									<p class="mb-0 d-flex">
										<b>{{ $activity->ip_address }}</b>
									</p>
									<div class="d-flex justify-content-between align-items-center">
										<div class="d-flex align-items-center">
											<i class="mdi mdi-clock text-muted mr-1"></i>
											<small class="text-muted ml-auto">{{ $activity->created_at->format('d F Y H:i:s') }}</small>
											<p class="mb-0"></p>
										</div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="tab-pane" id="tab3">
							<div class="">
								<div class="d-flex p-3 border-top">
									<label class="custom-control custom-checkbox mb-0">
										<input type="checkbox" class="custom-control-input" name="example-checkbox1" value="option1" checked="">
										<span class="custom-control-label">Do Even More..</span>
									</label>
									<span class="ml-auto">
										<i class="si si-pencil text-primary mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Edit"></i>
										<i class="si si-trash text-danger mr-2" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete"></i>
									</span>
								</div>
								<div class="text-center pt-5">
									<a href="#" class="btn btn-primary btn-pill">Upgrade more</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End Rightsidebar-->

			<!--footer-->
			<footer class="footer">
				<div class="container">
					<div class="row align-items-center flex-row-reverse">
						<div class="col-lg-12 col-sm-12 text-right">
							Copyright © 2020 RSUD | All rights reserved.
						</div>
					</div>
				</div>
			</footer>
			<!-- End Footer-->

		</div>
		<!-- End app-content-->
	</div>
	</div>
	<!-- End Page -->

	<!-- Back to top -->
	<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

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

	<!--Moment js-->
	<script src="/admin/plugins/moment/moment.min.js"></script>

	<!-- Daterangepicker js-->
	<script src="/admin/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

	<!--Side-menu js-->
	<script src="/admin/plugins/toggle-sidebar/sidemenu.js"></script>

	<!-- Sidebar Accordions js -->
	<script src="/admin/plugins/accordion1/js/easyResponsiveTabs.js"></script>

	<!-- Custom scroll bar js-->
	<script src="/admin/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

	<!--Owl Carousel js -->
	<script src="/admin/plugins/owl-carousel/owl.carousel.js"></script>
	<script src="/admin/plugins/owl-carousel/owl-main.js"></script>

	<!-- Rightsidebar js -->
	<script src="/admin/plugins/sidebar/sidebar.js"></script>

	<!-- Charts js-->
	<script src="/admin/plugins/chart/chart.bundle.js"></script>
	<script src="/admin/plugins/chart/utils.js"></script>

	<!--Time Counter js-->
	<script src="/admin/plugins/counters/jquery.missofis-countdown.js"></script>
	<script src="/admin/plugins/counters/counter.js"></script>

	<!--Morris  Charts js-->
	<script src="/admin/plugins/morris/raphael-min.js"></script>
	<script src="/admin/plugins/morris/morris.js"></script>

	<!-- Custom-charts js-->
	<script src="/admin/js/index1.js"></script>

	<!-- Data tables js-->
	<script src="/admin/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="/admin/plugins/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="/admin/plugins/datatable/datatable.js"></script>
	<!-- <script src="/admin/plugins/datatable/datatable-2.js"></script> -->
	<script src="/admin/plugins/datatable/dataTables.responsive.min.js"></script>

	<!--Summernote js-->
	<script src="/admin/plugins/summernote/summernote-bs4.min.js"></script>
	<script src="/admin/plugins/summernote/summernote-demo.js"></script>

	<!-- File uploads js -->
	<script src="/admin/plugins/fileuploads/js/dropify.js"></script>
	<script src="/admin/plugins/fileuploads/js/dropify-demo.js"></script>


	<script>
		$('#province').change(function() {

			let province = $(this).val();

			$.ajax({

				url: '/backend/patient/get/' + province,
				data: {},
				type: 'get',
				dataType: 'html',
				success: function(result) {
					$('#city').html(result);
					$('#city').removeAttr('disabled');
				}
			})

		})

		$('#poliklinik').change(function() {

			let poliklinik = $(this).val();

			$.ajax({

				url: '/backend/booking/get/' + poliklinik,
				data: {},
				type: 'get',
				dataType: 'html',
				success: function(result) {
					$('#schedule').html(result);
					$('#schedule').removeAttr('disabled');
				}
			})
		})
		
		$('#level').change(function() {

			let level = $(this).val();

			$.ajax({

				url: '/backend/hospitalization/get/' + level,
				data: {},
				type: 'get',
				dataType: 'html',
				success: function(result) {
					$('#living').html(result);
					$('#living').removeAttr('disabled');
				}
			})
		})

		$('#polikliniks').change(function() {

			let poliklinik = $(this).val();

			$.ajax({

				url: '/backend/outpatient/get/' + poliklinik,
				data: {},
				type: 'get',
				dataType: 'html',
				success: function(result) {
					$('#schedule').html(result);
					$('#schedule').removeAttr('disabled');
				}
			})
		})

		function deleteImage(src) {
			$.ajax({
				data: {
					src: src
				},
				type: "POST",
				url: "/backend/news/delete_image",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}
	</script>

	<!-- Custom js-->
	<script src="/admin/js/custom.js"></script>
	@include('backend.include.script')
</body>

</html>