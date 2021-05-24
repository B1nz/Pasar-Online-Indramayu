<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <!-- shopping-cart-area start -->
    <div class="cart-main-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="cart-heading">Keranjang</h1>
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>hapus</th>
                                    {{-- <th>gambar</th> --}}
                                    <th>produk</th>
                                    <th>harga</th>
                                    <th>jumlah</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($keranjangItems as $item)
                                <tr>
                                    <td class="product-remove">
                                        <a href="{{ route('keranjang.destroy', $item['id'] )}}"><i class="pe-7s-close"></i></a>
                                    </td>
                                    {{-- <td class="product-thumbnail">
                                        <span>
                                            @if(!empty($item['cover_img']))
                                                <img src="{{asset('storage/'.$item['cover_img'])}}" alt="">
                                            @else
                                                <img src="assets/img/cart/1.jpg" alt="">
                                            @endif
                                        </span>
                                    </td> --}}
                                    <td class="product-name"><a href="#">{{ $item['name'] }}</a></td>
                                    <td class="product-price-cart"><span class="amount">@currency($item['price'])</span></td>
                                    <td class="product-quantity">
                                        <livewire:keranjang-update-form :item="$item" :key="$item['id']"/>
                                    </td>
                                    <td class="product-subtotal">@currency(Cart::session(auth()->id())->get($item['id'])->getPriceSum())</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Total Belanja</h2>
                                <ul>
                                    <li>Subtotal<span>@currency(\Cart::session(auth()->id())->getTotal())</span></li>
                                </ul>
                                @if (Cart::session(auth()->id())->getContent()->count()  == 0)

                                @else
                                    <a href="{{route('keranjang.checkout')}}">Proceed to checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- shopping-cart-area end -->

</div>
