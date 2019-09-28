<?php

use App\Vote;
use Faker\Factory;
use Faker\Generator as Faker;

/** @var Factory $factory */
$factory->define(Vote::class, function (Faker $faker) {

    return [
        'title' => $faker->text(10),
        'id_permission' => rand(1, 2),
        'description' => $faker->text(20),
        'finish_time' => $faker->dateTimeBetween('+1 week', '+2 week')
    ];
});


$factory->state(Vote::class, 'closed_question_subject-1', function (Faker $faker) {
    return [
        'type' => 'closed_question',
        'subject' => 'Денежно-кредитная политика'
    ];
});

$factory->state(Vote::class, 'closed_question_subject-2', function (Faker $faker) {
    return [
        'type' => 'closed_question',
        'subject' => 'Банковское кредитование'
    ];
});

$factory->state(Vote::class, 'closed_question_subject-3', function (Faker $faker) {
    return [
        'type' => 'closed_question',
        'subject' => 'Экономика'
    ];
});
