<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiketPesanan extends Model
{
    use HasFactory;
    protected $table = 'tiket_pesanan';
    protected $primaryKey = 'id_tiketpesanan';
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'status_pesanan',
    ];
}
