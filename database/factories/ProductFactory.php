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
    $random_number=rand(1, 3);
    $product_name="";
    switch ($random_number) {
        case 1:
            $product_name="Mobile";
            break;
        case 2:
            $product_name="Labtop";
            break;
        case 3:
            $product_name="Headphones";
            break;
        default:
            $product_name="product";
            break;
    }
    


    return [
        'product_name' => $product_name,
        'product_desc' => 'long desc',
        'product_img' => '/images/product_'. $random_number .'.jpeg',
        'product_price' => rand(100, 1000),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->text,
    ];
});
