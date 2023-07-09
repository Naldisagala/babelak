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
                            <h4 class="mb-5"><strong>@yield('title')</strong></h4>
                            <form id="form-profile" method="POST" action="/profile" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{ !empty($user['photo']) ? '/files/profile/' . $user['photo'] : '/image/default.jpg' }}"
                                            alt="default" class="d-block rounded w-100"id="imgProfile" />
                                        <input type="hidden" name="old_photo" id="old_photo"
                                            value="{{ $user['photo'] ?? '' }}">
                                        <label class="btn btn-outline-primary w-100 mt-4">
                                            Pilih Photo <input name="photo" onchange="changePhoto(this)"
                                                data-target_photo="imgProfile" id="btnImgProfile" type="file"
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
                                                value="{{ old('name') ?? $user['name'] }}">
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
                                                id="username" placeholder="Username"
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
                                                name="nik" id="nik" placeholder="NIK"
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
                                                name="hp" id="telp" placeholder="Nomor Handphone"
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
                                                name="email" id="email" placeholder="Email"
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
                                                name="institute" id="institute_name" placeholder="Nama Institut"
                                                value="{{ old('institute') ?? $user['institute'] }}">
                                            @error('institute')
                                                <div class="invalid-feedback text-left">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group my-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="address">Alamat</label>
                                                    <textarea placeholder="Alamat" class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                                                        rows="3">{{ old('address') ?? $user['address'] }}</textarea>
                                                    @error('address')
                                                        <div class="invalid-feedback text-left">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <select required onchange="getRegion(this)" data-type="regency"
                                                        class="chosen form-control @error('province') is-invalid @enderror"
                                                        name="province" id="province" data-placeholder="Pilih Provinsi">
                                                        <option value="" disabled selected>Pilih Provinsi
                                                        </option>
                                                        @foreach ($provinces as $prov)
                                                            <option
                                                                {{ (old('province')
                                                                        ? (old('province') == $prov['id']
                                                                            ? 'selected'
                                                                            : '')
                                                                        : $user['id_province'])
                                                                    ? ($user['id_province'] == $prov['id']
                                                                        ? 'selected'
                                                                        : '')
                                                                    : '' }}
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
                                                        @if (!empty($regencies))
                                                            @foreach ($regencies as $reg)
                                                                <option
                                                                    {{ (old('regency')
                                                                            ? (old('regency') == $reg['id']
                                                                                ? 'selected'
                                                                                : '')
                                                                            : $user['id_regencie'])
                                                                        ? ($user['id_regencie'] == $reg['id']
                                                                            ? 'selected'
                                                                            : '')
                                                                        : '' }}
                                                                    value="{{ $reg['id'] }}">
                                                                    {{ ucwords(strtolower($reg['name'])) }}
                                                                </option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <select required onchange="getRegion(this)"
                                                        class="chosen form-control" name="district" id="district"
                                                        data-type="village">
                                                        <option value="" disabled selected>Pilih Kecamatan
                                                        </option>
                                                        @if (!empty($districts))
                                                            @foreach ($districts as $dis)
                                                                <option
                                                                    {{ (old('district')
                                                                            ? (old('district') == $dis['id']
                                                                                ? 'selected'
                                                                                : '')
                                                                            : $user['id_district'])
                                                                        ? ($user['id_district'] == $dis['id']
                                                                            ? 'selected'
                                                                            : '')
                                                                        : '' }}
                                                                    value="{{ $dis['id'] }}">
                                                                    {{ ucwords(strtolower($dis['name'])) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <select required class="chosen form-control" name="id_village"
                                                        id="village">
                                                        <option value="" disabled selected>Pilih Desa</option>
                                                        @if (!empty($villages))
                                                            @foreach ($villages as $vil)
                                                                <option
                                                                    {{ (old('id_village')
                                                                            ? (old('id_village') == $vil['id']
                                                                                ? 'selected'
                                                                                : '')
                                                                            : $user['id_village'])
                                                                        ? ($user['id_village'] == $vil['id']
                                                                            ? 'selected'
                                                                            : '')
                                                                        : '' }}
                                                                    value="{{ $vil['id'] }}">
                                                                    {{ ucwords(strtolower($vil['name'])) }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group">
                                                        <input type="number" class="form-control" name="postcode"
                                                            placeholder="Kode Pos" id="postcode"
                                                            value="{{ old('postcode') ?? ($user['kode_pos'] ?? '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if ($user['is_seller'] == 1)
                                            <h5 class="font-bold mt-5">Seller</h5>
                                            <div class="form-group my-3">
                                                <label for="nama_toko">Nama Toko</label>
                                                <input type="text"
                                                    class="form-control @error('nama_toko') is-invalid @enderror"
                                                    name="nama_toko" id="nama_toko" placeholder="Nama Toko"
                                                    value="{{ old('nama_toko') ?? ($user['nama_toko'] ?? '') }}">
                                                @error('nama_toko')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group my-3">
                                                <label for="saldo">Saldo</label>
                                                <input type="number"
                                                    class="form-control @error('saldo') is-invalid @enderror"
                                                    name="saldo" id="saldo" placeholder="Saldo"
                                                    value="{{ old('saldo') ?? ($user['saldo'] ?? '') }}">
                                                @error('saldo')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group my-3">
                                                <label for="rekening">No Rekening</label>
                                                <input type="text"
                                                    class="form-control @error('rekening') is-invalid @enderror"
                                                    name="rekening" id="rekening" placeholder="No Rekening"
                                                    value="{{ old('rekening') ?? ($user['rekening'] ?? '') }}">
                                                @error('rekening')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group my-3">
                                                <label for="type_rekening">Jenis Rekening</label>
                                                <input type="text"
                                                    class="form-control @error('type_rekening') is-invalid @enderror"
                                                    name="type_rekening" id="type_rekening" placeholder="Jenis Rekening"
                                                    value="{{ old('type_rekening') ?? ($user['type_rekening'] ?? '') }}">
                                                @error('type_rekening')
                                                    <div class="invalid-feedback text-left">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        @endif
                                        <small class="mt-2">Keterangan : Lengkapi biodata terlebih dahulu</small>

                                        <div class="mt-5 mb-3">
                                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                            <button type="reset" class="btn btn-outline-secondary">Batal</button>
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
                                            class="input-group-text cursor-pointer toggle-password"
                                            onclick="showPassword(this)">
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
                                            class="input-group-text cursor-pointer toggle-password"
                                            onclick="showPassword(this)">
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
        function showPassword(thisis) {
            $(thisis).children().toggleClass('fa-eye fa-eye-slash');
            let input = $(thisis).prev();
            input.prop('type', input.prop('type') == 'password' ? 'text' : 'password');
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
