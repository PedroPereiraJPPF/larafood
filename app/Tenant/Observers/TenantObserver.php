<?php

namespace App\Tenant\Observers;
use App\Tenant\ManagerTenant;
use Illuminate\Database\Eloquent\Model;

class TenantObserver{
    public function creating(Model $model){
        $managerTenant = app(ManagerTenant::class);
        $identify = $managerTenant->getTenantIdentify();

        if($identify)
            $model->tenant_id = $identify;
    }
}
