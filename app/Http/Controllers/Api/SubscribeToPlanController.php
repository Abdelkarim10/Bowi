<?php

namespace App\Http\Controllers\Api;

use App\Models\Plan;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeToPlanController extends Controller
{
    
    public function showPlans()
    {
        $plan = Plan::all();
        return response(['plans' => $plan],201);
    }

    public function showUserPlan()
    {
        $userplan = Auth::user()->plan;
        return response(['user plan' => $userplan],201);
    }

    public function update(User $user)
    {
        
    }
}
