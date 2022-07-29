<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PesananSelesaiResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use DataTables;

class ControllerPesananSelesai extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(Request $request)
    {
        //get posts
        //get posts
        $pesananselesai = Pesanan::oldest();
        if ($request->ajax()) {
            $pesananselesai = DB::table('menu_dipesan')
                ->join('pesanan', 'menu_dipesan.id_pesanan', '=', 'pesanan.id_pesanan')
                ->join('menu', 'menu_dipesan.id_menu', '=', 'menu.id_menu')
                ->select('menu_dipesan.jumlah', 'menu.nama_menu', 'menu.tipe_produk', 'pesanan.status', 'pesanan.waktu_pesan', 'pesanan.id_pesanan', 'pesanan.total_harga')
                ->where('pesanan.status', '=', 'selesai')
                ->orderBy('pesanan.waktu_pesan')
                ->groupBy('pesanan.id_pesanan')
                ->get();
            return DataTables::of($pesananselesai)
                ->addColumn('total_harga', function ($row) {
                    $harga = 'Rp. ' . number_format($row->total_harga, 0, ',', '.');
                    return $harga;
                })

                ->rawColumns(['total_harga'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pesanan');

        //return collection of posts as a resource

    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */

    public function show(Request $request)
    {
        $joinpesanan = DB::table('pesanan')
            ->join('menu_dipesan', 'pesanan.id_pesanan', '=', 'menu_dipesan.id_pesanan')
            ->select('menu_dipesan.id_menu', 'menu_dipesan.jumlah', 'menu_dipesan.total_harga',)->where('pesanan.status', '=', 'selesai')
            ->get();

        return new PesananSelesaiResource(true, 'List Data Pesanan Selesai', $joinpesanan);
    }
}
