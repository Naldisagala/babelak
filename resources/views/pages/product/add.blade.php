<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Tambah Produk')


<!-- isi bagian konten -->
@section('content')
    <div class="container container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">

                    @include('components/tabs', [
                        'active_tab' => 'my-products',
                    ])
                    <div class="tab-content">
                        <div role="tabpanel">
                            <form id="form-profile" method="POST" action="/product" enctype="multipart/form-data">
                                @csrf
                                <h4 class="mb-5"><strong>@yield('title')</strong></h4>
                                <div class="row m-4 shadow px-3 py-5 rounded">
                                    <div class="col-md-2 vertical-top">
                                        <span class="font-bold">Foto</span>
                                    </div>
                                    <div class="col-md-10">
                                        <div class="row" id="wrapper-photo">
                                            <div class="col-md-12 text-end">
                                                <button type="button" data-check="1" data-inc="1" id="add-photo"
                                                    onclick="addPhoto(this)" class="btn btn-primary mb-4">
                                                    <i class="fa fa-plus me-2"></i>
                                                    <i class="fa fa-image"></i>
                                                </button>
                                            </div>
                                            @if (old('image'))
                                                @foreach (old('image') as $img)
                                                    <div class="col-lg-3 col-md-4 col-sm-6 py-3" id="data-photo-1">
                                                        <img id="image-product-view-1" class="w-100"
                                                            src="{{ $img }}" alt="Default" width="190"
                                                            height="190">
                                                        <div class="btn-group w-100 my-3" role="group">
                                                            <label class="btn btn-primary w-75">
                                                                Choose... <input required name="image[]"
                                                                    value="{{ $img }}" onchange="changePhoto(this)"
                                                                    data-target_photo="image-product-view-1" data-inc="1"
                                                                    id="image-product-1" type="file"
                                                                    style="display: none;">
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="col-lg-3 col-md-4 col-sm-6 py-3" id="data-photo-1">
                                                    <img id="image-product-view-1" class="w-100" src="/image/default.jpg"
                                                        alt="Default" width="190" height="190">
                                                    <div class="btn-group w-100 my-3" role="group">
                                                        <label class="btn btn-primary w-75">
                                                            Choose... <input required name="image[]"
                                                                onchange="changePhoto(this)"
                                                                data-target_photo="image-product-view-1" data-inc="1"
                                                                id="image-product-1" type="file" style="display: none;">
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2 vertical-top hidden">
                                        <span class="font-bold">Video</span>
                                    </div>
                                    <div class="col-md-10 hidden">
                                        <div class="row" id="wrapper-video">
                                            <div class="col-md-12 text-end">
                                                <button type="button" data-check="0" data-inc="0" id="add-video"
                                                    onclick="addVideo(this)" class="btn btn-primary mb-4">
                                                    <i class="fa fa-plus me-2"></i>
                                                    <i class="fa fa-video"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Nama Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input required type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    id="name" placeholder="Nama Barang"
                                                    value="{{ old('name') ?? '' }}">
                                                @error('name')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Harga</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input required type="number"
                                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                                    id="price" placeholder="Harga" min="1"
                                                    value="{{ old('price') ?? '' }}">
                                                @error('price')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="stock" id="stock" value="1">
                                    <div class="col-md-12 mt-3 hidden">
                                        <div class="row">
                                            {{-- <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Stok</span>
                                            </div> --}}
                                            {{-- <div class="col-md-8">
                                                <input required type="number"
                                                    class="form-control @error('stock') is-invalid @enderror"
                                                    name="stock" id="stock" placeholder="Stok" min="1"
                                                    value="{{ old('stock') ?? '' }}">
                                                @error('stock')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                         <div class="row">
                                            {{-- <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Weight</span>
                                            </div> --}}
                                            {{-- <div class="col-md-8">
                                                <input required type="number"
                                                    class="form-control @error('wight') is-invalid @enderror"
                                                    name="wight" id="wight" placeholder="Weight" min="1"
                                                    value="{{ old('wight') ?? '' }}">
                                                @error('wight')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div> --}}
                                        </div> 
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Status Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                <input required type="text"
                                                    class="form-control @error('status') is-invalid @enderror"
                                                    name="status" id="status" placeholder="Status Barang"
                                                    value="{{ old('status') ?? '' }}">
                                                @error('status')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Deskripsi Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea name="description" placeholder="Deskripsi Barang"
                                                    class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="7">{{ old('description') ?? '' }}</textarea>
                                                @error('description')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Lokasi Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                Lokasi barang disesuaikan dari alamat user
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 mt-3">
                                        <div class="row">
                                            <div class="col-md-2 vertical-top">
                                                <span class="font-bold">Lokasi Domisili/ Barang</span>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <textarea required name="address" placeholder="Deskripsi Barang"
                                                            class="form-control @error('address') is-invalid @enderror" id="address" cols="30" rows="7">{{ old('address') ?? '' }}</textarea>
                                                        @error('address')
                                                            <div class="invalid-feedback text-left">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div> 
                                                    <div class="col-md-6 mt-3">
                                                        <select required onchange="getRegion(this)" data-type="regency"
                                                            class="chosen form-control @error('province') is-invalid @enderror"
                                                            name="province" id="province"
                                                            data-placeholder="Pilih Provinsi">
                                                            <option value="" disabled selected>Pilih Provinsi
                                                            </option>
                                                            @foreach ($provinces as $prov)
                                                                <option
                                                                    {{ old('province') ? (old('province') == $prov['id'] ? 'selected' : '') : '' }}
                                                                    value="{{ $prov['id'] }}">
                                                                    {{ ucwords(strtolower($prov['name'])) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <select required onchange="getRegion(this)"
                                                            class="chosen form-control" name="regency" id="regency"
                                                            data-type="district">
                                                            <option value="" disabled selected>Pilih Kota/Kabupaten
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
                                                                value="{{ old('postcode') ?? '' }}">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>  --}}
                                </div>
                                <div class="row m-4 shadow px-3 py-5 rounded">
                                    <h6 class="font-bold">Tingkat Pemakaian Barang</h6>
                                    <div class="col-md">
                                        <div class="form-check my-3">
                                            <input name="usage" class="form-check-input" type="radio" value="ringan"
                                                id="rb-ringan"
                                                {{ old('usage') ? (old('usage') == 'ringan' ? 'checked' : '') : 'checked' }}>
                                            <label class="form-check-label" for="rb-ringan">
                                                <span class="font-bold">Pemakaian Ringan</span><br>
                                                <span>Digunakan secara terawat, jika ada kekurangan pun hampir tidak
                                                    terlihat.</span>
                                            </label>
                                        </div>
                                        <div class="form-check my-3">
                                            <input name="usage" class="form-check-input" type="radio" value="baik"
                                                id="rb-baik"
                                                {{ old('usage') ? (old('usage') == 'baik' ? 'checked' : '') : '' }}>
                                            <label class="form-check-label" for="rb-baik">
                                                <span class="font-bold">Pemakaian Baik</span><br>
                                                <span>Memiliki kekurangan atau kerusakan kecil.</span>
                                            </label>
                                        </div>
                                        <div class="form-check my-3">
                                            <input name="usage" class="form-check-input" type="radio" value="berat"
                                                id="rb-berat"
                                                {{ old('usage') ? (old('usage') == 'berat' ? 'checked' : '') : '' }}>
                                            <label class="form-check-label" for="rb-berat">
                                                <span class="font-bold">Pemakaian Berat</span><br>
                                                <span>Memiliki tanda-tanda penggunaan atau kerusakan yang jelas.</span>
                                            </label>
                                        </div>
                                    </div>
                                    <h6 class="font-bold mt-3">Methode Pembayaran</h6>
                                    <div class="col-md mb-3">
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" name="method[]" type="checkbox"
                                                value="e-money" id="cbx-e-money"
                                                {{ old('method') ? (in_array('e-money', old('method')) ? 'checked' : '') : 'checked' }}>
                                            <label class="form-check-label font-bold" for="cbx-e-money"> E-Money </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" name="method[]" type="checkbox"
                                                value="transfer" id="cbx-transfer"
                                                {{ old('method') ? (in_array('transfer', old('method')) ? 'checked' : '') : 'checked' }}>
                                            <label class="form-check-label font-bold" for="cbx-transfer"> Transfer
                                            </label>
                                        </div>
                                    </div>
                                    <h6 class="font-bold mt-3">Status Tawar</h6>
                                    <div class="col-md">
                                        <div class="form-check">
                                            <input class="form-check-input" name="is_tawar" type="checkbox"
                                                value="1" id="cbx-is-tawar"
                                                {{ old('is_tawar') ? (old('is_tawar') == 1 ? 'checked' : '') : 'checked' }}>
                                            <label class="form-check-label font-bold" for="cbx-is-tawar"> Ya/Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="offset-md-8 col-md-4 text-end">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-primary w-100"> Tambah</button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="/my-products" class="btn btn-outline-secondary w-100">Batal</a>
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
        function addPhoto(thisis) {
            let inc = parseInt($(thisis).data('inc'));
            let check = parseInt($(thisis).data('check'));
            if (check > 10) return false;
            check++
            inc++
            let wrapper = ''
            wrapper += `<div class="col-lg-3 col-md-4 col-sm-6 py-3" id="data-photo-${inc}">
                <img id="image-product-view-${inc}" class="w-100" src="/image/default.jpg"
                    alt="Default" width="190" height="190">
                <div class="btn-group w-100 my-3" role="group">
                    <label class="btn btn-primary w-75">
                        Choose... <input name="image[]" onchange="changePhoto(this)"
                            data-target_photo="image-product-view-${inc}" data-inc="${inc}"
                            id="image-product-${inc}" type="file" style="display: none;">
                    </label>
                    <button type="button" onclick="remove(this)" data-type="photo" data-inc="${inc}" class="btn btn-outline-primary w-25">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>`;
            $('#wrapper-photo').append(wrapper)
            $(thisis).data('check', inc)
            $(thisis).data('inc', inc)
        }

        function addVideo(thisis) {
            let inc = parseInt($(thisis).data('inc'));
            let check = parseInt($(thisis).data('check'));
            if (check > 1) return false;
            inc++
            check++
            let wrapper = ''
            wrapper += `<div class="col-lg-3 col-md-4 col-sm-6 py-3" id="data-video-${inc}">
                <img id="video-default-view-${inc}" class="w-100" src="/image/video.png"
                    alt="Default" width="190" height="190">
                <video id="view-video-${inc}" class="w-100" width="190" height="190"
                    controls preload="auto" src="/video/mov_bbb.mp4"></video>
                <div class="btn-group w-100 my-3" role="group">
                    <label class="btn btn-primary w-75">
                        Choose... <input name="video[]" data-inc="${inc}" id="video-product-${inc}"
                            data-target_video="view-video-${inc}" onchange="changeVideo(this)"
                            data-inc="${inc}" type="file" style="display: none;">
                    </label>
                    <button type="button" onclick="remove(this)" data-type="video" class="btn btn-outline-primary w-25"
                        data-inc="${inc}">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>`;
            $('#wrapper-video').append(wrapper)
            $(thisis).data('check', inc)
            $(thisis).data('inc', inc)
            $(`#view-video-${inc}`).hide()
        }

        function remove(thisis) {
            let type = $(thisis).data('type');
            let inc = parseInt($(thisis).data('inc'));
            let check = parseInt($(`#add-${type}`).data('check'));
            let confm = confirm(`Apa kamu yakin ingin menghapus ${type} ini?`)
            if (confm) {
                check--
                $(`#data-${type}-${inc}`).remove()
                $(`#add-${type}`).data('check', check)
                console.log(check, type)
            }
        }

        function getRegion(thisis) {
            let id = $(thisis).val()
            let type = $(thisis).data('type')
            getAjaxRegion(id, type)
        }

        function getAjaxRegion(id, type, is_selected = false) {
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
                            '<option selected disabled value="">Pilih Kota/Kabupaten</option>');
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
                        let selected = ''
                        if (is_selected && id == item.id) {
                            selected = 'selected'
                        }

                        $(`#${type}`).append(
                            `<option ${selected} value="${item.id}">${titleCase(item.name)}</option>`
                        );
                    });
                    $(`#${type}`).trigger("chosen:updated");
                },
                error: function(error) {
                    console.log(error)
                }
            });
        }

        function titleCase(str) {
            return str.toLowerCase().split(' ').map(function(word) {
                return (word.charAt(0).toUpperCase() + word.slice(1));
            }).join(' ');
        }
    </script>
@endsection
