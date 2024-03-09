<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_Dapil1 extends Model
{
    use HasFactory;
    protected $fillable = [
        'nm_paslon',
        'dapil',
        'jlh_pemilih',
        'jlh_suara',
        'validateds',
    ];
}
