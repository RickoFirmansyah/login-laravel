<div class="d-flex justify-content-center align-items-center gap-2">
    <button data-action="edit" data-url="{{ route('admin.master.provinsi.edit', $provinsi->id) }}" data-modal-id="add-provinsi_modal"
        data-title="Provinsi" class="me-2 btn btn-light btn-active-light-info p-3 btn-center btn-sm"><i
            class="fal fa-pencil fs-2"></i></a>
        <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('admin.master.provinsi.destroy', $provinsi->id) }}"
            data-action="delete" data-table-id="provinsi-table" data-name="{{ $provinsi->nama }}"
            class="btn btn-light btn-active-light-primary p-3 btn-center btn-sm"><i
                class="fal fa-trash fs-2"></i></button>
</div>
