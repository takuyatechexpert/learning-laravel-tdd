<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Reservation;
use App\Models\Lesson;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        // このように記述すると最初からリレーションを組んだidを持っている
        'lesson_id' => function () {
            return factory(Lesson::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
