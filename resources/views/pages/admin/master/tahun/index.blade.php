@extends('layouts.app')

@section('content')
<div class="app-container">
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
    <div class="py-4">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="tahun-table" id="searchBox" data-action="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search User" />
            </div>
            <a href="{{ route('tahun.create') }}" class="btn btn-primary">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                <span class="ms-2">
                    Tambah Tahun
                </span>
            </a>
        </div>
        <div class="table-responsive">
            {{ $dataTable->table() }}
        </div>
    </div>
</div>

@push('scripts')
{{ $dataTable->scripts() }}
@endpush
@endsection