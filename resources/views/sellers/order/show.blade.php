<table class="table table-striped" style="padding-bottom: 50px">
    <thead class="thead-dark">
        <tr>
            <th>Nama Barang</th>
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
