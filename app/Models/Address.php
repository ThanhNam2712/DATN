<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Province',
        'district',
        'Neighborhood',
        'Apartment',
        'status',
    ];
    public function User(){
        return $this->belongsTo(User::class);
    }
}
