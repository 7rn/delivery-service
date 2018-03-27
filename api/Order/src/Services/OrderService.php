<?php
/**
 * OrderService.php
 * Created by @anonymoussc on 03/25/2018 6:10 PM.
 */

namespace Api\Order\Services;

use Api\Order\Services\Orders\Address;
use Api\Order\Services\Orders\Destination;
use Api\Order\Services\Orders\Origin;
use Illuminate\Foundation\Application;
use Api\User\Exceptions\InvalidCredentialsException;
use Api\Order\Repositories\OrderRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class OrderService
{
    private $orderRepository;

    public function __construct(Application $app, OrderRepositoryInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function order($req, array $param = [])
    {
        $orderDestination = $this->destination($req->destinationName, $req->destinationAddress, new Destination);
        $orderOrigin      = $this->origin($req->originName, $req->originAddress, new Origin);
        $orderAddress     = $this->address($orderOrigin->id, $orderDestination->id, $req->type, new Address);

        $uid = (auth('api')->id()) ? auth('api')->id() : (Auth::id()) ? Auth::id() : 0;

        return $this->orderRepository->order($req->name, $req->reference, $req->contact, $uid, $orderAddress->id);

    }

    public function address($originId, $destinationId, $type, $address)
    {
        return $address($originId, $destinationId, $type);
    }

    public function destination($name, $address, $destination)
    {
        return $destination($name, $address);
    }

    public function origin($name, $address, $origin)
    {
        return $origin($name, $address);
    }

    public function orderHistory()
    {
        return $this->orderRepository->orderHistory();
    }
}
