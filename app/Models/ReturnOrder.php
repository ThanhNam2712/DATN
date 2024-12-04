<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'status',
        'reason',
        'refund_amount',
        'refund_method',
        'request_date',
        'processed_date',
        'processed_by',
    ];

    public function returnDetail()
    {
        return $this->hasMany(ReturnOrderItem::class, 'return_order_id');
    }

    public function returnDetaill()
    {
        return $this->hasOne(ReturnOrderItem::class, 'return_order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
