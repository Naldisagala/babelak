<!-- Menghubungkan dengan view template master -->
@extends('main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Pesanan Saya')


<!-- isi bagian konten -->
@section('content')
    <div class="container mb-5">
        <div class="mb-5">
            <h4 class="card-title"><strong>Notifikasi</strong></h4>
        </div>
        <div class="card h-100">
            <div class="card-body">
                <div class="list-group list-group-flush">
                    @for ($i = 0; $i < 10; $i++)
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                            <div class="row">
                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                    <img width="80" src="/image/default.jpg" alt="Default">
                                </div>
                                <div class="col-md-8 btn-group-vertical">
                                    <span><strong>Nama</strong></span>
                                    <span class="text-short-summary">Lorem ipsum dolor sit amet
                                        consectetur
                                        adipisicing
                                        elit. Quos quisquam sapiente iste quis provident nihil magni
                                        voluptatibus
                                        eos, aperiam praesentium.</span>
                                </div>
                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                    <span>
                                        <span>{{ date('d M Y') }}</span><br>
                                        <span>{{ date('h m:s') }}</span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endfor
                </div>
            </div>
        </div>
    </div>
@endsection
