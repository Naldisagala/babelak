<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'report-finance'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Laporan Keuangan')


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
                            <table class="table datatables-report">
                                <thead class="bg-light-smoth">
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal/Waktu</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Methode</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center">Kategori</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @for ($i = 1; $i <= 100; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ date('d/m/Y h:m') }}</td>
                                            <td class="text-center">Nama Pengirim</td>
                                            <td class="text-center">BCA</td>
                                            <td class="text-center">Rp. 000.000</td>
                                            <td class="text-center">Pemasukan</td>
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
