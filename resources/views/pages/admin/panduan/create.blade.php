@extends('layouts.app')

@push('vendor-css')
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>     --}}
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" 
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" 
    crossorigin=""/>
    <style>
        #mapid { height: 180px; }
    </style> --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets\js\pg\custom\leaflet\leaflet.bundle.css') }}"/> --}}
@endpush

@push('css')
@endpush

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

    {{-- <link rel="styleshet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>     --}}
    <style>
        #map { height: 180px; }
    </style>
    <div class="py-4">
        <div class="row">
            <div class="">
                <form method="POST" action="{{ route('admin.panduan.store') }}" custom-action="true">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Enter title" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="numbers" class="form-label">No Urut</label>
                                <input type="number" class="form-control" id="numbers" name="numbers" placeholder="Enter numbers"
                                    required>
                                @if ($errors->has('numbers'))
                                    <span class="text-danger">{{ $errors->first('numbers') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea type="description" class="form-control" id="description" name="description" placeholder="Enter description"
                                    required></textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.tempat-pemotongan.index') }}" class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>
        </div>
    </div>
    @endsection
@push('vendor-scripts')
@endpush

@push('scripts')
@endpush