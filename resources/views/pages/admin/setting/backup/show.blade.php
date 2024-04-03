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
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" readonly
                            value="{{ old('name', $backupSchedule->name) }}">
                    </div>
                    <div class="mb-10">
                        <label for="frequency" class="form-label required">Frequency</label>
                        <select name="frequency" id="frequency" class="form-select" readonly>
                            <option value="daily" selected="{{ $backupSchedule->frequency == 'daily' }}">Daily
                            </option>
                            <option value="weekly" selected="{{ $backupSchedule->frequency == 'weekly' }}">Weekly
                            </option>
                            <option value="monthly" selected="{{ $backupSchedule->frequency == 'monthly' }}">Monthly
                            </option>
                        </select>
                    </div>
                    <div class="mb-10">
                        <label for="time" class="form-label required">Time</label>
                        <input type="time" name="time" id="time" class="form-control" readonly
                            value="{{ old('time', $backupSchedule->time) }}">
                    </div>
                    <div class="mb-10">
                        <label for="tables" class="form-label required">Tables</label>
                        <div class="row">
                            @foreach ($tableNames as $table)
                                <div class="form-check col-3 g-3">
                                    <input class="form-check-input" type="checkbox" value="{{ $table }}"
                                        id="flexCheckDefault" name="tables[]"
                                        {{ in_array($table, $backupTables) ? 'checked' : '' }} readonly />
                                    <label class="form-check-label" for="flexCheckDefault" class="form-label required">
                                        {{ $table }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </form>
                <label for="history" class="form-label">History</label>
                <table class="table table-responsive mb-3">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Status</th>
                            <th>File Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($backupHistories->count() > 0)
                            @foreach ($backupHistories as $backupHistory)
                                <tr>
                                    <td>{{ $backupHistory->created_at }}</td>
                                    <td>{{ $backupHistory->status }}</td>
                                    <td>{{ $backupHistory->file_name }}</td>
                                    <td>
                                        @if ($backupHistory->file_name)
                                            <a href="{{ route('admin.setting.backup.download', ['backup_name' => $backupHistory->file_name]) }}"
                                                class="btn btn-warning">
                                                <i class="fas fa-download fs-3">

                                                </i>
                                            </a>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No History</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-end g-2 mb-10">
                    <form id="delete-form"
                        action="{{ route('admin.setting.backup.destroy', ['backupSchedule' => $backupSchedule]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mx-2">
                            <i class="fas fa-trash fs-3">
                            </i>
                            Delete
                        </button>
                    </form>
                    <a href="{{ route('admin.setting.backup.edit', ['backupSchedule' => $backupSchedule]) }}">
                        <button class="btn btn-warning mx-2">
                            <i class="fas fa-pen fs-3">

                            </i>
                            Edit
                        </button>
                    </a>
                    <form id="backup-form"
                        action="{{ route('admin.setting.backup.run', ['backupSchedule' => $backupSchedule]) }}"
                        method="POST">
                        @csrf
                        <button type="submit" class="btn btn-info mx-2">
                            <i class="fas fa-cloud-download fs-3">
                            </i>
                            Backup Now
                        </button>
                    </form>
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
    </script>
@endpush
