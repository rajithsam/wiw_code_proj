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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Shift::class, function () {
  $managers = [2,5];
  $employees = [NULL,1,3,4];
  $start_time = strtotime('+'.mt_rand(0,60).' days + '.mt_rand(0,90).' minutes');
  $end_time = $start_time + mt_rand(3600, 28800);
  return [
    'manager_id' => $managers[mt_rand(0,count($managers)-1)],
    'employee_id' => $employees[mt_rand(0,count($employees)-1)],
    'break' => mt_rand(0,30),
    'start_time' => date('Y-m-d H:i:s',$start_time),
    'end_time' => date('Y-m-d H:i:s',$end_time)
  ];
});
