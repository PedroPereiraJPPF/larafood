<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Services\TenantServices;
use Illuminate\Http\Request;

class TenantApiController extends Controller
{
    protected $TenantService;

    public function __construct(TenantServices $TenantService)
    {
        $this->TenantService = $TenantService;
    }

    public function index(Request $request)
    {
        $per_page = $request->get('per_page', 15);

        $tenants = $this->TenantService->getAllTenants($per_page);

        return TenantResource::collection($tenants);
    }
    public function getTenantByUuid($uuid)
    {
        if(!$tenant = $this->TenantService->getTenantByUuid($uuid))
        {
            return response()->json(['message' => 'not found'], 404);
        }
        return new TenantResource($tenant);
    }
}
