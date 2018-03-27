<?php
/**
 * OrderRepository.php
 * Created by @anonymoussc on 03/25/2018 9:12 PM.
 */

namespace Api\Order\Repositories\Orders;

use Api\AppBase\Repositories\Repository;
use Api\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Api\Order\Models\Order;

class OrderRepository extends Repository implements OrderRepositoryInterface
{
    /**
     * @return mixed
     */
    protected function getModel()
    {
        return new Order;
    }

    public function order($name, $reference, $contact, $uid, $orderAddressId, array $param = [])
    {
        $orders = null;
        $order  = $this->getModel();
        $order->fill(['name' => $name, 'reference' => $reference, 'contact' => $contact, 'user_id' => $uid, 'order_address_id' => $orderAddressId]);

        if ($order->save()) {
            $orders = $this->getOrders()
                ->where('orders.id', '=', $order->id)
                ->get();
        }

        return $orders;
    }

    public function orderHistory()
    {
        return $this->getOrders()
            ->where('users.id', '=', auth('api')->id())
            ->get();
    }

    public function getOrders()
    {
        $getOrders = DB::table('orders')
            ->leftJoin('users', 'orders.user_id', '=', 'users.id')
            ->leftJoin('order_address', 'orders.order_address_id', '=', 'order_address.id')
            ->leftJoin('order_type', 'order_address.type_id', '=', 'order_type.id')
            ->leftJoin('order_origin', 'order_address.order_origin_id', '=', 'order_origin.id')
            ->leftJoin('order_destination', 'order_address.order_destination_id', '=', 'order_destination.id')
            ->select(
                'orders.name AS name', 'orders.reference', 'orders.contact',
                'order_type.name AS type_name', 'order_type.description AS type_description',
                'order_origin.name AS origin_name', 'order_origin.address AS origin_address',
                'order_destination.name AS destination_name', 'order_destination.address AS destination_address'
            );

        return $getOrders;
    }
}