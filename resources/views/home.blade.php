@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Produk</h2>

    <div class="row">

        @foreach ($allProduk as $produk)
        <div class="card col-3">
            <img class="card-img-top" src="{{asset('dibut.png')}}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">{{$produk->nama}}</h4>
                <p class="card-text">{{$produk->deskripsi}}</p>
                <h3>Rp.{{$produk->harga}}</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('keranjang.add', $produk->id) }}" class="card-link">Tambah ke Keranjang</a>
            </div>
        </div>
        @endforeach



    </div>
</div>
@endsection
