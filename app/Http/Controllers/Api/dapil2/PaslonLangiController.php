<?php

namespace App\Http\Controllers\Api\dapil2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bolbar\Ds2_Langi;

class PaslonLangiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paslons = \App\Models\Bolbar\Ds2_Langi::when($request->id, function($query, $id){
            return $query->where('id', $id);
        })->get();

        return response()->json([
            'status' => 'success',
            'data' => $paslons,
        ]);
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
}