<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'users'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Data Pengguna')


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
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Jumlah Barang</th>
                                        <th class="text-center">Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @for ($i = 1; $i <= 20; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-2">
                                                        <img width="50" src="/image/default.jpg" alt="Avatar">
                                                    </div>
                                                    <div class="col-10 d-flex align-items-center justify-content-start">
                                                        <span class="ms-3">Nama</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">username</td>
                                            <td class="text-center">{{ $i + rand(1, 10) }}</td>
                                            <td class="text-center">Aktif</td>
                                            <td class="text-end">
                                                <a href="/{{ env('URL_ADMIN', 'admin') }}/users/{{ $i }}"
                                                    class="btn btn-primary mx-2">
                                                    <i class="fa fa-eye"></i>
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
