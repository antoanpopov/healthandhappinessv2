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

$factory->define(\Modules\Health\Entities\Author::class, function (Faker\Generator $faker) {
    return [
        'is_public' => true,
        'names:bg' => 'Д-р Светлана Попова',
        'names:en' => 'Dr Svetlana Popova',
    ];
});
