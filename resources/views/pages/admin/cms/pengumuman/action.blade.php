<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('admin.cms.pengumuman.edit', $Announcement->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <button data-csrf-token="{{ csrf_token() }}"
        data-url="{{ route('admin.cms.pengumuman.destroy', $Announcement->id) }}" data-action="delete"
        data-table-id="announcement-table" data-name="{{ $Announcement->title }}" class="btn btn-danger">
        <i class="fas fa-trash fs-3"></i>
    </button>
</div>
