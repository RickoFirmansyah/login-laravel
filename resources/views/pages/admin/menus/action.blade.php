<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('menus.edit', $menus->id) }}" class="btn btn-warning">
        <i class="fal fa-pen fs-5"></i>
    </a>
    <button class="btn btn-danger" data-url="{{ route('menus.destroy', $menus->id) }}" data-name="Menu" data-action="delete"
        data-table-id="menus-table">
        <i class="fal fa-trash fs-5"></i>
    </button>
</div>
