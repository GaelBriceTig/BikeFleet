<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public static function getCategories()
    {
        return Category::where('disabled', '=', false)->select(
            'id',
            'name',
            'disabled'
        )->get()->toArray();
    }

    public static function getCategoriesWithDisabled()
    {
        return Category::select(
            'id',
            'name',
            'disabled'
        )->get()->toArray();

    }

    public static function getCategory($id)
    {
        return Category::where('id', $id)->first();
    }

    public static function disable($id)
    {
        $bikeModel = Category::where('id', $id)->first();
        $bikeModel->disabled = true;
        $bikeModel->save();
    }

    public static function enable($id)
    {
        $bikeModel = Category::where('id', $id)->first();
        $bikeModel->disabled = false;
        $bikeModel->save();
    }
}
