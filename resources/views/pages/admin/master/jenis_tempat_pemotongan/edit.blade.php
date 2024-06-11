@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('jenis-tempat.update', $agency->id) }}" custom-action="true">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $agency->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Jenis Tempat Pemotongan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Jenis Tempat"
                        value="{{ $agency->type_of_place }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('jenis-tempat.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {});
</script>
@endpush