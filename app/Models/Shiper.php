<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shiper extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'email',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

}
