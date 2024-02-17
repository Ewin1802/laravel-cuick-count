<?php

namespace App\Models;
use App\Models\Paslon;
use App\Models\Lokasi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemungutan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm_paslon',
        'lokasi_id',
        'nm_dapil',
        'suara',
        'validateds',
    ];

     public function paslon()
    {
        return $this->belongsTo(Paslon::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

}
