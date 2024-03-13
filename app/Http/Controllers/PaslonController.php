<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Paslon;
use App\Models\Partai;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StorePaslonRequest;
use App\Http\Requests\UpdatePaslonRequest;
use App\Http\Requests\StorePartaiRequest;
use App\Http\Requests\UpdatePartaiRequest;

class PaslonController extends Controller
{
    public function index(Request $request)
    {

        $paslons = DB::table('paslons')
            ->when($request->input('nama_paslon'), function ($query, $name ) {
                return $query->where('nama_paslon', 'like', '%'.$name.'%' );
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view ('pages.paslons.index', compact ('paslons'));

    }

    public function create()
    {
        return view('pages.paslons.create');
    }

    public function store(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'nama_partai' => 'required|string',
            'nama_paslon' => 'required|string',
            'no_urut' => 'required|numeric',
            'foto_paslon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Membuat instance baru dari model Paslon
        $paslon = new Paslon();

        // Mengisi atribut model dengan data yang divalidasi
        $paslon->nama_partai = $validatedData['nama_partai'];
        $paslon->nama_paslon = $validatedData['nama_paslon'];
        $paslon->no_urut = $validatedData['no_urut'];

        // Mendapatkan nama Paslon dari input form atau dari sumber data lainnya
        $nama_paslon = $request->input('nama_paslon');
        // Mengasumsikan $nama_paslon berisi nama Paslon
        $urlFoto = $paslon->savePhoto($request->file('foto_paslon'), $nama_paslon);


        // Redirect dengan pesan sukses jika berhasil
        return redirect()->route('paslon.index')->with('success', 'Paslon berhasil ditambahkan');
    }


    public function edit($id)
    {
        $paslon = \App\Models\Paslon::findOrFail($id);
        // $partai = \App\Models\Partai::all();
        // return view('pages.paslons.edit', compact('paslon', 'partai'));
        return view('pages.paslons.edit', compact('paslon'));
    }

    // public function update(UpdatePaslonRequest $request, Paslon $paslon)
    public function update(Request $request, Paslon $paslon)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama_partai' => 'required|string',
            'nama_paslon' => 'required|string',
            'no_urut' => 'required|numeric',
            'foto_paslon' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Foto tidak wajib diunggah
        ]);

        // Mengisi atribut model dengan data yang divalidasi
        $paslon->nama_partai = $validatedData['nama_partai'];
        $paslon->nama_paslon = $validatedData['nama_paslon'];
        $paslon->no_urut = $validatedData['no_urut'];

        if ($request->hasFile('foto_paslon')) {
            $foto = $request->file('foto_paslon');

            // Jika paslon sudah memiliki foto sebelumnya, hapus foto tersebut
            if ($paslon->foto_paslon) {
                Storage::delete($paslon->foto_paslon);
            }

             // Mendapatkan nama Paslon dari input form atau dari sumber data lainnya
            // $nama_paslon = $request->input('nama_paslon');
            // // Mengasumsikan $nama_paslon berisi nama Paslon
            // $urlFoto = $paslon->savePhoto($request->file('foto_paslon'), $nama_paslon);

            $urlFoto = $paslon->savePhoto($foto, $paslon->nama_paslon);
            $paslon->foto_paslon = $urlFoto;
        }

        // Simpan perubahan pada data Paslon
        $paslon->save();

        // Redirect dengan pesan sukses jika berhasil
        return redirect()->route('paslon.index')->with('success', 'Paslon berhasil diupdate');
    }


    public function destroy(Paslon $paslon)
    {
        $paslon->delete();
        return redirect()->route('paslon.index')->with('success', 'Data Caleg successfully deleted');
    }

}
