<!DOCTYPE html>
<html lang="en" ng-app="webbanhang">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('themes/cozastore/images/icons/favicon.png') }}" />
    <link href="{{ asset ('themes/cozastore/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/MagnificPopup/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
    
    
    <link href="{{ asset ('themes/cozastore/vendor/datatables/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('themes/cozastore/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset ('themes/cozastore/vendor/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
    
    <script src="{{ asset('themes/cozastore/vendor/datatables/jquery.js')}}"></script>
    <script src="{{ asset('themes/cozastore/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('themes/cozastore/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('themes/cozastore/vendor/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('themes/cozastore/vendor/datatables/responsive.bootstrap4.min.js')}}"></script>
    
    <!-- Các custom style của frontend -->
    <link rel="stylesheet" href="{{ asset('themes/cozastore/css/custom-styles.css') }}">

    <!-- Các custom style dành riêng cho từng view -->
    @yield('custom-css')
</head>

<body class="animsition">
    <?php
        $infokhachhang = Session::get('khachhanginfo');
        $tenkhachhang = isset($infokhachhang['hoten']) ? $infokhachhang['hoten'] : '';
//        print_r($infokhachhang);
    ?>
    <!-- Header -->
    @include('khachhang.layouts.partials.header')

    <!-- Cart -->
    @include('khachhang.layouts.partials.cart')

    <!-- Content -->
    @yield('main-content')

    <!-- Footer -->
    @include('khachhang.layouts.partials.footer')
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="loginmodal" tabindex="-1" aria-labelledby="modal" aria-hidden="true">
        <!--<div class="overlay-modal1 js-hide-modal1"></div>-->
    <div class="modal-dialog modal-open">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title">Đăng nhập</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          @include('khachhang.layouts.partials.error-message')
        <div class="modal-body">
          <!--form-->
          <form name="frmMain" id = "frmMain" method="POST" action="{{route('home.login')}}">
              {{ csrf_field() }}
              <div class="form-group row">
                  <label for="username" class="col-sm-4 col-form-label">Email</label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control require-row" value="{{ old('username') }}" name="username" id="username" placeholder="" >
                  </div>
              </div>  
              <div class="form-group row">
                  <label for="password" class="col-sm-4 col-form-label">Mật khẩu</label>
                  <div class="col-sm-8">
                      <input type="password" class="form-control require-row" value="{{ old('password') }}" name="password" id="password" placeholder="">
                  </div>
              </div>

              <!--end form-->
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-user-circle"></i> Đăng nhập</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Trở về</button>
        </div>
        </form>
      </div>
    </div>
  </div>
    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>
    <form id="varhidden" name="varhidden" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="h_loggedin" id="h_loggedin" value="0">
    </form>
    <form id="frmLogoff" name="frmLogoff" method="POST" action="{{route('home.logoff')}}">
        {{ csrf_field() }}
    </form>
    
    <script src="{{ asset('themes/cozastore/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/CustomJs/CustomJs.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/js/slick-custom.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/parallax100/parallax100.js') }}"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <script src="{{ asset('themes/cozastore/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
    <script>
    <?php  
    $infoql = Session::get('quanlyinfo');
    if(empty($infoql)) {
    ?>
        boolql = '0';
    <?php }else { ?>
        boolql = '1';
    <?php } ?>
        $('.gallery-lb').each(function() { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
        $(document).ready(function() {
            @if(empty($infokhachhang))
                $("#h_loggedin").val('0');
            @else    
                $("#h_loggedin").val('1');
            @endif
            @if ($errors->any())
                $('#loginmodal').addClass('show-modal1').modal('show');
            @endif
            
            if(boolql != '0') {
                location.href = "{{route('admin.index')}}";
            }
            
            if(returnResultLogIn() != '1'){
                $("#a_login").addClass('require-login');
                $("#a_login").html('Đăng nhập');
            } else {
                $("#a_login").addClass('logoff');
                $("#a_login").html('Đăng xuất');
                $("#a_name").addClass(' trans-09 p-lr-40').html(' Xin chào, {{$tenkhachhang}} ');
                
            }
//            $('#a_login').on('click',function(e){
//                e.preventDefault();
//                ClearErrorMessage();
//                $('#username').val('');
//                $('#password').val('');
//                $('#loginmodal').addClass('show-modal1').modal('show');
//            });
        });
        
    </script>
    <script src="{{ asset('themes/cozastore/vendor/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $('.js-addwish-b2').on('click', function(e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function() {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function() {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function() {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function() {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <script src="{{ asset('themes/cozastore/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script>
        $('.js-pscroll').each(function() {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function() {
                ps.update();
            })
        });
    </script>
    <script src="{{ asset('themes/cozastore/js/main.js') }}"></script>

        <!-- Include AngularJS -->
    <script src="{{ asset('vendor/angular/angular.min.js') }}"></script>
    <!-- Include thư viện quản lý Cart - AngularJS -->
    <script src="{{ asset('vendor/ngCart/dist/ngCart.js') }}"></script>
    
    <script src="{{ asset('vendor/jquery/jquery.js') }}"></script>
    <!--<script src="{{ asset('vendor/popperjs/popper.min.js') }}"></script>-->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert/sweetalert.js') }}"></script>
    <script src="{{ asset('vendor/Inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('vendor/Inputmask/dist/bindings/inputmask.binding.js') }}"></script>
    
    <script>
        // Khởi tạo ứng dụng AngularJS, sử dụng plugin ngCart
        // Do Laravel và AngularJS đều sử dụng dấu `Double bracket` để render dữ liệu
        // => để tránh bị xung đột cú pháp, ta sẽ đổi cú pháp render dữ liệu của AngularJS thành <% %>
        var app = angular.module('sunshineApp', ['ngCart'],
            function($interpolateProvider) {
                $interpolateProvider.startSymbol('<%');
                $interpolateProvider.endSymbol('%>');
            });
    </script>
    
    <!-- Các custom script dành riêng cho từng view -->
    @yield('custom-scripts')
</body>

</html>