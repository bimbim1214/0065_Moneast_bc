<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // pastikan diizinkan
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'buah_id' => 'nullable|exists:buah,id',
            
        ];
    }
}
