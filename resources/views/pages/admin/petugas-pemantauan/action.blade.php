<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route("petugas-pemantauan.edit", $petugas->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route("petugas-pemantauan.destroy", $petugas->id) }}"
        data-action="delete" data-table-id="PetugasPemantauan-table" data-name="{{ $petugas->name }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>

