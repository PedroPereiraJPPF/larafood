<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService
{
    Protected $clientRepository;

     public function __construct(ClientRepositoryInterface $clientRepository)
     {
        $this->clientRepository = $clientRepository;
     }


     public function createNewClient(array $array)
     {
        return $this->clientRepository->createNewClient($array);
     }

}
