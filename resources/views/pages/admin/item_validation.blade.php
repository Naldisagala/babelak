<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'items-enter'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Validasi Barang')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            @yield('title')
        </h4>

        <div class="row">
            <!-- Basic Buttons -->
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-2">
                                <img class="rounded-circle" width="130" src="/image/default.jpg" alt="Default">
                            </div>
                            <div class="col-md-10">
                                <h5><strong>Nama Penjual</strong></h5>
                                <p>Username</p>
                                <p>Alamat</p>
                            </div>
                            <div class="col-md-12">
                                <div class="row py-5">
                                    <div class="col-md-12">
                                        <h5><strong>Foto</strong></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <img width="300" class="py-3" src="/image/default.jpg" alt="Default">
                                    </div>
                                    <div class="col-md-3">
                                        <img width="300" class="py-3" src="/image/default.jpg" alt="Default">
                                    </div>
                                    <div class="col-md-3">
                                        <img width="300" class="py-3" src="/image/default.jpg" alt="Default">
                                    </div>
                                    <div class="col-md-3">
                                        <img width="300" class="py-3" src="/image/default.jpg" alt="Default">
                                    </div>
                                    <div class="col-md-3">
                                        <img width="300" class="py-3" src="/image/default.jpg" alt="Default">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row pb-5">
                                    <div class="col-md-12">
                                        <h5><strong>Video</strong></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <img width="300" class="py-3" src="/image/default.jpg" alt="Default">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 row py-2">
                                        <div class="col-md-3">
                                            <span><strong>Nama Barang</strong></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>Nama Barang</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row py-2">
                                        <div class="col-md-3">
                                            <span><strong>ID Barang</strong></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>BRG001</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row py-2">
                                        <div class="col-md-3">
                                            <span><strong>Harga</strong></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>Rp. 000.000</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row py-2">
                                        <div class="col-md-3">
                                            <span><strong>Deskripsi Barang</strong></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi
                                                consectetur
                                                impedit doloremque quam est qui sunt ipsum tempore labore assumenda,
                                                mollitia
                                                fugit inventore culpa! Quo quis laboriosam obcaecati voluptatibus.
                                                Molestiae?</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row py-2">
                                        <div class="col-md-3">
                                            <span><strong>Lokasi Domisili/Barang</strong></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>Nama jalan, Kota Kecamatan, Kelurahan Kodepos</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row py-2">
                                        <div class="col-md-3">
                                            <span><strong>Status Pemakaian Barang</strong></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>Transfer, E-Money</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 row py-2">
                                        <div class="col-md-3">
                                            <span><strong>Methode Pembayaran</strong></span>
                                        </div>
                                        <div class="col-md-9">
                                            <span>Pemakaian Ringan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-end pt-5">
                                <button type="button" class="btn btn-primary mx-2">
                                    Terima
                                </button>
                                <button type="button" class="btn btn-outline-primary mx-2">
                                    Tolak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
