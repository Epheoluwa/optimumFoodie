<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ env('APP_NAME') }} - Your Virtual Top Up portal for airtime and data of MTN, Airtel, Glo and 9mobile networks as well as bills payment.">
    <meta name="author" content="{{ env('APP_NAME') }} Systems and Solutions">

    <!-- <link rel="icon" href="https://kingsvtu.com/wp-content/uploads/2021/03/cropped-crown-2-32x32.png" sizes="32x32" />
        <link rel="icon" href="https://kingsvtu.com/wp-content/uploads/2021/03/cropped-crown-2-192x192.png" sizes="192x192" />
        <link rel="apple-touch-icon" href="https://kingsvtu.com/wp-content/uploads/2021/03/cropped-crown-2-180x180.png" /> -->

    <title>{{ env('APP_NAME') }} - {{ $title ?? "Bills Payment System" }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('client-assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ url('client-assets') }}/css/sb-adminx-2.min.css?toke={{ rand(100,999) }}" rel="stylesheet">

    @yield('header_css')
</head>

<body class="bg-gradient-primary">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('user/dashboard') }}">
                <div class="sidebar-brand-text">
                    <!-- <img src="{{ url('client-assets') }}/img/horiz-icon.png" class="img-fluid"> -->
                    CMP
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin/dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Product & System Settings
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Catalogues</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Food Components:</h6>
                        <a class="collapse-item" href="{{ url('admin/categories') }}">Categories</a>
                        <a class="collapse-item" href="{{ url('admin/products') }}">Foods</a>
                        <h6 class="collapse-header">Meal Composition:</h6>
                        <a class="collapse-item" href="{{ url('admin/calories') }}">Calories Template</a>
                        <a class="collapse-item" href="{{ url('admin/meals') }}">Meal Plans</a>
                        <a class="collapse-item" href="{{ url('admin/meal-alternates') }}">Meals & Alternate</a>
                        <h6 class="collapse-header">Recipe Composition:</h6>
                        <a class="collapse-item" href="{{ url('admin/recipes') }}">Add Recipes</a>
                        <a class="collapse-item" href="{{ url('admin/foodrecipes') }}">Food Recipes</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/usersAdd') }}">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/suggestion') }}">
                    <i class="fas fa-fw fa-lightbulb"></i>
                    <span>Suggestions</span>
                </a>
            </li>

            <!-- <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>System Utils</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                        data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Customize System:</h6>
                            <a class="collapse-item" href="{{ url('admin/settings') }}">System Settings</a>
                        </div>
                    </div>
                </li> -->
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <div class="text-center d-none d-md-inline">
                        <button class="fa fa-bars" id="sidebarToggle"></button>
                    </div>

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        @include('backend.includes.alerts')

                        <!-- Nav Item - Messages -->
                  

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        @if(isset(Auth::user()->email))
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    {{ Auth::user()->name }}
                                </span>
                                <img class="img-profile rounded-circle" src="{{ url('client-assets') }}/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        @endif
                    </ul>
                </nav>
                <!-- End of Topbar -->

                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li><i class="fa-li fa fa-times"></i> {!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(\Session::has('error'))
                <div class="alert alert-danger">
                    <ul>
                        {!! \Session::get('error') !!}
                    </ul>
                </div>
                @endif
                @if(\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        {!! \Session::get('success') !!}
                    </ul>
                </div>
                @endif

                <!-- Begin Page Content -->
                @yield('body_content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ env('APP_NAME') }} {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ url('/logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('client-assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ url('client-assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('client-assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('client-assets') }}/js/sb-admin-2.min.js"></script>

    @yield('footer_js')
</body>

</html>