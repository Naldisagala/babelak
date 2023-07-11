@php
    use App\Http\Controllers\Controller;
    $controller = new Controller();
    $count = $controller->cartCount();
    $showNotification = $controller->showNotifHeader();
    $showChat = $controller->showChatHeader();
    $countNotif = $controller->countNotif();
    $countChat = $controller->countChat();
@endphp
<header class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg">
        <div class="container">
            <a class="navbar-brand" href="/home">
                <img class="img-size hidden md:block" src="{{ url('/image/logo.png') }}" alt="logo">
                <img width="20" class="block md:hidden" src="{{ url('/image/Logo_white.svg') }}" alt="logo">
            </a>
            <form class="d-flex w-55 md:w-35" action="?search=" method="GET">
                <div class="input-group">
                    <input type="text" name='search' class="form-control src rounded-start-20 -me-20 pe-4"
                        placeholder="Search" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span
                        class="input-group-text src-icon d-flex align-items-center justify-content-center rounded-circle-20 z-index-20"
                        id="basic-addon2"><i style="color: white" class="fa-solid fa-search"></i></span>
                </div>

                <a href="/keranjang" class="btn-cart mx-4"><i class="fa-solid fa-cart-shopping"></i></a>
                @if ($count > 0)
                    <span
                        style="margin-left:-25px;margin-top:5px;color:white;display:inline-block;width:15px;height:15px;border-radius:50%;background:#C65299;padding:2px;text-align:center;font-size:10px;"><b>{{ $count }}</b></span>
                @endif
            </form>
            @if (Auth::check())
                <ul class="navbar-nav mb-md-0 flex-row">
                    @if (auth()->user()->role != 'admin')
                        <li class="nav-item dropdown">
                            <button
                                class="btn text-white btn-white btn-icon rounded-pill dropdown-toggle hide-arrow me-4"
                                href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-message me-2"></i>
                                @if ($countChat > 0)
                                    <span
                                        class="badge ms-2 rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ $countChat }}</span>
                                @endif
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="height: 500px; overflow-y: scroll;">
                                @if (count($showChat) > 0)
                                    @foreach ($showChat as $chat)
                                        <li>
                                            <a class="dropdown-item text-wrap" href="{{ $chat->link ?? '#' }}">
                                                <p class="font-bold">Dari : {{ $chat->from_user->name }}</p>
                                                <p>{{ $chat->message }}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a class="dropdown-item text-wrap text-center border-top" href="/chat">
                                            Lihat Semua
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item text-wrap" href="#">
                                            Kosong
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <button class="btn text-white btn-white btn-icon rounded-pill dropdown-toggle hide-arrow"
                                href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-regular fa-bell"></i>
                                @if ($countNotif > 0)
                                    <span
                                        class="badge ms-2 rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ $countNotif }}</span>
                                @endif
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" style="height: 500px; overflow-y: scroll;">
                                @if (count($showNotification) > 0)
                                    @foreach ($showNotification as $notif)
                                        <li>
                                            <a class="dropdown-item text-wrap" href="{{ $notif->link ?? '#' }}">
                                                <p class="font-bold">Dari : {{ $notif->from_user->name }}</p>
                                                <p>{{ $notif->description }}</p>
                                            </a>
                                        </li>
                                    @endforeach
                                    <li>
                                        <a class="dropdown-item text-wrap text-center border-top" href="/notification">
                                            Lihat Semua
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item text-wrap" href="#">
                                            Kosong
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link mx-2" aria-current="page" href="#" data-bs-toggle="dropdown"><i
                                class="fa-regular fa-user"></i></a>
                        <ul class="dropdown-menu">

                            @if (auth()->user()->role == 'seller')
                                <li>
                                    <a class="dropdown-item" href="/profile">Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/my-orders">Pesanan Saya</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/my-products">Barang Saya</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/sold-orders">Pesanan Terjual</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/sales-revenue">Pendapatan Penjualan</a>
                                </li>
                            @elseif (auth()->user()->role == 'user')
                                <li>
                                    <a class="dropdown-item" href="/profile">Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/my-orders">Pesanan Saya</a>
                                </li>
                                <li>
                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#becomeSeller">
                                        Jadi Penjual
                                    </button>
                                </li>
                            @elseif (auth()->user()->role == 'admin')
                                <li>
                                    <a class="dropdown-item"
                                        href="/{{ env('URL_ADMIN', 'admin') }}/dashboard">Dashboard</a>
                                </li>
                            @endif
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @if (auth()->user()->role != 'admin')
                        <li class="nav-item d-flex align-items-center justify-content-center">
                            <span>{{ ucfirst(auth()->user()->name) }}</span>
                        </li>
                    @endif
                </ul>
            @else
                <div>
                    <a href="/login-page" class="btn btn-login me-2 mobile:hidden md:block">Login</a>
                    <a href="/register-page" class="btn btn-regist mobile:hidden md:block">Register</a>
                    <a href="/login-page" class="btn btn-login me-2 mobile:block md:hidden"><i
                            class="fa fa-right-to-bracket"></i></a>
                    <a href="/register-page" class="btn btn-regist mobile:block md:hidden"><i
                            class="fa fa-user"></i></a>
                </div>
            @endif

        </div>
    </nav>
</header>
