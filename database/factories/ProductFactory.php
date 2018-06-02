<?php


use Faker\Generator as Faker;
use App\Product;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(Product::class, function (Faker $faker) {
    static $password;
    return [
        'product_name' => $faker->name,
        'product_desc' => 'long desc',
        'product_img' => '/images/product_'.rand(1, 3).'.jpeg',
        'product_price' => rand(100, 1000),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->text,
    ];
});
