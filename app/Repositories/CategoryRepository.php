<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $entity;

    public function __construct(Category $category)
    {
        // dd(auth()->user());
        // dd($category->all());
        $this->entity = $category;
    }

    public function teste()
    {
        return 'opapaoa';
    }

    public function getCategoriesByUuid(string $uuid)
    {
        // return $this->entity
        //     ->join('tenants', 'tenants.id', '=', 'categories.tenant_id')
        //     ->where('tenants.uuid', $uuid)
        //     ->select('categories.*')->get();

    }
    public function getCategoriesById(int $id)
    {
        // dd($this->entity->where('tenant_id', '2'));
        return $this->entity->where('tenant_id', $id)->get();
    }
}
