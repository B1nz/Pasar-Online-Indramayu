@extends('layouts.front')

@section('content')
<h2>Daftarkan Toko Anda!</h2>

    <form action="{{route('toko.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Toko</label>
            <input type="text" class="form-control" name="nama" id="" aria-describedby="helpId" placeholder="" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Toko</label>
            <textarea class="form-control" name="deskripsi" id="" rows="3" placeholder="Jelaskan secara jelas tentang toko anda! Tidak diwajibkan untuk memiliki toko fisik" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
