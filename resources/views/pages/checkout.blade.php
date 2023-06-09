<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Detail Belanja')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container">
        <h3 class="py-3 font-bold">@yield('title')</h3>
        <br>
        <form action="/checkout" method="POST">
            @csrf()
            <div class="row">
                <div class="col-6">
                    <div class="row mb-3">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <i class="fa fa-location-dot me-3"></i>
                                        <span class="font-bold ps-md-2">Alamat Pengiriman</span>
                                        <hr>
                                    </div>
                                    <div class="col-md-6 ps-md-5">
                                        <span class="font-bold ">{{ Str::ucfirst($user->name) }}</span>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <span class="font-bold">{{ $user->hp }}</span>
                                    </div>
                                    <div class="col-md-12 ps-md-5 my-3">
                                        @php
                                            $isAddress = false;
                                        @endphp
                                        <span>
                                            @if (!empty($user->alamat))
                                                @php
                                                    $isAddress = true;
                                                @endphp
                                                {{ !empty($user->address) ? $user->address . ', ' : '' }}
                                                {{ 'Kel. ' . $user->alamat }},
                                                {{ 'Kec. ' . ucwords(strtolower($user->kec)) }},
                                                {{ ucwords(strtolower($user->kota)) }} -
                                                {{ ucwords(strtolower($user->provinsi)) }} -
                                                {{ $user->kode_pos }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($keranjang as $item)
                        <div class="row mb-3">
                            <div class="card bg-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="app-brand-link">
                                            <label for="barangToko"><b>{{ ' ' . $item->nama_toko }}</b></label>
                                        </div>
                                        <input type="hidden" name="id_serller[]" id="id_serller"
                                            value="{{ $item->id_seller }}">
                                        <div class="app-brand-link">
                                            <span>{{ $item->kota }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    @foreach ($item->list_barang as $items)
                                        @php
                                            $gambar = $items->barang->gambar;
                                        @endphp
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="card">
                                                    <img class="zoom me-3 rounded-3 shadow" width="100px"
                                                        src="{{ str_contains($gambar, '://') ? $gambar : '/files/product/' . $gambar }}"
                                                        alt="{{ $items->nama_barang }}">
                                                </div>
                                                <div style="margin-left: 10px">
                                                    <b>{{ $items->barang->nama_barang }}</b><br>
                                                    @php
                                                        $total += $items->harga_akhir;
                                                    @endphp
                                                    @if (!empty($items->id_tawar))
                                                        <h5 class="mt-3">
                                                            @if ($items->harga_akhir < $items->barang->harga)
                                                                <span class="text-strike-through text-danger">
                                                                    {{ 'Rp ' . number_format($items->barang->harga, 0, ',', '.') }}</span>
                                                                <span class="font-bold ">
                                                                    {{ ' Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                            @else
                                                                <span class="font-bold ">
                                                                    {{ ' Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                            @endif
                                                        </h5>
                                                    @else
                                                        <h5 class="mt-3">
                                                            <span
                                                                class="font-bold">{{ 'Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                        </h5>
                                                    @endif
                                                </div>
                                            </div>
                                            <input type="hidden" name="cart_id_{{ $item->id_seller }}[]"
                                                id="cart_id_{{ $items->id }}" value="{{ $items->id }}">
                                            <input type="hidden" name="product_name_{{ $item->id_seller }}[]"
                                                id="product_name_{{ $items->id }}"
                                                value="{{ $items->barang->nama_barang }}">
                                            <input type="hidden" name="total_{{ $item->id_seller }}[]"
                                                id="total_{{ $items->id }}" value="{{ $items->harga_akhir }}">
                                        </div>
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="card bg-white">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="exampleInputName">Catatan </label>
                                        </div>
                                        <div class="col-9">
                                            <input type="hidden" class="form-control"
                                                id="number_payment_{{ $item->id_seller }}"
                                                name="number_payment_{{ $item->id_seller }}"
                                                value="{{ rand(1000000, 9999999) }}">
                                            <input type="text" class="form-control" id="note_{{ $item->id_seller }}"
                                                name="note_{{ $item->id_seller }}"
                                                placeholder="Tinggalkan catatan untuk penjual">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <input type="hidden" name="id_user" id="id_user" value="{{ auth()->user()->id }}">
                    <div class="row mb-3">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="row">
                                    {{-- <div class="col-md-12 mb-5">
                                        <span class="font-bold">Kurir</span>
                                        <div class="form-check mt-3">
                                            <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                                id="defaultRadio1">
                                            <label class="form-check-label" for="defaultRadio1"> Unchecked </label>
                                        </div>
                                        <div class="form-check">
                                            <input name="default-radio-1" class="form-check-input" type="radio" value=""
                                                id="defaultRadio2" checked="">
                                            <label class="form-check-label" for="defaultRadio2"> Checked </label>
                                        </div>
                                    </div> --}}
                                    <div class="col-3">
                                        <span class="font-bold">Harga Pengiriman</span>
                                    </div>
                                    <div class="col-9 text-end">
                                        <span>Hubungi penjual terlebih dahulu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="btn w-100 d-flex justify-content-between" data-bs-toggle="collapse"
                                            href="#collapse-bank" role="button" aria-expanded="true"
                                            aria-controls="collapse-bank">
                                            <span class="font-bold">
                                                <i class="fa fa-building-columns me-2"></i>
                                                <span>Transfer Bank</span>
                                            </span>
                                            <i class="fa fa-chevron-down"></i>
                                        </a>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="collapse show" id="collapse-bank" style="">
                                            <div class="d-grid d-sm-flex px-3 border">
                                                <div class="col-md-12 mb-4 mt-2">
                                                    <div class="form-check my-2">
                                                        <input name="bank" class="form-check-input" type="radio"
                                                            value="BCA" id="bank-bca" checked>
                                                        <label class="form-check-label ms-2" for="bank-bca"> BCA </label>
                                                    </div>
                                                    <div class="form-check my-2">
                                                        <input name="bank" class="form-check-input" type="radio"
                                                            value="BNI" id="bank-bni">
                                                        <label class="form-check-label ms-2" for="bank-bni"> BNI </label>
                                                    </div>
                                                    <div class="form-check my-2">
                                                        <input name="bank" class="form-check-input" type="radio"
                                                            value="BRI" id="bank-bri">
                                                        <label class="form-check-label ms-2" for="bank-bri"> BRI </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span>Total Pembayaran :</span>
                                </div>
                                <div class="col-md-6 text-end">
                                    <span class="font-bold">{{ 'Rp ' . number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <span class="font-bold">Total Pembayaran :</span>
                                </div>
                                <div class="col-md-6 text-end">
                                    <span class="font-bold">{{ 'Rp ' . number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" @if ($total == 0 || !$isAddress) disabled @endif
                                    class="btn btn-primary">Buat Pesanan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
