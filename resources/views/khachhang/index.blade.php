@extends('khachhang.layouts.master')
@section('title')
    Trang chủ
@endsection
@section('main-content')
<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
                            @foreach($danhsach as $slider)
				<div class="item-slick1" style="background-image: url({{ asset('storage/slider/'.$slider->slider_ten_hinh) }});">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
                                                                   {{ $slider->slider_header}}
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									{{$slider->slider_content}}
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
<!--								<a href="" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>-->
							</div>
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
                                                    
                                                    <img src="{{ asset('storage/sanpham_avatar/'.$sp->san_pham_hinh_anh) }}" alt="IMG-PRODUCT" class="sp_avatar">
                                                    <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1" onclick="loaddetail('{{$sp->san_pham_ma}}')">
                                                        Xem
                                                    </a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6 search_product">
									{{$sp->san_pham_ten_vn}}
								</a>

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
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
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
                                    <div id="div_img_detail1" class="item-slick3 img_detail" data-thumb="{{ asset('themes/cozastore/images/product-detail-01.jpg') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail1' src="{{ asset('themes/cozastore/images/product-detail-01.jpg') }}" alt="IMG-PRODUCT">
                                            <a id='a_detail1' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('themes/cozastore/images/product-detail-01.jpg') }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail2" class="item-slick3 img_detail" data-thumb="{{ asset('themes/cozastore/images/product-detail-02.jpg') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail2' src="{{ asset('themes/cozastore/images/product-detail-02.jpg') }}" alt="IMG-PRODUCT">
                                            <a id='a_detail2' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('themes/cozastore/images/product-detail-02.jpg') }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail3" class="item-slick3 img_detail" data-thumb="{{ asset('themes/cozastore/images/product-detail-03.jpg') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail3' src="{{ asset('themes/cozastore/images/product-detail-03.jpg') }}" alt="IMG-PRODUCT">
                                            <a id='a_detail3' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('themes/cozastore/images/product-detail-01.jpg') }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail4" class="item-slick3 img_detail" data-thumb="{{ asset('themes/cozastore/images/product-detail-04.jpg') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail4' src="{{ asset('themes/cozastore/images/product-detail-04.jpg') }}" alt="IMG-PRODUCT">
                                            <a id='a_detail4' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('themes/cozastore/images/product-detail-04.jpg') }}">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div id="div_img_detail5" class="item-slick3 img_detail" data-thumb="{{ asset('themes/cozastore/images/product-detail-05.jpg') }}">
                                        <div class="wrap-pic-w pos-relative">
                                            <img id='img_detail5' src="{{ asset('themes/cozastore/images/product-detail-05.jpg') }}" alt="IMG-PRODUCT">
                                            <a id='a_detail5' class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('themes/cozastore/images/product-detail-05.jpg') }}">
                                                <i class="fa fa-expand"></i>
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
                                <span id="product_name">Lightweight Jacket</span>
                            </h4>

                            <span class="mtext-106 cl2">
                                <span id="product_price">$58.79</span>
                            </span>

                            <p class="stext-102 cl3 p-t-23">
                               <span id="product_note"> Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat ornare feugiat.</span>
                            </p>

                            <!--  -->
                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Size
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Size S</option>
                                                <option>Size M</option>
                                                <option>Size L</option>
                                                <option>Size XL</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-203 flex-c-m respon6">
                                        Color
                                    </div>

                                    <div class="size-204 respon6-next">
                                        <div class="rs1-select2 bor8 bg0">
                                            <select class="js-select2" name="time">
                                                <option>Choose an option</option>
                                                <option>Red</option>
                                                <option>Blue</option>
                                                <option>White</option>
                                                <option>Grey</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="size-204 flex-w flex-m respon6-next">
                                        <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                            <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-minus"></i>   
                                            </div>

                                            <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                            <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                <i class="fs-16 zmdi zmdi-plus"></i>
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                            Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!--  -->
                            <div class="flex-w flex-m p-l-100 p-t-40 respon7">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="frminfo" name="frminfo" action="{{ route('home.info') }}" method="post">
    <input type="hidden" name="masp" id="masp"/>
    @csrf
    
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
    $(document).ready(function(){
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
        $("#frminfo #masp").val(masp);
        var form_action = $("#frminfo").attr("action");
        $.ajax({
                data: $('#frminfo').serialize(),
                url: form_action,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    alert(111);
//                        var student = '<tr id="'+data.id+'">';
//                        student += '<td>' + data.id + '</td>';
//                        student += '<td>' + data.first_name + '</td>';
//                        student += '<td>' + data.last_name + '</td>';
//                        student += '<td>' + data.address + '</td>';
//                        student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
//                        student += '</tr>';            
//                        $('#studentTable tbody').prepend(student);
//                        $('#addStudent')[0].reset();
//                        $('#addModal').modal('hide');
                },
                error: function (data) {
                }
        });
    }
</script>

@endsection