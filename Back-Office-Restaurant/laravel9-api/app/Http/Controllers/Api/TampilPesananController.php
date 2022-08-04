<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use App\Http\Resources\PesananSelesaiResource;
use Illuminate\Http\Request;

class TampilPesananController extends Controller
{
    public function tampilpesanan(Pesanan $menu_dipesan)
    {
        // $tampilpesananselesai = Pesanan::find($id_pesanan);
        // $tampilpesananselesai = Pesanan::with(['menu_dipesan', 'meja'])->where('id_pesanan', $id_pesanan)->get();
        //dd($menu_dipesan);
        return view('detail_pesanan', compact('menu_dipesan'));
    }

    public function show(Pesanan $menu_dipesan)
    {
        $menu_dipesan = Pesanan::with(['menu_dipesan', 'meja'])->where('id_pesanan', $menu_dipesan->id_pesanan)->get();
        //dd($menu_dipesan);
        return view('detail_pesanan', compact('menu_dipesan'));
    }
}
