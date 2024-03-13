<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class StorePaslonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_partai' => 'required|max:100|min:3',
            'nama_paslon' => 'required|max:100|min:3',
            'no_urut' => 'required||max:20|min:1',
            'foto_paslon' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama_paslon' => 'required|string',
    //         'no_urut' => 'required|numeric',
    //         'nama_partai' => 'required|string',
    //         'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // sesuaikan dengan kebutuhan
    //     ]);

    //     $paslon = new Paslon();
    //     $paslon->nama_paslon = $validatedData['nama_paslon'];
    //     $paslon->no_urut = $validatedData['no_urut'];
    //     $paslon->nama_partai = $validatedData['nama_partai'];

    //     // Simpan foto jika ada yang diunggah
    //     if ($request->hasFile('foto')) {
    //         $foto = $request->file('foto');
    //         $paslon->savePhoto($foto);
    //     }

    //     $paslon->save();

    //     return redirect()->route('paslon.index')->with('success', 'Paslon berhasil ditambahkan');
    // }
}
