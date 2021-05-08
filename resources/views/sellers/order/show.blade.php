@extends('layouts.seller')


@section('content')
<h3>Seluruh Penjualan</h3>

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
        <tr>
            <td scope="row">
                {{$item->nama}}
            </td>
            <td>
                {{$item->pivot->jumlah}}
            </td>
            <td>
                @currency($item->pivot->harga)
            </td>
        </tr>
        @endforeach


    </tbody>
</table>

@endsection
