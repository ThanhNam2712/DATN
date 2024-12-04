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
        'province',
        'district',
        'ward',
        'address_detail',
        'phone_number',
        'coupon',
        'barcode',
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
    public function payment(){
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class, 'order_id');
    }
    public function shipmentOrder()
    {
        return $this->hasOne(ShipmentOrder::class, 'order_id');
    }


}
