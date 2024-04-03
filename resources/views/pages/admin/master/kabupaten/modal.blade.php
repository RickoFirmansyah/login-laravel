<x-mollecules.modal id="add-kabupatenkota_modal" action="{{ route('admin.master.kabupaten-kota.store') }}" method="POST"
    data-table-id="kabupatenkota-table" tableId="kabupatenkota-table" hasCloseBtn="true">
    <x-slot:title>Tambah Kabupaten/Kota</x-slot:title>
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
            <x-atoms.form-label required>Kode Kabupaten/Kota</x-atoms.form-label>
            <x-atoms.input id="kode" name="kode" type="number" class="form-control" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Provinsi</x-atoms.form-label>
            <x-atoms.select id="provinsi_id" name="provinsi_id" class="form-select">
                <option value="">Pilih Provinsi</option>
                @foreach ($semua_provinsi as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama }}</option>
                @endforeach
            </x-atoms.select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Kabupaten/Kota</x-atoms.form-label>
            <x-atoms.input id="nama" name="nama" type="text" class="form-control" />
        </div>
    </div>
</x-mollecules.modal>
