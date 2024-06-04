@extends('layouts.app')

@section('content')
    <div class="card-body py-4">
        <div id="map" class="mb-5" style="height: 450px;"></div>

        <div class="container">
            <form id="search-form" class="d-flex flex-wrap justify-content-between">
                @csrf
                <div class="col-md-4">
                    <select class="form-select" id="kecamatan-select" name="kecamatan_id">
                        <option value="">Pilih Kecamatan</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select" id="kelurahan-select" name="kelurahan_id">
                        <option value="">Pilih Kelurahan</option>
                        {{-- Kelurahan akan dimuat berdasarkan kecamatan yang dipilih --}}
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="input-group flex-nowrap">
                        <button class="btn btn-info form-control" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            const tableId = 'slaughteringplace-table';

            $(document).ready(function() {
                $('#search-form').on('submit', function(e) {
                    e.preventDefault();
                    window.LaravelDataTables[`${tableId}`].ajax.reload();
                });

                $('#kecamatan-select').on('change', function() {
                    var kecamatanId = $(this).val();
                    $.ajax({
                        url: "{{ route('get-kelurahans') }}",
                        type: 'GET',
                        data: { kecamatan_id: kecamatanId },
                        success: function(data) {
                            var kelurahanSelect = $('#kelurahan-select');
                            kelurahanSelect.empty();
                            kelurahanSelect.append('<option value="">Pilih Kelurahan</option>');
                            $.each(data.kelurahans, function(index, kelurahan) {
                                kelurahanSelect.append('<option value="' + kelurahan.id + '">' + kelurahan.nama + '</option>');
                            });
                        }
                    });
                });

                var slaughteringPlaces = @json($slaughteringPlaces);
                slaughteringPlaces.forEach(function(place) {
                    L.marker([place.latitude, place.longitude]).addTo(map)
                        .bindPopup(place.cutting_place);
                });
            });
        </script>
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
        <script>
            var map = L.map('map').setView([-7.968387, 112.631838], 13);

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
        </script>
    @endpush
@endsection
