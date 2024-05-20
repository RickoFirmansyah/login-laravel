<x-mollecules.modal id="add-jenis-kurban_modal" action="{{ route('jenis-kurban.store') }}" method="POST"
    data-table-id="jeniskurban-table" tableId="jeniskurban-table" hasCloseBtn="true">
    <x-slot:title>Tambah Jenis Kurban</x-slot:title>
    <x-slot:iconClose>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-outline ki-cross fs-2"></i>
        </div>
    </x-slot:iconClose>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <input type="hidden" name="id" id="id">

        <div class="mb-6">
            <x-atoms.form-label required>Jenis Kurban</x-atoms.form-label>
            <x-atoms.input id="nama" name="jenis_kurban" type="text" class="form-control" />
        </div>
    </div>
</x-mollecules.modal>