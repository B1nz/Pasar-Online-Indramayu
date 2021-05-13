@extends('layouts.front')

@section('content')

<div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</div>

<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url(/assets/img/ban/ban2.png)">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>tabel harga pangan</h2>
            <h3 style="color: white">PUSAT INFORMASI HARGA PANGAN STRATEGIS NASIONAL</h3>
            <ul>
                <li><a href="{{url('/')}}">home</a></li>
                <li style="font-weight: bold">pihps</li>
            </ul>
        </div>
    </div>
</div>

<div class="container-fluid ptb-100">
    <iframe src="https://hargapangan.id/tabel-harga/pasar-tradisional/daerah" height="1700px" width="100%" title="PIHPS"></iframe>
</div>

@endsection
