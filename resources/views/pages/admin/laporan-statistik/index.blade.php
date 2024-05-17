@extends('layouts.app')

@section('content')
    <div class="card-body py-4">
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
                        <hr class="text-white my-0">
                        <div class="row">
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">JANTAN</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">BETINA</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
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
                        <hr class="text-white my-0">
                        <div class="row">
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">JANTAN</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">BETINA</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
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
                        <hr class="text-white my-0">
                        <div class="row">
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">JANTAN</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">BETINA</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
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
                        <hr class="text-white my-0">
                        <div class="row">
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">JANTAN</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
                            </div>
                            
                            <div class="col-6">
                                <p class="pb-0 mb-0 text-white">BETINA</p>
                                <h1 class="text-white fw-bolder fs-11">10</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- end --}}
        <div class="d-flex align-items-center justify-content-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-provinsi_modal" data-action="edit"
                data-url="" id="createNewProvinsi">
                <i class="fal fa-download fs-3"></i>
                <span class="ms-2">
                    Unduh Laporan
                </span>
            </button>
            <div class="d-flex align-items-center position-relative my-1">
                <span class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></span>
                <input type="text" data-kt-user-table-filter="search" data-table-id="qurbandata-table"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Search" id="mySearchInput" />
            </div>
        </div>
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>

    @include('pages.admin.map-pemotongan.modal')

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            const tableId = 'qurbandata-table';

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

