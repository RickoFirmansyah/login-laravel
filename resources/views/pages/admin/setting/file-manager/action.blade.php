<div class="d-flex justify-content-center align-items-center gap-1">
    {{-- @can('admin-file-manager-update') --}}
    <button data-action="edit" title="edit" data-target="#edit-file_modal" data-url="{{ route('admin.setting.file-manager.edit', $file->id) }}"
        data-modal-id="filemanagement-modal" data-title="File" class="btn btn-warning ">
        <i class="fas fa-pen fs-3"></i>
    </button>
    {{-- @endcan --}}
    {{-- @can('admin-menu-delete') --}}

    <button type="button" class="btn btn-light dropdown-toggle" data-bs-boundary="viewport" data-bs-toggle="dropdown"
        aria-expanded="false">
        <i class="fas fa-ellipsis-v me-2    "></i>
    </button>
    <ul class="dropdown-menu">
        <li>
            <button data-url="{{ route('admin.setting.file-manager.destroy', $file->id) }}"
                data-action="delete" data-table-id="filemanagement-table" data-name="{{ $file->keterangan }}"
                class="btn  w-100 text-start  ">
                <i class="fas fa-trash fs-2 me-2"></i>
                Delete
            </button>
        </li>
        <li>
            <button data-action="preview" data-url="{{ getFileInfo($file->file)['preview'] }}" data-modal-id="preview-modal"
                data-title="Preview File" class="btn w-100 text-start "><i class="fas fa-eye fs-2 me-2"></i>
                Preview
            </button>
        </li>
        <li>
            <a href="{{ route('admin.setting.file-manager.download', $file->id) }}" class="btn  w-100  text-start me-2 ">
                <i class="fas fa-download fs-2 me-2"></i>
                Download
            </a>
        </li>
    </ul>

</div>
