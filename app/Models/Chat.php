<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'chat';
    protected $guarded = ['id'];    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from',
        'to',
        'id_tawar',
        'message',
        'is_read',
    ];

    public function tawar()
    {
        return $this->belongsTo(Tawar::class, 'id_tawar', 'id');
    }

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }

    public function chat_last($user_id)
    {
        return self::where('from','=', $user_id)
        ->orderBy('id', 'DESC')
        ->first();
    }
}
