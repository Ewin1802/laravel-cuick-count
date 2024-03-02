<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_desa extends Model
{
    use HasFactory;
    protected $fillable = [
        'caleg',
        'partai',
        'desa',
        'dapil',
        'jlh_pemilih',
        'suara',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
    public function paslon()
    {
        return $this->belongsTo(Paslon::class);
    }
}
