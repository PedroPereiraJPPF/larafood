<?php

namespace App\Services;

use App\Models\Plan;
use App\Repositories\Contracts\TenantRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class TenantServices{
    private $plan ,$data = [];

    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repositoty = $repository;
    }

    public function make(Plan $plan,array $data)
    {
        $this->plan = $plan;
        $this->data = $data;
        $tenant = $this->storeTenant();
        $user = $this->storeUser($tenant);

        return $user;
    }

    public function storeTenant(){
        $data = $this->data;

        return $this->plan->tenants()->create([
            'cnpj' => $data['cnpj'],
            'name' => $data['empresa'],
            'email' => $data['email'],
            'subscription' => now(),
            'expires_at' => now()->addDays(7),

        ]);
    }

    public function storeUser($tenant){
        $data = $this->data;

        return $tenant->users()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

    }


}
