<?php

namespace App\Tenant;

use Illuminate\Database\Eloquent\Model;

class TenantObserver{

    public function creating(Model $model){

        $managerTenant = app(ManagerTenant::class);
        $model->tenant_id = $managerTenant->getTenantIdentify();
    }
}
