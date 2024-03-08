<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Paslon;
use App\Models\Bolbar\Ds2_Sonuo;
use App\Models\Bolbar\Ds2_Jambusarang;
use App\Models\Bolbar\Ds2_Langi;
use App\Models\Bolbar\Ds2_Iyok;
use App\Models\Bolbar\Ds2_Bolangitang;
use App\Models\Pemungutan;
use App\Models\Rekap_desa;
use App\Models\Lokasi;

class RekapDapil2Controller extends Controller
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

    public function rekapSonuo(Request $request)
{
    $desa = Rekap_desa::inRandomOrder()->get();
    $sonuos = Ds2_Sonuo::inRandomOrder()->get();

    $count = count($sonuos);

    // echo "Jumlah Paslon sebanyak : $count Orang\n";

    foreach ($sonuos as $index => $data) {

        $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

        $total_suara_desa = $sonuos->where('desa', $data->desa)->sum('jlh_suara');

        $existingDataInDesa = Rekap_desa::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

        if (!$existingDataInDesa) {
            Rekap_desa::create([
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
    $updatedData = Rekap_desa::all();

    return response()->json([
        'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
        'data' => [
            'jumlah_caleg' => $count,
            'updated_data' => $updatedData
        ]
    ]);
}


    public function rekapJbs (Request $request) {

        $desa = Rekap_desa::inRandomOrder()->get();
        $jbs = Ds2_Jambusarang::inRandomOrder()->get();

        $count = count($jbs);

        echo "Jumlah Caleg sebanyak : $count Orang\n";

        foreach ($jbs as $index => $data) {
            // $lokasi = Lokasi::where('nm_desa', $data->desa)->first();
            // $jlh_dpt = $lokasi ? $lokasi->jlh_DPT : 0;
            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;
            $total_suara_desa = $jbs->where('desa', $data->desa)->sum('jlh_suara');
            $existingDataInDesa = Rekap_desa::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();
            if (!$existingDataInDesa) {
                Rekap_desa::create([
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
        return response()->json([
            'message' => 'Data Caleg berhasil Di Create pada Tabel Desa',
            'data' => "Jumlah Caleg sebanyak: $count orang",
        ]);

    }

    public function rekapLangi (Request $request) {

        $desa = Rekap_desa::inRandomOrder()->get();
        $langis = Ds2_Langi::inRandomOrder()->get();

        $count = count($langis);

        echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($langis as $index => $data) {
            // $lokasi = Lokasi::where('nm_desa', $data->desa)->first();
            // $jlh_dpt = $lokasi ? $lokasi->jlh_DPT : 0;
            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;
            $total_suara_desa = $langis->where('desa', $data->desa)->sum('jlh_suara');
            $existingDataInDesa = Rekap_desa::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();
            if (!$existingDataInDesa) {
                Rekap_desa::create([
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
        $updatedData = Rekap_desa::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }

    public function rekapIyok (Request $request) {

        $desa = Rekap_desa::inRandomOrder()->get();
        $iyoks = Ds2_Iyok::inRandomOrder()->get();

        $count = count($iyoks);

        echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($iyoks as $index => $data) {
            // $lokasi = Lokasi::where('nm_desa', $data->desa)->first();
            // $jlh_dpt = $lokasi ? $lokasi->jlh_DPT : 0;
            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;
            $total_suara_desa = $iyoks->where('desa', $data->desa)->sum('jlh_suara');
            $existingDataInDesa = Rekap_desa::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();
            if (!$existingDataInDesa) {
                Rekap_desa::create([
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
        $updatedData = Rekap_desa::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }

    public function rekapBolit (Request $request) {

        $desa = Rekap_desa::inRandomOrder()->get();
        $bolits = Ds2_Bolangitang::inRandomOrder()->get();

        $count = count($bolits);

        echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($bolits as $index => $data) {
            // $lokasi = Lokasi::where('nm_desa', $data->desa)->first();
            //$jlh_dpt = $lokasi ? $lokasi->jlh_DPT : 0;
            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;
            $total_suara_desa = $bolits->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();
            if (!$existingDataInDesa) {
                Rekap_desa::create([
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
        $updatedData = Rekap_desa::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }



}
