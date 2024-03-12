<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekap_desa_dapil3;
use App\Models\Bintauna\Ds3_Kuhanga;
use App\Models\Sangkub\Ds3_Busisingo;

class RekapDapil3Controller extends Controller
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

    public function rekapKuhanga(Request $request)
    {
        $desa = Rekap_desa_dapil3::inRandomOrder()->get();
        $kuhangas = Ds3_Kuhanga::inRandomOrder()->get();

        $count = count($kuhangas);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($kuhangas as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $kuhangas->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil3::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil3::create([
                    'caleg' => $data->nm_caleg,
                    'partai' => $data->nm_partai,
                    'desa' => $data->desa,
                    'dapil' => $data->dapil,
                    'suara' => $total_suara,
                    'jlh_pemilih' => $total_suara_desa
                ]);
            } else {
                $existingDataInDesa->suara = $total_suara;
                $existingDataInDesa->jlh_pemilih = $total_suara_desa;
                $existingDataInDesa->save();
            }
        }

        // Mengambil data terbaru dari tabel Rekap_desa
        $updatedData = Rekap_desa_dapil3::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }

    public function rekapBusisingo(Request $request)
    {
        $desa = Rekap_desa_dapil3::inRandomOrder()->get();
        $busisingos = Ds3_Busisingo::inRandomOrder()->get();

        $count = count($busisingos);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($busisingos as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $busisingos->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil3::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil3::create([
                    'caleg' => $data->nm_caleg,
                    'partai' => $data->nm_partai,
                    'desa' => $data->desa,
                    'dapil' => $data->dapil,
                    'suara' => $total_suara,
                    'jlh_pemilih' => $total_suara_desa
                ]);
            } else {
                $existingDataInDesa->suara = $total_suara;
                $existingDataInDesa->jlh_pemilih = $total_suara_desa;
                $existingDataInDesa->save();
            }
        }

        // Mengambil data terbaru dari tabel Rekap_desa
        $updatedData = Rekap_desa_dapil3::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }


}
