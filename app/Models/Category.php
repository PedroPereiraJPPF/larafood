<?php

namespace App\Models;

use App\Tenant\Observers\TenantObserver as teste;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'url', 'description'];

    public function products(){
        $this->belongsToMany(Product::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::observe(teste::class);
    }

}
