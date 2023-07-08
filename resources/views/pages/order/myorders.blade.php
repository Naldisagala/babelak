<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Pesanan Saya')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">

                    @include('components/tabs', [
                        'active_tab' => 'my-orders',
                    ])

                    <div class="tab-content">
                        <div role="tabpanel">
                            <div class="row">
                                <div class="col-md-2">
                                    <nav class="nav  nav-pills nav-stacked">
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between active"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-is-being-packed"
                                            aria-controls="order-is-being-packed" aria-selected="true">
                                            Sedang Dikemas
                                            <span
                                                class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">3</span>
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-delivery"
                                            aria-controls="order-delivery" aria-selected="false">
                                            Dikirim
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-done"
                                            aria-controls="order-done" aria-selected="false">
                                            Selesai
                                        </button>
                                    </nav>
                                </div>
                                <div class="col-md-9">
                                    <div class="nav-align-top mb-4">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="order-is-being-packed"
                                                role="tabpanel">
                                                <div class="row row-cols-1 row-cols-md-1s g-4 mb-5">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <div class="col">
                                                            <div class="card w-100">
                                                                <div class="card-body bg-light-smoth">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>Nama Penjual</h6>
                                                                        </div>
                                                                        <div class="col-md-6 text-end">
                                                                            <span>Sedang Dikemas</span>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <img class="card-img-top"
                                                                                src="/image/default.jpg"
                                                                                alt="Card image cap">
                                                                        </div>
                                                                        <div
                                                                            class="col-md-10 d-flex align-items-center justify-content-start">
                                                                            <ul class="list-style-none">
                                                                                <li><span>Nama Barang</span></li>
                                                                                <li><strong>Rp. 000.000</strong></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <ul class="list-style-none">
                                                                                <li><span>Total Pembayaran</span></li>
                                                                                <li><strong>Rp. 000.000</strong></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-8 d-flex align-items-center justify-content-end">
                                                                            <button type="button"
                                                                                class="btn btn-primary mx-3">Pesanan
                                                                                Diterima</button>
                                                                            <a href="/chat" class="btn btn-secondary">Chat
                                                                                Penjual</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="order-delivery" role="tabpanel">
                                                <div class="row row-cols-1 row-cols-md-1s g-4 mb-5">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <div class="col">
                                                            <div class="card w-100">
                                                                <div class="card-body bg-light-smoth">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>Nama Penjual</h6>
                                                                        </div>
                                                                        <div class="col-md-6 text-end">
                                                                            <span>Dikirim</span>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <img class="card-img-top"
                                                                                src="/image/default.jpg"
                                                                                alt="Card image cap">
                                                                        </div>
                                                                        <div
                                                                            class="col-md-10 d-flex align-items-center justify-content-start">
                                                                            <ul class="list-style-none">
                                                                                <li><span>Nama Barang</span></li>
                                                                                <li><strong>Rp. 000.000</strong></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <ul class="list-style-none">
                                                                                <li><span>Total Pembayaran</span></li>
                                                                                <li><strong>Rp. 000.000</strong></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-8 d-flex align-items-center justify-content-end">
                                                                            <button type="button"
                                                                                class="btn btn-primary mx-3">Pesanan
                                                                                Diterima</button>
                                                                            <a href="/chat" type="button"
                                                                                class="btn btn-secondary">Chat
                                                                                Penjual</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="order-done" role="tabpanel">
                                                <div class="row row-cols-1 row-cols-md-1s g-4 mb-5">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <div class="col">
                                                            <div class="card w-100">
                                                                <div class="card-body bg-light-smoth">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>Nama Penjual</h6>
                                                                        </div>
                                                                        <div class="col-md-6 text-end">
                                                                            <span>Selesai</span>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <img class="card-img-top"
                                                                                src="/image/default.jpg"
                                                                                alt="Card image cap">
                                                                        </div>
                                                                        <div
                                                                            class="col-md-10 d-flex align-items-center justify-content-start">
                                                                            <ul class="list-style-none">
                                                                                <li><span>Nama Barang</span></li>
                                                                                <li><strong>Rp. 000.000</strong></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="col-md-12">
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <ul class="list-style-none">
                                                                                <li><span>Total Pembayaran</span></li>
                                                                                <li><strong>Rp. 000.000</strong></li>
                                                                            </ul>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-8 d-flex align-items-center justify-content-end">
                                                                            <button type="button"
                                                                                class="btn btn-primary mx-3">Pesanan
                                                                                Diterima</button>
                                                                            <a href="/chat" type="button"
                                                                                class="btn btn-secondary">Chat
                                                                                Penjual</a>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
