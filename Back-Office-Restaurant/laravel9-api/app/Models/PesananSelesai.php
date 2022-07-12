<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananSelesai extends Model
{
    use HasFactory;
    protected $table = 'pesanan_selesai';
    protected $primaryKey = 'id_pesanan_selesai';
    protected $fillable = ['id_tiket'];
}
