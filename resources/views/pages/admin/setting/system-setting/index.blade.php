@extends('layouts.app')
@section('content')
        <div class="py-4">
            <div class="d-flex align-items-center justify-content-between position-relative mb-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-action="edit" data-url=""
                    data-modal-id="systemsetting-modal" data-title="System Setting">
                    <i class="fas fa-plus fa-sm text-white-50"></i>
                    <span class="ms-2">Add System Setting</span>
                </button>
            </div>
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
        </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
