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
        'description' => $faker->sentences(5, true),
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

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->sentences(5, true)
    ];
});


$factory->define(App\Model\Shop\shop_pictures::class, function (Faker\Generator $faker) {

    return [
        'url' => $faker->imageUrl(),
        'alt' => $faker->text(15),
    ];
});

$factory->define(\App\Model\Shop\shop_products::class, function(Faker\Generator $faker) {
    return [
        'quantities' => $faker->numberBetween(1,1000),
        'description' => $faker->text(255),
        'price' => $faker->numberBetween(5,45),
        ];
});


