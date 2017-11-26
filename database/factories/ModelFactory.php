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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'active' => $faker->randomElement(['Y', 'N']),
        'code' => str_random(10),
        'name' => $faker->name,
        'date_of_birth' => $faker->dateTimeBetween('-30 years', '-10 years'),
        'gender' => $faker->randomElement(['m', 'f']),
        'mothers_name' => $faker->name,
        'fathers_name' => $faker->name,
        'address' => $faker->address,
        'district' => $faker->city,
        'zipcode' => '42700-000',
        'phone' => '(71) 3333-3333',
        'main_mobile' => '(71) 99999-9999',
        'secondary_mobile' => '(71) 98888-8888',
        'email' => $faker->email,
        'diagnosis' => $faker->text,
        'practice_day' => $faker->randomElement([1, 2, 3, 4, 5, 6]),
        'activity_location' => $faker->randomElement([1, 2]),
        'contribution_value' => $faker->randomNumber(2),
        'indicated_by' => $faker->name,
        'social_worker' => $faker->name,
        'discharge_date' => $faker->dateTimeBetween('-20 days', '-2 days')
    ];
});

$factory->define(App\Contribution::class, function (Faker\Generator $faker) {
    return [
        'payment_date' => $faker->dateTimeBetween('-20 days', '-2 days'),
        'value' => $faker->randomNumber(3),
        'month' => $faker->numberBetween(1, 12),
        'year' => $faker->numberBetween(2016, 2017),
        'received_by' => $faker->name
    ];
});

$factory->define(App\ChartOfAccount::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->jobTitle(),
        'description' => $faker->text
    ];
});

$factory->define(App\FinancialTransaction::class, function (Faker\Generator $faker) {
    return [
        'type' => $faker->numberBetween(1, 2),
        'chart_of_account_id' => $faker->numberBetween(1, 3),
        'description' => $faker->text(),
        'value' => $faker->randomNumber(3),
        'transaction_date' => $faker->dateTimeBetween('-10 day', '-1 days')
    ];
});
