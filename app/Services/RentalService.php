<?php

namespace App\Services;

use App\Models\Rental;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class RentalService
{
    public static function getRentals()
    {
        return Rental::where('rentals.cancelled', '=', false)
            ->select(
                'rentals.id',
                'customers.email as customer_name',
                'subscriptions.name as subscription_name',
                'rentals.start_date',
                'rentals.end_date',
                'rentals.created_at',
                'bikes.serial_number as serial_number',
                'bikes.status_id as bike_status_id',
                'statuses.name as bike_status_name'
            )->join("customers", "customers.id", "=", "rentals.customer_id")
            ->join("subscriptions", "subscriptions.id", "=", "rentals.subscription_id")
            ->join("bikes", "bikes.id", "=", "rentals.bike_id")
            ->join("statuses", "statuses.id", "=", "bikes.status_id")
            ->orderBy('rentals.created_at', 'DESC')
            ->get()
            ->toArray();
    }

    public static function rentalsWithCancelled()
    {
        return Rental::select(
            'rentals.id',
            'customers.email as customer_name',
            'subscriptions.name as subscription_name',
            'rentals.start_date',
            'rentals.end_date',
            'rentals.created_at',
            'bikes.serial_number as serial_number',
            'bikes.status_id as bike_status_id'
        )->join("customers", "customers.id", "=", "rentals.customer_id")
            ->join("subscriptions", "subscriptions.id", "=", "rentals.subscription_id")
            ->join("bikes", "bikes.id", "=", "rentals.bike_id")
            ->orderBy('rentals.created_at', 'DESC')
            ->get()->toArray();
    }


    public static function getRental($id)
    {
        return DB::table('rentals')
            ->where('id', '=', $id)
            ->get();
    }

    public static function destroyRental($id)
    {
        return DB::table('rentals')
            ->where('id', '=', $id)
            ->delete();
    }


    public static function getRentalsForCustomer()
    {
        return Rental::where('rentals.cancelled', false)
            ->where('rentals.customer_id', auth()->user()->id)
            ->select(
                'rentals.id',
                'rentals.start_date',
                'rentals.end_date',
                'bikes.serial_number',
                'bike_models.extra_price',
                'bike_models.image',
                'bike_models.name as model_name',
                'trademarks.name as trademark_name',
            )
            ->join("bikes", "bikes.id", "=", "rentals.bike_id")
            ->join("bike_models", "bike_models.id", "=", "bikes.bike_model_id")
            ->join("trademarks", "trademarks.id", "=", "bike_models.trademark_id")
            ->get();


    }

    /**
     * Retourne la liste des modèles de vélo disponibles pour le client en fonction de son abonnement.
     * @return Collection
     */
    public static function getBikeModelsForCustomerList(): Collection
    {
        $bikeModels = DB::table('bike_models')->where('disabled', false);
        if (auth()->user()->subscription("Basique")) {
            $bikeModels = $bikeModels
                ->where('category_id', '!=', 2)
                ->where('category_id', '!=', 4); // tout sauf les vélos électriques et pliables
        } else if (auth()->user()->subscription("Confort")) {
            $bikeModels = $bikeModels
                ->where('category_id', '!=', 4); //tout sauf les vélos électriques
        }

        return $bikeModels->orderBy('name')->get();
    }
}
