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

$factory->define(\Modules\Health\Entities\Category::class, function (Faker\Generator $faker) {
    return [
        'is_public' => true,
        'created_by' => 1,
        'title:bg' => $faker->text(190),
        'abstract:bg' => $faker->text(150),
        'content:bg' => $faker->text(3000),
        'title:en' => $faker->text(190),
        'abstract:en' => $faker->text(150),
        'content:en' => $faker->text(3000),
    ];
});
