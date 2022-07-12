<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PesananResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ControllerPesanan extends Controller
{
    public function index()
    {
        //get posts
        $pesanan = Pesanan::oldest();
        $pesanan = DB::select('SELECT * FROM pesanan');

        //return collection of posts as a resource
        return new PesananResource(true, 'List Data Pesanan', $pesanan);
    }

    public function show($id_pesanan){
        $pesanan = DB::select('SELECT * FROM pesanan WHERE id_pesanan = ?', [$id_pesanan]);

        return new PesananResource(true, 'List Data Pesanan', $pesanan);
    }

    public function edit(Request $request, $id_pesanan){
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $status = $request->status;

        DB::update('UPDATE pesanan SET status = ? WHERE id_pesanan = ?', [$status, $id_pesanan]);

        return new PesananResource(true, 'Data Pesanan Diubah!', $status);
    }

   
}
