<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sellers';
    protected $guarded = ['id'];    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'nama_toko',
        'saldo',
        'rekening',
        'type',
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id', 'id_user');
    }

}
