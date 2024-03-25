<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
use App\Models\Kaidipang\Ds1_Bigo;

class UpdateDesaDapil1Controller extends Controller
{
    public function updatekayuogu(Request $request)
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
        $caleg = Ds1_Kayuogu::where('nm_caleg', $nm_caleg)->first();

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
    public function updatebatubantayo(Request $request)
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
        $caleg = Ds1_BatuBantayo::where('nm_caleg', $nm_caleg)->first();

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
    public function updatedalapuli(Request $request)
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
        $caleg = Ds1_Dalapuli::where('nm_caleg', $nm_caleg)->first();

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
    public function updatedalapulibarat(Request $request)
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
        $caleg = Ds1_Dalapulibarat::where('nm_caleg', $nm_caleg)->first();

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
    public function updatedalapulitimur(Request $request)
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
        $caleg = Ds1_Dalapulitimur::where('nm_caleg', $nm_caleg)->first();

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
    public function updatedengi(Request $request)
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
        $caleg = Ds1_Dengi::where('nm_caleg', $nm_caleg)->first();

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
    public function updateduini(Request $request)
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
        $caleg = Ds1_Duini::where('nm_caleg', $nm_caleg)->first();

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
    public function updatekomussatu(Request $request)
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
        $caleg = Ds1_Komussatu::where('nm_caleg', $nm_caleg)->first();

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
    public function updatepadango(Request $request)
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

        $nm_caleg = $validatedData['nm_caleg'];
        $caleg = Ds1_Padango::where('nm_caleg', $nm_caleg)->first();
        if (!$caleg) {
            return response()->json(['message' => 'Paslon Tidak Ditemukan'], 404);
        }
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
    public function updatetanjungsidupa(Request $request)
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

        $nm_caleg = $validatedData['nm_caleg'];
        $caleg = Ds1_Tanjungsidupa::where('nm_caleg', $nm_caleg)->first();
        if (!$caleg) {
            return response()->json(['message' => 'Paslon Tidak Ditemukan'], 404);
        }
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
    public function updatetombulangpantai(Request $request)
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

        $nm_caleg = $validatedData['nm_caleg'];
        $caleg = Ds1_Tombulangpantai::where('nm_caleg', $nm_caleg)->first();
        if (!$caleg) {
            return response()->json(['message' => 'Paslon Tidak Ditemukan'], 404);
        }
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
    public function updatetombulangtimur(Request $request)
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

        $nm_caleg = $validatedData['nm_caleg'];
        $caleg = Ds1_Tombulangtimur::where('nm_caleg', $nm_caleg)->first();
        if (!$caleg) {
            return response()->json(['message' => 'Paslon Tidak Ditemukan'], 404);
        }
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
    public function updatetombulang(Request $request)
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

        $nm_caleg = $validatedData['nm_caleg'];
        $caleg = Ds1_Tombulang::where('nm_caleg', $nm_caleg)->first();
        if (!$caleg) {
            return response()->json(['message' => 'Paslon Tidak Ditemukan'], 404);
        }
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

    public function updatebigo(Request $request)
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
        $caleg = Ds1_Bigo::where('nm_caleg', $nm_caleg)->first();

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
