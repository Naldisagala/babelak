@php
    use App\Http\Controllers\Controller;
    $controller = new Controller();
    $notification = $controller->showNotifHeader();
    $countNotif = $controller->countNotif();
@endphp
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="fa fa-search fs-4 lh-0"></i>
                <input type="text" id="search-header" class="form-control border-0 shadow-none"
                    placeholder="Search..." aria-label="Search...">
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <li class="btn-group">
                <button type="button" class="btn btn-white btn-icon rounded-pill dropdown-toggle hide-arrow me-3"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-bell"></i>
                    @if ($countNotif > 0)
                        <span
                            class="badge ms-2 rounded-pill badge-center h-px-20 w-px-20 bg-label-primary">{{ $countNotif }}</span>
                    @endif
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    @if (count($notification) > 0)
                        @foreach ($notification as $notif)
                            <li>
                                <a class="dropdown-item text-wrap" href="{{ $notif->link ?? '#' }}">
                                    <p class="font-bold">Dari : {{ $notif->from_user->name }}</p>
                                    <p>{{ $notif->description }}</p>
                                </a>
                            </li>
                        @endforeach
                        <li>
                            <a class="dropdown-item text-wrap text-center border-top"
                                href="/{{ env('URL_ADMIN', 'admin') }}/notification">
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

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="/image/default.jpg" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="/image/default.jpg" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                                    <small class="text-muted">Admin</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fa fa-power-off me-2"></i>
                                <span>Log Out</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
