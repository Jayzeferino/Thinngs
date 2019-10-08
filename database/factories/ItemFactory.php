<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Item;
use App\Model\Usuario;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    return [
        'usuario_id'=> function(){
            return Usuario::all()->random();
        },
        'name'=>$faker->name,
        'datein'=>now(),
        'dateout'=>$faker->date($format = 'Y-m-d', $max = 'now'),
        'Status'=>$faker->boolean
    ];
});
