<x-mollecules.modal id="add-provinsi_modal" action="{{ route('admin.master.provinsi.store') }}" method="POST"
    data-table-id="provinsi-table" tableId="provinsi-table" hasCloseBtn="true">
    <x-slot:title>Tambah Provinsi</x-slot:title>
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
            <x-atoms.form-label required>Kode Provinsi</x-atoms.form-label>
            <x-atoms.input id="kode" name="kode" type="number" class="form-control" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Provinsi</x-atoms.form-label>
            <x-atoms.input id="nama" name="nama" type="text" class="form-control" />
        </div>
    </div>
</x-mollecules.modal>
