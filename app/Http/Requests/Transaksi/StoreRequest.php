<?php

namespace App\Http\Requests\Transaksi;

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
            'tanggal_masuk' => ['required'],
            // 'tanggal_ambil' => ['required'],
            'konsumen_id' => ['required'],
            'paket_id' => ['required'],
            'berat' => ['required'],
        ];
    }
}
