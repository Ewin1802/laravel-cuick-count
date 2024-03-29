<?php

namespace App\Models\Bolbar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ds2_Sonuo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nm_caleg',
        'nm_partai',
        'dapil',
        'desa',
        'tps_1',
        'tps_2',
        'tps_3',
        'tps_4',
        'tps_5',
        'tps_6',
        'tps_7',
        'tps_8',
        'tps_9',
        'tps_10',
        'tps_11',
        'tps_12',
        'jlh_suara',
        'validateds',
    ];

    // public function paslon()
    // {
    //     return $this->belongsTo(Paslon::class);
    // }
    public function paslon()
    {
        return $this->hasMany(Paslon::class);
    }
}
