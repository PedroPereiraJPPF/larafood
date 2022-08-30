<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Permission;

class PermissionProfileController extends Controller
{
    protected $profile, $permissions;

    public function __construct(Profile $profile, Permission $permission){
        $this->profile = $profile;
        $this->permission = $permission;
    }

    public function permissions($idProfile){

        $profile = $this->profile->with('permissions')->find($idProfile);

        if(!$profile){
            return redirect()->back();
        }

        $permissions = $profile->permissions;

        return view('admin.pages.profiles.permissions.permissions', compact('profile', 'permissions'));
    }

    public function permissionsAvaliable($idProfile){

        if(!$profile = $this->profile->with('permissions')->find($idProfile)){
            return redirect()->back();
        }

        $permissions = $profile->permissionAvaliable();

        return view('admin.pages.profiles.permissions.avaliable', compact('profile', 'permissions'));
    }


    public function attachPermissionsProfile(Request $request, $idProfile){

        if(!$profile = $this->profile->with('permissions')->find($idProfile)){
            return redirect()->back();
        }

        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()
            ->back()
            ->with('info', 'selecione uma permissão');
        }

        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profile.permissions', $profile->id);
    }

}
