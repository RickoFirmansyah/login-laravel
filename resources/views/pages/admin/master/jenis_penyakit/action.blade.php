<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route("jenis-penyakit.edit", $agency->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route("jenis-penyakit.destroy", $agency->id) }}"
        data-table-id="diseases-table" data-action="delete" data-name="{{ $agency->type_of_diseases }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>