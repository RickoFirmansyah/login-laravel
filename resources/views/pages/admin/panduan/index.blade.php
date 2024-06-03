@extends('layouts.app')

@section('content')
    <div class="card-body py-4">
        {{-- <div id="map" class="mb-5" style="height: 450px;"></div> --}}

        <div class="container">
            <div class="d-flex align-items-center justify-content-between position-relative mb-3">

            </div>
            
            {{-- <div class="d-flex align-items-center position-relative my-1">
                <span class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></span>
                <input type="text" data-kt-user-table-filter="search" data-table-id="provinsi-table"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Provinsi" id="mySearchInput" />
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-provinsi_modal" data-action="edit"
                data-url="" id="createNewProvinsi">
                <i class="fal fa-plus fs-3"></i>
                <span class="ms-2">
                    Tambah Provinsi
                </span>
            </button> --}}
        </div>
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
        <div class="containter">
            <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                <a href="{{ route('admin.data-pokok.panduan.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <span class="ms-2">
                        Add Panduan
                    </span>
                </a>
            </div>

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
