<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="./img/team-3.jpg" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">DeuxCafe</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kategori</span>
                </a>
            </li>
       
            <li class="nav-item">
                <a class="nav-link" href="{{ route('type.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Type</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('menu.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Menu</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('stok.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Stok</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('pelanggan.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pelanggan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('meja.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Meja</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('pemesanan.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pemesanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('produk.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Produk Titipan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link " href="{{ route('titipan.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Titipan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link " href="{{ route('tentang.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Tentang</span>
                </a>
            </li>
            
        
        </ul>
    </div>
    
   
</aside>
