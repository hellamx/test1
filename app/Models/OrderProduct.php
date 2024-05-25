<?php

namespace App\Models;

use App\Events\OrderProductCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_products';

    protected $fillable = [
        'order_id',
        'product_id'
    ];

    public $timestamps = false;

    protected $dispatchesEvents = [
        'creating' => OrderProductCreated::class
    ];
}
