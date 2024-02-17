<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm_desa',
        'nm_kec',
        'dapil',
        'jlh_tps',
        'jlh_pemilih',
    ];

    public function pemungutan()
    {
        return $this->hasMany(Pemungutan::class);
    }
    public function desa()
    {
        return $this->hasMany(Desa::class);
    }
}
