<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'keranjangs';
    protected $guarded = ['id'];    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_barang',
        'id_user',
        'gambar',
        'id_tawar',
        'aktif',
        'id_seller',
        'status'
    ];

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

    public function user_seller()
    {
        return $this->belongsTo(User::class, 'id_seller', 'id');
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
