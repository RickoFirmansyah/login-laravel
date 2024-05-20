@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('role.store') }}" custom-action="true">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="guard_name" class="form-label">Guard Name</label>
                    <input type="text" class="form-control" id="guard_name" name="guard_name"
                        placeholder="Enter guard name">
                    @if ($errors->has('guard_name'))
                        <span class="text-danger">{{ $errors->first('guard_name') }}</span>
                    @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('role.index') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
</div>
</div>
@endsection

@push('scripts')
<script></script>
@endpush
