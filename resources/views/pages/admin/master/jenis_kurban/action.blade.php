<div class="d-flex justify-content-center align-items-center gap-2">
    <button data-action="edit" data-url="{{ route('jenis-kurban.edit', $jenis_kurban->id) }}"
        data-modal-id="add-kabupatenkota_modal" data-title="Kabupaten"
        class="me-2 btn btn-light btn-active-light-info p-3 btn-center btn-sm"><i class="fal fa-pencil fs-2"></i></a>
        <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('jenis-kurban.destroy', $jenis_kurban->id) }}"
            data-action="delete" data-table-id="kabupatenkota-table" data-name="{{ $jenis_kurban->type_of_animal }}"
            class="btn btn-light btn-active-light-primary p-3 btn-center btn-sm"><i
                class="fal fa-trash fs-2"></i></button>
</div>