<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alamats';
    protected $guarded = ['id'];    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'provinsi',
        'kota',
        'kec',
        'kode_pos',
        'alamat',
        'jenis',
        'lat',
        'long',
    ];
}
