<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Keranjang Belanja')

<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('content')
    <div class="container">
        <h3 class="py-3 font-bold">@yield('title')</h3>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="row mb-3">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input onclick="checkAll(this)" type="checkbox" class="form-check-input"
                                                name="select_all" id="select_all" value="1">
                                            <span class="ms-2">Pilih semua</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex align-items-end justify-content-end">
                                    <a href="javascript.void(0)" data-bs-toggle="modal" data-bs-target="#becomeSeller">
                                        Hapus
                                    </a>
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
                                    <div class="app-brand-link">
                                        <span>{{ $item->kota }}</span>
                                    </div>
                                </div>
                                <hr>
                                @if (!empty($item->list_barang))
                                    @foreach ($item->list_barang as $items)
                                        @php
                                            $gambar = $items->barang->gambar;
                                        @endphp
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center">
                                                <div class="form-check me-2">
                                                    <label class="form-check-label">
                                                        <input onclick="checkedCart(this)" type="checkbox"
                                                            {{ $items->is_checkout == 1 ? 'checked' : '' }}
                                                            class="form-check-input cart-checked" name="barangToko"
                                                            id="barangToko" value="{{ $items->id }}">
                                                    </label>
                                                </div>
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
                                                    @if ($items->id_tawar == '')
                                                        <small>
                                                            <span>Harga: </span>
                                                            @if ($items->harga_akhir < $items->barang->harga)
                                                                <span class="text-strike-through text-danger">
                                                                    {{ 'Rp ' . number_format($items->barang->harga, 0, ',', '.') }}</span>
                                                                <span class="font-bold">
                                                                    {{ ' Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                            @else
                                                                <span class="font-bold">
                                                                    {{ ' Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span>
                                                            @endif
                                                        </small>
                                                    @else
                                                        <small><span class="font-bold">Harga:
                                                                {{ 'Rp ' . number_format($items->harga_akhir, 0, ',', '.') }}</span></small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span><a href="/cart-hapus/{{ $items->id }}"><i
                                                            class="fas fa-trash-alt"></i></a></span>
                                            </div>
                                        </div>
                                        <br>
                                    @endforeach
                                @else
                                    <p class="text-center">(Kosong)</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-6">
                <div class="card bg-white">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="font-bold">Ringkasan Belanja</h6>
                                </div>
                                <div class="col-md-6">
                                    <span>Total pesanan (2 Barang)</span>
                                </div>
                                <div class="col-md-6 text-end">
                                    <span>{{ 'Rp ' . number_format($total, 0, ',', '.') }}</span>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="font-bold">Total Harga</h6>
                                </div>
                                <div class="col-md-6 text-end">
                                    <span>{{ 'Rp ' . number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a class="btn btn-primary @if ($total == 0) disabled @endif"
                                href="/checkout">Beli</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <form action="/cart-hapus" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_carts" id="id_carts">
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

@section('script')
    <script>
        function checkAll(thisis) {
            let check = $(thisis).prop('checked');
            $('.cart-checked').prop('checked', check)
            $.ajax({
                url: "{{ url('/ajax-cart-to-checkout') }}",
                method: 'post',
                data: {
                    _token: '<?= csrf_token() ?>',
                    check: (check ? 1 : 0),
                    type: 'all'
                },
                success: function(result) {
                    console.log('result', result)
                    if (check) {
                        let carts = ''
                        $('.cart-checked').each(function(i, data) {
                            carts += (i == 0 ? '' : ',') + data.value
                        });
                        $('#id_carts').val(carts)
                    } else {
                        $('#id_carts').val('')
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }

        function checkedCart(thisis) {
            let check = $(thisis).prop('checked');
            let val = $(thisis).val()
            let id_carts = $('#id_carts').val();
            $.ajax({
                url: "{{ url('/ajax-cart-to-checkout') }}",
                method: 'post',
                data: {
                    _token: '<?= csrf_token() ?>',
                    id: val,
                    check: (check ? 1 : 0),
                    type: 'one'
                },
                success: function(result) {
                    console.log('result', result)
                    if (check) {
                        if (id_carts == '') {
                            $('#id_carts').val(val)
                        } else {
                            let split = id_carts.split(',')
                            if (!split.includes(val)) {
                                id_carts += `,${val}`
                                $('#id_carts').val(id_carts)
                            }
                        }
                    } else {
                        let split = id_carts.split(',')
                        let carts = ''
                        $.each(split, function(i, data) {
                            if (data != val) {
                                carts += (i == 0 ? '' : ',') + data
                            }
                        });
                        $('#id_carts').val(carts)
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    </script>
@endsection
