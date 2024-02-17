<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paslon;
use App\Models\Sonuo;
use App\Models\Jambusarang;
use App\Models\Pemungutan;
use App\Models\Desa;
use App\Http\Requests\StorePaslonRequest;
use App\Http\Resources\PemungutanResource;

class CalegController extends Controller
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

    //create ujian
    public function createCaleg(Request $request)
    {
        $paslons = Paslon::inRandomOrder()->get();
        $sonuos = Sonuo::inRandomOrder()->get();
        $jbs = Jambusarang::inRandomOrder()->get();

        $count_paslons = count($paslons);
        $count_sonuos = count($sonuos);
        $count_jambusarangs = count($jbs);
        $counts = min($count_sonuos, $count_jambusarangs);
        echo "Jumlah Caleg sebanyak : $count_paslons Orang\n";

        if ($counts === 0) {
            foreach ($paslons as $index => $paslon) {
            // Periksa apakah tabel Sonuo dengan "nm_caleg" yang sama sudah ada
            $existingSonuo = Sonuo::where('nm_caleg', $paslon->nama_paslon)->first();
            // Jika rekaman tabel Sonuo dengan "nm_caleg" yang sama tidak ada, eksekusi perintah berdasarkan nama paslon
            if (!$existingSonuo) {
                Sonuo::create([
                    'nm_caleg' => $paslon->nama_paslon,
                ]);
            }

            $existingJambusarang = Jambusarang::where('nm_caleg', $paslon->nama_paslon)->first();
            if (!$existingJambusarang) {
                Jambusarang::create([
                    'nm_caleg' => $paslon->nama_paslon,
                ]);
            }
        }
        } else {
            $count = min($count_paslons, $count_sonuos);
            // for ($index = 0; $index < $count; $index++) {
            //     $paslon = $paslons[$index];
            //     $sonuo = $sonuos[$index];
            //     $jbs = $jbs[$index];

            //     // Desa::create([
            //     //     'caleg' => $sonuo->$jbs->nm_caleg,
            //     //     'desa' => $sonuo->$jbs->desa,
            //     //     'jlh_pemilih' => $sonuo->jlh_suara,
            //     // ]);
            // }
            for ($index = $count; $index < $count_paslons; $index++) {
                echo "Index $index does not exist in the \$sonuos array";
                // Handle the case where the index does not exist in the $sonuos array
                // For example, log an error message or perform some other action
            }
        }

        return response()->json([
            'message' => 'Data Caleg berhasil dibuat',
            'data' => "Jumlah Caleg sebanyak: $count_paslons orang",
        ]);
    }



    public function getCalegByDapil(Request $request)
    {

        $validatedData = $request->validate([
            'nm_caleg' => 'required',
        ]);

       $sonuos = Sonuo::where('nm_caleg', $validatedData['nm_caleg'])->first();
        if (!$sonuos) {
            return response()->json([
                'message' => 'Caleg tidak ditemukan',
                'data' => [],
            ], 200);
        }
        $pemungutans = Pemungutan::where('nm_paslon', $validatedData['nm_caleg'])->get();
        // $soalIds = $ujianSoalList->pluck('soal_id');
        if (!$sonuos) {
            return response()->json([
                'message' => 'Paslon tidak ditemukan',
                'data' => [],
            ], 200);
        }
        // $pemungutans = Pemungutan::where('nm_paslon', $paslons->id)->get();
        // $caleg= Paslon::whereIn('id', $pemungutans)->where('nm_paslon', $request->nm_paslon)->get();

        return response()->json([
            'message' => 'Berhasil mendapatkan Caleg',
            'data' => PemungutanResource::collection($pemungutans),
        ]);
    }
}
