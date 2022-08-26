<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PesananResource;

class UjiKitchenDisplayController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::oldest();
        $pesanan = Pesanan::with(['menu_dipesan', 'meja'])
            ->whereIn('status', ['di pesan', 'di masak'])
            ->orderBy('waktu_pesan')
            ->get();
        return new PesananResource(true, 'success, tampil data pesanan pelanggan', $pesanan);
    }
    public function update(Request $request, $id_pesanan)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:di pesan,di masak,selesai',
        ]);
        if ($validator->fails()) {
            return new PesananResource(false, 'error, validasi gagal', $validator->errors());
        }
        $pesanan = Pesanan::find($id_pesanan);
        $pesanan->status = $request->status;
        $pesanan->save();
        return new PesananResource(true, 'success, status pesanan berhasil diubah', $pesanan);
    }
}
