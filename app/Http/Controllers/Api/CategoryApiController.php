<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CategoryServices;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    public function categoriesByTenant(Request $request)
    {
        return $this->categoryServices->getCategoriesByUuid($request->uuid);
    }
}
