<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_Dapil2 extends Model
{
    use HasFactory;
    protected $fillable = [
        'nm_paslon',
        'dapil',
        'jlh_pemilih',
        'jlh_suara',
        'validateds',
    ];

    // public function lokasi()
    // {
    //     return $this->belongsTo(Lokasi::class);
    // }
    // public function paslon()
    // {
    //     return $this->belongsTo(Paslon::class);
    // }
}
