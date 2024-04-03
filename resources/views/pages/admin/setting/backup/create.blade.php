@extends('layouts.app')

@section('title', 'Create Backup')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.setting.backup.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label required">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="frequency" class="form-label required">Frequency</label>
                        <select name="frequency" id="frequency"
                            class="form-control @error('frequency') is-invalid @enderror">
                            <option value="daily" {{ old('fequency') == 'daily' ? 'selected' : '' }}>Daily</option>
                            <option value="weekly" {{ old('fequency') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                            <option value="monthly" {{ old('fequency') == 'monthly' ? 'selected' : '' }}>Monthly
                            </option>
                        </select>
                        @error('frequency')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="time" class="form-label required">Time</label>
                        <input type="time" name="time" id="time"
                            class="form-control @error('time') is-invalid @enderror" value="{{ old('time') }}">
                        @error('time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="d-flex">
                            <label for="tables" class="form-label required">Tables</label>
                            <div class="form-check ms-2">
                                <input class="form-check-input" type="checkbox" value="all" id="flexCheckDefault"
                                    onchange="toggleTables()" />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Check All
                                </label>
                            </div>
                        </div>
                        @error('tables')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="row m-1 p-2 @error('tables') border rounded border-danger @enderror">
                            @foreach ($tableNames as $table)
                                <div class="form-check col-4 g-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $table }}"
                                        id="flexCheckDefault" name="tables[]" <label class="form-check-label"
                                        for="flexCheckDefault">
                                    {{ $table }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
        
                    </div>
        
                    <div class="d-flex justify-content-end mb-10">
                    <a href="{{ route('admin.setting.backup.index') }}" class="btn btn-secondary me-3">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
        
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function toggleTables() {
            const checkboxes = document.getElementsByName('tables[]');
            const checkAll = document.getElementById('flexCheckDefault');
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkAll.checked) {
                    checkboxes[i].checked = true;
                } else {
                    checkboxes[i].checked = false;
                }
            }
        }
    </script>
@endpush
