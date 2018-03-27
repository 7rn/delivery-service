<?php

namespace Api\Order\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['name', 'reference', 'contact', 'user_id', 'order_address_id'];
    protected $table    = 'orders';
}
