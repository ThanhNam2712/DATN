<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
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
    public function Brand()
    {
        return $this->hasOne(Brand::class);
    }
    public function Sizes()
    {
        return $this->belongsToMany(ProductSize::class);
    }
    public function Colors()
    {
        return $this->belongsToMany(ProductColor::class);
    }
    public function Tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
