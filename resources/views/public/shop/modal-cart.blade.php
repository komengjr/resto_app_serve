<div class="modal-header py-2">
    <h5 class="modal-title" id="exampleModalLabel">{{ $data->t_product_name }}</h5>
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-x"></span></button>
</div>
<div class="modal-body" style="overflow-y: initial !important;">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic" style="margin-bottom: 0px;">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large" src="{{ asset($data->t_product_file) }}"
                        alt="" />
                </div>
            </div>
        </div>
        @php
            $stok = DB::table('t_product_stok')->where('t_product_code', $data->t_product_code)->sum('t_stok_qty');
            $used = DB::table('t_product_stok')->where('t_product_code', $data->t_product_code)->sum('t_stok_used');
        @endphp
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <h3 style="padding: 0; margin: 0;">{{ $data->t_product_name }} <span style="font-size: 1rem; color: rgb(255, 2, 2);">( Stok : {{ $stok - $used }} )</span></h3>
                <div class="product__details__rating" style="padding: 0; margin: 0;">
                    <div class="custom-control custom-radio my-1 mr-sm-2">
                        <input type="radio" class="custom-control-input" name="exampleRadios"
                            id="customControlInline">
                        <label class="custom-control-label" for="customControlInline">Tidak Pedas</label>
                    </div>
                    <div class="custom-control custom-radio my-1 mr-sm-2">
                        <input type="radio" class="custom-control-input" name="exampleRadios"
                            id="customControlInline1">
                        <label class="custom-control-label" for="customControlInline1">Sedang Pedas</label>
                    </div>
                    <div class="custom-control custom-radio my-1 mr-sm-2">
                        <input type="radio" class="custom-control-input" name="exampleRadios"
                            id="customControlInline2">
                        <label class="custom-control-label" for="customControlInline2">Pedas Sekali</label>
                    </div>
                    {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos qui praesentium possimus quis nihil, minima voluptates nemo eligendi assumenda. Cumque voluptatum repellat unde dignissimos eligendi pariatur alias, praesentium error doloribus?</p> --}}
                </div>
                <label for="">Deskripsi</label>
                <textarea name="" class="form-control" id=""></textarea>
                <div class="product__details__price" style="padding: 0; margin: 0; color: rgb(0, 0, 0);">
                    @currency($data->t_product_price - ($data->t_product_price * $data->t_product_disc) / 100) <del style="font-size: 1rem;color: rgb(248, 16, 16);">@currency($data->t_product_price)</del>
                </div>
                {{-- <p>
                    {{$data->t_product_desc}}
                </p> --}}
                @if ($stok - $used < 1)
                    <button class="primary-btn bg-danger" disabled>Habis</button>
                @else
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty" style="height: 50px;">
                                {{-- <span class="dec qtybtn">-</span> --}}
                                <input type="text" value="1" id="product_qty"  style="height: 50px;"/>
                                {{-- <span class="dec qtybtn">+</span> --}}
                            </div>
                        </div>
                    </div>
                    <button class="primary-btn" id="button-add-cart-product" data-code="{{ $data->t_product_code }}">ADD
                        ORDER</button>
                @endif

                {{-- <ul>
                    <li><b>Availability</b> <span>In Stock</span></li>
                    <li>
                        <b>Shipping</b>
                        <span>01 day shipping. <samp>Free pickup today</samp></span>
                    </li>
                    <li><b>Weight</b> <span>0.5 kg</span></li>
                    <li>
                        <b>Share on</b>
                        <div class="share">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
<div class="modal-footer" style=" padding: 0;">
    <marquee width="100%" direction="left" height="25px">
        All rights reserved | This template is made with by {{ Env('APP_NAME') }}
    </marquee>
</div>
{{-- <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}
<script>
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn" style="width:20px; ">-</span>');
    proQty.append('<span class="inc qtybtn" style="width:20px; height: 150px;">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>
