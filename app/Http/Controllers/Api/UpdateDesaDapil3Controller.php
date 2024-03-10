<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bintauna\Ds3_Kuhanga;

class UpdateDesaDapil3Controller extends Controller
{
    public function updatekuhanga(Request $request)
    {
        // Mendapatkan pengguna yang terautentikasi
        $user = $request->user();

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
        $caleg = Ds3_Kuhanga::where('nm_caleg', $nm_caleg)->first();

        // Memastikan caleg ditemukan
        if (!$caleg) {
            return response()->json(['message' => 'Paslon Tidak Ditemukan'], 404);
        }

        // Menghitung total suara dari seluruh TPS
        $total_suara = array_sum(array_slice($validatedData, 1)); // Mengambil semua nilai tps_* untuk dijumlahkan

        // Memperbarui data caleg dengan total suara dan informasi pengguna
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
            'user' => $user->name, // nama pengguna yang melakukan pembaruan
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => 'Berhasil',
            'user' => $caleg,
        ]);
    }
}
