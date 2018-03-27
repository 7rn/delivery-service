<?php
/**
 * Origin.php
 * Created by @anonymoussc on 03/27/2018 1:42 AM.
 */

namespace Api\Order\Services\Orders;

use Api\Order\Models\OrderOrigin;

class Origin
{
    public function __invoke($name, $address, array $param = [])
    {
        $origin = new OrderOrigin;
        $origin->fill(['name' => $name, 'address' => $address]);
        $origin->save();

        return $origin;
    }
}