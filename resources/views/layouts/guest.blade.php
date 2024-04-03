<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  Title -->
    <title>E-RPL Link</title>
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset("landing/images/logos/favicon.ico")}}">
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
            <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-11">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <div class="hero-content my-11 my-xl-0">
                                <div class=" d-grid gap-1 mb-2">
                                    <h1 class="fw-bolder fs-13" data-aos="fade-up" data-aos-delay="400"
                                    data-aos-duration="1000">Penerimaan Mahasiswa Baru</h1>
                                    <p class="fs-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600"
                                        data-aos-duration="1000">Rekognisi Pembelajaran Lampau (RPL) Tahun Ajaran 2022/2023</p>
                                </div>
                                <div class="d-sm-flex align-items-center gap-3 z-index-1" data-aos="fade-up"
                                    data-aos-delay="800" data-aos-duration="1000">
                                    <a class="btn btn-primary btn-hover-shadow d-block mb-3 mb-sm-0"
                                        href="#"><i class=""><img src="{{asset("landing/images/svgs/ph_sign-in-bold.svg")}}" alt="img-fluid" class="mx-2"></i>Mendaftar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 d-none d-xl-block" data-aos="fade-left" data-aos-duration="1000">
                            <img src="{{asset("landing/images/hero-img/hero-image.svg")}}" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <section class="statistik pb-md-10 pb-14 position-relative " oncontextmenu="return false;">
                <img src="{{asset("landing/images/svgs/acc-1.svg")}}" alt="" class=" position-absolute end-0  d-none d-lg-block z-index-0" style="top: 25%">
                <img src="{{asset("landing/images/svgs/acc-2.svg")}}" alt="" class=" position-absolute d-none d-lg-block  z-index-0" style="bottom:0; left:-15%;">
                <div class="container d-flex flex-column justify-content-center align-items-center">
                    <h1 class="pt-5 fw-bolder fs-12 text-white " data-aos="fade-up" data-aos-duration="1000">Data Statistik Terkini</h1>
                    <p class="text-white fs-4 fw-medium text-center" data-aos="fade-up" data-aos-duration="1000">Update animo pendaftar dan peserta yang telah lolos administrasi</p>
                </div>
                <section class="position-absolute top-100 start-50 translate-middle">
                    <div class="d-flex flex-row gap-md-5 gap-2 justify-content-center px-4 px-md-0">
                        <div class="d-flex flex-md-row flex-column theCard-statistik gap-4 align-items-center" data-aos="fade-right" data-aos-duration="1000">
                            <div class="iconCard-statistik p-3">
                                <img src="{{asset("landing/images/svgs/user-group-solid.svg")}}" alt="" >
                            </div>
                            <div class="d-flex flex-column justify-content-center textCard-statistik">
                                <h1 class="fw-bolder fs-12">194</h1>
                                <p class="fw-normal fs-4">Animo Pendaftar</p>
                            </div>
                        </div>
                        <div class="d-flex flex-md-row flex-column theCard-statistik gap-4 align-items-center"data-aos="fade-left" data-aos-duration="1000">
                            <div class="iconCard-statistik-2 p-3">
                                <img src="{{asset("landing/images/svgs/user-group-solid.svg")}}" alt="" >
                            </div>
                            <div class="d-flex flex-column justify-content-center textCard-statistik">
                                <h1 class="fw-bolder fs-12">138</h1>
                                <p class="fw-normal fs-4">Peserta Lulus Administrasi</p>
                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <section class="pt-md-14 pt-15" id="alur">
                <div class="container d-flex flex-column">
                    <div class="d-flex flex-md-row flex-column justify-content-center gap-3 ">
                        <div class="d-flex flex-column col-md-8" data-aos="fade-right" data-aos-duration="1000">
                            <h1 class="col-md-8 fw-semibold fs-12 text-start" style="color: #232933;" >Alur Pendaftaran
                                Penerimaan Mahasiswa Baru</h1>
                            <p class="fw-normal fs-4" style="color: #A6A6A6;">Setiap peserta seleksi penerimaan mahasiswa baru harus mengikuti langkah-langkah berikut, agar mendapatkan kartu peserta tes sebagai syarat mengikuti ujian seleksi masuk</p>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center align-self-center" data-aos="fade-left" data-aos-duration="1000">
                            <div class="">
                                <a class="btn btn-outline-primary "
                                href="#"><i class="mx-3"><img src="{{asset("landing/images/svgs/icon-download.svg")}}" alt="img-fluid"></i> Download Panduan & Juknis</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-md-row flex-column justify-content-center gap-2" data-aos="fade" data-aos-duration="1000">
                        <div class="d-flex justify-content-center">
                            <img src="{{asset("landing/images/hero-img/alur-image.png")}}" alt="">
                        </div>
                        <div class="col-md-6 d-flex flex-column gap-2 justify-content-center">
                            <div class="d-flex flex-row gap-2">
                                <div class="pt-1">
                                    <img src="{{asset("landing/images/svgs/tree-structure.svg")}}" alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <h1 class="fw-semibold fs-6" style="color: #232933;">Membuat Akun</h1>
                                    <p class="col-10 fw-normal fs-4" style="color: #A6A6A6;">Pembuatan akun menggunakan NIK sesuai identitas di KTP/KK dan email tunggal</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row gap-2">
                                <div class="pt-1">
                                    <img src="{{asset("landing/images/svgs/tree-structure.svg")}}" alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <h1 class="fw-semibold fs-6" style="color: #232933;">Melengkapi Persyaratan</h1>
                                    <p class="fw-normal fs-4" style="color: #A6A6A6;">Peserta diwajibkan melengkapi persyaratan pendaftaran seperti pengisian formulir pendaftaran, upload foto/KTP/KK dan persyaratan lain sesuai jalur masuk</p>
                                </div>
                            </div>
                            <div class="d-flex flex-row gap-2">
                                <div class="pt-1">
                                    <img src="{{asset("landing/images/svgs/tree-structure.svg")}}" alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <h1 class="fw-semibold fs-6" style="color: #232933;">Verfikasi oleh Panitia</h1>
                                    <p class="fw-normal fs-4" style="color: #A6A6A6;">Panitia akan melakukan verifikasi berkas pendaftaran. Pendaftar yang tidak melengkapi berkas sesuai persyaratan dinyatakan tidak lolos administrasi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-12" style="background: #3560A0" id="jadwal">
                <div class="container d-flex flex-column py-5 gap-2">
                    <div class="d-flex flex-md-row flex-column justify-content-between align-content-center " data-aos="fade" data-aos-duration="1000">
                        <h1 class="col-md-3 fw-semibold fs-12 text-start text-white">Jadwal Penting
                            PMB Jalur RPL</h1>
                        <p class="col-md-6 align-self-center fw-medium fs-4 text-start text-white">Jangan lewatkan momen penting dalam Penerimaan Mahasiswa Baru (PMB) Jalur Rekognisi Pembelajaran Lampau (RPL)</p>
                        <div class="align-self-center">
                            <a class="btn btn-primary btn-hover-shadow d-block"
                            href="#"><i class=""><img src="{{asset("landing/images/svgs/ph_sign-in-bold.svg")}}" alt="img-fluid" class="mx-2"></i> Masuk</a>
                        </div>
                    </div>
                    <div class="d-flex flex-md-row flex-column justify-content-center pt-4 gap-3">
                        <div class="d-flex flex-column gap-3 theCard-Jadwal col-md-3" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                            <div class="d-flex flex-row align-items-center gap-2">
                                <div class="iconCard-Jadwal">
                                    <img src="{{asset("landing/images/svgs/calendar-outline.svg")}}" alt="img-fluid" class="p-1">
                                </div>
                                <div class="pt-3">
                                    <p class="">Pendaftaran</p>
                                </div>
                            </div>
                            <p class="cardDes">Isi formulir pendaftaran dan sertakan dokumen pendukung Anda untuk memulai perjalanan akademis yang menarik bersama kami.</p>
                            <div class="jadwalInformation-cls col-10 d-flex justify-content-center">
                                CLOSED
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-3 theCard-Jadwal col-md-3" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                            <div class="d-flex flex-row align-items-center gap-2">
                                <div class="iconCard-Jadwal">
                                    <img src="{{asset("landing/images/svgs/calendar-outline.svg")}}" alt="img-fluid" class="p-1">
                                </div>
                                <div class="pt-3">
                                    <p class="">Seleksi Administrasi</p>
                                </div>
                            </div>
                            <p class="cardDes">Setelah pendaftaran, tim kami akan melakukan seleksi administrasi. Pastikan semua dokumen Anda lengkap dan sesuai dengan persyaratan.</p>
                            <div class="jadwalInformation-open col-10 d-flex justify-content-center">
                                2 Mei 2024 - 10 Mei 2024
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-3 theCard-Jadwal col-md-3" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="600">
                            <div class="d-flex flex-row align-items-center gap-2">
                                <div class="iconCard-Jadwal">
                                    <img src="{{asset("landing/images/svgs/calendar-outline.svg")}}" alt="img-fluid" class="p-1">
                                </div>
                                <div class="pt-3">
                                    <p>Proses Asessmen</p>
                                </div>
                            </div>
                            <p class="cardDes">Anda akan mengikuti tes tulis dan wawancara untuk menilai pemahaman dan keterampilan Anda dalam bidang yang relevan.</p>
                            <div class="jadwalInformation-open col-10 d-flex justify-content-center">
                                20 Mei 2024 - 25 Mei 2024
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-3 theCard-Jadwal col-md-3" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="800">
                            <div class="d-flex flex-row align-items-center gap-2">
                                <div class="iconCard-Jadwal">
                                    <img src="{{asset("landing/images/svgs/calendar-outline.svg")}}" alt="img-fluid" class="p-1">
                                </div>
                                <div class="pt-3">
                                    <p>Evaluasi Diri</p>
                                </div>
                            </div>
                            <p class="cardDes">Ceritakan pengalaman belajar Anda secara jelas dan objektif. Kami akan mempertimbangkan evaluasi diri Anda dalam proses seleksi.</p>
                            <div class="jadwalInformation-open col-10 d-flex justify-content-center">
                                30 Mei 2024
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-12" id="biaya">
                <div class="container d-flex flex-column py-5 gap-2 ">
                    <div class="d-flex flex-md-row flex-column justify-content-between align-content-center theBiaya" data-aos="fade" data-aos-duration="1000">
                        <h1 class="col-md-4 align-self-center fw-semibold fs-12 text-start" style="color: #232933;">Biaya Pendaftaran dan Pendidikan</h1>
                        <p class="col-md-3 align-self-center fw-medium fs-4 text-start" style="color: #A6A6A6">Jangan ragu untuk menghubungi Call Center untuk pertanyaan lebih lanjut</p>
                        <div class="align-self-center">
                            <a class="btn btn-primary btn-hover-shadow d-block"
                            href="#"><i class=""><img src="{{asset("landing/images/svgs/baseline-support-agent.svg")}}" alt="img-fluid" class="mx-2"></i> Hubungi Call Center</a>
                        </div>
                    </div>
                    <div class="pt-4" data-aos="fade-up" data-aos-duration="1000">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Program</th>
                                <th scope="col">Biaya Pendaftaran</th>
                                <th scope="col">Biaya UKT/Semester</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <div class="d-flex flex-row gap-3">
                                        <div class="theIcon-program p-3">
                                            <img src="{{asset("landing/images/svgs/icon-park-outline_bachelor-cap-one.svg")}}" alt="img-fluid" class="">
                                        </div>
                                        <div class="theProgram-text d-flex flex-column justify-content-center">
                                            <h1>Diploma 3 (D3)</h1>
                                            <p>Diploma degree</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Rp. 500.000,00</td>
                                <td class="align-middle">Rp. 3.235.000,00</td>
                              </tr>
                              <tr>
                                <td>
                                    <div class="d-flex flex-row gap-3">
                                        <div class="theIcon-program p-3">
                                            <img src="{{asset("landing/images/svgs/icon-park-outline_bachelor-cap-one.svg")}}" alt="img-fluid" class="">
                                        </div>
                                        <div class="theProgram-text d-flex flex-column justify-content-center">
                                            <h1>Diploma 4 (D4)</h1>
                                            <p>Diploma degree</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Rp. 500.000,00</td>
                                <td class="align-middle">Rp. 3.235.000,00</td>
                              </tr>
                              <tr>
                                <td>
                                    <div class="d-flex flex-row gap-3">
                                        <div class="theIcon-program p-3">
                                            <img src="{{asset("landing/images/svgs/icon-park-outline_bachelor-cap-one.svg")}}" alt="img-fluid" class="">
                                        </div>
                                        <div class="theProgram-text d-flex flex-column justify-content-center">
                                            <h1>Strata Satu (S1)</h1>
                                            <p>Bachelor degree</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Rp. 600.000,00</td>
                                <td class="align-middle">Rp. 4.235.000,00</td>
                              </tr>
                              <tr>
                                <td>
                                    <div class="d-flex flex-row gap-3">
                                        <div class="theIcon-program p-3">
                                            <img src="{{asset("landing/images/svgs/icon-park-outline_bachelor-cap-one.svg")}}" alt="img-fluid" class="">
                                        </div>
                                        <div class="theProgram-text d-flex flex-column justify-content-center">
                                            <h1>Magister (S2)</h1>
                                            <p>Master degree</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Rp. 1.250.000,00</td>
                                <td class="align-middle">Rp. 10.150.000,00</td>
                              </tr>
                              <tr>
                                <td>
                                    <div class="d-flex flex-row gap-3">
                                        <div class="theIcon-program p-3">
                                            <img src="{{asset("landing/images/svgs/icon-park-outline_bachelor-cap-one.svg")}}" alt="img-fluid" class="">
                                        </div>
                                        <div class="theProgram-text d-flex flex-column justify-content-center">
                                            <h1>Doktor (S3)</h1>
                                            <p>Doctor degree</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Rp. 2.000.000,00</td>
                                <td class="align-middle">Rp. 15.165.000,00</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </section>

            <section class="mt-12">
                <div class="container d-flex flex-md-row flex-column justify-content-between" >
                    <div class="d-flex justify-content-center" data-aos="fade-right" data-aos-duration="1000">
                        <img src="{{asset("landing/images/hero-img/syarat-image.svg")}}" alt="">
                    </div>
                    <div class="d-flex flex-column gap-2 theSyarat-title col-md-4 mx-5  mx-md-0" data-aos="fade-left" data-aos-duration="1000">
                        <h1 class="fw-semibold fs-12 text-start" style="color: #232933;">Persyaratan Umum</h1>
                        <p class="fw-medium fs-4 text-start" style="color: #A6A6A6;">Selain persyaratan umum tersebut, Pendaftar harus memenuhi syarat khusus</p>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex flex-row gap-3 theSyarat-list">
                                <img src="{{asset("landing/images/svgs/Check-Circle.svg")}}" alt="img-fluid" class="">
                                <p class="col-8 fw-normal fs-4 text-start m-0" style="color: #232933;">Warga Negara Indonesia (WNI)</p>
                            </div>
                            <div class="d-flex flex-row gap-3 theSyarat-list">
                                <img src="{{asset("landing/images/svgs/Check-Circle.svg")}}" alt="img-fluid" class="">
                                <p class="fw-normal fs-4 text-start m-0" style="color: #232933;">Pada saat mendaftar, calon peserta berumur maksimal 52 tahun</p>
                            </div>
                            <div class="d-flex flex-row gap-3 theSyarat-list">
                                <img src="{{asset("landing/images/svgs/Check-Circle.svg")}}" alt="img-fluid" class="">
                                <p class="fw-normal fs-4 text-start m-0" style="color: #232933;">Mengisi Formulir Pendaftaran Form 01, Form 02 dan Form 03 di Aplikasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="my-12" id="faq">
                <div class="container d-flex flex-column theFAQ " data-aos="fade" data-aos-duration="1000">
                    <h1 class="fw-semibold fs-12 text-center">FaQ PMB Jalur RPL</h1>
                    <div class="col-md-8 align-self-center pt-3 mx-2 mx-md-0">
                        <div class="accordion accordion-flush" id="accordionExample">
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button accFAQ" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apa itu Jalur RPL?
                                </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show accFAQdes" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Jalur RPL adalah jalur penerimaan mahasiswa baru yang memungkinkan pengakuan atas pengalaman belajar yang telah diperoleh di luar pendidikan formal, seperti kursus, pelatihan, atau pengalaman kerja yang relevan dengan program studi yang ditawarkan.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button accFAQ" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Bagaimana cara mendaftar melalui Jalur RPL?
                                </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse accFAQdes" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Untuk mendaftar melalui Jalur RPL, Anda perlu mengisi formulir pendaftaran online dan menyertakan dokumen pendukung yang diperlukan, seperti transkrip nilai, sertifikat kursus, dan bukti-bukti pengalaman belajar lainnya.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button accFAQ" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Apa saja dokumen yang harus disiapkan untuk pendaftaran Jalur RPL?
                                </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse accFAQdes" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Dokumen yang perlu disiapkan termasuk transkrip nilai, sertifikat kursus atau pelatihan, portfolio (jika diperlukan), surat referensi (jika diperlukan), dan dokumen-dokumen lain yang mendukung pengalaman belajar Anda.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button accFAQ" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Berapa lama proses seleksi melalui Jalur RPL?
                                </button>
                              </h2>
                              <div id="collapseFour" class="accordion-collapse collapse accFAQdes" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Proses seleksi melalui Jalur RPL biasanya memakan waktu sekitar [jumlah waktu] setelah pendaftaran ditutup. Namun, waktu ini dapat bervariasi tergantung pada jumlah pendaftar dan kompleksitas penilaian.
                                </div>
                              </div>
                            </div>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button accFAQ" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Apakah ada beasiswa yang tersedia untuk mahasiswa Jalur RPL?
                                </button>
                              </h2>
                              <div id="collapseFive" class="accordion-collapse collapse accFAQdes" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Ya, kami menyediakan berbagai program beasiswa dan bantuan keuangan untuk mahasiswa Jalur RPL yang memenuhi syarat. Informasi lebih lanjut tentang program-program ini dapat ditemukan di [link informasi beasiswa dan bantuan keuangan].
                                </div>
                              </div>
                            </div>
                          </div>

                    </div>
                </div>
            </section>

        </div>
        <footer class="footer-part pt-8 pb-5">
            <div class="container">

            </div>
        </footer>
        <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header p-4">
                <img src="{{asset("landing/images/logos/logo-erpl.svg")}}" alt="img-fluid" width="150">
            </div>
            <div class="offcanvas-body p-4">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"
                            target="_blank">Alur Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"
                            target="_blank">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"
                            target="_blank">Biaya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"
                            target="_blank">Unduh</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"
                            target="_blank">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <div class="">
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="btn fs-3 w-100 rounded py-2"
                            href="#">Login</a>
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
    @include('layouts.partials.landing-footer')
    <script src="{{asset("landing/libs/jquery/dist/jquery.min.js")}}"></script>
    <script src="{{asset("landing/libs/aos/dist/aos.js")}}"></script>
    <script src="{{asset("landing/libs/bootstrap/dist/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("landing/libs/owl.carousel/dist/owl.carousel.min.js")}}"></script>
    <script src="{{asset("landing/js/custom.js")}}"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
