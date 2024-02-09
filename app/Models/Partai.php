<?php

namespace App\Models;
use App\Models\Paslon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partai extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
    'nm_partai',
    'no_partai',
    ];

     public function paslon()
    {
        return $this->hasMany(Paslon::class);
    }
}
