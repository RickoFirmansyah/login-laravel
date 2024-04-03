<x-mollecules.modal id="add-news_modal" action="{{ route('admin.cms.news.store') }}">
    <x-slot:title>News Modal</x-slot:title>
    <x-slot:iconClose>
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <i class="ki-outline ki-cross fs-2"></i>
          </div>
    </x-slot:iconClose>
    <div>
        <input type="hidden" name="id" id="id">
          <div class="mb-6">
                <x-atoms.form-label required>Judul Berita</x-atoms.form-label>
                <x-atoms.input id="title" name="title" type="text"
                placeholder="Input judul berita" value="{{ old('title') }}"></x-atoms.input>
          </div>
          <div class="mb-6">
                <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
                <x-atoms.summernote id="description" name="description" placeholder="Input Deskripsi Berita" tabsize="2" height="100" />
          </div>
    </div>
    <x-slot:footer>
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
          <button class="btn-primary btn" type="submit" id="savedata">Submit</button>
    </x-slot:footer>
</x-mollecules.modal>

