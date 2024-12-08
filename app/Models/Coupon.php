<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'discount_type',
        'discount_value',
        'expiration_date',
        'start_end',
        'user_id',
        'minimum_order_amount',
<<<<<<< HEAD
        'number',
=======
>>>>>>> 83969eb20678122d948ebcc42d9e6ec02f52cd71
    ];
}
