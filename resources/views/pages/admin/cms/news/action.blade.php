<div class="d-flex justify-content-center align-items-center gap-2">

    
    <a href="javascript:void(0)" class="btn btn-light btn-active-light-primary p-3 btn-center btn-sm editNews" data-id="{{ $news->id }}">
        <i class="ki-outline ki-pencil fs-2"></i>
    </a>


    <form action="{{ route('admin.cms.news.destroy', $news->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this menu?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-light btn-active-light-primary p-3 btn-center btn-sm">
        <i class="ki-outline ki-trash fs-2"></i>
        </button>
    </form>

</div>
