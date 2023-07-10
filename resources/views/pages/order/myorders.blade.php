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
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-is-proof"
                                            aria-controls="order-is-proof" aria-selected="true">
                                            Upload Bukti
                                            @if (count($productWaiting) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productWaiting) }}</span>
                                            @endif
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-is-being-packed"
                                            aria-controls="order-is-being-packed" aria-selected="true">
                                            Sedang Dikemas
                                            @if (count($productPackaging) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productPackaging) }}</span>
                                            @endif
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-delivery"
                                            aria-controls="order-delivery" aria-selected="false">
                                            Dikirim
                                            @if (count($productDelivery) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productDelivery) }}</span>
                                            @endif
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-done"
                                            aria-controls="order-done" aria-selected="false">
                                            Selesai
                                            @if (count($productDone) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productDone) }}</span>
                                            @endif
                                        </button>
                                    </nav>
                                </div>
                                <div class="col-md-9">
                                    <div class="nav-align-top mb-4">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="order-is-proof" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th>Upload Bukti Pembayaran Pemesanan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productWaiting as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">

                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="order-is-being-packed" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th>Sedang Dikemas</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productPackaging as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">

                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="order-delivery" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th>Sedang Dikirim</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productDelivery as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">
                                                                                <button type="button"
                                                                                    class="btn btn-primary mx-3">Pesanan
                                                                                    Diterima</button>
                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="order-done" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th>Selesai</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productDone as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">

                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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
