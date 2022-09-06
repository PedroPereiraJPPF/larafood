<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'url', 'description',];

    protected static function booted()
    {

        // static::observe(TenantObserver::class);
    }

}
