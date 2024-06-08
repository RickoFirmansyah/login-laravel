<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route('admin.cms.pengumuman.edit', $Announcement->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <form id="deleteForm" action="{{ route('admin.cms.pengumuman.destroy', $Announcement->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger confirm-button">
            <i class="fas fa-trash fs-3"></i>
        </button>
    </form>

</div>
<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.1/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    document.querySelector('.confirm-button').addEventListener('click', function(event) {
        event.preventDefault();
        var form = document.getElementById('deleteForm');

        Swal.fire({
            title: "Apakah Anda Yakin?",
            text: "Pengumuman Akan Dihapus Permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya!",
            cancelButtonText: "Batal!"
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
