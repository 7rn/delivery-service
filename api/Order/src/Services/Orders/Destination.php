<?php
/**
 * Destination.php
 * Created by @anonymoussc on 03/27/2018 1:41 AM.
 */

namespace Api\Order\Services\Orders;

use Api\Order\Models\OrderDestination;

class Destination
{
    public function __invoke($name, $address, array $param = [])
    {
        $destination = new OrderDestination;
        $destination->fill(['name' => $name, 'address' => $address]);
        $destination->save();

        return $destination;
    }
}