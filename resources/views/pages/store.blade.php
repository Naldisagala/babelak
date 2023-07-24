<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Home')


<!-- isi bagian konten -->
@section('content')
    <div class="container">
        <div class="card ">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ !empty($user->detail->photo) ? '/files/profile/' . $user->detail->photo : '/image/default.jpg' }}"
                            alt="{{ $user->name }}" class="d-block rounded-circle w-100 p-4"id="imgProfile" />
                    </div>
                    <div class="col-md-7 ps-5">
                        <div class="d-flex btn-group-vertical h-100">
                            <h5><strong>{{ $seller->nama_toko }}</strong></h5>
                            <span>{{ $user->name }} <small>({{ $user->username }})</small></span>
                            <span>{{ $user->alamat->kota ?? '' }}</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <a name="chat-seller" id="chat-seller" class="btn btn-primary"
                                href="/chat/{{ $user->username }}" role="button">Chat
                                Penjual</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-5">
                @if (isset($barang))
                    @foreach ($barang as $item)
                        <div class="col">
                            <div class="card shadow-sm">
                                <a href="/barang/{{ $item->id }}"><img class="img-product" width="100%" height="100%"
                                        src="{{ str_contains($item->gambar, '://') ? $item->gambar : '/files/product/' . $item->gambar }}"
                                        alt="{{ $item->nama_barang }}"></a>
                                <div class="card-body pb-0">
                                    <h6>{{ $item->nama_barang }}</h6>
                                    <small><i class="fa-solid fa-location-dot pe-2"></i> {{ $item->alamat->kota }}</small>
                                    <hr>
                                    <h5 cl22ass="text-end alig mt-3 pb-2 font-bold">
                                        {{ 'Rp ' . number_format($item->harga, 0, ',', '.') }}
                                    </h5>
                                    {{-- <p class="text-end" style="text-decoration: line-through;">Rp 100.000</p> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div style="display: flex; justify-content: center;">
                <div class="pagination-container"><br><br><br>
                    <ul class="pagination pagination-lg">
                        <!-- Tambahkan kelas "pagination-lg" untuk ukuran yang lebih besar -->
                        <!-- Link sebelumnya -->
                        @if ($barang->onFirstPage())
                            <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
                            <!-- Gunakan ikon "fa-angle-double-left" dari Font Awesome -->
                        @else
                            <li><a href="{{ $barang->previousPageUrl() }}" rel="prev"><i
                                        class="fas fa-angle-double-left"></i></a></li>
                        @endif

                        <!-- Link-link halaman -->
                        @foreach ($barang as $page)
                            @if ($page->url)
                                <li class="{{ $page->isActive ? 'active' : '' }}">
                                    <a href="{{ $page->url }}">{{ $page->label }}</a>
                                </li>
                            @else
                                <li class="disabled"><span>{{ $page->label }}</span></li>
                            @endif
                        @endforeach

                        <!-- Link selanjutnya -->
                        @if ($barang->hasMorePages())
                            <li><a href="{{ $barang->nextPageUrl() }}" rel="next"><i
                                        class="fas fa-angle-double-right"></i></a></li>
                            <!-- Gunakan ikon "fa-angle-double-right" dari Font Awesome -->
                        @else
                            <li class="disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection
