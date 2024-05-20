@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <form method="POST" action="{{ route('role.update', $role->id) }}" custom-action="true">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                        value="{{ $role->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="guard_name" class="form-label">Guard Name</label>
                    <input type="text" class="form-control" id="guard_name" name="guard_name"
                        placeholder="Enter guard name" value="{{ $role->guard_name }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('role.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endpush
