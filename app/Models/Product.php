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
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed();
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }

    public function variant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function averageRating()
    {
        return $this->review()->avg('rating');
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
        return $this->belongsToMany(Tag::class);
    }

    public function comment()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
