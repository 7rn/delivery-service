<?php

namespace Api\Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDestination extends Model
{
    protected $fillable = ['name', 'address'];
    protected $table    = 'order_destination';
}
