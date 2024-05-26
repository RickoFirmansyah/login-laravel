@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('admin.data-pokok.tempat-pemotongan.store') }}" custom-action="true">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="cutting_place"
                            placeholder="Masukkan nama tempat" required>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address"
                            placeholder="Masukkan alamat" required>
                        @if ($errors->has('address'))
                            <span class="text-danger">{{ $errors->first('address') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="type_of_place" class="form-label">Jenis Tempat</label>
                        <select class="form-select" id="type_of_place" name="type_of_place_id" required>
                            <option value="">Pilih Jenis Tempat</option>
                            @foreach ($typeOfPlace as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->type_of_place }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('type_of_place'))
                            <span class="text-danger">{{ $errors->first('type_of_place') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-select" id="kecamatan" name="kecamatan_id" required>
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatan as $id => $nama)
                                <option value="{{ $id }}">{{ $nama }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('kecamatan_id'))
                            <span class="text-danger">{{ $errors->first('kecamatan_id') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="form-select" id="kelurahan" name="kelurahan_id" required>
                            <option value="">Pilih Kelurahan</option>
                            @foreach ($kelurahan as $kel)
                                <option value="{{ $kel->id }}" data-kecamatan-id="{{ $kel->kecamatan_id }}">
                                    {{ $kel->nama }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('kelurahan_id'))
                            <span class="text-danger">{{ $errors->first('kelurahan_id') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="map" class="form-label">Peta</label>
                        <div id="map" style="height: 400px;"></div>
                    </div>
                    <input type="hidden" id="latitude" name="latitude" required>
                    <input type="hidden" id="longitude" name="longitude" required>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('admin.data-pokok.tempat-pemotongan.index') }}"
                        class="btn btn-secondary ms-2">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kecamatanSelect = document.getElementById('kecamatan');
            const kelurahanSelect = document.getElementById('kelurahan');

            kecamatanSelect.addEventListener('change', function() {
                const selectedKecamatanId = this.value;

                Array.from(kelurahanSelect.options).forEach(option => {
                    if (option.value === "") {
                        option.style.display = "block";
                    } else {
                        option.style.display = option.getAttribute('data-kecamatan-id') ==
                            selectedKecamatanId ? "block" : "none";
                    }
                });

                kelurahanSelect.value = "";
            });

            const map = L.map('map').setView([-8.095236, 112.162762], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            let marker;

            map.on('click', function(e) {
                const {
                    lat,
                    lng
                } = e.latlng;

                if (marker) {
                    marker.setLatLng(e.latlng);
                } else {
                    marker = L.marker(e.latlng).addTo(map);
                }

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });
        });
    </script>
@endsection
