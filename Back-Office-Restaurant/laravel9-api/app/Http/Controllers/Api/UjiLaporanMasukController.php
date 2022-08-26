<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\LaporanMasukResource;

class UjiLaporanMasukController extends Controller
{
    public function index()
    {
        $laporanmasuk = Pesanan::select(
            "id_pesanan",
            DB::raw("(sum(total_harga)) as total_harga"),
            DB::raw("(DATE_FORMAT(waktu_pesan, '%d-%m-%Y')) as tanggal")
        )
            ->orderBy('waktu_pesan')
            ->groupBy(DB::raw("DATE_FORMAT(waktu_pesan, '%d-%m-%Y')"))
            ->get();
        return new LaporanMasukResource(true, 'Data Laporan Harian', $laporanmasuk);
    }
}
