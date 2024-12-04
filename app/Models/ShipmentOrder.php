<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentOrder extends Model
{
    use HasFactory;
    protected $table = 'shipment_order';
    protected $fillable = [
        'shipments_1',
        'shipments_2',
        'shipments_3',
        'shipments_4',
        'shipments_5',
        'cancel',
        'order_id',
    ];
}
