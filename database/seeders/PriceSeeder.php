<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable, for prevent memory leaks when inserting
        DB::connection()->unsetEventDispatcher();

        Price::truncate();

        Product::select('id')->chunk(100, function ($products) {
            $rowsToInsert = [];
            foreach ($products as $product) {
                Price::factory()
                    ->count(100)
                    ->state(function () use ($product) {
                        return ['product_id' => $product->id];
                    })
                    ->make()
                    ->each(function ($price) use (&$rowsToInsert) {
                        $rowsToInsert[] = $price->toArray();
                    });
            }
            Price::insert($rowsToInsert);
            $rowsToInsert = [];
        });
    }
}
