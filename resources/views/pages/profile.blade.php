<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Profil')


<!-- isi bagian konten -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top mb-4">

                    @include('components/tabs', [
                        'active_tab' => 'profile',
                    ])

                    <div class="tab-content">
                        <div role="tabpanel">
                            <form id="form-profile" method="POST" action="/profile" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ !empty($user['photo']) ? '/files/profile/' . $user['photo'] : '/image/default.jpg' }}"
                                            alt="default" class="d-block rounded w-100" id="imgProfile" />
                                        <input type="hidden" name="old_photo" id="old_photo"
                                            value="{{ $user['photo'] ?? '' }}">
                                        <label class="btn btn-outline-primary w-100 mt-4">
                                            Pilih Photo <input name="photo" id="btnImgProfile" type="file"
                                                style="display: none;">
                                        </label>
                                        <button type="button" class="btn btn-outline-primary w-100 mt-4"
                                            data-bs-toggle="modal" data-bs-target="#modalChangePassword">Ubah Kata
                                            Sandi</button>
                                    </div>
                                    <div class="col-md-7 px-md-5">
                                        <div class="form-group my-3">
                                            <label for="full_name">Nama Lengkap</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" id="full_name" full_name placeholder="Nama Lengkap"
                                                value="{{ $user['name'] }}">
                                            @error('name')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="username">Username</label>
                                            <input type="text"
                                                class="form-control @error('username') is-invalid @enderror" name="username"
                                                id="username" username placeholder="Username"
                                                value="{{ old('username') ?? $user['username'] }}">
                                            @error('username')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                                name="nik" id="nik" nik placeholder="NIK"
                                                value="{{ old('nik') ?? $user['nik'] }}">
                                            @error('nik')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="telp">Nomor Handphone</label>
                                            <input type="text" class="form-control @error('hp') is-invalid @enderror"
                                                name="hp" id="telp" telp placeholder="Nomor Handphone"
                                                value="{{ old('hp') ?? $user['hp'] }}">
                                            @error('hp')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" email placeholder="Email"
                                                value="{{ old('email') ?? $user['email'] }}">
                                            @error('email')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="institute_name">Nama Institut</label>
                                            <input type="text"
                                                class="form-control @error('institute') is-invalid @enderror"
                                                name="institute" id="institute_name" institute_name
                                                placeholder="Nama Institut"
                                                value="{{ old('institute') ?? $user['institute'] }}">
                                            @error('institute')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="address">Alamat</label>
                                            <textarea placeholder="Alamat" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                                                rows="3">{{ old('address') ?? $user['address'] }}</textarea>
                                            @error('address')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <small class="mt-2">Keterangan : Lengkapi biodata terlebih dahulu</small>

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
@section('modal')
    <div class="modal fade" id="modalChangePassword" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form id="form-profile" method="POST" action="/change-password">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalChangePasswordLabel">Ubah Kata Sandi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-password-toggle">
                                    <label class="form-label" for="password">New Password</label>
                                    <div class="input-group">
                                        <input required type="password" class="form-control" name="password"
                                            id="password" placeholder="Password"
                                            aria-describedby="password-description">
                                        <span id="password-description"
                                            class="input-group-text cursor-pointer toggle-password">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-password-toggle mt-3">
                                    <label class="form-label" for="confirm_password">Konfirmasi Password</label>
                                    <div class="input-group">
                                        <input required type="password" class="form-control" name="confirm_password"
                                            id="confirm_password" placeholder="Konfirmasi Password"
                                            aria-describedby="confirm_password-description">
                                        <span id="confirm_password-description"
                                            class="input-group-text cursor-pointer toggle-password">
                                            <i class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            $('#btnImgProfile').change(function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                        ext == "jpg")) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imgProfile').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#imgProfile').attr('src', '/image/default.jpg');
                }
            });
        });

        $('.toggle-password').click(function() {
            $(this).children().toggleClass('fa-eye fa-eye-slash');
            let input = $(this).prev();
            input.prop('type', input.prop('type') == 'password' ? 'text' : 'password');
        });
    </script>
@endsection
