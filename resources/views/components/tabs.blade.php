<ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
        <a href="/profile" class="nav-link px-5 {{ $active_tab == 'profile' ? 'active' : '' }}" aria-selected="true">
            Profil
        </a>
    </li>
    @if (auth()->user()->role == 'seller')
        <li class="nav-item">
            <a href="/my-products" class="nav-link px-5 {{ $active_tab == 'my-products' ? 'active' : '' }}"
                aria-selected="false">
                Barang Saya
            </a>
        </li>
        <li class="nav-item">
            <a href="/sold-orders" class="nav-link px-5 {{ $active_tab == 'sold-orders' ? 'active' : '' }}"
                aria-selected="false">
                Pesanan Terjual
            </a>
        </li>
        <li class="nav-item">
            <a href="/sales-revenue" class="nav-link px-5 {{ $active_tab == 'sales-revenue' ? 'active' : '' }}"
                aria-selected="false">
                Pendapatan Penjualan
            </a>
        </li>
    @else
        <li class="nav-item">
            <a href="/my-orders" class="nav-link px-5 {{ $active_tab == 'my-orders' ? 'active' : '' }}"
                aria-selected="false">
                Pesanan Saya
            </a>
        </li>
    @endif
</ul>
