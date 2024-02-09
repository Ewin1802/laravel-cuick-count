<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Partai;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePartaiRequest;
use App\Http\Requests\UpdatePartaiRequest;

class PartaiController extends Controller
{
    public function index(Request $request)
    {
        // $soals = \App\Models\Soal::paginate(10);
        $partais = DB::table('partais')
            ->when($request->input('nm_partai'), function ($query, $name ) {
                return $query->where('nm_partai', 'like', '%'.$name.'%' );
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view ('pages.partais.index', compact ('partais'));
    }

    public function create()
    {
        return view('pages.partais.create');
    }

    public function store(StorePartaiRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        \App\Models\Partai::create($data);
        return redirect()->route('partai.index')->with('success', 'Data Partai successfully created');
    }

    public function edit($id)
    {
        $partai = \App\Models\Partai::findOrFail($id);
        return view('pages.partais.edit', compact('partai'));
    }

    public function update(UpdatePartaiRequest $request, Partai $partai)
    {
        $data = $request->validated();
        $partai->update($data);
        return redirect()->route('partai.index')->with('success', 'Data Partai successfully updated');
    }

    public function destroy(Partai $partai)
    {
        $partai->delete();
        return redirect()->route('partai.index')->with('success', 'Data Partai successfully deleted');
    }
}
