<?php

namespace App\Http\Controllers\Api;

use App\Models\TiketPesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\TiketPesananResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ControllerTiketPesanan extends Controller
{
     /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $tiketpesanan = TiketPesanan::oldest();

        //return collection of posts as a resource
        return new TiketPesananResource(true, 'List Data Tiket Pesanan', $tiketpesanan);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status_pesanan' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $tiketpesanan = TiketPesanan::create([
            'id' => $request->id,
            'status_pesanan' => $request->status_pesanan,
        ]);

        //return response
        return new TiketPesananResource(true, 'Data Menu Tiket Pesanan Ditambahkan!', $tiketpesanan);
    }

    /**
     * show
     *
     * @param  mixed $post
     * @return void
     */

    public function show(TiketPesanan $tiketpesanan)
    {
        $tiketpesanan = DB::table('tiket_pesanan')
            ->select('status_pesanan')
            ->get();
        return new TiketPesananResource(true, 'Data Tiket Pesanan Ditemukan!', $tiketpesanan);
    }

    public function showticket(Request $request)
    {
        $showjoin = DB::table('menu')
            ->join('menu_dipesan', 'menu.id_menu', '=', 'menu_dipesan.id_menu')
            ->select('menu.nama_menu','menu_dipesan.jumlah','menu_dipesan.total_harga')
            ->get();
        $showjoin2 = DB::table('pesanan')
            ->join('menu_dipesan', 'pesanan.id_pesanan', "=", 'menu_dipesan.id_pesanan')
            ->join('tiket_pesanan', 'pesanan.id_pesanan', "=", 'tiket_pesanan.id')
            ->select('pesanan.waktu_pesan','pesanan.no_meja','tiket_pesanan.status_pesanan',)
            ->get();
        //return single post as a resource
        return new TiketPesananResource(true, 'Data Menu Ditemukan!', [$showjoin,$showjoin2]);
    }

    
    
}
