@extends('layouts.main')

@section('title', 'Barang')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-body d-flex align-items-center justify-content-center">

                        @if (!empty($gallery) && count($gallery) > 1)
                            <div id="carouselExample-cf" class="carousel carousel-dark slide carousel-fade"
                                data-bs-ride="carousel">
                                <ol class="carousel-indicators">
                                    @foreach ($gallery as $inc => $file)
                                        <li data-bs-target="#carouselExample-cf" data-bs-slide-to="{{ $inc }}"
                                            @if ($inc == 0) class="active"
                                        aria-current="true" @endif>
                                        </li>
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach ($gallery as $inc => $file)
                                        <div
                                            class="carousel-item @if ($inc == 0) active @else carousel-item-start carousel-item-next @endif ">
                                            <img class="zoom d-block w-100" src="/files/product/{{ $file['name'] }}"
                                                alt="First slide">
                                        </div>
                                    @endforeach

                                </div>
                                <a class="carousel-control-prev" href="#carouselExample-cf" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExample-cf" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        @else
                            <img class="img-barang w-100"
                                src="{{ str_contains($barang->gambar, '://') ? $barang->gambar : '/files/product/' . $barang->gambar }}"
                                alt="{{ $barang->nama_barang }}" class="zoom" style="max-width: 350px">
                        @endif


                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5><b>{{ $barang->nama_barang }}</b></h5>
                        @if (count($barang->tawar_acc) > 0)
                            <span class="text-strike-through text-danger">
                                {{ 'Rp ' . number_format($barang->harga, 0, ',', '.') }}
                            </span>
                            <h2><strong>{{ 'Rp ' . number_format($barang->tawar_acc[0]->harga_tawar, 0, ',', '.') }}</strong>
                            </h2>
                        @else
                            <h2><strong>{{ 'Rp ' . number_format($barang->harga, 0, ',', '.') }}</strong></h2>
                        @endif
                        <br>
                        <p>
                            <i class="fa fa-check me-3"></i>
                            <b>Tingkat Pemakaian</b><br>
                            <small class="ms-4 ps-2">{{ $barang->status_barang }}</small>
                        </p>
                        <p>
                            <i class="fa fa-location-dot me-3"></i>
                            <b>Lokasi</b><br>
                            <small class="ms-4 ps-2">{{ $barang->lokasi_barang }}</small>
                        </p>
                        <p>
                            <i class="fa fa-credit-card  me-3"></i>
                            <b>Pembayaran yang dipakai</b><br>
                            <div class="col-md mb-3">
                                <div class="form-check mt-3">
                                    <input style="opacity: 1;" disabled class="form-check-input" name="method[]" type="checkbox"
                                        value="e-money" id="cbx-e-money">
                                    <label style="opacity: 1;" class="form-check-label font-bold" for="cbx-e-money"> E-Money </label>
                                </div>
                                <div class="form-check">
                                    <input style="opacity: 1;" disabled class="form-check-input" name="method[]" type="checkbox"
                                        value="transfer" id="cbx-transfer"
                                        {{ old('method') ? (in_array('transfer', old('method')) ? 'checked' : '') : 'checked' }}>
                                    <label style="opacity: 1;" class="form-check-label font-bold" for="cbx-transfer"> Transfer
                                    </label>
                                </div>
                            </div>
                            {{-- @php
                                $methods = explode(',', $barang->method);
                                $method = '';
                                foreach ($methods as $k => $m) {
                                    if ($k != 0) {
                                        $method .= ', ';
                                    }
                                    $method .= ucfirst($m);
                                }
                            @endphp;
                            <small class="ms-4 ps-2">{{ $method }}</small> --}}
                        </p>
                        <div class="mt-5">
                            @if (!empty(auth()->user()))
                            @endif
                            <div class="row">
                                <div class="col-md-2" style="display: none">
                                    <input type="number"min="1" value="1" class="form-control" name="qty"
                                        id="qty" aria-describedby="helpId" placeholder="Qty">
                                </div>
                                <div class="col-md-5">
                                    @if (!empty(auth()->user()))
                                        @if ($barang->seller->id != auth()->user()->id)
                                            <form method="POST" action="/add-cart-to-checkout">
                                                @csrf
                                                <input type="hidden" name="id_barang" id="id_barang"
                                                    value="{{ $barang->id }}">
                                                <input type="hidden" name="id_user" id="id_user"
                                                    value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="id_seller" id="id_seller"
                                                    value="{{ $barang->seller->id }}">
                                                <button type="submit" class="btn btn-primary w-100 me-3">Beli</button>
                                            </form>
                                        @else
                                        @endif
                                    @else
                                        <a href="/login-page" class="btn btn-primary w-100 me-3">Beli</a>
                                    @endif

                                </div>
                                <div class="col-md-1">
                                    @if (!empty(auth()->user()))
                                        @if ($barang->seller->id != auth()->user()->id)
                                            <form method="POST" action="/add-cart">
                                                @csrf
                                                <input type="hidden" name="id_barang" id="id_barang"
                                                    value="{{ $barang->id }}">
                                                <input type="hidden" name="id_user" id="id_user"
                                                    value="{{ auth()->user()->id }}">
                                                <input type="hidden" name="id_seller" id="id_seller"
                                                    value="{{ $barang->seller->id }}">
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="fa-solid fa-cart-shopping"></i></button>
                                            </form>
                                        @endif
                                    @else
                                        <a href="/login-page" class="btn btn-primary"><i
                                                class="fa-solid fa-cart-shopping"></i></a>
                                    @endif
                                </div>
                                @if (auth()->user()->role ?? null != 'seller')
                                    <div class="col-md-3 px-3">
                                        {{-- <a class="btn btn-outline-primary"
                                            href="/chat/{{ $barang->user->username }}/{{ $barang->id }}"
                                            role="button">
                                            <i class="fa-regular fa-comment"></i>
                                        </a> --}}
                                    </div>
                                @endif
                            </div>
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
                                    <a href="/toko/{{ $barang->seller->id }}">
                                        <img src="{{ !empty($barang->user_detail->photo) ? '/files/profile/' . $barang->user_detail->photo : '/image/bangku_kecil.jpeg' }}"
                                            alt="{{ $barang->user->name }}" class="barang-img-profile"id="store-img" />
                                    </a>
                                </div>
                                <div class="col-9 ps-4">
                                    <a href="/toko/{{ $barang->seller->id }}">
                                        <h5><strong>{{ $barang->seller->nama_toko }}</strong></h5>
                                    </a>
                                    <small style="font-size: 12px">{{ $barang->seller->alamat->kota }}</small>
                                </div>
                                @if (auth()->user()->id ?? null != $barang->seller->id)
                                    <div class="col-md-2">
                                        <a class="btn btn-outline-primary" href="/chat/{{ $barang->user->username }}"
                                            role="button">
                                            <i class="fa-regular fa-comments"></i>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </h5>
                        @if (!empty(auth()->user()) && $barang->seller->id != auth()->user()->id)
                            <div class="bg-light-smoth mt-4"
                                style="display: flex; flex-direction: column-reverse;padding:10px;">
                                @if ($barang->status_tawar == 'no')
                                    <span class="text-center text-white fw-bold">Barang Tidak Dapat
                                        Ditawar</span>
                                @else
                                    <form
                                        action="/tawar/{{ auth()->user()->id }}/{{ $barang->seller->id }}/{{ $barang->id }}/null"
                                        method="POST">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" required class="form-control" name="tawar"
                                                placeholder="Ketikkan tawaran" aria-label="Maukan tawaran"
                                                aria-describedby="basic-addon2">
                                            <button style="background: #CB63A3!important" class="input-group-text"
                                                id="basic-addon2" type="submit"><i style="color:white;"
                                                    class="fa fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                    <br>
                                    <div class="mt-5">
                                        @php
                                            $persen = [5, 10, 15];
                                            $rekomendasi_tawar = [];
                                            $price = $barang->harga;
                                            foreach ($persen as $per) {
                                                $rekomendasi_tawar[] = $price - ($price * $per) / 100;
                                            }
                                        @endphp
                                        @foreach ($rekomendasi_tawar as $tawar)
                                            <a style="text-decoration: none"
                                                href="/tawar/{{ auth()->user()->id }}/{{ $barang->seller->id }}/{{ $barang->id }}/{{ $tawar }}">
                                                <span
                                                    class="rekom-tawar me-2">{{ 'Rp ' . number_format($tawar, 0, ',', '.') }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                    <div>
                                        <div
                                            style="overflow-y: scroll; display: flex; flex-direction: column; max-height: 250px;">
                                            @if (count($barang->tawar_by_user) > 0)
                                                @foreach ($barang->tawar_by_user as $tawar)
                                                    <div class="mt-3">
                                                        <div class="bubble-chat">
                                                            Saya menawar:
                                                            <b>{{ 'Rp ' . number_format($tawar->harga_tawar, 0, ',', '.') }}</b>
                                                            <br>
                                                            <small style="font-size: 10px">Status:
                                                                {{ $tawar->status }}</small>
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
