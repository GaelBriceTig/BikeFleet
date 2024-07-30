<?php

namespace App\Models;

use DateTime;
use Eloquent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'subscription_id',
        'bike_id',
        'start_date',
        'end_date',
        'cancelled',
    ];

    protected $casts = [
        'start_date' => 'date:d-m-Y',
        'end_date' => 'date:d-m-Y',
        'created_at' => 'datetime:d-m-Y H:m',
    ];

    public function getRentalBikes()
    {
        return RentalBike::with('bike')
            ->where('rental_id', $this->id)
            ->get();
    }

    public function getRentalMaterials()
    {
        return RentalMaterial::where('rental_id', $this->id)->orderBy('name')->get();
    }


    public function getCustomer()
    {
        return Customer::where("id", $this->customer_id)->first();
    }

    public function getBike()
    {
        return Bike::where("id", $this->bike_id)->first();
    }

    public function bikes()
    {
        return $this->hasOne(Bike::class);
    }
}
