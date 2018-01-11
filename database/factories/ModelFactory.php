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
use App\Models\Quotation;
use App\Models\Template;
use App\Models\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'admin' => $faker->boolean(false),
        'active' => $faker->boolean(true),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Quotation::class, function (Faker\Generator $faker) {
    return [
        'to' => $faker->name,
        'from' => $faker->name,
        'receivers' => $faker->email,
        'mobile' => $faker->numberBetween(111111111, 999999999),
        'subject' => $faker->name,
        'title' => $faker->name,
        'brief' => $faker->sentence(6),
        'content' => $faker->paragraph(),
        'price' => $faker->numberBetween(100, 1000),
        'total' => $faker->numberBetween(100, 1000),
        'discount' => $faker->numberBetween(10, 100),
        'net_total' => $faker->numberBetween(100, 1000),
        'hints' => $faker->paragraph(),
        'approved' => $faker->boolean(),
        'sent' => $faker->boolean(false),
        'user_id' => User::all()->random()->id
    ];
});

$factory->define(Template::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->randomElement([1, 2, 3]) . '.pdf',
        'active' => 1
    ];
});
