<!DOCTYPE html>
<html lang="en">

<head>
    @include('store.head')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper ">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light" style="color: #343A40 ">

            <div class="d-flex justify-content-start">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="font-size: 20px;"><i class="fas fa-bars"></i></a>

                    </li>
                </ul>

                <div class="">
                    <h3 class="card-title  mt-2 mb-2 align-center" style=" color: white; font-size: 20px;">{{ $title }}</h3>
                </div>

            </div>
            <!-- Left navbar links -->



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <!-- <a class="nav-link" href="/admin/logout" role="button" style="font-weight: bold ; font-size: 20px;">Đăng xuất</a> -->
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button" style="font-size: 20px;">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->


        @include('store.sidebar')

        <div class="content-wrapper">


            <!-- Main content -->
            <section class="content ">
                <div class="container-fluid">

                        @include('store.alert')


                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- jquery validation -->
                            <div class="card card-primary mt-2">



                                @yield('content')


                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">

                        </div>
                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2023 <a href="https://adminlte.io">CucB1910195</a>.</strong> All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->

    @include('store.footer')

</body>

</html>