<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKategoriBuahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // ubah jika ada otorisasi tertentu
    }

    public function rules(): array
    {
        return [
            'nama_kategori' => 'required|string|max:255',
        ];
    }
}
