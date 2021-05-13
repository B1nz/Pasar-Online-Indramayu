@component('mail::message')
# Invoice Belanja

<h3>Terimakasih telah berbelanja bersama kami!</h3>

<table class="table">
    <thead>
        <tr>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
            <tr>
                <td scope="row">{{ $item->nama }}</td>
                <td>{{$item->pivot->jumlah}}</td>
                <td>@currency($item->pivot->harga)</td>
            </tr>
        @endforeach
    </tbody>
</table>

<h1>Total : @currency($order->grand_total)</h1>


Terimakasih,<br>
Pasar Online Indramayu
@endcomponent
