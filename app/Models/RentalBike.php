<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalBike extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'bike_id',
        'price',
        'vat_rate'
    ];

    public function bike()
    {
        return $this->belongsTo(Bike::class, 'bike_id');
    }
}
