<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    public function createNewClient(array $array);
    public function getClient(int $id);
}
