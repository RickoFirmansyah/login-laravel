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
                <form method="POST" action="{{ route('admin.tempat-pemotongan.store') }}" custom-action="true">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_tempat" class="form-label">Nama Tempat Pemotongan</label>
                                <input type="text" class="form-control" id="nama_tempat" name="nama_tempat"
                                    placeholder="Enter nama_tempat" required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('nama_tempat') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <input type="alamat_lengkap" class="form-control" id="alamat_lengkap" name="alamat_lengkap" placeholder="Enter alamat_lengkap"
                                    required>
                                @if ($errors->has('alamat_lengkap'))
                                    <span class="text-danger">{{ $errors->first('alamat_lengkap') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">provinsi</label>
                                {{-- <input type="hidden" id="id_provinsi" name="provinsi" value=""> --}}
                                <select class="form-select" id="provinsi" required name="provinsi">
                                    <option value="">Select provinsi</option>
                                    @foreach ($provinsi as $provinsis)
                                        <option value="{{ $provinsis->id }}">{{ $provinsis->nama }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('provinsi'))
                                    <span class="text-danger">{{ $errors->first('provinsi') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="kabupatenKota" class="form-label">kabupatenKota</label>
                                <select class="form-select" id="kabupatenKota" name="kabupatenKota" required>
                                    <option value="">Select kabupatenKota</option>
                                    {{-- @foreach ($kabupatenKota as $kabupatenKotas)
                                        <option value="{{ $kabupatenKotas->nama }}">{{ $kabupatenKotas->nama }}</option>
                                    @endforeach --}}
                                </select>
                                @if ($errors->has('kabupatenKota'))
                                    <span class="text-danger">{{ $errors->first('kabupatenKota') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">kecamatan</label>
                                <select class="form-select" id="kecamatan" name="kecamatan" required>
                                    <option value="">Select kecamatan</option>
                                    {{-- @foreach ($kecamatan as $kecamatans)
                                        <option value="{{ $kecamatans->nama }}">{{ $kecamatans->nama }}</option>
                                    @endforeach --}}
                                </select>
                                @if ($errors->has('kecamatan'))
                                    <span class="text-danger">{{ $errors->first('kecamatan') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="kelurahan" class="form-label">kelurahan</label>
                                <select class="form-select" id="kelurahan" name="kelurahan" required>
                                    <option value="">Select kelurahan</option>
                                    {{-- @foreach ($kelurahan as $kelurahans)
                                        <option value="{{ $kelurahans->nama }}">{{ $kelurahans->nama }}</option>
                                    @endforeach --}}
                                </select>
                                @if ($errors->has('kelurahan'))
                                    <span class="text-danger">{{ $errors->first('kelurahan') }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div id="map"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="latitude" class="form-label">latitude</label>
                                <input type="latitude" class="form-control" id="latitude" name="latitude" readonly placeholder="Enter latitude"
                                    required>
                                @if ($errors->has('latitude'))
                                    <span class="text-danger">{{ $errors->first('latitude') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="longtitude" class="form-label">longtitude</label>
                                <input type="longtitude" class="form-control" id="longtitude" name="longtitude" readonly placeholder="Enter longtitude"
                                    required>
                                @if ($errors->has('longtitude'))
                                    <span class="text-danger">{{ $errors->first('longtitude') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="typeOfPlace" class="form-label">Tipe Tempat</label>
                                <select class="form-select" id="typeOfPlace" name="typeOfPlace" required>
                                    <option value="">Select Type Place</option>
                                    @foreach ($tempatType as $tempatTypes)
                                        <option value="{{ $tempatTypes->id }}">{{ $tempatTypes->type_of_place }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('typeOfPlace'))
                                    <span class="text-danger">{{ $errors->first('typeOfPlace') }}</span>
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
    {{-- <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script> --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- <script src="{{asset('assets\js\pg\custom\leaflet\leaflet.bundle.js')}}"></script> --}}
    <script>
        // var map = L.map('map').setView([51.505, -0.09], 13);
        var map = L.map('map').setView([-6.265623, 106.807284], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var popup = L.popup()
            .setLatLng([-6.265623, 106.807284])
            .setContent("I am a standalone popup.")
            .openOn(map);
        function onMapClick(e) {
            popup
            .setLatLng(e.latlng)
            .setContent("You clicked the map at " + e.latlng.toString())
            .openOn(map);
            
            // let latitudeClick = 
            console.log(e);

            const latitude = document.getElementById("latitude");
            latitude.value = e.latlng.lat.toString()

            const longtitude = document.getElementById("longtitude");
            longtitude.value = e.latlng.lng.toString()
        }

        map.on('click', onMapClick);
        $(document).ready(function() {
            $('#provinsi').on('change', function() {
                var provinsiId = $(this).val();
                $('#kabupatenKota').html('<option value="">Select Kabupaten/Kota</option>'); // Clear previous options
                $('#kecamatan').html('<option value="">Select Kecamatan</option>'); // Clear kecamatan options
                $('#kelurahan').html('<option value="">Select Kelurahan</option>'); // Clear kelurahan options
                console.log(provinsiId);
                if (provinsiId) {
                    $.ajax({
                        url: '/admin/data-pokok/tempat-pemotongan/kabupaten/' + provinsiId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#kabupatenKota').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching kabupaten:', error);
                        }
                    });
                }
            });
        });
        $(document).ready(function() {
            $('#kabupatenKota').on('change', function() {
                var kabupatenId = $(this).val();
                $('#kecamatan').html('<option value="">Select Kecamatan</option>'); // Clear previous options
                $('#kelurahan').html('<option value="">Select Kelurahan</option>'); // Clear kelurahan options
                console.log(kabupatenId);
                if (kabupatenId) {
                    $.ajax({
                        url: '/admin/data-pokok/tempat-pemotongan/kecamatan/' + kabupatenId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#kecamatan').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching kecamatan:', error);
                        }
                    });
                }
            });
        })
        $(document).ready(function() {
            $('#kecamatan').on('change', function() {
                var kecamatanId = $(this).val();
                $('#kelurahan').html('<option value="">Select Kelurahan</option>'); // Clear previous options

                console.log(kecamatanId);
    
                if (kecamatanId) {
                    $.ajax({
                        url: '/admin/data-pokok/tempat-pemotongan/kelurahan/' + kecamatanId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#kelurahan').append('<option value="'+ value.id +'">'+ value.nama +'</option>');
                            });
                        },
                        error: function(error) {
                            console.error('Error fetching kelurahan:', error);
                        }
                    });
                }
            });
        })
    </script>
@endpush

@push('scripts')
@endpush