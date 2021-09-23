<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- iCheck -->
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{asset('public/assets/css/dataTables.dateTime.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/assets/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('public/assets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->


    <link rel="stylesheet" href="{{asset('public/assets/plugins/summernote/summernote-bs4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/assets/css/custom2.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('public/assets/css/print.css')}}">
    <!-- jQuery -->
    <script src="  {{asset('public/assets/plugins/jquery/jquery.min.js')}}"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <center></center>
            <img class="" src="{{asset('public/images/logo.jpg')}}" alt="AdminLTELogo" height="60" width="auto">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{route('admin.dashboard')}}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="{{route('admin.logout')}}" class="dropdown-item">Logout</a>
                    </div>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <center><img class="logo responsive img-fluid" src="{{asset('public/images/logo.jpg')}}"></center>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <?php if (session()->get('role') == 1) { ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('admin.dashboard')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('admin.dashboard'))) {
                                                                                            echo "active";
                                                                                        } ?>"><i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a href="{{route('admin.userlist')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('admin.userlist', 'admin.add_user', 'admin.edit_user'))) {
                                                                                            echo "active";
                                                                                        } ?>">
                                    <i class="fas fa-user"></i>
                                    <p>User Mangement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('category.category_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('category.category_list', 'category.add_category', 'category.edit_category'))) {
                                                                                                    echo "active";
                                                                                                } ?>">
                                    <i class="fas fa-align-justify"></i>
                                    <p>Category Mangement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('plant.plant_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('plant.plant_list', 'plant.add_plant', 'plant.edit_plant'))) {
                                                                                            echo "active";
                                                                                        } ?>">
                                    <i class="fas fa-search-location"></i>
                                    <p>Plant/Location Mangement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('item.item_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('item.item_list', 'item.add_item', 'item.edit_item'))) {
                                                                                            echo "active";
                                                                                        } ?>">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    <p>Item Mangement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('weighing.weighing_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('weighing.weighing_list', 'weighing.add_weighing', 'weighing.edit_weighing'))) {
                                                                                                    echo "active";
                                                                                                } ?>">
                                    <i class="fas fa-balance-scale"></i>
                                    <p>Weighing Scale Mgmt.</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('bin.bin_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('bin.bin_list', 'bin.add_bin', 'bin.edit_bin'))) {
                                                                                        echo "active";
                                                                                    } ?>">
                                    <i class="fas fa-shopping-bag"></i>
                                    <p>Bin Mangement</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('stock.stock_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('stock.stock_list', 'stock.add_stock', 'stock.edit_stock'))) {
                                                                                            echo "active";
                                                                                        } ?>">
                                    <i class="fas fa-dolly-flatbed"></i>
                                    <p>Inventory Count</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('report.report_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array(''))) {
                                                                                                echo "active";
                                                                                            } ?>">
                                    <i class="far fa-file"></i>
                                    <p>Reports</p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                <?php  } else {  ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="{{route('admin.dashboard')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('admin.dashboard'))) {
                                                                                            echo "active";
                                                                                        } ?>"><i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('stock.stock_list')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array('stock.stock_list', 'stock.add_stock', 'stock.edit_stock'))) {
                                                                                            echo "active";
                                                                                        } ?>">
                                    <i class="fas fa-dolly-flatbed"></i>
                                    <p>Inventory Count</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{route('report.report_list_user')}}" class="nav-link <?php if (in_array(request()->route()->getName(), array(''))) {
                                                                                                    echo "active";
                                                                                                } ?>">
                                    <i class="far fa-file"></i>
                                    <p>Reports</p>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                <?php  } ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="">Sage Metals</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <!-- <b>Version</b> 3.1.0 -->
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->


    <!-- jQuery UI 1.11.4 -->
    <script src="  {{asset('public/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="  {{asset('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="  {{asset('public/assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="  {{asset('public/assets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="  {{asset('public/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="  {{asset('public/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="  {{asset('public/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('public/assets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/assets/js/dataTables.dateTime.min.js')}}"></script>
    <script src="  {{asset('public/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="  {{asset('public/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="  {{asset('public/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="  {{asset('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="  {{asset('public/assets/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="  {{asset('public/assets/dist/js/demo.js')}}"></script>
    <script src="{{asset('public/assets/js/jquery.validate.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/jszip/jszip.js')}}"></script>
    <script src="{{asset('public/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/assets/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/assets/js/buttons.print.min.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="  {{asset('public/assets/dist/js/pages/dashboard.js')}}"></script>

    <script src="{{asset('public/assets/plugins/select2/js/select2.full.min.js')}}"></script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script>

</body>

</html>