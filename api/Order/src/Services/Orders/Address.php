<?php
/**
 * Address.php
 * Created by @anonymoussc on 03/27/2018 1:44 AM.
 */

namespace Api\Order\Services\Orders;

use Api\Order\Models\OrderAddress;

class Address
{
    public function __invoke($originId, $destinationId, $type, array $param = [])
    {
        $address = new OrderAddress;
        $address->fill(['order_origin_id' => $originId, 'order_destination_id' => $destinationId, 'type_id' => $type]);
        $address->save();

        return $address;
    }
}