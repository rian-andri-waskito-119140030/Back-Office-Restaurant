<?php

namespace App\Http\Controllers\Api;

use App\Models\PesananSelesai;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PesananSelesaiResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ControllerPesananSelesai extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(){
        //get posts
        $pesananselesai = PesananSelesai::oldest();

        //return collection of posts as a resource
        return new PesananSelesaiResource(true, 'List Data Pesanan Selesai', $pesananselesai);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */

    public function show(Request $request){
        $joinpesanan = DB::table('pesanan')
            ->join('menu_dipesan', 'pesanan.id_pesanan', '=', 'menu_dipesan.id_pesanan')
            ->select('menu_dipesan.id_menu','menu_dipesan.jumlah','menu_dipesan.total_harga',)->where('pesanan.status', '=', 'selesai')
            ->get();

        return new PesananSelesaiResource(true, 'List Data Pesanan Selesai', $joinpesanan);
    }
}
