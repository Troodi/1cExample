<?php

namespace App\Services\Api;

use App\Http\Resources\PriceCollection;
use App\Models\Price;

class SampleService
{
    /**
     * Return paginated prices
     * @return PriceCollection
     */
    public function getPrices(): PriceCollection
    {
        return new PriceCollection(Price::paginate(15));
    }

    /**
     * Update prices
     * @return void
     */
    public function updatePrices($productId, $prices)
    {
        foreach($prices as $key => $value)
        {
            $prices[$key]['product_id'] = $productId;
        }
        Price::where('product_id', $productId)->upsert($prices, ['id'], ['price']);
        $priceIds = collect($prices)->pluck('id')->toArray();
        Price::where('product_id', $productId)->whereNotIn('id', $priceIds)->update(['price' => 0]);
    }
}
