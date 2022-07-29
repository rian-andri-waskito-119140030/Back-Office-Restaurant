<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = [
        'no_meja',
        'waktu_pesan',
        'status',
        'total_harga',
    ];

    public function menu_dipesan()
    {
        return $this->hasMany(Menu_dipesan::class, 'id_pesanan')->with('menu');
    }

}
