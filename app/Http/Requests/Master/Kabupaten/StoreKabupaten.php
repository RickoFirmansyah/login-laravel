<?php

namespace App\Http\Requests\Master\Kabupaten;

use App\Traits\JsonValidationResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreKabupaten extends FormRequest
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
            'provinsi_id' => 'required|numeric',
            'kode' => [
                'required',
                'numeric',
                Rule::unique('ref_kabupaten_kota', 'kode')->ignore($this->id),
            ],
            'nama' => 'required|string',
        ];
    }
}
