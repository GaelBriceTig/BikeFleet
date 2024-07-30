<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Spatie\Period\Period;
use Spatie\Period\Precision;

class Bike extends Model
{
    protected $casts = [
        'manufacture_date' => 'date:d-m-Y'
    ];
    use HasFactory;

    protected $guarded = [
    ];

    public function getBikeModel()
    {
        return BikeModel::where('id', $this->bike_model_id)->first();
    }

    public function getStatus()
    {
        return Status::where('id', $this->status_id)->first();
    }

    public function getBrokenStatus()
    {
        $maintenance = DB::table('statuses')->where('id', '3')->value('name');
    }

//    public function scopeFilter($query, array $filters)
//    {
//        if ($filters['bike_model_id'] ?? false) {
//            $query->where('bike_model_id', '=', $filters['bike_model_id']);
//        }
//    }

    public function hasRentalBike($bike_id, $rent_start_datetime, $rent_duration)
    {

        $date = Carbon::parse($rent_start_datetime);

        $startDate = Carbon::parse($rent_start_datetime)->format('Y-m-d');
        $endDate = $date->addDays($rent_duration)->format('Y-m-d');

        $a = Period::make($startDate, $endDate);
        $rentals = Rental::where('bike_id', $bike_id)->get();

        foreach ($rentals as $rental) {
            $b = Period::make($startDate, $endDate, Precision::DAY());
            if ($a->overlapsWith($b)) {
                return true;
            }
        }
        return false;
    }

}
