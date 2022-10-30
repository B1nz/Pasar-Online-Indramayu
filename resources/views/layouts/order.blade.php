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

    @livewireStyles

    <script src="/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

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
        <div class="header-bottom ptb-40 clearfix">
            <div class="header-bottom-wrapper pr-200 pl-200">
                <div class="logo-3">
                    <a href="{{url('/')}}">
                        <img src="{{asset('assets/img/logo/logo.png')}}" alt="" style="max-width: 90px">
                    </a>
                </div>

                {{-- Search function --}}
                <div class="categories-search-wrapper categories-search-wrapper2">
                    <h3>Halaman Toko</h3>
                </div>
                <div class="header-cart-3">
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
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->
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

    <div class="py-4 container-fluid">
        <div class="row">
            <div class="col-2">

                <div class="list-group">
                    <a href="{{url('/admin/produks/create')}}" class="list-group-item list-group-item-action"><i class="pe-7s-plus"></i> Tambah Produk</a>
                    <a href="{{url('/admin/produks')}}" class="list-group-item list-group-item-action"><i class="pe-7s-cash"></i> Produk Anda</a>
                    <a href=" {{route('seller-orders.index')}} " class="list-group-item list-group-item-action"><i class="pe-7s-shopbag"></i> Daftar Order</a>
                    <a href=" {{url('/admin/tokos')}} " class="list-group-item list-group-item-action"><i class="pe-7s-settings"></i> Pengaturan Toko</a>
                </div>

            </div>

            <div class="col-10">
                @yield('content')
            </div>

        </div>
    </div>

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

    @livewireScripts
</body>

</html>
