<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeDelivery\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(CodeDelivery\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
    ];
});
$factory->define(CodeDelivery\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10,50)
    ];
});

$factory->define(CodeDelivery\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->numberBetween(555555555,99999999),
        'adress' => $faker->string(),
        'city' => $faker->string(),
        'state' => $faker->string(),
        'zipcode' => $faker->numberBetween(11111111,99999999)
    ];
});