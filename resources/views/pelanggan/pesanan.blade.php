@extends('layouts.front', ($keranjangItems = \Cart::session(auth()->id())->getContent()))

@section('content')

<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(/assets/img/ban/ban-pesanan2.png)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2> Daftar Pesanan</h2>
            <ul>
                <li><a href="{{url('/')}}">home</a></li>
                <li>Pesanan</li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid ptb-30">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Waktu</th>
                <th>Nomor Order</th>
                <th>Nama Toko</th>
                <th>Barang</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $subOrder)
                <tr>

                    <td>{{$subOrder->created_at}}</td>

                    <td scope="row">
                        {{$subOrder->order->order_no}}
                    </td>

                    <td>
                        {{$subOrder->toko->nama}}
                    </td>

                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#details-modal-{{ $subOrder->id }}" data-backdrop="static" data-keyboard="false">
                            Detail Pesanan
                        </button>
                    </td>

                    <td>
                        @currency($subOrder->grand_total)
                    </td>

                    <td>
                        @if ($subOrder->status == 'pending')
                            <button class="btn btn-warning">PENDING</button>
                        @elseif ($subOrder->status == 'proses')
                            <button class="btn btn-info">PROSES</button>
                        @elseif ($subOrder->status == 'selesai')
                            <button class="btn btn-success">SELESAI</button>
                        @elseif ($subOrder->status == 'gagal')
                            <button class="btn btn-danger">DITOLAK</button>
                        @endif
                    </td>
                </tr>

            @empty

            @endforelse
        </tbody>
    </table>

    @foreach ($orders as $subOrder)
        <div id="details-modal-{{ $subOrder->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="details-modal-{{ $subOrder->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Detail Barang Pesanan</h2>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped" style="padding-bottom: 50px">
                            <thead class="thead-dark">
                            <tr>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($subOrder->items as $item)
                                <tr>
                                    <td scope="row">{{ $item->nama }}</td>
                                    <td>{{ $item->pivot->jumlah }}</td>
                                    <td>@currency($item->pivot->harga)</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onClick="window.location.reload();" aria-label="Close">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
