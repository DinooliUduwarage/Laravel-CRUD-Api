<?php

use Faker\Generator as Faker;

//App\Article is the model name
$factory->define(App\Article::class, function (Faker $faker) {
    return [
        //format fake data at seed
        'title' => $faker->text(50),
        'body' => $faker->text(200),
        
    ];
});
