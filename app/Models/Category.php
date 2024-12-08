<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image',
    ];
<<<<<<< HEAD
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
=======
    public function Products(){
        return $this->hasMany(Product::class);
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
    }
}
