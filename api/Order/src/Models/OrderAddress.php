<?php

namespace Api\Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = ['order_origin_id', 'order_destination_id', 'type_id'];
    protected $table    = 'order_address';
}
