<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu_dipesan extends Model
{
    use HasFactory;
    protected $table = 'menu_dipesan';
    //protected $primaryKey = 'id_pesanan';
    protected $fillable = [
        'id_pesanan',
        'id_menu',
        'jumlah',
        'harga_peritem',

    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
