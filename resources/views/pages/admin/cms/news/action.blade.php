<div class="d-flex justify-content-center align-items-center gap-2">

    <a href="{{ route('admin.cms.news.edit', $news->id) }}" class="btn btn-warning">
        <i class="fas fa-pen fs-3"></i>
    </a>
    <a href="" class="btn btn-info">
        <i class="fas fa-eye fs-3"></i>
    </a>
    <form action="{{ route('admin.cms.news.destroy', $news->id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger"
            onclick="return confirm('Are you sure you want to delete this news?');">
            <i class="fas fa-trash fs-3"></i>
        </button>
    </form>


</div>
