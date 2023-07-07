<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'booking'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Pemesanan Diterima')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            @yield('title')
        </h4>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row row-cols-1 row-cols-md-1s g-4 mb-5">
                            @for ($i = 0; $i < 5; $i++)
                                <div class="col">
                                    <div class="card w-100">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img width="130" class="rounded-circle"
                                                        src="/image/default.jpg"
                                                        alt="Card image cap">
                                                </div>
                                                <div
                                                    class="col-md-7 d-flex align-items-center justify-content-start">
                                                    <ul class="list-style-none">
                                                        <li><strong>Nama Barang</strong></li>
                                                        <li><strong>Rp. 000.000</strong></li>
                                                        <li><span>Nama Pembeli</span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 text-end">
                                                    <span>Nama Penjual</span>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                                <div
                                                    class="col-md-12 d-flex align-items-center justify-content-end">
                                                    <span>tanggal, waktu</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
