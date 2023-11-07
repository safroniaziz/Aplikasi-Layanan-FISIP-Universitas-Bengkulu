<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Layanan FISIP | @yield('halaman')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{ asset('assets/application/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset('assets/application/bower_components/Ionicons/css/ionicons.min.css') }}">
        {{-- Toast Notification Asset --}}
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
        {{-- Select2 --}}
        <link href="{{ asset('assets/select2/dist/css/select2.css') }}" rel="stylesheet"type="text/css" />
        <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/application/dist/css/AdminLTE.min.css') }}">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('assets/application/dist/css/skins/_all-skins.min.css') }}">
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">

            <header class="main-header">
                    <!-- Logo -->
                    <a href="../../index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><i class="fa fa-home"></i></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg" style="font-size:16px;"><b>LAYANAN</b>&nbsp;FISIP</span>
                    </a>
                    <!-- Header Navbar: style can be found in header.less -->
                    <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->name) }}?d=https%3A%2F%2Fui-avatars.com%2Fapi%2F/{!! str_replace('+', ' ', auth()->user()->name) !!}/128128" class="user-image" alt="User Image">
                                    <span class="hidden-xs">{{ auth()->user()->name }}</span>
                                </a>
                            </li>
                            <!-- Logout Button -->
                            <li class="bg-red">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i>
                                    <span>{{__('Logout') }}</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    </nav>
            </header>

            <!-- =============================================== -->

            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel" style="padding: 14px 10px !important;">
                    <div class="pull-left image">
                      <img src="{{ asset('assets/img/logo.svg') }}" alt="User Image">
                    </div>
                    <div class="pull-left info" style="padding: 7px 5px 5px 15px;">
                      <p>Selamat Datang,</p>
                      <a href="#" style="text-transform: capitalize; font-size:13px !important;"><i class="fa fa-user"></i> {{ auth()->user()->name }}</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    @include('layouts/application_partials.sidebar')
                </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

        <!-- =============================================== -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <h1>
                    Layanan FISIP
                    <small>Layanan Satu Pintu Fakultas Ilmu Sosial & Politik Universitas Bengkulu</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-home"></i>Application</a></li>
                    <li class="active">@yield('halaman')</li>
                </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">@yield('menu')</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                        title="Collapse">
                                <i class="fa fa-minus"></i></button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                    <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Fakultas Ilmu Sosial & Politik <a href="https://www.unib.ac.id/" target="_blank">Universitas Bengkulu</a></b>
                </div>
                <strong>Copyright &copy; 2023 <a href="http://fisip.unib.ac.id/" target="_blank">FISIP UNIB</a>.</strong> All rights
                reserved.
            </footer>

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
   

        <!-- jQuery 3 -->
        <script src="{{ asset('assets/application/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('assets/application/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- SlimScroll -->
        <script src="{{ asset('assets/application/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('assets/application/bower_components/fastclick/lib/fastclick.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/application/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/application/dist/js/demo.js') }}"></script>
        {{-- Font Awesome --}}
        <script src="https://kit.fontawesome.com/055120b175.js" crossorigin="anonymous"></script>
        {{-- Toastr Notification --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        {{-- Select2 --}}
        <script src="{{ asset('assets/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
        <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.sidebar-menu').tree()
            });

            let table = new DataTable('.table-bordered');

            // Toast Notification Setting
            @if(Session::has('message'))
                var type = "{{ Session::get('alert-type', 'info') }}";
                switch(type){
                    case 'info':
                    toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                    toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'success':
                    toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'error':
                    toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        </script>
        @stack('scripts')
    </body>
</html>
