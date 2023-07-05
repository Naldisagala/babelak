<!-- Menghubungkan dengan view template master -->
@extends('layouts.auth.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Pesanan Saya')


<!-- isi bagian konten -->
@section('content')
    <DIV class="row">
        <div class="col kiri">
            <div class="card-body">
                <img class="imglogo" src="{{ url('image/logo.png') }}" alt="">
            </div>
        </div>
        <div class="col log" style="height: 100vh!important">
            <div class="card-body mt-4">
                <form method="post" action="/login-post">
                    @csrf()
                    <img class="mb-4 pad" src="{{ url('/image/logo_log.png') }}" alt="" width="150"
                        height="57">
                    <h1 class="h3 mb-4 fw-bold mt-5">Login</h1>
                    <div class="pad-form">
                        <h6>Email</h6>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput">Masukkan Email</label>
                        </div>
                        <h6 class="mt-4">Password</h6>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="checkbox mb-3 row my-3">
                            <label class="col-7">
                                <input type="checkbox" value="remember-me"> Ingat saya
                            </label>
                            <label class="col-5" style="text-align: right">
                                <a>Lupa Password?</a>
                            </label>
                        </div>
                        <button class="w-100 btn btn-primary fw-bold" type="submit">Login</button>
                        <hr style="width: 100%">
                        <div style="text-align: center">
                            <br>
                            Belum punya akun? <a href="/register-page">Daftar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
