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
                </select>
            </div>
            <div class="col-md-3">
                <div class="input-group flex-nowrap">
                    <button class="btn btn-info form-control" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <br><br>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <div class="container">
            <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                <a href="{{ route('map-pemotongan.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <span class="ms-2">
                        Add Tempat Pemotongan
                    </span>
                </a>
            </div>
        </div>
        <div class="table-responsive">
            {{ $dataTable->table(['id' => 'map-table']) }}
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl7+36U5fK7oNH9YH6YQ6EOr4X9I4VmcK16+2yazIK" crossorigin="anonymous"></script> --}}
        <script>
            const tableId = 'map-table';

            $(document).ready(function() {
                // Initialize the map
                var map = L.map('map').setView([-8.095236, 112.162762], 13);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Function to add markers to the map
                function addMarkers(slaughteringPlaces) {
                    slaughteringPlaces.forEach(function(place) {
                        L.marker([place.latitude, place.longitude]).addTo(map)
                            .bindPopup(place.cutting_place);
                    });
                }

                // Initial load of markers
                addMarkers(@json($slaughteringPlaces));

                // Initialize DataTable
                var dataTable = $('#map-table').DataTable();

                // Reload DataTable and map markers on form submission
                $('#search-form').on('submit', function(e) {
                    e.preventDefault();
                    let kecamatanId = $('#kecamatan-select').val();
                    let kelurahanId = $('#kelurahan-select').val();

                    // Fetch and update the map markers
                    $.ajax({
                        url: "{{ route('map-pemotongan.index') }}",
                        type: 'GET',
                        data: {
                            kecamatan_id: kecamatanId,
                            kelurahan_id: kelurahanId
                        },
                        success: function(data) {
                            console.log(data); // Add this line to check the structure
                            // Clear existing markers
                            map.eachLayer(function(layer) {
                                if (layer instanceof L.Marker) {
                                    map.removeLayer(layer);
                                }
                            });

                            // Add new markers
                            addMarkers(data.slaughteringPlaces);

                            // Reload the DataTable with new parameters
                            dataTable.clear().rows.add(data.dataTable.data).draw();
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // Log any errors for debugging
                        }
                    });
                });

                // Load kelurahan options on kecamatan change
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
                        },
                        error: function(xhr) {
                            console.log(xhr.responseText); // Log any errors for debugging
                        }
                    });
                });
            });


        </script>
    @endpush
@endsection
