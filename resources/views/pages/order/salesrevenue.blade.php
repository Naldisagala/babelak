<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Pendapatan Penjualan')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">

                    @include('components/tabs', [
                        'active_tab' => 'sales-revenue',
                    ])

                    <div class="tab-content">
                        <div role="tabpanel">
                            <h5 class="font-bold py-3">@yield('title')</h5>
                            <div class="table-responsive text-nowrap">
                                <table class="table datatables">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal/Waktu</th>
                                            <th>No. Resi</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @for ($i = 0; $i < 5; $i++)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ date('d/m/Y h:m') }}</td>
                                                <td>BKL0001</td>
                                                <td>Nama Barang Terjual</td>
                                                <td>Rp.000.000</td>
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
