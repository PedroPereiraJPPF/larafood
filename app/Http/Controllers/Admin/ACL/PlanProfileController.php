<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Plan;

class PlanProfileController extends Controller
{
    protected $profile, $plan;

    public function __construct(Profile $profile, Plan $plan){
        $this->profile = $profile;
        $this->plan = $plan;
    }

    public function profiles($idPlan){

        $plan =$this->plan->with('profiles')->find($idPlan);

        if(!$plan){
            return redirect()->back();
        }

        $profiles = $plan->profiles;

        return view('admin.pages.plans.profiles.profile', compact('profiles', 'plan'));
    }

    public function profilesAvaliable($idPlan){

        if(!$plan = $this->plan->with('profiles')->find($idPlan)){
            return redirect()->back();
        }

        $profiles = $plan->profilesAvaliable();

        return view('admin.pages.plans.profiles.avaliable', compact('profiles', 'plan'));
    }

    public function attachPlanProfile(Request $request, $idPlan){

        $plan = $this->plan->with('profiles')->find($idPlan);
        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plan.profile.show', $plan->id);
    }

    public function detachPlanProfile($idPlan, $idProfile){
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        $plan->profiles()->detach($profile);

        return redirect()->route('plan.profile.show', $plan->id);
    }
}
