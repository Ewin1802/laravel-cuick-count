<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemungutan extends Model
{
    use HasFactory;

    protected $fillable = [
        'paslon_id',
        'lokasi_id',
        'tps_1',
        'tps_2',
        'tps_3',
        'jlh_suara',
        'validateds',

    ];

}
