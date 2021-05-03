@component('mail::message')
# Request Aktivasi Toko

{{-- Berikut merupakan detail request toko, --}}

{{-- Nama Toko : {{$shop->nama}}
Pemilik Toko : {{$shop->owner->nama}}
Deskripsi Toko : {{$shop->deskripsi}} --}}

Toko baru menanti untuk kamu konfirmasi!, klik tombool berikut untuk mengkonfirmasi!

@component('mail::button', ['url' => url('/admin/tokos')])
Manage Shops
@endcomponent

Terimakasih,<br>
Pasar Indramayu
@endcomponent
