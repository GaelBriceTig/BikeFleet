<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use App\Models\Customer;
use App\Services\SubscriptionService;
//use Cassandra\Custom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function index()
    {

    }


    public function cancel($id)
    {
        auth()->user()->subscription($id)->cancel();

        return redirect(route('customer.dashboard'));
    }

    public function resume($id)
    {
        auth()->user()->subscription($id)->resume();
        return redirect(route('customer.dashboard'));
    }


}
