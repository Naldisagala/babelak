<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Produk Saya')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">

                    @include('components/tabs', [
                        'active_tab' => 'my-products',
                    ])

                    <div class="tab-content">
                        <div role="tabpanel">
                            <h4 class="mb-5"><strong>@yield('title')</strong></h4>
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="/product" class="btn btn-primary mb-4">
                                    <i class="fa fa-plus me-2"></i>
                                    Tambah
                                </a>
                            </div>
                            <div class="table-responsive text-nowrap">
                                <table class="table datatables">
                                    <thead class="bg-light-smoth">
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Product</th>
                                            <th>Info Product</th>
                                            <th class="text-center">Harga</th>
                                            <th class="text-center">Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($products as $inc => $product)
                                            <tr>
                                                <td>{{ $inc + 1 }}</td>
                                                <td>{{ $product['id'] }}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <img width="50"
                                                                src="/files/product/{{ $product['gambar'] }}"
                                                                alt="Default">
                                                        </div>
                                                        <div class="col-10 d-flex align-items-center justify-content-start">
                                                            <span class="ms-3">{{ $product['nama_barang'] }}</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end">
                                                    {{ 'Rp ' . number_format($product['harga'], 2, ',', '.') }}</td>
                                                <td class="text-center">
                                                    {{ $product['stock'] > 0 ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-primary mx-2">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-primary mx-2">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
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
@endsection
