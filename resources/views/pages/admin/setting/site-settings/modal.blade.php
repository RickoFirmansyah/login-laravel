<x-mollecules.modal id="sitesetting-modal" action="{{ route('admin.setting.site-settings.store') }}" hasCloseBtn="true" tableId="sitesetting-table">
    <x-slot:title>Edit Mahasiswa</x-slot:title>
    <input type="hidden" name="id" id="id">
    <div class="mb-5">
        <x-input-label class="required" for="name">Name</x-atoms.label>
        <x-atoms.input type="text" id="name" name="name" class="form-control" placeholder="Enter name"/>
        <div class="invalid-feedback"></div>
    </div>
    <div class="mb-5">
        <x-input-label class="required" for="type">Type</x-atoms.label>
        <x-atoms.select id="type" name="type" class="form-select">
            <option value="">Select type</option>
            <option value="site-identity">Site Identity</option>
            <option value="hero">Hero</option>
            <option value="profile">Profile</option>
        </x-atoms.select>
        <div class="invalid-feedback"></div>
    </div>
    <div class="mb-5">
        <x-input-label class="required" for="value">Value</x-atoms.label>
        <x-atoms.input type="text" id="value" name="value" class="form-control" placeholder="Enter value"/>
        <div class="invalid-feedback"></div>
    </div>
    <div class="mb-5">
        <x-input-label for="description">Description</x-atoms.label>
        <x-atoms.textarea id="description" name="description"/>
        <div class="invalid-feedback"></div>
    </div>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
</x-mollecules.modal>
