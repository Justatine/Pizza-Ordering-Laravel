<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Document' }}</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dashboard_components/plugins/images/favicon.png') }}">
    <link href="{{ asset('dashboard_components/plugins/bower_components/chartist/dist/chartist.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dashboard_components/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    <link href="{{ asset('dashboard_components/css/style.min.css') }}" rel="stylesheet">

    <style>
        #imageContainer {
            width: 100%; 
            height: 100%; 
            overflow: hidden; 
            /* margin: 0 auto;  */
            border: 1px solid black;
        }
    
        #selectedImage, #selectedImage1 {
            width: 100%; 
            height: 100%; 
            object-fit: cover; 
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!-- Dark Logo icon -->
                            <img src="{{ url('dashboard_components/plugins/images/logo-icon.png') }}" alt="homepage" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <h2 class="text-dark fw-bold mt-2">PizzaHub</h2>
                            {{-- <img src="{{ url('dashboard_components/plugins/images/logo-text.png') }}" alt="homepage" /> --}}
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
    
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="{{ url('dashboard_components/plugins/images/users/varun.jpg') }}" alt="user-img" width="36" class="img-circle">
                                <span class="text-white font-medium">
                                    {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                                </span>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin') }}"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/users') }}"
                                aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Users</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/products') }}"
                                aria-expanded="false">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span class="hide-menu">Products</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/orders') }}"
                                aria-expanded="false">
                                <i class="fa fa-reorder" aria-hidden="true"></i>
                                <span class="hide-menu">Orders</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/admin/profile') }}"
                                aria-expanded="false">
                                <i class="far fa-user-circle" aria-hidden="true"></i>
                                <span class="hide-menu">Profile</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/logout') }}"
                                aria-expanded="false">
                                <i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                <span class="hide-menu">Sign out</span>
                            </a>
                        </li>
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>

        <main>
            {{ $slot }}
        </main>

        <footer>
            {{-- <x-footer/> --}}
        </footer>
    </div>

    {{-- <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
   --}}

    <!-- Scripts -->
    <script>
        setTimeout(() => {
            const elements = document.querySelectorAll('.alert');
            elements.forEach((element) => {
                element.style.transition = 'opacity 0.5s';
                element.style.opacity = '0';
                setTimeout(() => {
                    element.style.display = 'none';
                }, 500); 
            });
        }, 3000);
    </script>
    <script src="{{ asset('dashboard_components/plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard_components/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard_components/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('dashboard_components/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dashboard_components/js/waves.js') }}"></script>
    <script src="{{ asset('dashboard_components/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dashboard_components/js/custom.js') }}"></script>
    <script src="{{ asset('dashboard_components/plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('dashboard_components/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
    <script src="{{ asset('dashboard_components/js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>

</body>
</html>