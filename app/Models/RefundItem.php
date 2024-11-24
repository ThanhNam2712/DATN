<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefundItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'refund_id',
        'product_id',
        'quantity',
        'price',
    ];

    // Quan hệ với Refund
    public function refund()
    {
        return $this->belongsTo(Refund::class);
    }

    // Quan hệ với Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
