    <!-- Menghubungkan dengan view template master -->
    @extends('layouts.main')

    <!-- isi bagian judul halaman -->
    <!-- cara penulisan isi section yang pendek -->
    @section('title', 'Chat')


    <!-- isi bagian konten -->
    @section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-md-6 px-4 mt-3">
                    <div class="row mb-4">
                        <div class="col-md-12 mx-auto">
                            <h5><strong>@yield('title')</strong></h5>
                            <div class="input-group">
                                <input placeholder="Search" class="form-control border-end-0 border" type="search"
                                    value="search" id="search-chat">
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
                                <div class="list-group list-group-flush">
                                    @for ($i = 0; $i < 10; $i++)
                                        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
                                            <div class="row">
                                                <div class="col-2 d-flex align-items-center justify-content-center">
                                                    <img width="50" src="/image/default.jpg" alt="Default"
                                                        class="rounded-circle">
                                                </div>
                                                <div class="col-10">
                                                    <span><strong>Nama</strong></span>
                                                    <span class="text-short-summary">Lorem ipsum dolor sit amet
                                                        consectetur
                                                        adipisicing
                                                        elit. Quos quisquam sapiente iste quis provident nihil magni
                                                        voluptatibus
                                                        eos, aperiam praesentium.</span>
                                                </div>
                                            </div>
                                        </a>
                                    @endfor
                                </div>
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
                                    <img width="50" src="/image/default.jpg" alt="Default" class="rounded-circle">
                                </div>
                                <div class="col-10 d-flex align-items-center justify-content-start">
                                    <span><strong>Nama</strong></span>
                                </div>
                            </div>
                        </div>
                        <hr class="line">
                        <div class="card-body bg-light-smoth ps ps--active-y both-scrollbars-scroll" id="vertical-chat">
                            @for ($i = 0; $i < 50; $i++)
                                @if ($i % 2 == 0)
                                    <div class="d-flex align-items-center justify-content-start">
                                        <div class="card p-3 w-50 text-start my-2">
                                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odio sapiente nam
                                            suscipit?
                                        </div>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center justify-content-end">
                                        <div class="card p-3 w-50 text-start my-2">
                                            Lorem ipsum dolor sit amet.
                                        </div>
                                    </div>
                                @endif
                            @endfor
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
