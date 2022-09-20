<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProducts;
use App\Http\Resources\ProductResource;
use App\Services\ProductServices;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    protected $productServices;

    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }

    public function productsByTenant(StoreUpdateProducts $request)
    {

        if($request->uuid == null)
        {
            return response()->json(['message', 'Tenant não encontrado'], 404);
        }

        $products = $this->productServices->getProductsByTenantUuid($request->uuid, $request->get('categories', []));

        return ProductResource::collection($products);
    }

    public function show($flag)
    {
        if(!$product = $this->productServices->getProductByFlag($flag))
        {
            return response()->json(['message', 'flag invalida'], 404);
        }

        return new ProductResource($product);
    }
}
