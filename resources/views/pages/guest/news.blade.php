@extends('layouts.auth')
@section('content')
    <section class = "px-5 row">
        <article class="col-lg-8  pt-3 pb-5 ps-5 pe-5 ">
            <div class="container">
                @forelse ($berita as $news)
                    <div class="card shadow my-4 rounded" data-aos="fade-up" data-aos-delay="300" data-aos-duration="900">
                        <img src="{{ url('storage/' . $news->image) }}" class="card-img-top rounded" alt="...">
                        <div class="card-body">
                            <h3 class="card-title fw-semibold py-1"><a class ="a-news"
                                    href="{{ route('guest.berita', $news->id) }}">{{ $news->title }}</a></h3>
                            <p style = "font-size:12px" class = "pb-3">
                                <span><i style = "font-size: 18px;"
                                        class="ti ti-calendar-time px-2"></i><?php echo substr($news->created_at, 0, 10); ?></span>
                            </p>
                            <p class="card-text ">
                                <a class = "text-black-50" style ="font-size:16px"
                                    href="{{ route('guest.berita', $news->id) }}"><?php echo substr($news->description, 0, 200); ?>....</a>
                            </p>
                            <p class="text-end px-5 py-0 ">
                                <a href = "{{ route('guest.detail', $news->id) }}" class="btn btn-primary">Baca
                                    Selengkapnya</a>
                            </p>
                        </div>
                    </div>
                @empty
                    <p>Tidak ada berita yang ditemukan.</p>
                @endforelse
            </div>
            {{-- <div>
                {{ $news->links('layouts.partials.paginate-news') }}
            </div> --}}

        </article>

        <article class= " col-lg-4 pt-5 pb-5 ps-0 pe-5 container">

            <div class="card rounded-0" style="background-color:var(--bs-gray-100);">
                <div class ="container p-4">
                    <!-- <h4 class ="text-black-60 fw-bold">Search</h4>-->
                    <h4 class ="text-black-60 fw-bold">Berita Lain</h4>
                    <hr class ="m-0"
                        style = "background: linear-gradient(to right, var(--bs-andini1), var(--bs-andini3)); height:3px; border:none; opacity: 1;">
                    @foreach ($berita as $news)
                        <div class="card bg-transparent my-4" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-5">
                                    <img src="{{ url('storage/' . $news->image) }}" class="card-img-top rounded"
                                        alt="...">
                                </div>
                                <div class="col-md-7">
                                    <div class="m-0 p-2 card-body">
                                        <h5 class="card-title fs-2"><a class ="a-news"
                                                href="{{ route('guest.berita', $news->id) }}">{{ $news->title }}</a></h5>
                                        <p class="m-0">
                                            <span class ="fs-1"><i style = "font-size: 12px;"
                                                    class="ti ti-calendar-time px-2 text-black fw-bold"></i><?php echo substr($news->created_at, 0, 10); ?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </article>
    </section>
    @include('layouts.partials.landing-footer')
@endsection

{{-- @extends('layouts.auth')
@section('content')
    <section class="mt-5 container" id="berita">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1 class="pt-5 fw-bolder fs-12 mb-5" data-aos="fade-up" data-aos-duration="1000">Berita</h1>
        </div>
        <div class=" row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" data-aos="fade-up" data-aos-duration="1000">
            @foreach ($berita as $item)
                <div class="col">
                    <div class="card shadow-sm p-2 border border-1 border-light-subtle">
                        <img src="{{ url('storage/' . $item->image) }}" class="bd-placeholder-img card-img-top rounded">
                        <div class="card-body p-2">
                            <p class="card-text fs-4 text-start">{{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection --}}
