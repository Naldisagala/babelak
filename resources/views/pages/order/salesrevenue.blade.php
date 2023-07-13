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
                                            <th>Status</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    @php
                                        $total = 0;
                                    @endphp
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($transaction as $i => $product)
                                            @php
                                                $total += $product->total;
                                            @endphp
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ date('d/m/Y h:m', strtotime($product->created_at)) }}</td>
                                                <td>{{ $product->resi }}</td>
                                                <td>{{ $product->keranjang->barang->nama_barang }}</td>
                                                <td>{{ !empty($product->is_transfer) ? 'Sudah Ditrasfer' : 'Belum Ditransfer' }}
                                                </td>
                                                <td class="text-end">
                                                    {{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    @if (count($transaction) > 0)
                                        <tfoot>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td class="text-md-end">{{ 'Rp ' . number_format($total, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        </tfoot>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
