<x-mollecules.modal id="add-kecamatan_modal" action="{{ route('admin.master.kecamatan.store') }}" method="POST"
    data-table-id="kecamatan-table" tableId="kecamatan-table" hasCloseBtn="true">
    <x-slot:title>Tambah Kecamatan</x-slot:title>
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
            <x-atoms.form-label required>Kode Kecamatan</x-atoms.form-label>
            <x-atoms.input id="kode" name="kode" type="number" class="form-control" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Kabupaten/Kota</x-atoms.form-label>
            <x-atoms.select id="kabupaten_kota_id" name="kabupaten_kota_id" class="form-select">
                <option value="">Pilih Kabupaten/Kota</option>
                @foreach ($semua_kabupaten_kota as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->nama }}</option>
                @endforeach
            </x-atoms.select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Nama Kecamatan</x-atoms.form-label>
            <x-atoms.input id="nama" name="nama" type="text" class="form-control" />
        </div>
    </div>
</x-mollecules.modal>
