<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Alamat;
use App\Models\Seller;
use App\Models\Tawar;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_seller',
        'nama_barang',
        'gambar',
        'deskripsi',
        'harga',
        'status_barang',
        'status_tawar',
        'stock',
        'address',
        'id_village',
        'postcode',
        'usage',
        'method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_seller', 'id');
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id_seller', 'id_user');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class, 'id_seller', 'id_user');
    }

    public function tawar()
    {
        return $this->hasMany(Tawar::class, 'id_barang', 'id');
    }
}
