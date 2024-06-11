<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route('role.edit', $role->id) }}" class="btn btn-success">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <a href="{{ route('role.show', $role->id) }}" class="btn btn-info">
        <i class="fas fa-eye fs-3"></i>
    </a>

    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('role.destroy', $role->id) }}" data-action="delete"
        data-table-id="roles-table" data-name="{{ $role->name }}" class="btn btn-warning">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>
