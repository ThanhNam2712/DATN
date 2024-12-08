<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
<<<<<<< HEAD
        'variant_id',
        'file_path',
    ];
    public function variant(){
        return $this->belongsTo(ProductVariant::class, 'variant_id');
=======
        'product_id',
        'file_path',
    ];
    public function Product(){
        return $this->belongsTo(Product::class);
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
    }
}

