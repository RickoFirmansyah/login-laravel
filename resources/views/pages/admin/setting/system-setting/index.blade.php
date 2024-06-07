@extends('layouts.app')
@section('content')
        <div class="py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
        </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
