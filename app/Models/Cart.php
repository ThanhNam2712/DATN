<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'total_amuont'
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
    public function Cart_Items(){
        return $this->hasMany(CartItem::class);
    }

}
