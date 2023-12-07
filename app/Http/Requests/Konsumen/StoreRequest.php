<?php

namespace App\Http\Requests\Konsumen;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kode' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
        ];
    }
}
