@extends('layouts.app')

@section('title', 'Backup List')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('admin.setting.backup.update', ['backupSchedule' => $backupSchedule]) }}"
                    method="post" id="update-backup-form">
                    @method('PUT')
                    @csrf
                    <div class="mb-10">
                        <label for="name" class="form-label required">Name</label>
                        <input type="text" name="name" id="name" placeholder="Name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $backupSchedule->name) }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-10">
                        <label for="frequency" class="form-label required">Frequency</label>
                        <select name="frequency" id="frequency"
                            class="form-select @error('frequency') is-invalid @enderror">
                            <option value="daily" @if (old('frequency', $backupSchedule->frequency) == 'daily') selected @endif>
                                Daily
                            </option>
                            <option value="weekly" @if (old('frequency', $backupSchedule->frequency) == 'weekly') selected @endif>
                                Weekly
                            </option>
                            <option value="monthly" @if (old('frequency', $backupSchedule->frequency) == 'monthly') selected @endif>
                                Monthly</option>
                        </select>
                        @error('frequency')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-10">
                        <label for="time" class="form-label required">Time</label>
                        <input type="time" name="time" id="time"
                            class="form-control @error('time') is-invalid @enderror"
                            value="{{ old('time', $backupSchedule->time) }}">
                        @error('time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-10">
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
                                <div class="form-check col-3 g-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $table }}"
                                        id="flexCheckDefault" name="tables[]"
                                        {{ in_array($table, old('tables[]', $backupTables)) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="flexCheckDefault" class="form-label required">
                                        {{ $table }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </form>
                <div class="d-flex justify-content-end g-2 mb-10">
                    <a href="{{ route('admin.setting.backup.index') }}" class="btn btn-secondary me-3">Back</a>
                    <button type="submit" onclick="submitUpdateForm()" class="btn btn-primary">Update</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function submitUpdateForm() {
            document.getElementById('update-backup-form').submit();
        }

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
