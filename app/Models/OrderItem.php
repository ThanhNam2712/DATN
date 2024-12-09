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
        'color_id',
        'size_id',
        'product_id',
    ];
    public function Order(){
        return $this->belongsTo(Order::class);
    }
    public function Payment(){
        return $this->belongsTo(Payment::class);
    }

    public function products(){
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function color(){
        return $this->belongsTo(ProductColor::class, 'color_id');
    }

    public function size(){
        return $this->belongsTo(ProductSize::class, 'size_id');
    }
    public function product_variants(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}
