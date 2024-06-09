<header class="header bg-dark">
    <img id='logo' src="{{ asset('landing/images/logo_header.png') }}" alt="img-fluid" class="img-fluid">
    <nav class="navbar navbar-expand-lg py-0 px-0 px-lg-5" data-bs-theme="dark">
        <div class="container ">
            <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <i class="ti ti-menu-2 fs-9"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#map-kurban">Lokasi Kurban</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#statistik">Statistik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#pengumuman">Pengumuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('guest.berita') }}">Berita</a>
                    </li>
                </ul>
            </div>
            <div class="d-none d-lg-block">
                <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2 bg-secondary" href="/login">Masuk</a>
            </div>
        </div>
    </nav>
</header>
