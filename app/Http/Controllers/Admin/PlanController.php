<?php

namespace App\Http\Controllers\Admin;



use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePlan;
use Illuminate\Http\Request;
use App\Models\Plan;


class PlanController extends Controller
{
    private $repository;

    public function __construct(Plan $plan){
        $this->repository = $plan;
    }

    public function index(){
        $plans = $this->repository->paginate();
        return view('admin.pages.plans.index', [
            'plans' => $plans,
        ]);
    }

    public function create(){
        return view('admin.pages.plans.create');
    }

    public function store(StoreUpdatePlan $request){
        
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show($url){
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan){
            return redirect()->back();
        }
        return view('admin.pages.plans.show', [
            'plan' => $plan
        ]);
    }

    // deletar registros
    public function destroy($url){
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan){
            return redirect()->back();
        }

        $plan->delete();

        return redirect()->route('plans.index');
    }

    //edit
    public function edit($url){
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan){
            return redirect()->back();
        }

        return view('admin.pages.plans.edit',[
            'plan' => $plan
        ]);
    }
    //pesquisar registros
    public function search(Request $request){

        $filters = $request->except('_token');

        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters,
        ]);
    }
    // atualizar registros
    public function update(StoreUpdatePlan $request, $url){
        $plan = $this->repository->where('url', $url)->first();

        if(!$plan)
            return redirect()->back();

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
