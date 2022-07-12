<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasuk extends Model
{
    use HasFactory;
    protected $table = 'laporan_masuk';
    protected $primaryKey = 'id_laporan_masuk';
    protected $fillable = ['hari', 'tanggal','pemasukan'];
}
