<div class="d-flex justify-content-center align-items-center gap-2">

    <button data-action="edit" title="edit" data-target="#edit-file_modal" data-url="{{ route('admin.setting.site-settings.edit', $siteSetting->id) }}"
        data-modal-id="sitesetting-modal" data-title="Site Setting" class="btn btn-warning ">
        <i class="fas fa-pen fs-3"></i>
    </button>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('admin.setting.site-settings.destroy', $siteSetting->id) }}"
        data-action="delete" data-table-id="sitesetting-table" data-name="{{ $siteSetting->name }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>


