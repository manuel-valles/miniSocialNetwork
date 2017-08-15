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
    	'username' => $faker->word,
    	'dob' => Carbon\Carbon::parse('January 9 1981'),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Article::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\User::all()->random()->id,
        // A paragraph with 5 sentences
        'content' => $faker->paragraph(5),
        // You can pass a parameter for boolean: 
        // boolean(70) is 70% chance to get true. If it's empty it will be a 50%.
        'live' => $faker->boolean(),
        'post_on' => Carbon\Carbon::parse('+1 week'),
    ];
});
