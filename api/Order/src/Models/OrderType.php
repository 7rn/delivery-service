<?php

namespace Api\Order\Models;

use Illuminate\Database\Eloquent\Model;

class OrderType extends Model
{
    protected $fillable = ['name', 'description'];
    protected $table    = 'order_type';
}
