<?php

namespace App\Http\Controllers\Api;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FeedbackResource;

class UjiFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return new FeedbackResource(true, 'Success, data feedback pelanggan', $feedbacks);
    }
    public function show($id)
    {
        $feedback = Feedback::find($id);
        $feedback = Feedback::with('pesanan', 'pesanan.menu_dipesan')->where('id_feedback', $id)->get();
        if ($feedback) {
            return new FeedbackResource(true, 'Success, data feedback pelanggan berdasarkan id feedback', $feedback);
        } else {
            return new FeedbackResource(false, 'Failed, data feedback pelanggan tidak ditemukan', null);
        }
    }
}
