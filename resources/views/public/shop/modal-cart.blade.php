<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Menu Cart</h5>
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-x"></span></button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="product__details__pic">
                <div class="product__details__pic__item">
                    <img class="product__details__pic__item--large" src="{{ asset($data->t_product_file) }}"
                        alt="" />
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="product__details__text">
                <h3>{{ $data->t_product_name }}</h3>
                <div class="product__details__rating">

                    <span>(18 )</span>
                </div>
                <div class="product__details__price">@currency($data->t_product_price)</div>
                {{-- <p>
                    {{$data->t_product_desc}}
                </p> --}}
                <div class="product__details__quantity">
                    <div class="">
                        <div class="pro-qty">
                            <input type="number" value="1" id="product_qty"/>
                        </div>
                    </div>
                </div>
                <button class="primary-btn" id="button-add-cart-product" data-code="{{$data->t_product_code}}">ADD ORDER</button>

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
<div class="modal-footer">
    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button> --}}
</div>
