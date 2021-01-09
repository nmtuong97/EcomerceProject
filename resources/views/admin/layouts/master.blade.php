<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý || @yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset ('themes/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('themes/admin/css/google_font.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('themes/admin/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    @yield('custom-css')
   
</head>
@yield('custom-scripts')
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.partials.navbar')
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            <!-- header -->
                @include('admin.partials.header')
            <!-- end header -->

            <!-- page content -->
                @yield('content')
            <!-- end page content -->
            </div>

            <!-- Footer bỏ include footer-->
            <!-- include('admin.partials.footer') -->
            <!-- End of Footer -->
        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắt chắn muốn thoát</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Thoát" để thoát khỏi hệ thống hoặc "Không thoát" để ở lại.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không thoát</button>
                    <a class="btn btn-primary" href="login.html">Thoát</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset ('vendor/jquery/jquery.js') }}"></script>
    <script src="{{ asset ('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('themes/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('themes/admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('themes/admin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('themes/admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ asset('themes/admin/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>