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

    public function order($request, array $param = [])
    {
        $orderDestination = $this->destination(new Destination, $request->destinationName, $request->destinationAddress);
        $orderOrigin      = $this->origin(new Origin, $request->originName, $request->originAddress);
        $orderAddress     = $this->address(new Address, $orderOrigin->id, $orderDestination->id, $request->type);

        $uid = (auth('api')->id()) ? auth('api')->id() : (Auth::id()) ? Auth::id() : 0;

        return $this->orderRepository->order($request->name, $request->reference, $request->contact, $uid, $orderAddress->id);

    }

    public function address($address, $originId, $destinationId, $type)
    {
        return $address($originId, $destinationId, $type);
    }

    public function destination($destination, $name, $address)
    {
        return $destination($name, $address);
    }

    public function origin($origin, $name, $address)
    {
        return $origin($name, $address);
    }

    public function orderHistory()
    {
        return $this->orderRepository->orderHistory();
    }
}
