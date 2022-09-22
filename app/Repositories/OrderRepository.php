<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{

    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function createNewOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        string $comment,
        $clientId = ''
    )
    {
        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'tenant_id' =>$tenantId,
            'comment' => $comment
        ];

        if($clientId) $data['client_id'] = $clientId;
        $order = $this->entity->create($data);

        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }



}
