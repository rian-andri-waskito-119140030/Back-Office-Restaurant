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
        $pesanan = DB::table('menu_dipesan')
            ->join('pesanan', 'menu_dipesan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->join('menu', 'menu_dipesan.id_menu', '=', 'menu.id_menu')
            ->select('menu_dipesan.jumlah', 'menu.nama_menu', 'pesanan.status', 'pesanan.waktu_pesan', 'pesanan.id_pesanan')
            ->get();
        // if ($pesanan->id_pesanan == $pesanan->id_pesanan) {
        //     dd($pesanan);
        // }
        //dd($pesanan);

        return response()->json([
            'status' => 'success',
            'pesanan' => $pesanan,
        ]);
    }

    public function edit($id_pesanan)
    {
        $pesanan = Pesanan::find($id_pesanan);
        if ($pesanan) {
            return response()->json([
                'status' => 200,
                'pesanan' => $pesanan
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'not found'
            ]);
        }
    }
    // {
    //     return view('editpesanan', compact('pesanan'));
    // }

    public function update(Request $request, $id_pesanan)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $pesanan = Pesanan::find($id_pesanan);
        $pesanan->update(
            [
                'status' => $request->status
            ]
        );
        return response()->json([
            'status' => 200,
            'message' => 'success'
        ]);
    }
}
