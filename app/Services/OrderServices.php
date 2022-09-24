<?php

namespace App\Services;

use App\Repositories\Contracts\OrderRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class OrderServices
{
    protected $orderRepository, $tenantRepository;

    public function __construct(
        OrderRepositoryInterface $orderRepository,
        TenantRepositoryInterface $tenantRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->tenantRepository = $tenantRepository;
        $this->productRepository = $productRepository;
    }

    public function ordersByClient()
    {
        $idClient = $this->getClientByOrder();

        return $this->orderRepository->getOrdersByClientId($idClient);
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->orderRepository->getOrderByIdentify($identify);
    }

    public function createNewOrder(array $order)
    {
        $productsOrder = $this->getProductsByOrder($order['products'] ?? []);
        // string $identify,
        $identify = $this->getIdentifyOrder();
        // float $total,
        $total = $this->getTotalOrder($productsOrder);
        // string $status,
        $status = 'open';
        // int $tenantId,
        $tenantId = $this->getTenantIdByOrder($order['uuid']);
        //strin comment
        $comment = isset($order['comment']) ? $order['comment']: '';
        // $clientId = ''
        $clientId = $this->getClientByOrder();

        return $this->orderRepository->createNewOrder(
            $identify,
            $total,
            $status,
            $tenantId,
            $comment,
            $clientId
        );
    }

    private function getIdentifyOrder(int $qtyCaracters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date("Ymd") / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;


        $characters = $smallLetters.$numbers;

        $identify = substr(str_shuffle($characters), 0, $qtyCaracters);

        if($this->orderRepository->getOrderByIdentify($identify)){
            $this->getIdentifyOrder($qtyCaracters + 1);
        }

        return $identify;
    }

    private function getProductsByOrder(array $productsOrder)
    {
        $products = [];

        foreach($productsOrder as $productOrder)
        {
            $product = $this->productRepository->getProductByUuid($productOrder['identify']);

            array_push($products, [
                'id' => $product->id,
                'qty' => $productOrder['qty'],
                'price' => $product->price
            ]);
        }

        return $products;
    }

    private function getTotalOrder(array $products)
    {
        $total = 0;

        foreach ($products as $product) {
            $total += ($product['price'] * $product['qty']);
        }

        return $total;
    }


    private function getTenantIdByOrder(string $uuid):int
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $tenant->id;
    }

    private function getClientByOrder()
    {
        return auth()->check() ? auth()->user()->id: '';
    }


}
