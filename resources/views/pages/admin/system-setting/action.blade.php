<div class="d-flex justify-content-center align-items-center ">
    <button data-action="edit" data-url="{{ route('system-setting.edit', $systemSetting->id) }}"
        data-target="#edit-setting_modal" class="me-2 btn btn-warning">
        <i class="fal fa-pen fs-5"></i>
    </button>
    <button data-url="{{ route('system-setting.destroy', $systemSetting->id) }}" data-action="delete"
        data-table-id="system-setting-table" data-name="{{ $systemSetting->name }}" class="btn btn-danger">
        <i class="fal fa-trash fs-5"></i>
    </button>
</div>
