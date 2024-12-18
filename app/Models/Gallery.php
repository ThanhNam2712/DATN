<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'variant_id',
        'file_path',
    ];
    public function variant(){
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}

