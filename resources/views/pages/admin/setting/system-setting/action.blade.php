<div class="d-flex justify-content-center align-items-center gap-2">

    <button data-action="edit" title="edit" data-target="#edit-file_modal" data-url="{{ route('admin.setting.system-setting.edit', $systemSetting->id) }}"
        data-modal-id="system-setting-modal" data-title="System Setting" class="btn btn-warning ">
        <i class="fas fa-pen fs-3"></i>
    </button>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('admin.setting.system-setting.destroy', $systemSetting->id) }}"
        data-action="delete" data-table-id="system-setting-table" data-name="{{ $systemSetting->name }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>


