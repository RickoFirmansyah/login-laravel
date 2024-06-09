<footer class="footer-part mt-11 pt-13 bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between gap-4 gap-lg-0" data-aos="fade-up">
            <div class="col-lg-6">
                <div class="text-white">
                    <h1 class="fw-medium fs-12 mb-0 text-white fw-bolder mb-5">Dinas Peternakan dan Perikanan Kabupaten
                        Blitar
                    </h1>
                    <div class="">
                        <i class="fa-solid fa-location-dot text-white"></i>
                        <p class="text-white">{{ \App\Helpers\SystemSettingHelper::get('alamat') }}</p>
                        <i class="fa-solid fa-phone text-white"></i>
                        <p class="text-white">Telp. {{ \App\Helpers\SystemSettingHelper::get('no_telp') }} | Email: {{ \App\Helpers\SystemSettingHelper::get('email') }}</p>
                        <i class="fa-brands fa-facebook text-white"></i>
                        <p class="text-white">{{ \App\Helpers\SystemSettingHelper::get('footer') }}</p>
                    </div>
                </div>
            </div>
            <div class="">
                <a href="/">
                    <img src="{{ asset('landing/images/logo_kab_blitar_footer.png') }}" alt=""
                        class="img-fluid pb-3">
                </a>
            </div>
        </div>
    </div>
    <div class="text-center mt-5 pt-4 pb-3 " style="background-color: #061520">
        <p class="text-white fs-3">Dikelola oleh <span class="fw-bolder">Dinas Peternakan dan Perikanan Kabupaten
                Blitar</span>
        </p>
    </div>
</footer>
