<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\String_;

class ClientRepository implements ClientRepositoryInterface
{

    protected $entity;

    public function __construct(Client $client)
    {
        $this->entity = $client;
    }

    public function createNewClient(array $array)
    {

        $array['password'] = bcrypt($array['password']);
        return $this->entity->create($array);
    }

    public function getClient(int $id)
    {

    }
}
