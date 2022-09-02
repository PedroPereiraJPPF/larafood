<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
     protected $fillable = ['name', 'url', 'price', 'description'];


     // relacionamentos
     public function details(){
          return $this->hasMany(DetailPlan::class);
     }

     public function profiles(){
        return $this->belongsToMany(Profile::class);
     }

     public function tenants(){
        return $this->hasMany(Tenant::class);
     }

     public function search($filter = null)
     {
          $results = $this->where('name', 'LIKE', "%{$filter}%")
                         ->orWhere('description', 'LIKE', "%{$filter}%")
                         ->paginate();
          return $results;
     }

     public function profilesAvaliable(){
        $profiles = Profile::whereNotIn('id', function($query) {
            $query->select('plan_profile.profile_id');
            $query->from('plan_profile');
            $query->whereRaw("plan_profile.plan_id={$this->id}");
        })
        ->paginate();

        return $profiles;
     }
}
