<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BikeModel;
use App\Services\BikeModelService;
use App\Services\TrademarkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $items = TrademarkService::getTrademarks();
//        $response = array(
//            "draw" => intval($draw),
//            "iTotalRecords" => $totalRecords,
//            "iTotalDisplayRecords" => $totalRecordwithFilter,
//            "aaData" => $data
//        );
        return response()->json([
//            'iTotalRecords' => array_count_values($items),
            'data' => $items
        ]);
    }

    public function trademarksWithDisabled()
    {
        return response()->json([
            'data' => TrademarkService::getTrademarksWithDisabled()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\BikeModel $bikeModel
     * @return \Illuminate\Http\Response
     */
    public function show(BikeModel $bikeModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\BikeModel $bikeModel
     * @return \Illuminate\Http\Response
     */
    public function edit(BikeModel $bikeModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BikeModel $bikeModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BikeModel $bikeModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\BikeModel $bikeModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BikeModel $bikeModel)
    {
        //
    }
}
