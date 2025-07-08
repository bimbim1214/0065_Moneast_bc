<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = ['name', 'address', 'phone'];
    protected $table = 'pegawai';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}