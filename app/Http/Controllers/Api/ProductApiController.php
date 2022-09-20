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

    public function productsByTenant(request $request)
    {

        if($request->uuid == null)
        {
            return response()->json(['message', 'Tenant não encontrado'], 404);
        }

        $products = $this->productServices->getProductsByTenantUuid($request->uuid, $request->get('categories', []));

        return ProductResource::collection($products);
    }

    public function show($uuid)
    {
        if(!$product = $this->productServices->getProductByUuid($uuid))
        {
            return response()->json(['message', 'uuid invalida'], 404);
        }

        return new ProductResource($product);
    }
}
