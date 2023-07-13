<!-- Menghubungkan dengan view template master -->
@extends('layouts.main')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('title', 'Chat')


<!-- isi bagian konten -->
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 px-4 mt-3">
                <div class="row mb-4">
                    <div class="col-md-12 mx-auto">
                        <h5><strong>@yield('title')</strong></h5>
                        <div class="input-group">
                            <input placeholder="Search" class="form-control border-end-0 border" type="search"
                                id="search-chat">
                            <span class="input-group-append">
                                <button
                                    class="btn btn-outline-secondary bg-white border-start-0 border-bottom-0 border ms-n5"
                                    type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="card overflow-hidden mb-4" style="height: 587px">
                    <div class="ps ps--active-y vertical-scroll" id="vertical-user">
                        <div class="card mb-4">
                            <table class="table table-borderless table-hover datatables-chat">
                                <thead class="hidden">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($users_chat as $user)
                                        @php
                                            $last = $user->chat_last($user->dari);
                                        @endphp
                                        <tr>
                                            <td>
                                                <a href="/chat/{{ $user->from_user->username }}" class="row">
                                                    <div class="col-2 d-flex align-items-center justify-content-center">
                                                        <img width="50"
                                                            src="{{ !empty($user->from_user->detail->photo) ? '/files/profile/' . $user->from_user->detail->photo : '/image/default.jpg' }}"
                                                            alt="{{ $user->from_user->name }}" class="rounded-circle">
                                                    </div>
                                                    <div class="col-10">
                                                        <span><strong>{{ $user->from_user->name }}</strong></span>
                                                        <span class="text-short-summary">{{ $last->message }}</span>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 232px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 px-4">
                <div class="card overflow-hidden mb-4 mt-5" style="height: 657px">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-2 d-flex align-items-center justify-content-center">
                                <img width="50"
                                    src="{{ !empty($current->detail->photo) ? '/files/profile/' . $current->detail->photo : '/image/default.jpg' }}"
                                    alt="{{ $current->name ?? '(Kosong)' }}" class="rounded-circle">
                            </div>
                            <div class="col-10 d-flex align-items-center justify-content-start">
                                <span><strong>{{ $current->name ?? '(Kosong)' }}</strong></span>
                            </div>
                        </div>
                    </div>
                    <hr class="line">
                    <div class="card-body bg-light-smoth ps ps--active-y both-scrollbars-scroll" id="vertical-chat">
                        @foreach ($list_chat as $chat)
                            @if ($chat->dari == auth()->user()->id)
                                <div class="d-flex align-items-center justify-content-end">
                                    <div class="card p-3 w-50 text-start my-2 bg-primary text-white">
                                        {{ $chat->message }}
                                        @if (!empty($chat->id_tawar))
                                            <hr>
                                            <div class="row">
                                                <div class="col-3">
                                                    <img width="50"
                                                        src="{{ str_contains($chat->tawar->barang->gambar, '://') ? $chat->tawar->barang->gambar : '/files/product/' . $chat->tawar->barang->gambar }}"
                                                        alt="{{ $chat->tawar->barang->nama_barang }}">
                                                </div>
                                                <div class="col-9 d-flex align-items-center justify-content-start">
                                                    <span>{{ $chat->tawar->barang->nama_barang }}</span>
                                                </div>
                                                @if ($chat->tawar->status == 'waiting')
                                                    <div class="col-md-6">
                                                        <form action="/tawar-seller" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id_chat" id="id_chat_decline"
                                                                value="{{ $chat->id }}">
                                                            <input type="hidden" name="status" id="status_decline"
                                                                value="ditolak">
                                                            <input type="hidden" name="id_tawar" id="id_tawar_decline"
                                                                value="{{ $chat->id_tawar }}">
                                                            <input type="hidden" name="from" id="from_decline"
                                                                value="{{ $chat->dari }}">
                                                            <input type="hidden" name="to" id="to_decline"
                                                                value="{{ $chat->ke }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-outline-light w-100 mt-3">Tolak</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="/tawar-seller" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id_chat" id="id_chat_accept"
                                                                value="{{ $chat->id }}">
                                                            <input type="hidden" name="status" id="status_accept"
                                                                value="diterima">
                                                            <input type="hidden" name="id_tawar" id="id_tawar_accept"
                                                                value="{{ $chat->id_tawar }}">
                                                            <input type="hidden" name="from" id="from_accept"
                                                                value="{{ $chat->dari }}">
                                                            <input type="hidden" name="to" id="to_accept"
                                                                value="{{ $chat->ke }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-light w-100 mt-3">Terima</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div class="d-flex align-items-center justify-content-start">
                                    <div class="card p-3 w-50 text-start my-2">
                                        {{ $chat->message }}
                                        @if (!empty($chat->id_tawar))
                                            <hr>
                                            <div class="row">
                                                <div class="col-3">
                                                    <img width="50"
                                                        src="{{ str_contains($chat->tawar->barang->gambar, '://') ? $chat->tawar->barang->gambar : '/files/product/' . $chat->tawar->barang->gambar }}"
                                                        alt="{{ $chat->tawar->barang->nama_barang }}">
                                                </div>
                                                <div class="col-9 d-flex align-items-center justify-content-start">
                                                    <span>{{ $chat->tawar->barang->nama_barang }}</span>
                                                </div>
                                                @if ($chat->tawar->status == 'waiting')
                                                    <div class="col-md-6">
                                                        <form action="/tawar-seller" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id_chat" id="id_chat_decline"
                                                                value="{{ $chat->id }}">
                                                            <input type="hidden" name="status" id="status_decline"
                                                                value="ditolak">
                                                            <input type="hidden" name="id_tawar" id="id_tawar_decline"
                                                                value="{{ $chat->id_tawar }}">
                                                            <input type="hidden" name="from" id="from_decline"
                                                                value="{{ $chat->dari }}">
                                                            <input type="hidden" name="to" id="to_decline"
                                                                value="{{ $chat->ke }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-outline-primary w-100 mt-3">Tolak</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="/tawar-seller" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id_chat" id="id_chat_accept"
                                                                value="{{ $chat->id }}">
                                                            <input type="hidden" name="status" id="status_accept"
                                                                value="diterima">
                                                            <input type="hidden" name="id_tawar" id="id_tawar_accept"
                                                                value="{{ $chat->id_tawar }}">
                                                            <input type="hidden" name="from" id="from_accept"
                                                                value="{{ $chat->dari }}">
                                                            <input type="hidden" name="to" id="to_accept"
                                                                value="{{ $chat->ke }}">
                                                            <button type="submit"
                                                                class="btn btn-sm btn-primary w-100 mt-3">Terima</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>

                                </div>
                            @endif
                        @endforeach
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps__rail-y" style="top: 0px; height: 232px; right: 0px;">
                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;"></div>
                        </div>
                    </div>
                    <hr class="line">
                    <div class="card-footer">
                        <form action="/send/message" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="" id="" typing
                                            typing aria-describedby="helpId" placeholder="Tulis pesan disini">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-outline-info">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let oTable = $('.datatables-chat').DataTable({
            'sDom': 't'
        });

        $('#search-chat').keyup(function() {
            oTable.search($(this).val()).draw();
        })
    </script>
@endsection
