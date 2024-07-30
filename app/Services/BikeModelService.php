<?php

namespace App\Services;

use App\Models\BikeModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BikeModelService
{
    public static function getBikeModels()
    {
        return BikeModel::where('bike_models.disabled', '=', false)->select(
            'bike_models.id',
            'bike_models.name',
            'trademarks.name as trademark_name',
            'categories.name as category_name',
            'materials.name as material_name',
            'bike_models.image',
            'bike_models.disabled',
            'bike_models.extra_price'
        )->join("trademarks", "trademarks.id", "=", "bike_models.trademark_id")
            ->join("categories", "categories.id", "=", "bike_models.category_id")
            ->join("materials", "materials.id", "=", "bike_models.material_id")
            ->get()->toArray();
    }

    public static function getBikeModelsWithDisabled()
    {
        return BikeModel::select(
            'bike_models.id',
            'bike_models.name',
            'trademarks.name as trademark_name',
            'categories.name as category_name',
            'materials.name as material_name',
            'bike_models.image',
            'bike_models.disabled',
            'bike_models.extra_price'
        )->join("trademarks", "trademarks.id", "=", "bike_models.trademark_id")
            ->join("categories", "categories.id", "=", "bike_models.category_id")
            ->join("materials", "materials.id", "=", "bike_models.material_id")
            ->get()->toArray();

    }

    public static function getBikeModel($id)
    {
        return BikeModel::where('id', $id)->first();
    }

    public static function disable($id)
    {
        $bikeModel = BikeModel::where('id', $id)->first();
        $bikeModel->disabled = true;
        $bikeModel->save();
    }

    public static function enable($id)
    {
        $bikeModel = BikeModel::where('id', $id)->first();
        $bikeModel->disabled = false;
        $bikeModel->save();
    }

    public static function save(BikeModel $model, array $form_model, string $fileName)
    {
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
    }
}
