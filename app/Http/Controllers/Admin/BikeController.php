<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bike;
use App\Models\BikeModel;
use App\Models\Status;
use App\Services\BikeService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BikeController extends Controller
{
    public function index()
    {
        $bikes = Bike::all();

        return view('admin.bike.bikes', compact('bikes'));

    }

    public function add()
    {
        $models = BikeModel::select('id', 'name')->orderBy('name')->get();
        $statuses = Status::select('id', 'name')->orderBy('name')->get();
        return view('admin.bike.edit', compact('models', 'statuses'));
    }

    public function edit($id)
    {
        $bike = BikeService::getBike($id);
        $models = BikeModel::select('id', 'name')->orderBy('name')->get();
        $statuses = Status::select('id', 'name')->orderBy('name')->get();
        return view('admin.bike.edit', compact('bike', 'models', 'statuses'));
    }

    public function save(Request $request)
    {
        if (isset($request->id)) {
            $form_model = $request->validate([
                'bike_model_id' => 'required',
                'manufacture_date' => 'required',
                'status_id' => 'required',
                'serial_number' => 'required'
            ]);
        } else {

            $form_model = $request->validate([
                'bike_model_id' => 'required',
                'manufacture_date' => 'required',
                'status_id' => 'required',
                'serial_number' => 'required|unique:bikes'
            ]);
        }


        $bike = new Bike();
        if (isset($request->id)) {
            $bike = BikeService::getBike($request->id);
        }
        $bike['manufacture_date'] = $form_model['manufacture_date'];
        $bike['bike_model_id'] = $form_model['bike_model_id'];
        $bike['status_id'] = $form_model['status_id'];
        $bike['serial_number'] = strip_tags($form_model['serial_number']);
        $bike->save();
        return redirect(route('admin.bikes'));

    }

    public function disable($id)
    {
        BikeService::disable($id);
        return redirect(route('admin.bikes'));
    }

    public function enable($id)
    {
        BikeService::enable($id);
        return redirect(route('admin.bikes'));
    }
}
