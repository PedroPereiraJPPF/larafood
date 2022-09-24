<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\StoreOrder;
use App\Http\Requests\api\TenantFormRequest;
use App\Http\Resources\OrderResource;
use App\Services\OrderServices as ServicesOrderServices;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    protected $orderService;

    public function __construct(ServicesOrderServices $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(StoreOrder $request)
    {
        $order = $this->orderService->createNewOrder($request->all());
        return new OrderResource($order);
    }

    public function show($identify)
    {
        $order = $this->orderService->getOrderByIdentify($identify);
        return new OrderResource($order);
    }

    public function myOrders()
    {
        $orders = $this->orderService->ordersByClient();

        return OrderResource::collection($orders);
    }

}
