@extends('layouts.app')

@section('content')
    <div class="card-body py-4">
        <div class="mb-4 d-flex align-items-center justify-content-end">
            <button class="btn btn-primary" id="export-excel">
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
                                    <h1 class="mb-0 text-white fw-bolder fs-11">{{ $data['total'] }}</h1>
                                </div>
                            </div>
                            <hr class="text-white my-0">
                            <div class="row">
                                <div class="col-6">
                                    <p class="pb-0 mb-0 text-white">JANTAN</p>
                                    <h1 class="text-white fw-bolder fs-11">{{ $data['Jantan'] }}</h1>
                                </div>
                                <div class="col-6">
                                    <p class="pb-0 mb-0 text-white">BETINA</p>
                                    <h1 class="text-white fw-bolder fs-11">{{ $data['Betina'] }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="chart" class="m-2"></div>

        <div class="d-flex align-items-center justify-content-end">
            <div class="d-flex align-items-center position-relative my-1">
                {{-- <input type="date" id="datarange" name="tanggal" class="form-control form-control-solid" style="width: 150px; margin-right: 10px;"> --}}
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
    </div>

    @include('pages.admin.map-pemotongan.modal')

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

                    window.LaravelDataTables['qurbandata-table'].ajax.url(
                        '?start_date=' + startDate + '&end_date=' + endDate
                    ).load();
                });

                $('#search').on('input', function() {
                    window.LaravelDataTables['qurbandata-table'].search($(this).val()).draw();
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#export-excel').on('click', function() {
                    window.LaravelDataTables['qurbandata-table'].button('.buttons-excel').trigger();
                });
            });

            var formattedData = @json($formattedData);

            var years = formattedData.map(item => item.year);
            var jantanData = formattedData.map(item => item.Jantan);
            var betinaData = formattedData.map(item => item.Betina);

            var options = {
                series: [{
                    name: 'Jantan',
                    data: jantanData
                }, {
                    name: 'Betina',
                    data: betinaData
                }],
                chart: {
                    type: 'bar',
                    height: 350
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: '55%',
                        endingShape: 'rounded',
                        dataLabels: {
                            position: 'top',
                        },
                    },
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#304758"]
                    }
                },
                xaxis: {
                    categories: years,
                    position: 'bottom',
                    labels: {
                        offsetY: 0,
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    title: {
                        text: 'Jumlah Hewan'
                    }
                },
                fill: {
                    opacity: 1
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'left',
                    offsetX: 40
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        </script>
    @endpush
@endsection
