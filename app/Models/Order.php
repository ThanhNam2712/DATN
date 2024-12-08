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
<<<<<<< HEAD
    public function Order_Items(){
        return $this->hasMany(OrderItem::class);
    }
=======
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
    public function Payment(){
        return $this->hasOne(Payment::class);
    }
}
