<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route('admin.tempat-pemotongan.edit', $slaughteringPlace->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <a href="{{ route('admin.tempat-pemotongan.show', $slaughteringPlace->id) }}" class="btn btn-info">
        <i class="fas fa-eye fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}"
        data-url="{{ route('admin.tempat-pemotongan.destroy', $slaughteringPlace->id) }}" data-action="delete"
        data-table-id="slaugering-table" data-name="{{ $slaughteringPlace->name }}" class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>
