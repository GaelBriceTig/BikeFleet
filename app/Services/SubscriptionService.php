<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Customer;
use App\Http\Livewire\CustomerForm;
use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Support\Facades\Hash;
use JetBrains\PhpStorm\NoReturn;
use function PHPUnit\Framework\isNull;
use Laravel\Cashier\Cashier;

class SubscriptionService
{

    public static function currentCustomerHasActiveSubscription()
    {
        $user = auth()->user();
        $customer = Customer::where('email', '=', $user->email)->first();
        if (isNull($customer)) null;
        return $customer->subscriptions->count() > 0;
    }

    public static function getPlan($stripe_price)
    {

        return Plan::where('stripe_plan', '=', $stripe_price)->first();

    }

    public static function refreshSubscriptions()
    {
        $subs = Customer::where('id', '=', 1)->first()->subscriptions;
        foreach ($subs as $sub) {
            $sub->active();
        }
    }

    public static function getSubscriptions()
    {
        return Subscription::where('stripe_status', '=', 'active')->select(
            'subscriptions.id',
            'subscriptions.name',
            'customers.email as customer_name',
            'subscriptions.stripe_status',
            'subscriptions.ends_at',
            'subscriptions.created_at',
        )->join("customers", "customers.id", "=", "subscriptions.customer_id")
            ->get()->toArray();

    }

    public static function getSubscriptionsWithInactive()
    {
        return Subscription::select(
            'subscriptions.id',
            'subscriptions.name',
            'customers.email as customer_name',
            'subscriptions.stripe_status'
        )->join("customers", "customers.id", "=", "subscriptions.customer_id")
            ->get()->toArray();

    }

    public static function getCategory($id)
    {
        return Category::where('id', $id)->first();
    }

    public static function disable($id)
    {
        $bikeModel = Category::where('id', $id)->first();
        $bikeModel->disabled = true;
        $bikeModel->save();
    }

    public static function enable($id)
    {
        $bikeModel = Category::where('id', $id)->first();
        $bikeModel->disabled = false;
        $bikeModel->save();
    }
}


