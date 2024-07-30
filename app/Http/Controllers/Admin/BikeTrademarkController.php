<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trademark;
use App\Services\TrademarkService;
use Illuminate\Http\Request;

class BikeTrademarkController extends Controller
{
    public function index()
    {
        return view('admin.trademark.trademarks');
    }

    public function add()
    {
        return view('admin.trademark.edit');
    }

    public function edit($id)
    {
        $trademark = TrademarkService::getTrademark($id);
        return view('admin.trademark.edit', compact('trademark'));
    }

    public function save(Request $request)
    {
        if (isset($request->id)) {
            $form_trademark = $request->validate([
                'name' => 'required',
            ]);
        } else {
            $form_trademark = $request->validate([
                'name' => 'required|unique:trademarks',
            ]);
        }

        $trademark = new Trademark();
        if (isset($request->id)) {
            $trademark = TrademarkService::getTrademark($request->id);
        }
        $trademark['name'] = strip_tags($form_trademark['name']);
        $trademark->save();
        return redirect(route('admin.trademarks'));
    }

    public function disable($id)
    {
        TrademarkService::disable($id);
        return redirect(route('admin.trademarks'));
    }

    public function enable($id)
    {
        TrademarkService::enable($id);
        return redirect(route('admin.trademarks'));
    }
}
