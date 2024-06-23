@extends('layouts.app')

@section('content')
<div class="app-container">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="py-4">
        <div class="d-flex align-items-center justify-content-between position-relative mb-3">
            <div class="search-box">
                <label class="position-absolute " for="searchBox">
                    <i class="fal fa-search fs-3"></i>
                </label>
                <input type="text" data-table-id="PetugasPemantauan-table" id="searchBox" data-action="search"
                    class="form-control form-control-solid w-250px ps-13" placeholder="Cari Petugas" />
            </div>
            <div>
                <a href="{{ route('petugas-pemantauan.create') }}" class="btn btn-primary mx-1">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <span class="ms-2">
                        Tambah Petugas
                    </span>
                </a>
    
                <a href="{{ route('view-petugas-pemantauan') }}" class="btn btn-primary mx-1">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <span class="ms-2">
                        Import Petugas
                    </span>
                </a>
            </div>
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