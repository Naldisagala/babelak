<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo my-5">
        <a href="index.html" class="app-brand-link">
            <img class="imglogo" src="{{ url('image/logo_log.png') }}" alt="">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ $active == 'dashboard' ? 'active' : '' }}">
            <a href="/{{ env('URL_ADMIN', 'admin') }}/dashboard" class="menu-link">
                <div data-i18n="Analytics">Beranda</div>
            </a>
        </li>
        <li class="menu-item {{ $active == 'users' ? 'active' : '' }}">
            <a href="/{{ env('URL_ADMIN', 'admin') }}/users" class="menu-link">
                <div data-i18n="Analytics">Data Pengguna</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <div data-i18n="Layouts">Barang</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/{{ env('URL_ADMIN', 'admin') }}/product-validation" class="menu-link">
                        <div data-i18n="Without menu">Validasi Barang</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/{{ env('URL_ADMIN', 'admin') }}/booking" class="menu-link">
                        <div data-i18n="Without navbar">Pemesanan</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="/{{ env('URL_ADMIN', 'admin') }}/payment-confirmation" class="menu-link">
                <div data-i18n="Analytics">Konfirmasi Pembayaran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/{{ env('URL_ADMIN', 'admin') }}/report-finance" class="menu-link">
                <div data-i18n="Analytics">Laporan Keuangan</div>
            </a>
        </li>
    </ul>
</aside>
