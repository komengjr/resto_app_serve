@extends('layouts.public')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chekout Order</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Order Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Disc</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($data as $datas)
                                    <tr>
                                        <td class="shoping__cart__item">
                                            <img src="{{ asset($datas->t_product_file) }}" alt="" width="50">
                                            <h5>{{ $datas->t_product_name }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            @currency($datas->t_product_price)
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{$datas->t_product_disc}} %
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $datas->t_product_qty }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            @currency(($datas->t_product_price - $datas->t_product_price * $datas->t_product_disc /100) * $datas->t_product_qty)
                                        </td>
                                        <td class="shoping__cart__item__close">
                                            <span class="icon_close" id="button-remove-cart"
                                                data-code="{{ $datas->id_user_cart_log }}"></span>
                                        </td>
                                    </tr>
                                    @php
                                        $total = $total + (($datas->t_product_price - $datas->t_product_price * $datas->t_product_disc /100) * $datas->t_product_qty);
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>@currency($total)</span></li>
                            <li>Total <span>@currency($total)</span></li>
                        </ul>
                        <a href="#" class="primary-btn" id="button-payment-token" data-id="123">PROCEED TO ORDER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
    <script>
        $(document).on("click", "#button-remove-cart", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $.ajax({
                url: "{{ route('menu_remove_cart') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                location.reload();
            }).fail(function() {
                $('#menu-shop').html('eror');
            });

        });
    </script>
    <script>
        $(document).on("click", "#button-payment-token", function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#button-payment-token").html(
                '<button class="btn btn-outline-info d-block w-100" type="button"" disabled><i class="fas fa-credit-card"></i> Loading..</button>'
            );
            $.ajax({
                url: "{{ route('create-payemnt-user') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                },
                dataType: 'html',
            }).done(function(data) {
                if (data == 0) {
                    location.reload();
                } else {
                    snap.pay(data, {
                        onSuccess: function(result) {
                            alert("payment success!");
                            location.reload();
                        },
                        onPending: function(result) {
                            alert("wating your payment!");
                            console.log(result);
                            location.reload();
                        },
                        onError: function(result) {
                            alert("payment failed!");
                            console.log(result);
                        },
                        onClose: function() {
                            alert('you closed the popup without finishing the payment');
                            location.reload();
                        }
                    });
                }
            }).fail(function() {
                console.log('eror');
            });
        });
    </script>
@endsection
