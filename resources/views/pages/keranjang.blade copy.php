<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Keranjang')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container">
        <h3 class="py-3 font-bold">Keranjang Belanja</h3>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="row mb-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="select_all"
                                                id="select_all" value="1">
                                            <span class="ms-2">Pilih semua</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-end justify-content-end">
                                    <a href="javascript.void(0)" data-bs-toggle="modal" data-bs-target="#becomeSeller">
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($keranjang as $item)
                    <div class="row mb-3">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="app-brand-link">
                                        <label for="barangToko"><b>{{ ' ' . $item->nama_toko }}</b></label>
                                    </div>
                                    <div class="app-brand-link">
                                        <span>{{ $item->kota }}</span>
                                    </div>
                                </div>
                                <hr>
                                @foreach ($item->list_barang as $items)
                                    @php
                                        $gambar = $items->barang->gambar;
                                    @endphp
                                    <div style="display: flex; justify-content: space-between;">
                                        <div style="display: flex; align-items: center;">
                                            <div class="form-check me-2">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="barangToko"
                                                        id="barangToko" value="1">
                                                </label>
                                            </div>
                                            <div class="card">
                                                <img class="zoom me-3 rounded-3 shadow" width="100px"
                                                    src="{{ str_contains($gambar, '://') ? $gambar : '/files/product/' . $gambar }}"
                                                    alt="{{ $items->nama_barang }}">
                                            </div>
                                            <div style="margin-left: 10px">
                                                <b>{{ $items->barang->nama_barang }}</b><br>
                                                @if ($items->id_tawar == '')
                                                    <small>
                                                        <span>Harga: </span>
                                                        @if ($items->harga_akhir < $items->barang->harga)
                                                            <span class="text-strike-through text-danger">
                                                                {{ 'Rp ' . number_format($items->barang->harga, 0, ',', '.') }}</span>
                                                            <span class="font-bold text-success">
                                                                {{ ' Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                        @else
                                                            <span class="font-bold text-success">
                                                                {{ ' Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                        @endif
                                                    </small>
                                                @else
                                                    <small><span class="font-bold">Harga:
                                                            {{ 'Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span></small>
                                                @endif
                                            </div>
                                        </div>
                                        <div style="display: flex; align-items: center;">
                                            <span><a href="/cart-hapus/{{ $items->id }}"><i
                                                        class="fas fa-trash-alt"></i></a></span>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach

                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row mb-3">
                    <div class="card bg-white"
                        style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="exampleInputName">Catatan </label>
                                </div>
                                <div class="col-9">
                                    <input type="text" class="form-control" id="exampleInputName"
                                        placeholder="Tinggalkan catatan untuk penjual">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="card bg-white"
                        style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="exampleInputName">Harga Pengiriman</label>
                                </div>
                                <div class="col-9">
                                    <div class="text-right">Gratis Ongkir Sistem COD</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card bg-white"
                    style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                Total Pembayaran :
                            </div>
                            <div class="col">
                                <div class="text-right">{{ 'Rp ' . number_format(0, 0, ',', '.') }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <button style="background: #C65299!important" class="btn btn-primary">Buat Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('modal')
    <div class="modal fade" id="removeCartChecked" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Perhatian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/become-seller" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p>Apakah kamu yakin ingin menghapus keranjang yg di tandai ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
