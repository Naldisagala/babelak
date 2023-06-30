<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id');
    }

    public function tawar()
    {
        return $this->belongsTo(Tawar::class, 'id_tawar', 'id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'id_seller', 'id');
    }
    public function alamatSeller()
    {
        return $this->belongsTo(Alamat::class, 'id_seller', 'id_user');
    }
}
