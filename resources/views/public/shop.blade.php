@extends('layouts.public')

@section('content')
    <style>
        .product__discount__percent {
            height: 45px;
            width: 45px;
            background: #dd2222;
            border-radius: 50%;
            font-size: 14px;
            color: #ffffff;
            line-height: 45px;
            text-align: center;
            position: absolute;
            left: 15px;
            top: 15px;
        }

        .modal.fade {
            opacity: 100;
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(100);
            -moz-transform: translate(50);
            transform: translate(10);
        }

        #category_at li:hover {
            background: #95c8b1;
        }

        #button-category-product:hover {
            background: #d4dfda;
        }

        @media only screen and (max-width: 600px) {
            #menu-cat {
                display: none;
            }

            .filter__item {
                display: none;
            }

            .breadcrumb-section {
                display: none;
            }

            .product {
                padding-top: 0px;
            }
            .modal-content {
                border-radius: 30px;
                padding: 10px;
            }
            .modal-dialog {
                width: 100%;
                position: absolute;

                top: 100px;
                right: -8px;
                left: -8px;
                bottom: -8px;
            }

            .product__item__pic {
                height: 70px;
            }
        }

        @media only screen and (min-width: 900px) {
            .modal-dialog {
                top: 20%;
            }
        }
    </style>
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>PILIH CATEGORY</span>
                        </div>
                        <ul id="category_at">
                            @foreach ($cat as $cats)
                                <li style="border-bottom: solid; border-width: thin; border-color: #119c5d;"><a href="#"
                                        onclick="myFunction()" id="button-category-product"
                                        data-code="{{ $cats->t_category_code }}"><span class="fa fa-book pr-2"> </span>
                                        {{ $cats->t_category_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        {{-- <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Resto Menu</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ url('/') }}">Home</a>
                            <span>Menu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5" id="menu-cat">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Category</h4>
                            <ul>
                                @foreach ($cat as $cats)
                                    <li><a href="#" class="my-4" id="button-category-product"
                                            data-code="{{ $cats->t_category_code }}"
                                            style="border-bottom: #119c5d solid;">{{ $cats->t_category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        {{-- <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    {{-- <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Promo</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                @foreach ($disc as $discs)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            <div class="product__discount__item__pic set-bg"
                                                data-setbg="{{ asset($discs->t_product_file) }}">
                                                <div class="product__discount__percent">-{{ $discs->t_product_disc }}%</div>
                                                <ul class="product__item__pic__hover">
                                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product__discount__item__text">
                                                <span>Dried Fruit</span>
                                                <h5><a href="#">{{ $discs->t_product_name }}</a></h5>
                                                <div class="product__item__price">
                                                    @currency($discs->t_product_price - ($discs->t_product_price * $discs->t_product_disc) / 100)<span>@currency($discs->t_product_price)</span></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Category By</span>
                                    <select>
                                        <option value="0">Default</option>
                                        @foreach ($cat as $cats)
                                            <option value="0">{{ $cats->t_category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span>{{ $data->count() }}</span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="fa fa-tasks"></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row" id="menu-chosse-category">
                        @foreach ($data as $datas)
                            <div class="col-lg-4 col-md-4 col-sm-3 col-6">
                                <div class="product__item card">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset($datas->t_product_file) }}">
                                        @if ($datas->t_product_disc != 0)
                                            <div class="product__discount__percent">-{{ $datas->t_product_disc }}%</div>
                                        @endif
                                        <ul class="product__item__pic__hover">
                                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                                            <li><a href="#" data-toggle="modal" data-target="#modal-shop"
                                                    id="button-detail-product" data-code="{{ $datas->t_product_code }}"><i
                                                        class="fa fa-retweet"></i></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#modal-shop"
                                                    id="button-cart-order" data-code="{{ $datas->t_product_code }}"><i
                                                        class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__item__text mb-2">
                                        <h6><a href="#">{{ $datas->t_product_name }}</a></h6>
                                        <h5>@currency($datas->t_product_price)</h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <div class="modal fade" id="modal-shop" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content" id="menu-shop">
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
    <script>
        function myFunction() {
            category_at.style.display = "none";
        }
    </script>
    <script>
        $(document).on("click", "#button-category-product", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-chosse-category').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden"></span></div>'
            );
            $.ajax({
                url: "{{ route('menu_chosse_category') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-chosse-category').html(data);
            }).fail(function() {
                $('#menu-chosse-category').html('eror');
            });

        });
        $(document).on("click", "#button-detail-product", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-shop').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_detail_product') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-shop').html(data);
            }).fail(function() {
                $('#menu-shop').html('eror');
            });

        });
        $(document).on("click", "#button-cart-order", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            $('#menu-shop').html(
                '<div class="spinner-border my-3" style="display: block; margin-left: auto; margin-right: auto;" role="status"><span class="visually-hidden">Loading...</span></div>'
            );
            $.ajax({
                url: "{{ route('menu_add_cart') }}",
                type: "POST",
                cache: false,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "code": code
                },
                dataType: 'html',
            }).done(function(data) {
                $('#menu-shop').html(data);
            }).fail(function() {
                $('#menu-shop').html('eror');
            });

        });
        $(document).on("click", "#button-add-cart-product", function(e) {
            e.preventDefault();
            var code = $(this).data("code");
            var qty = document.getElementById("product_qty").value;
            if (qty > 0) {
                $.ajax({
                    url: "{{ route('menu_add_cart_product_user') }}",
                    type: "POST",
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "code": code,
                        "qty": qty,
                    },
                    dataType: 'html',
                }).done(function(data) {
                    if (data == 0) {
                        window.location = "{{ route('login') }}";
                    } else {
                        window.location.replace("{{ route('list_menu_notif') }}");
                    }
                    $('#modal-shop').modal('hide');
                }).fail(function() {
                    $('#menu-shop').html('eror');
                });
            } else {
                alert('quantity TIdak boleh Kosong')
            }

        });
    </script>
@endsection
