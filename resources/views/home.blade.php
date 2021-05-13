@extends('layouts.fhome')

@section('content')

@include('sweetalert::alert')

<div class="categori-menu-wrapper69 clearfix">
    <div class="pl-200 pr-200">
        <div class="categori-style-2">
            <div class="category-heading-2">
                <h3>Kategori Produk</h3>
                <div class="category-menu-list">
                    <ul>

                        @foreach ($categories as $category)
                        <li>

                            @php
                                $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                            @endphp

                            @if ($children->isNotEmpty())
                            <a href="{{route('produk.index', ['category_id'=>$category->id])}}">{{$category->name}}<i class="pe-7s-angle-right"></i></a>
                            <div class="category-menu-dropdown">

                                @foreach ($children as $child)
                                <div class="category-dropdown-style category-common3">
                                    <h4 class="categories-subtitle">
                                        <a href="{{route('produk.index', ['category_id'=>$child->id])}}">
                                            {{$child->name}}
                                        </a>
                                    </h4>

                                    @php
                                        $grandchild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                    @endphp

                                    @if ($grandchild->isNotEmpty())
                                        <ul>
                                            @foreach ($grandchild as $c)
                                                <li><a href="{{route('produk.index', ['category_id'=>$c->id])}}"> {{$c->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif

                                </div>
                                @endforeach

                            </div>
                            @else
                            <a href="{{route('produk.index', ['category_id'=>$category->id])}}">{{$category->name}}</a>
                            @endif

                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div class="menu-style-4 menu-hover">
            <nav>
                <ul>
                    <li><a href="{{url('/home')}}">home </a>
                    </li>
                    <li><a href="{{route('produk.search')}}">semua produk <span class="sticker-new">hot</span></a>
                    </li>
                    <li><a href="{{ route('keranjang.index') }}">keranjang </a>
                    </li>
                    <li><a href="{{route('produk.pihps')}}">cek harga pangan  <span class="sticker-new">hot</span></a>
                    </li>
                    <li><a href="{{ url('/aboutus') }}">tentang kami</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<div class="slider-area">
    <div class="slider-active owl-carousel">
        <div class="single-slider-4 slider-height-4 bg-img" style="background-image: url(/assets/img/home/1.png)">
            <div class="container">
                <div class="slider-content-4 fadeinup-animated">
                    <h2 class="animated">Selamat Datang di <br>Pasar Indramayu!.</h2>
                    <h4 class="animated">Mulai belanja sekarang!  </h4>
                    <a class="furits-slider-btn btn-hover animated" href="{{route('produk.search')}}">Belanja</a>
                </div>
            </div>
        </div>
        <div class="single-slider-4 slider-height-4 bg-img" style="background-image: url(/assets/img/home/2.png)">
            <div class="container">
                <div class="slider-content-4 fadeinup-animated">
                    <h2 class="animated">Mulailah berjualan bersama kami! <br>Daftar Sekarang!.</h2>
                    <h4 class="animated">Kini siapapun dapat berjualan!  </h4>
                    <a class="furits-slider-btn btn-hover animated" href="{{ route('toko.create') }}">Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 3 Produk Random -->
<div class="banner-area pt-90 pb-160 fix">
    <div class="container">
        <div class="row">
            @foreach ($firstProduk as $fp)
            <div class="col-lg-4 col-md-4">
                <a href="{{route('produk.show', $fp)}}">
                    <div class="furits-banner-wrapper mb-30 wow fadeInLeft">
                        @if(!empty($fp->cover_img))
                            <img src="{{asset('storage/'.$fp->cover_img)}}" alt="" style="max-height: 300px; max-width: 370px; filter: brightness(50%);">
                        @else
                            <img src="assets/img/banner/40.jpg" alt="">
                        @endif
                        <div class="furits-banner-content"">
                            <h4 style="color: rgb(208, 255, 0); font-weight: bold">{{$fp->nama}}</h4>
                            <p style="color: white">{{\Illuminate\Support\Str::limit($fp->deskripsi,100)}}</p>
                            <p style="color: white; font-weight: bold">@currency($fp->harga)</p>
                            <a class="furits-banner-btn btn-hover" href="{{route('keranjang.add', $fp->id)}}">Beli</a>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="menu-btn-area text-center mt-40" style="padding-bottom: 90px">
            <a class="furits-slider-btn btn-hover animated" href="{{route('produk.search')}}">Lihat Semua Produk</a>
        </div>
    </div>
</div>

<!-- Produk Terbaru -->
<div class="product-style-area gray-bg-4 pb-105">
    <div class="container-fluid">
        <div class="section-title-furits bg-shape text-center mb-80">
            <img src="assets/img/icon-img/49.png" alt="">
            <h2>Produk Terbaru</h2>
        </div>
        <div class="product-fruit-slider owl-carousel">
            @foreach ($freshProduk as $pf)
            <div class="product-fruit-wrapper">
                <div class="product-fruit-img">
                    @if(!empty($pf->cover_img))
                        <img src="{{asset('storage/'.$pf->cover_img)}}" alt="">
                    @else
                        <img src="/assets/img/product/fruits/1.jpg" alt="">
                    @endif
                    <div class="product-furit-action">
                        <a class="furit-animate-left" title="Tambah ke Keranjang" href="{{route('keranjang.add', $pf->id)}}">
                            <i class="pe-7s-cart"></i>
                        </a>
                        <a class="furit-animate-right" title="Lihat Detail" href="{{route('produk.show', $pf)}}">
                            <i class="pe-7s-look"></i>
                        </a>
                    </div>
                </div>
                <div class="product-fruit-content text-center">
                    <h4><a href="{{route('produk.show', $pf)}}">{{$pf->nama}}</a></h4>
                    <span>@currency($pf->harga)</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Kenapa Memilih Kami -->
<div class="fruits-choose-area pb-65 bg-img" style="background-image: url(assets/img/home/banner.png)">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-8 col-12">
                <div class="fruits-choose-wrapper-all">
                    <div class="fruits-choose-title">
                        <h2>Kenapa Belanja Disini?</h2>
                    </div>
                    <div class="fruits-choose-wrapper">
                        <div class="single-fruits-choose">
                            <div class="fruits-choose-serial">
                                <h3>01</h3>
                            </div>
                            <div class="fruits-choose-content">
                                <h4 style="color: #d0ff00; font-weight: bold">Dari Indramayu Untuk Indramayu</h4>
                                <p style="color: white">Aplikasi ini didirikian oleh orang Indramayu dan Menjual produk khusus warga Indramayu dan sekitarnya.</p>
                            </div>
                        </div>
                        <div class="single-fruits-choose">
                            <div class="fruits-choose-serial">
                                <h3>02</h3>
                            </div>
                            <div class="fruits-choose-content">
                                <h4 style="color: #d0ff00; font-weight: bold">Produk Segar</h4>
                                <p style="color: white">Produk yang dijual disini merupakan produk segar.</p>
                            </div>
                        </div>
                        <div class="single-fruits-choose">
                            <div class="fruits-choose-serial">
                                <h3>03</h3>
                            </div>
                            <div class="fruits-choose-content">
                                <h4 style="color: #d0ff00; font-weight: bold">Terhindar Dari Penyebaran Virus Covid-19</h4>
                                <p style="color: white">Mengikuti anjuran pemerintah untuk dirumah saja agar terhindar dari penyebaran virus Covid-19.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Produk Terupdate -->
<div class="product-style-area pt-130 pb-30 wow fadeInUp">
    <div class="container">
        <div class="section-title-furits text-center mb-95">
            <img src="assets/img/icon-img/49.png" alt="">
            <h2>Produk TerUpdate</h2>
        </div>
        <div class="row">
            @foreach ($updtdProduk as $up)
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="product-fruit-wrapper mb-60">
                    <div class="product-fruit-img">
                        @if(!empty($up->cover_img))
                            <img src="{{asset('storage/'.$up->cover_img)}}" alt="">
                        @else
                            <img src="/assets/img/product/furits/6.jpg" alt="">
                        @endif
                        <div class="product-furit-action">
                            <a class="furit-animate-left" title="Tambah ke Keranjang" href="{{route('keranjang.add', $up->id)}}">
                                <i class="pe-7s-cart"></i>
                            </a>
                            <a class="furit-animate-right" title="Lihat Detail" href="{{route('produk.show', $up)}}">
                                <i class="pe-7s-look"></i>
                            </a>
                        </div>
                    </div>
                    <div class="product-fruit-content text-center">
                        <h4><a href="{{route('produk.show', $pf)}}">{{$up->nama}}</a></h4>
                        <span>@currency($up->harga)</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- 3 Point -->
<div class="fruits-services ptb-200 container-fluid" style="background-color: rgb(99, 99, 99)">
    <div class="fruits-services-wrapper">
        <div class="single-fruits-services">
            <div class="fruits-services-img">
                <img src="assets/img/icon-img/53.png" alt="">
            </div>
            <div class="fruits-services-content">
                <h4 style="font-weight: bold; color: white">Produk Segar</h4>
                <p style="color: white">Produk segar setiap harinya.</p>
            </div>
        </div>
        <div class="single-fruits-services">
            <div class="fruits-services-img">
                <img src="assets/img/icon-img/54.png" alt="">
            </div>
            <div class="fruits-services-content">
                <h4 style="font-weight: bold; color: white">Diantar Kerumah Anda!.</h4>
                <p style="color: white">Duduk manis dirumah dan nantikan belanjaan anda datang ke rumah!.</p>
            </div>
        </div>
        <div class="single-fruits-services">
            <div class="fruits-services-img">
                <img src="assets/img/icon-img/55.png" alt="">
            </div>
            <div class="fruits-services-content">
                <h4 style="font-weight: bold; color: white">Cash on Delivery</h4>
                <p style="color: white">Pembayaran dilakukan secara cash on delivery untuk menjaga transparansi dalam bertransaksi antara pedagang dan pembeli.</p>
            </div>
        </div>
    </div>
</div>

<!-- Random Produk -->
<div class="fruits-top-seller-area pt-125">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-seller-wrapper mb-40">
                    <div class="top-seller-title">
                        <span>Produk Yang Mungkin Anda Suka</span>
                        <h3 style="font-weight: bold">Produk Lainnya!</h3>
                        <img src="assets/img/icon-img/56.png" alt="">
                    </div>
                    @foreach ($rndmProduk as $rp)
                    <div class="top-seller-contect-wrapper">
                        <div class="single-top-seller">
                            <div class="top-seller-img">
                                <a href="{{route('produk.show', $rp)}}">
                                    @if(!empty($rp->cover_img))
                                        <img src="{{asset('storage/'.$rp->cover_img)}}" alt="" style="max-height: 110px; width: 130px; background-position: bottom center">
                                    @else
                                        <img src="assets/img/product/furits/14.jpg" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="top-seller-content">
                                <h5>{{$rp->nama}}</h5>
                                <div class="fruit-price">
                                    <span>@currency($rp->harga)</span>
                                </div>
                                <a href="{{route('produk.show', $rp)}}">Lihat Produk →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
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
@endsection
