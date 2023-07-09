<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'users'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Details')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            @yield('title')
        </h4>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <img class="rounded-circle" width="250"
                                    src="{{ !empty($user->photo) ? '/files/profile/' . $user->photo : '/image/default.jpg' }}"
                                    alt="Default">
                                <p class="mt-4">Aktif</p>
                            </div>
                            <div class="col-md-9 px-5">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="mt-4">Nama</p>
                                        <h5><strong>{{ $user->name }}</strong></h5>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mt-4">Username</p>
                                        <h5><strong>{{ $user->username }}</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Jumlah Produk yang Dijual</p>
                                        <h5><strong>{{ $user->sum_product($user->id) }}</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Nomor Handphone</p>
                                        <h5><strong>{{ $user->hp }}</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Email</p>
                                        <h5><strong>{{ $user->email }}</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Nama Instansi</p>
                                        <h5><strong>{{ $user->institute }}</strong></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="mt-4">Alamat</p>
                                        <h5><strong>{{ $user->address }}</strong></h5>
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
