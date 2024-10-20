<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'image',
        'description',
        'content',
        'is_trending',
        'is_sale',
        'is_new',
        'is_show_home',
        'is_active',
    ];
    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function Wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function Galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function variant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }
    public function variants()
    {
        return $this->belongsToMany(ProductVariant::class, 'product_variants', 'product_id', 'variant_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(ProductSize::class);
    }
    public function colors()
    {
        return $this->belongsToMany(ProductColor::class);
    }
    public function tags()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
