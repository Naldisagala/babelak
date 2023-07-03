@php
    use App\Http\Controllers\Controller;
    $controller = new Controller();
    $count = $controller->cartCount(null);
@endphp
<header class="d-flex flex-column h-100">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg">
        <div class="container">
            <a class="navbar-brand" href="/home">
                <img class="img-size" src="{{ url('/image/logo.png') }}" alt="logo">
            </a>
            <form class="d-flex" action="?search=" method="GET">
                <div class="input-group">
                    <input type="text" name='search' class="form-control src" placeholder="Search"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text src-icon" id="basic-addon2"><i style="color: white"
                            class="fa-solid fa-search"></i></span>
                </div>

                <a href="/keranjang" class="btn-cart"><i class="fa-solid fa-cart-shopping"></i></a>
                @if ($count > 0)
                    <span
                        style="margin-left:-25px;margin-top:5px;color:white;display:inline-block;width:15px;height:15px;border-radius:50%;background:#C65299;padding:2px;text-align:center;font-size:10px;"><b>{{ $count }}</b></span>
                @endif
            </form>
            @if (Auth::check())
                <ul class="navbar-nav mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><i
                                class="fa-regular fa-envelope"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="#"><i class="fa-regular fa-bell"></i></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active " aria-current="page" href="#" data-bs-toggle="dropdown"><i
                                class="fa-regular fa-user"></i></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        </ul>
                    </li>
                </ul>
            @else
                <div>
                    <a style="background: #D98CBB!important;color:white" href="/login-page"
                        class="btn btn-info">Login</a>
                    <a style="background: white!important;color:#D98CBB" href="/register-page"
                        class="btn btn-info">Register</a>
                </div>
            @endif

        </div>
    </nav>
</header>
