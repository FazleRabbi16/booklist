<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\booklist;
use Faker\Generator as Faker;

$factory->define(booklist::class, function (Faker $faker) {
    return [
        "bookname"=>$faker->words($nb = 10, $asText = false),
        "author"=>$faker->name($gender ='male'|'female'),
        "body"=>$faker->sentences($nb = 20, $asText = false)
    ];
});
