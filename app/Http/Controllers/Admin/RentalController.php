<?php

namespace App\Http\Controllers\Admin;

use App\Models\Rental;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        $statuses = Status::select('id', 'name')->orderBy('name')->get();
        return view('admin.rental.rentals', compact('rentals', 'statuses'));
    }
}
