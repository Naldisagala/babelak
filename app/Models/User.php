<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Tawar;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hp',
        'role',
        'username',
        'is_seller',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tawar()
    {
        return $this->hasMany(Tawar::class, 'id_user', 'id');
    }

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id', 'id_user');
    }

    public function sum_product($id)
    {
        return Barang::where('id_seller', '=', $id)->count();
    }


    public function detail()
    {
        return $this->belongsTo(UserDetail::class, 'id', 'id_user');
    }

    public function isAdmin()
    {
        if($this->role === 'admin') { 
            return true; 
        } else { 
            return false; 
        }
    }

    public function isSeller()
    {
        if($this->role === 'seller' &&
            $this->is_seller == 1) { 
            return true; 
        } else { 
            return false; 
        }
    }

    public function isBuyer()
    {
        if($this->role === 'user') { 
            return true; 
        } else { 
            return false; 
        }
    }
}
