@extends('layouts.auth')
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
@endsection
