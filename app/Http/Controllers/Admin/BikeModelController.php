<?php

namespace App\Http\Controllers\Admin;

use App\Models\BikeModel;
use App\Models\Category;
use App\Models\Material;
use App\Models\Trademark;
use App\Services\BikeModelService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;


class BikeModelController extends Controller
{
    public function index()
    {
        return view('admin.model.models');
    }

    public function add()
    {
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $trademarks = Trademark::select('id', 'name')->orderBy('name')->get();
        $materials = Material::select('id', 'name')->orderBy('name')->get();
        return view('admin.model.edit', compact('categories', 'trademarks', 'materials'));
    }

    public function edit($id)
    {
        $model = BikeModelService::getBikeModel($id);
        $categories = Category::select('id', 'name')->orderBy('name')->get();
        $trademarks = Trademark::select('id', 'name')->orderBy('name')->get();
        $materials = Material::select('id', 'name')->orderBy('name')->get();
        return view('admin.model.edit', compact('model', 'categories', 'trademarks', 'materials'));
    }

    public function save(Request $request)
    {
        if (isset($request->id)) {
            $form_model = $request->validate([
                'category_id' => 'required',
                'trademark_id' => 'required',
                'material_id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'extra_price' => 'required|numeric',
                'image' => File::image()->max(2 * 1024),
            ]);
        } else {

            $form_model = $request->validate([
                'category_id' => 'required',
                'trademark_id' => 'required',
                'material_id' => 'required',
                'name' => 'required|unique:bike_models',
                'description' => 'required',
                'extra_price' => 'required|numeric',
                'image' => File::image()->max(2 * 1024),
            ]);
        }



        $model = new BikeModel();
        if (isset($request->id)) {
            $model = BikeModelService::getBikeModel($request->id);
        }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = Str::uuid()->toString() . '.' . $file->extension();

            if (!empty($model->image)) {
                Storage::delete('public/' . $model->image);
            }
            $request->file('image')->storeAs(
                'public', $fileName
            );
        }

        $model['category_id'] = $form_model['category_id'];
        $model['trademark_id'] = $form_model['trademark_id'];
        $model['material_id'] = $form_model['material_id'];
        $model['name'] = strip_tags($form_model['name']);
        $model['description'] = strip_tags($form_model['description']);
        $model['extra_price'] = $form_model['extra_price'];
        if (isset($form_model['image'])) {
            $model['image'] = $fileName;
        }
        $model->save();
        return redirect(route('admin.models'));

    }

    public function disable($id)
    {
        BikeModelService::disable($id);
        return redirect(route('admin.models'));
    }

    public function enable($id)
    {
        BikeModelService::enable($id);
        return redirect(route('admin.models'));
    }
}
