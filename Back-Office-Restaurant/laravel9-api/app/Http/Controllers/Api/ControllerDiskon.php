<?php

namespace App\Http\Controllers\Api;

use App\Models\Diskon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DataTables;


class ControllerDiskon extends Controller
{
    public function index(Request $request)
    {
        $diskon = DB::table('diskon')
            ->join('menu', 'diskon.id_menu', '=', 'menu.id_menu')
            ->selectRaw('diskon.id_diskon, diskon.nama_diskon, diskon.diskon, menu.nama_menu, menu.harga_jual, menu.harga_jual * diskon.diskon AS harga_diskon')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($diskon)
                ->addColumn('harga_jual', function ($row) {
                    $harga = 'Rp. ' . number_format($row->harga_jual, 0, ',', '.');
                    return $harga;
                })
                ->addColumn('harga_diskon', function ($row) {
                    $harga = 'Rp. ' . number_format($row->harga_diskon, 0, ',', '.');
                    return $harga;
                })

                ->rawColumns(['harga_jual', 'harga_diskon'])

                ->addIndexColumn()
                ->make(true);
        }
        //dd($diskon);
        return view('tampildiskon');
    }
    // {
    //     $diskon = Diskon::all();
    //     dd($diskon);
    //     return response()->json($diskon);
    // }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_menu' => 'required',
            'nama_diskon' => 'required',
            'diskon' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $diskon = Diskon::create($request->all());
        return redirect()->route('diskon-menu.index')->with('success', 'Diskon berhasil ditambahkan');
    }
    public function show($id)
    {
        $diskon = Diskon::find($id);
        if (is_null($diskon)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }
        return response()->json($diskon);
    }
    public function update(Request $request, $id)
    {
        $diskon = Diskon::find($id);
        if (is_null($diskon)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }
        $diskon->update($request->all());
        return response()->json($diskon);
    }
    public function destroy($id)
    {
        $diskon = Diskon::find($id);
        if (is_null($diskon)) {
            return response()->json(['message' => 'Record not found!'], 404);
        }
        $diskon->delete();
        return response()->json(['message' => 'Record deleted!'], 200);
    }
    public function tampildiskon(Request $request)
    {
        $diskon = DB::table('diskon')
            ->join('menu', 'diskon.id_menu', '=', 'menu.id_menu')
            ->selectRaw('diskon.id_diskon, diskon.nama_diskon, diskon.diskon, menu.nama_menu, menu.harga_jual, menu.harga_jual * diskon.diskon AS harga_diskon')
            ->get();
        if ($request->ajax()) {
            return DataTable::of($diskon)
                // ->addColumn('action', function($diskon){
                //     return '<a href="diskon-menu/'.$diskon->id_diskon.'/edit" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                // })
                // ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        //dd($diskon);
        return view('tampildiskon');
    }
}
