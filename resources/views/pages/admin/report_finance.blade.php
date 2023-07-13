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
                                        <th class="text-center">Transfer</th>
                                        <th class="text-center">Jumlah</th>
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
                                            <td class="text-center">{{ ucfirst($product->keranjang->user_seller->name) }}
                                            </td>
                                            <td class="text-center">{{ $product->code_payment }}</td>
                                            <td class="text-center">
                                                @if (!empty($product->is_transfer))
                                                    <span>Sudah Ditrasfer</span>
                                                @else
                                                    <a class="btn btn-outline-primary"
                                                        href="/{{ env('URL_ADMIN', 'admin') }}/transfer/{{ $product->id }}"
                                                        role="button">Tranfer</a>
                                                @endif
                                            </td>
                                            <td class="text-md-end">
                                                {{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                @if (count($transaction) > 0)
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">Total</td>
                                            <td class="text-md-end">{{ 'Rp ' . number_format($total, 0, ',', '.') }}</td>
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
@endsection
