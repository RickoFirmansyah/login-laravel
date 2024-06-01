<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route("jenis-kurban.edit", $jenis_kurban->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route("jenis-kurban.destroy", $jenis_kurban->id) }}" data-action="delete" data-name="{{ $jenis_kurban->type_of_animal }}" class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>