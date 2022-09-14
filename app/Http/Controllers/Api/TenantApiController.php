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

    public function index()
    {
        return TenantResource::collection($this->TenantService->getAllTenants());
    }
    public function getTenantByUuid($uuid)
    {
        $tenant = $this->TenantService->getTenantByUuid($uuid);
        return new TenantResource($tenant);
    }
}
