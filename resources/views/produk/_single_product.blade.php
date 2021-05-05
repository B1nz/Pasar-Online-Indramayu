<div class="custom-col-style-2 custom-col-4">
    <div class="product-wrapper product-border mb-24">
        <div class="product-img-3">
            <a href="{{route('produk.show', $produk)}}">
                @if(!empty($produk->cover_img))
                    <img src="{{asset('storage/'.$produk->cover_img)}}" alt="">
                @else
                    <img src="/assets/img/product/electro/1.jpg" alt="">
                @endif
            </a>
            <div class="product-action-right">
                <a class="animate-right" href="{{route('produk.show', $produk)}}" title="View">
                    <i class="pe-7s-look"></i>
                </a>
                <a class="animate-top" title="Add To Cart" href="{{route('keranjang.add', $produk->id)}}">
                    <i class="pe-7s-cart"></i>
                </a>
            </div>
        </div>
        <div class="product-content-4 text-center">
            <h4><a href="{{route('produk.show', $produk)}}">{{$produk->nama}}</a></h4>
            <p> {{$produk->deskripsi}} </p>
            <h5>Rp. {{$produk->harga}}</h5>
            <p> {{$produk->shop->owner->name ?? null}} </p>
        </div>
    </div>
</div>
