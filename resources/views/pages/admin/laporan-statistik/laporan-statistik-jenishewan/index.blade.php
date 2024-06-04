@extends('layouts.app')

@section('content')
<h3><b>Jenis Hewan</b></h3>

<div class="card-body py-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center position-relative my-1 ms-auto">
        <button class="btn btn-primary" data-bs-toggle="modal" id="export-excel">
            <i class="fal fa-download fs-3"></i>
            <span class="ms-2">Unduh Laporan</span>
        </button>
        </div>   
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
<div id="chart"></div>


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

        var formattedData = @json($formattedData);

            var years = formattedData.map(item => item.year);
            var series = [];

            // Iterasi melalui setiap jenis hewan
            ['Kambing', 'Sapi', 'Unta', 'Kerbau', 'Domba'].forEach(function(animal) {
                var animalData = formattedData.map(item => item[animal]);
                series.push({
                    name: animal,
                    data: animalData
                });
            });

            var options = {
                series: series,
                chart: {
                    height: 350,
                    type: 'line',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    zoom: {
                        enabled: false
                    },
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#77B6EA', '#545454', '#FF5733', '#33FF57', '#5733FF'],
                dataLabels: {
                    enabled: true,
                },
                stroke: {
                    curve: 'smooth'
                },
                title: {
                    text: 'Jenis Hewan',
                    align: 'left'
                },
                grid: {
                    borderColor: '#e7e7e7',
                    row: {
                        colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                        opacity: 0.5
                    },
                },
                markers: {
                    size: 1
                },
                xaxis: {
                    categories: years,
                    title: {
                        text: 'Tahun'
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Hewan'
                    },
                    min: 0, // Setting minimum value for Y-axis
                    tickAmount: 5 // Setting the number of ticks on Y-axis
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    floating: true,
                    offsetY: -25,
                    offsetX: -5
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
    </script>
@endpush
@endsection

