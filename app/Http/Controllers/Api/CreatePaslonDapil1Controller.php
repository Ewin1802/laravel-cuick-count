<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\Pinogaluman\Ds1_Kayuogu;

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


         $count_paslons = count($paslons);

         $count_kayuogus = count($kayuogus);
        //  $count_jambusarangs = count($jbs);
        //  $count_langis = count($langis);
        //  $count_iyoks = count($iyoks);
        //  $count_bolits = count($bolit);
        //   $counts = min($count_kayuogus);


         if ($count_kayuogus === 0) {

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

                //  $existingJambusarang = Ds2_Jambusarang::where('nm_caleg', $paslon->nama_paslon)->first();
                //  if (!$existingJambusarang) {
                //      Ds2_Jambusarang::create([
                //          'nm_caleg' => $paslon->nama_paslon,
                //          'nm_partai' => $paslon->nama_partai,
                //      ]);
                //  }

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
