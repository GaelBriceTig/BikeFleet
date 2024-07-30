<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;
use App\Models\Rental;
use App\Models\RentalBike;
use App\Services\BikeService;
use App\Services\RentalService;
use Carbon\Carbon;
use Eloquent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;

/**
 * RentalController
 *
 * @mixin Eloquent
 */
class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function bikeModels()
    {
        $models = RentalService::getBikeModelsForCustomerList();
        return view('customer.bikes', compact('models'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function rental($id)
    {
        $model = DB::table('bike_models')
            ->where('id', '=', $id)
            ->first();

        $materials = DB::table('materials')
            ->where('disabled', '=', false)
            ->orderBy('name')
            ->get();

        return view('customer.rental', compact('model', 'materials'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRentalRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(StoreRentalRequest $request)
    {
        $form_values = $request->validate([
            'bike_model_id' => ['required'],
            'start_datetime' => ['required'],
            'duration' => ['required']
        ]);
//        $models = BikeService::getBikesForModel($request->bike_model_id);

        $date = Carbon::parse($form_values['start_datetime']);
        $startDate = $date;
        $endDate = $date->addDays($form_values['duration']);
        $bikes = BikeService::getAvailableBikesForRental($form_values['bike_model_id'], $form_values['start_datetime'], $form_values['duration']);


        if (count($bikes) == 0) {
            return view('customer.no_bike_found');

        }
        $bike = $bikes[0];
        $rental = [
            'customer_id' => auth()->user()->id,
            'subscription_id' => auth()->user()->subscriptions()->first()->id,
            'start_date' => Carbon::parse($form_values['start_datetime']),
            'end_date' => $endDate,
            'cancelled' => false,
            'bike_id' => $bike->id,
        ];
        $rental_id = Rental::create($rental)->id;
        return redirect(route('customer.dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $rental = RentalService::getRental($id);
        return view('customer.rental', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Rental $rental
     * @return Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateRentalRequest $request
     * @param Rental $rental
     * @return Response
     */
    public function update(UpdateRentalRequest $request, Rental $rental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(int $id)
    {
        RentalService::destroyRental($id);
        return redirect(route('customer.dashboard'));
    }
}
