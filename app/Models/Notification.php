<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'notification';
    protected $guarded = ['id'];    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from',
        'to',
        'type',
        'description',
        'is_read',
        'link',
    ];

    public function from_user()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }

    public function to_user()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }
}
