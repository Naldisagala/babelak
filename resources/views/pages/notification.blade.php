<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Notifikasi')


<!-- isi bagian konten -->
@section('content')
    <div class="container mb-5">
        <div class="mb-5">
            <h4 class="card-title"><strong>@yield('title')</strong></h4>
        </div>
        <div class="card h-100">
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-borderless table-hover datatables-not-order">
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($notification as $notif)
                                <tr>
                                    <td>
                                        <a href="{{ !empty($notif->link) ? $notif->link : 'javascript:void(0);' }}"
                                            class="list-group-item list-group-item-action">
                                            <div class="row">
                                                <div class="col-md-10 btn-group-vertical">
                                                    <span><strong>{{ ucwords(strtolower(str_replace('-', ' ', $notif->type))) }}</strong></span>
                                                    <span class="text-short-summary">{{ $notif->description }}</span>
                                                </div>
                                                <div class="col-md-2 d-flex align-items-center justify-content-center">
                                                    <span>
                                                        <span>{{ date('d M Y', strtotime($notif->created_at)) }}</span><br>
                                                        <span>{{ date('h m:s', strtotime($notif->created_at)) }}</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
