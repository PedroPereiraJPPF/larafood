<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryServices
{
    Protected $categoryRepository, $tenantRepository;

     public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        TenantRepositoryInterface $tenantRepository
        )
     {
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository = $tenantRepository;
     }
     public function getCategoriesByUuid(string $uuid)
     {
        // dd($this->tenantRepository->getTenantByUuid('fb3d6cb2-bc8f-4741-ab53-a4e1e70085df'));
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);
        return $this->categoryRepository->getCategoriesById($tenant->id);
     }



}
