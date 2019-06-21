<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        // Make a sentence with 3 words and variable words
        'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        // Make a sentence with 25 words and variable words
        'description' => $faker->sentence($nbWords = 25, $variableNbWords = true),
        // Make a random float with 2 decimals, and a min at 0 and a max at 10000
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
        // Make a regex, 16 characters with only characters from A to Z and numbers 0 to 9
        'reference' => $faker->regexify('[A-Z0-9]{16}')
    ];
});
