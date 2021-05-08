@extends('layouts.seller')


@section('content')

    <h4>Orders</h4>

    <table class="table">
        <thead>
            <tr>
                <th>Nomor Order</th>
                <th>Status</th>
                <th>Jumlah Item</th>
                <th>Alamat Pengiriman</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $subOrder)
                <tr>
                    <td scope="row">
                        {{$subOrder->order->order_no}}
                    </td>
                    <td>
                        {{$subOrder->status}}

                        @if($subOrder->status != 'completed')

                            <a href=" {{route('seller.order.delivered', $subOrder)}} " class="btn btn-primary btn-sm">Tandai Terkirim</button>
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
                        <a name="" id="" class="btn btn-primary btn-sm" href="{{route('seller.orders.show', $subOrder)}}" role="button">Detail</a>
                    </td>
                </tr>
            @empty

            @endforelse


        </tbody>
    </table>


@endsection
