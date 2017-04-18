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

    $name = $faker->name;
    $forename = $faker->name;

    return [
        'name' => $name,
        'forename' => $forename,
        'email' => str_slug($forename).'.'.str_slug($name).'@viacesi.fr',
        'birthday' => $faker->dateTime('2000-01-01'),
        'password' => $faker->password,
        'is_valid' => true,
        'avatar' => $faker->imageUrl(100, 100, 'people'),
    ];
});

$factory->define(App\Activity::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'date' => $faker->dateTimeThisMonth('now'),
        'lieu' => $faker->city,
        'like' => $faker->numberBetween(0, 50),
        'photo' => $faker->imageUrl(600, 400, 'sports'),
    ];
});

$factory->define(App\Association::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Photo::class, function (Faker\Generator $faker) {

    return [
        'path' => $faker->imageUrl(),
        'like' => $faker->numberBetween(0, 50),
    ];
});

$factory->define(App\ShopProduct::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(2,5, 40),
        'color' => $faker->colorName,
        'quantities' => $faker->numberBetween(0, 100)
    ];
});
$factory->define(App\ShopPicture::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'url' => $faker->imageUrl(),
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


