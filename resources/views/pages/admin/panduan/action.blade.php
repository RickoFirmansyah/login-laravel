<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route("admin.data-pokok.panduan.edit", $panduan->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route("admin.data-pokok.panduan.destroy", $panduan->id) }}" data-action="delete" data-table-id="userlist-table" data-name="{{ $panduan->name }}" class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>

