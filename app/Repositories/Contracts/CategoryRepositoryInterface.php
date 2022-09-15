<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoriesByUuid(string $uuid);
    public function getCategoriesById(int $id);
    public function teste();
}
