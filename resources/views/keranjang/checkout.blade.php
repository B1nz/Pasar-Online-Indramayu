@extends('layouts.front')


@section('content')

@include('layouts.line')

    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <form action="{{route('orders.store')}}" class="row" method="POST">
                @csrf
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Detail Pengiriman</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Nama Penerima <span class="required">*</span></label>
                                        <input type="text" name="nama_penerima" id="name" class="form-control" required autocomplete="name">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Alamat Penerima <span class="required">*</span></label>
                                        <input type="text" name="alamat_penerima" id="" class="form-control" required autocomplete="address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Telepon Penerima <span class="required">*</span></label>
                                        <input type="number" name="telp_penerima" id="" class="form-control" required autocomplete="phone">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Keterangan Catatan</label>
                                        <input type="text" name="keterangan" id="" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="your-order">
                            <h3>Barang Pesanan</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produk</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($keranjangItems as $item)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $item->name }} <strong class="product-quantity"> × {{ $item->quantity }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">@currency(\Cart::session(auth()->id())->get($item->id)->getPriceSum())</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">@currency(\Cart::session(auth()->id())->getTotal())</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="panel-group" id="faq">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1">Cash on Delivery</a></h5>
                                            </div>
                                            <div id="payment-1" class="panel-collapse collapse show">
                                                <div class="panel-body">
                                                    <p>Demi menjaga transparansi antara pengguna dan pedagang, metode pembayaran yang digunakan adalah cash on delivery atau pembayaran disaat barang tiba.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="Proses order" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


