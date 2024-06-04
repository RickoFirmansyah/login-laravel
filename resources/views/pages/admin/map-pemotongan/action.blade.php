<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route("admin.tempat-pemotongan.edit", $tempatPemotongan->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route("admin.tempat-pemotongan.destroy", $tempatPemotongan->id) }}"
        data-action="delete" data-table-id="slaughteringplace-table" data-name="{{ $tempatPemotongan->cutting_place }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>

