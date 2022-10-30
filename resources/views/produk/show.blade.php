@extends('layouts.front')


@section('content')

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

                    <br>

                    @if (!empty($produk->updated_at))
                        <span>Diupdate Pada : </span>
                        <p>{{$produk->updated_at}}</p>
                    @else
                        <span>Ditambahkan Pada : </span>
                        <p>{{$produk->created_at}}</p>
                    @endif

                    <div class="quickview-plus-minus">

                        <div class="quickview-btn-cart">
                            <a class="btn-hover-black" href="{{route('keranjang.add', $produk)}}">tambah ke keranjang</a>
                        </div>

                    </div>
                    {{-- <div class="product-details-cati-tag mt-35">
                        <ul><li class="categories-title">Kategori :</li></ul>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{route('produk.index', ['category_id'=>$category->id])}}">{{$category->produk->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="product-details-cati-tag mtb-10">
                        <ul><li class="categories-title">Tags :</li></ul>
                        <ul>
                            @foreach ($categories as $category)
                            @php
                                $children = TCG\Voyager\Models\Category::where('parent_id', $category->id)->get();
                            @endphp

                            @foreach ($children as $child)
                                <li><a href="{{route('produk.index', ['category_id'=>$child->id])}}">{{$child->name}}</a></li>

                                @php
                                    $grandchild = TCG\Voyager\Models\Category::where('parent_id', $child->id)->get();
                                @endphp

                                @foreach ($grandchild as $c)
                                    <li><a href="{{route('produk.index', ['category_id'=>$c->id])}}">{{$c->name}}</a></li>
                                @endforeach

                            @endforeach
                            @endforeach
                        </ul>
                    </div> --}}
                    <br><br><br><br>

                    @if (!empty($produk->toko->nama))
                        <h3>Info Penjual</h3> <br>
                        <h5>Nama Toko:</h5> <br>
                        <h6>{{$produk->toko->nama}}</h6> <br> <br>
                        <h5>Informasi Tentang Toko:</h5><br>
                        <h6>{{$produk->toko->deskripsi}}</h6>
                    @else
                        <h5>-</h5>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
