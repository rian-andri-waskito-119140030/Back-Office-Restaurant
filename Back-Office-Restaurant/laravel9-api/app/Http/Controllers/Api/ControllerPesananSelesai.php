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
        // $pesananselesai = Pesanan::select('*')
        //     ->where('status', '=', 'selesai')
        //     ->orderBy('waktu_pesan')
        //     ->groupBy('id_pesanan')
        //     ->get();
        // dd($pesananselesai);
        $pesananselesai = Pesanan::oldest();
        if ($request->ajax()) {
            $pesananselesai = Pesanan::with(['menu_dipesan', 'meja'])
                ->whereIn('status', ['selesai'])
                ->orderBy('waktu_pesan')
                ->groupBy('id_pesanan')
                ->get();
            return DataTables::of($pesananselesai)
                ->addColumn('total_harga', function ($row) {
                    $harga = 'Rp. ' . number_format($row->total_harga, 0, ',', '.');
                    return $harga;
                })
                ->addColumn('action', 'detail')
                ->rawColumns(['total_harga', 'action'])
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

    public function detail(Pesanan $pesananselesai)
    {
        // $pesananselesai = Pesanan::with(['menu_dipesan', 'meja'])
        //     ->whereIn('status', ['selesai'])
        //     ->orderBy('waktu_pesan')
        //     ->get();
        // dd($pesananselesai);
        return view('detail_pesanan', compact('pesananselesai'));
    }

    public function show(Request $request)
    {
        $joinpesanan = DB::table('pesanan')
            ->join('menu_dipesan', 'pesanan.id_pesanan', '=', 'menu_dipesan.id_pesanan')
            ->select('menu_dipesan.id_menu', 'menu_dipesan.jumlah', 'menu_dipesan.total_harga',)->where('pesanan.status', '=', 'selesai')
            ->get();

        return new PesananSelesaiResource(true, 'List Data Pesanan Selesai', $joinpesanan);
    }

    public function tampil($id_pesanan)
    {
        $pesananselesai = Pesanan::find($id_pesanan);
        $pesananselesai = Pesanan::with(['menu_dipesan', 'meja'])
            ->whereIn('status', ['selesai'])
            ->orderBy('waktu_pesan')
            ->groupBy('id_pesanan')
            ->get();

        return response()->json([
            'status' => 'success',
            'pesananselesai' => $pesananselesai,
        ]);
    }
}
