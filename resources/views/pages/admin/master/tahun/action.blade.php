<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route("tahun.edit", $tahun->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route("tahun.destroy", $tahun->id) }}"
        data-table-id="tahun-table" data-action="delete" data-name="{{ $tahun->tahun }}" class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>