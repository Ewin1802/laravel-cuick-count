<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Paslon;
use App\Models\Partai;
use Illuminate\Support\Facades\Hash;
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

    public function store(StorePaslonRequest $request, )
    {

        //Validate
        // $request->validate([
        //     'nm_partai' => 'required',
        // ]);

        // $paslon = Paslon::create([
        //     'nama_partai' => $request->nm_partai,
        //     'nama_paslon' => $request->nama_paslon,
        //     'no_urut' => $request->no_urut,
        // ]);
        // return redirect()->route('paslon.index')->with('success', 'Data Caleg successfully created');


        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        \App\Models\Paslon::create($data); 
        return redirect()->route('paslon.index')->with('success', 'Data Caleg successfully created');

    }

    public function edit($id)
    {
        $paslon = \App\Models\Paslon::findOrFail($id);
        // $partai = \App\Models\Partai::all();
        // return view('pages.paslons.edit', compact('paslon', 'partai'));
        return view('pages.paslons.edit', compact('paslon'));
    }

    public function update(UpdatePaslonRequest $request, Paslon $paslon)
    {
        $data = $request->validated();
        $paslon->update($data);
        return redirect()->route('paslon.index')->with('success', 'Data Caleg successfully updated');
    }

    public function destroy(Paslon $paslon)
    {
        $paslon->delete();
        return redirect()->route('paslon.index')->with('success', 'Data Caleg successfully deleted');
    }

}
