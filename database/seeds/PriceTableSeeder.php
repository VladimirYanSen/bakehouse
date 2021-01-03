<?php

use Illuminate\Database\Seeder;

class PriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $product = \App\Product::all();
//        App\Merchant::all()->each(function($merchant) use ($product){
//           $merchant->products->attach(
//               $product->random(rand(1,3))->pluck('id')->toArray()
//           );
//        });
        factory(\App\Price::class,10)->create();
    }
}
