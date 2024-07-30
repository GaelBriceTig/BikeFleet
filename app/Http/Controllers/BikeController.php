<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\BikeModel;

class BikeController extends Controller
{
    public function index()
    {
        $bikes = BikeModel::where('disabled', false)->get();
        return view('bikesList', compact('bikes'));

    }
}
