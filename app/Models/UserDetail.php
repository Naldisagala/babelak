<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_detail';
    protected $guarded = ['id'];    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user',
        'nik',
        'telephone',
        'institute',
        'address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
