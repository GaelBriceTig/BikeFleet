<?php

namespace App\Policies;

use App\Models\Bike;
use App\Models\Customer;
use Illuminate\Auth\Access\HandlesAuthorization;

class BikePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any model.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Customer $customer)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Customer $customer, Bike $bike)
    {
        //
    }

    /**
     * Determine whether the user can create model.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Customer $customer)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Customer $customer, Bike $bike)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Customer $customer, Bike $bike)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Customer $customer, Bike $bike)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Customer  $customer
     * @param  \App\Models\Bike  $bike
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Customer $customer, Bike $bike)
    {
        //
    }
}
