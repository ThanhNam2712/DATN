<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon_user extends Model
{
    use HasFactory;
    protected $table = 'coupon_user';
    protected $fillable = [
        'user_id',
        'coupon_id',
    ];

}
