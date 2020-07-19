<?php

$factory->define(App\TranslationString::class, function (Faker\Generator $faker) {
    return [
        "key" => $faker->name,
        "description" => $faker->name,
        "placholder_configuration" => $faker->name,
        "project_id" => factory('App\Project')->create(),
        "context_id" => factory('App\Context')->create(),
    ];
});
