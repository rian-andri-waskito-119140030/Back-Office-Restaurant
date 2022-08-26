<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RiwayatPesananResource;

class UjiRiwayatPesananController extends Controller
{
    public function index()
    {
        $riwayatpesanan = Pesanan::with(['menu_dipesan', 'meja'])
            ->whereIn('status', ['selesai'])
            ->orderBy('waktu_pesan')
            ->get();
        return new RiwayatPesananResource(true, 'Data Riwayat Pesanan', $riwayatpesanan);
    }
    public function show($id)
    {
        $riwayatpesanan = Pesanan::find($id);
        $riwayatpesanan = Pesanan::with(['menu_dipesan', 'meja'])
            ->where('id_pesanan', $id)
            ->get();
        return new RiwayatPesananResource(true, 'Data Riwayat Pesanan berdasarkan id', $riwayatpesanan);
    }
}
