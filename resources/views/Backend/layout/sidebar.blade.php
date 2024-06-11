
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
        <div id="accordion">
            <div class="">
                <div class="" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne"
                            aria-expanded="true" aria-controls="collapseOne">
                            <i class="fas fa-hospital me-3"> </i>Data Rs Unand <i
                                class="fas fa-chevron-down mx-3"></i>
                        </button>
                    </h5>
                    <div id="collapseOne" class="collapse show mx-4 mt-0" aria-labelledby="headingOne"
                        data-parent="#accordion">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/profile' ? 'active' : '' }} "
                                    href="/admin/profile">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-hospital"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Profile RS Unand</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/direksi' ? 'active' : '' }} "
                                    href="/admin/direksi">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Direksi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/dokter' ? 'active' : '' }} "
                                    href="/admin/dokter">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Pegawai</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/dokter/spesialis' ? 'active' : '' }} "
                                    href="/admin/dokter/spesialis">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Dokter Spesialis</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-book me-3"></i>Konten <i class="fas fa-chevron-down mx-3"></i>
                        </button>
                    </h5>
                    <div id="collapseTwo" class="collapse show mx-4 mt-0" aria-labelledby="headingTwo"
                        data-parent="#accordion">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/artikel' ? 'active' : '' }} "
                                    href="/admin/artikel">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-book"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Artikel</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/video' ? 'active' : '' }} "
                                    href="/admin/video">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-video"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Video</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/fasilitas' ? 'active' : '' }} "
                                    href="/admin/fasilitas">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-building"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Fasilitas</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/layanan' ? 'active' : '' }} "
                                    href="/admin/layanan">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fa fa-user-nurse"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Layanan</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link  {{ $active == 'admin/slider' ? 'active' : '' }} "
                                    href="/admin/slider">
                                    <div
                                        class="icon icon-shape icon-sm px-0 text-center d-flex align-items-center justify-content-center">
                                        <i class="fas fa-chevron-left"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Slider</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="mx-2">
                        <ul class="navbar-nav">
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

                <!-- Tambahkan menu lainnya disini jika diperlukan -->
            </div>
        </div>
    </div>
</aside>

<script>
    $(document).ready(function() {
        // Menambahkan event handler untuk mengontrol pembukaan dan penutupan submenu
        $('.btn-link').click(function() {
            var target = $(this).attr('data-target'); // Ambil target menu
            var collapse = $(target);

            // Cek apakah menu sudah terbuka atau tidak
            if (collapse.hasClass('show')) {
                collapse.collapse('hide'); // Tutup menu jika sudah terbuka
            } else {
                $('.collapse').collapse('hide'); // Tutup semua menu yang terbuka
                collapse.collapse('show'); // Buka menu yang terkait
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        // Menambahkan event handler untuk mengontrol pembukaan dan penutupan submenu
        $('.btn-link').click(function() {
            var target = $(this).attr('data-target'); // Ambil target menu
            var collapse = $(target);

            // Cek apakah menu sudah terbuka atau tidak
            if (collapse.hasClass('show')) {
                collapse.collapse('hide'); // Tutup menu jika sudah terbuka
            } else {
                $('.collapse').collapse('hide'); // Tutup semua menu yang terbuka
                collapse.collapse('show'); // Buka menu yang terkait
            }
        });
    });
</script>
