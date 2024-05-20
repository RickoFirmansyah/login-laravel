@extends('layouts.app')

@section('content')
<div class="card-body py-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center position-relative my-1">
            <span class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></span>
            <input type="text" data-kt-user-table-filter="search" data-table-id="jeniskurban-table"
                class="form-control form-control-solid w-250px ps-13" placeholder="Search Jenis Kurban"
                id="mySearchInput" />
        </div>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-jenis-kurban_modal"
            data-target="#add-jenis-kurban_modal" data-action="edit" data-url="{{ route('jenis-kurban.store') }}">
            <i class="fal fa-plus fs-3"></i>
            <span class="ms-2">
                Tambah Jenis Kurban
            </span>
        </button>
    </div>
    <div class="table-responsive">
        {{ $dataTable->table() }}
    </div>
</div>


@include('pages.admin.master.jenis_kurban.modal')

@push('scripts')
{{ $dataTable->scripts() }}
<script>
const tableId = 'jeniskurban-table';

$(document).ready(function() {
    $('[data-kt-user-table-filter=" search"]').on('input', function() {
        window.LaravelDataTables[`${tableId}`].search($(this).val()).draw();
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token" ]').attr('content')
        }
    });
});
</script>
@endpush
@endsection