@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div class="app-toolbar py-3 py-lg-6">
            <div class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">

                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        {{ end($bcs)["name"] }}
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($bcs as $index => $bc)
                                    @if ($index > 1)
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                        </li>
                                        @endif
                                        <?php $i++; ?>
                                    <li class="breadcrumb-item text-muted">
                                        <a href="{{ $bc["link"] }}" class="text-muted text-hover-primary">{{ $bc["name"] }}</a>
                                    </li>
                                    @endforeach
                    </ul>
                    <!--end::Title-->
                </div>
            </div>
        </div>

    </div>
@endsection
