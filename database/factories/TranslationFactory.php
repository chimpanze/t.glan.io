<?php

$factory->define(App\Translation::class, function (Faker\Generator $faker) {
    return [
        "string_id" => factory('App\TranslationString')->create(),
        "language_id" => factory('App\Language')->create(),
        "context_id" => factory('App\Context')->create(),
        "translation" => $faker->name,
    ];
});
