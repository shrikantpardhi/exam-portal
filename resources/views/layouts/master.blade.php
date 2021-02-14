<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>


	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/core.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/datatables/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>

	{{-- Admin header --}}
	<div class="header">
		<div class="header-left">
			
		</div>
		<div class="header-right">
			
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">
						<i class="icon-copy dw dw-notification"></i>
						<span class="badge notification-active"></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							<ul>
								<li>
									<a href="#">
										<img src="vendors/images/img.jpg" alt="">
										<h3>John Doe</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed...</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="vendors/images/photo1.jpg" alt="">
						</span>
						<span class="user-name">Ross C. Lopez</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="profile.html"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="profile.html"><i class="dw dw-settings2"></i> Setting</a>
						<a class="dropdown-item" href="faq.html"><i class="dw dw-help"></i> Help</a>
						<a class="dropdown-item" href="login.html"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	{{-- admin left sidebar menus --}}
	<div class="left-side-bar">
		<div class="brand-logo">
		<a href="">
				<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="/dashboard" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span></i><span class="mtext">Home</span>
						</a>
					</li>
					<li>
					<a href="/subject" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-notepad"></span><span class="mtext">Subject</span>
						</a>
					</li>
					<li>
						<a href="/questions" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-open-book-2"></span><span class="mtext">Question Bank</span>
						</a>
					</li>
					<li>
						<a href="" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-book-1"></span><span class="mtext">Exam</span>
						</a>
					</li>
					<li>
						<a href="" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user-3"></span><span class="mtext">Students</span>
						</a>
					</li>
					<li>
						<a href="" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-certificate"></span><span class="mtext">Result</span>
						</a>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext">Forms</span>
						</a>
						<ul class="submenu">
							<li><a href="form-basic.html">Form Basic</a></li>
							<li><a href="advanced-components.html">Advanced Components</a></li>
							<li><a href="form-wizard.html">Form Wizard</a></li>
							<li><a href="html5-editor.html">HTML5 Editor</a></li>
							<li><a href="form-pickers.html">Form Pickers</a></li>
							<li><a href="image-cropper.html">Image Cropper</a></li>
							<li><a href="image-dropzone.html">Image Dropzone</a></li>
						</ul>
					</li>
					
					
					<li>
						<a href="invoice.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-invoice"></span><span class="mtext">Invoice</span>
						</a>
					</li>
					<li>
						<a href="sitemap.html" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-diagram"></span><span class="mtext">Sitemap</span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div class="sidebar-small-cap">Extra</div>
					</li>
					<li>
						<a href="#" target="_blank" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-paper-plane1"></span>
							<span class="mtext">Export to Excel</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	
	<div class="main-container">
		<div class="pd-ltr-20">


		   @yield('content')
            
			@yield('top-data')
			
			@yield('latest-user-table')

			<div class="footer-wrap pd-20 mb-20 card-box">
				@All Right Reserved by Shrikant  <a href="#" target="_blank">Dyherd</a>
			</div>
		</div>
	</div>
	<!-- js -->
	{{-- <script src="https://kit.fontawesome.com/f5cdee76c6.js" crossorigin="anonymous"></script> --}}
	<script src="admin/js/core.js"></script>
	<script src="admin/js/script.min.js"></script>
	<script src="admin/js/process.js"></script>
	<script src="admin/js/layout-settings.js"></script>
	<script src="admin/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="admin/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="admin/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="admin/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="admin/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="admin/js/dashboard.js"></script>
	<script src=""></script>
</body>
</html>