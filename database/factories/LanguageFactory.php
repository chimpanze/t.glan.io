<?php

$factory->define(App\Language::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->name,
        "iso_code" => $faker->name,
        "project_id" => factory('App\Project')->create(),
    ];
});
