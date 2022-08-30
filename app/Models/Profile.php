<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['nome', 'description'];

    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }
    public function permissionAvaliable(){
        $permissions = permission::whereNotIn('id', function($query) {
            $query->select('permission_profile.permission_id');
            $query->from('permission_profile');
            $query->whereRaw("permission_profile.profile_id={$this->id}");
        })->paginate();

        return $permissions;
    }

}
