<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'email',
        'payment_status',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function accountCoupon()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderDetail(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    public function Order_Items(){
        return $this->hasMany(OrderItem::class);
    }
    public function Payment(){
        return $this->hasOne(Payment::class);
    }
}
