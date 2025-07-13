<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'jumlah',
        'buah_id',
        'keterangan',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function buah()
    {
        return $this->belongsTo(Buah::class, 'buah_id');
    }
}
