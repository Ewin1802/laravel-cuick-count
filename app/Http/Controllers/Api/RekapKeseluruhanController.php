<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rekap_Dapil1;
use App\Models\Rekap_Dapil2;
use App\Models\Rekap_Dapil3;
use App\Models\Rekap_All;

class RekapKeseluruhanController extends Controller
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

    public function rekapAll(Request $request)
    {

        $allCalegs = [];

        // Ambil semua nama caleg dari masing-masing tabel Rekap_Dapil1, Rekap_Dapil2, dan Rekap_Dapil3
        $dapil1Calegs = Rekap_Dapil1::pluck('nm_paslon')->unique()->toArray();
        $dapil2Calegs = Rekap_Dapil2::pluck('nm_paslon')->unique()->toArray();
        $dapil3Calegs = Rekap_Dapil3::pluck('nm_paslon')->unique()->toArray();

        // Gabungkan semua nama caleg menjadi satu daftar unik
        $allCalegs = array_unique(array_merge($dapil1Calegs, $dapil2Calegs, $dapil3Calegs));

        // Untuk setiap nama caleg, hitung total suara dan total pemilih dari ketiga tabel Rekap_Dapil1, Rekap_Dapil2, dan Rekap_Dapil3
        foreach ($allCalegs as $caleg) {
            $total_suara_all_d1 = Rekap_Dapil1::where('nm_paslon', $caleg)->sum('jlh_pemilih');
            $total_suara_all_d2 = Rekap_Dapil2::where('nm_paslon', $caleg)->sum('jlh_pemilih');
            $total_suara_all_d3 = Rekap_Dapil3::where('nm_paslon', $caleg)->sum('jlh_pemilih');
            $total_pemilih = $total_suara_all_d1 + $total_suara_all_d2 + $total_suara_all_d3;

            $total_suara_paslon_d1 = Rekap_Dapil1::where('nm_paslon', $caleg)->sum('jlh_suara');
            $total_suara_paslon_d2 = Rekap_Dapil2::where('nm_paslon', $caleg)->sum('jlh_suara');
            $total_suara_paslon_d3 = Rekap_Dapil3::where('nm_paslon', $caleg)->sum('jlh_suara');
            $total_suara = $total_suara_paslon_d1 + $total_suara_paslon_d2 + $total_suara_paslon_d3;

            // Tambahkan atau perbarui entri dalam tabel Rekap_All dengan nilai yang dihitung
            Rekap_All::updateOrCreate(
                ['nm_paslon' => $caleg],
                ['jlh_pemilih' => $total_pemilih, 'jlh_suara' => $total_suara]
            );
        }

        // Ambil semua data yang telah diupdate dari tabel Rekap_All
        $updatedData = Rekap_All::all();

        // Format data untuk ditampilkan
        $formattedData = [];
        foreach ($updatedData as $data) {
            $formattedData[] = [
                'nm_paslon' => $data->nm_paslon,
                'jlh_pemilih' => $data->jlh_pemilih,
                'jlh_suara' => $data->jlh_suara,
            ];
        }

        // Hitung jumlah caleg
        $count = count($allCalegs);

        return response()->json([
            'message' => 'Data Caleg berhasil Di Create/Update pada Tabel Total Rekap',
            'data' => [
                'jumlah_caleg' => $count,
                'updated_data' => $formattedData,
            ],
        ]);

    }

}
