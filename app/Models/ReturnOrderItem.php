<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_order_id',
        'return_product_id',
        'product_variant_id',
        'color',
        'size',
        'quantity',
        'price',
        'reason_item',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'return_product_id');
    }

    public function colorPro(){
        return $this->belongsTo(ProductColor::class, 'color');
    }
    public function sizePro(){
        return $this->belongsTo(ProductSize::class, 'size');
    }
    public function variantPro(){
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }


}
