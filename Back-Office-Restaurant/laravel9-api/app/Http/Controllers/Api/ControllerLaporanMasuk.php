<?php

namespace App\Http\Controllers\Api;

use App\Models\LaporanMasuk;
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
        if ($request->ajax()) {
            $laporanmasuk = DB::table('laporan_masuk')->select('*')->get();
            return DataTables::of($laporanmasuk)
                // ->addColumn('action', function($laporanmasuk){
                //     return '<a href="'.route('laporanmasuk.edit', $laporanmasuk->id_laporanmasuk).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                // })
                // ->rawColumns(['action'])
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

    public function edit(Request $request, $id_laporan_masuk)
    {
        date_default_timezone_set('Asia/Jakarta');

        if ($request->has('hari')) {
            $laporanmasuk = LaporanMasuk::find($id_laporan_masuk);
            $laporanmasuk->hari = $request->hari;
            $laporanmasuk->save();
        } elseif ($request->has('pemasukan')) {
            $laporanmasuk = LaporanMasuk::find($id_laporan_masuk);
            $laporanmasuk->pemasukan = $request->pemasukan;
            $laporanmasuk->save();
        } elseif ($request->has('tanggal')) {
            $laporanmasuk = LaporanMasuk::find($id_laporan_masuk);
            $laporanmasuk->tanggal = $request->tanggal;
            $laporanmasuk->save();
        }
        return new LaporanMasukResource(true, 'Data Laporan Masuk Diubah!', $laporanmasuk);
    }
}
