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
        'jlh_DPT',
    ];

    public function pemungutan()
    {
        return $this->hasMany(Pemungutan::class);
    }

}
