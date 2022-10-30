@extends('layouts.order')


@section('content')

<div class="container-fluid">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Waktu</th>
                <th>Nomor Order</th>
                <th>Status</th>
                <th>Jumlah Item</th>
                <th>Alamat Pengiriman</th>
                <th>Detail Barang Pesanan</th>
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
                        {{$subOrder->status}}

                        <br>
                        @if($subOrder->status != 'proses' && $subOrder->status != 'selesai' && $subOrder->status != 'gagal')

                            <a href=" {{route('seller-order.tolak', $subOrder)}} " class="btn btn-danger btn-sm">Tolak Pesanan</button>
                        @endif

                        @if($subOrder->status != 'proses' && $subOrder->status != 'selesai' && $subOrder->status != 'gagal')

                            <a href=" {{route('seller-order.proses', $subOrder)}} " class="btn btn-info btn-sm">Proses Pesanan</button>
                        @endif

                        @if($subOrder->status != 'selesai' && $subOrder->status != 'pending' && $subOrder->status != 'gagal')

                            <a href=" {{route('seller-order.delivered')}} " class="btn btn-success btn-sm">Pesanan Selesai</button>
                        @endif
                    </td>

                    <td>
                        {{$subOrder->item_count}}
                    </td>

                    <td>
                        Nama : {!! $subOrder->order->nama_penerima !!} <br>
                        Alamat : {!! $subOrder->order->alamat_penerima !!} <br>
                        Telepon : {!! $subOrder->order->telp_penerima !!} <br>
                        Keterangan : {!! $subOrder->order->keterangan !!}
                    </td>

                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#details-modal-{{ $subOrder->id }}">
                            Detail Pesanan
                        </button>
                    </td>
                </tr>

            @empty

            @endforelse


        </tbody>
    </table>
</div>

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
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach


@endsection
