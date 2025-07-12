<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ubah menjadi true agar request bisa dipakai
    }

    public function rules(): array
    {
        return [
            'nama' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'kategori_buah_id' => 'required|exists:kategori_buah,id',
        ];
    }
}
