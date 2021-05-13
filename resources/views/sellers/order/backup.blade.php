Order Index Ori

@extends('layouts.order')


@section('content')

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Waktu</th>
                <th>Nomor Order</th>
                <th>Status</th>
                <th>Jumlah Item</th>
                <th>Alamat Pengiriman</th>
                <th>Detail</th>
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

                            <a href=" {{route('seller.order.tolak', $subOrder)}} " class="btn btn-danger btn-sm">Tolak Pesanan</button>
                        @endif

                        @if($subOrder->status != 'proses' && $subOrder->status != 'selesai' && $subOrder->status != 'gagal')

                            <a href=" {{route('seller.order.proses', $subOrder)}} " class="btn btn-info btn-sm">Proses Pesanan</button>
                        @endif

                        @if($subOrder->status != 'selesai' && $subOrder->status != 'pending' && $subOrder->status != 'gagal')

                            <a href=" {{route('seller.order.delivered')}} " class="btn btn-success btn-sm">Pesanan Selesai</button>
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
                        {{-- <a name="" id="" class="btn btn-warning btn-sm" href="{{route('seller.orders.show', $subOrder)}}" role="button">Detail Pesanan</a> --}}

                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#details-modal" data-order="{{ $subOrder->id }}">
                            Detail Pesanan
                        </button>
                    </td>
                </tr>

            @empty

            @endforelse


        </tbody>
    </table>

    <!-- Modal -->
<div id="details-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="details-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body"></div>
        </div>
    </div>
</div>

<script>
    // Script
$('#details-modal').on('show.bs.modal', event => {
    var order = $(event.relatedTarget).data('order');
    modalBody = $(this).find('.modal-body');
  // show loading spinner while waiting for ajax to be done
    modalBody.html(`
    <div class="text-center">
        <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
        </div>
    </div>
    `);

    $.ajax({
    url: `/orders/${order}`, // the url for your show method
    method: 'get'
    })
    .done(view => modalBody.html(view));
    .fail(error => console.error(error));
});
</script>


@endsection
