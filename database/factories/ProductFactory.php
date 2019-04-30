<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word),
        'description' => $faker->sentence,
        'rating' => 98,
        'brand_id' => 101,
        'category_id' => 102,
        'published_at' => now(),
    ];
});

