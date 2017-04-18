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
        'forname' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $faker->password,
        'avatar' => $faker->image(),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'date' => $faker->dateTime('now'),
        'lieu' => $faker->city,
        'photo' => $faker->url,
    ];
});

    $factory->define(App\Association::class, function (Faker\Generator $faker) {

        return [
            'name' => $faker->name,
        ];
    });

    $factory->define(App\Photo::class, function (Faker\Generator $faker) {

        return [
            'path' => $faker->image(),
        ];
    });

    $factory->define(App\ShopProduct::class, function (Faker\Generator $faker) {

        return [
            'name' => $faker->name,
            'price' =>$faker->randomDigit(5, 40),
            'color' =>$faker->colorName,
            'quantities' =>$faker->randomDigit(0, 100)
    ];
});
    $factory->define(App\ShopPicture::class, function (Faker\Generator $faker) {

        return [
            'name' => $faker->name,
            'url' => $faker->url,
        ];
    });

    $factory->define(App\ShopOrder::class, function (Faker\Generator $faker) {

        return [
            'city' => $faker->city,
            'address' => $faker->streetAddress,
            'zip_code' => $faker->postcode,
            'quantities'=> $faker->randomDigit(1, 100),
            'price' => $faker->randomDigit(5),

        ];
    });

    $factory->define(App\ShopProductOrder::class, function (Faker\Generator $faker) {

        return [
            'size' => $faker->randomElements(['S', 'M', 'L', 'XL', 'XXL']),
            'product' => $faker->name,
            'price' => $faker->randomFloat(2, 5, 30),
        ];
    });


