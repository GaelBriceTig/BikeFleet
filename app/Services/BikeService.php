<?php

namespace App\Services;

use App\Models\Bike;
use App\Models\BikeModel;
use App\Models\Rental;
use App\Models\RentalBike;
use Illuminate\Support\Facades\DB;

class BikeService
{
    const BASIC_PLAN = 'Basique';
    const COMFORT_PLAN = 'Confort';
    const PREMIUM_PLAN = 'Premium';

    public static function getAvailableBikesForRental(int $bike_model_id, $start_datetime, $duration): array
    {
        $rentableBikes = array();
//        $availableBikeModels = RentalService::getBikeModelsForCustomerList();
        $bikeModels = BikeModel::where('disabled', false)
            ->where('id', $bike_model_id)->first();

        if (!is_null($bikeModels)) {
            $bikesForModel = $bikeModels->bikes()
                ->where('disabled', false)
                ->get();
            foreach ($bikesForModel as $bike) {
                if ($bike->hasRentalBike($bike->id, $start_datetime, $duration) == 0) {
                    $rentableBikes[] = $bike;
                }
            }
        }
        return $rentableBikes;
    }

    public static function getBikesForModel(int $model_id)
    {
        return Bike::where('bike_model_id', $model_id)->get();
    }

    public static function getBikes()
    {
        return Bike::where('bikes.disabled', '=', false)->select(
            'bikes.id',
            'bikes.serial_number',
            'bike_models.name as bike_model_name',
            'statuses.name as status_name',
            'bikes.disabled',
            'bikes.manufacture_date'
        )->join("bike_models", "bike_models.id", "=", "bikes.bike_model_id")
            ->join("statuses", "statuses.id", "=", "bikes.status_id")
            ->get()->toArray();
    }

    public static function getBikesWithDisabled()
    {
        return Bike::select(
            'bikes.id',
            'bikes.serial_number',
            'bike_models.name as bike_model_name',
            'statuses.name as status_name',
            'bikes.disabled',
            'bikes.manufacture_date'
        )->join("bike_models", "bike_models.id", "=", "bikes.bike_model_id")
            ->join("statuses", "statuses.id", "=", "bikes.status_id")
            ->get()->toArray();

    }

    public static function getBike($id)
    {
        return Bike::where('id', $id)->first();
    }

    public static function disable($id)
    {
        $bikeModel = Bike::where('id', $id)->first();
        $bikeModel->disabled = true;
        $bikeModel->save();
    }

    public static function enable($id)
    {
        $bikeModel = Bike::where('id', $id)->first();
        $bikeModel->disabled = false;
        $bikeModel->save();
    }

    public static function save(Bike $model, array $form_model)
    {
        $model['bike_model_id'] = $form_model['bike_model_id'];
        $model['status_id'] = $form_model['status_id'];
        $model['serial_number'] = strip_tags($form_model['serial_number']);
        $model->save();
    }

}
