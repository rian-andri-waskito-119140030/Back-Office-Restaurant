<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Resources\TotalHargaResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ControllerTotalHarga extends Controller
{
    public function index(){
        $totalharga = Pesanan::all();
        return new TotalHargaResource(true, 'List Data Total Harga', $totalharga);
    }
    public function showharga(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $totalharga = DB::table('pesanan')->selectRaw("SUM(total_harga) as total_harga")
        ->where('waktu_pesan', '=', date('Y-m-d')) 
        ->get();
        return new TotalHargaResource(true, 'List Data Total Harga', $totalharga);
    }
}
