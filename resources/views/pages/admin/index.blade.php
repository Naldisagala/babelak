<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'dashboard'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Dashboard')


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
                        <div class="row">
                            <div class="col-md-4 offset-md-2">
                                <div class="card bg-light-grey text-center">
                                    <h5 class="card-header"><strong>Jumlah Pengguna</strong></h5>
                                    <div class="card-body">
                                        <h4><strong>{{ $count_user }}</strong></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-light-grey text-center">
                                    <h5 class="card-header"><strong>Barang Masuk</strong></h5>
                                    <div class="card-body">
                                        <h4><strong>{{ $count_product }}</strong></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h5><strong>Barang Masuk</strong></h5>
                                    <a href="/{{ env('URL_ADMIN', 'admin') }}/items-enter"><strong>Lihat
                                            Semua</strong></a>
                                </div>
                                <div class="table-responsive text-nowrap mt-5">
                                    <table class="table table-borderless datatables-simple">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <img width="75"
                                                                    src="{{ str_contains($product['gambar'], '://') ? $product['gambar'] : '/files/product/' . $product['gambar'] }}"
                                                                    alt="{{ $product['nama_barang'] }}">
                                                            </div>
                                                            <div class="col-10 d-flex btn-group-vertical">
                                                                <span
                                                                    class="ms-3"><strong>{{ $product['nama_barang'] }}</strong></span>
                                                                <span
                                                                    class="ms-3 text-end">{{ 'Rp ' . number_format($product['harga'], 2, ',', '.') }}</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="/{{ env('URL_ADMIN', 'admin') }}/item-validation/{{ $product['id'] }}"
                                                            name="view" id="view"
                                                            class="btn btn-primary w-50">Lihat</a>
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
@endsection
