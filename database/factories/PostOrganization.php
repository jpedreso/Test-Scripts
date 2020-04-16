<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
/*



/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\MasterFiles\Organization;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Organization::class, function (Faker $faker) {
    return [
        'org_name' => $faker->company,
        'agency_type_id' => $faker->text,
        'tax_id' => $faker->text,
        'multi_company' =>  $faker->boolean,
        'cost_center_enable' => $faker->boolean,
    ];
});