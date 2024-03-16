<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\Pinogaluman\Ds1_Kayuogu;
use App\Models\Pinogaluman\Ds1_BatuBantayo;
use App\Models\Pinogaluman\Ds1_Dalapuli;
use App\Models\Kaidipang\Ds1_Bigo;

class CreatePaslonDapil1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

     //create Paslon Dapil 1
     public function createPaslon(Request $request)
     {
         $paslons = Paslon::inRandomOrder()->get();
         $kayuogus = Ds1_Kayuogu::inRandomOrder()->get();
         $batubantayos = Ds1_BatuBantayo::inRandomOrder()->get();
         $dalapulis = Ds1_Dalapuli::inRandomOrder()->get();
         $bigos = Ds1_Bigo::inRandomOrder()->get();

         $count_paslons = count($paslons);

         $count_kayuogus = count($kayuogus);
         $count_batubantayos = count($batubantayos);
         $count_dalapulis = count($dalapulis);
         $count_bigos = count($bigos);

        $counts = min($count_kayuogus, $count_bigos, $count_batubantayos, $count_dalapulis);


         if ($counts === 0) {

             foreach ($paslons as $index => $paslon) {
                 // Periksa apakah tabel Sonuo dengan "nm_caleg" yang sama sudah ada
                 $existingKayuogu = Ds1_Kayuogu::where('nm_caleg', $paslon->nama_paslon)->first();
                 // Jika rekaman tabel Sonuo dengan "nm_caleg" yang sama tidak ada, eksekusi perintah berdasarkan nama paslon
                 if (!$existingKayuogu) {
                     Ds1_Kayuogu::create([
                         'nm_caleg' => $paslon->nama_paslon,
                         'nm_partai' => $paslon->nama_partai,
                     ]);
                 }

                 $existingBatuBantayo = Ds1_BatuBantayo::where('nm_caleg', $paslon->nama_paslon)->first();
                 if (!$existingBatuBantayo) {
                    Ds1_BatuBantayo::create([
                         'nm_caleg' => $paslon->nama_paslon,
                         'nm_partai' => $paslon->nama_partai,
                     ]);
                 }

                 $existingDalapuli = Ds1_Dalapuli::where('nm_caleg', $paslon->nama_paslon)->first();
                 if (!$existingDalapuli) {
                    Ds1_Dalapuli::create([
                         'nm_caleg' => $paslon->nama_paslon,
                         'nm_partai' => $paslon->nama_partai,
                     ]);
                 }

                 $existingBigo = Ds1_Bigo::where('nm_caleg', $paslon->nama_paslon)->first();
                 if (!$existingBigo) {
                     Ds1_Bigo::create([
                         'nm_caleg' => $paslon->nama_paslon,
                         'nm_partai' => $paslon->nama_partai,
                     ]);
                 }

             }

             // Mengambil seluruh data paslon dari tabel Paslon
             $allPaslonsData = $paslons->toArray();

             return response()->json([
                 'message' => 'Data Paslon berhasil dibuat',
                 'data' => [
                     'jumlah_paslons' => count($allPaslonsData),
                     'all_paslons_data' => $allPaslonsData
                 ],
             ]);
         } else {
             $allPaslonsData = $paslons->toArray();
             return response()->json([
                 'message' => 'Paslon sudah ada dalam masing-masing tabel desa',
                 'data' => [
                     'jumlah_paslons' => count($allPaslonsData),
                     'all_paslons_data' => $allPaslonsData
                 ],
             ]);
         }
     }
}
