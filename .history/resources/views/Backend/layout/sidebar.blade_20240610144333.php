<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 bg-slate-900 fixed-start " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand d-flex align-items-center m-0" href="/#">
            <img src="/../assets/img/rsunandlogo.png" class="mx-2" alt="">
            <span class="font-weight-bold" style="font-size: 16px !important;">Admin RS Unand</span>
        </a>
    </div>
    <div class="collapse navbar-collapse px-4  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link  {{ $active == 'admin/direksi' ? 'active' : '' }} " href="/admin/direksi">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-users"></i>
                    </div>
                    <span class="nav-link-text ms-1">Direksi</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link  {{ $active == 'admin/artikel' ? 'active' : '' }} " href="/admin/artikel">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">Artikel</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ $active == 'admin/fasilitas' ? 'active' : '' }} " href="/admin/fasilitas">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">Fasilitas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link  {{ $active == 'admin/slider' ? 'active' : '' }} " href="/admin/slider">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <span class="nav-link-text ms-1">Slider</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ $active == 'admin/dokter' ? 'active' : '' }} " href="/admin/dokter">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-user"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dokter</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ $active == 'admin/layanan' ? 'active' : '' }} " href="/admin/layanan">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-book"></i>
                    </div>
                    <span class="nav-link-text ms-1">Layanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <div
                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                        <i class="fa fa-right-from-bracket"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
