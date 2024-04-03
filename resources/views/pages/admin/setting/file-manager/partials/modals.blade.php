<x-mollecules.modal id="add-file_modal" action="{{ route('admin.setting.file-manager.store') }}" data-table-id="filemanagement-table">
    <x-slot:title>Add File</x-slot:title>
    <div class="mb-3">
        <x-atoms.form-label required>Owner</x-atoms.form-label>
        <x-atoms.select placeholder="Select User" name="user_id"  >
            @foreach ($users as $user )
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </x-atoms.select>
    </div>
    <div class="mb-3">
        <x-atoms.form-label required>File</x-atoms.form-label>
        <x-atoms.dropzone id="tes" name="file"/>
    </div>
    <div class="mb-3">
        <x-atoms.form-label required>Status</x-atoms.form-label>
        <x-atoms.radio-group>
            <x-atoms.radio name="status" checked  id="status_1" value="1">Active</x-atoms.radio>
            <x-atoms.radio name="status" id="status_0" value="0">Non-Active</x-atoms.radio>
        </x-atoms.radio-group>
    </div>
    <div class="mb-3">
        <x-atoms.form-label required>Keterangan</x-atoms.form-label>
        <x-atoms.textarea name="keterangan" rows="3" id="keterangan_field"></x-atoms.textarea>
    </div>
    <x-slot:footer>
        <button type="submit" class="btn btn-primary" >Add File</button>
    </x-slot:footer>
</x-mollecules.modal>
<x-mollecules.modal id="edit-file_modal" action="/file-manager/{id}" method="PUT" tableId="filemanagement-table" >
    <x-slot:title>Edit File</x-slot:title>
    <div class="mb-3">
        <x-atoms.form-label required>Owner</x-atoms.form-label>
        <x-atoms.select placeholder="Select User" name="user_id" id="owner_field"  >
            @foreach ($users as $user )
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </x-atoms.select>
    </div>
    <div class="mb-3">
        <x-atoms.form-label required>File</x-atoms.form-label>
        <x-atoms.dropzone id="tes2" name="file"/>
    </div>
    <div class="mb-3">
        <x-atoms.form-label required>Status</x-atoms.form-label>
        <x-atoms.radio-group>
            <x-atoms.radio name="status" checked  id="status_12" value="1">Active</x-atoms.radio>
            <x-atoms.radio name="status" id="status_02" value="0">Non-Active</x-atoms.radio>
        </x-atoms.radio-group>
    </div>
    <div class="mb-3">
        <x-atoms.form-label required>Keterangan</x-atoms.form-label>
        <x-atoms.textarea name="keterangan" rows="3" id="keterangan_field2"></x-atoms.textarea>
    </div>
    <x-slot:footer>
        <button type="submit" class="btn btn-primary" >Save File</button>
    </x-slot:footer>
</x-mollecules.modal>
<x-mollecules.modal id="preview-modal" size="md" hasCloseBtn="true" action="#">
    <x-slot name="title">
        Preview File
    </x-slot>
    <x-slot name="footer">
    </x-slot>
    <div class="preview-container-modal" class="mb-3">
        <img src="{{ asset('assets/media/illustrations/img-preview.png') }}" alt="Default Image"
            class="img-fluid rounded mx-auto d-block" style="max-width: 400px; max-height: 300px;">
    </div>
</x-mollecules.modal>
