<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'user_id',
        'refund_amount',
        'reason',
        'status',
        'processed_at',
    ];

    public function items()
    {
        return $this->hasMany(RefundItem::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

