<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class JambusarangController extends Controller
{
    public function index(Request $request)
    {

        $jambusarangs = DB::table('jambusarangs')
            ->when($request->input('nm_caleg'), function ($query, $name ) {
                return $query->where('nm_caleg', 'like', '%'.$name.'%' );
            })
            ->orderBy('id', 'desc')
            ->paginate(10);
        return view ('pages.jambusarangs.index', compact ('jambusarangs'));

    }
}
