<?php

namespace App\Http\Controllers\Api;

use App\Models\LaporanMasuk;
use App\Models\Pesanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\LaporanMasukResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use DataTables;

class ControllerLaporanMasuk extends Controller
{
    public function index(Request $request)
    {
        //get posts
        $laporanmasuk = LaporanMasuk::oldest();

        //dd($laporanmasuk);
        if ($request->ajax()) {
            $laporanmasuk = Pesanan::select(
                "id_pesanan",
                DB::raw("(sum(total_harga)) as total_harga"),
                DB::raw("(DATE_FORMAT(waktu_pesan, '%d-%m-%Y')) as tanggal")
            )
                ->orderBy('waktu_pesan')
                ->groupBy(DB::raw("DATE_FORMAT(waktu_pesan, '%d-%m-%Y')"))
                ->get();
            return DataTables::of($laporanmasuk)
                ->addColumn('total_harga', function ($row) {
                    $harga = 'Rp. ' . number_format($row->total_harga, 0, ',', '.');
                    return $harga;
                })
                ->rawColumns(['total_harga'])

                ->addIndexColumn()
                ->make(true);
        }

        //dd($laporanmasuk);

        //return collection of posts as a resource
        return view('laporan');
    }

    public function store(Request $request)
    {

        date_default_timezone_set('Asia/Jakarta');
        //define validation rules
        $validator = Validator::make($request->all(), [
            'hari'     => 'required',
            'pemasukan'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $laporanmasuk = new LaporanMasuk;
        $laporanmasuk->hari = $request->hari;
        $laporanmasuk->tanggal = Carbon::now();
        $laporanmasuk->pemasukan = $request->pemasukan;
        $laporanmasuk->save();

        return redirect()->route('laporanmasuk.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function show($id_laporan_masuk)
    {
        $laporanmasuk = DB::select('SELECT * FROM laporan_masuk WHERE id_laporan_masuk = ?', [$id_laporan_masuk]);

        return new LaporanMasukResource(true, 'List Data Laporan Masuk', $laporanmasuk);
    }

    public function edit(LaporanMasuk $laporanmasuk)
    {
        return view('editlaporan', compact('laporanmasuk'));
    }

    public function update(Request $request, $id_laporan_masuk)
    {
        date_default_timezone_set('Asia/Jakarta');
        //define validation rules
        $validator = Validator::make($request->all(), [
            'hari'     => 'required',
            'pemasukan'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $laporanmasuk = LaporanMasuk::find($id_laporan_masuk);
        $laporanmasuk->hari = $request->hari;
        // $laporanmasuk->tanggal = Carbon::now();
        $laporanmasuk->pemasukan = $request->pemasukan;
        $laporanmasuk->save();

        return redirect()->route('laporanmasuk.index')->with('success', 'Menu berhasil diubah');
    }
    // {
    //     $laporan->update($request->all());
    //     return redirect()->route('laporanmasuk.index')->with('success', 'Menu berhasil diubah');
    // }

    public function delete(Request $request)
    {

        $laporanmasuk = LaporanMasuk::find($request->id_laporan_masuk);
        // dd($request->all());
        $laporanmasuk->delete();
        return Response()->json($laporanmasuk);
    }
}
