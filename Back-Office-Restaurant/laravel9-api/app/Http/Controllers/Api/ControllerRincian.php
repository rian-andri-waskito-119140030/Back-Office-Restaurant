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

class ControllerRincian extends Controller
{
    public function rincian(Feedback $rincian)

    {
        //$detail_feedback_pesanan = Feedback::find($detail_feedback_pesanan->id_feedback);
        return view('rincian', compact('rincian'));
    }
    public function show(Feedback $rincian)
    {
        $rincian = Feedback::with(['pesanan', 'pesanan.menu_dipesan'])
            ->where('id_feedback', $rincian->id_feedback)
            ->get();
        // dd($rincian);
        return view('rincian', compact('rincian'));
    }
}
