<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekap_Dapil3;
use App\Models\Rekap_desa_dapil3;

class RekapTotalDapil3Controller extends Controller
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

    public function rekaptotaldapil3(Request $request)
    {
        $dapil3 = Rekap_Dapil3::inRandomOrder()->get();
        $rekapdesa = Rekap_desa_dapil3::inRandomOrder()->get();

        $count = count($dapil3);

        // echo "Jumlah Caleg sebanyak : $count Orang\n";

        foreach ($rekapdesa as $index => $data) {
            $total_suara_desa = Rekap_desa_dapil3::where('dapil', $data->dapil)->sum('suara');
            $total_suara_paslon = Rekap_desa_dapil3::where('caleg', $data->caleg)->sum('suara');

            $existingDataInDesa = Rekap_Dapil3::where('nm_paslon', $data->caleg)->where('dapil', $data->dapil)->first();

            if (!$existingDataInDesa) {
                Rekap_Dapil3::create([
                    'nm_paslon' => $data->caleg,
                    'dapil' => $data->dapil,
                    'jlh_pemilih' => $total_suara_desa,
                    'jlh_suara' => $total_suara_paslon,
                ]);
            } else {
                $existingDataInDesa->jlh_suara = $total_suara_paslon;
                $existingDataInDesa->jlh_pemilih = $total_suara_desa;
                $existingDataInDesa->save();
            }
        }

        // Setelah proses pembuatan/update data selesai, ambil semua data yang telah diupdate
        $updatedData = Rekap_Dapil3::all();

        // Format data untuk ditampilkan
        $formattedData = [];
        foreach ($updatedData as $data) {
            $formattedData[] = [
                'nm_paslon' => $data->nm_paslon,
                'dapil' => $data->dapil,
                'jlh_pemilih' => $data->jlh_pemilih,
                'jlh_suara' => $data->jlh_suara,
            ];
        }

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Total Rekap',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $formattedData,
            ],
        ]);
    }
}