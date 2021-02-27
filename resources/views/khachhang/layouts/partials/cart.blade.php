
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Giỏ hàng
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        
        <div class="header-cart-content flex-w js-pscroll">
            <?php $sum = 0; ?>
            @foreach($giohang as $sp)
            <ul class="header-cart-wrapitem w-full">
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
                        <img src="{{ asset('storage/photos/'.$sp->san_pham_hinh_anh) }}" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            {{$sp->san_pham_ten_vn}}
                        </a>

                        <span class="header-cart-item-info">
                            
                            {{$sp->gio_hang_so_luong}} x {{$sp->san_pham_gia_ban}}đ
                            <?php $sum += $sp->gio_hang_so_luong*$sp->san_pham_gia_ban; ?>
                        </span>
                    </div>
                </li>
            </ul>
            @endforeach
            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Tổng cộng: {{$sum}}đ
                </div>

                <div class="header-cart-buttons flex-w w-full">
<!--                    <a href="#" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>-->

                    <a href="#" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Thanh toán
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>