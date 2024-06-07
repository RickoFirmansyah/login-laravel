@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('jenis-kurban.update', $user->id) }}" custom-action="true">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Is Jenis Kurban"
                        value="{{ $user->type_of_animal }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('jenis-kurban.index') }}" class="btn btn-secondary ms-2">Back</a>
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