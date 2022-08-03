<?php

namespace App\Http\Controllers\Api;

use App\Models\Pesanan;
use App\Models\Meja;
use App\Models\Menu_dipesan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PesananResource;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ControllerPesanan extends Controller
{
    public function index(Pesanan $pesanan)
    {
        //get posts
        $pesanan = Pesanan::oldest();
        //$pesanan = $pesanan->where('id_pesanan', $id_pesanan)->get();
        // $pesanan = DB::table('menu_dipesan')
        //     ->leftJoin('pesanan', 'menu_dipesan.id_pesanan', '=', 'pesanan.id_pesanan')
        //     ->join('menu', 'menu_dipesan.id_menu', '=', 'menu.id_menu')
        //     ->select('menu_dipesan.jumlah', 'menu.nama_menu', 'pesanan.status', 'pesanan.waktu_pesan', 'menu_dipesan.id_pesanan')
        //     ->whereIn('pesanan.status', ['di pesan', 'di masak'])
        //     ->orderBy('pesanan.waktu_pesan')
        //     ->get();

        $pesanan = Pesanan::with(['menu_dipesan', 'meja'])
            ->whereIn('status', ['di pesan', 'di masak'])
            ->orderBy('waktu_pesan')
            ->get();
        //dd($pesanan);

        // if (count($pesanan) > 0) {
        //     $pesanan = $pesanan->groupBy('id_pesanan');
        //     $pesanan = $pesanan->map(function ($item, $key) {
        //         $item = $item->map(function ($item, $key) {
        //             $item->jumlah = $item->jumlah;
        //             $item->nama_menu = $item->nama_menu;
        //             $item->status = $item->status;
        //             $item->waktu_pesan = $item->waktu_pesan;
        //             $item->id_pesanan = $item->id_pesanan;
        //             return $item;
        //         });
        //         return $item;
        //     });
        // }
        // $pesanan = []
        //dd($pesanan);
        //dd($pesanan);
        // $pesanan = DB::table('pesanan')
        //     ->leftJoin('menu_dipesan', 'menu_dipesan.id_pesanan', '=', 'pesanan.id_pesanan')
        //     ->select('menu_dipesan.*')
        //     ->get();


        // $pesanan = Pesanan::all();

        // $menu_dipesan = Menu_dipesan::all();

        // $menu = Menu::all();

        //dd([$pesanan, $menu_dipesan, $menu]);

        // foreach ($pesanan as $p) {

        //     foreach ($menu_dipesan as $mp) {

        //         foreach ($menu as $m) {

        //             if ($p->id_pesanan == $mp->id_pesanan) {

        //                 if ($mp->id_menu == $m->id_menu) {

        //                     echo $m->nama_menu . $mp->jumlah . $p->status;
        //                 }
        //             } else {
        //                 if ($mp->id_menu == $m->id_menu) {

        //                     echo $m->nama_menu . $mp->jumlah . $p->status;
        //                 }
        //             }
        //         }
        //     }
        // }

        // if ($pesanan->id_pesanan == $pesanan->id_pesanan) {
        //     dd($pesanan);
        // }
        // dd($pesanan->toArray());

        return response()->json([
            'status' => 'success',
            'pesanan' => $pesanan,
        ]);
        //return view('kitchendisplay', compact('pesanan'));
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
