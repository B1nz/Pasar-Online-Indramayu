@extends('layouts.front')

@section('content')

{{-- Catatan area --}}
<div class="register-area ptb-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                <div class="login">
                    <h3>Catatan :</h3>
                    <p>● Pastikan anda mengisi data diri degan benar.</p>
                    <p>● Hanya ubah bagian yang ingin diubah.</p>
                    <p>● Bagian yang tidak diubah bisa dibiarkan saja.</p>
                    <p>● Bagian password hanya diisi jika ingin diubah.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- edit-profile-area start -->
<div class="register-area ptb-20">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
                <h2>Ubah Data Diri</h2>
                <div class="login">
                    <div class="login-form-container">
                        <div class="login-form">
                            <form action="{{ route('edit.update') }}" method="post">
                                @csrf
                                @foreach ($userData as $user)

                                <label>Nama Lengkap</label>
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" value="{{$user->name}}">

                                <label>Alamat</label>
                                <input id="alamat" type="text" class="form-contro" name="alamat" required autocomplete="alamat" value="{{$user->alamat}}">

                                <label>No. Handphone</label>
                                <input id="no_hp" type="number" class="form-control" name="no_hp" required autocomplete="no_hp" value="{{$user->no_hp}}">

                                <label>Email</label>
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" value="{{$user->email}}">

                                <label>Password</label>
                                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password" placeholder="Password">

                                <label>Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Konfirmasi Password">
                                @endforeach
                                <div class="button-box">
                                    <button type="submit" class="default-btn floatright">Simpan</button>
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
