@extends('layouts.auth')
@section('content')
    <section class="container">
        <article class ="row justify-content-center">
            <div class="px-3 col-lg-8">
                <div class="container">
                    <h2 class ="mt-5 fs-8 ">
                        <a href ="{{ route('guest.berita') }}" style="background-color:#e02251; "
                            class="rounded-circle text-white px-2 m-0 py-2 ti ti-chevron-left px-1"></a>
                    </h2>
                    <h2 class ="mt-2">{{ $detailNews->title }}</h2>
                    <p style = "font-size:12px" class = "pb-3">
                        <span class ="px-2"><i style = "font-size: 18px;"
                                class="ti ti-calendar-time px-1"></i><?php echo substr($detailNews->created_at, 0, 10); ?></span>
                    </p>
                    <div class = "my-3">
                        <img src="{{ url('storage/' . $detailNews->image) }}" class="card-img-top" alt="...">

                        <div class = "fs-4 px-2">
                            <p style =" width:500px">{!! $detailNews->description !!}</p>
                        </div>

                    </div>
                </div>
            </div>
        </article>
    </section>
    @include('layouts.partials.landing-footer')
@endsection
