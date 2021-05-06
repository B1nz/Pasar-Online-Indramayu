<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pasar Indramayu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/icofont.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">

    @livewireStyles

    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header start -->
    <header>
        <div class="header-top-wrapper-2 border-bottom-2">
            <div class="header-info-wrapper pl-200 pr-200">
                <div class="header-contact-info header-contact-info2 ">
                    <ul>
                        <li><i class="pe-7s-shopbag"></i> <a href="{{url('/admin')}}">Masuk Sebagai Penjual</a></li>
                        <li><i class="pe-7s-cash"></i> <a href="{{ route('toko.create') }}">Mulai Berjualan!</a></li>
                    </ul>
                </div>
                <div class="electronics-login-register">
                    <ul>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}"><i class="pe-7s-users"></i>{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="font-weight: bold">
                                    <i class="pe-7s-users"></i>
                                    Selamat Datang, {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item " href="{{url('/admin')}}">
                                        {{ __('Masuk Penjual') }}
                                    </a>

                                    <a class="dropdown-item " href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" class="btn btn-danger">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-bottom ptb-40 clearfix">
            <div class="header-bottom-wrapper pr-200 pl-200">
                <div class="logo-3">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/img/logo/logo-11.png')}}" alt="">
                    </a>
                </div>

                {{-- Search function --}}
                <div class="categories-search-wrapper categories-search-wrapper2">
                    <div class="categories-wrapper">
                        <form action="{{route('produk.search')}}" action="GET">
                            <input name="query" placeholder="Cari barang" type="text">
                            <button type="submit"> Cari </button>
                        </form>
                    </div>
                </div>
                <div class="header-cart-3">
                    <a href="{{ route('keranjang.index') }}">
                        <i class="ti-shopping-cart"></i>Keranjang Belanja
                        <span>
                            @auth
                                {{Cart::session(auth()->id())->getContent()->count()}}
                            @else
                                0
                            @endauth
                        </span>
                    </a>
                    @guest

                    @else
                    <ul class="cart-dropdown">

                        @foreach ($keranjangItems as $item)

                        <li class="single-product-cart">
                            {{-- <div class="cart-img">
                                <span>
                                    @if(!empty($item->cover_img))
                                        <img src="{{asset('storage/'.$item->cover_img)}}" alt="">
                                    @else
                                        <img src="assets/img/cart/1.jpg" alt="">
                                    @endif
                                </span>
                            </div> --}}
                            <div class="cart-title">
                                <h5><a href="
                                    {{-- {{route('produk.show', $produk)}} --}}
                                    #
                                    ">{{ $item->name }}</a></h5>
                                <span>@currency($item->price) x {{ $item->quantity }}</span>
                            </div>
                            <div class="cart-delete">
                                <a href="{{ route('keranjang.destroy', $item->id )}}"><i class="ti-trash"></i></a>
                            </div>
                        </li>

                        @endforeach

                        <li class="cart-space">
                            <div class="cart-sub">
                                <h4>Subtotal</h4>
                            </div>
                            <div class="cart-price">
                                <h4>@currency(\Cart::session(auth()->id())->getTotal())</h4>
                            </div>
                        </li>
                        <li class="cart-btn-wrapper">
                            <a class="cart-btn btn-hover" href="{{ route('keranjang.index') }}">keranjang</a>
                            @if (Cart::session(auth()->id())->getContent()->count()  == 0)
                            @else
                                <a class="cart-btn btn-hover" href="{{route('keranjang.checkout')}}">checkout</a>
                            @endif
                        </li>
                    </ul>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
    @yield('content')
    <footer class="footer-area">
        <div class="footer-middle black-bg-2 pt-35 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-xl-4">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title-3">Contact Us</h3>
                            <div class="footer-info-wrapper-2">
                                <div class="footer-address-electro">
                                    <div class="footer-info-icon2">
                                        <span>Address:</span>
                                    </div>
                                    <div class="footer-info-content2">
                                        <p>77 Seventh Streeth Banasree
                                            <br>Road Rampura -2100 Dhaka</p>
                                    </div>
                                </div>
                                <div class="footer-address-electro">
                                    <div class="footer-info-icon2">
                                        <span>Phone:</span>
                                    </div>
                                    <div class="footer-info-content2">
                                        <p>+11 (019) 2518 4203
                                            <br>+11 (251) 2223 3353</p>
                                    </div>
                                </div>
                                <div class="footer-address-electro">
                                    <div class="footer-info-icon2">
                                        <span>Email:</span>
                                    </div>
                                    <div class="footer-info-content2">
                                        <p><a href="#">domain@mail.com</a>
                                            <br><a href="#">company@domain.info</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xl-3">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title-3">My Account</h3>
                            <div class="footer-widget-content-3">
                                <ul>
                                    <li><a href="login.html">Login Hare</a></li>
                                    <li><a href="cart.html">Cart History</a></li>
                                    <li><a href="checkout.html"> Payment History</a></li>
                                    <li><a href="shop.html">Product Tracking</a></li>
                                    <li><a href="register.html">Register</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-xl-2">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title-3">Information</h3>
                            <div class="footer-widget-content-3">
                                <ul>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="#">Our Service</a></li>
                                    <li><a href="#">Pricing Plan</a></li>
                                    <li><a href="#"> Vendor Detail</a></li>
                                    <li><a href="#">Affiliate</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-xl-3">
                        <div class="footer-widget widget-right mb-40">
                            <h3 class="footer-widget-title-3">Service</h3>
                            <div class="footer-widget-content-3">
                                <ul>
                                    <li><a href="#">Product Service</a></li>
                                    <li><a href="#">Payment Service</a></li>
                                    <li><a href="#"> Discount Service</a></li>
                                    <li><a href="#">Shopping Service</a></li>
                                    <li><a href="#">Promotional Add</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom  black-bg pt-25 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="footer-menu">
                            <nav>
                                <ul>
                                    <li><a href="#">Privacy Policy </a></li>
                                    <li><a href="#"> Blog</a></li>
                                    <li><a href="#">Help Center</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="copyright f-right mrg-5">
                            <p>
                                Copyright ©
                                <a href="https://hastech.company/">HasTech</a> 2018 . All Right Reserved.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>




    <!-- all js here -->
    <script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/ajax-mail.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    @livewireScripts
</body>

</html>
