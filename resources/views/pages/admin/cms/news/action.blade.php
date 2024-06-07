<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route('admin.cms.news.edit', $news->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <form action="{{ route('admin.cms.news.destroy', $news->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger confirm-button">
            <i class="fas fa-trash fs-3"></i>
        </button>
    </form>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.confirm-button').click(function(event) {
        var form = $(this).closest("form");
        event.preventDefault();
        swal({
                title: `Apakah anda yakin?`,
                text: "Berita akah dihapus secara permanen!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
