<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Tambah Produk')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">

                    @include('components/tabs', [
                        'active_tab' => 'my-products',
                    ])
                    <div class="tab-content">
                        <div role="tabpanel">
                            <form id="form-profile" method="POST" action="/product" enctype="multipart/form-data">
                                <h4 class="mb-5"><strong>@yield('title')</strong></h4>
                                <div class="row m-4 shadow px-3 py-5 rounded">
                                    <div class="col-md-2 vertical-top">
                                        <span class="font-bold">Foto</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12 text-end">
                                                <button type="button" class="btn btn-primary mb-4">
                                                    <i class="fa fa-plus me-2"></i>
                                                    <i class="fa fa-image"></i>
                                                </button>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1" id="image-product-1"
                                                            type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1" id="image-product-1"
                                                            type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1" id="image-product-1"
                                                            type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1" id="image-product-1"
                                                            type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1" id="image-product-1"
                                                            type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1"
                                                            id="image-product-1" type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1"
                                                            id="image-product-1" type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 vertical-top">
                                        <span class="font-bold">Video</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12 text-end">
                                                <button type="button" class="btn btn-primary mb-4">
                                                    <i class="fa fa-plus me-2"></i>
                                                    <i class="fa fa-video"></i>
                                                </button>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-6 py-3">
                                                <img id="image-product-view-1" class="w-100" src="/image/video.png"
                                                    alt="Default">
                                                <div class="btn-group w-100 my-3" role="group">
                                                    <label class="btn btn-primary w-75">
                                                        Choose... <input name="image[]" data-inc="1"
                                                            id="image-product-1" type="file" style="display: none;">
                                                    </label>
                                                    <button type="button" class="btn btn-outline-primary w-25">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Nama Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="Nama Barang">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Harga</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="number" class="form-control" name="price" id="price"
                                                    placeholder="Harga">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Deskripsi Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea name="description" placeholder="Deskripsi Barang" class="form-control" id="description" cols="30"
                                                    rows="7"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Lokasi Domisili/ Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea name="address" placeholder="Deskripsi Barang" class="form-control" id="address" cols="30"
                                                            rows="7"></textarea>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <select required onchange="getRegion(this)" data-type="regency"
                                                            class="chosen form-control" name="province" id="province"
                                                            data-placeholder="Pilih Provinsi">
                                                            <option value="" disabled selected>Pilih Provinsi
                                                            </option>
                                                            @foreach ($provinces as $prov)
                                                                <option value="{{ $prov['id'] }}">
                                                                    {{ ucwords(strtolower($prov['name'])) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <select required onchange="getRegion(this)"
                                                            class="chosen form-control" name="regency" id="regency"
                                                            data-type="district">
                                                            <option value="" disabled selected>Pilih Kabupaten
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <select required onchange="getRegion(this)"
                                                            class="chosen form-control" name="district" id="district"
                                                            data-type="village">
                                                            <option value="" disabled selected>Pilih Kecamatan
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <select required class="chosen form-control" name="village"
                                                            id="village">
                                                            <option value="" disabled selected>Pilih Desa</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" name="postcode"
                                                                placeholder="Kode Pos" id="postcode"
                                                                aria-describedby="helpId" placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-4 shadow px-3 py-5 rounded">
                                    <h6 class="font-bold">Tingkat Pemakaian Barang</h6>
                                    <div class="col-md">
                                        <div class="form-check my-3">
                                            <input name="usage" class="form-check-input" type="radio" value="ringan"
                                                id="rb-ringan" checked>
                                            <label class="form-check-label" for="rb-ringan">
                                                <span class="font-bold">Pemakaian Ringan</span><br>
                                                <span>Digunakan secara terawat, jika ada kekurangan pun hampir tidak
                                                    terlihat.</span>
                                            </label>
                                        </div>
                                        <div class="form-check my-3">
                                            <input name="usage" class="form-check-input" type="radio" value="baik"
                                                id="rb-baik">
                                            <label class="form-check-label" for="rb-baik">
                                                <span class="font-bold">Pemakaian Baik</span><br>
                                                <span>Memiliki kekurangan atau kerusakan kecil.</span>
                                            </label>
                                        </div>
                                        <div class="form-check my-3">
                                            <input name="usage" class="form-check-input" type="radio" value="berat"
                                                id="rb-berat">
                                            <label class="form-check-label" for="rb-berat">
                                                <span class="font-bold">Pemakaian Ringan</span><br>
                                                <span>Memiliki tanda-tanda penggunaan atau kerusakan yang jelas.</span>
                                            </label>
                                        </div>
                                    </div>
                                    <h6 class="font-bold mt-3">Methode Pembayaran</h6>
                                    <div class="col-md">
                                        <small class="text-light fw-semibold">Checkboxes</small>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" name="method[]" type="checkbox"
                                                value="e-money" id="cbx-e-money" checked>
                                            <label class="form-check-label font-bold" for="cbx-e-money"> E-Money </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="method[]" type="checkbox"
                                                value="transfer" id="cbx-transfer" checked>
                                            <label class="form-check-label font-bold" for="cbx-transfer"> Transfer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="offset-md-7 col-md-5 text-end">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary w-100"> Tambah</button>
                                            </div>
                                            <div class="col-md-6">
                                                <button type="reset"
                                                    class="btn btn-outline-secondary w-100">Batal</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function titleCase(str) {
            return str.toLowerCase().split(' ').map(function(word) {
                return (word.charAt(0).toUpperCase() + word.slice(1));
            }).join(' ');
        }

        function getRegion(thisis) {
            let id = $(thisis).val()
            let type = $(thisis).data('type')
            $.ajax({
                url: "{{ url('/ajax-region') }}",
                method: 'post',
                data: {
                    _token: '{{ csrf_token() }}',
                    id,
                    type
                },
                success: function(result) {
                    let data = result.data
                    if (type == 'regency') {
                        $('#regency').empty().append(
                            '<option selected disabled value="">Pilih Kabupaten</option>');
                        $('#district').empty().append(
                            '<option selected disabled value="">Pilih Kecamatan</option>');
                        $(`#district`).trigger("chosen:updated");
                        $('#village').empty().append(
                            '<option selected disabled value="">Pilih Desa</option>');
                        $('#village').trigger("chosen:updated");
                    } else if (type == 'district') {
                        $('#district').empty().append(
                            '<option selected disabled value="">Pilih Kecamatan</option>');
                        $('#village').empty().append(
                            '<option selected disabled value="">Pilih Desa</option>');
                        $('#village').trigger("chosen:updated");
                    } else if (type == 'village') {
                        $('#village').empty().append(
                            '<option selected disabled value="">Pilih Desa</option>');
                    }
                    $(data).each(function(index, item) {
                        $(`#${type}`).append($('<option>', {
                            value: item.id,
                            text: titleCase(item.name)
                        }));
                    });
                    $(`#${type}`).trigger("chosen:updated");
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }
    </script>
@endsection
