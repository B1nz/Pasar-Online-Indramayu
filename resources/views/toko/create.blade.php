@extends('layouts.front')

@section('content')

    <div class="breadcrumb-area pt-205 pb-210" style="background-image: url(/assets/img/ban/ban-cr.png)">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Daftar Toko</h2>
                <ul>
                    <li><a href="{{url('/')}}">home</a></li>
                    <li> daftar </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Catatan area --}}
    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <h3>Catatan :</h3>
                        <p>● Toko anda akan melalui tahap seleksi demi menjaga dari adanya toko palsu</p>
                        <p>● Jika toko anda sudah aktif maka anda akan mendapatkan email notifikasi bahwa toko sudah aktif dan dapat digunakan</p>
                        <p>● Jika anda sudah memiliki toko asli silahkan masukkan nama sesuai dengan nama toko anda</p>
                        <p>● Pastikan anda menjelaskan tentang toko anda pada kolom deskripsi</p>
                        <p>● Anda dapat memasukkan alamatyang dapat dihubungi pada kolom deskripsi</p>
                        <p>● Anda dapat memasukkan kontak yang dapat dihubungi pada kolom deskripsi</p>
                        <p>● Jenis transaksi yang digunakan sementara ini yaitu Cash on Delivery, dimana pembayaran akan dilakukan pada saat pengantaran barang</p>
                        <p>● Jenis transaksi selain Cash on Delivery seperti transfer tidak kami batasi dan dapat dilakukan diluar aplikasi ini</p>
                        <p>● Jasa pengiriman ditanggung oleh pihak penjual dan pembeli, kami tidak menyediakan jasa pengriman</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register-area start -->
    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <h3>Form Daftar Toko</h3>
                        <div class="login-form-container">
                            <div class="login-form">
                                <form action="{{route('toko.store')}}" method="post">
                                    @csrf
                                    <input type="text" name="nama" placeholder="Nama Toko" required>
                                    <input type="text" name="deskripsi" placeholder="Deskripsi Toko" required>
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright">Daftar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register-area end -->

@endsection
