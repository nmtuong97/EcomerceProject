<!DOCTYPE html>
<html lang="en" ng-app="webbanhang">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('themes/cozastore/images/icons/favicon.png') }}" />
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
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/cozastore/css/main.css') }}">
    
    <script src="{{ asset('themes/admin/vendor/datatables/jquery.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('themes/admin/vendor/datatables/responsive.bootstrap4.min.js')}}"></script>
    <!-- Các custom style của frontend -->
    <link rel="stylesheet" href="{{ asset('themes/cozastore/css/custom-styles.css') }}">

    <!-- Các custom style dành riêng cho từng view -->
    @yield('custom-css')
</head>

<body class="animsition">

    <!-- Header -->
    @include('khachhang.layouts.partials.header')

    <!-- Cart -->
    @include('khachhang.layouts.partials.cart')

    <!-- Content -->
    @yield('main-content')

    <!-- Footer -->
    @include('khachhang.layouts.partials.footer')

    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>


    <script src="{{ asset('themes/cozastore/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/cozastore/vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".js-select2").each(function() {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
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