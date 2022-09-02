<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(Plan $plan){

        $plans = Plan::with('details')->orderBy('price', 'ASC')->get();

        return view('site.home.index', compact('plans'));
    }
}
