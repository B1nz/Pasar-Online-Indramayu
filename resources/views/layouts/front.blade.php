<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Pasar Indramayu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    @livewireStyles

    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>

@php
    if (Auth::guest()) {
        $keranjangItems = \Cart::session(auth()->guest())->getContent();
    } else {
        $keranjangItems = \Cart::session(auth()->id())->getContent();
    }
@endphp

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
                        @guest
                        <li><i class="pe-7s-cash"></i> <a href="{{ route('toko.create') }}">Mulai Berjualan!</a></li>
                        @else
                            @if (auth()->user()->role_id == '1')
                            <li><i class="pe-7s-shopbag"></i> <a href="{{url('/admin')}}">Masuk Halaman Admin</a></li>
                            @elseif (auth()->user()->role_id == '3')
                            <li><i class="pe-7s-shopbag"></i> <a href="{{url('/seller/orders')}}">Masuk Halaman Penjual</a></li>
                            @else
                            <li><i class="pe-7s-cash"></i> <a href="{{ route('toko.create') }}">Mulai Berjualan!</a></li>
                            @endif
                        @endguest
                    </ul>
                </div>
                <div class="electronics-login-register">
                    <ul>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}" style="font-weight: bold"><i class="pe-7s-users"></i>{{ __('Login') }}</a>
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

                                    @if (auth()->user()->role_id == '1')
                                    <a class="dropdown-item " href="{{url('/seller/orders')}}">
                                        {{ __('Halaman Penjual') }}
                                    </a>
                                    @elseif (auth()->user()->role_id == '3')
                                    <a class="dropdown-item " href="{{url('/seller/orders')}}">
                                        {{ __('Halaman Penjual') }}
                                    </a>
                                    @else

                                    @endif

                                    <a class="dropdown-item " href="{{ route('pesanan.index') }}">
                                        {{ __('Daftar Pesanan') }}
                                    </a>

                                    <a class="dropdown-item " href="{{ url('/edit') }}">
                                        {{ __('Edit Akun') }}
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
                        <img src="{{asset('assets/img/logo/logo.png')}}" alt="" style="max-width: 90px">
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
                                <h5>{{ $item->name }}</h5>
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
    <!-- Navbar start -->
    <div class="categori-menu-wrapper69 clearfix">
        <div class="pl-200 pr-200">
            <div class="categori-style-2">
                <div class="category-heading-2">
                    <h3 style="color: #85bd02">Kategori Produk</h3>
                </div>
            </div>
            <div class="menu-style-4 menu-hover">
                <nav>
                    <ul>
                        <li><a href="{{url('/home')}}">home </a>
                        </li>
                        <li><a href="{{route('produk.search')}}">semua produk</a>
                        </li>
                        <li><a href="{{ route('tutorial') }}">panduan belanja <span class="sticker-new">hot</span></a>
                        </li>
                        <li><a href="{{route('produk.pihps')}}">cek harga pangan  <span class="sticker-new">hot</span></a>
                        </li>
                        <li><a href="{{ route('aboutus') }}">tentang kami</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
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
                                        <span>Email:</span>
                                    </div>
                                    <div class="footer-info-content2">
                                        <p><a href="#">Goldiansyah@protonmail.com</a>
                                            <br><a href="#">Goldiansyah@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xl-4">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title-3">My Account</h3>
                            <div class="footer-widget-content-3">
                                <ul>
                                    <li><a href="{{ route('keranjang.index') }}">Keranjang</a></li>
                                    <li><a href="{{ url('/pesanan') }}">Pembelian</a></li>
                                    <li><a href="{{ url('/edit') }}">Edit Profil</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-xl-4">
                        <div class="footer-widget mb-40">
                            <h3 class="footer-widget-title-3">Information</h3>
                            <div class="footer-widget-content-3">
                                <ul>
                                    <li><a href="{{ url('/aboutus') }}">Tentang Kami</a></li>
                                </ul>
                            </div>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

    @livewireScripts
</body>

</html>
