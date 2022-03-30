<?php

namespace App\Contracts\Api;

use App\Http\Resources\PriceCollection;

interface SampleServiceInterface
{
    public function getPrices(): PriceCollection;

    public function updatePrices($productId, $prices);
}
