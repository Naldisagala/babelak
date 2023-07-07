@extends('layouts.main')

@section('title', 'Barang')

@section('content')

    @php
        // dd($barang->seller->alamat);
        $barang->gambar = explode('|', $barang->gambar);
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <img class="img-barang w-100" src="{{ $barang->gambar[0] }}" style="max-width: 350px">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5><b>{{ $barang->nama_barang }}</b></h5>
                        <h2><strong>{{ 'Rp ' . number_format($barang->harga, 0, ',', '.') }}</strong></h2>
                        <br><br>
                        <p>
                            <i class="fa fa-check me-3"></i>
                            <b>Tingkat Pemakaian</b><br>
                            <small class="ms-4 ps-2">{{ $barang->status_barang }}</small>
                        </p>
                        <p>
                            <i class="fa fa-location-dot me-3"></i>
                            <b>Lokasi</b><br>
                            <small class="ms-4 ps-2">{{ $barang->seller->alamat->kota }}</small>
                        </p>
                        <p>
                            <i class="fa fa-credit-card  me-3"></i>
                            <b>Pembayaran yang dipakai</b><br>
                            <small class="ms-4 ps-2">Semua Metode</small>
                        </p>
                        <div class="mt-5">
                            <button class="btn btn-primary w-50 me-3">Beli</button>
                            <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><b>Deskripsi Barang</b></h5>
                        <p class="card-text">{{ $barang->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">
                            <div class="row">
                                <div class="col-1">
                                    <img src="{{ url('/image/bangku_kecil.jpeg') }}" class="barang-img-profile"
                                        alt="Penjual">
                                </div>
                                <div class="col-11 ps-4">
                                    <h5><strong>{{ $barang->seller->nama_toko }}</strong></h5>
                                    <small style="font-size: 12px">{{ $barang->seller->alamat->kota }}</small>
                                </div>
                            </div>
                        </h5>
                        <div class="chat-area-barang mt-4"
                            style="display: flex; flex-direction: column-reverse;padding:10px;">
                            @if ($barang->status_tawar == 'no')
                                <span class="text-center text-white fw-bold">Barang Tidak Dapat
                                    Ditawar</span>
                            @else
                                <form action="/tawar/1/{{ $barang->seller->id }}/{{ $barang->id }}/null" method="POST">
                                    @csrf
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" name="tawar"
                                            placeholder="Ketikkan tawaran" aria-label="Ketikkan tawaran"
                                            aria-describedby="basic-addon2">
                                        <button style="background: #CB63A3!important" class="input-group-text"
                                            id="basic-addon2" type="submit"><i style="color:white;"
                                                class="fa fa-paper-plane"></i></button>
                                    </div>
                                </form>
                                <br>
                                <div>
                                    @php
                                        $rekomendasi_tawar = [$barang->harga - ($barang->harga * 5) / 100, $barang->harga - ($barang->harga * 10) / 100, $barang->harga - ($barang->harga * 15) / 100];
                                    @endphp
                                    @foreach ($rekomendasi_tawar as $tawar)
                                        <a style="text-decoration: none"
                                            href="/tawar/1/{{ $barang->seller->id }}/{{ $barang->id }}/{{ $tawar }}">
                                            <span
                                                class="rekom-tawar">{{ 'Rp ' . number_format($tawar, 0, ',', '.') }}</span>
                                        </a>
                                    @endforeach
                                </div>
                                <div>
                                    <div
                                        style="overflow-y: scroll; display: flex; flex-direction: column; max-height: 250px;">
                                        @if (count($barang->tawar) > 0)
                                            @foreach ($barang->tawar as $tawar)
                                                <div>
                                                    <div class="bubble-chat">
                                                        Saya menawar:
                                                        <b>{{ 'Rp ' . number_format($tawar->harga_tawar, 0, ',', '.') }}</b>
                                                        <br>
                                                        <small style="font-size: 10px">Status: {{ $tawar->status }}</small>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <br>
                                            <span style="text-align: center; color: white; font-weight: 600">Silahkan
                                                Tawar</span>
                                            <br>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
