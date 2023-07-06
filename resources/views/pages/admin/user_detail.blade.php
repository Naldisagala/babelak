<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'users'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Dashboard')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            Details
        </h4>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img class="rounded-circle" width="250" src="/image/default.jpg" alt="Default">
                                <p class="mt-4">Aktif</p>
                            </div>
                            <div class="col-md-9 px-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mt-4">Nama</p>
                                        <h5><strong>Rasad</strong></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-4">Username</p>
                                        <h5><strong>rasad123</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Jumlah Produk yang Dijual</p>
                                        <h5><strong>rasad123</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Nomor Handphone</p>
                                        <h5><strong>082178563390</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Email</p>
                                        <h5><strong>antoo12@gmail.com</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Nama Instansi</p>
                                        <h5><strong>Universitas Negri Pokok</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Alamat</p>
                                        <h5><strong>Jalan Depan Sana, No. Kota Indah, Kec. Indah Jaya, Kel. Jaya
                                                Baru, 20333</strong></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
