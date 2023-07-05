<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Keranjang')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container">
        <h2><b>Keranjang Belanja</b></h2>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="row mb-3">
                    <div class="card bg-white"
                        style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                        <div class="card-body">
                            <div>
                                <form action="">
                                    <input type="checkbox" class="form-input" name="" id="">
                                    Pilih semua
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($keranjang as $item)
                    <div class="row mb-3">
                        <div class="card bg-white"
                            style="border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 10px;">
                            <div class="card-body">
                                <div style="display: flex; justify-content: space-between;">
                                    <div style="display: flex; align-items: center;">
                                        <input type="checkbox" class="form-input" name="barangToko" value=""
                                            id="">
                                        <label for="barangToko"><b>{{ ' ' . $item->nama_toko }}</b></label>
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <span>{{ $item->kota }}</span>
                                    </div>
                                </div>
                                <hr style="background: grey">
                                @foreach ($item->list_barang as $items)
                                    @php
                                        $gambar = explode('|', $items->barang->gambar);
                                        // dd($items);
                                    @endphp
                                    <div style="display: flex; justify-content: space-between;">
                                        <div style="display: flex; align-items: center;">
                                            <input type="checkbox" class="form-input" name="barangToko" value=""
                                                id="">
                                            <img src="{{ $gambar[0] }}" width="100px" alt="" srcset="">
                                            <div style="margin-left: 10px">
                                                <b>{{ $items->barang->nama_barang }}</b><br>
                                                @if ($items->id_tawar == '')
                                                    <small>
                                                        <span style="text-decoration: line-through; color: red;">Harga:
                                                            {{ 'Rp ' . number_format($items->barang->harga, 0, ',', '.') }}</span>
                                                        <span style="font-weight: bold; color: green;">
                                                            {{ ' Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                    </small>
                                                @else
                                                    <small><span style="font-weight: bold;">Harga:
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
