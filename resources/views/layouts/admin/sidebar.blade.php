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
        <li class="menu-item">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Barang</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="/product-validation" class="menu-link">
                        <div data-i18n="Without menu">Validasi Barang</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="/booking" class="menu-link">
                        <div data-i18n="Without navbar">Pemesanan</div>
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-item">
            <a href="/payment-confirmation" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Konfirmasi Pembayaran</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="/report-finance" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Laporan Keuangan</div>
            </a>
        </li>
    </ul>
</aside>
