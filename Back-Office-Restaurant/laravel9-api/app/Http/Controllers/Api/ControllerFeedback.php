<?php

namespace App\Http\Controllers\Api;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use DataTables;

class ControllerFeedback extends Controller
{
    public function index(Request $request)
    {
        $pesanan = DB::table('menu_dipesan')
            ->join('pesanan', 'menu_dipesan.id_pesanan', '=', 'pesanan.id_pesanan')
            ->join('menu', 'menu_dipesan.id_menu', '=', 'menu.id_menu')
            ->select('menu_dipesan.jumlah', 'menu.nama_menu', 'pesanan.status', 'pesanan.waktu_pesan', 'pesanan.id_pesanan');
        $feedback = DB::table('feedback')
            ->joinSub($pesanan, 'pesanan', function ($join) {
                $join->on('feedback.id_pesanan', '=', 'pesanan.id_pesanan');
                $join->select('feedback.isi_feedback');
            })
            // ->select('menu.nama_menu', 'feedback.isi_feedback')

            ->get();
        if ($request->ajax()) {
            return DataTables::of($feedback)
                ->addIndexColumn()
                ->make(true);
        }

        return view('feedback');
    }
}
