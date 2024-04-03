<?php

namespace App\Http\Requests\Master\Provinsi;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\JsonValidationResponse;
use Illuminate\Validation\Rule;

class StoreProvinsi extends FormRequest
{
    use JsonValidationResponse;
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
        return [
            'kode' => [
                'required',
                'numeric',
                Rule::unique('ref_provinsi', 'kode')->ignore($this->id),
            ],
            'nama' => 'required|string',
        ];
    }
}
