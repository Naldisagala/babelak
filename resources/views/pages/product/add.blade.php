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
                            <h4 class="mb-5"><strong>@yield('title')</strong></h4>
                            <div class="row p-4">
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
                                                    Choose... <input name="image[]" data-inc="1" id="image-product-1"
                                                        type="file" style="display: none;">
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
                                                    <select class="chosen form-control" style="width: 200px;">
                                                        <option value="" disabled selected>Pilih Provinsi</option>
                                                        <option value="py">Python</option>
                                                        <option value="ja">Java</option>
                                                        <option value="ht">HTML</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <select class="chosen form-control" style="width: 200px;">
                                                        <option value="" disabled selected>Pilih Provinsi</option>
                                                        <option value="py">Python</option>
                                                        <option value="ja">Java</option>
                                                        <option value="ht">HTML</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-3"></div>
                                                <div class="col-md-6 mt-3"></div>
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
