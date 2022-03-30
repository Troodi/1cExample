<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UpdatePricesRequest;
use App\Services\Api\SampleService;

class SampleController extends Controller
{
    /**
     * Show prices
     * @param SampleService $sampleService
     * @return \App\Http\Resources\PriceCollection
     */
    public function index(SampleService $sampleService)
    {
        return $sampleService->getPrices();
    }

    /**
     * Update prices
     * @param UpdatePricesRequest $request
     * @param SampleService $sampleService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UpdatePricesRequest $request, SampleService $sampleService)
    {
        $sampleService->updatePrices($request->product_id, $request->prices);
        return response()->json(true);
    }
}
