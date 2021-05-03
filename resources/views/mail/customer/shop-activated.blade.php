@component('mail::message')
# Selamat!

Toko anda telah aktif!

@component('mail::button', ['url' => route('toko.index', $toko->id)])
Kunjungi toko anda sekarang!
@endcomponent

Terimakasih,<br>
PasarIndramayu
@endcomponent
