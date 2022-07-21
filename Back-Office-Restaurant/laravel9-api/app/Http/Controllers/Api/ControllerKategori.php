<?php

namespace App\Http\Controllers\Api;

use App\Models\Diskon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ControllerKategori extends Controller
{
    public function index(Request $request)
    {
        $kategori = DB::table('menu')->select('id_menu', 'nama_menu', 'harga_jual')->get();
        //dd($kategori);
        return view('diskon', compact('kategori'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_menu' => 'required',
            'nama_diskon' => 'required',
            'diskon' => 'required',
            'harga_baru' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $diskon = Diskon::create($request->all());
        return response()->json($diskon, 201);
    }
}
