<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/choices.js/choices.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/quill/quill.snow.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">

    <link rel="stylesheet" href="node_modules/trumbowyg/dist/ui/trumbowyg.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/chartjs/Chart.min.css') }}">


    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.svg') }}" type="image/x-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">


</head>
<body>
<div id="app">
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <img src="admin/assets/images/logo.svg" alt="" srcset="">
            </div>
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class='sidebar-title'>Main Menu</li>

                    <li class="sidebar-item active ">
                        <a href="/" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="/subject" class='sidebar-link'>
                            <i data-feather="triangle" width="20"></i>
                            <span>Subject</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="/questions" class='sidebar-link'>
                            <i data-feather="briefcase" width="20"></i>
                            <span>Question</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="/viewexam" class='sidebar-link'>
                            <i data-feather="triangle" width="20"></i>
                            <span>Exam</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="/viewresults" class='sidebar-link'>
                            <i data-feather="briefcase" width="20"></i>
                            <span>Results</span>
                        </a>
                    </li>

                    <li class="sidebar-item ">
                        <a href="/users" class='sidebar-link'>
                            <i data-feather="triangle" width="20"></i>
                            <span>Manage Users</span>
                        </a>
                    </li>
                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <nav class="navbar navbar-header navbar-expand navbar-light">
            <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
            <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="avatar mr-1">
                                <img src="admin/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                            </div>
                            <div class="d-none d-md-block d-lg-inline-block">{{ ucfirst(Auth()->user()->name) }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                            <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                            <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('logout') }}"><i data-feather="log-out"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="main-content container-fluid">

            @yield('content')

        </div>

        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-left">
                    <p>2020 &copy; Exam-Portal</p>
                </div>
                <div class="float-right">
                    <p>Developed by <a href="">Dyherd</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{ asset('admin/assets/js/feather-icons/feather.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/app.js') }}"></script>

<script src="{{ asset('admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>

<!-- Include Choices JavaScript -->
<script src="{{ asset('admin/assets/vendors/choices.js/choices.min.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('admin/assets/vendors/quill/quill.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/pages/form-editor.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="{{ asset('admin/assets/js/vendors.js') }}"></script>
{{-- text editor  --}}
<!-- Import jQuery -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Import Trumbowyg -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.23.0/langs/ar.min.js"></script>
<script src="node_modules/trumbowyg/dist/trumbowyg.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>



</body>
</html>
