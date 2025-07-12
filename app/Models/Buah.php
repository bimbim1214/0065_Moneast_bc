<?php

namespace App\Models;

use App\Models\KategoriBuah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buah extends Model
{
    use HasFactory;

    protected $table = 'buah';

    protected $fillable = [
        'nama',
        'stok',
        'kategori_buah_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];


    public function kategori()
    {
        return $this->belongsTo(KategoriBuah::class, 'kategori_buah_id');
    }
}
