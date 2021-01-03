<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->safeColorName,
        'category_id' => function() {
            return factory(App\Category::class)->create()->id;
        }
    ];
});
