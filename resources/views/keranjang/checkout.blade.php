@extends('layouts.app')


@section('content')

    <h2>Checkout</h2>

    <h3>Informasi Alamat Pengiriman</h3>

    <form action="{{route('orders.store')}}" method="post">
        @csrf

        {{-- @include('_errors') --}}

        <div class="form-group">
            <label for="">Nama Penerima</label>
            <input type="text" name="nama_penerima" id="name" class="form-control" required autocomplete="name">
        </div>

        <div class="form-group">
            <label for="">Alamat Penerima</label>
            <input type="text" name="alamat_penerima" id="" class="form-control" required autocomplete="address">
        </div>

        <div class="form-group">
            <label for="">Telepon Penerima</label>
            <input type="number" name="telp_penerima" id="" class="form-control" required autocomplete="phone">
        </div>

        <div class="form-group">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" id="" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Lanjut Proses</button>
    </form>


@endsection
