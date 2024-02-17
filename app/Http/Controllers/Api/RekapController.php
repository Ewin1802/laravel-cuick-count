<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Paslon;
use App\Models\Sonuo;
use App\Models\Jambusarang;
use App\Models\Pemungutan;
use App\Models\Desa;
use App\Models\Lokasi;

class RekapController extends Controller
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

    public function rekapSonuo (Request $request) {

        $desa = Desa::inRandomOrder()->get();
        $sonuos = Sonuo::inRandomOrder()->get();

        $count_desa = count($desa);
        $count_sonuo = count($sonuos);

        echo "Jumlah Paslon sebanyak : $count_sonuo Orang\n";

        foreach ($sonuos as $index => $sonuo) {
            // Cari nilai 'jlh_pemilih' dari tabel Lokasi berdasarkan 'desa'
            $lokasi = Lokasi::where('nm_desa', $sonuo->desa)->first();
            $jlh_pemilih = $lokasi ? $lokasi->jlh_pemilih : 0;

            // Hitung total suara dari kolom tps_1, tps_2, dan tps_3
            $total_suara = $sonuo->tps_1 + $sonuo->tps_2 + $sonuo->tps_3 + $sonuo->tps_4 + $sonuo->tps_5 + $sonuo->tps_6 + $sonuo->tps_7 + $sonuo->tps_8 + $sonuo->tps_9 + $sonuo->tps_10 + $sonuo->tps_11 + $sonuo->tps_12;

            // Cek apakah nilai 'Sonuo' sudah ada di dalam kolom 'Desa'
            $existingSonuoInDesa = Desa::where('desa', $sonuo->desa)->where('caleg', $sonuo->nm_caleg)->first();
            if (!$existingSonuoInDesa) {
                Desa::create([
                    'caleg' => $sonuo->nm_caleg,
                    'desa' => $sonuo->desa,
                    'suara' => $total_suara,
                    'jlh_pemilih' => $jlh_pemilih,
                ]);
            } else {
                // Jika data sudah ada, update nilai kolom 'suara' dengan total suara
                $existingSonuoInDesa->suara = $total_suara;
                $existingSonuoInDesa->save();
            }
        }

        return response()->json([
            'message' => 'Data Caleg berhasil dibuat pada Tabel Sonuo',
            'data' => "Jumlah Caleg sebanyak: $count_sonuo orang",
        ]);

    }

    public function rekapJbs (Request $request) {

        $desa = Desa::inRandomOrder()->get();
        $jbs = Jambusarang::inRandomOrder()->get();

        $count_desa = count($desa);
        $count_jbs = count($jbs);

        echo "Jumlah Caleg sebanyak : $count_jbs Orang\n";

        foreach ($jbs as $index => $jbx) {
            // Cari nilai 'jlh_pemilih' dari tabel Lokasi berdasarkan 'desa'
            $lokasi = Lokasi::where('nm_desa', $jbx->desa)->first();
            $jlh_pemilih = $lokasi ? $lokasi->jlh_pemilih : 0;

            // Hitung total suara dari kolom tps_1, tps_2, dan tps_3
            $total_suara = $jbx->tps_1 + $jbx->tps_2 + $jbx->tps_3 + $jbx->tps_4 + $jbx->tps_5 + $jbx->tps_6 + $jbx->tps_7 + $jbx->tps_8 + $jbx->tps_9 + $jbx->tps_10 + $jbx->tps_11 + $jbx->tps_12;

            // Cek apakah nilai 'Jbs' sudah ada di dalam kolom 'Desa'
            $existingJbsInDesa = Desa::where('desa', $jbx->desa)->where('caleg', $jbx->nm_caleg)->first();
            if (!$existingJbsInDesa) {
                Desa::create([
                    'caleg' => $jbx->nm_caleg,
                    'desa' => $jbx->desa,
                    'suara' => $total_suara,
                    'jlh_pemilih' => $jlh_pemilih,
                ]);
            } else {
                 // Jika data sudah ada, update nilai kolom 'suara' dengan total suara
                $existingJbsInDesa->suara = $total_suara;
                $existingJbsInDesa->save();
            }
        }

        return response()->json([
            'message' => 'Data Caleg berhasil dibuat pada Tabel Jambusarang',
            'data' => "Jumlah Caleg sebanyak: $count_jbs orang",
        ]);

    }

}
