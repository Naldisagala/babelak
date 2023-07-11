<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cart',
        'id_user',
        'code_payment',
        'number_payment',
        'total',
        'status',
        'active',
        'note',
        'bukti',
        'description',
        'resi',
    ];

    public function keranjang()
    {
        return $this->belongsTo(Keranjang::class, 'id_cart');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
