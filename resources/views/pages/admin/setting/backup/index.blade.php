@extends('layouts.app')

@section('title', 'Backup List')

@section('content')
    <div class="py-4">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3">
            <div class="search-box">
                <label class="position-absolute" for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="backupschedule-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Search Backup" />
            </div>
            <a href="{{ route('admin.setting.backup.create') }}">
                <button type="button" class="btn btn-primary">
                    <i class="fal fa-plus fs-2"></i>
                    <span class="ms-2">Add Backup</span>
                </button>
            </a>
        </div>
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
