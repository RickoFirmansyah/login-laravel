<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Title -->
    <title>RPH</title>
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('landing/images/logos/favicon.ico') }}">
    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('landing/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.min.css') }}">
    @stack('css')
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        <!--  Header Start  -->
        <header class="header">
            <div class="fixed-top">
                <nav class="navbar navbar-expand-lg py-0 px-2 px-lg-5 mt-4">
                    <div class="container-fluid rounded shadow-lg py-1 px-2 px-lg-4 bg-white">
                        <a class="navbar-brand d-flex align-items-center gap-2" href="index.html">
                            <img src="{{ asset('landing/images/logos/logo.png') }}" alt="img-fluid">
                            <h5 class="fw-bolder">Pantau Ternak</h5>
                        </a>
                        <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ti ti-menu-2 fs-9"></i>
                        </button>
                        <button class="navbar-toggler border-0 p-0 shadow-none" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                            aria-controls="offcanvasNavbar">
                            <i class="ti ti-menu-2 fs-9"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active fw-bold" aria-current="page" href="#Beranda">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active fw-bold" aria-current="page" href="#lokasi">Lokasi
                                        Pemantauan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active fw-bold" aria-current="page"
                                        href="#statistik">Statistik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active fw-bold" aria-current="page" href="#berita">Berita</a>
                                </li>
                                <li class="nav-item ms-2">
                                    <a
                                        class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2 fw-bolder"href="#">Masuk</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--  Header End  -->

        <!--  Body Start  -->
        <div class="body-wrapper overflow-hidden ">
            <!--  Hero Start  -->
            <section class="hero-section position-relative overflow-hidden mb-0  vh-100 ">
                <div class="container-fluid mx-0 mx-xl-11 ">
                    <div class="row align-items-center position-relative">
                        <div class="col-xl-5 position-relative d-flex align-items-center vh-100 ">
                            <div class="hero-content mt-11 my-xl-0 ">
                                <div class=" d-grid gap-1 mb-2 py-5 z-index-n2">
                                    <h1 class="fw-bolder fs-72 mb-3" data-aos="fade-up" data-aos-delay="400"
                                        data-aos-duration="1000">Membantu Pantau Hewan Kurban</h1>
                                    <p class="fs-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600"
                                        data-aos-duration="1000"><b>Pantau Ternak</b> hadir untuk memantau</p>
                                </div>
                                <div class="d-sm-flex align-items-center gap-3 z-index-1 mb-11" data-aos="fade-up"
                                    data-aos-delay="800" data-aos-duration="1000">
                                    <a class="btn btn-primary btn-hover-shadow d-block mb-3 mb-sm-0"
                                        href="#">Daftar Sekarang<i class=""><img
                                                src="{{ asset('landing/images/svgs/ph_sign-in-bold.svg') }}"
                                                alt="img-fluid" class="mx-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 d-none d-xl-block position-absolute end-0 top-0" data-aos="fade-left"
                            data-aos-duration="1000">
                            <img class="object-fit-cover postion-absolute end-0 bottom-0"
                                src="{{ asset('landing/images/hero-img/hero.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <!--  Hero End  -->

            <!--  Map Start  -->
            <section class="pt-8 px-0 px-xl-11">
                <div class="border rounded">
                    <h1 class="fw-bolder fs-8 fs-md-13 text-center py-3 border">Titik Lokasi Pemotongan Hewan Kurban
                    </h1>
                    <div class=" d-flex justify-content-center align-items-center mb-3">
                        <<iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                            width="1700" height="650" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" class="rounded "></iframe>
                    </div>
                </div>
            </section>
            <!--  Map End  -->

            <!--  Statistic Start  -->
            <section class="pt-5 px-0 px-xl-11 bg-statistic vh-100 d-flex flex-column justify-content-between ">
                <h1 class="fw-bolder fs-8 fs-md-14 text-center py-3 mt-12 text-white">Statistik Pemotongan Hewan Kurban
                </h1>
                <div class="row mb-10 text-center">
                    <div class="col-xl-2 position-relative d-flex align-items-center"></div>
                    <div class="col-xl-2 position-relative d-flex align-items-center justify-content-center">
                        <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('landing/images/statistic/cow.png') }}"
                                    style="width: 120px ; height: 120px" alt="img-fluid">
                            </div>
                            <h5 class="fw-bolder fs-8 text-center text-white py-3">1,24k+</h5>
                            <h5 class="fw-bolder fs-8 text-center text-white">Hewan Ternak</h5>
                        </div>
                    </div>
                    <div class="col-xl-2 position-relative d-flex align-items-center justify-content-center ">
                        <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('landing/images/statistic/village.png') }}"
                                    style="width: 120px ; height: 120px" alt="img-fluid">
                            </div>
                            <h5 class="fw-bolder fs-8 text-center text-white py-3">18</h5>
                            <h5 class="fw-bolder fs-8 text-center text-white">Kecamatan</h5>
                        </div>
                    </div>
                    <div class="col-xl-2 position-relative d-flex align-items-center justify-content-center ">
                        <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('landing/images/statistic/department.png') }}"
                                    style="width: 120px ; height: 120px" alt="img-fluid">
                            </div>
                            <h5 class="fw-bolder fs-8 text-center text-white py-3">285</h5>
                            <h5 class="fw-bolder fs-8 text-center text-white">Kelurahan/Desa</h5>
                        </div>
                    </div>
                    <div class="col-xl-2 position-relative d-flex align-items-center justify-content-center ">
                        <div class="d-flex flex-column justify-content-between">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('landing/images/statistic/farm.png') }}"
                                    style="width: 120px ; height: 120px" alt="img-fluid">
                            </div>
                            <h5 class="fw-bolder fs-8 text-center text-white py-3">28k+</h5>
                            <h5 class="fw-bolder fs-8 text-center text-white">RPH-R</h5>
                        </div>
                    </div>
                    <div class="col-xl-2 position-relative d-flex align-items-center"></div>

                </div>
            </section>
            <!--  Statistic End  -->

            <!--  News Start  -->
            <section class="pt-5 px-0 px-xl-11 vh-100 d-flex flex-column justify-content-between">
                <h1 class="fw-bolder fs-8 fs-md-13 text-center py-3 mt-12 ">Berita Acara Kurban
                </h1>
                <div class="row">

                    <div class="col-md-4 px-5">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                alt="Thumbnail [100%x225]"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f3744ec38%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f3744ec38%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-5">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                alt="Thumbnail [100%x225]"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f3744ec39%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f3744ec39%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-5">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                alt="Thumbnail [100%x225]"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f3744ec3a%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f3744ec3a%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-5">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                alt="Thumbnail [100%x225]"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f3744ec38%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f3744ec38%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-5">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                alt="Thumbnail [100%x225]"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f3744ec39%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f3744ec39%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 px-5">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top"
                                data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                                alt="Thumbnail [100%x225]"
                                src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22288%22%20height%3D%22225%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20288%20225%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_18f3744ec3a%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A14pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_18f3744ec3a%22%3E%3Crect%20width%3D%22288%22%20height%3D%22225%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2296.828125%22%20y%3D%22118.8%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  News End  -->

        </div>
        <!--  Body End -->

        <footer class="footer-part pt-8 pb-5">
            <div class="container">

            </div>
        </footer>
        <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header p-4">
                <img src="{{ asset('landing/images/logos/logo-erpl.svg') }}" alt="img-fluid" width="150">
            </div>
            <div class="offcanvas-body p-4">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" target="_blank">Alur
                            Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" target="_blank">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" target="_blank">Biaya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" target="_blank">Unduh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" target="_blank">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <div class="">
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="btn fs-3 w-100 rounded py-2" href="#">Login</a>
                                </li>
                                <li class="nav-item ms-2">
                                    <a class="btn btn-primary fs-3 w-100 rounded btn-hover-shadow py-2"
                                        href="#">Mendaftar</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid px-0 px-xl-11 border-top">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 my-4">
            <a class=" d-flex align-items-center gap-2" href="index.html">
                <img src="{{ asset('landing/images/logos/logo.png') }}" alt="img-fluid">
                <h5 class="fw-bolder">Pantau Ternak</h5>
            </a>

            <a href="/"
                class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-md-4 justify-content-end">
                <li class="nav-item"><a href="#" class="nav-link px-2 ">Beranda</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 ">Lokasi
                        Pemantauan</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 ">Statistik</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 ">Berita</a></li>
            </ul>
        </footer>
    </div>
    <script src="{{ asset('landing/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/libs/aos/dist/aos.js') }}"></script>
    <script src="{{ asset('landing/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('landing/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landing/js/custom.js') }}"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
