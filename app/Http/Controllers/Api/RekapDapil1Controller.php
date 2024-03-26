<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pinogaluman\Ds1_Kayuogu;
use App\Models\Pinogaluman\Ds1_BatuBantayo;
use App\Models\Pinogaluman\Ds1_Dalapuli;
use App\Models\Pinogaluman\Ds1_Dalapulibarat;
use App\Models\Pinogaluman\Ds1_Dalapulitimur;
use App\Models\Pinogaluman\Ds1_Dengi;
use App\Models\Pinogaluman\Ds1_Duini;
use App\Models\Pinogaluman\Ds1_Komussatu;
use App\Models\Pinogaluman\Ds1_Padango;
use App\Models\Pinogaluman\Ds1_Tanjungsidupa;
use App\Models\Pinogaluman\Ds1_Tombulangpantai;
use App\Models\Pinogaluman\Ds1_Tombulangtimur;
use App\Models\Pinogaluman\Ds1_Tombulang;
use App\Models\Pinogaluman\Ds1_Tuntulow;
use App\Models\Pinogaluman\Ds1_Tuntung;
use App\Models\Pinogaluman\Ds1_Tuntungtimur;
use App\Models\Pinogaluman\Ds1_Tontulowutara;
use App\Models\Kaidipang\Ds1_Bigo;
use App\Models\Rekap_desa_dapil1;

class RekapDapil1Controller extends Controller
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

// =========================== KEC. PINOGALUMAN
    public function rekapKayuogu(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $kayuogus = Ds1_Kayuogu::inRandomOrder()->get();

        $count = count($kayuogus);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($kayuogus as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $kayuogus->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapBatubantayo(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $batubantayos = Ds1_BatuBantayo::inRandomOrder()->get();

        $count = count($batubantayos);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($batubantayos as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $batubantayos->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapDalapuli(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $dalapulis = Ds1_Dalapuli::inRandomOrder()->get();

        $count = count($dalapulis);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($dalapulis as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $dalapulis->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapDalapulibarat(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $dalapulibarats = Ds1_Dalapulibarat::inRandomOrder()->get();

        $count = count($dalapulibarats);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($dalapulibarats as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $dalapulibarats->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapDalapulitimur(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $dalapulitimurs = Ds1_Dalapulitimur::inRandomOrder()->get();

        $count = count($dalapulitimurs);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($dalapulitimurs as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $dalapulitimurs->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapDengi(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $dengis = Ds1_Dengi::inRandomOrder()->get();

        $count = count($dengis);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($dengis as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $dengis->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapDuini(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $duinis = Ds1_Duini::inRandomOrder()->get();

        $count = count($duinis);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($duinis as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $duinis->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapKomussatu(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Komussatu::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapPadango(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Padango::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTanjungsidupa(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tanjungsidupa::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTombulangpantai(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tombulangpantai::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTombulangtimur(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tombulangtimur::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTombulang(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tombulang::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTuntulow(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tuntulow::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTuntung(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tuntung::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTuntungtimur(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tuntungtimur::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }
    public function rekapTontulowutara(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $datadesa = Ds1_Tontulowutara::inRandomOrder()->get();

        $count = count($datadesa);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($datadesa as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $datadesa->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }

// =========================== KEC. KAIDIPANG

    public function rekapBigo(Request $request)
    {
        $desa = Rekap_desa_dapil1::inRandomOrder()->get();
        $bigos = Ds1_Bigo::inRandomOrder()->get();

        $count = count($bigos);

        // echo "Jumlah Paslon sebanyak : $count Orang\n";

        foreach ($bigos as $index => $data) {

            $total_suara = $data->tps_1 + $data->tps_2 + $data->tps_3 + $data->tps_4 + $data->tps_5 + $data->tps_6 + $data->tps_7 + $data->tps_8 + $data->tps_9 + $data->tps_10 + $data->tps_11 + $data->tps_12;

            $total_suara_desa = $bigos->where('desa', $data->desa)->sum('jlh_suara');

            $existingDataInDesa = Rekap_desa_dapil1::where('desa', $data->desa)->where('caleg', $data->nm_caleg)->first();

            if (!$existingDataInDesa) {
                Rekap_desa_dapil1::create([
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
        $updatedData = Rekap_desa_dapil1::all();

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Desa',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $updatedData
            ]
        ]);
    }


}
