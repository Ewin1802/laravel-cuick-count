<?php

namespace App\Models;
use App\Models\Partai;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_partai',
        'nama_paslon',
        'no_urut',
    ];

    // public function partai()
    // {
    //     return $this->belongsTo(Partai::class);
    // }
}
