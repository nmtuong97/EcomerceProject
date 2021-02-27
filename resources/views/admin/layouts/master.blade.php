<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản lý || @yield('title')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset ('themes/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ asset ('themes/admin/vendor/datatables/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('themes/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('themes/admin/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    
    <link href="{{ asset ('themes/admin/css/google_font.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('themes/admin/css/sb-admin-2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('custom/css/custom.css')}}" rel="stylesheet" type="text/css">
    
    <script src="{{ asset('themes/admin/vendor/datatables/jquery.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/responsive.bootstrap4.min.js')}}"></script>
    
    
    <script src="{{ asset ('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('themes/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('themes/admin/js/sb-admin-2.min.js')}}"></script>
    
    
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
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có chắc chắn muốn thoát</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Chọn "Thoát" để thoát khỏi hệ thống hoặc "Không thoát" để ở lại.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Không thoát</button>
                    <a class="btn btn-primary" href="{{route('home.logoffadmin')}}">Thoát</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Custom scripts for all pages-->
    <script src="{{ asset('themes/admin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{ asset('vendor/CustomJs/CustomJs.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('vendor/Inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/Inputmask/dist/bindings/inputmask.binding.js') }}"></script>
    
    
</body>

</html>

<script>
    //script for datatable
    $( document ).ready(function() { 
        
        $('.tien-te').inputmask({
            alias: 'currency',
            positionCaretOnClick: "radixFocus",
            radixPoint: ".",
            _radixDance: true,
            numericInput: true,
            groupSeparator: ",",
            suffix: ' VNĐ',
            min: 0,         // 0 ngàn
            max: 1000000000, // 1 tỷ
            autoUnmask: true,
            removeMaskOnSubmit: true,
            unmaskAsNumber: true,
            inputtype: 'text',
            placeholder: "0",
            definitions: {
              "0": {
                validator: "[0-9\uFF11-\uFF19]"
              }
            }
          });
        
        $('#dataTable').DataTable( {
            responsive: true,
            fixedHeader: true,
            "lengthMenu": [[1, 5, 10, 25, 50, -1], [1, 5, 10, 25, 50, "Tất cả"]],
            "pageLength": 5,
            "language": {
                "lengthMenu": "Hiển thị _MENU_ dòng trên trang",
                "zeroRecords": "Không tìm thấy dữ liệu",
                "info": "Trang _PAGE_ trên tổng _PAGES_ trang",
                "infoEmpty": "Không có dữ liệu",
                "search":         "Tìm kiếm:",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "first":      "Trang đầu",
                    "last":       "Trang cuối",
                    "next":       "Trang sau",
                    "previous":   "Trang trước"
                },
                "loadingRecords": "Đang tìm kiếm...",
                "processing":     "Đang xử lý...",
        }
        } );
        
        @if (Session::has('sussecs'))
            showSuccessNotification('{{Session::get('sussecs')}}'); 
        @endif

    });
</script>