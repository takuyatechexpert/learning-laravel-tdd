<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    // 明日から10日後までの間でランダムな日時を生成する
    $startAt = $faker->dateTimeBetween('+1 days', '+10 days');
    $startAt->setTime(10, 0, 0);
    $endAt = clone $startAt;
    $endAt->setTime(11, 0, 0);

    return [
        'name' => $faker->name,
        'coach_name' => $faker->name,
        'capacity' => $faker->randomNumber(2),
        'start_at' => $faker->dateTime,
        'end_at' => $faker->dateTime,
    ];
});

// 過去の予定をテストするために追加している
// factory(Lesson::class)->state('past')->make();とすることでstateで定義した値を上書きして使える
// テスト時に値を定義するのと違うのだろうか？
// 記述が多くなる場合、よく使う場合に有効？
$factory->state(Lesson::class, 'past', function (Faker $faker) {
    // 10日前から昨日までの間でランダムな日時を生成する
    $startAt = $faker->dateTimeBetween('-10 days', '-1 days');
    $startAt->setTime(10, 0, 0);
    $endAt = clone $startAt;
    $endAt->setTime(11, 0, 0);

    return [
        'start_at' => $startAt->format('Y-m-d H:i:s'),
        'end_at' => $endAt->format('Y-m-d H:i:s'),
    ];
});