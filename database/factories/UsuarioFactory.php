<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Usuario;
use Faker\Generator as Faker;

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->unique()->freeEmail,
        'email_verified_at' => now(),
        'password'=>$faker->password
    ];
});
