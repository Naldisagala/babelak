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
                                        <th class="text-center">Status Pemakaian</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @for ($i = 1; $i <= 20; $i++)
                                        <tr>
                                            <td class="text-center">{{ $i }}</td>
                                            <td class="text-center">
                                                <span>ID_P</span>
                                            </td>
                                            <td class="text-center">
                                                <span>Nama Barang</span>
                                            </td>
                                            <td class="text-center">
                                                <span>{{ chr(rand(97, 122)) }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span>Rp. 000.000</span>
                                            </td>
                                            <td class="text-center">
                                                <span>Baik</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="/{{ env('URL_ADMIN', 'admin') }}/item-validation/{{ $i }}"
                                                    class="btn btn-primary mx-2">
                                                    Check
                                                </a>
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
@endsection
