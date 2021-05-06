@extends('layouts.front')


@section('content')

@include('layouts.line')

<div class="product-details ptb-100 pb-90">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-7 col-12">
                <div class="product-details-5 pr-70">

                    @if(!empty($produk->cover_img))
                        <img src="{{asset('storage/'.$produk->cover_img)}}" alt="">
                    @else
                        <img src="/assets/img/product-details/l1-details-5.png" alt="">
                    @endif

                </div>
            </div>
            <div class="col-md-12 col-lg-5 col-12">
                <div class="product-details-content">
                    <h3>{{$produk->nama}}</h3>
                    <div class="details-price">
                        <span> @currency($produk->harga)</span>
                    </div>
                    <p>{!! $produk->deskripsi !!}</p>

                    <div class="quickview-plus-minus">

                        <div class="quickview-btn-cart">
                            <a class="btn-hover-black" href="{{route('keranjang.add', $produk)}}">tambah ke keranjang</a>
                        </div>

                    </div>
                    <div class="product-details-cati-tag mt-35">
                        <ul>
                            <li class="categories-title">kategori :</li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">electronics</a></li>
                            <li><a href="#">toys</a></li>
                            <li><a href="#">food</a></li>
                            <li><a href="#">jewellery</a></li>
                        </ul>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        <ul>
                            <li class="categories-title">Tags :</li>
                            <li><a href="#">fashion</a></li>
                            <li><a href="#">electronics</a></li>
                            <li><a href="#">toys</a></li>
                            <li><a href="#">food</a></li>
                            <li><a href="#">jewellery</a></li>
                        </ul>
                    </div>
                    <br><br>

                    @if (!empty($produk->toko->nama))
                        <h3>Info Penjual</h3> <br><br>
                        <h4>Nama Toko:</h4> <br>
                        <h5>{{$produk->toko->nama}}</h5> <br> <br>
                        <h4>Informasi Tentang Toko:</h4><br>
                        <h5>{{$produk->toko->deskripsi}}</h5>
                    @else
                        <h5>-</h5>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
