@component('mail::message')
# Request Aktivasi Toko

Berikut detail request toko,

Nama Toko : {{$toko->nama}}
Pemilik Toko : {{$toko->owner->nama}}
Deskripsi Toko : {{$toko->deskripsi}}

Toko baru menanti untuk kamu konfirmasi!, klik tombool berikut untuk mengkonfirmasi!

@component('mail::button', ['url' => url('/admin/tokos')])
Manage Shops
@endcomponent

Terimakasih,<br>
Pasar Indramayu
@endcomponent
