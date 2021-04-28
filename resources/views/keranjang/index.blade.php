@extends('layouts.app')


@section('content')

    <h2>Keranjang Anda</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($keranjangItems as $item)

            <tr>
                <td scope="row">{{ $item->name }}</td>
                <td>
                    {{Cart::session(auth()->id())->get($item->id)->getPriceSum()}}
                </td>
                <td>
                    <form action="{{ route('keranjang.update', $item->id) }}">
                        <input name="quantity" type="number" value="{{ $item->quantity }}">

                        <input type="submit" value="Simpan">

                    </form>
                </td>

                <td>
                    <a href="{{ route('keranjang.destroy', $item->id )}}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h3>
        Total Harga : Rp.{{\Cart::session(auth()->id())->getTotal()}}
    </h3>

    <a class="btn btn-primary" href="#" role="button">Bayar</a>


@endsection
