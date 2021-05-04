@extends('layouts.front')

@section('content')

    <div class="container">
        <h2>Produk {{ $categoryName ?? null }}</h2>

        <div class="custom-row-2">

            @if ($produks == NULL)
                <h4>Produk Tidak Ditemukan</h4>
            @else
                @foreach ($produks as $produk)

                    @include('produk._single_product')

                @endforeach
            @endif

        </div>
    </div>

@endsection
