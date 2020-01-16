<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booklists;
use Faker\Generator as Faker;

$factory->define(Booklists::class, function (Faker $faker) {
    return [
        /*"bookname"=>$faker->words($nb = 10),
        "author"=>$faker->name($gender ='male'),
        "body"=>$faker->sentences($nb = 20)
        */
    ];
});
