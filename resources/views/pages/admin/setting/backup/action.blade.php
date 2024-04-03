<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route('admin.setting.backup.edit', ['backupSchedule' => $backupSchedule]) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <a href="{{ route('admin.setting.backup.show', ['backupSchedule' => $backupSchedule]) }}" class="btn btn-info">
        <i class="fas fa-eye fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('admin.setting.backup.destroy', ['backupSchedule' => $backupSchedule]) }}"
        data-action="delete" data-table-id="backupschedule-table" data-name="{{ $backupSchedule->name }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>

