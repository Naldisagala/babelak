<!-- Menghubungkan dengan view template master -->
@extends('layouts.admin.main', ['active' => 'payment-confirmation'])

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Pembayaran Selesai')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            @yield('title')
        </h4>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <table class="table table-borderless datatables-not-order">
                            <thead>
                                <tr>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $product)
                                    <tr>
                                        <td>
                                            <div class="w-100">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <img width="130" class="rounded-circle"
                                                                src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                alt="{{ $product->keranjang->barang->nama_barang }}">
                                                        </div>
                                                        <div
                                                            class="col-md-7 d-flex align-items-center justify-content-start">
                                                            <ul class="list-style-none">
                                                                <li><strong>{{ $product->keranjang->barang->nama_barang }}</strong>
                                                                </li>
                                                                <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                </li>
                                                                <li><span>{{ ucfirst($product->user->name) }}</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-3 text-md-end">
                                                            <span>{{ ucfirst($product->keranjang->user_seller->name) }}</span>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span>{{ date('Y/m/d h:s', strtotime($product->created_at)) }}</span>
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                                                            <button type="button" data-src="{{ $product->bukti }}"
                                                                data-description="{{ $product->description }}"
                                                                onclick="showViewProof(this)"
                                                                class="btn btn-outline-primary me-3">Lihat
                                                                Bukti</button>
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="alertProofDone(this)"
                                                                data-id="{{ $product->id }}">Done</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal')
    <!-- Modal -->
    <div class="modal modal-top fade" id="viewProof" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTopTitle">
                        Bukti Pembayaran
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="img-pembayaran" src="/image/default.jpg" class="w-100" alt="Bukti Pembayaran">
                    <p class="my-3" id="description-pembayaran"></p>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="ProofDone" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Perhatian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/{{ env('URL_ADMIN', 'admin') }}/payment-confirmation" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id_data">
                        <p>Apakah kamu yakin ingin menyetujui bukti pembayaran pemesanan ini?</p>
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
@section('script')
    <script>
        function showViewProof(thisis) {
            let src = $(thisis).data('src')
            let description = $(thisis).data('description')
            $('#img-pembayaran').attr('src', '/files/order/proof/' + src)
            $('#description-pembayaran').text('Keterangan : ' + description)
            $('#viewProof').modal('show');
        }

        function alertProofDone(thisis) {
            let id = $(thisis).data('id')
            $('#id_data').val(id)
            $('#ProofDone').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#ProofDone').modal('show');
        }
    </script>
@endsection
