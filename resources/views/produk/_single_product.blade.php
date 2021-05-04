<div class="col-lg-3 col-md-6">
    <div class="product-wrapper mb-30">
        <div class="product-img-3">
            <span>
                @if(!empty($produk->cover_img))
                    <img src="{{asset('storage/'.$produk->cover_img)}}" alt="">
                @else
                    <img src="assets/img/product/electro/22.jpg" alt="">
                @endif
            </span>
            <div class="hanicraft-action-position">
                <div class="hanicraft-action">
                    <a class="action-cart" title="Add To Cart" href="{{ route('keranjang.add', $produk->id) }}">
                        <i class="pe-7s-cart"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-content-electro2 text-center">
            <h3><a href="product-details.html">{{$produk->nama}}</a></h3>
            <span>
                {{-- {{$produks->deskripsi}} --}}
            </span>
            <h5>Rp.{{$produk->harga}}</h5>
        </div>
    </div>
</div>
