<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreLokasiRequest;
use App\Http\Requests\UpdateLokasiRequest;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        // $soals = \App\Models\Soal::paginate(10);
        $lokasis = DB::table('lokasis')
            ->when($request->input('nm_desa'), function ($query, $name ) {
                return $query->where('nm_desa', 'like', '%'.$name.'%' );
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view ('pages.lokasis.index', compact ('lokasis'));
    }

    public function create()
    {
        return view('pages.lokasis.create');
    }

    public function store(StoreLokasiRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|max:100|min:3',
        //     'email' => 'required|email|unique:users,email',
        //     'phone' => 'required|numeric',
        //     'roles' => 'required|in:ADMIN,STAFF,USER',
        //     'password' => 'required|min:8',
        // ]);
        //dipindahkan ke StoreUserRequest

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        \App\Models\Lokasi::create($data);
        return redirect()->route('lokasi.index')->with('success', 'Data Lokasi successfully created');
    }

    public function edit($id)
    {
        $lokasi = \App\Models\Lokasi::findOrFail($id);
        return view('pages.lokasis.edit', compact('lokasi'));
    }

    public function update(UpdateLokasiRequest $request, Lokasi $lokasi)
    {
        $data = $request->validated();
        $lokasi->update($data);
        return redirect()->route('lokasi.index')->with('success', 'Data Lokasi successfully updated');
    }


    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Data Lokasi successfully deleted');
    }
}
