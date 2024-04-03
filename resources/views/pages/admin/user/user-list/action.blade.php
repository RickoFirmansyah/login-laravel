<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route("user-list.edit", $user->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <a href="{{ route("impersonate", $user->id) }}" class="btn btn-info">
        <i class="fas fa-eye fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route("user-list.destroy", $user->id) }}"
        data-action="delete" data-table-id="userlist-table" data-name="{{ $user->name }}"
        class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>

</div>

