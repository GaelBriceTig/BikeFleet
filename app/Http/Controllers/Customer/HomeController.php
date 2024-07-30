<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Services\SubscriptionService;

class HomeController extends Controller
{
    public function dashboard()
    {
        SubscriptionService::refreshSubscriptions();
        $currentUserId = auth()->user()->id;
        $customer = Customer::where('id', '=', $currentUserId)->firstOrFail();
        $activeSubscriptions = $customer->subscriptions()->active()->get();

        return view('customer.dashboard', compact('customer', 'activeSubscriptions'));
    }

    public function subscription()
    {
        return view('customer.subscription');
    }

    public function profile()
    {
        $currentUserId = auth()->user()->id;
        $customer = Customer::where('id', '=', $currentUserId)->firstOrFail();

        $activeSubscriptions = $customer->subscriptions()->active()->get();

        return view('customer.profile', compact('customer', 'activeSubscriptions'));
    }
}
