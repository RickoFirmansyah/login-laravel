@extends('layouts.app')

@section('content')
<h3><b>Jenis Hewan</b></h3>

<div class="card-body py-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center position-relative my-1 ms-auto">
            <div class="d-flex align-items-center position-relative my-1">
                <input type="date" id="tanggal" name="tanggal" class="form-control form-control-solid" style="width: 150px; margin-right: 10px;">
            </div>
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" id="export-excel">
            <i class="fal fa-download fs-3"></i>
            <span class="ms-2">Unduh Laporan</span>
        </button>

    </div>

    <div class="row">
        @foreach ($formattedDataCard as $data)
            <div class="col-md-3">
                <div class="card bg-primary rounded-0">
                    <div class="card-body text-center p-3">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">{{ $data['type_of_animal'] }}</h5>
                                <img src="{{ asset('assets/images/' . $data['type_of_animal'] . '-removebg-preview.png') }}" class="img-fluid" alt="Icon Hewan" style='width:55%;'>
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="mb-0 text-white fw-bolder fs-11">{{ $data['count'] }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<h3><b>Grafik Laporan</b></h3>

<h3><b>Laporan Jenis Kurban</b></h3>
<div class="d-flex align-items-center justify-content-end">
    <div class="d-flex align-items-center position-relative my-1">
        <div id="datarange" class="form-control form-control-solid" style="width: 100%; margin-right: 10px;">
            <i class="fal fa-calendar fs-4"></i>
            <span></span>
        </div>
    </div>
    <div class="d-flex align-items-center position-relative my-1">
        <div class="search-box">
            <label class="position-absolute" for="searchBox">
                <i class="fal fa-search fs-3"></i>
            </label>
            <input type="text" data-table-id="qurbandata-table" id="search" data-action="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search User" />
        </div>
    </div>
</div>

<div class="table-responsive">
    {{ $dataTable->table() }}
    
</div>

@push('scripts')
    {{ $dataTable->scripts() }}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        $(document).ready(function() {
            var start_date = moment().subtract(1, 'M');
            var end_date = moment();

            $('#datarange span').html(start_date.format('D MMMM, YYYY') + ' - ' + end_date.format('D MMMM, YYYY'));

            $('#datarange').daterangepicker({
                startDate: start_date,
                endDate: end_date,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end) {
                $('#datarange span').html(start.format('D MMMM, YYYY') + ' - ' + end.format('D MMMM, YYYY'));

                var startDate = start.format('YYYY-MM-DD');
                var endDate = end.format('YYYY-MM-DD');

                window.LaravelDataTables['qurbandata3-table'].ajax.url(
                    '?start_date=' + startDate + '&end_date=' + endDate
                ).load();
            });

            $('#search').on('input', function() {
                window.LaravelDataTables['qurbandata3-table'].search($(this).val()).draw();
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#export-excel').on('click', function() {
                window.LaravelDataTables['qurbandata3-table'].button('.buttons-excel').trigger();
            });
        });
    </script>
@endpush
@endsection

