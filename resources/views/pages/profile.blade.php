<!-- Menghubungkan dengan view template master -->
@extends('main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Profile')


<!-- isi bagian konten -->
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="/profile" class="nav-link active" aria-selected="true">
                                Profil
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/my-order" class="nav-link" aria-selected="false">
                                Pesanan Saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/my-products" class="nav-link" aria-selected="false">
                                Produk Saya
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/sold-orders" class="nav-link" aria-selected="false">
                                Pesanan Terjual
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel">
                            <form id="form-profile" method="POST" onsubmit="return false">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="/image/default.jpg" alt="default" class="d-block rounded w-100"
                                            id="uploadedAvatar" />
                                        <button type="button" class="btn btn-outline-primary w-100 mt-4">Pilih
                                            Photo</button>
                                        <button type="button" class="btn btn-outline-primary w-100 mt-4">Ubah Kata
                                            Sandi</button>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group my-3">
                                            <label for="full_name">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="" id="full_name"
                                                full_name placeholder="Nama Lengkap">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="" id="username"
                                                username placeholder="Username">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" name="" id="nik" nik
                                                placeholder="NIK">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="telp">Nomor Handphone</label>
                                            <input type="text" class="form-control" name="" id="telp" telp
                                                placeholder="Nomor Handphone">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" name="" id="email" email
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="institute_name">Nama Institut</label>
                                            <input type="text" class="form-control" name="" id="institute_name"
                                                institute_name placeholder="Nama Institut">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="institute_name">Nama Institut</label>
                                            <input type="text" class="form-control" name="" id="institute_name"
                                                institute_name placeholder="Nama Institut">
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="address">Alamat</label>
                                            <textarea placeholder="Alamat" class="form-control" name="address" id="address" rows="3"></textarea>
                                        </div>

                                        <div class="mt-5">
                                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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
