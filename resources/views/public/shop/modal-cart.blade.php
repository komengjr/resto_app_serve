<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Cart Option</h5>
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-x"></span></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic" style="margin-bottom: 0px;">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large" src="{{ asset($data->t_product_file) }}"
                        alt="" />
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <h3 style="padding: 0; margin: 0;">{{ $data->t_product_name }}</h3>
                <div class="product__details__rating" style="padding: 0; margin: 0;">
                    <span>(18 Porsi)</span>
                </div>
                <div class="product__details__price" style="padding: 0; margin: 0; color: rgb(47, 198, 212);">
                    @currency($data->t_product_price) <del style="font-size: 1rem;color: rgb(248, 16, 16);">@currency($data->t_product_price)</del>
                </div>
                {{-- <p>
                    {{$data->t_product_desc}}
                </p> --}}
                <div class="product__details__quantity">
                    <div class="quantity">
                        <div class="pro-qty">
                            {{-- <span class="dec qtybtn">-</span> --}}
                            <input type="text" value="1" id="product_qty" />
                            {{-- <span class="dec qtybtn">+</span> --}}
                        </div>
                    </div>
                </div>
                <button class="primary-btn" id="button-add-cart-product" data-code="{{ $data->t_product_code }}">ADD
                    ORDER</button>

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
        This is a sample scrolling text that has scrolls in the upper direction.
    </marquee>
</div>
{{-- <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script> --}}
<script>
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
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
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>
