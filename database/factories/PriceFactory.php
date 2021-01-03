<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Price;
use Faker\Generator as Faker;

$factory->define(Price::class, function (Faker $faker) {
    return [
        'merchant_id' => function(){
            return factory(App\Merchant::class)->create()->id;
        },
        'product_id' => function() {
            return factory(App\Product::class)->create()->id;
        },
        'price' => $faker->randomDigitNotNull
    ];
});
