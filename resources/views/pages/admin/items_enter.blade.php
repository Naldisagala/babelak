<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'items-enter'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Barang Masuk')


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
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table datatables">
                                <thead class="bg-light-smoth">
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Status Pemakaian</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($products as $inc => $product)
                                        <tr>
                                            <td class="text-center">{{ $inc + 1 }}</td>
                                            <td class="text-center">
                                                <span>{{ $product->id }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{ $product->nama_barang }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{ $product->name }}</span>
                                            </td>
                                            <td class="text-end">
                                                <span>{{ 'Rp ' . number_format($product['harga'], 2, ',', '.') }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{ $product->status }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{ strtoupper($product->usage) }}</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="/{{ env('URL_ADMIN', 'admin') }}/item-validation/{{ $product->id }}"
                                                    class="btn btn-primary mx-2">
                                                    Check
                                                </a>
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
@endsection
