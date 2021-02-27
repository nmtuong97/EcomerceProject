@extends('khachhang.layouts.master')
@section('title')
    Trang chủ
@endsection
@section('main-content')

<section class="section-slide">
		<div class="wrap-slick1 rs1-slick1">
			<div class="slick1">
                            @foreach($danhsach as $slider)
				<div class="item-slick1" style="background-image: url({{ asset('storage/slider/'.$slider->slider_ten_hinh) }});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 cl2 respon2">
									{{ $slider->slider_header}}
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-19 p-b-43 respon1">
									{{$slider->slider_content}}
								</h2>
							</div>
								
<!--							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>-->
						</div>
					</div>
				</div>
                             @endforeach
			</div>
		</div>
	</section>



<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Tất cả
					</button>
                                        @foreach($loaisp as $loai)
                                            <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".{{$loai->loai_san_pham_id}}">
						{{$loai->loai_san_pham_ten_vn}}
                                            </button>
                                        @endforeach
					
				</div>

				<div class="flex-w flex-c-m m-tb-10">
<!--					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filter
					</div>-->

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Tìm kiếm
					</div>
				</div>
				
				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
                                            <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04" >
							<i class="zmdi zmdi-search"></i>
						</button>

                                            <input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Tìm kiếm" id="txtsearch">
					</div>	
				</div>

				<!-- Filter -->
<!--				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Price
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col3 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Color
							</div>

							<ul>
								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #222;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Black
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #4272d7;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Blue
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #b3b3b3;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Grey
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #00ad5f;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Green
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #fa4251;">
										<i class="zmdi zmdi-circle"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										Red
									</a>
								</li>

								<li class="p-b-6">
									<span class="fs-15 lh-12 m-r-6" style="color: #aaa;">
										<i class="zmdi zmdi-circle-o"></i>
									</span>

									<a href="#" class="filter-link stext-106 trans-04">
										White
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#" class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>-->
			</div>

			<div class="row isotope-grid " >
                            @foreach($dssanpham as $sp)
                            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$sp->loai_san_pham_id}}" style="position: absolute;">
					<div class="block2">
						<div class="block2-pic hov-img0 ">
                                                    
                                                    <img src="{{ asset('storage/photos/'.$sp->san_pham_hinh_anh) }}" alt="IMG-PRODUCT" class="sp_avatar">
                                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1 detailproduct" onclick="loaddetail('{{$sp->san_pham_ma}}')">
                                                        Xem
                                                    </a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<!--<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 search_product">-->
									{{$sp->san_pham_ten_vn}}
								<!--</a>-->

								<span class="stext-105 cl3">
									{{$sp->san_pham_gia_ban}}đ
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="{{ asset('storage/icon/icon-heart-01.png') }}" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="{{ asset('storage/icon/icon-heart-02.png') }}" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div>
                            @endforeach
			</div>

			<!-- Load more -->
<!--			<div class="flex-c-m flex-w w-full p-t-45">
                            <a href="" onclick="loadmore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Xem thêm
				</a>
			</div>-->
		</div>
	</section>


    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20" id="jsmodal1">
        <div class="overlay-modal1 js-hide-modal1"></div>
        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ asset('themes/cozastore/images/icons/icon-close.png') }}" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb ">
                                    <div id="div_img_detail1" class="item-slick3 img_detail" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail1' src="" alt="IMG-PRODUCT">
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail2" class="item-slick3 img_detail" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail2' src="" alt="IMG-PRODUCT">
                                            
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail3" class="item-slick3 img_detail" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail3' src="" alt="IMG-PRODUCT">
                                            
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail4" class="item-slick3 img_detail" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail4' src="" alt="IMG-PRODUCT">
                                           
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail5" class="item-slick3 img_detail" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail5' src="" alt="IMG-PRODUCT">
                                            
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail6" class="item-slick3 img_detail" data-thumb="">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail6' src="" alt="IMG-PRODUCT">
                                            </a>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                        
                    <div class="col-md-6 col-lg-5 p-b-30">
                        <div class="p-r-50 p-t-5 p-lr-0-lg">
                            <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                                <span id="product_name"></span>
                            </h4>

                            <span class="mtext-106 cl2">
                                <span id="product_price"></span>
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                               <span id="product_note"></span>
                            </p>
                            <div id="error-message-cart" class="alert-danger">
                                <!--<ul>-->
<!--                                    <li>Mã loại sản phẩm không được để trống</li>
                                    <li>Tên sản phẩm không được để trống</li>-->
                                <!--</ul>-->
                            </div>
                            <!--  -->
                            <form id="frmAddToCart" name="frmAddToCart" method="POST">
                             
                            <!--<input type="hidden" name="_method" value="PUT" />-->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                            
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <input type="hidden" name="h_hassize" id="h_hassize" value="0">
                                            <select class="form-control require-row" name="cmbsize" id="cmbsize">
                                            </select>
                                            
                                            <!--<div class="dropDownSelect2"></div>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Màu sắc
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <input type="hidden" name="h_hascolor" id="h_hascolor" value="0">
                                            <select class="form-control require-row" name='cmbcolor' id="cmbcolor">
                                            </select>
                                            <!--<div class="dropDownSelect2"></div>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>   
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="numproduct" value="1" id="numproduct">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>
                                        <input type="button" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 require-login" id="btnThemVaoGio" name="btnThemVaoGio" value="Thêm vào giỏ">
<!--                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 require-login" id="btnThemVaoGio" name="btnThemVaoGio">
                                            Thêm vào giỏ
                                        </button>-->
                                    </div>
                                </div>
                            </div>
                            </form> 
                            <!--  -->
<!--                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                                <div class="flex-m bor9 p-r-10 m-r-11">
                                    <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                        <i class="zmdi zmdi-favorite"></i>
                                    </a>
                                </div>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                                    <i class="fa fa-twitter"></i>
                                </a>

                                <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                                    <i class="fa fa-google-plus"></i>
                                </a>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="frminfo" name="frminfo" action="{{ route('home.info') }}" method="post">
        <input type="hidden" name="masp" id="masp"/>
        {{ csrf_field() }}
    </form>
    
    
@endsection

@section('custom-css')
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  grid-template-rows: auto auto;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}
</style>
@endsection
@section('custom-scripts')
<script>
    path = '<?php echo asset('storage/photos/'); ?>';
    token = '{{csrf_token()}}';
    $(document).ready(function(){
        $('#btnThemVaoGio').on('click',function(e){
            if(returnResultLogIn() == '1') {
                addToCart(token,'{{ route("home.addToCart") }}','frmAddToCart',$("#h_hassize").val(),$("#h_hascolor").val(),$("#cmbsize").val(),$("#cmbcolor").val(),$("#numproduct").val(),$("#frminfo #masp").val(),'jsmodal1');
                
            }
        });
        $('.js-show-modal1').on('click',function(e){
            e.preventDefault();
            DeleteErrorMessage();
            $('#jsmodal1').addClass('show-modal1');
        });
        $("#txtsearch").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $(".search_product").filter(function() {
              if($(this).text().toLowerCase().indexOf(value) > -1){
                  $(this).parent().parent().parent().parent().show();
              } else {
                  $(this).parent().parent().parent().parent().hide();
              }
            
          });
        });
      });
    function loadmore() {
    }
    function search() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("txtsearch");
        filter = input.value.toUpperCase();
//        ul = document.getElementById("myUL");
//        li = document.getElementsByClassName('search_product');
//        alert(filter);
//        if(filter != '') {
        $( ".search_product" ).each(function( index ) {
//            alert($.trim($(this).text()));
            txtValue = $.trim($(this).text());
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                
                $(this).parent().parent().parent().parent().show();
            } else {
                $(this).parent().parent().parent().parent().hide();
            }
            
        });
        
        
    }
    
    function loaddetail(masp){
        
//        $('.detailproduct').on('click',function(e){
//            e.preventDefault();
//            $('.js-modal1').addClass('show-modal1');
//        });
        
        $("#frminfo #masp").val(masp);
        var form_action = $("#frminfo").attr("action");
        $.ajax({
                data: $('#frminfo').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                async:false,
                success: function (data) {
                    var arr = data['hinh'];
                    var arr_hinh = [];
                    var count = 0;
                    arr.forEach(function(item){
                        arr_hinh[count] = item.hinhanh;
                        count++;
                    });
                    var i;
                    for (i = 0; i < 6; i++) {
//                        alert(arr_hinh[i]);
                        if (arr_hinh[i] != undefined) {
                            img = arr_hinh[i];
                            $("#img_detail"+(i+1)).attr('src',path+'/'+img);
                            $("#img_slide_"+i).attr('src',path+'/'+img);
                            $("#img_slide_"+i).parent().show();
                            $("#img_detail"+(i+1)).show();
                        } else {
                            $("#img_slide_"+i).parent().hide();
                            $("#img_detail"+(i+1)).hide();
                        }
                    }
                    
//                    console.log(arr_hinh);
                    var arr_sp = data['sp'];
                    var name = arr_sp[0].san_pham_ten_vn;
                    var price = arr_sp[0].san_pham_gia_ban;
                    var note = arr_sp[0].san_pham_mo_ta;
                    var img = arr_sp[0].san_pham_hinh_anh;
                    
                    $("#product_name").html(name);
                    $("#product_price").html(price+'đ');
                    $("#product_note").html(note);

                    var arr_size = data['kichthuoc'];
//                    alert(arr_size.length);
                    if (arr_size.length > 0) {
                        var i;
                        var option = "<option value=''>Chọn size</option>";
                        arr_size.forEach(function(item){
                            option += "<option value='"+item.ma+"'>"+item.ten+"</option>";
                        });
                        $("#h_hassize").val(1);
                        $("#cmbsize").html(option);
                        $("#cmbsize").parent().parent().parent().show();
                    } else {
                        $("#cmbsize").parent().parent().parent().hide();
                        $("#h_hassize").val(0);
                    }
                    
                    var arr_color = data['mausac'];
                    if (arr_color.length > 0) {
                        var i;
                        var option = "<option value=''>Chọn màu sắc</option>";
                        arr_color.forEach(function(item){
                            option += "<option value='"+item.ma+"'>"+item.ten+"</option>";
                        });
                        $("#h_hascolor").val(1);
                        $("#cmbcolor").html(option);
                        $("#cmbcolor").parent().parent().parent().show();
                    } else {
                        $("#cmbcolor").parent().parent().parent().hide();
                        $("#h_hascolor").val(0);
                    }
                    
                },
                error: function (data) {
                }
        });
    }
</script>

@endsection