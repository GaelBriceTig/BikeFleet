<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;
use App\Services\MaterialService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class MaterialController extends Controller
{
    public function index()
    {
        return view('admin.material.materials');
    }

    public function add()
    {
        return view('admin.material.edit');
    }

    public function edit($id)
    {
        $material = MaterialService::getMaterial($id);
        return view('admin.material.edit', compact('material'));
    }

    public function save(Request $request)
    {
        if (isset($request->id)) {
            $form_material = $request->validate([
                'name' => 'required'
            ]);
        } else {
            $form_material = $request->validate([
                'name' => 'required|unique:materials'
            ]);
        }


        $material = new Material();
        if (isset($request->id)) {
            $material = MaterialService::getMaterial($request->id);
        }
        $material['name'] = strip_tags($form_material['name']);
        $material->save();
        return redirect(route('admin.materials'));
    }

    public function disable($id)
    {
        MaterialService::disable($id);
        return redirect(route('admin.materials'));
    }

    public function enable($id)
    {
        MaterialService::enable($id);
        return redirect(route('admin.materials'));
    }
}
