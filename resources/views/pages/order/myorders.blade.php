<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Pesanan Saya')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">

                    @include('components/tabs', [
                        'active_tab' => 'my-orders',
                    ])

                    <div class="tab-content">
                        <div role="tabpanel">
                            <div class="row">
                                <div class="col-md-2">
                                    <nav class="nav  nav-pills nav-stacked">
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between active"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-is-proof"
                                            aria-controls="order-is-proof" aria-selected="true">
                                            Upload Bukti
                                            @if (count($productWaiting) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productWaiting) }}</span>
                                            @endif
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-is-being-packed"
                                            aria-controls="order-is-being-packed" aria-selected="true">
                                            Sedang Dikemas
                                            @if (count($productPackaging) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productPackaging) }}</span>
                                            @endif
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-delivery"
                                            aria-controls="order-delivery" aria-selected="false">
                                            Dikirim
                                            @if (count($productDelivery) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productDelivery) }}</span>
                                            @endif
                                        </button>
                                        <button type="button"
                                            class="nav-link d-flex align-items-center justify-content-between"
                                            role="tab" data-bs-toggle="tab" data-bs-target="#order-done"
                                            aria-controls="order-done" aria-selected="false">
                                            Selesai
                                            @if (count($productDone) > 0)
                                                <span
                                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ count($productDone) }}</span>
                                            @endif
                                        </button>
                                    </nav>
                                </div>
                                <div class="col-md-9">
                                    <div class="nav-align-top mb-4">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="order-is-proof" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productWaiting as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <small>Nama Penjual</small>
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">
                                                                                @if ($product->status == 'waiting')
                                                                                    <button type="button"
                                                                                        data-id="{{ $product->id }}"
                                                                                        data-code_payment="{{ $product->code_payment }}"
                                                                                        data-number_payment="{{ $product->number_payment }}"
                                                                                        onclick="showModalProof(this)"
                                                                                        class="btn btn-primary mx-3">Upload
                                                                                        Bukti</button>
                                                                                @else
                                                                                    <button type="button"
                                                                                        class="btn btn-primary mx-3"
                                                                                        data-src="{{ $product->bukti }}"
                                                                                        data-description="{{ $product->description }}"
                                                                                        onclick="showViewProof(this)">
                                                                                        Lihat Bukti
                                                                                    </button>
                                                                                @endif

                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade show" id="order-is-being-packed" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productPackaging as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <small>Nama Penjual</small>
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">

                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="order-delivery" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productDelivery as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <small>Nama Penjual</small>
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">
                                                                                <button type="button"
                                                                                    class="btn btn-primary mx-3">Pesanan
                                                                                    Diterima</button>
                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="order-done" role="tabpanel">
                                                <table class="table table-borderless datatables-not-order">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($productDone as $product)
                                                            <tr>
                                                                <td>
                                                                    <div class="card-body bg-light-smoth shadow">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <small>Nama Penjual</small>
                                                                                <h6>{{ ucfirst($product->keranjang->user_seller->name) }}
                                                                                </h6>
                                                                            </div>
                                                                            <div class="col-md-6 text-end">
                                                                                <span>{{ ucfirst($product->status) }}</span>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <img class="card-img-top card-img-bottom zoom"
                                                                                    src="{{ str_contains($product->keranjang->barang->gambar, '://') ? $product->keranjang->barang->gambar : '/files/product/' . $product->keranjang->barang->gambar }}"
                                                                                    alt="{{ $product->keranjang->barang->nama_barang }}">
                                                                            </div>
                                                                            <div
                                                                                class="col-md-10 d-flex align-items-center justify-content-start">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>{{ $product->keranjang->barang->nama_barang }}</span>
                                                                                    </li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <ul class="list-style-none">
                                                                                    <li><span>Total Pembayaran</span></li>
                                                                                    <li><strong>{{ 'Rp ' . number_format($product->total, 0, ',', '.') }}</strong>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div
                                                                                class="col-md-8 d-flex align-items-center justify-content-end">

                                                                                <a href="/chat"
                                                                                    class="btn btn-secondary">Chat
                                                                                    Penjual</a>
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

                        </div>
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

    <div class="modal fade" id="modalProof" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <form method="POST" action="/proof-payment" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Bukti Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <label for="bukti">Bukti</label>
                                    <input type="hidden" name="id_data" id="id_data">
                                    <input required type="file" class="form-control" name="bukti" id="bukti"
                                        placeholder="Masukan Bukti">
                                    <small>Format: image</small>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="description">Keterangan</label>
                                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Keterangan"></textarea>
                                </div>
                                <p class="mt-4" id="keterangan-rek">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere, eum omnis rem culpa
                                    cum laborum explicabo natus, inventore accusantium commodi hic iusto! Sed, quo.
                                    Quisquam, eveniet incidunt! Eos, consequuntur unde.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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

        function showModalProof(thisis) {
            let id = $(thisis).data('id')
            let code_payment = $(thisis).data('code_payment')
            let number_payment = $(thisis).data('number_payment')

            $('#keterangan-rek').html('Kirim Bukti Pembayaran ke : <br> Bank : ' + code_payment + '<br> Rek : ' +
                (number_payment == '' ? ' - ' : number_payment))

            $('#id_data').val(id)
            $('#bukti').val('');
            $('#description').val('');
            $('#modalProof').modal({
                backdrop: 'static',
                keyboard: false
            })
            $('#modalProof').modal('show');
        }
    </script>
@endsection
