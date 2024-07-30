<?php

namespace App\Services;

use App\Models\Trademark;

class TrademarkService
{
    public static function getTrademarks()
    {
        return Trademark::where('disabled', '=', false)->select(
            'trademarks.id',
            'trademarks.name',
            'trademarks.disabled'
        )->get()->toArray();
    }

    public static function getTrademarksWithDisabled()
    {
        return Trademark::select(
            'trademarks.id',
            'trademarks.name',
            'trademarks.disabled'
        )->get()->toArray();

    }

    public static function getTrademark($id)
    {
        return Trademark::where('id', $id)->first();
    }

    public static function disable($id)
    {
        $trademark = Trademark::where('id', $id)->first();
        $trademark->disabled = true;
        $trademark->save();
    }

    public static function enable($id)
    {
        $bikeModel = Trademark::where('id', $id)->first();
        $bikeModel->disabled = false;
        $bikeModel->save();
    }
}
