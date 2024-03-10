<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap_All extends Model
{
    use HasFactory;
    protected $fillable = [
        'nm_paslon',
        'jlh_pemilih',
        'jlh_suara',
    ];
}
