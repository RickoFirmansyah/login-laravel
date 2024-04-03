<?php

namespace App\Http\Requests\Setting\SiteSetting;

use App\Traits\JsonValidationResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiteSettingStoreRequest extends FormRequest
{
    use JsonValidationResponse;

    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'type' => 'required|in:site-identity,hero,profile',
            'name' => [
                'required',
                'min:3',
                'max:200',
                Rule::unique('site_settings', 'name')->ignore($this->id),
            ],
            'value' => 'required|min:1|max:255',
            'description' => 'nullable',
        ];
    }
}
