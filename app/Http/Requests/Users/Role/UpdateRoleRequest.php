<?php

namespace App\Http\Requests\Users\Role;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $roleId = $this->role->id;

        return [
            'name' => 'required|unique:roles,name,'.$roleId,
            'guard_name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.unique' => 'Name already exists',
            'guard_name.required' => 'Guard name is required',
        ];
    }
}
