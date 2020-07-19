<?php

$factory->define(App\Context::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "context_key" => $faker->name,
        "project_id" => factory('App\Project')->create(),
    ];
});
