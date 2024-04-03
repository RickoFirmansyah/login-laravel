<?php

namespace App\Http\Requests\Users\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:roles,name',
            'guard_name' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name Role is required',
            'name.unique' => 'Name already exists',
            'guard_name.required' => 'Guard Name is required',
        ];
    }
}
