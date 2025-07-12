<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBuah extends Model
{
    use HasFactory;

    protected $table = 'kategori_buah';

    protected $fillable = [
        'nama_kategori',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    // Relasi ke buah (jika nanti ada)
    public function buah()
    {
        return $this->hasMany(Buah::class, 'kategori_buah_id');
    }
    
}
