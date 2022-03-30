<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $products = Product::factory()
            ->count(10000)
            ->make();

        $chunks = $products->chunk(2000);
        $chunks->each(function ($chunk) {
            Product::insert($chunk->toArray());
        });
    }
}
