@extends('../main')

@section('title', 'Barang')

@section('content')

    @php
        // dd($barang->seller->alamat);
        $barang->gambar = explode('|', $barang->gambar);
    @endphp

    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <img class="img-barang" src="{{ $barang->gambar[0] }}" style="max-width: 350px">
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h2><b>{{ $barang->nama_barang }}</b></h2>
                    <h5>{{ 'Rp ' . number_format($barang->harga, 0, ',', '.') }}</h5>
                    <br><br>
                    <p><i class="fa fa-check"></i> <b>Tingkat Pemakaian</b><br><small>{{ $barang->status_barang }}</small>
                    </p>
                    <p><i class="fa fa-location-dot"></i>
                        <b>Lokasi</b><br><small>{{ $barang->seller->alamat->kota }}</small></p>
                    <p><i class="fa fa-credit-card"></i> <b>Pembayaran yang dipakai</b><br><small>Semua Metode</small></p>
                    <div class="">
                        <button class="btn btn-default"
                            style="background: #C65299!important;color:white;width:200px">Beli</button>
                        <button class="btn btn-default" style="background: #C65299!important;color:white"><i
                                class="fa-solid fa-cart-shopping"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Deskripsi Barang</b></h5>
                    <p class="card-text">{{ $barang->deskripsi }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b><img src="{{ url('/image/bangku_kecil.jpeg') }}" class="barang-img-profile"
                                alt="" srcset=""> {{ $barang->seller->nama_toko }}</b> <br><small
                            style="font-size: 12px">{{ $barang->seller->alamat->kota }}</small></h5>
                    <div class="chat-area-barang" style="display: flex; flex-direction: column-reverse;padding:10px;">
                        @if ($barang->status_tawar == 'no')
                            <span style="text-align: center;color:white;font-weight:600">Barang Tidak Dapat Ditawar</span>
                        @else
                            <form action="/tawar/1/{{ $barang->seller->id }}/{{ $barang->id }}/null" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="tawar" placeholder="Ketikkan tawaran"
                                        aria-label="Ketikkan tawaran" aria-describedby="basic-addon2">
                                    <button style="background: #CB63A3!important" class="input-group-text" id="basic-addon2"
                                        type="submit"><i style="color:white;" class="fa fa-paper-plane"></i></button>
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
                                        <span class="rekom-tawar">{{ 'Rp ' . number_format($tawar, 0, ',', '.') }}</span>
                                    </a>
                                @endforeach
                            </div>
                            <div>
                                <div style="overflow-y: scroll; display: flex; flex-direction: column; max-height: 250px;">
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

@endsection
