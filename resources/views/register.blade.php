<!-- Menghubungkan dengan view template master -->
@extends('layouts.auth.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Daftar Akun')


<!-- isi bagian konten -->
@section('content')
    <div class="row">
        <div class="col kiri">
            <div class="card-body">
                <a href="/">
                    <img class="imglogo" src="{{ url('image/logo.png') }}" alt="Logo">
                </a>
            </div>
        </div>
        <div class="col log" style="height: 140vh!important">
            <div class="card-body mt-4">
                <form action="/register-post" method="post">
                    @csrf()
                    <a href="/">
                        <img class="mb-4 pad" src="{{ url('/image/logo_log.png') }}" alt="Logo" width="150"
                            height="57">
                    </a>
                    <h1 class="h3 mb-4 fw-bold mt-5">Register</h1>
                    <div class="pad-form">
                        <div class="row">
                            <div class="col">
                                <h6>Nama</h6>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="name" id="floatingInput"
                                        value="{{ old('name') }}" placeholder="Nama">
                                    <label for="floatingInput">Masukkan Nama</label>
                                    @if ($errors->any())
                                        <small style="color:red">*{{ $errors->first('name') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col">
                                <h6>Username</h6>
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="username" id="floatingInput"
                                        value="{{ old('username') }}" placeholder="Username">
                                    <label for="floatingInput">Masukkan Username</label>
                                    @if ($errors->any())
                                        <small style="color:red">*{{ $errors->first('username') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <h6 class="mt-4">Email</h6>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="floatingPassword"
                                value="{{ old('email') }}" placeholder="email">
                            <label for="floatingPassword">&nbsp&nbsp&nbsp Masukkan Email</label>
                            @if ($errors->any())
                                <small style="color:red">*{{ $errors->first('email') }}</small>
                            @endif
                        </div>

                        <h6 class="mt-4">No Handphone</h6>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="hp" id="floatingPassword"
                                value="{{ old('hp') }}" placeholder="no hp">
                            <label for="floatingPassword">&nbsp&nbsp&nbsp Masukkan No Handphone</label>
                            @if ($errors->any())
                                <small style="color:red">*{{ $errors->first('hp') }}</small>
                            @endif
                        </div>
                        <h6 class="mt-4">Password</h6>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                value="{{ old('password') }}" placeholder="Password">
                            <label for="floatingPassword">&nbsp&nbsp&nbsp Masukkan Password</label>
                            @if ($errors->any())
                                <small style="color:red">*{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <h6 class="mt-4">Konfirmasi Password</h6>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password_confirm" id="floatingPassword"
                                value="{{ old('password_confirm') }}" placeholder="Password">
                            <label for="floatingPassword">&nbsp&nbsp&nbsp Konfirmasi Password</label>
                            @if ($errors->any())
                                <small style="color:red">*{{ $errors->first('password_confirm') }}</small>
                            @endif
                        </div> <br>
                                                
                        <button class="w-100 btn  btn-primary fw-bold" type="submit">Daftar</button>
                        <hr style="width: 100%">
                        <div style="text-align: center">
                            Sudah punya akun? <a href="/login-page">Masuk</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
