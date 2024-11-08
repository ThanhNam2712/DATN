<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'sdt',
        'password',
        'role_id',
        'sdt',
        'status',
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
        'password' => 'hashed',
    ];
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
    public function Wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function Carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function role()
{
    return $this->belongsTo(Role::class);
}
}
