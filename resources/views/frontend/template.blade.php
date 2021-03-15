<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<!-- Modules -->
	<link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/node_modules/@staaky/fresco/dist/css/fresco.css">
	<link rel="stylesheet" href="/vendor/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="/vendor/owlcarousel/assets/owl.carousel.min.css">
	<link rel="stylesheet" href="/vendor/owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" href="/vendor/owlcarousel/assets/custom.css">
	<link rel="stylesheet" href="/vendor/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="/vendor/select2/dist/css/select2-bootstrap4.min.css">
	<!-- CDN -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
	<!-- Stylesheets -->
	<link rel="stylesheet" href="/css/app.css" />

	<!-- Data table css -->
	<link href="/admin/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
	<link href="/admin/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />

	<!-- datapicker -->
	<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

	<title>RSUD</title>
</head>

<body id="top" style="background: #faf7fc; padding-bottom:100px">
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-dark navbar-home bg-white shadow py-2 py-md-3 py-lg-0">
		<div class="container position-relative">
			<a class="navbar-brand text-primary font-weight-bold" href="/">RSUD</a>
			<div class="d-flex align-items-center ml-auto order-lg-1">
				@if(Auth::check())
				<div class="join-us mr-3">
					@if (is_null(patientAccess()))
					<a href="/patient" class="btn btn-primary"><i class="fas fa-plus mr-2"></i> Pasient</a>
					@else
					<a href="/patient" class="btn btn-primary"><i class="fas fa-notes-medical mr-2"></i> Pasient</a>
					@endif
				</div>
				@endif
				<div class="navbar-profile">
					@if(Auth::check())
					<a type="button" id="collapseProfile">
						<div class="name">{{ Str::limit(user()->username, 10) }}</div>
						<img src="{{ user()->picture() }}" class="img-fluid image" alt="profile image">
					</a>
					@else
					<a href="/auth/login">
						<div class="name">Login / Register</div>
						<img src="/img/user/default/default.svg" class="img-fluid image" alt="default profile image">
					</a>
					@endif
				</div>
			</div>
			@if(Auth::check())
			<div class="navbar-profile-collapse shadow">
				<div class="card card-body">
					<div class="content">
						<img src="{{ user()->picture() }}" alt="profile image">
						<div class="info">
							<div class="name">{{ user()->username }}</div>
							<div class="email">{{ user()->email }}</div>
							<div class="action">
								<a href="/user/profile/edit" class="btn btn-primary btn-sm">Edit Profile</a>
								<a href="/auth/logout" class="btn btn-danger btn-sm">Sign Out</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>
	</nav>

	<div id="content">
		@yield('content')
	</div>

	<!-- Modules -->
	
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
	<script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="/node_modules/@staaky/fresco/dist/js/fresco.min.js"></script>
	<script src="/vendor/owlcarousel/owl.carousel.min.js"></script>
	<script src="/vendor/owlcarousel/config.js"></script>
	<script src="/vendor/select2/dist/js/select2.min.js"></script>

	
	<!-- Data tables js-->
	<script src="/admin/plugins/datatable/jquery.dataTables.min.js"></script>
	<script src="/admin/plugins/datatable/dataTables.bootstrap4.min.js"></script>
	<script src="/admin/plugins/datatable/datatable.js"></script>
	<!-- <script src="/admin/plugins/datatable/datatable-2.js"></script> -->
	<script src="/admin/plugins/datatable/dataTables.responsive.min.js"></script>

	<!-- Scripts -->
	@include('frontend.include.script')
	@yield('script')
	<script>
		$('#content').click(function() {
			if ($('.navbar-profile-collapse').css('display') == 'block') {
				$('.navbar-profile-collapse').slideToggle('d-none')
			}
		})

		$('.navbar-profile').click(function() {
			$('.navbar-profile-collapse').slideToggle("d-block")
		})

		$('#scrollToTopBtn').click(function(e) {
			e.preventDefault();
			$('html, body').animate({
				scrollTop: 0
			}, '300');
		});

		$('#type').change(function() {
			let type = $(this).val();

			$.ajax({
				url: '/listing/get/' + type,
				data: {},
				type: 'get',
				dataType: 'html',
				success: function(result) {
					$('.show-ajax').html(result);
				}
			})
		})

		$('.select2').select2({
			theme: 'bootstrap4'
		});

		$(window).scroll(function() {
			let scrollTop = $(window).scrollTop();
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
				if (scrollTop >= 48) {
					$('.navbar-home').addClass('fixed-top');
					$('.brand').css('margin-bottom', '50px');
				} else {
					$('.navbar-home').removeClass('fixed-top');
					$('.brand').css('margin-bottom', '0');
				}
			} else {
				if (scrollTop >= 100) {
					$('.navbar-home').addClass('fixed-top');
					$('.brand').css('margin-bottom', '56px');
				} else {
					$('.navbar-home').removeClass('fixed-top');
					$('.brand').css('margin-bottom', '0');
				}
			}
		})

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
	</script>
	<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
</body>

</html>