@extends('layouts.public')
@section('content')
    <style>
        #button-choosse-table-resto:hover {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
            cursor: pointer;

        }

        .product__item {
            margin-bottom: 20px;
        }

        @media only screen and (max-width: 600px) {
            .shoping__cart__table table tbody tr td.shoping__cart__price {
                font-size: 10px;
            }

            .shoping__cart__table table tbody tr td.shoping__cart__total {
                font-size: 10px;
            }

            .shoping__cart__table table tbody tr td h5 {
                font-size: 12px;
            }

            .shoping__cart__table table thead tr th {
                padding: 10px;
            }

            .shoping__cart__table table thead tr th.shoping__product {

                font-size: 12px;
                /* border: solid; */
                border-width: thin;
                /* border-color: #0ae9b5; */
            }

            .modal-footer {
                padding: 0;
            }
        }

        @media only screen and (max-width: 600px) {
            .modal-content {
                border-radius: 30px;
                padding: 10px;
            }

            .modal-dialog {
                border-radius: 50%;
                width: 100%;
                position: absolute;
                top: 20%;
                right: -8px;
                left: -8px;
                bottom: -8px;
            }
        }

        @media only screen and (min-width: 900px) {
            .modal-dialog {
                border-radius: 50%;
                top: 20%;
            }
        }
    </style>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Chekout Order</h2>
                        <div class="breadcrumb__option">
                            <a href="#">Home</a>
                            <span>Order Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    @if ($data->isEmpty())
        <section class="contact spad">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="contact__widget">
                            <span class="fa fa-exclamation-circle"></span>
                            <h4>Order Not Found</h4>
                            <a href="{{ route('list_menu') }}">Order Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="shoping-cart spad" style="padding-top: 2%;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="shoping__product" style="">Products</th>
                                        <th class="shoping__product">Price</th>
                                        <th class="shoping__product">Disc</th>
                                        <th class="shoping__product">Quantity</th>
                                        <th class="shoping__product">Total</th>
                                        <th class="shoping__product"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($data as $datas)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                <img src="{{ asset($datas->t_product_file) }}" alt=""
                                                    width="50">
                                                <h5>{{ $datas->t_product_name }}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                @currency($datas->t_product_price)
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{ $datas->t_product_disc }} %
                                            </td>
                                            <td class="shoping__cart__quantity" style="padding-bottom: 0px;">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <input type="text" value="{{ $datas->t_product_qty }}">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="shoping__cart__total">
                                                @currency(($datas->t_product_price - ($datas->t_product_price * $datas->t_product_disc) / 100) * $datas->t_product_qty)
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <span class="fa fa-trash" id="button-remove-cart"
                                                    data-code="{{ $datas->id_user_cart_log }}"></span>
                                            </td>
                                        </tr>
                                        @php
                                            $total =
                                                $total +
                                                ($datas->t_product_price -
                                                    ($datas->t_product_price * $datas->t_product_disc) / 100) *
                                                    $datas->t_product_qty;
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
                            {{-- <a href="#" class="primary-btn cart-btn bg-primary  text-white mr-4"><span
                                    class="icon_loading"></span>
                                Upadate Order</a> --}}
                            <a href="#" class="primary-btn cart-btn bg-dark  text-white cart-btn-right"
                                data-toggle="modal" data-target="#modal-cart" id="button-order-type">Tipe Order</a>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>KODE KUPON</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code" id="input-cupon">
                                    <button type="submit" class="site-btn" id="button-aplay-cupon">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <span id="menu-pilihan-table"></span>
                            <span id="menu-pilihan-cupon"></span>
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Subtotal <span>@currency($total)</span></li>
                                <li>Total <span>@currency($total)</span></li>
                            </ul>
                            <a href="#" class="primary-btn" id="button-payment-token" data-id="123"
                                style="display: none;">PROCEED TO
                                ORDER</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <div class="modal fade" id="modal-cart" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg shake animated">
            <div class="modal-content" id="menu-cart">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; top: 10%;">
        <div id="liveToastx" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
            <div class="toast-header">
                <img src="{{ asset('assets/img/icons/alert.jpg') }}" class="rounded mr-2" alt="..." width="30">
                <strong class="mr-auto">Notification </strong>
                <small> 1 sec ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Cupon Tidak ditemukan
            </div>
        </div>
    </div>
    <!-- Shoping Cart Section End -->
    <script>
        $(document).on("click", "#button-order-type", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $.ajax({
                url: "{{ route('menu_tipe_order_cart') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-cart').html(data);
            }).fail(function() {
                $('#menu-cart').html('eror');
            });

        });
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
        $(document).on("click", "#button-choosse-table", function(e) {
            e.preventDefault();
            // var code = $(this).data("code");
            $.ajax({
                url: "{{ route('menu_choosee_table_cart') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": 0,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-table-cart').html(data);
            }).fail(function() {
                $('#menu-table-cart').html('eror');
            });

        });
        $(document).on("click", "#button-choosse-table-resto", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $.ajax({
                url: "{{ route('menu_choosee_table_cart_save') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code,
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-pilihan-table').html(data);
                document.getElementById("button-order-type").style.display = "none";
                document.getElementById("button-payment-token").style.display = "block";
            }).fail(function() {
                // $('#menu-table-cart').html('eror');
            });

        });
        $(document).on("click", "#button-aplay-cupon", function(e) {
            e.preventDefault();
            var x = document.getElementById("input-cupon").value;
            $.ajax({
                url: "{{ route('menu_choosee_cupon_cart_save') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": x,
                },
                dataType: 'html',
            }).done(function(data) {
                document.getElementById("input-cupon").value = "";
                if (data == 0) {
                    $('#liveToastx').toast('show');
                } else {
                    $('#menu-pilihan-cupon').html(data);
                }
            }).fail(function() {
                // $('#liveToastx').toast('show');
            });

        });
    </script>
    <script>
        $(document).on("click", "#button-payment-token", function(e) {
            e.preventDefault();
            var x = document.getElementById("pick-table").value;
            var id = $(this).data("id");
            $("#button-payment-token").html(
                '<button class="btn btn-outline-info d-block w-100" type="button"" disabled><i class="fas fa-credit-card"></i> Loading..</button>'
            );
            if (x == "") {
                console.log('eror');
            } else {
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
                                $.ajax({
                                    url: "{{ route('create-payment-user-success') }}",
                                    type: "POST",
                                    cache: false,
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        "id": id,
                                    },
                                    dataType: 'html',
                                }).done(function(data) {
                                    if (data == 1) {
                                        // console.log(result);
                                        window.location.href =
                                            "{{ route('list_menu_cart') }}";
                                    } else {
                                        console.log('gagal');
                                    }
                                })
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
            }
        });
    </script>
@endsection
