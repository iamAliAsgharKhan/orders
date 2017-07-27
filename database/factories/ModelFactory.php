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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Item::class, function (Faker\Generator $faker) {

    return [
        'sku' => $faker->ean8,
        'product' => $faker->word,
        'description' => $faker->sentence,
        'quantity' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\ItemSupplier::class, function (Faker\Generator $faker) {

    return [
        'item_id' => $faker->randomDigitNotNull,
        'supplier_id' => $faker->randomDigitNotNull,
    ];
});

$factory->define(App\Supplier::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->company,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->state,
        'country' => $faker->country,
        'zipcode' => $faker->postcode,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {

    return [
        'supplier' => $faker->company,
        'supplier_id' => $faker->randomDigitNotNull,
        'order_date' => $faker->date,
    ];
});

$factory->define(App\Orderlines::class, function (Faker\Generator $faker) {

    return [
        'order_id' => $faker->numberBetween($min=1, $min=4),
        'item_id' => $faker->randomDigitNotNull,
        'item' => $faker->word,
        'quantity' => $faker->randomDigitNotNull,
        'item_cost' => $faker->numberBetween($min = 1000, $max = 10000),
        'unit_cost' => $faker->numberBetween($min = 1000, $max = 9000),
        'total_cost' => $faker->numberBetween($min = 1000, $max = 9000),
        'reorder' => 'ok',
    ];
});


