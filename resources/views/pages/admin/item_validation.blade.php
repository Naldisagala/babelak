<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'items-enter'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Validasi Barang')


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
                    <div class="card-body p-5">
                        <form id="form-profile" method="POST" action="/{{ env('URL_ADMIN', 'admin') }}/item-validation">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <input type="hidden" name="type" id="type" value="accept">
                                    <input type="hidden" name="id" id="id" value="{{ $product->id }}">
                                    <img class="rounded-circle" width="130"
                                        src="{{ !empty($product->photo) ? '/files/profile/' . $product->photo : '/image/default.jpg' }}"
                                        alt="Default">
                                </div>
                                <div class="col-md-10">
                                    <h5><strong>{{ $product->name_user }}</strong></h5>
                                    <p>{{ $product->username ?? '-' }}</p>
                                    <p>{{ $product->address_user ?? '-' }}</p>
                                </div>
                                <div class="col-md-12">
                                    <div class="row py-5">
                                        <div class="col-md-12">
                                            <h5><strong>Foto</strong></h5>
                                        </div>
                                        @if (!empty($gallery))
                                            @foreach ($gallery as $file)
                                                @if ($file['type'] == 'image')
                                                    <div class="col-md-3">
                                                        <img width="300" class="py-3"
                                                            src="/files/product/{{ $file['name'] }}"
                                                            alt="{{ $product['name'] }}">
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="col-md-3">
                                                <img width="300" class="py-3"
                                                    src="{{ str_contains($product['gambar'], '://') ? $product['gambar'] : '/files/product/' . $product['gambar'] }}"
                                                    alt="{{ $product['name'] }}">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row pb-5">
                                        <div class="col-md-12">
                                            <h5><strong>Video</strong></h5>
                                        </div>
                                        @php
                                            $isExistVideo = false;
                                        @endphp
                                        @if (!empty($gallery))
                                            @foreach ($gallery as $file)
                                                @if ($file['type'] == 'video')
                                                    @php
                                                        $isExistVideo = true;
                                                    @endphp
                                                    <div class="col-md-3">
                                                        <video id="view-video-1" class="w-100" width="190"
                                                            height="190" controls preload="auto"
                                                            src="/files/product/{{ $file['name'] }}"></video>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                        @if (!$isExistVideo)
                                            <div class="col-md-3">
                                                kosong
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>Nama Barang</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <span>{{ $product->nama_barang }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>ID Barang</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <span>{{ $product->id }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>Harga</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <span>{{ 'Rp ' . number_format($product->harga, 2, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>Deskripsi Barang</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <span>{{ $product->deskripsi }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>Lokasi Domisili/Barang</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <span>
                                                    {{ $product->address }},<br>
                                                    {{ 'Kel. ' . ucwords(strtolower($product->village)) }},
                                                    {{ 'Kec. ' . ucwords(strtolower($product->district)) }},
                                                    {{ 'Kota/Kab. ' . ucwords(strtolower($product->regencie)) }},
                                                    {{ 'Prov. ' . ucwords(strtolower($product->province)) }},</span>
                                                <span>Nama jalan, Kota Kecamatan, Kelurahan Kodepos</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>Status</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <span class="text-primary font-bold">{{ ucfirst($product->status) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>Status Pemakaian Barang</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                <span>{{ strtoupper($product->usage) }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12 row py-2">
                                            <div class="col-md-3">
                                                <span><strong>Methode Pembayaran</strong></span>
                                            </div>
                                            <div class="col-md-9">
                                                @php
                                                    $methods = explode(',', $product->method);
                                                    $method = '';
                                                    foreach ($methods as $k => $m) {
                                                        if ($k != 0) {
                                                            $method .= ', ';
                                                        }
                                                        $method .= ucfirst($m);
                                                    }
                                                @endphp;
                                                <span>{{ $method }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 text-end pt-5">
                                    <button type="submit" class="btn btn-primary mx-2">
                                        Terima
                                    </button>
                                    <button type="button" class="btn btn-outline-primary mx-2" data-bs-toggle="modal"
                                        data-bs-target="#modalDeclineProduct">
                                        Tolak
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" id="modalDeclineProduct" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Perhatian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/{{ env('URL_ADMIN', 'admin') }}/item-validation" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="type" id="type_product" value="decline">
                        <input type="hidden" name="id" id="id_product" value="{{ $product->id }}">
                        <p>Apakah kamu yakin ingin menolak produk ini?</p>
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
