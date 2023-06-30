<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id', 'id_user');
    }

}
