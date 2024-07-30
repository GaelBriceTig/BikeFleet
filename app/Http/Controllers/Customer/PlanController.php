<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::get();
        return view("customer.plans", [
            'plans' => $plans
        ]);
    }
    public function subscriptionResult()
    {
        return view('customer.subscription_success');
    }
    public function show(Plan $plan, Request $request)
    {
        $intent = auth()->user()->createSetupIntent();
        return view("customer.subscription", compact("plan", "intent"));
    }

    public function subscription(Request $request)
    {
        $plan = Plan::find($request->plan);
        $subscription = $request->user()
            ->newSubscription($plan->name, $plan->stripe_plan)
            ->create($request->token);
        return redirect(route('customer.subscription-result'));
    }


}
