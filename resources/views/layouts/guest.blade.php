<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Title -->
    <title>RPH Kab Blitar</title>
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('landing/images/logo_kab_blitar.png') }}">
    <!--  Aos -->
    <link rel="stylesheet" href="{{ asset('landing/libs/aos/dist/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.min.css') }}">
    @stack('css')
</head>

<body>
    <div class="page-wrapper p-0 overflow-hidden">
        @include('layouts.partials.landing-header')
        <div class="body-wrapper overflow-hidden">
            {{-- Hero Section Start --}}
            <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-11 pt-2 pt-lg-9">
                <div class="container">
                    <div id="carouselExampleCaptions" class="carousel slide">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('landing/images/hero-img.png') }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-white fs-13 fw-bolder">Pemantauan Hewan Kurban yang Terorganisir
                                    </h5>
                                    <p>Manajemen Hewan Kurban yang Mudah dan Terstruktur</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('landing/images/hero-img.png') }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-white fs-13 fw-bolder">Pendataan Hewan Kurban yang Akurat dan Tepat
                                    </h5>
                                    <p>Sistem Pendataan yang Akurat untuk Menjamin Kualitas Hewan Kurban</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('landing/images/hero-img.png') }}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-white fs-13 fw-bolder">Kualitas dan Transparansi dalam Pendataan
                                        Kurban</h5>
                                    <p>Sistem Pendataan yang Transparan untuk Memastikan Kualitas Hewan Kurban</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>
            {{-- Hero Section End --}}

            {{-- Statistik Section Start --}}
            <section class="statistik pb-md-10 pb-14 position-relative bg-dark" oncontextmenu="return false;">
                <div class="container d-flex flex-column justify-content-center align-items-center">
                    <h1 class="pt-5 fw-bolder fs-12 text-white " data-aos="fade-up" data-aos-duration="1000">Statistik
                        Kurban</h1>
                    <p class="text-white fs-4 fw-medium text-center" data-aos="fade-up" data-aos-duration="1000">Data
                        langsung dari pemantauan</p>
                </div>
                <section class="position-absolute top-100 start-50 translate-middle">
                    <div class="d-flex flex-row gap-md-5 gap-2 justify-content-center px-4 px-md-0">
                        <div class="d-flex flex-md-row flex-column theCard-statistik gap-4 align-items-center"
                            data-aos="fade-right" data-aos-duration="1000">
                            <div class=" p-3">
                                <img src="{{ asset('landing/images/logo_sapi.png') }}" alt="">
                            </div>
                            <div class="d-flex flex-column justify-content-center textCard-statistik">
                                <h1 class="fw-bolder fs-12">2000+</h1>
                                <p class="fw-normal fs-4">Hewan Kurban</p>
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column theCard-statistik gap-4 align-items-center"
                            data-aos="fade-bottom" data-aos-duration="1000">
                            <div class=" p-3">
                                <img src="{{ asset('landing/images/logo_orang.png') }}" alt="">
                            </div>
                            <div class="d-flex flex-column justify-content-center textCard-statistik">
                                <h1 class="fw-bolder fs-12">500+</h1>
                                <p class="fw-normal fs-4">Petugas Pemantauan</p>
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column theCard-statistik gap-4 align-items-center"
                            data-aos="fade-left" data-aos-duration="1000">
                            <div class=" p-3">
                                <img src="{{ asset('landing/images/logo_map.png') }}" alt="">
                            </div>
                            <div class="d-flex flex-column justify-content-center textCard-statistik">
                                <h1 class="fw-bolder fs-12">100+</h1>
                                <p class="fw-normal fs-4">Lokasi Pemotongan</p>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
            {{-- Statistik Section End --}}

            {{-- Map Section Start --}}
            <section class="pt-md-14 pt-15" id="map-kurban">
                <div class="container border border-2 border-light-subtle rounded p-5 shadow">
                    <div class="d-flex flex-md-row flex-column justify-content-beetween align-items-center border-bottom border-2 border-light-subtle rounded p-3"
                        data-aos="fade-left">
                        <div class="col-md-2">
                            <img width="50" height="50" src="{{ asset('landing/images/logo_kab_blitar.png') }}" alt="">
                        </div>
                        <h1 class="fw-semibold fs-12 text-center col-md-8">Lokasi Pemotongan</h1>
                        <input type="text" name="search" class="col-md-2 border-2 border-dark border rounded p-2"
                            placeholder="Cari lokasi pemotongan">
                    </div>
                    <div id="map" class="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252781.0442781718!2d112.21726654999998!3d-8.131605999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78eb3e59dda50f%3A0x6ce6e27c1403adc7!2sKabupaten%20Blitar%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1716142175090!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
            </section>
            {{-- Map Section End --}}

            {{-- Pengumuman Section Start --}}
            <section class="mt-5 pt-12 bg-dark pb-5" id="pengumuman">
                <div class="container d-flex flex-md-row flex-column justify-content-between  w-100">
                    <div class="d-flex flex-column gap-2 col-md-5 border border-2 border-light-subtle rounded p-3 shadow"
                        data-aos="fade-right" data-aos-duration="1000">
                        <div class='content-pengumuman  '>
                            <h1 class="fw-semibold fs-12 text-white mb-3">Pengumuman</h1>
                            @foreach ($pengumuman as $p)
                            <div class="border border-2 border-light-subtle rounded p-3 mb-3 text-white">
                                <p>{{ strip_tags($p->description) }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 col-md-6 mx-5  mx-md-0 border border-2 border-light-subtle rounded p-3"
                        data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="fw-semibold fs-12 text-start text-white">Statistik</h1>
                        <img src="{{ asset('landing/images/grafik.png') }}" alt="">
                    </div>
                </div>
        </div>
        </section>
        {{-- Pengumuman Section End --}}

        {{-- Berita Section Start --}}
        <section class="mt-5 container" id="berita">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <h1 class="pt-5 fw-bolder fs-12 mb-5" data-aos="fade-up" data-aos-duration="1000">Berita</h1>
            </div>
            <div class="album py-5">
                <div class="container">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" data-aos="fade-up"
                        data-aos-duration="1000">
                        @foreach ($news as $item)
                        <div class="col">
                            <div class="card shadow-sm h-100">
                                <div class="card-img-top rounded" style="height: 200px; overflow: hidden;">
                                    <img src="{{ url('storage/' . $item->image) }}" class="w-100 h-100 object-cover"
                                        alt="...">
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <h1 class="card-title fs-5">
                                        <a class="a-news" href="{{ route('guest.detail', $item->id) }}">
                                            {{ Str::limit($item->title, 50) }}
                                        </a>
                                    </h1>
                                    <p class="card-text flex-grow-1">
                                        {{ Str::limit(strip_tags($item->description), 100) }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-auto">
                                        <div class="btn-group">
                                            <a href="{{ route('guest.detail', $item->id) }}">
                                                <button type="button" class="btn btn-sm btn-outline-secondary">Baca
                                                    selengkapnya</button>
                                            </a>
                                        </div>
                                        <small>
                                            <i style="font-size: 18px;" class="ti ti-calendar-time px-2"></i>
                                            {{ $item->created_at->format('Y-m-d') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        {{-- Berita Section End --}}
    </div>
    <div class="offcanvas offcanvas-start modernize-lp-offcanvas bg-dark" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-body p-4">
            <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#" target="_blank">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#" target="_blank">Lokasi
                        Kurban</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#" target="_blank">Statistik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#" target="_blank">Pengumuman</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="#" target="_blank">Berita</a>
                </li>
                <li class="nav-item">
                    <div class="mt-5">
                        <ul class="navbar-nav">
                            <li class="nav-item ms-2">
                                <a class="btn btn-primary bg-secondary fs-3 w-100 rounded btn-hover-shadow py-2"
                                    href="/login">Masuk</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </div>
    @include('layouts.partials.landing-footer')
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