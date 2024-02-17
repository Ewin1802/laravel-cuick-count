<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;
    protected $fillable = [
        'caleg',
        'desa',
        'jlh_pemilih',
        'suara',
        'golput',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}
