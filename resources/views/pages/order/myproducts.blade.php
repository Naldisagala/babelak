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
                            <div class="d-flex align-items-center justify-content-end">
                                <button type="button" class="btn btn-primary mb-4">
                                    <i class="fa fa-plus me-2"></i>
                                    Tambah
                                </button>
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
                                        @for ($i = 1; $i <= 6; $i++)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>ID Product</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-2">
                                                            <img width="50" src="/image/default.jpg" alt="Avatar">
                                                        </div>
                                                        <div class="col-10 d-flex align-items-center justify-content-start">
                                                            <span class="ms-3">Nama Product</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">Rp. 000.000</td>
                                                <td class="text-center">Tersedia</td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-primary mx-2">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-primary mx-2">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endfor

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
