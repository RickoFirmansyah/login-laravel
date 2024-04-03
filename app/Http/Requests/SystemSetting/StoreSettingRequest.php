<?php

namespace App\Http\Requests\SystemSetting;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->method() == "PUT") {
            return [
                'name' => 'required|max:200|unique:system_settings,name,' . $this->system_setting->id,
                'value' => 'required|max:255',
                'description' => 'nullable',
                'is_active' => 'required|in:0,1'
            ];
        }else{
            return [
                'name' => 'required|max:200|unique:system_settings,name',
                'value' => 'required|max:255',
                'description' => 'nullable',
                'is_active' => 'required|in:0,1'
            ];
        }
    }
}
