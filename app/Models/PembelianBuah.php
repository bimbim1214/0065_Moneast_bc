<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianBuah extends Model
{
    use HasFactory;

    protected $table = 'pembelian';

    protected $fillable = [
        'buah_id',
        'supplier_id',
        'jumlah',
        'harga',
        'tanggal',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function buah() {
        return $this->belongsTo(Buah::class);
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
