<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cafe & Resto</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('logox.png') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-TzBZ-AB8Hng2jGB_"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/fontawesome.min.css" integrity="sha512-v8QQ0YQ3H4K6Ic3PJkym91KoeNT5S3PnDKvqnwqFD1oiqIl653crGZplPdU5KKtHjO0QKcQ2aUlQZYjHczkmGw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        @media only screen and (max-width: 950px) {
            #list-category {
                display: none;
            }
            .container {
                padding-top: 0;

            }
            #kepala {
                position: sticky;
                width: 100%;
                top: 0;
                /* height: 70px; */
            }
            .header__cart {
                display: none;
            }
            .hero__search__phone {
                display: none;
            }
            .hero__categories {
                background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
            }

            .footer__copyright {
                display: none;
            }
            #mobile-footer {
                display: none;
            }
            .kaki a {
                /* line-height: 55px; */
                height: 55px;
                width: 55px;
            }
            .header {
                position: sticky;
                z-index: 100001 !important;
                top: 0;
            }

            .humberger__menu__wrapper {
                width: 250px;
                top: 80px;
                border-radius: 0px 20px 20px 0px;
                padding-top: 10px;
            }

            .humberger__open:hover {
                background: rgb(34, 193, 195);
                background: linear-gradient(0deg, rgba(34, 193, 195, 1) 0%, rgba(253, 187, 45, 1) 100%);
            }
        }
    </style>
    <style>
        .kaki {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
            position: fixed;
            bottom: 0;
            left: 0;
            border-top-right-radius: 15px 15px;
            border-top-left-radius: 15px 15px;
            width: 100%;
            height: 70px;
            border-style: solid;
            border-width: thin;
            border-color: #0ae9b5;
            box-shadow: 0px 0px 5px 5px #dabebe;
            /* background-color: rgba(5, 5, 5, 0.9); */

        }
    </style>
</head>

<body style="font-family: "National Park", sans-serif;">
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            {{-- <a href="#"><img src="{{ asset('logox.png') }}" alt="" width="150"></a> --}}
        </div>
        <div class="humberger__menu__cart">
            <ul>
                @guest
                @else
                    @php
                        $cart = DB::table('user_cart_log')
                            ->where('userid', Auth::user()->userid)
                            ->sum('t_product_qty');
                    @endphp
                    <li><a href="{{ route('list_menu_cart') }}"><i class="fa fa-shopping-bag"></i>
                            <span>{{ $cart }}</span></a></li>

                @endguest
            </ul>
            <div class="header__cart__price">Cost: <span>@currency(0)</span></div>
        </div>
        <div class="humberger__menu__widget">
            {{-- <div class="header__top__right__language">
                <img src="{{ asset('img/language.png') }}" alt="">
                <div>ENG</div>
                <span class="fa fa-chevron-down"></span>
                <ul>
                    <li><a href="#">ENG</a></li>
                    <li><a href="#">INA</a></li>
                </ul>
            </div> --}}
            <div class="header__top__right__language">
                @guest
                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                @else
                    <i class="fa fa-user"></i>
                    <div>{{ Auth::user()->fullname }}</div>
                    {{-- <span class="fa fa-chevron-down"></span> --}}
                    <ul>
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                @endguest
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li><a href="{{ route('/') }}">Home</a></li>
                <li>
                    <a href="#">Menu</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route('list_menu') }}">List Menu</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('brand') }}">Brand</a> </li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> resto@example.com</li>
                <li>Welcome to My Resto </li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> resto@example.com</li>
                                <li>Welcome to My Resto</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            {{-- <div class="header__top__right__language">
                                <img src="img/language.png" alt="">
                                <div>English</div>
                                <span class="fa fa-chevron-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">Indonesia</a></li>
                                </ul>
                            </div> --}}
                            <div class="header__top__right__language">
                                @guest
                                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                @else
                                    <i class="fa fa-user"></i>
                                    <div>{{ Auth::user()->fullname }}</div>
                                    {{-- <span class="fa fa-chevron-down"></span> --}}
                                    <ul>
                                        <li><a href="{{ route('dashboard.home') }}">Dashboard</a></li>
                                        <li><a href="{{ route('logout') }}">Logout</a></li>
                                    </ul>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mb-3 " id="kepala"
            style="border-bottom: rgb(23, 133, 145) solid; border-radius: 0px 0px 20px 0px;border-width: thin; background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);">
            <div class="row p-1">
                <div class="col-lg-3">
                    <div class="header__logo py-0">
                        <a href="./index.html"><img src="{{ asset('logox.png') }}" alt=""
                                width="200"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{ route('/') }}">Home</a></li>
                            <li>
                                <a href="#">Menu</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route('list_menu') }}">List Menu</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('brand') }}">Brand</a> </li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                            @guest
                            @else
                                @php
                                    $cart = DB::table('user_cart_log')
                                        ->where('userid', Auth::user()->userid)
                                        ->sum('t_product_qty');
                                @endphp
                                <li><a href="{{ route('list_menu_cart') }}"><i class="fa fa-shopping-bag"></i>
                                        <span>{{ $cart }}</span></a></li>

                            @endguest
                        </ul>

                        <div class="header__cart__price">Cost: <span>@currency(0)</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open ">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('/') }}"><img src="{{ asset('logox.png') }}" alt=""
                                    width="200"></a>
                        </div>
                        <ul>
                            <li>Address: Jl Sultan Mempawah</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@resto.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget" id="mobile-footer">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Order</a></li>
                            <li><a href="#">List Order</a></li>
                            <li><a href="#">Payment Order</a></li>

                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with by
                                {{ Env('APP_NAME') }}</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="{{ asset('img/payment-item.png') }}"
                                alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <div class="d-lg-none kaki">
        <ul class="nav nav-pills nav-fill mt-0">
            <li class="nav-item m-2"><a class="btn btn-light btn-sm py-1 px-2 m-0" href="{{ route('/') }}"><i
                        class="fas fa-home"></i><br> Home</a></li>
            {{-- <li class="nav-item m-2"><a class="btn btn-outline-info btn-sm py-1 px-2 m-0"
                    href="#"><i class="fas fa-book"></i><br> </a></li> --}}
            <li class="nav-item m-2"><a class="btn btn-light btn-sm py-1 px-2 m-0"
                    href="{{ route('list_menu') }}"><i class="fas fa-book-open"></i><br> Menu</a></li>
            <li class="nav-item m-2"><a class="btn btn-light btn-sm py-1 px-2 m-0"
                    href="{{ route('list_menu_cart') }}"><i class="fa fa-shopping-cart"></i>
                    @guest
                    @else
                        <div
                            style=" position: absolute; top: -8px; background: rgb(7, 250, 43); border-radius: 50%; line-height: 25px; height: 25px; width: 25px;">
                            {{ $cart }}
                        </div>
                    @endguest
                    <br> Order
                </a></li>
            <li class="nav-item m-2"><a class="btn btn-light btn-sm py-1 px-2 m-0" href="#" type="button"><i
                        class="fas fa-user"></i><br> User</a></li>
        </ul>
    </div>
    {{-- <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="2000">
            <div class="toast-header">
                <img src="{{ asset('img/cart/cart-1.jpg') }}" class="rounded mr-2" alt="..." width="50">
                <strong class="mr-auto">Notification</strong>
                <small>11 mins ago</small>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Berhasil Menambahkan Order.
            </div>
        </div>
    </div> --}}
    <!-- Js Plugins -->
    @if ($message = Session::get('success'))
        <script>
            $(document).ready(function() {
                $('#liveToast').toast('show');
                $('#liveToastBtn').click();
            });
        </script>
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0; top: 10%;">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
                data-delay="2000">
                <div class="toast-header">
                    <img src="{{ asset('assets/img/icons/alert.jpg') }}" class="rounded mr-2" alt="..."
                        width="30">
                    <strong class="mr-auto">Notification</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ $message }}
                </div>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <script>
            $(document).ready(function() {
                $('#liveToast').toast('show')
                $('#liveToastBtn').click();
            });
        </script>
        <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; top: 10%;">
            <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
                data-delay="3000">
                <div class="toast-header">
                    <img src="{{ asset('assets/img/icons/alert.jpg') }}" class="rounded mr-2" alt="..."
                        width="30">
                    <strong class="mr-auto">Notification</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ $message }}
                </div>
            </div>
        </div>
    @endif
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>



</body>

</html>
