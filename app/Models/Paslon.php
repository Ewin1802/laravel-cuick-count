<?php

namespace App\Models;
use App\Models\Partai;
use App\Models\Pemungutan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paslon extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_partai',
        'nama_paslon',
        'no_urut',
        'foto_paslon',
    ];

    public function savePhoto($photo, $nama_paslon)
    {
        // Mendapatkan ekstensi file foto
        $extension = $photo->getClientOriginalExtension();

        // Membuat nama file baru dengan nama paslon dan ekstensi
        $nama_file = $nama_paslon . '.' . $extension;

        // Menyimpan foto dengan nama file baru ke penyimpanan yang ditentukan
        $path = $photo->storeAs('photos', $nama_file, 'public');

        // Menyimpan path foto ke atribut foto_paslon pada model
        $this->foto_paslon = $path;
        $this->save();

        // Mengembalikan URL lengkap gambar
        return asset('storage/' . $path);
    }



    // public function partai()
    // {
    //     return $this->belongsTo(Partai::class);
    // }
    public function pemungutan()
    {
        return $this->belongsTo(Pemungutan::class);
    }


}
