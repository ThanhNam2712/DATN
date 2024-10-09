<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_method',
        'amount',
        'status',
    ];
    public function Order(){
        return $this->belongsTo(Order::class);
    }
    public function Order_Items(){
        return $this->hasMany(OrderItem::class);
    }
}
