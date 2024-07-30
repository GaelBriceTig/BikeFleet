<?php

namespace App\Services;

use App\Models\Customer;
use App\Http\Livewire\CustomerForm;
use Illuminate\Support\Facades\Hash;

class CustomerService
{
    public static function createCustomer(CustomerForm $customerForm)
    {
        $customerForm->customer->fillable(array_merge($customerForm->customer->getFillable(), ["password"]));
        $customerForm->customer->fill([
            'firstname' => $customerForm->customer->firstname,
            'lastname' => $customerForm->customer->lastname,
            'email' => $customerForm->customer->email,
            'password' => Hash::make($customerForm->password_new)
        ]);
        $customerForm->customer->save();
    }

    public static function disableCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->disabled = true;
        $customer->save();
    }

    public static function enableCustomer($id)
    {
        $customer = Customer::find($id);
        $customer->disabled = false;
        $customer->save();
    }

    public static function getCustomer($id)
    {
        return Customer::find($id);
    }

    public static function hasActiveSubscription()
    {
        return auth()->user()->subscribed('Basique')
            || auth()->user()->subscribed('Confort')
            || auth()->user()->subscribed('Premium');
    }
}
