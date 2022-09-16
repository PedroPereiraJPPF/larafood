<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryServices;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function categoriesByTenant(request $request)
    {
        if (!$request->uuid){
            return response()->json(['message', 'Token not found'], 404);
        }

        $categories = $this->categoryServices->getCategoriesByUuid($request->uuid);
        // essa chamada é usada em collections
        return CategoryResource::collection($categories);
    }

    public function show(request $request, $url)
    {
        if(!$request->url)
        {
            return response()->json(['message', 'Token not found'], 404);
        }

        $category = $this->categoryServices->getCategoryByUrl($url);
        return new CategoryResource($category);
    }
}
