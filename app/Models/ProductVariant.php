<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'product_id',
        'product_size_id',
        'product_color_id',
        'price_sale',
        'price',
        'quantity',
    ];
    public function Cart_Item(){
        return $this->hasMany(CartItem::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id');
    }

    public function size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function image()
    {
        return $this->hasMany(Gallery::class, 'variant_id');
    }
}

