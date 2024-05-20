@extends('layouts.app')

@section('content')
    <div class="card-body py-4">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center position-relative my-1 ms-auto">
                <div class="d-flex align-items-center position-relative my-1">
                    <input type="date" id="tanggal" name="tanggal" class="form-control form-control-solid" style="width: 150px; margin-right: 10px;">
                </div>
            </div>
            
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-kabupatenkota_modal"
                data-action="edit" data-url="">
                <i class="fal fa-download fs-3"></i>
                <span class="ms-2">
                    Unduh Laporan
                </span>
            </button>
        </div>
        {{-- card tiap jenis kurban --}}
        <div class="row">    
            <div class="col-md-3">
                <div class="card bg-primary rounded-0">
                    <div class="card-body text-center p-3">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Sapi</h5>
                                <!-- Icon hewan -->
                                <img src="{{ asset('assets/images/Cow_Breed-removebg-preview.png') }}" class="img-fluid" alt="Icon Hewan" style='width:55%;'>
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="mb-0 text-white fw-bolder fs-11">20</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-primary rounded-0">
                    <div class="card-body text-center p-3 rounded-0 ">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Kerbau</h5>
                                <!-- Icon hewan -->
                                <img src="{{ asset('assets/images/Yak-removebg-preview.png') }}" class="img-fluid" alt="Icon Hewan" style='width:55%;'>
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="mb-0 text-white fw-bolder fs-11">20</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-primary rounded-0">
                    <div class="card-body text-center p-3 rounded-0 ">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Kambing</h5>
                                <!-- Icon hewan -->
                                <img src="{{ asset('assets/images/goat_1__Traced_-removebg-preview.png') }}" class="img-fluid" alt="Icon Hewan" style='width:55%;'>
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="mb-0 text-white fw-bolder fs-11">20</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-primary rounded-0">
                    <div class="card-body text-center p-3 rounded-0 ">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="card-title text-white">Domba</h5>
                                <!-- Icon hewan -->
                                <img src="{{ asset('assets/images/Ram-removebg-preview.png') }}" class="img-fluid" alt="Icon Hewan" style='width:50%;'>
                            </div>
                            <div class="col-6">
                                <h1 class="card-title text-white">TOTAL</h1>
                                <h1 class="mb-0 text-white fw-bolder fs-11">20</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- end --}}

        <h5><b> Grafik Laporan </b></h5>
        
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            const tableId = 'qurbandata3-table';

            $(document).ready(function() {
                $('[data-kt-user-table-filter="search"]').on('input', function() {
                    window.LaravelDataTables[`${tableId}`].search($(this).val()).draw();
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });
        </script>
    @endpush
@endsection

