<?php

namespace App\Services;

use App\Models\Material;

class MaterialService
{
    public static function getMaterials()
    {
        return Material::where('disabled', '=', false)->select(
            'id',
            'name',
            'disabled'
        )->get()->toArray();
    }

    public static function getMaterialsWithDisabled()
    {
        return Material::select(
            'id',
            'name',
            'disabled'
        )->get()->toArray();

    }

    public static function getMaterial($id)
    {
        return Material::where('id', $id)->first();
    }

    public static function disable($id)
    {
        $bikeModel = Material::where('id', $id)->first();
        $bikeModel->disabled = true;
        $bikeModel->save();
    }

    public static function enable($id)
    {
        $bikeModel = Material::where('id', $id)->first();
        $bikeModel->disabled = false;
        $bikeModel->save();
    }
}
