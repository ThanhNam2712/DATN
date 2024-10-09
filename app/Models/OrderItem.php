<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_variant_id',
        'quantity',
        'price',
    ];
    public function Order(){
        return $this->belongsTo(Order::class);
    }
    public function Payment(){
        return $this->belongsTo(Payment::class);
    }
    public function product_variants(){
        return $this->belongsTo(ProductVariant::class);
    }
}
