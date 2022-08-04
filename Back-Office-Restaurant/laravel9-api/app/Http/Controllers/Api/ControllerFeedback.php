<?php

namespace App\Http\Controllers\Api;

use App\Models\Feedback;
use App\Models\Pesanan;
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
        // $pesanan = DB::table('menu_dipesan')
        //     ->join('pesanan', 'menu_dipesan.id_pesanan', '=', 'pesanan.id_pesanan')
        //     ->join('menu', 'menu_dipesan.id_menu', '=', 'menu.id_menu')
        //     ->select('menu_dipesan.jumlah', 'menu.nama_menu', 'pesanan.status', 'pesanan.waktu_pesan', 'pesanan.id_pesanan')
        //     ->groupBy('pesanan.id_pesanan');
        // $feedback = DB::table('feedback')
        //     ->joinSub($pesanan, 'pesanan', function ($join) {
        //         $join->on('feedback.id_pesanan', '=', 'pesanan.id_pesanan');
        //         $join->select('feedback.id_feedback', 'feedback.isi_feedback');
        //         $join->orderBy('feedback.created_at');
        //     })
        // ->select('menu.nama_menu', 'feedback.isi_feedback')

        //     ->get();

        //dd($feedback);
        if ($request->ajax()) {
            $feedback = Feedback::with(['pesanan', 'pesanan.menu_dipesan'])->get();
            return DataTables::of($feedback)
                ->addIndexColumn()
                ->addColumn('id_feedback', function ($row) {
                    $id_feedback = number_format($row->id_feedback, 0, ',', '.');
                    return $id_feedback;
                })
                ->addColumn('action', 'button')
                ->rawColumns(['action', 'id_feedback'])
                ->make(true);
        }

        return view('feedback');
    }
    // public function tampilfeed(Feedback $feedback_pesanan)
    // {
    //     return view('tampil_feedback', compact('feedback_pesanan'));
    // }
    // public function show(Feedback $feedback_pesanan)
    // {
    //     $feedback_pesanan = Feedback::with(['pesanan', 'pesanan.menu_dipesan'])
    //         ->where('id_feedback', $feedback_pesanan->id_feedback)
    //         ->get();
    //     dd($feedback_pesanan);
    //     return view('tampil_feedback', compact('feedback_pesanan'));
    // }
}
