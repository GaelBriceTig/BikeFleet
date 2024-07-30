<?php

namespace App\Http\Controllers\Admin;

use App\Models\BikeModel;
use App\Models\Plan;
use App\Models\Rental;
use App\Models\Customer;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::all();

        return view('admin.subscription.subscriptions', compact('subscriptions'));
    }

    public function add()
    {
        $customers=Customer::select('id','name')->orderBy('name')->get();
        return view('admin.subscription.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'price' => 'required',
        ]);

        Subscription::create($request->all());

        return redirect()->route('admin.subscriptions')
            ->with('success','Subscription created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        return view('subscription.show', compact('subscription'));

    }
    public function edit(Subscription $subscription)
    {
        $customer = Customer::select('id', 'name')->orderBy('name')->get();
        return view('admin.subscription.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'description' => 'required',
            'price' => 'required',
        ]);

        Subscription::create($request->all());

        return redirect()->route('subscription.index')
            ->with('success','Subscription updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscription.index')
                ->with('success','Subscription deleted successfully');
    }
}