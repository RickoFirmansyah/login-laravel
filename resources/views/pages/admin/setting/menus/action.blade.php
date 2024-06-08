<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route('menus.edit', $menus->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('menus.destroy', $menus->id) }}"
        data-action="delete" data-table-id="backupschedule-table" data-name="{{ $menus->name }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>