<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bolbar\Ds2_Sonuo;
use App\Models\User; // Sesuaikan dengan model User Anda


class UpdateDesaController extends Controller
{
    // public function updatesonuo(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nm_caleg' => 'required',
    //         'tps_1' => 'required|max:55',
    //         'tps_2' => 'required|max:55',
    //         'tps_3' => 'required|max:55',
    //         'tps_4' => 'required|max:55',
    //         'tps_5' => 'required|max:55',
    //         'tps_6' => 'required|max:55',
    //         'tps_7' => 'required|max:55',
    //         'tps_8' => 'required|max:55',
    //         'tps_9' => 'required|max:55',
    //         'tps_10' => 'required|max:55',
    //         'tps_11' => 'required|max:55',
    //         'tps_12' => 'required|max:55',
    //     ]);
    //     $caleg = Ds2_Sonuo::where('nm_caleg', $validatedData['nm_caleg'])->first();
    //         if(!$caleg) {
    //             return response()->json(['message' => 'Caleg Tidak Ditemukan'], 401);
    //         }
    //          // Menghitung total suara dari seluruh TPS
    //     $total_suara = array_sum($validatedData);
    //     $caleg->update([
    //         'tps_1' => $validatedData['tps_1'],
    //         'tps_2' => $validatedData['tps_2'],
    //         'tps_3' => $validatedData['tps_3'],
    //         'tps_4' => $validatedData['tps_4'],
    //         'tps_5' => $validatedData['tps_5'],
    //         'tps_6' => $validatedData['tps_6'],
    //         'tps_7' => $validatedData['tps_7'],
    //         'tps_8' => $validatedData['tps_8'],
    //         'tps_9' => $validatedData['tps_9'],
    //         'tps_10' => $validatedData['tps_10'],
    //         'tps_11' => $validatedData['tps_11'],
    //         'tps_12' => $validatedData['tps_12'],
    //         'jlh_suara' => $total_suara
    //     ]);


    //     return response()->json([
    //         'message' => 'Berhasil',
    //         'user' => $caleg,
    //     ]);

    // }

    public function updatesonuo(Request $request)
    {
        $validatedData = $request->validate([
            'nm_caleg' => 'required',
            'tps_1' => 'required|max:55',
            'tps_2' => 'required|max:55',
            'tps_3' => 'required|max:55',
            'tps_4' => 'required|max:55',
            'tps_5' => 'required|max:55',
            'tps_6' => 'required|max:55',
            'tps_7' => 'required|max:55',
            'tps_8' => 'required|max:55',
            'tps_9' => 'required|max:55',
            'tps_10' => 'required|max:55',
            'tps_11' => 'required|max:55',
            'tps_12' => 'required|max:55',
        ]);

        // Mendapatkan nama caleg dari data yang diverifikasi
        $nm_caleg = $validatedData['nm_caleg'];

        // Mengambil data caleg dari database
        $caleg = Ds2_Sonuo::where('nm_caleg', $nm_caleg)->first();

        // Memastikan caleg ditemukan
        if (!$caleg) {
            return response()->json(['message' => 'Caleg Tidak Ditemukan'], 404);
        }

        // Menghitung total suara dari seluruh TPS
        $total_suara = array_sum($validatedData);

        // Memperbarui data caleg dengan total suara
        $caleg->update([
            'tps_1' => $validatedData['tps_1'],
            'tps_2' => $validatedData['tps_2'],
            'tps_3' => $validatedData['tps_3'],
            'tps_4' => $validatedData['tps_4'],
            'tps_5' => $validatedData['tps_5'],
            'tps_6' => $validatedData['tps_6'],
            'tps_7' => $validatedData['tps_7'],
            'tps_8' => $validatedData['tps_8'],
            'tps_9' => $validatedData['tps_9'],
            'tps_10' => $validatedData['tps_10'],
            'tps_11' => $validatedData['tps_11'],
            'tps_12' => $validatedData['tps_12'],
            'jlh_suara' => $total_suara,
        ]);

        return response()->json([
            'message' => 'Berhasil',
            'user' => $caleg,
        ]);
    }

}





