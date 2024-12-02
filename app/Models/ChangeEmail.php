<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeEmail extends Model
{
    use HasFactory;
    protected $table = 'change_email';
    protected $fillable = [
        'change_email',
        'processed_by',
        'request_date',
        'status',
        'reason',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }
}
