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

    public function profiles($idPermission){

        $permissions =$this->permission->with('profiles')->find($idPermission);

        if(!$permissions){
            return redirect()->back();
        }

        $profiles = $permissions->profiles;

        return view('admin.pages.profiles.profiles.profiles', compact('profiles', 'permissions'));
    }

    public function permissionsAvaliable(Request $request, $idProfile){

        if(!$profile = $this->profile->with('permissions')->find($idProfile)){
            return redirect()->back();
        }

        $filter = $request->except('_token');

        $permissions = $profile->permissionAvaliable($request->filter);

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

    public function detachPermissionsProfile($idProfile, $idPermission){
        $profile = $this->profile->find($idProfile);
        $permission = $this->permission->find($idPermission);

        if(!$profile || !$permission){
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->route('profile.permissions', $profile->id);
    }
}
