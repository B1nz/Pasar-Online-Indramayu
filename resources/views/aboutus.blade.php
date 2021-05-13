@extends('layouts.front', ($keranjangItems = \Cart::session(auth()->id())->getContent()))

@section('content')

<div class="breadcrumb-area pt-205 pb-210" style="background-image: url(assets/img/ban/ban1.png)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>about us</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li> about us </li>
            </ul>
        </div>
    </div>
</div>
<div class="about-story pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="story-img">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="story-details pl-50">
                    <div class="story-details-top">
                        <h2>Selamat Datang di  <span>Pasar Indramayu</span></h2>
                        <p>Dimana pasar dapat diakses darimanapun anda berada. </p>
                    </div>
                    <div class="story-details-bottom">
                        <h4>Bermula di 2020</h4>
                        <p>Aplikasi ini berwawal dari tugas akhir dalam menyelesaikan program studi D3.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="team-area">
    <img src="assets/img/about/about.png" alt="">
</div>
<!-- testimonials area start -->
<div class="testimonials-area pt-100 pb-95 bg-img" style="background-image: url(assets/img/bg/7.jpg)">
    <div class="container">
        <h3 style="color: black">Tujuan Kami</h3>
        <div class="row">
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>MEMBUKA PELUANG USAHA</h3>
                    <p>Di pasar online ini siapa pun dapat berjualan tidak terbatas untuk pedagang yang sudah memiliki toko fisik.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>MENGHUBUNGKAN ANTARA PEDAGANG DAN PELANGGAN</h3>
                    <p>Meskipun terhalang pandemi, pedagang dan pelanggan dapat tetap bertemu tanpa harus bertemu langsung di kerumunan banyak seperti pasar.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="goal-wrapper mb-30">
                    <h3>MENJAGA HARGA PASAR</h3>
                    <p>Dengan tetap terhubungnya pelanggan dan pedagang maka dapat diharapkan akan menjaga perputaran pasar sehingga harga pasar akan tetap setabil.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
