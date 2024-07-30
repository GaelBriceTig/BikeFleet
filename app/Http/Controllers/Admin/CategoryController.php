<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.categories');
    }

    public function add()
    {
        return view('admin.category.edit');
    }

    public function edit($id)
    {
        $category = CategoryService::getCategory($id);
        return view('admin.category.edit', compact('category'));
    }

    public function save(Request $request)
    {
        if (isset($request->id)) {
            $form_category = $request->validate([
                'name' => 'required'
            ]);
        } else {
            $form_category = $request->validate([
                'name' => 'required|unique:categories'
            ]);
        }
        $category = new Category();
        if (isset($request->id)) {
            $category = CategoryService::getCategory($request->id);
        }
        $category['name'] = strip_tags($form_category['name']);
        $category->save();
        return redirect(route('admin.categories'));
    }

    public function disable($id)
    {
        CategoryService::disable($id);
        return redirect(route('admin.categories'));
    }

    public function enable($id)
    {
        CategoryService::enable($id);
        return redirect(route('admin.categories'));
    }
}
