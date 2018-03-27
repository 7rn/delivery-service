<?php

namespace Api\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Api\Order\Requests\OrderRequest;
use Api\Order\Services\OrderService;
use Api\Order\Http\Controllers\Controller as BaseController;

class OrderController extends BaseController
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order(OrderRequest $request)
    {
        try {
            $record = $this->orderService->order($request);
        }
        catch (\Exception $error) {
            self::logMessage($error);

            return response()
                ->error($error->getMessage(), $error->getCode(), $error->getTraceAsString())
                ->setStatusCode(500);
        }

        $records = (!$record)
            ? response()->fail([
                'result'  => $record,
                'message' => 'Order failed to save',
            ])
            : response()->success([
                'result'  => $record,
                'message' => 'Order successfully saved',
            ]);

        return $records;
    }

    public function orderHistory(Request $request)
    {
        try {
            $record = $this->orderService->orderHistory($request);
        }
        catch (\Exception $error) {
            self::logMessage($error);

            return response()
                ->error($error->getMessage(), $error->getCode(), $error->getTraceAsString())
                ->setStatusCode(500);
        }

        $records = (!$record)
            ? response()->fail([
                'result'  => $record,
                'message' => 'Order history failed to load',
            ])
            : response()->success([
                'result'  => $record,
                'message' => 'Order history successfully loaded',
            ]);

        return $records;
    }
}
